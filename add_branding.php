<?php
/**
 * Utility script to add branding footer.
 */

$dir = __DIR__;
$filesUpdated = 0;
$totalReplacements = 0;

$target = "Built with care for cancer patients.";
$replacement = 'Built with care for cancer patients. | Made & designed by <a href="https://brandingpioneers.com/" target="_blank" rel="noopener noreferrer" class="hover:text-medical-blue transition-colors duration-200">Branding Pioneers</a>.';

function addBrandingToFile($filePath, $target, $replacement, &$filesUpdated, &$totalReplacements) {
    $content = file_get_contents($filePath);
    
    // Check if branding already exists
    if (strpos($content, 'brandingpioneers.com') !== false) {
        return;
    }

    $newContent = str_replace($target, $replacement, $content, $count);

    if ($count > 0) {
        file_put_contents($filePath, $newContent);
        $filesUpdated++;
        $totalReplacements += $count;
        echo "Added branding to: " . str_replace(__DIR__, '', $filePath) . " ($count replacements)\n";
    }
}

function scanDirRecursive($dirPath, $target, $replacement, &$filesUpdated, &$totalReplacements) {
    $it = new RecursiveDirectoryIterator($dirPath, RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($files as $file) {
        if ($file->isFile()) {
            $filePath = $file->getRealPath();
            $ext = pathinfo($filePath, PATHINFO_EXTENSION);
            if (in_array($ext, ['php', 'html'])) {
                $basename = basename($filePath);
                if (in_array($basename, ['add_branding.php', 'add_favicon.php', 'replace_stats.php', 'build.php', 'update_content_urls.php', 'update_pipe_urls.php', 'fix_remaining_urls.php'])) {
                    continue;
                }
                // Skip .git, .claude, etc.
                if (strpos($filePath, DIRECTORY_SEPARATOR . '.git') !== false || 
                    strpos($filePath, DIRECTORY_SEPARATOR . '.claude') !== false) {
                    continue;
                }
                addBrandingToFile($filePath, $target, $replacement, $filesUpdated, $totalReplacements);
            }
        }
    }
}

echo "Adding branding to all pages...\n";
scanDirRecursive($dir, $target, $replacement, $filesUpdated, $totalReplacements);
echo "\nBranding Integration Complete!\n";
echo "Files updated: $filesUpdated\n";
echo "Total replacements made: $totalReplacements\n";
