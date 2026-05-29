<?php
header('Content-Type: text/plain');

echo "Current Directory: " . __DIR__ . "\n\n";

function checkFile($path) {
    if (file_exists($path)) {
        echo "  $path EXISTS! Size: " . filesize($path) . " bytes. Modified: " . date("Y-m-d H:i:s", filemtime($path)) . "\n";
    } else {
        echo "  $path does not exist.\n";
    }
}

echo "Checking sitemap.xml and robots.txt in Root:\n";
checkFile(__DIR__ . '/sitemap.xml');
checkFile(__DIR__ . '/robots.txt');

echo "\nChecking sitemap.xml and robots.txt in dist/:\n";
checkFile(__DIR__ . '/dist/sitemap.xml');
checkFile(__DIR__ . '/dist/robots.txt');

echo "\nChecking for .htaccess in Root:\n";
if (file_exists(__DIR__ . '/.htaccess')) {
    echo "  Root .htaccess EXISTS!\n";
    echo "--- Root .htaccess Content ---\n";
    echo file_get_contents(__DIR__ . '/.htaccess');
    echo "\n-------------------------\n";
} else {
    echo "  Root .htaccess does not exist.\n";
}

echo "\nChecking for .htaccess in dist/:\n";
if (file_exists(__DIR__ . '/dist/.htaccess')) {
    echo "  dist/ .htaccess EXISTS!\n";
    echo "--- dist/ .htaccess Content ---\n";
    echo file_get_contents(__DIR__ . '/dist/.htaccess');
    echo "\n-------------------------\n";
} else {
    echo "  dist/ .htaccess does not exist.\n";
}

echo "\nChecking server-side routing/rewriting:\n";
echo "  REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "\n";
echo "  SCRIPT_NAME: " . $_SERVER['SCRIPT_NAME'] . "\n";
?>
