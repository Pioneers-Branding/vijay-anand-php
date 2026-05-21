<?php
/**
 * Update remaining content URLs with local paths
 */

$jsonFile = 'posts_data.json';
$imagesDir = 'assets/blog-images-all/';

$postsJson = file_get_contents($jsonFile);
$posts = json_decode($postsJson, true);

if (!$posts) {
    die("Error reading posts_data.json\n");
}

$updatedPosts = 0;
$replacedUrls = 0;

foreach ($posts as &$post) {
    if (isset($post['content'])) {
        $content = $post['content'];

        // Find all external image URLs in content (src attributes)
        if (preg_match_all('/src=["\']([^"\']*drvijayanandreddy\.com[^"\']*)["\']/', $content, $matches)) {
            foreach ($matches[0] as $match) {
                // Extract URL from src="url"
                preg_match('/src=["\']([^"\']*drvijayanandreddy\.com[^"\']*)["\']/', $match, $urlMatch);
                $imageUrl = $urlMatch[1];

                // Extract filename from URL
                $urlPath = parse_url($imageUrl, PHP_URL_PATH);
                $filename = basename($urlPath);
                $localPath = $imagesDir . $filename;

                // Only replace if local file exists
                if (file_exists($localPath)) {
                    $post['content'] = str_replace($imageUrl, $localPath, $post['content']);
                    $replacedUrls++;
                }
            }
        }

        // Also handle srcset attributes
        if (preg_match_all('/srcset=["\']([^"\']*)["\']/', $content, $srcsetMatches)) {
            foreach ($srcsetMatches[0] as $idx => $srcsetAttr) {
                $srcsetValue = $srcsetMatches[1][$idx];
                $newSrcset = $srcsetValue;

                // Parse and replace each URL in srcset
                $urls = explode(',', $srcsetValue);
                foreach ($urls as &$urlPart) {
                    $parts = trim($urlPart);
                    if (strpos($parts, 'drvijayanandreddy.com') !== false) {
                        preg_match('/([^"\']*drvijayanandreddy\.com[^"\']*)/', $parts, $urlParts);
                        if (isset($urlParts[1])) {
                            $urlPath = parse_url($urlParts[1], PHP_URL_PATH);
                            $filename = basename($urlPath);
                            $localPath = $imagesDir . $filename;
                            if (file_exists($localPath)) {
                                $newSrcset = str_replace($urlParts[1], $localPath, $newSrcset);
                            }
                        }
                    }
                }

                $post['content'] = str_replace($srcsetAttr, 'srcset="' . $newSrcset . '"', $post['content']);
            }
        }

        // Also handle standalone URLs in content (separated by pipe or space)
        if (preg_match_all('/\|https?:\/\/drvijayanandreddy\.com[^\s|]*|https?:\/\/drvijayanandreddy\.com[^\s|]*/', $content, $pipeMatches)) {
            foreach ($pipeMatches[0] as $url) {
                $cleanUrl = trim($url, '|');
                $urlPath = parse_url($cleanUrl, PHP_URL_PATH);
                $filename = basename($urlPath);
                $localPath = $imagesDir . $filename;

                if (file_exists($localPath)) {
                    $post['content'] = str_replace($url, $localPath, $post['content']);
                    $replacedUrls++;
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
echo "Replaced $replacedUrls URLs in content\n";
echo "posts_data.json saved\n";

// Verify remaining external URLs
$remaining = 0;
foreach ($posts as $post) {
    if (isset($post['content']) && preg_match_all('/drvijayanandreddy\.com/', $post['content'], $m)) {
        $remaining += count($m[0]);
    }
}

echo "Remaining external URLs in content: $remaining\n";

if ($remaining > 0) {
    echo "\nListing remaining URLs for manual check...\n";
    foreach ($posts as $idx => $post) {
        if (isset($post['content']) && preg_match_all('/drvijayanandreddy\.com[^"\']*/', $post['content'], $m)) {
            echo "Post $idx: " . substr($post['title'], 0, 50) . "...\n";
            foreach (array_unique($m[0]) as $url) {
                echo "  - $url\n";
            }
        }
    }
}