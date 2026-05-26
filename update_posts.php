<?php
/**
 * Script to clean and update posts_data.json and blog/posts_data.json with correct dates, IDs, and URLs from the CSV.
 */

$newCsvPath = __DIR__ . '/Dr. Vijay Anand Blogs (1).csv';
$oldCsvPath = __DIR__ . '/assets/Posts-Export-2026-May-20-1055.csv';
$jsonPath = __DIR__ . '/posts_data.json';
$blogJsonPath = __DIR__ . '/blog/posts_data.json';

if (!file_exists($newCsvPath)) {
    die("Error: New CSV file not found at $newCsvPath\n");
}
if (!file_exists($oldCsvPath)) {
    die("Error: Old CSV file not found at $oldCsvPath\n");
}

// 1. Load clean base JSON posts from git history (commit b39125b)
echo "Loading clean base posts from Git commit b39125b...\n";
$gitCmd = 'git show b39125b:posts_data.json';
$baseJsonContent = shell_exec($gitCmd);
if (!$baseJsonContent) {
    echo "Warning: Failed to load from git commit b39125b, falling back to local posts_data.json\n";
    $baseJsonContent = file_get_contents($jsonPath);
}

$basePosts = json_decode($baseJsonContent, true);
if (!$basePosts) {
    die("Error: Failed to decode base JSON posts.\n");
}

// Helper to normalize strings for robust matching
function normalizeTitle($title) {
    // Decode HTML entities
    $title = html_entity_decode($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    // Remove zero-width spaces and non-breaking spaces
    $title = str_replace(["\xE2\x80\x8B", "\u{200b}", "\u{00a0}", "\u{200c}"], "", $title);
    // Replace multiple spaces with a single space
    $title = preg_replace('/\s+/', ' ', $title);
    return strtolower(trim($title));
}

// Map base posts by normalized title and date
$basePostsMap = [];
foreach ($basePosts as $post) {
    $normTitle = normalizeTitle($post['title']);
    $date = trim($post['date'] ?? '');
    $basePostsMap[$normTitle][$date] = $post;
}

// 2. Load old CSV to map Title + Slug -> WordPress ID
echo "Mapping WordPress IDs from old CSV export...\n";
$fOld = fopen($oldCsvPath, 'r');
$oldHeader = fgetcsv($fOld);
if (substr($oldHeader[0], 0, 3) === "\xEF\xBB\xBF") {
    $oldHeader[0] = substr($oldHeader[0], 3);
}

$oldIdMap = [];
while (($row = fgetcsv($fOld)) !== false) {
    if (isset($row[0]) && isset($row[1])) {
        $id = trim($row[0]);
        $title = trim($row[1]);
        $url = trim($row[5] ?? $row[4] ?? '');
        
        $normTitle = normalizeTitle($title);
        $urlPath = parse_url($url, PHP_URL_PATH);
        $slug = trim($urlPath, '/');
        
        if (!empty($slug)) {
            $oldIdMap[$normTitle][$slug] = $id;
        } else {
            $oldIdMap[$normTitle]['default'] = $id;
        }
    }
}
fclose($fOld);

// 3. Load new CSV and map/update the posts
echo "Processing new CSV and updating posts...\n";
$fNew = fopen($newCsvPath, 'r');
$newHeader = fgetcsv($fNew);
if (substr($newHeader[0], 0, 3) === "\xEF\xBB\xBF") {
    $newHeader[0] = substr($newHeader[0], 3);
}

$updatedPosts = [];
$missingInBase = 0;
$missingId = 0;

while (($row = fgetcsv($fNew)) !== false) {
    $title = trim($row[0]);
    $csvContent = $row[1];
    $date = trim($row[2]);
    $permalink = trim($row[3]);
    
    $normTitle = normalizeTitle($title);
    
    // Resolve WordPress ID
    $urlPath = parse_url($permalink, PHP_URL_PATH);
    $slug = trim($urlPath, '/');
    
    $id = '';
    if (isset($oldIdMap[$normTitle])) {
        if (isset($oldIdMap[$normTitle][$slug])) {
            $id = $oldIdMap[$normTitle][$slug];
        } elseif (isset($oldIdMap[$normTitle]['default'])) {
            $id = $oldIdMap[$normTitle]['default'];
        } else {
            $id = reset($oldIdMap[$normTitle]);
        }
    }
    
    if (empty($id)) {
        if (preg_match('/\\?p=(\\d+)/', $permalink, $matches)) {
            $id = $matches[1];
        } else {
            $id = substr(md5($normTitle), 0, 8);
            $missingId++;
        }
    }
    
    $finalDate = $date;
    $finalPermalink = $permalink;
    
    // Override specific values
    if ($title === 'Is Breast Cancer Curable with Treatment? Understanding Your Prognosis and Next Steps') {
        $finalDate = '2023-11-20';
        $finalPermalink = 'https://drvijayanandreddy.com/is-breast-cancer-curable-with-treatment-understanding-your-prognosis-and-next-steps/';
    } elseif ($title === 'Is Chemotherapy Painful for Breast Cancer? {Real Facts}') {
        $finalDate = '2026-05-15';
        $finalPermalink = 'https://drvijayanandreddy.com/is-chemotherapy-painful-for-breast-cancer-real-facts/';
    }
    
    // Retrieve clean content and images from base posts
    $content = '';
    $images = [];
    
    if (isset($basePostsMap[$normTitle])) {
        if (isset($basePostsMap[$normTitle][$date])) {
            $postData = $basePostsMap[$normTitle][$date];
            $content = $postData['content'];
            $images = $postData['images'];
        } else {
            if (count($basePostsMap[$normTitle]) === 1) {
                $postData = reset($basePostsMap[$normTitle]);
                $content = $postData['content'];
                $images = $postData['images'];
            } else {
                // If title has multiple entries (e.g. Whitathon), match by closest date
                $postData = null;
                foreach ($basePostsMap[$normTitle] as $d => $p) {
                    if (abs(strtotime($d) - strtotime($date)) < 30 * 24 * 3600) {
                        $postData = $p;
                        break;
                    }
                }
                if (!$postData) {
                    $postData = reset($basePostsMap[$normTitle]);
                }
                $content = $postData['content'];
                $images = $postData['images'];
            }
        }
    } else {
        $content = $csvContent;
        $images = [];
        $missingInBase++;
    }
    
    // Make Whitathon titles distinct by year
    if ($title === 'WHITATHON – Marathon for Eye Cancer Awareness!') {
        if ($finalDate === '2024-07-05') {
            $title = 'WHITATHON – Marathon for Eye Cancer Awareness! (2024)';
        } elseif ($finalDate === '2025-05-19') {
            $title = 'WHITATHON – Marathon for Eye Cancer Awareness! (2025)';
        }
    }
    
    // HTML content cleaning
    // 1. Strip Gutenberg HTML comments
    $content = preg_replace('/<!-- \/?wp:.*?-->\s*/', '', $content);
    
    // 2. Demote headings to ensure single-H1 compliance
    $content = preg_replace('/<h3([^>]*)>/i', '<h4$1>', $content);
    $content = preg_replace('/<\/h3>/i', '</h4>', $content);
    
    $content = preg_replace('/<h2([^>]*)>/i', '<h3$1>', $content);
    $content = preg_replace('/<\/h2>/i', '</h3>', $content);
    
    $content = preg_replace('/<h1([^>]*)>/i', '<h2$1>', $content);
    $content = preg_replace('/<\/h1>/i', '</h2>', $content);
    
    // 3. Strip empty paragraphs
    $content = preg_replace('/<p>\s*(?:&nbsp;)?\s*<\/p>/i', '', $content);
    
    // 4. Ensure no doubled double-quotes
    $content = str_replace('""', '"', $content);
    
    $updatedPosts[] = [
        'id' => $id,
        'title' => $title,
        'content' => $content,
        'date' => $finalDate,
        'images' => $images,
        'permalink' => $finalPermalink
    ];
}
fclose($fNew);

// 4. Sort updated posts by date descending
usort($updatedPosts, function($a, $b) {
    return strcmp($b['date'] ?? '', $a['date'] ?? '');
});

// 5. Save updated JSON to both locations
$newJsonContent = json_encode($updatedPosts, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

file_put_contents($jsonPath, $newJsonContent);
file_put_contents($blogJsonPath, $newJsonContent);

echo "Success!\n";
echo "Processed: " . count($updatedPosts) . " posts.\n";
echo "Saved JSON to:\n  - $jsonPath\n  - $blogJsonPath\n";
if ($missingInBase > 0) {
    echo "Warning: $missingInBase posts were missing from base JSON and used raw CSV content.\n";
}
if ($missingId > 0) {
    echo "Warning: Generated fallback IDs for $missingId posts.\n";
}
