<?php
/**
 * Download all missing images and update posts_data.json
 */

$jsonFile = 'posts_data.json';
$imagesDir = 'assets/blog-images-all/';

// Create directory if not exists
if (!is_dir($imagesDir)) {
    mkdir($imagesDir, 0755, true);
}

$postsJson = file_get_contents($jsonFile);
$posts = json_decode($postsJson, true);

if (!$posts) {
    die("Error reading posts_data.json\n");
}

// Find all unique image URLs from content
$allImageUrls = [];

foreach ($posts as $post) {
    if (isset($post['content'])) {
        // Find drvijayanandreddy.com/wp-content/uploads URLs
        preg_match_all('/https?:\/\/drvijayanandreddy\.com\/wp-content\/uploads\/[\d]{4}\/[\d]{2}\/[^\s|,|"]+/', $post['content'], $matches);
        foreach ($matches[0] as $url) {
            $allImageUrls[$url] = true;
        }

        // Also find URLs without protocol (after pipe)
        preg_match_all('/(?<=\|)drvijayanandreddy\.com\/wp-content\/uploads\/[\d]{4}\/[\d]{2}\/[^\s|,|"]+/', $post['content'], $matches);
        foreach ($matches[0] as $url) {
            $allImageUrls['https://' . $url] = true;
        }
    }
}

$urlsToDownload = [];
foreach (array_keys($allImageUrls) as $url) {
    $filename = basename($url);
    $localPath = $imagesDir . $filename;
    if (!file_exists($localPath) || filesize($localPath) == 0) {
        $urlsToDownload[$url] = $filename;
    }
}

echo "Found " . count($urlsToDownload) . " missing images to download\n\n";

$downloaded = 0;
$failed = 0;

foreach ($urlsToDownload as $url => $filename) {
    $localPath = $imagesDir . $filename;
    echo "Downloading: $filename\n";

    $escapedUrl = escapeshellarg($url);
    $escapedPath = escapeshellarg($localPath);
    $cmd = "curl -L -o $escapedPath -A \"Mozilla/5.0\" --connect-timeout 20 $escapedUrl 2>&1";
    exec($cmd, $output, $return);

    if (file_exists($localPath) && filesize($localPath) > 0) {
        echo "  OK (" . filesize($localPath) . " bytes)\n";
        $downloaded++;
    } else {
        echo "  FAILED\n";
        $failed++;
    }
}

echo "\nDownloaded: $downloaded, Failed: $failed\n";

// Now update posts_data.json with local paths
echo "\nUpdating posts_data.json...\n";

$totalReplaced = 0;
foreach ($posts as &$post) {
    if (isset($post['content'])) {
        $content = $post['content'];
        $original = $content;

        // Replace all drvijayanandreddy.com/wp-content/uploads URLs
        $content = preg_replace_callback(
            '/https?:\/\/drvijayanandreddy\.com\/wp-content\/uploads\/[\d]{4}\/[\d]{2}\/[^\s|,|"]+/',
            function($matches) use ($imagesDir) {
                $url = $matches[0];
                $filename = basename($url);
                $localPath = $imagesDir . $filename;
                if (file_exists($localPath) && filesize($localPath) > 0) {
                    return $localPath;
                }
                return $url;
            },
            $content
        );

        // Replace URLs without protocol (after pipe)
        $content = preg_replace_callback(
            '/(?<=\|)drvijayanandreddy\.com\/wp-content\/uploads\/[\d]{4}\/[\d]{2}\/[^\s|,|"]+/',
            function($matches) use ($imagesDir) {
                $url = $matches[0];
                $filename = basename($url);
                $localPath = $imagesDir . $filename;
                if (file_exists($localPath) && filesize($localPath) > 0) {
                    return $localPath;
                }
                return $url;
            },
            $content
        );

        $post['content'] = $content;

        if ($original !== $content) {
            $totalReplaced++;
        }
    }
}

$updatedJson = json_encode($posts, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
file_put_contents($jsonFile, $updatedJson);

echo "Updated $totalReplaced posts\n";
echo "posts_data.json saved\n";

// Verify remaining URLs
$remaining = 0;
foreach ($posts as $post) {
    if (isset($post['content'])) {
        preg_match_all('/drvijayanandreddy\.com\/wp-content\/uploads/', $post['content'], $m);
        $remaining += count($m[0]);
    }
}
echo "Remaining wp-content/uploads URLs: $remaining\n";