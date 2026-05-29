<?php
header('Content-Type: text/plain');

echo "SERVER_SOFTWARE: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown') . "\n";
echo "DOCUMENT_ROOT: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'Unknown') . "\n";
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

echo "\nChecking for .htaccess in parent directories:\n";
$parentDirs = [
    dirname(__DIR__),
    dirname(dirname(__DIR__)),
    dirname(dirname(dirname(__DIR__)))
];
foreach ($parentDirs as $pDir) {
    $htaccessPath = $pDir . '/.htaccess';
    echo "  Checking $htaccessPath:\n";
    if (file_exists($htaccessPath)) {
        echo "    EXISTS!\n";
        echo "--- Content ---\n";
        echo file_get_contents($htaccessPath);
        echo "\n---------------\n";
    } else {
        echo "    Does not exist.\n";
    }
}

echo "\nTesting local reading of sitemap.xml:\n";
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
?>
