<?php
header('Content-Type: text/plain');

echo "Current Directory: " . __DIR__ . "\n\n";

echo "Files in current directory:\n";
$files = scandir(__DIR__);
foreach ($files as $file) {
    if ($file === '.' || $file === '..') continue;
    $path = __DIR__ . '/' . $file;
    echo "  $file (" . (is_dir($path) ? 'dir' : filesize($path) . ' bytes') . ")\n";
}

echo "\nChecking if .htaccess exists:\n";
if (file_exists(__DIR__ . '/.htaccess')) {
    echo "  .htaccess exists!\n";
    echo "--- .htaccess Content ---\n";
    echo file_get_contents(__DIR__ . '/.htaccess');
    echo "\n-------------------------\n";
} else {
    echo "  .htaccess does not exist in this directory.\n";
}
?>
