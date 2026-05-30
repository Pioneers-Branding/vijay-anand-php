<?php
// Get posts data
$postsJson = file_get_contents(__DIR__ . '/posts_data.json');
$posts = json_decode($postsJson, true);

// Sort by date descending (newest first)
usort($posts, function($a, $b) {
    return strcmp($b['date'] ?? '', $a['date'] ?? '');
});

// Pagination
$postsPerPage = 9;
$totalPosts = count($posts);
$totalPages = ceil($totalPosts / $postsPerPage);
$currentPage = isset($_GET['page']) ? max(1, min(intval($_GET['page']), $totalPages)) : 1;
$offset = ($currentPage - 1) * $postsPerPage;
$paginatedPosts = array_slice($posts, $offset, $postsPerPage);

// Local images are resolved dynamically per post from the assets/blog-images-all/ folder.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="assets/logo/var-favicon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Blog - Dr. Vijay Anand Reddy</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        medical: {
                            blue: '#9B528F',
                            purple: '#8B5CF6',
                            light: '#F8FAFC',
                            dark: '#1E293B'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <?php include '../navbar.php'; ?>

    <!-- Hero Section -->
    <section class="relative py-20 md:py-28 bg-gradient-to-br from-medical-blue via-purple-600 to-medical-blue overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-40 h-40 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-60 h-60 bg-purple-300 rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/4 w-32 h-32 bg-pink-300 rounded-full blur-2xl"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <span class="inline-flex items-center bg-white/20 backdrop-blur text-white px-5 py-2 rounded-full text-sm font-medium mb-6">
                    <i data-feather="heart" class="w-4 h-4 mr-2"></i>
                    Health & Wellness
                </span>
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    Health Blog
                </h1>
                <p class="text-blue-100 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
                    Expert insights, patient stories, and cancer awareness articles from Dr. Vijay Anand Reddy
                </p>

                <!-- Stats -->
                <div class="flex flex-wrap justify-center gap-8 mt-12">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-white"><?= count($posts) ?></div>
                        <div class="text-blue-200 text-sm">Articles</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-white">34+</div>
                        <div class="text-blue-200 text-sm">Years Experience</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-white">2700+</div>
                        <div class="text-blue-200 text-sm">Reviews</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts Grid -->
    <section class="py-16 md:py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-medical-dark mb-4">Latest Articles</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Stay informed with our latest health tips, treatment insights, and patient stories.</p>
                </div>

                <!-- Grid -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ($paginatedPosts as $index => $post): ?>
                        <?php
                        $slug = preg_replace("/[^a-z0-9]+/", "-", strtolower($post['title']));
                        $slug = trim($slug, "-");
                        $slug = substr($slug, 0, 50);

                        // Find local image in assets/blog-images-all/
                        $localImage = null;
                        if (!empty($post['images'])) {
                            $firstImage = $post['images'][0];
                            if (strpos($firstImage, 'assets/') === 0 || strpos($firstImage, '/assets/') === 0) {
                                $localImage = (strpos($firstImage, '/') === 0) ? $firstImage : '/' . $firstImage;
                            } else {
                                $filename = basename(parse_url($firstImage, PHP_URL_PATH));
                                $localPath = 'assets/blog-images-all/' . $filename;
                                if (file_exists(dirname(__DIR__) . '/' . $localPath)) {
                                    $localImage = '/' . $localPath;
                                } else {
                                    $localImage = $firstImage; // fallback to external
                                }
                            }
                        }

                        // Extract excerpt from content
                        $content = strip_tags($post['content']);
                        $content = preg_replace('/\s+/', ' ', $content);
                        $content = trim($content);
                        $excerpt = strlen($content) > 150 ? substr($content, 0, 150) . '...' : $content;

                        // Fallback image from external URL
                        $fallbackImage = !empty($post['images'][0]) ? $post['images'][0] : '';
                        ?>

                        <article class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group">
                            <a href="view.php?id=<?= $post['id'] ?>&slug=<?= urlencode($slug) ?>" class="block">
                                <!-- Image Container -->
                                <div class="relative h-52 bg-gradient-to-br from-medical-blue/20 to-purple-100 overflow-hidden">
                                    <?php if ($localImage): ?>
                                        <img src="<?= $localImage ?>"
                                             alt="<?= htmlspecialchars($post['title']) ?>"
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <?php elseif ($fallbackImage): ?>
                                        <img src="<?= htmlspecialchars($fallbackImage) ?>"
                                             alt="<?= htmlspecialchars($post['title']) ?>"
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                             loading="lazy">
                                    <?php else: ?>
                                        <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                            <div class="text-center">
                                                <i data-feather="heart" class="w-16 h-16 text-medical-blue/30 mx-auto"></i>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Category Badge -->
                                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-4 py-2 rounded-full text-sm font-semibold text-medical-dark shadow-lg">
                                        <i data-feather="heart" class="w-3 h-3 inline mr-1"></i>
                                        Cancer Awareness
                                    </div>

                                    <!-- Hover Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-medical-blue/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                        <span class="text-white font-semibold flex items-center">
                                            Read Article
                                            <i data-feather="arrow-right" class="w-4 h-4 ml-2"></i>
                                        </span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="p-6">
                                    <div class="flex items-center text-gray-400 text-xs mb-2">
                                        <i data-feather="calendar" class="w-3.5 h-3.5 mr-1.5"></i>
                                        <span><?= date('M d, Y', strtotime($post['date'])) ?></span>
                                    </div>
                                    <h3 class="text-xl font-bold text-medical-dark mb-4 line-clamp-2 group-hover:text-medical-blue transition-colors duration-300">
                                        <?= htmlspecialchars($post['title']) ?>
                                    </h3>
                                    <p class="text-gray-600 text-sm mb-5 line-clamp-3 leading-relaxed">
                                        <?= htmlspecialchars($excerpt) ?>
                                    </p>

                                    <!-- Footer -->
                                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                        <div class="flex items-center text-medical-blue">
                                            <i data-feather="user" class="w-4 h-4 mr-2"></i>
                                            <span class="text-sm font-medium">Dr. Vijay Anand Reddy</span>
                                        </div>
                                        <div class="flex items-center text-gray-400 text-sm">
                                            <i data-feather="clock" class="w-4 h-4 mr-1"></i>
                                            <span>5 min</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <?php if ($totalPages > 1): ?>
                <div class="flex justify-center items-center gap-2 mt-12">
                    <?php if ($currentPage > 1): ?>
                        <a href="?page=<?= $currentPage - 1 ?>" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white shadow-md hover:bg-medical-blue hover:text-white transition-all text-medical-dark">
                            <i data-feather="chevron-left" class="w-5 h-5"></i>
                        </a>
                    <?php endif; ?>

                    <?php
                    $start = max(1, $currentPage - 2);
                    $end = min($totalPages, $currentPage + 2);

                    if ($start > 1): ?>
                        <a href="?page=1" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white shadow-md hover:bg-medical-blue hover:text-white transition-all text-medical-dark font-medium">1</a>
                        <?php if ($start > 2): ?>
                            <span class="px-2 text-gray-400">...</span>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php for ($i = $start; $i <= $end; $i++): ?>
                        <a href="?page=<?= $i ?>" class="w-10 h-10 flex items-center justify-center rounded-lg transition-all font-medium <?= $i === $currentPage ? 'bg-medical-blue text-white shadow-md' : 'bg-white shadow-md hover:bg-medical-blue hover:text-white text-medical-dark' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>

                    <?php if ($end < $totalPages): ?>
                        <?php if ($end < $totalPages - 1): ?>
                            <span class="px-2 text-gray-400">...</span>
                        <?php endif; ?>
                        <a href="?page=<?= $totalPages ?>" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white shadow-md hover:bg-medical-blue hover:text-white transition-all text-medical-dark font-medium"><?= $totalPages ?></a>
                    <?php endif; ?>

                    <?php if ($currentPage < $totalPages): ?>
                        <a href="?page=<?= $currentPage + 1 ?>" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white shadow-md hover:bg-medical-blue hover:text-white transition-all text-medical-dark">
                            <i data-feather="chevron-right" class="w-5 h-5"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <?php include '../contact-section.php'; ?>

    <!-- Footer -->
    <?php include '../footer.php'; ?>

    <!-- Back to Top Button -->
    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
            class="fixed bottom-6 right-6 w-12 h-12 bg-medical-blue text-white rounded-full shadow-lg hover:bg-purple-600 transition-all z-50 flex items-center justify-center opacity-0 invisible duration-300"
            id="backToTop">
        <i data-feather="chevron-up" class="w-5 h-5"></i>
    </button>

    <script>
        // Initialize Feather Icons
        feather.replace();

        // Back to Top Button
        const backToTop = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 400) {
                backToTop.classList.remove('opacity-0', 'invisible');
                backToTop.classList.add('opacity-100', 'visible');
            } else {
                backToTop.classList.add('opacity-0', 'invisible');
                backToTop.classList.remove('opacity-100', 'visible');
            }
        });
    </script>
</body>
</html>