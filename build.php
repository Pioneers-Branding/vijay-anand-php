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
    'blog-post.php',
    'blog-listing.php',
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
mkdir($distDir . DIRECTORY_SEPARATOR . 'blog', 0755, true);

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

function adjustRelativePaths($html, $depth = 1) {
    $prefix = str_repeat('../', $depth);
    
    // Replace relative href and src attributes that don't start with http, https, mailto, /, #
    $html = preg_replace_callback('/(src|href)=["\'](?!http|https|mailto|\/|#)([^"\']+)["\']/i', function($matches) use ($prefix) {
        $attr = $matches[1];
        $val = $matches[2];
        if (strpos($val, '../') === 0) {
            return $matches[0];
        }
        return $attr . '="' . $prefix . $val . '"';
    }, $html);
    
    // Handle srcset
    $html = preg_replace_callback('/srcset=["\']([^"\']+)["\']/i', function($matches) use ($prefix) {
        $parts = explode(',', $matches[1]);
        foreach ($parts as &$part) {
            $part = trim($part);
            if (!empty($part) && !preg_match('/^(?:http|https|\/|\.\.\/)/', $part)) {
                $part = $prefix . $part;
            }
        }
        return 'srcset="' . implode(', ', $parts) . '"';
    }, $html);
    
    return $html;
}

function replaceBlogLinks($html, $blogLinkMap) {
    return preg_replace_callback('/href=["\'](?:..\/)?blog-post\.(?:php|html)\?id=(\d+)(?:[^"\']*)["\']/', function($matches) use ($blogLinkMap) {
        $id = $matches[1];
        if (isset($blogLinkMap[$id])) {
            return 'href="' . $blogLinkMap[$id] . '"';
        }
        return $matches[0];
    }, $html);
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

// Load dynamic blog data & build link map
$blogData = [];
if (file_exists($sourceDir . '/posts_data.json')) {
    $blogData = json_decode(file_get_contents($sourceDir . '/posts_data.json'), true) ?: [];
}
$blogLinkMap = [];
foreach ($blogData as $post) {
    $urlPath = !empty($post['permalink']) ? parse_url($post['permalink'], PHP_URL_PATH) : '';
    $friendlySlug = trim((string)$urlPath, '/');
    if (empty($friendlySlug) || strpos($friendlySlug, '?p=') !== false) {
        $friendlySlug = preg_replace("/[^a-z0-9]+/", "-", strtolower($post['title']));
        $friendlySlug = trim($friendlySlug, "-");
        $friendlySlug = substr($friendlySlug, 0, 50);
        $friendlySlug = trim($friendlySlug, "-");
        $friendlySlug = 'blog/' . $friendlySlug;
    }
    $blogLinkMap[$post['id']] = '/' . $friendlySlug;
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

    // Replace dynamic blog post links with clean /blog/[slug] links
    $html = replaceBlogLinks($html, $blogLinkMap);

    // Replace blog-listing link with /blog/
    $html = str_replace('href="blog-listing.html"', 'href="/blog/"', $html);

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
    $tempFile = $sourceDir . DIRECTORY_SEPARATOR . '_temp_render.php';
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
    $tempFile = $sourceDir . DIRECTORY_SEPARATOR . '_temp_render.php';
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

// Generate static detail pages for blogs
echo "\nGenerating blog detail pages...\n";
foreach ($blogData as $post) {
    $postId = $post['id'];
    if (empty($postId)) continue;

    $urlPath = !empty($post['permalink']) ? parse_url($post['permalink'], PHP_URL_PATH) : '';
    $friendlySlug = trim((string)$urlPath, '/');
    if (empty($friendlySlug) || strpos($friendlySlug, '?p=') !== false) {
        $friendlySlug = preg_replace("/[^a-z0-9]+/", "-", strtolower($post['title']));
        $friendlySlug = trim($friendlySlug, "-");
        $friendlySlug = substr($friendlySlug, 0, 50);
        $friendlySlug = trim($friendlySlug, "-");
        $friendlySlug = 'blog/' . $friendlySlug;
    }

    $blogHtmlName = "$friendlySlug.html";

    // Create temp file to render with proper $_GET
    $tempFile = $sourceDir . DIRECTORY_SEPARATOR . '_temp_render.php';
    file_put_contents($tempFile, "<?php \$_GET['id']='$postId';include '" . addslashes($sourceDir) . "/blog-post.php';");
    $cmd = "php " . escapeshellarg($tempFile) . " 2>&1";
    $html = shell_exec($cmd);
    unlink($tempFile);

    if ($html && strlen($html) > 1000) {
        $html = preg_replace('/href="([^"]*?)\.php(["#])/', 'href="$1.html$2', $html);
        $html = replaceBlogLinks($html, $blogLinkMap);
        $html = str_replace('href="blog-listing.html"', 'href="/blog/"', $html);
        $html = str_replace('href="../blog-listing.html"', 'href="/blog/"', $html);
        $html = adjustRelativePaths($html, 1);
        
        $outPath = $distDir . DIRECTORY_SEPARATOR . $blogHtmlName;
        file_put_contents($outPath, $html);
        echo "  Generated: $blogHtmlName\n";
        $rendered++;
    } else {
        echo "  Failed: $blogHtmlName\n";
    }
}

// Generate static blog listing page at /blog/
echo "\nGenerating blog listing page...\n";
$tempFile = $sourceDir . DIRECTORY_SEPARATOR . '_temp_render.php';
file_put_contents($tempFile, "<?php include '" . addslashes($sourceDir) . "/blog-listing.php';");
$cmd = "php " . escapeshellarg($tempFile) . " 2>&1";
$html = shell_exec($cmd);
unlink($tempFile);

if ($html && strlen($html) > 1000) {
    $html = preg_replace('/href="([^"]*?)\.php(["#])/', 'href="$1.html$2', $html);
    $html = replaceBlogLinks($html, $blogLinkMap);
    $html = str_replace('href="blog-listing.html"', 'href="/blog/"', $html);
    $html = str_replace('href="../blog-listing.html"', 'href="/blog/"', $html);
    $html = adjustRelativePaths($html, 1);
    
    $outPath = $distDir . DIRECTORY_SEPARATOR . 'blog' . DIRECTORY_SEPARATOR . 'index.html';
    file_put_contents($outPath, $html);
    echo "  Generated: blog/index.html\n";
    $rendered++;
} else {
    echo "  Failed to generate blog listing page.\n";
}

// Create _redirects for Netlify
$redirects = "# Redirect .php URLs to .html\n";
foreach ($phpFiles as $phpFile) {
    $basename = basename($phpFile);
    if (in_array($basename, $excludeFiles) || preg_match('/_data\.php$/', $basename)) continue;
    $htmlName = preg_replace('/\.php$/', '.html', $basename);
    $redirects .= "/$basename    /$htmlName    301\n";
}
$redirects .= "/blog-listing.html    /blog/    301\n";
$redirects .= "/blog-listing.php     /blog/    301\n";

// Add blog redirects for SEO from git base posts
$gitCmd = 'git show cb1a5b4:posts_data.json';
$baseJsonContent = shell_exec($gitCmd);
if ($baseJsonContent) {
    $basePosts = json_decode($baseJsonContent, true);
    if ($basePosts) {
        $redirects .= "\n# Blog redirects for SEO\n";
        foreach ($basePosts as $oldPost) {
            if (empty($oldPost['permalink'])) {
                continue;
            }
            $oldUrlPath = parse_url($oldPost['permalink'], PHP_URL_PATH);
            $oldSlug = trim($oldUrlPath, '/');
            
            $postId = $oldPost['id'];
            if (isset($blogLinkMap[$postId])) {
                $newUrlPath = parse_url($blogLinkMap[$postId], PHP_URL_PATH);
                $cleanSlug = trim($newUrlPath, '/');
                
                if (!empty($oldSlug) && $oldSlug !== $cleanSlug) {
                    $redirects .= "/$oldSlug    /$cleanSlug    301\n";
                    $redirects .= "/$oldSlug/    /$cleanSlug    301\n";
                }
            }
        }
    }
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
