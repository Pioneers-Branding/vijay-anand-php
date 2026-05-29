<?php
header('Content-Type: text/plain');

echo "SERVER_SOFTWARE: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') . "\n";
echo "DOCUMENT_ROOT: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'Unknown') . "\n";
echo "Current Directory: " . __DIR__ . "\n\n";

echo "Testing local reading of sitemap.xml:\n";
if (file_exists('sitemap.xml')) {
    echo "  sitemap.xml exists in local path!\n";
    $content = file_get_contents('sitemap.xml');
    if ($content !== false) {
        echo "  Successfully read! First 150 chars:\n";
        echo "  " . substr($content, 0, 150) . "\n";
    } else {
        echo "  Failed to read sitemap.xml content.\n";
    }
} else {
    echo "  sitemap.xml does not exist in local path.\n";
}

echo "\nTesting local reading of robots.txt:\n";
if (file_exists('robots.txt')) {
    echo "  robots.txt exists in local path!\n";
    $content = file_get_contents('robots.txt');
    if ($content !== false) {
        echo "  Successfully read! Content:\n";
        echo "  " . trim($content) . "\n";
    } else {
        echo "  Failed to read robots.txt content.\n";
    }
} else {
    echo "  robots.txt does not exist in local path.\n";
}
?>
