<?php
/**
 * Build script: Renders all PHP pages to static HTML for Netlify deployment.
 * Each page is rendered in a separate PHP process to avoid redeclaration issues.
 * Run with: php build.php
 */

$sourceDir = __DIR__;
$distDir = __DIR__ . DIRECTORY_SEPARATOR . 'dist';

// Files that are partials/data (not standalone pages)
$excludeFiles = [
    'navbar.php',
    'footer.php',
    'quote_section.php',
    'testimonials_widget.php',
    'video_testimonials.php',
    'events_data.php',
    'cancer_clinics_data.php',
    'conferences_data.php',
    'doctor_talks_data.php',
    'presentations_data.php',
    'awareness_lectures_data.php',
    'testimonials_data.php',
    'survivors_data.php',
    'print_gallery_data.php',
    'video_gallery_data.php',
    'extract_testimonials.php',
    'build.php',
];

// Clean and create dist directory
if (is_dir($distDir)) {
    $it = new RecursiveDirectoryIterator($distDir, RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($files as $file) {
        if ($file->isDir()) {
            rmdir($file->getRealPath());
        } else {
            unlink($file->getRealPath());
        }
    }
    rmdir($distDir);
}
mkdir($distDir, 0755, true);

// Copy assets folder
function copyDir($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst, 0755, true);
    while (($file = readdir($dir)) !== false) {
        if ($file === '.' || $file === '..') continue;
        $srcPath = $src . DIRECTORY_SEPARATOR . $file;
        $dstPath = $dst . DIRECTORY_SEPARATOR . $file;
        if (is_dir($srcPath)) {
            copyDir($srcPath, $dstPath);
        } else {
            copy($srcPath, $dstPath);
        }
    }
    closedir($dir);
}

echo "Copying assets...\n";
if (is_dir($sourceDir . DIRECTORY_SEPARATOR . 'assets')) {
    copyDir($sourceDir . DIRECTORY_SEPARATOR . 'assets', $distDir . DIRECTORY_SEPARATOR . 'assets');
    echo "  Assets copied.\n";
}

// Load dynamic data
$eventsData = [];
$survivorsData = [];

if (file_exists($sourceDir . '/events_data.php')) {
    include $sourceDir . '/events_data.php';
    $eventsData = $events;
}

if (file_exists($sourceDir . '/survivors_data.php')) {
    include $sourceDir . '/survivors_data.php';
    $survivorsData = $survivors;
}

// Find all page PHP files
$phpFiles = glob($sourceDir . DIRECTORY_SEPARATOR . '*.php');
$rendered = 0;
$errors = [];

echo "Rendering PHP pages to HTML...\n";
foreach ($phpFiles as $phpFile) {
    $basename = basename($phpFile);

    // Skip partials and data files
    if (in_array($basename, $excludeFiles) || preg_match('/_data\.php$/', $basename)) {
        echo "  Skipping: $basename\n";
        continue;
    }

    $htmlName = preg_replace('/\.php$/', '.html', $basename);

    // Render each page in a separate PHP process to avoid function redeclaration
    $escapedPath = escapeshellarg($phpFile);
    $cmd = "php $escapedPath 2>&1";
    $oldDir = getcwd();
    chdir($sourceDir);
    $html = shell_exec($cmd);
    chdir($oldDir);

    if ($html === null) {
        $errors[] = "$basename: shell_exec returned null";
        echo "  ERROR: $basename\n";
        continue;
    }

    // Replace .php links with .html links (only in href attributes)
    $html = preg_replace('/href="([^"]*?)\.php(["#])/', 'href="$1.html$2', $html);

    // Write HTML file
    $outPath = $distDir . DIRECTORY_SEPARATOR . $htmlName;
    file_put_contents($outPath, $html);
    $rendered++;
    echo "  Rendered: $basename -> $htmlName\n";
}

// Generate static detail pages for events
echo "\nGenerating event detail pages...\n";
foreach ($eventsData as $event) {
    $eventId = $event['id'];
    $eventHtmlName = "event-$eventId.html";

    // Create temp file to render with proper $_GET
    $tempFile = $distDir . '/_temp_render.php';
    file_put_contents($tempFile, "<?php \$_GET['id']='$eventId';include '" . addslashes($sourceDir) . "/events.php';");
    $cmd = "php " . escapeshellarg($tempFile) . " 2>&1";
    $html = shell_exec($cmd);
    unlink($tempFile);

    if ($html && strlen($html) > 1000) {
        $html = preg_replace('/href="([^"]*?)\.php(["#])/', 'href="$1.html$2', $html);
        $html = str_replace("Events & Awareness Programmes - Dr. Vijay Anand Reddy",
            htmlspecialchars($event['title']) . " - Dr. Vijay Anand Reddy", $html);
        $outPath = $distDir . DIRECTORY_SEPARATOR . $eventHtmlName;
        file_put_contents($outPath, $html);
        echo "  Generated: $eventHtmlName\n";
        $rendered++;
    } else {
        echo "  Failed: $eventHtmlName\n";
    }
}

// Generate static detail pages for survivors
echo "\nGenerating survivor detail pages...\n";
foreach ($survivorsData as $survivor) {
    $survivorId = $survivor['id'];
    $survivorHtmlName = "survivor-$survivorId.html";

    // Create temp file to render with proper $_GET
    $tempFile = $distDir . '/_temp_render.php';
    file_put_contents($tempFile, "<?php \$_GET['id']='$survivorId';include '" . addslashes($sourceDir) . "/survivors.php';");
    $cmd = "php " . escapeshellarg($tempFile) . " 2>&1";
    $html = shell_exec($cmd);
    unlink($tempFile);

    if ($html && strlen($html) > 1000) {
        $html = preg_replace('/href="([^"]*?)\.php(["#])/', 'href="$1.html$2', $html);
        $outPath = $distDir . DIRECTORY_SEPARATOR . $survivorHtmlName;
        file_put_contents($outPath, $html);
        echo "  Generated: $survivorHtmlName\n";
        $rendered++;
    } else {
        echo "  Failed: $survivorHtmlName\n";
    }
}

// Create _redirects for Netlify
$redirects = "# Redirect .php URLs to .html\n";
foreach ($phpFiles as $phpFile) {
    $basename = basename($phpFile);
    if (in_array($basename, $excludeFiles) || preg_match('/_data\.php$/', $basename)) continue;
    $htmlName = preg_replace('/\.php$/', '.html', $basename);
    $redirects .= "/$basename    /$htmlName    301\n";
}
// SPA-style fallback for index
$redirects .= "/    /index.html    200\n";
file_put_contents($distDir . DIRECTORY_SEPARATOR . '_redirects', $redirects);

// Update onclick links in list pages to point to static detail pages
echo "\nUpdating event links in events.html...\n";
$eventsHtmlPath = $distDir . '/events.html';
if (file_exists($eventsHtmlPath)) {
    $eventsHtml = file_get_contents($eventsHtmlPath);
    // Fix event links: events.php?id=X -> event-X.html
    $eventsHtml = preg_replace("/window\.location\.href='events\.php\?id=([^']+)'/", "window.location.href='event-$1.html'", $eventsHtml);
    // Fix any corrupted toggleMobileDropdown('.html'xxx)
    $eventsHtml = preg_replace("/toggleMobileDropdown\(\"\.html'|\toggleMobileDropdown\(\"\.html\"|\.html'\"\.html'\"/", "", $eventsHtml);
    $eventsHtml = preg_replace("/\.html'\.html'/", ".html'", $eventsHtml);
    $eventsHtml = str_replace("(.html'", "('", $eventsHtml);
    file_put_contents($eventsHtmlPath, $eventsHtml);
}

echo "Updating survivor links in survivors.html...\n";
$survivorsHtmlPath = $distDir . '/survivors.html';
if (file_exists($survivorsHtmlPath)) {
    $survivorsHtml = file_get_contents($survivorsHtmlPath);
    // Fix survivor links: survivors.php?id=X -> survivor-X.html
    $survivorsHtml = preg_replace("/window\.location\.href='survivors\.php\?id=([^']+)'/", "window.location.href='survivor-$1.html'", $survivorsHtml);
    file_put_contents($survivorsHtmlPath, $survivorsHtml);
}

echo "\n=== Build Complete ===\n";
echo "Rendered: $rendered pages\n";
echo "Output: dist/\n";
if (!empty($errors)) {
    echo "Errors: " . count($errors) . "\n";
    foreach ($errors as $err) echo "  - $err\n";
}
