<?php
/**
 * Update pipe-separated URLs in content with local paths
 */

$jsonFile = 'posts_data.json';
$imagesDir = 'assets/blog-images-all/';

$postsJson = file_get_contents($jsonFile);
$posts = json_decode($postsJson, true);

if (!$posts) {
    die("Error reading posts_data.json\n");
}

$totalReplaced = 0;

foreach ($posts as &$post) {
    if (isset($post['content'])) {
        $content = $post['content'];
        $original = $content;

        // Handle pipe-separated URLs like: image1.jpg|image2.jpg|image3.jpg,https://...
        // Split by pipe to get individual image URLs
        $parts = explode('|', $content);
        $newParts = [];

        foreach ($parts as $part) {
            $part = trim($part);

            // Check if this part contains an image URL from drvijayanandreddy.com
            if (preg_match('/drvijayanandreddy\.com\/wp-content\/uploads\/[^,\s]+/', $part, $matches)) {
                $url = $matches[0];
                $filename = basename($url);
                $localPath = $imagesDir . $filename;

                if (file_exists($localPath)) {
                    $part = str_replace($url, $localPath, $part);
                }
            }

            $newParts[] = $part;
        }

        $post['content'] = implode('|', $newParts);

        // Also replace any remaining standalone image URLs
        if (preg_match_all('/drvijayanandreddy\.com\/wp-content\/uploads\/[^"\'\s]+/', $post['content'], $matches)) {
            foreach (array_unique($matches[0]) as $url) {
                $filename = basename($url);
                $localPath = $imagesDir . $filename;

                if (file_exists($localPath)) {
                    $post['content'] = str_replace($url, $localPath, $post['content']);
                    $totalReplaced++;
                }
            }
        }
    }
}

// Save updated posts data
$updatedJson = json_encode($posts, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
file_put_contents($jsonFile, $updatedJson);

echo "Replaced $totalReplaced image URLs\n";
echo "posts_data.json saved\n";

// Count remaining external URLs
$remaining = 0;
foreach ($posts as $post) {
    if (isset($post['content'])) {
        preg_match_all('/drvijayanandreddy\.com/', $post['content'], $m);
        $remaining += count($m[0]);
    }
}

echo "Remaining external URLs: $remaining\n";