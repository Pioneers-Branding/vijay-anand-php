<?php
// Get post data
$postsJson = file_get_contents('posts_data.json');
$posts = json_decode($postsJson, true);

$postId = intval($_GET['id'] ?? 0);
$slug = $_GET['slug'] ?? '';
$post = null;
foreach ($posts as $p) {
    if ($postId > 0 && intval($p['id']) === $postId) {
        $post = $p;
        break;
    }
    if (!empty($slug)) {
        $postUrlPath = !empty($p['permalink']) ? parse_url($p['permalink'], PHP_URL_PATH) : '';
        $postSlug = basename($postUrlPath);
        if ($postSlug === $slug) {
            $post = $p;
            break;
        }
    }
}

if (!$post) {
    header('Location: index.php');
    exit;
}

// Find local featured image in assets/blog-images-all/ first, then fallback to external URL
$featuredImage = null;
if (!empty($post['images'])) {
    $firstImage = $post['images'][0];
    if (strpos($firstImage, 'assets/') === 0 || strpos($firstImage, '/assets/') === 0) {
        $featuredImage = (strpos($firstImage, '/') === 0) ? $firstImage : '/' . $firstImage;
    } else {
        $filename = basename(parse_url($firstImage, PHP_URL_PATH));
        $localPath = 'assets/blog-images-all/' . $filename;
        if (file_exists(dirname(__DIR__) . '/' . $localPath)) {
            $featuredImage = '/' . $localPath;
        } else {
            $featuredImage = $firstImage; // fallback to external
        }
    }
}

// Related posts
$related = array_slice(array_filter($posts, fn($p) => intval($p['id']) !== $postId), 0, 6);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="assets/logo/var-favicon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($post['title']) ?> - Dr. Vijay Anand Reddy</title>
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
        .blog-content p { margin-bottom: 1.25rem; line-height: 1.9; }
        .blog-content ul, .blog-content ol { margin: 1.25rem 0; padding-left: 1.75rem; }
        .blog-content li { margin-bottom: 0.75rem; line-height: 1.7; }
        .blog-content ul li { list-style-type: disc; }
        .blog-content ol li { list-style-type: decimal; }
        .blog-content strong { color: #1E293B; font-weight: 700; }
        .blog-content h1, .blog-content h2, .blog-content h3 { color: #1E293B; margin: 2rem 0 1rem; font-weight: 700; line-height: 1.3; }
        .blog-content h2 { font-size: 1.75rem; }
        .blog-content h3 { font-size: 1.375rem; }
        .blog-content blockquote { border-left: 4px solid #9B528F; padding: 1rem 1.5rem; font-style: italic; color: #64748b; margin: 2rem 0; background: #f8fafc; border-radius: 0 0.5rem 0.5rem 0; }
        .blog-content img { max-width: 100%; height: auto; border-radius: 0.75rem; margin: 2rem 0; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); }
        .blog-content em { color: #64748b; }
        .blog-content a { color: #9B528F; text-decoration: underline; }
        .blog-content table { width: 100%; border-collapse: collapse; margin: 1.5rem 0; }
        .blog-content th, .blog-content td { border: 1px solid #e2e8f0; padding: 0.75rem; text-align: left; }
        .blog-content th { background: #f8fafc; font-weight: 600; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <?php include '../navbar.php'; ?>

    <article class="pb-16">
        <!-- Hero Section with Breadcrumb -->
        <section class="relative py-16 md:py-24 bg-gradient-to-br from-medical-blue via-purple-600 to-medical-blue overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-20 left-10 w-32 h-32 bg-white rounded-full blur-3xl"></div>
                <div class="absolute bottom-10 right-20 w-48 h-48 bg-purple-300 rounded-full blur-3xl"></div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <!-- Breadcrumb -->
                <nav class="flex items-center justify-center mb-6 text-sm">
                    <a href="index.php" class="text-blue-100 hover:text-white flex items-center transition">
                        <i data-feather="arrow-left" class="w-4 h-4 mr-2"></i>
                        Back to Blog
                    </a>
                </nav>

                <div class="max-w-4xl mx-auto text-center">
                    <span class="inline-flex items-center bg-white/20 backdrop-blur text-white px-5 py-2 rounded-full text-sm font-medium mb-6">
                        <i data-feather="heart" class="w-4 h-4 mr-2"></i>
                        Cancer Awareness
                    </span>

                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white leading-tight mb-6">
                        <?= htmlspecialchars($post['title']) ?>
                    </h1>

                    <div class="flex flex-wrap items-center justify-center gap-6 text-blue-100">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center mr-3">
                                <i data-feather="user" class="w-5 h-5 text-white"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-white font-semibold">Dr. Vijay Anand Reddy</p>
                                <p class="text-xs text-blue-200">Oncologist</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <i data-feather="calendar" class="w-4 h-4 mr-2"></i>
                            <span><?= date('F j, Y', strtotime($post['date'])) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Image -->
        <?php if ($featuredImage): ?>
        <div class="container mx-auto px-4 -mt-10 relative z-20">
            <div class="max-w-5xl mx-auto">
                <div class="rounded-2xl overflow-hidden shadow-2xl ring-4 ring-white">
                    <img src="<?= htmlspecialchars($featuredImage) ?>"
                         alt="<?= htmlspecialchars($post['title']) ?>"
                         class="w-full h-64 sm:h-80 md:h-96 object-cover"
                         onerror="this.parentElement.style.display='none'">
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Content Section -->
        <section class="py-12 md:py-16">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto">
                    <!-- Share Buttons (Sticky on Desktop) -->
                    <div class="hidden lg:flex flex-col items-center gap-3 fixed left-6 top-1/2 -translate-y-1/2 z-30">
                        <span class="text-xs font-semibold text-gray-400 tracking-wider transform -rotate-90 mb-4">SHARE</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('https://drvijayanandreddy.com/blog-post.php?id=' . $postId) ?>"
                           target="_blank" rel="noopener"
                           class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition shadow-lg">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=<?= urlencode('https://drvijayanandreddy.com/blog-post.php?id=' . $postId) ?>&text=<?= urlencode($post['title']) ?>"
                           target="_blank" rel="noopener"
                           class="w-10 h-10 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition shadow-lg">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://wa.me/?text=<?= urlencode($post['title'] . ' - https://drvijayanandreddy.com/blog/view.php?id=' . $postId) ?>"
                           target="_blank" rel="noopener"
                           class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition shadow-lg">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode('https://drvijayanandreddy.com/blog-post.php?id=' . $postId) ?>&title=<?= urlencode($post['title']) ?>"
                           target="_blank" rel="noopener"
                           class="w-10 h-10 bg-blue-700 text-white rounded-full flex items-center justify-center hover:bg-blue-800 transition shadow-lg">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>

                    <!-- Main Content Card -->
                    <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 md:p-12">
                        <!-- Mobile Share Bar -->
                        <div class="lg:hidden flex items-center justify-center gap-3 mb-8 pb-6 border-b">
                            <span class="text-sm font-semibold text-gray-400">Share:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('https://drvijayanandreddy.com/blog-post.php?id=' . $postId) ?>"
                               target="_blank" rel="noopener" class="w-9 h-9 bg-blue-600 text-white rounded-full flex items-center justify-center">
                                <i class="fab fa-facebook-f text-sm"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?= urlencode('https://drvijayanandreddy.com/blog-post.php?id=' . $postId) ?>"
                               target="_blank" rel="noopener" class="w-9 h-9 bg-sky-500 text-white rounded-full flex items-center justify-center">
                                <i class="fab fa-twitter text-sm"></i>
                            </a>
                            <a href="https://wa.me/?text=<?= urlencode($post['title'] . ' - https://drvijayanandreddy.com/blog/view.php?id=' . $postId) ?>"
                               target="_blank" rel="noopener" class="w-9 h-9 bg-green-500 text-white rounded-full flex items-center justify-center">
                                <i class="fab fa-whatsapp text-sm"></i>
                            </a>
                        </div>

                        <!-- Article Content -->
                        <div class="blog-content text-gray-700 text-lg">
                            <?php 
                            // Rewrite external WordPress upload URLs to local assets directory
                            $postContent = $post['content'];
                            $postContent = preg_replace('/https?:\/\/drvijayanandreddy\.com\/wp-content\/uploads\/\d{4}\/\d{2}\//', '/assets/blog-images-all/', $postContent);
                            echo $postContent;
                            ?>
                        </div>

                        <!-- Article Footer -->
                        <div class="mt-12 pt-8 border-t border-gray-100">
                            <!-- Tags -->
                            <div class="flex flex-wrap gap-2 mb-8">
                                <span class="px-4 py-2 bg-medical-blue/10 text-medical-blue rounded-full text-sm font-medium">Cancer Awareness</span>
                                <span class="px-4 py-2 bg-purple-100 text-purple-700 rounded-full text-sm font-medium">Health Tips</span>
                                <span class="px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-medium"><?= htmlspecialchars(substr($post['title'], 0, 20)) ?>...</span>
                            </div>

                            <!-- Author Bio -->
                            <div class="bg-gradient-to-r from-medical-blue/5 to-purple-50 rounded-2xl p-6 flex flex-col sm:flex-row items-center sm:items-start gap-6">
                                <div class="w-20 h-20 rounded-full bg-gradient-to-br from-medical-blue to-purple-600 flex items-center justify-center text-white flex-shrink-0 shadow-lg">
                                    <i data-feather="user" class="w-10 h-10"></i>
                                </div>
                                <div class="text-center sm:text-left flex-1">
                                    <h4 class="text-xl font-bold text-medical-dark mb-2">Dr. Vijay Anand Reddy</h4>
                                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                        Dr. Vijay Anand Reddy is a renowned oncologist with over 34 years of experience in cancer treatment.
                                        He is committed to providing world-class cancer care and spreading awareness about early detection and prevention.
                                    </p>
                                    <a href="../journey.php" class="inline-flex items-center text-medical-blue font-semibold hover:text-purple-600 transition">
                                        View Full Profile
                                        <i data-feather="arrow-right" class="w-4 h-4 ml-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Articles Section -->
        <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
            <div class="container mx-auto px-4">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-12">
                        <span class="inline-block bg-medical-blue/10 text-medical-blue px-4 py-2 rounded-full text-sm font-semibold mb-4">
                            Explore More
                        </span>
                        <h2 class="text-3xl md:text-4xl font-bold text-medical-dark">
                            Related Articles
                        </h2>
                        <p class="text-gray-600 mt-3 max-w-2xl mx-auto">
                            Discover more insights about cancer awareness, treatment options, and patient stories.
                        </p>
                    </div>

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($related as $relPost):
                            $relUrlPath = !empty($relPost['permalink']) ? parse_url($relPost['permalink'], PHP_URL_PATH) : '';
                            $relFriendlySlug = trim((string)$relUrlPath, '/');
                            if (empty($relFriendlySlug) || strpos($relFriendlySlug, '?p=') !== false) {
                                $relFriendlySlug = preg_replace("/[^a-z0-9]+/", "-", strtolower($relPost['title']));
                                $relFriendlySlug = trim($relFriendlySlug, "-");
                                $relFriendlySlug = substr($relFriendlySlug, 0, 50);
                                $relFriendlySlug = trim($relFriendlySlug, "-");
                                $relFriendlySlug = 'blog/' . $relFriendlySlug;
                            }
                            $relCleanUrl = '/' . $relFriendlySlug;
                            $relImage = !empty($relPost['images'][0]) ? $relPost['images'][0] : '';
                        ?>
                            <a href="<?= $relCleanUrl ?>"
                               class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                                <div class="relative h-44 bg-gradient-to-br from-medical-blue/20 to-purple-100 overflow-hidden">
                                    <?php if ($relImage): ?>
                                        <img src="<?= htmlspecialchars($relImage) ?>"
                                             alt="<?= htmlspecialchars($relPost['title']) ?>"
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                             loading="lazy">
                                    <?php else: ?>
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i data-feather="heart" class="w-16 h-16 text-medical-blue/30"></i>
                                        </div>
                                    <?php endif; ?>
                                    <div class="absolute top-3 left-3 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-semibold text-medical-dark shadow">
                                        Article
                                    </div>
                                </div>
                                <div class="p-5">
                                    <h3 class="font-bold text-medical-dark mb-3 line-clamp-2 group-hover:text-medical-blue transition-colors">
                                        <?= htmlspecialchars($relPost['title']) ?>
                                    </h3>
                                    <div class="flex items-center text-medical-blue text-sm font-medium">
                                        <span>Read More</span>
                                        <i data-feather="arrow-right" class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform"></i>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <!-- View All Button -->
                    <div class="text-center mt-12">
                        <a href="index.php"
                           class="inline-flex items-center gap-2 bg-medical-blue text-white px-8 py-4 rounded-xl font-bold hover:bg-medical-dark transition-all shadow-lg hover:shadow-xl">
                            <i data-feather="grid" class="w-5 h-5"></i>
                            View All Articles
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </article>

    <!-- Contact Section -->
    <?php include '../contact-section.php'; ?>

    <!-- Footer -->
    <?php include '../footer.php'; ?>

    <!-- Floating Back to Top -->
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

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>