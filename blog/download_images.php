<?php
// Image download script for blog posts
// Run: cd blog && php download_images.php

$posts = json_decode(file_get_contents("posts_data.json"), true);
$downloaded = 0;
$failed = 0;

echo "Starting image download for " . count($posts) . " posts...\n";

foreach ($posts as $post) {
    if (empty($post["images"])) {
        echo "Skipping (no images): " . substr($post['title'], 0, 40) . "...\n";
        continue;
    }

    $slug = preg_replace("/[^a-z0-9]+/", "-", strtolower($post["title"]));
    $slug = trim($slug, "-");
    if (strlen($slug) > 50) $slug = substr($slug, 0, 50);

    $dir = "assets/images/" . $post["id"] . "-" . $slug;
    if (!is_dir($dir)) mkdir($dir, 0777, true);

    foreach ($post["images"] as $i => $url) {
        $pathInfo = pathinfo(parse_url($url, PHP_URL_PATH));
        $ext = $pathInfo["extension"] ?: "jpg";
        if (strlen($ext) > 4) $ext = "jpg";
        $filename = $dir . "/image-" . ($i+1) . "." . $ext;

        if (!file_exists($filename)) {
            $ctx = stream_context_create([
                "http" => [
                    "timeout" => 15,
                    "user_agent" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36"
                ]
            ]);
            $img = @file_get_contents($url, false, $ctx);
            if ($img && strlen($img) > 1000) {
                file_put_contents($filename, $img);
                $downloaded++;
                echo "[OK] Downloaded: image-" . ($i+1) . "." . $ext . "\n";
            } else {
                $failed++;
                echo "[FAIL] Could not download: " . substr($url, 0, 60) . "...\n";
            }
        } else {
            echo "[SKIP] Already exists: " . basename($filename) . "\n";
        }
    }
    echo "Processed: " . substr($post['title'], 0, 40) . "...\n";
}

echo "\n========================================\n";
echo "Downloaded: $downloaded images\n";
echo "Failed: $failed images\n";
echo "========================================\n";
