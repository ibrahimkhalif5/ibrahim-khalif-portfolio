<?php
/**
 * Build the portfolio as a single static HTML page for GitHub Pages.
 * Run: php build-static.php
 * Output: docs/index.html + docs/build/ assets
 */

// Use SQLite and array drivers for static build (no MySQL needed)
if (!file_exists(__DIR__ . '/database/database.sqlite')) {
    touch(__DIR__ . '/database/database.sqlite');
}
if (!getenv('APP_KEY') && !isset($_ENV['APP_KEY'])) {
    $appKey = null;
    if (is_file(__DIR__ . '/.env')) {
        foreach (file(__DIR__ . '/.env', FILE_IGNORE_NEW_LINES) as $line) {
            if (str_starts_with($line, 'APP_KEY=')) {
                $appKey = substr($line, 8);
                break;
            }
        }
    }
    $appKey = $appKey ?: ('base64:' . base64_encode(random_bytes(32)));
    putenv('APP_KEY=' . $appKey);
    $_ENV['APP_KEY'] = $appKey;
}
putenv('DB_CONNECTION=sqlite');
putenv('DB_DATABASE=' . __DIR__ . '/database/database.sqlite');
putenv('SESSION_DRIVER=array');
putenv('CACHE_STORE=array');
putenv('QUEUE_CONNECTION=array');
$_ENV['DB_CONNECTION'] = 'sqlite';
$_ENV['DB_DATABASE'] = __DIR__ . '/database/database.sqlite';
$_ENV['SESSION_DRIVER'] = 'array';
$_ENV['CACHE_STORE'] = 'array';
$_ENV['QUEUE_CONNECTION'] = 'array';

// Bootstrap Laravel
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$html = $response->getContent();

// Create docs directory
$docsDir = __DIR__ . '/docs';
if (!is_dir($docsDir)) {
    mkdir($docsDir, 0755, true);
}

// Rewrite asset URLs from /build/ to ./build/
$html = str_replace(
    ['src="/build/', 'href="/build/', 'href="/images/', 'src="/images/', 'href="/favicon', 'href="/apple-touch'],
    ['src="build/', 'href="build/', 'href="images/', 'src="images/', 'href="favicon', 'href="apple-touch'],
    $html
);

// Fix canonical and OG URLs for GitHub Pages
$ghPagesUrl = 'https://ibrahimkhalif5.github.io/ibrahim-khalif-portfolio';
$html = str_replace('https://yourdomain.com', $ghPagesUrl, $html);
$html = str_replace('http://yourdomain.com', $ghPagesUrl, $html);

// Rewrite all localhost/CLI-generated asset URLs to relative paths
$html = preg_replace('#https?://[^/"\'<>\s]*/build/#', 'build/', $html);
// Rewrite CLI-generated local URLs to GitHub Pages absolute URLs
$html = preg_replace('#https?://[^/"\'<>\s]*/images/#', $ghPagesUrl . '/images/', $html);
$html = preg_replace('#https?://[^/"\'<>\s]*/favicon#', $ghPagesUrl . '/favicon', $html);
$html = preg_replace('#https?://[^/"\'<>\s]*/apple-touch#', $ghPagesUrl . '/apple-touch', $html);
$html = preg_replace('#https?://[^/"\'<>\s]*/Ibrahim-Khalif-Ali-Resume\.pdf#', $ghPagesUrl . '/Ibrahim-Khalif-Ali-Resume.pdf', $html);

// Write index.html
file_put_contents($docsDir . '/index.html', $html);

// Copy build assets
$buildSource = __DIR__ . '/public/build';
$buildDest = $docsDir . '/build';
if (is_dir($buildDest)) {
    deleteDir($buildDest);
}
copyDir($buildSource, $buildDest);

// Copy images
$imagesSource = __DIR__ . '/public/images';
if (is_dir($imagesSource)) {
    $imagesDest = $docsDir . '/images';
    if (!is_dir($imagesDest)) {
        mkdir($imagesDest, 0755, true);
    }
    copyDir($imagesSource, $imagesDest);
}

// Copy favicon files
foreach (['favicon.svg', 'favicon.ico', 'apple-touch-icon.png'] as $file) {
    $src = __DIR__ . '/public/' . $file;
    if (file_exists($src)) {
        copy($src, $docsDir . '/' . $file);
    }
}

// Copy robots.txt
copy(__DIR__ . '/public/robots.txt', $docsDir . '/robots.txt');

// Generate sitemap.xml
$sitemapXml = '<?xml version="1.0" encoding="UTF-8"?>';
$sitemapXml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
$sitemapXml .= '<url><loc>https://ibrahimkhalif5.github.io/ibrahim-khalif-portfolio/</loc><lastmod>' . date('Y-m-d') . '</lastmod><changefreq>monthly</changefreq><priority>1.0</priority></url>';
$sitemapXml .= '</urlset>';
file_put_contents($docsDir . '/sitemap.xml', $sitemapXml);

// Copy robots.txt with updated sitemap URL
$robots = "User-agent: *\nAllow: /\n\nSitemap: https://ibrahimkhalif5.github.io/ibrahim-khalif-portfolio/sitemap.xml\n";
file_put_contents($docsDir . '/robots.txt', $robots);

// Copy the live admin upload page
if (file_exists(__DIR__ . '/public/admin.html')) {
    copy(__DIR__ . '/public/admin.html', $docsDir . '/admin.html');
}

echo "Static build complete: docs/\n";
echo "Files created:\n";
foreach (globRecursive($docsDir) as $file) {
    $relative = str_replace($docsDir . '/', '', $file);
    if (is_file($file)) {
        echo "  {$relative} (" . number_format(filesize($file)) . " bytes)\n";
    }
}

function copyDir($src, $dest) {
    if (!is_dir($dest)) {
        mkdir($dest, 0755, true);
    }
    $items = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($src, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    foreach ($items as $item) {
        $rel = str_replace($src, '', $item->getPathname());
        $target = $dest . $rel;
        if ($item->isDir()) {
            if (!is_dir($target)) {
                mkdir($target, 0755, true);
            }
        } else {
            copy($item->getPathname(), $target);
        }
    }
}

function deleteDir($dir) {
    $items = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($items as $item) {
        $item->isDir() ? rmdir($item->getPathname()) : unlink($item->getPathname());
    }
    rmdir($dir);
}

function globRecursive($dir) {
    $results = [];
    foreach (new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS)
    ) as $file) {
        if ($file->isFile()) {
            $results[] = $file->getPathname();
        }
    }
    return $results;
}
