<?php
/**
 * Download all blog images and update posts_data.json with local paths
 * Uses shell commands for reliable downloads
 */

$jsonFile = 'posts_data.json';
$imagesDir = 'assets/blog-images-all/';

// Create images directory if not exists
if (!is_dir($imagesDir)) {
    mkdir($imagesDir, 0755, true);
}

// Read posts data
$postsJson = file_get_contents($jsonFile);
$posts = json_decode($postsJson, true);

if (!$posts) {
    die("Error reading posts_data.json\n");
}

$totalImages = 0;
$downloadedImages = 0;
$failedImages = 0;
$skippedImages = 0;

echo "Starting download and update process...\n";
echo "Total posts: " . count($posts) . "\n\n";

// Find all unique image URLs
$allImageUrls = [];

foreach ($posts as $post) {
    if (isset($post['images']) && is_array($post['images'])) {
        foreach ($post['images'] as $imageUrl) {
            // Only add external URLs
            if (strpos($imageUrl, '://') !== false) {
                $allImageUrls[$imageUrl] = true;
            }
        }
    }
}

$uniqueUrls = array_keys($allImageUrls);
$totalUnique = count($uniqueUrls);
echo "Found $totalUnique unique external images to download\n\n";

$count = 0;
$failedUrls = [];

// Download each unique image
foreach ($uniqueUrls as $imageUrl) {
    $count++;

    // Extract filename from URL
    $urlPath = parse_url($imageUrl, PHP_URL_PATH);
    $filename = basename($urlPath);
    $localPath = $imagesDir . $filename;

    // Skip if already exists
    if (file_exists($localPath)) {
        echo "[$count/$totalUnique] Already exists: $filename\n";
        $skippedImages++;
        continue;
    }

    echo "[$count/$totalUnique] Downloading: $filename\n";

    // Use shell curl command
    $escapedUrl = escapeshellarg($imageUrl);
    $escapedPath = escapeshellarg($localPath);
    $cmd = "curl -L -o $escapedPath -A \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36\" --connect-timeout 20 $escapedUrl 2>&1";
    $output = shell_exec($cmd);

    // Check if file was downloaded
    if (file_exists($localPath) && filesize($localPath) > 0) {
        echo "  OK (".filesize($localPath)." bytes)\n";
        $downloadedImages++;
    } else {
        echo "  FAILED\n";
        $failedImages++;
        $failedUrls[] = $imageUrl;
    }
}

echo "\n===========================================\n";
echo "Download complete!\n";
echo "Total unique images: $totalUnique\n";
echo "Downloaded: $downloadedImages\n";
echo "Skipped (exists): $skippedImages\n";
echo "Failed: $failedImages\n";
echo "===========================================\n";

// Now update posts_data.json with local paths
echo "\nUpdating posts_data.json with local paths...\n";

$updatedPosts = 0;
foreach ($posts as $postIndex => &$post) {
    if (isset($post['images']) && is_array($post['images'])) {
        foreach ($post['images'] as $imgIndex => $imageUrl) {
            if (strpos($imageUrl, '://') !== false) {
                $urlPath = parse_url($imageUrl, PHP_URL_PATH);
                $filename = basename($urlPath);
                $localPath = $imagesDir . $filename;

                // Verify local file exists
                if (file_exists($localPath)) {
                    $post['images'][$imgIndex] = $localPath;
                }
            }
        }
        $updatedPosts++;
    }
}

// Save updated posts data
$updatedJson = json_encode($posts, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
file_put_contents($jsonFile, $updatedJson);

echo "Updated $updatedPosts posts\n";
echo "posts_data.json saved with local paths\n";

if (count($failedUrls) > 0) {
    echo "\nFailed URLs:\n";
    foreach ($failedUrls as $url) {
        echo "  - $url\n";
    }
}