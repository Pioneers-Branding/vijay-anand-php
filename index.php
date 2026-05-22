<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Vijay Anand Reddy - Leading Oncologist in Hyderabad | Apollo Cancer Centre</title>
    <meta name="description" content="Dr. Vijay Anand Reddy, MD Radiation Oncology, Director at Apollo Cancer Centres Hyderabad. 34+ years experience in cancer treatment. Book consultation today.">
    
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                          50: '#eff6ff',
                          100: '#dbeafe',
                          500: '#3b82f6',
                          600: '#2563eb',
                          700: '#1d4ed8',
                          900: '#1e3a8a'
                        },
                        purple: {
                          50: '#f5f3ff',
                          100: '#ede9fe',
                          500: '#8b5cf6',
                          600: '#7c3aed',
                          700: '#6d28d9'
                        },
                        medical: {
                          blue: '#9B528F',
                          purple: '#8B5CF6',
                          light: '#F8FAFC',
                          dark: '#1E293B'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        inter: ['Inter', 'sans-serif']
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'float': 'float 6s ease-in-out infinite'
                    },
                    keyframes: {
                        fadeIn: {
                          '0%': { opacity: '0' },
                          '100%': { opacity: '1' }
                        },
                        slideUp: {
                          '0%': { transform: 'translateY(30px)', opacity: '0' },
                          '100%': { transform: 'translateY(0)', opacity: '1' }
                        },
                        float: {
                          '0%, 100%': { transform: 'translateY(0px)' },
                          '50%': { transform: 'translateY(-10px)' }
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .medical-gradient {
            background: linear-gradient(135deg, #EFF6FF 0%, #F5F3FF 100%);
        }
        .text-shadow {
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        /* Reveal animations utility classes */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
        /* Banner image fix - show more content on mobile without cropping */
        @media (max-width: 767px) {
            .banner-slide img {
                object-position: center 50% !important;
            }
        }
        /* Banner responsive container */
        .banner-wrapper {
            width: 100%;
            max-width: 100vw;
            overflow: hidden;
        }
        .banner-inner {
            position: relative;
            width: 100%;
            aspect-ratio: 390/506; /* Exact aspect ratio of mobile portrait banners (390x506) */
        }
        @media (min-width: 768px) {
            .banner-inner {
                aspect-ratio: 12/5; /* Exact aspect ratio of desktop landscape banners (1920x800, 3840x1600) */
                min-height: 300px;
                max-height: 620px;
            }
        }
        @media (min-width: 1024px) {
            .banner-inner {
                max-height: 560px;
            }
        }
        @media (min-width: 1280px) {
            .banner-inner {
                max-height: 620px;
            }
        }
    </style>
</head>
<body class="bg-white text-gray-800">

    <?php include 'navbar.php'; ?>

       <section id="banners" class="relative pt-[135px] sm:pt-[100px] bg-gray-50 overflow-hidden w-full">
        <div class="banner-wrapper">
            <div class="banner-inner group">
            <!-- Slide 1 -->
            <div class="banner-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out opacity-100 z-10" data-index="0">
                <picture class="w-full h-full block">
                    <source media="(min-width: 768px)" srcset="assets/banners/Var-padma-banner.webp">
                    <img src="assets/banners/padma.webp" alt="Dr. Vijay Anand Reddy - Padma Shri 2026" class="w-full h-full object-cover ">
                </picture>
            </div>
            <!-- Slide 2 -->
            <div class="banner-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out opacity-0 z-0" data-index="1">
                <picture class="w-full h-full block">
                    <source media="(min-width: 768px)" srcset="assets\banners\3-banner-img-1.webp">
                    <img src="assets\banners\fixed-mobile.webp" alt="Dr. Vijay Anand Reddy - National Honour" class="w-full h-full object-cover ">
                </picture>
            </div>
            <!-- Slide 3 -->
            <div class="banner-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out opacity-0 z-0" data-index="2">
                <picture class="w-full h-full block">
                    <source media="(min-width: 768px)" srcset="assets\banners\fixed-desk.webp">
                    <img src="assets/banners/image.webp" alt="Dr. Vijay Anand Reddy - Patient Testimony" class="w-full h-full object-cover ">
                </picture>
            </div>
            <!-- Slide 4 -->
            <div class="banner-slide absolute inset-0 w-full h-full transition-opacity duration-700 ease-in-out opacity-0 z-0" data-index="3">
                <picture class="w-full h-full block">
                    <source media="(min-width: 768px)" srcset="assets/banners/var-banner-review.webp">
                    <img src="assets/banners/good.webp" alt="Dr. Vijay Anand Reddy - Google Reviews" class="w-full h-full object-cover">
                </picture>
            </div>

            <!-- Prev/Next Buttons - Sleek Glassmorphism Controls -->
            <button onclick="prevSlide()" class="absolute left-2 sm:left-3 top-1/2 -translate-y-1/2 z-20 bg-white/40 hover:bg-white/70 border border-white/20 backdrop-blur-md text-gray-800 rounded-full w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center shadow-lg transition-all duration-300 hover:scale-110 opacity-0 sm:opacity-100 group-hover:opacity-100">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"></polyline></svg>
            </button>
            <button onclick="nextSlide()" class="absolute right-2 sm:right-3 top-1/2 -translate-y-1/2 z-20 bg-white/40 hover:bg-white/70 border border-white/20 backdrop-blur-md text-gray-800 rounded-full w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center shadow-lg transition-all duration-300 hover:scale-110 opacity-0 sm:opacity-100 group-hover:opacity-100">
                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </button>

            <!-- Dots - Sleek and modern active indicator -->
            <div class="absolute bottom-3 sm:bottom-4 left-1/2 -translate-x-1/2 z-20 flex gap-2 sm:gap-3">
                <button onclick="goToSlide(0)" class="banner-dot h-2 w-5 sm:h-2.5 sm:w-6 rounded-full bg-medical-blue transition-all duration-300 cursor-pointer"></button>
                <button onclick="goToSlide(1)" class="banner-dot h-2 w-2 sm:h-2.5 sm:w-2.5 rounded-full bg-white/60 hover:bg-white transition-all duration-300 cursor-pointer"></button>
                <button onclick="goToSlide(2)" class="banner-dot h-2 w-2 sm:h-2.5 sm:w-2.5 rounded-full bg-white/60 hover:bg-white transition-all duration-300 cursor-pointer"></button>
                <button onclick="goToSlide(3)" class="banner-dot h-2 w-2 sm:h-2.5 sm:w-2.5 rounded-full bg-white/60 hover:bg-white transition-all duration-300 cursor-pointer"></button>
            </div>
            </div>
        </div>
    </section>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.banner-slide');
        const dots = document.querySelectorAll('.banner-dot');
        const totalSlides = slides.length;
        let slideInterval;

        function updateSlides() {
            slides.forEach((slide, index) => {
                if (index === currentSlide) {
                    slide.classList.remove('opacity-0', 'z-0');
                    slide.classList.add('opacity-100', 'z-10');
                } else {
                    slide.classList.remove('opacity-100', 'z-10');
                    slide.classList.add('opacity-0', 'z-0');
                }
            });

            dots.forEach((dot, index) => {
                if (index === currentSlide) {
                    dot.classList.remove('bg-white/60', 'w-2', 'sm:w-2.5');
                    dot.classList.add('bg-medical-blue', 'w-5', 'sm:w-6');
                } else {
                    dot.classList.remove('bg-medical-blue', 'w-5', 'sm:w-6');
                    dot.classList.add('bg-white/60', 'w-2', 'sm:w-2.5');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlides();
            resetTimer();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlides();
            resetTimer();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateSlides();
            resetTimer();
        }

        function startTimer() {
            slideInterval = setInterval(nextSlide, 5000);
        }

        function resetTimer() {
            clearInterval(slideInterval);
            startTimer();
        }

        document.addEventListener('DOMContentLoaded', () => {
            startTimer();
             if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });
    </script>

    <!-- HERO SECTION (Commented Out) -->
    <!--
    <section id="home" class="relative min-h-[700px] pt-44 pb-5 overflow-hidden">
        <div class="absolute inset-0 medical-gradient"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                
                <div class="text-center lg:text-left reveal">
                    <div class="inline-flex items-center bg-medical-blue/10 text-medical-blue px-4 py-2 rounded-full text-sm font-medium mb-6">
                        <i data-feather="award" class="w-4 h-4 mr-2"></i>
                        34+ years of Excellence in Oncology
                    </div>

                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-medical-dark mb-6 leading-tight text-shadow">
                        Leading Cancer Care with <span class="text-medical-blue">Compassion</span>
                    </h1>

                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                        Dr. Vijay Anand Reddy, Senior Oncologist , Director at Apollo Cancer Centres, Hyderabad, 
                        pioneering advanced cancer treatments with personalized care for over three decades.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 mb-12 justify-center lg:justify-start">
                        <a href="#contact" class="inline-block bg-medical-blue text-white px-8 py-4 rounded-lg hover:bg-opacity-90 transition-all duration-200 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center flex items-center justify-center">
                            <i data-feather="calendar" class="w-5 h-5 mr-2"></i>
                            Book Consultation
                        </a>
                        <a href="#about" class="inline-block border-2 border-medical-blue text-medical-blue px-8 py-4 rounded-lg hover:bg-medical-blue hover:text-white transition-all duration-200 font-semibold text-lg text-center">
                            Know More
                        </a>
                    </div>
                </div>

                <div class="relative reveal delay-200">
                    <div class="relative z-10">
                        <img src="assets/vijay-snand-hero.webp" alt="Dr. Vijay Anand Reddy" class="w-full max-w-lg mx-auto rounded-2xl shadow-2xl object-cover">
                        
                        <div class="absolute -top-4 -left-4 bg-white p-4 rounded-xl shadow-lg hidden md:block animate-float">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-medical-blue/10 rounded-full flex items-center justify-center">
                                    <i data-feather="users" class="w-6 h-6 text-medical-blue"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-medical-dark">Director</div>
                                    <div class="text-sm text-gray-600">Apollo Cancer Centre</div>
                                </div>
                            </div>
                        </div>

                        <div class="absolute -bottom-4 -right-4 bg-white p-4 rounded-xl shadow-lg hidden md:block animate-float" style="animation-duration: 7s;">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-medical-purple/10 rounded-full flex items-center justify-center">
                                    <i data-feather="heart" class="w-6 h-6 text-medical-purple"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-medical-dark">Survivor Stories</div>
                                    <div class="text-sm text-gray-600">108 Published</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->

    <!-- Google Rating Highlight Section (From HomePage.jsx inline) -->
    <section class="py-8 bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 relative">
        <div class="absolute inset-0 backdrop-blur-3xl bg-white/40"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="bg-white/60 backdrop-blur-xl rounded-2xl border border-white/50 shadow-xl p-6">
                <div class="flex flex-col md:flex-row items-center justify-center gap-8 text-center md:text-left">
                    <!-- 3 Decades of Experience -->
                    <div class="text-center">
                        <div class="text-4xl font-bold mb-1" style="background: linear-gradient(to right, #9B528F, #8B5CF6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">34+</div>
                        <p class="text-gray-600 text-sm font-medium">Years of Experience</p>
                    </div>

                    <!-- Divider -->
                    <div class="hidden md:block w-px h-16 bg-gradient-to-b from-transparent via-gray-300 to-transparent"></div>

                    <!-- 85% Success Rate -->
                    <div class="text-center">
                        <div class="text-4xl font-bold mb-1" style="background: linear-gradient(to right, #9B528F, #8B5CF6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">85%</div>
                        <p class="text-gray-600 text-sm font-medium">Success Rate</p>
                    </div>

                    <!-- Divider -->
                    <div class="hidden md:block w-px h-16 bg-gradient-to-b from-transparent via-gray-300 to-transparent"></div>

                    <!-- Google Logo & Rating -->
                    <div class="flex items-center gap-4">
                        <div class="bg-white/80 backdrop-blur-sm p-3 rounded-xl shadow-lg border border-white/50">
                            <svg class="w-12 h-12" viewBox="0 0 48 48">
                                <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/>
                                <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/>
                                <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/>
                                <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/>
                            </svg>
                        </div>
                        <div class="text-left">
                            <div class="flex items-center gap-2 mb-1">
                                <div class="flex gap-1">
                                    <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                </div>
                                <span class="text-3xl font-bold text-medical-dark">4.9</span>
                            </div>
                            <p class="text-gray-600 text-sm font-medium">Google Rating</p>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="hidden md:block w-px h-16 bg-gradient-to-b from-transparent via-gray-300 to-transparent"></div>

                    <!-- Reviews Count -->
                    <div class="text-medical-dark">
                        <div class="text-4xl font-bold mb-1" style="background: linear-gradient(to right, #9B528F, #8B5CF6); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">2,700+</div>
                        <p class="text-gray-600 text-sm font-medium">Verified Patient Reviews</p>
                    </div>

                    <!-- Divider -->
                    <div class="hidden md:block w-px h-16 bg-gradient-to-b from-transparent via-gray-300 to-transparent"></div>

                    <!-- Trust Badge -->
                    <div class="text-medical-dark">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="text-2xl font-bold">Most Trusted</span>
                        </div>
                        <p class="text-gray-600 text-sm font-medium">Oncology Expert in India</p>
                    </div>

                    <!-- CTA Button -->
                    <div>
                        <a href="https://www.google.com/maps?ll=17.414722,78.412148&z=12&t=m&hl=en-US&gl=US&mapclient=embed&cid=1736553121756056830" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-medical-blue to-medical-purple text-white rounded-lg font-bold hover:shadow-xl transition-all shadow-lg">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            Read Reviews
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION (From About.jsx) -->
    <section id="about" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <h2 class="text-4xl md:text-5xl font-bold text-medical-dark mb-6">About Dr. Vijay Anand Reddy</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    A distinguished oncologist with over three decades of experience, dedicated to providing world-class cancer care.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-16 items-stretch">
                <!-- Image -->
                <div class="relative h-full reveal">
                    <img src="assets/vijay-anand-about.webp" alt="Dr. Vijay Anand Reddy" class="w-full h-full rounded-2xl shadow-2xl object-cover">
                    <div class="hidden md:block absolute bottom-2 left-6 right-6 bg-white/95 backdrop-blur-sm p-6 rounded-xl shadow-lg">
                        <h3 class="text-xl font-bold text-medical-dark mb-2">"I Am A Survivor" Book Author</h3>
                        <p class="text-gray-600">Sharing hope through 108 inspiring cancer survivor stories</p>
                    </div>
                </div>

                <!-- Details -->
                <div class="space-y-8 reveal delay-200">
                    <div>
                        <h3 class="text-2xl font-bold text-medical-dark mb-4">Qualifications & Expertise</h3>
                        <div class="space-y-3">
                            <?php 
                            $quals = [
                                "MD (Radiation Oncology)", "DNB (Radiation Oncology)", "European Certification in Medical Oncology (ESMO)",
                                "FUICC (UK), FNDM (USA), FUICC (AUS)", "Sr. Consultant Oncologist",
                                "Prof. & Head, Dept. of Radiation Oncology", "Director, Apollo Cancer Center, Hyderabad"
                            ];
                            foreach($quals as $q): ?>
                                <div class="flex items-center space-x-3">
                                    <div class="w-2 h-2 bg-medical-blue rounded-full"></div>
                                    <span class="text-gray-700"><?= $q ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-medical-blue to-medical-purple p-6 rounded-xl text-white">
                        <h4 class="text-xl font-bold mb-3">Our Mission</h4>
                        <p class="leading-relaxed">"To provide world-class cancer care with cutting-edge technology, personalized treatment plans, and unwavering compassion..."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'quote_section.php'; ?>

    <!-- SERVICES SECTION (From Services.jsx) -->
    <?php
    $services = [
      [
        'id' => "radiation-oncology",
        'link' => "radiation-oncology.php",
        'icon' => 'target',
        'title' => "Radiation Oncology",
        'description' => "Precise, technologically advanced cancer treatment with expert clinical support in Hyderabad",
        'image' => "assets/services/radiation-vijay.webp",
        'features' => ["IMRT/IGRT/SRS/SRT/RapidArc", "External Beam Therapy", "Brachytherapy", "Stereotactic Radiosurgery"]
      ],
      [
        'id' => "medical-oncology",
        'link' => "medical-oncology.php",
        'icon' => 'activity',
        'title' => "Medical Oncology",
        'description' => "Advanced chemotherapy, immunotherapy and targeted drug therapies for comprehensive cancer management",
        'image' => "assets/services/Pancreatic-Cancer.webp",
        'features' => ["Chemotherapy", "Immunotherapy", "Targeted Therapy", "Hormonal Therapy"]
      ],
      [
        'id' => "proton-therapy",
        'link' => "proton-therapy.php",
        'icon' => 'zap',
        'title' => "Proton Therapy",
        'description' => "Effective targeted cancer treatment with minimized side effects, especially for tumors near vital organs",
        'image' => "assets/services/proton-therapy.webp",
        'features' => ["High Precision Radiation", "Minimal Side Effects", "Pediatric Cancer Care", "Organ Preservation"]
      ],
      [
        'id' => "head-neck-cancer",
        'link' => "head-neck-oncology.php",
        'icon' => 'shield',
        'title' => "Head & Neck Cancer",
        'description' => "Specialized multidisciplinary care for cancers of the head and neck region with advanced treatment options",
        'image' => "assets/services/Adrenal-Cancer.webp",
        'features' => ["Multidisciplinary Approach", "Organ Preservation", "Reconstructive Surgery", "Rehabilitation Support"]
      ],
      [
        'id' => "throat-cancer",
        'link' => "head-neck-oncology.php",
        'icon' => 'brain',
        'title' => "Throat Cancer",
        'description' => "Expert diagnosis, advanced surgery and radiation, plus holistic support for optimal outcomes",
        'image' => "assets/services/throat-cancer.webp",
        'features' => ["Minimally Invasive Surgery", "Targeted Radiation", "Speech Rehabilitation", "Swallowing Therapy"]
      ],
      [
        'id' => "eye-cancer",
        'link' => "eye-cancer.php",
        'icon' => 'eye',
        'title' => "Eye Cancer",
        'description' => "Comprehensive diagnosis, precise surgical and medical care, and holistic support for eye cancer patients",
        'image' => "assets/services/Eye-Cancer.webp",
        'features' => ["Advanced Imaging", "Vision-Preserving Surgery", "Targeted Therapy", "Immunotherapy"]
      ]
    ];
    ?>
    <section id="services" class="py-16 medical-gradient">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
          <h2 class="text-4xl md:text-5xl font-bold text-medical-dark mb-6">
            Comprehensive Cancer Care Services
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            State-of-the-art treatments and compassionate care across all cancer specialties, 
            tailored to each patient's unique needs and circumstances.
          </p>
        </div>

        <div class="md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-8">
           <div class="flex md:contents gap-4 overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-4 md:pb-0 -mx-4 pl-4 pr-8 md:mx-0 md:px-0">
             <?php foreach($services as $index => $service): ?>
             <div class="bg-white rounded-2xl shadow-lg card-hover group overflow-hidden min-w-[80vw] md:min-w-0 snap-start reveal delay-<?= $index * 100 ?>">
               <div class="relative h-48 overflow-hidden">
                 <img src="<?= $service['image'] ?>" alt="<?= $service['title'] ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                 <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                 <div class="absolute top-4 left-4 w-12 h-12 bg-white/90 rounded-xl flex items-center justify-center">
                   <i data-feather="<?= $service['icon'] ?>" class="w-6 h-6 text-medical-blue"></i>
                 </div>
               </div>

               <div class="p-6">
                 <h3 class="text-xl font-bold text-medical-dark mb-3"><?= $service['title'] ?></h3>
                 <p class="text-gray-600 mb-4 leading-relaxed text-sm"><?= $service['description'] ?></p>
                 
                 <ul class="space-y-2 mb-4">
                   <?php foreach($service['features'] as $feature): ?>
                   <li class="flex items-center text-sm text-gray-700">
                     <div class="w-1.5 h-1.5 bg-medical-blue rounded-full mr-3"></div>
                     <?= $feature ?>
                   </li>
                   <?php endforeach; ?>
                 </ul>

                 <a href="<?= $service['link'] ?>" class="text-medical-blue font-semibold hover:text-medical-purple transition-colors duration-200 inline-block">
                   Learn More →
                 </a>
               </div>
             </div>
             <?php endforeach; ?>
           </div>
        </div>

        <div class="mt-16 text-center reveal">
           <div class="bg-white p-8 rounded-2xl shadow-lg max-w-4xl mx-auto">
             <h3 class="text-2xl font-bold text-medical-dark mb-4">
               Need a Consultation?
             </h3>
             <p class="text-gray-600 mb-6">
               Get personalized treatment recommendations from Dr. Vijay Anand Reddy and his expert team.
             </p>
             <a href="#contact" class="inline-block bg-medical-blue text-white px-8 py-4 rounded-lg transition-all duration-200 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center">
               Schedule Consultation
             </a>
           </div>
        </div>
      </div>
    </section>

    <!-- WHY CHOOSE SECTION (From WhyChoose.jsx) -->
    <?php
    $reasons = [
      ['icon' => 'award', 'title' => "34+ years Experience", 'description' => "Three decades of excellence in radiation oncology and cancer treatment"],
      ['icon' => 'users', 'title' => "75k+ Patients Treated", 'description' => "Successfully treated thousands of patients with various cancer types"],
      ['icon' => 'trending-up', 'title' => "85% Success Rate", 'description' => "Exceptional treatment outcomes with industry-leading success rates"],
      ['icon' => 'heart', 'title' => "Compassionate Care", 'description' => "Patient-centered approach with emotional support throughout treatment"],
      ['icon' => 'globe', 'title' => "International Recognition", 'description' => "Global certifications and recognition from leading medical institutions"],
      ['icon' => 'shield', 'title' => "Advanced Technology", 'description' => "State-of-the-art equipment and cutting-edge treatment modalities"]
    ];
    ?>
    <section id="why-choose" class="py-8 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
          <h2 class="text-4xl md:text-5xl font-bold text-medical-dark mb-6">
            Why Choose Dr. Vijay Anand Reddy?
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Trusted by thousands of patients and families for exceptional cancer care, 
            advanced treatments, and compassionate support throughout the healing journey.
          </p>
        </div>

        <div class="md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-8 mb-16">
          <div class="flex md:contents gap-4 overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-4 md:pb-0 -mx-4 pl-4 pr-8 md:mx-0 md:px-0">
            <?php foreach($reasons as $index => $reason): ?>
            <div class="bg-medical-light p-8 rounded-2xl card-hover group text-center min-w-[80vw] md:min-w-0 snap-start reveal delay-<?= $index * 100 ?>">
              <div class="relative mb-6">
                <div class="w-20 h-20 bg-medical-blue/10 rounded-2xl flex items-center justify-center mx-auto group-hover:bg-medical-blue transition-all duration-300">
                  <i data-feather="<?= $reason['icon'] ?>" class="w-10 h-10 text-medical-blue group-hover:text-white"></i>
                </div>
              </div>
              
              <h3 class="text-xl font-bold text-medical-dark mb-4"><?= $reason['title'] ?></h3>
              <p class="text-gray-600 leading-relaxed"><?= $reason['description'] ?></p>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="mt-16 text-center reveal">
          <div class="bg-white p-8 rounded-2xl shadow-lg max-w-4xl mx-auto border border-gray-100">
            <h3 class="text-2xl font-bold text-medical-dark mb-4">
              Ready to Begin Your Healing Journey?
            </h3>
            <p class="text-gray-600 mb-6 text-lg">
              Join thousands of patients who have trusted Dr. Vijay Anand Reddy for their cancer care. 
              Schedule your consultation today and take the first step towards recovery.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
              <a href="#contact" class="inline-block bg-medical-blue text-white px-8 py-4 rounded-lg transition-all duration-200 font-semibold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center">
                Book Consultation
              </a>
              <a href="tel:+919676720002" class="inline-block border-2 border-medical-blue text-medical-blue px-8 py-4 rounded-lg hover:bg-medical-blue hover:text-white transition-all duration-200 font-semibold text-lg text-center">
                Call +91-9676720002
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- AWARDS SECTION (From Awards.jsx) -->
    <?php
    $awards = [
      [
        'image' => "assets/awards/ISOO-2024-Oration.webp",
        'title' => "Clinical Pioneer Award",
        'year' => "2025",
        'description' => "Awarded on Apollo Founder's Day for outstanding patient care and dedication to Apollo mission.",
        'category' => "Clinical Excellence"
      ],
      [
        'image' => "assets/awards/aerocon-2024.webp",
        'title' => "Gold Medal – Best Scientific Paper",
        'year' => "2024",
        'description' => "AROICON 2024 for prospective study on patient-reported toxicities & QOL in SBRT Prostate.",
        'category' => "Research Excellence"
      ],
      [
        'image' => "assets/awards/AROICON-2024-Gold-Medal – Best-Scientific-Paper.webp",
        'title' => "ISOO 2024 Oration",
        'year' => "2024",
        'description' => "International Society of Ocular Oncology, Goa for contributions to ocular oncology.",
        'category' => "Ophthalmology"
      ],
      // [
      //   'image' => "assets/awards/aerocon-2022.webp",
      //   'title' => "Gold Medal – Best Scientific Paper",
      //   'year' => "2022",
      //   'description' => "AROICON 2022 for feasibility study on extreme hypofractionation in post-operative breast cancer.",
      //   'category' => "Research Excellence"
      // ],
      // [
      //   'image' => "assets/awards/dr-b.d-gupta.webp",
      //   'title' => "Dr. B. D. Gupta Memorial Oration Award",
      //   'year' => "2019",
      //   'description' => "41st AROICON, Ahmedabad for outstanding contribution in Radiation Oncology.",
      //   'category' => "Oncology Excellence"
      // ],
      // [
      //   'image' => "assets/awards/Lions-Club-International-Excellence-Award.webp",
      //   'title' => "Excellence Award",
      //   'year' => "2019",
      //   'description' => "Lions Club International in association with Apollo Hospitals for extraordinary service in Oncology.",
      //   'category' => "Medical Excellence"
      // ]
    ];
    // Note: Only displaying first 3 for brevity as per simplified previous version, but React version seems to show all in slider.
    // For exact match, ideally loop all, but let's stick to the 3 prominent ones from previously for layout consistency in this pass.
    // Actually, user wants EXACT same. Let's include all.
    $awards = [
        [
        'image' => "assets/awards/ISOO-2024-Oration.webp",
        'title' => "Clinical Pioneer Award",
        'year' => "2025",
        'description' => "Awarded on Apollo Founder's Day for outstanding patient care and dedication to Apollo mission.",
        'category' => "Clinical Excellence"
        ],
        [
        'image' => "assets/awards/aerocon-2024.webp",
        'title' => "Gold Medal – Best Scientific Paper",
        'year' => "2024",
        'description' => "AROICON 2024 for prospective study on patient-reported toxicities & QOL in SBRT Prostate.",
        'category' => "Research Excellence"
        ],
        [
        'image' => "assets/awards/AROICON-2024-Gold-Medal – Best-Scientific-Paper.webp",
        'title' => "ISOO 2024 Oration",
        'year' => "2024",
        'description' => "International Society of Ocular Oncology, Goa for contributions to ocular oncology.",
        'category' => "Ophthalmology"
        ],
        [
        'image' => "assets/awards/aerocon-2022.webp",
        'title' => "Gold Medal – Best Scientific Paper",
        'year' => "2022",
        'description' => "AROICON 2022 for feasibility study on extreme hypofractionation in post-operative breast cancer.",
        'category' => "Research Excellence"
        ],
        [
        'image' => "assets/awards/dr-b.d-gupta.webp",
        'title' => "Dr. B. D. Gupta Memorial Oration Award",
        'year' => "2019",
        'description' => "41st AROICON, Ahmedabad for outstanding contribution in Radiation Oncology.",
        'category' => "Oncology Excellence"
        ],
        [
        'image' => "assets/awards/Lions-Club-International-Excellence-Award.webp",
        'title' => "Excellence Award",
        'year' => "2019",
        'description' => "Lions Club International in association with Apollo Hospitals for extraordinary service in Oncology.",
        'category' => "Medical Excellence"
        ]
    ];

    $certifications = [
        ['name' => "Stereotactic Radiosurgery Fellowship", 'year' => "2010", 'location' => "Klinikum Frankfurt (Oder) GmbH, Frankfurt, Germany", 'image' => "assets/journey/Stereotactic-Radiosurgery.webp"],
        ['name' => "Ocular Oncology Fellowship", 'year' => "2003", 'location' => "Will's Eye Hospital, Philadelphia, USA", 'image' => "assets/journey/Ocular-Oncology.webp"],
        ['name' => "Pediatric Oncology Fellowship", 'year' => "2003", 'location' => "Children's Hospital of Philadelphia, USA", 'image' => "assets/journey/Pediatric-Oncology.webp"],
        ['name' => "Head & Neck Oncology Fellowship", 'year' => "1998", 'location' => "Peter McCallum Cancer Institute, Melbourne, Australia", 'image' => "assets/journey/Head & Neck-Oncology.webp"],
        ['name' => "Nargis Dutt Memorial Cancer Foundation Fellowship", 'year' => "1995", 'location' => "New York Hospital, Medical Centre of Queens, NY, USA", 'image' => "assets/journey/The-Nargis-Dutt-Memorial.webp"],
        ['name' => "Clinical Oncology Fellowship", 'year' => "1992", 'location' => "Meyerstein Institute of Clinical Oncology, Middlesex Hospital, London", 'image' => "assets/journey/The-Clinical-Oncology.webp"]
    ];

    $memberships = [
        ['title' => "Full Member", 'organization' => "American Society of Clinical Oncology (ASCO)"],
        ['title' => "Full Member", 'organization' => "American Society for Radiation Oncology (ASTRO)"],
        ['title' => "Permanent Member", 'organization' => "European Society of Medical Oncology (ESMO)"],
        ['title' => "Member", 'organization' => "International American Brachytherapy Society (ABS)"],
        ['title' => "Permanent Member", 'organization' => "Union for International Cancer Control (UICC), Geneva"],
        ['title' => "Advisory Committee Member", 'organization' => "Global Access to Cancer Care Foundation (GACCF), USA"]
    ];
    ?>

    <section id="awards" class="py-16 medical-gradient">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
          <h2 class="text-4xl md:text-5xl font-bold text-medical-dark mb-6">
            Awards & Recognition
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-6">
            Dr. Vijay Anand Reddy's commitment to excellence has been recognized through 
            numerous prestigious awards and international certifications.
          </p>
        </div>

        <div class="md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-8 mb-16">
          <div class="flex md:contents gap-4 overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-4 md:pb-0 -mx-4 pl-4 pr-8 md:mx-0 md:px-0">
            <?php foreach($awards as $index => $award): ?>
            <div class="bg-white rounded-2xl shadow-lg card-hover group overflow-hidden min-w-[80vw] md:min-w-0 snap-start reveal delay-<?= $index * 100 ?>">
              <div class="h-56 bg-gray-200 overflow-hidden">
                <img src="<?= $award['image'] ?>" alt="<?= $award['title'] ?>" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-300" loading="lazy">
              </div>

              <div class="p-6">
                <div class="flex items-center justify-between mb-3">
                  <span class="bg-medical-purple/10 text-medical-purple px-3 py-1 rounded-full text-sm font-semibold">
                    <?= $award['year'] ?>
                  </span>
                  <div class="flex text-yellow-400">
                    <?php for($i=0; $i<5; $i++): ?><i data-feather="star" class="w-4 h-4 fill-current"></i><?php endfor; ?>
                  </div>
                </div>

                <h3 class="text-xl font-bold text-medical-dark mb-3"><?= $award['title'] ?></h3>
                <p class="text-gray-600 mb-4 leading-relaxed text-sm"><?= $award['description'] ?></p>

                <div class="pt-4 border-t border-gray-100">
                  <span class="text-sm text-medical-blue font-medium"><?= $award['category'] ?></span>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="text-center mb-16 reveal">
          <a href="/awards.php" class="inline-block px-6 py-2 border border-medical-blue text-medical-blue rounded-full font-semibold hover:bg-medical-blue hover:text-white transition-all duration-200">
            View More
          </a>
        </div>

        <!-- Fellowships -->
        <div class="bg-white p-8 md:p-12 rounded-2xl shadow-lg reveal">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-medical-dark mb-4">Fellowships</h3>
                <p class="text-gray-600 text-lg">Global recognition through prestigious international medical training programs</p>
            </div>
            <div class="md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-6">
                <div class="flex md:contents gap-4 overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-4 md:pb-0 -mx-4 pl-4 pr-8 md:mx-0 md:px-0">
                    <?php foreach($certifications as $cert): ?>
                    <div class="bg-gray-50 border rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-all duration-200 group min-w-[80vw] md:min-w-0 snap-start">
                        <div class="h-40 bg-gray-200 overflow-hidden">
                            <img src="<?= $cert['image'] ?>" alt="<?= $cert['name'] ?>" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-300" loading="lazy">
                        </div>
                        <div class="p-4">
                            <div class="text-medical-blue font-bold text-xs mb-2"><?= $cert['year'] ?></div>
                            <div class="font-semibold text-medical-dark text-sm mb-2"><?= $cert['name'] ?></div>
                            <div class="text-gray-600 text-xs"><?= $cert['location'] ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="mt-10 text-center">
                <a href="/journey.php" class="inline-block px-6 py-2 border border-medical-blue text-medical-blue rounded-full font-semibold hover:bg-medical-blue hover:text-white transition-all duration-200">
                    View More
                </a>
            </div>
        </div>

        <!-- Memberships -->
        <div class="bg-white p-8 mt-10 md:p-12 rounded-2xl shadow-lg reveal">
            <div class="text-center mb-12">
                <h3 class="text-3xl font-bold text-medical-dark mb-4">Memberships</h3>
                <p class="text-gray-600 text-lg">Active affiliations with leading international oncology societies and committees</p>
            </div>
            <div class="md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-6">
                <div class="flex md:contents gap-4 overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-4 md:pb-0 -mx-4 pl-4 pr-8 md:mx-0 md:px-0">
                    <?php foreach($memberships as $member): ?>
                    <div class="flex items-start space-x-4 p-4 bg-medical-light rounded-xl hover:bg-medical-blue/5 transition-all duration-200 min-w-[80vw] md:min-w-0 snap-start">
                        <div class="w-12 h-12 bg-medical-blue/10 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-feather="users" class="w-6 h-6 text-medical-blue"></i>
                        </div>
                        <div>
                            <div class="font-semibold text-medical-dark text-sm mb-1"><?= $member['title'] ?></div>
                            <div class="text-gray-600 text-xs"><?= $member['organization'] ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="mt-10 text-center">
                <a href="/professional-association.php" class="inline-block px-6 py-2 border border-medical-blue text-medical-blue rounded-full font-semibold hover:bg-medical-blue hover:text-white transition-all duration-200">
                    View More
                </a>
            </div>
        </div>

      </div>
    </section>

    <!-- RATING SECTION (From FinalTest.jsx) -->
    <?php
    $googleStats = [
        ['number' => "4.9/5", 'label' => "Google Rating", 'description' => "Based on 2,847 reviews"],
        ['number' => "#1", 'label' => "Top Oncologist", 'description' => "In India"],
        ['number' => "2,700+", 'label' => "Google Reviews", 'description' => "Highest in India"],
        ['number' => "98.7%", 'label' => "5-Star Reviews", 'description' => "Exceptional satisfaction"]
    ];
    ?>
    <section id="highest-rated" class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal">
          <div class="inline-flex items-center bg-yellow-100 text-yellow-800 px-4 py-2 rounded-full text-sm font-semibold mb-6">
            <i data-feather="star" class="w-4 h-4 mr-2"></i>
            #1 Highest Rated Oncologist in India
          </div>
          <h2 class="text-4xl md:text-5xl font-bold text-medical-dark mb-6">
            Most Reviewed & Highest Rated
            <span class="text-medical-blue block">Oncologist in India</span>
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Dr. Vijay Anand Reddy holds the record for the highest number of Google reviews 
            and maintains the highest rating among oncologists in India, reflecting exceptional patient satisfaction.
          </p>
        </div>

        <!-- Google Stats Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
          <?php foreach($googleStats as $index => $stat): ?>
          <div class="text-center p-8 bg-gradient-to-br from-yellow-50 to-orange-50 rounded-2xl border border-yellow-200 hover:shadow-lg transition-shadow duration-300 reveal delay-<?= $index * 100 ?>">
            <div class="text-4xl md:text-5xl font-bold text-yellow-600 mb-2">
              <?= $stat['number'] ?>
            </div>
            <h3 class="text-xl font-bold text-medical-dark mb-3"><?= $stat['label'] ?></h3>
            <p class="text-gray-600"><?= $stat['description'] ?></p>
          </div>
          <?php endforeach; ?>
        </div>
        
        <!-- Testimonials Include equivalent -->
        <div class="text-center reveal">
             <?php include 'extract_testimonials.php'; ?>
        </div>
      </div>
    </section>

    <!-- PATIENT GALLERY SECTION (From PhotoTestimonials.jsx) -->
    <?php
    $patientGallery = [
        ["image" => "assets/testimonials/test-new-1.webp"],
        ["image" => "assets/testimonials/test-new-2.webp"],
        ["image" => "assets/testimonials/IMG_0638.webp"],
        ["image" => "assets/testimonials/IMG_0639.webp"],
        ["image" => "assets/testimonials/IMG_0640.webp"],
        ["image" => "assets/testimonials/IMG_0641.webp"],
        ["image" => "assets/testimonials/IMG_0642.webp"],
        ["image" => "assets/testimonials/IMG_0643.webp"],
        ["image" => "assets/testimonials/IMG_0644.webp"],
        ["image" => "assets/testimonials/IMG_1818.webp"]
    ];
    ?>
    <section id="gallery" class="py-8 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 reveal">
          <h2 class="text-4xl md:text-5xl font-bold text-medical-dark mb-6">
            Patient Gallery
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Moments of hope, healing, and happiness with our patients and their families.
          </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
          <?php foreach($patientGallery as $index => $p): ?>
            <div class="relative cursor-pointer overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-200 reveal delay-<?= $index * 50 ?>">
              <img
                  src="<?= $p['image'] ?>"
                  alt="Patient testimonial <?= $index + 1 ?>"
                  class="w-full h-48 object-cover object-center transform transition-transform duration-200 ease-in-out hover:scale-110"
                  loading="lazy"
              >
              <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-200"></div>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="text-center mt-10 reveal">
          <a
            href="/testimonials.php"
            class="inline-block bg-medical-blue text-white px-8 py-3 rounded-lg font-semibold hover:bg-medical-dark transition-colors duration-200 shadow-lg hover:shadow-xl"
          >
            View All Patient Photos
          </a>
        </div>
      </div>
    </section>
    
    <?php include 'video_testimonials.php'; ?>

    <!-- RECENT EVENTS SECTION -->
    <?php
    include_once 'events_data.php';
    
    // Sort events by date (latest first)
    $sortedEvents = $events ?? [];
    usort($sortedEvents, function($a, $b) {
        $dateA = isset($a['date']) ? strtotime($a['date']) : 0;
        $dateB = isset($b['date']) ? strtotime($b['date']) : 0;
        return $dateB - $dateA;
    });
    
    $recentEvents = array_slice($sortedEvents, 0, 3);
    ?>
    <section id="recent-events" class="py-16 bg-medical-gradient relative overflow-hidden">
      <!-- Decorative background element -->
      <!-- <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 rounded-full bg-medical-blue opacity-5 blur-3xl"></div> -->
      <!-- <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-medical-purple opacity-5 blur-3xl"></div> -->
      
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16 reveal">
          <h2 class="text-4xl md:text-5xl font-bold text-medical-dark mb-6">
            Recent Events & Awareness
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Stay updated with our latest healthcare initiatives, awareness programs, and community events.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
          <?php foreach ($recentEvents as $index => $event): ?>
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 flex flex-col overflow-hidden reveal delay-<?= $index * 100 ?> cursor-pointer group" onclick="window.location.href='events.php?id=<?= $event['id'] ?>'">
              <div class="h-56 w-full relative overflow-hidden">
                <?php if (!empty($event['banners'])): ?>
                  <img src="<?= htmlspecialchars($event['banners'][0]) ?>" alt="<?= htmlspecialchars($event['title']) ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <?php else: ?>
                  <div class="w-full h-full bg-gradient-to-br from-medical-blue to-blue-700 flex items-center justify-center p-6 text-center">
                    <h3 class="text-white text-2xl font-bold"><?= htmlspecialchars($event['title']) ?></h3>
                  </div>
                <?php endif; ?>
                <div class="absolute top-4 left-4 bg-white/90 backdrop-blur text-medical-dark px-3 py-1.5 rounded-lg text-sm font-bold shadow-md">
                  <?php if (!empty($event['date'])): ?>
                    <?= date('d M', strtotime($event['date'])) ?>
                  <?php else: ?>
                    Latest
                  <?php endif; ?>
                </div>
              </div>
              <div class="p-6 md:p-8 flex flex-col flex-grow">
                <?php if (!empty($event['date'])): ?>
                  <div class="flex items-center text-sm text-medical-blue font-semibold mb-3">
                    <i data-feather="calendar" class="w-4 h-4 mr-2"></i>
                    <?= date('F j, Y', strtotime($event['date'])) ?>
                  </div>
                <?php endif; ?>
                
                <h3 class="font-bold text-xl md:text-2xl mb-4 text-medical-dark line-clamp-2 group-hover:text-medical-blue transition-colors">
                  <?= htmlspecialchars($event['title']) ?>
                </h3>
                
                <p class="text-gray-600 line-clamp-3 mb-6 flex-grow text-sm leading-relaxed">
                  <?= htmlspecialchars(substr($event['description'], 0, 150)) ?>...
                </p>
                
                <div class="mt-auto pt-4 border-t border-gray-100 flex justify-between items-center">
                  <span class="inline-flex items-center text-medical-blue font-bold group-hover:text-medical-purple transition-colors">
                    Read More 
                    <i data-feather="arrow-right" class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1"></i>
                  </span>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="text-center reveal">
          <a href="events.php" class="inline-flex items-center bg-medical-blue text-white px-8 py-4 rounded-xl font-bold hover:bg-medical-dark transition-all duration-300 shadow-xl hover:shadow-2xl hover:-translate-y-1">
            <i data-feather="grid" class="w-5 h-5 mr-3"></i>
            View All Events
          </a>
        </div>
      </div>
    </section>

    <!-- BLOG SECTION (From Blog.jsx) -->
    <?php
    // Fetch blogs dynamically from posts_data.json
    $postsJson = file_get_contents('posts_data.json');
    $allPosts = json_decode($postsJson, true) ?: [];

    // Sort by id descending (newest first) and take first 3
    usort($allPosts, function($a, $b) {
        return intval($b['id']) - intval($a['id']);
    });
    $homepagePosts = array_slice($allPosts, 0, 3);
    ?>
    <section id="blog" class="py-6 sm:py-8 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12 sm:mb-16 reveal">
          <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-medical-dark mb-4">
            Blogs
          </h2>
        </div>

        <!-- Blog Cards -->
        <div class="md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-6 sm:md:gap-8">
          <div id="blog-posts-container" class="flex md:contents gap-4 overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-4 md:pb-0 -mx-4 pl-4 pr-8 md:mx-0 md:px-0">
            <?php foreach($homepagePosts as $index => $post):
              $slug = preg_replace("/[^a-z0-9]+/", "-", strtolower($post['title']));
              $slug = trim($slug, "-");
              $slug = substr($slug, 0, 50);
              $excerpt = strip_tags($post['content']);
              $excerpt = preg_replace('/\s+/', ' ', trim($excerpt));
              $excerpt = strlen($excerpt) > 100 ? substr($excerpt, 0, 100) . '...' : $excerpt;
              $postImage = !empty($post['images'][0]) ? $post['images'][0] : 'assets/vijay-anand-about.webp';
            ?>
              <div class="group min-w-[80vw] md:min-w-0 snap-start reveal delay-<?= $index * 100 ?>">
              <a href="blog-post.php?id=<?= $post['id'] ?>&slug=<?= urlencode($slug) ?>" class="block bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300">
                <!-- Image Container -->
                <div class="relative h-56 sm:h-64 overflow-hidden">
                  <img src="<?= htmlspecialchars($postImage) ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>

                <!-- Content Container -->
                <div class="bg-white p-5 sm:p-6">
                  <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 line-clamp-2 group-hover:text-medical-blue transition-colors duration-200">
                    <?= htmlspecialchars($post['title']) ?>
                  </h4>
                  <p class="text-gray-600 text-sm sm:text-base line-clamp-2 mb-4">
                    <?= htmlspecialchars($excerpt) ?>
                  </p>
                  <span class="inline-block text-medical-blue font-semibold text-sm hover:text-medical-purple">
                    Read More
                  </span>
                </div>
              </a>
            </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- View All Button -->
        <div class="text-center mt-12 reveal">
          <a href="blog-listing.php" class="inline-flex items-center px-8 py-4 bg-medical-blue text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
            <span>View All Blogs</span>
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
          </a>
        </div>
      </div>
    </section>

    <!-- CONTACT SECTION (From Contact.jsx) -->
    <section id="contact" class="py-10 sm:py-16 bg-white">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
            <div class="text-center mb-8 sm:mb-12 reveal">
                <h2 class="text-3xl sm:text-4xl font-bold text-medical-dark mb-3 sm:mb-4">Get in Touch</h2>
                <p class="text-gray-600 text-sm sm:text-base">Ready to start your healing journey? Contact us today.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-6 sm:gap-12">
                <!-- Info -->
                <div class="space-y-3 sm:space-y-6 reveal">
                    <div class="flex items-center sm:space-x-4 p-4 sm:p-6 bg-slate-50 rounded-xl">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-full flex items-center justify-center text-medical-blue flex-shrink-0"><i data-feather="phone" class="w-5 h-5 sm:w-6 sm:h-6"></i></div>
                        <div>
                            <h3 class="font-bold text-sm sm:text-base">Phone</h3>
                            <p class="text-gray-600 text-sm sm:text-base">+91-9676720002</p>
                        </div>
                    </div>
                    <div class="flex items-center sm:space-x-4 p-4 sm:p-6 bg-slate-50 rounded-xl">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-full flex items-center justify-center text-medical-blue flex-shrink-0"><i data-feather="mail" class="w-5 h-5 sm:w-6 sm:h-6"></i></div>
                        <div class="min-w-0">
                            <h3 class="font-bold text-sm sm:text-base">Email</h3>
                            <p class="text-gray-600 text-sm sm:text-base break-all">cancercare@drvijayanandreddy.com</p>
                        </div>
                    </div>
                    <div class="flex items-center sm:space-x-4 p-4 sm:p-6 bg-slate-50 rounded-xl">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-100 rounded-full flex items-center justify-center text-medical-blue flex-shrink-0"><i data-feather="map-pin" class="w-5 h-5 sm:w-6 sm:h-6"></i></div>
                        <div>
                            <h3 class="font-bold text-sm sm:text-base">Location</h3>
                            <p class="text-gray-600 text-sm sm:text-base">Apollo Cancer Centre, Jubilee Hills, Hyderabad</p>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <form accept-charset="UTF-8" action="https://app.formester.com/forms/DNnLlSMbe/submissions" method="POST" class="space-y-3 sm:space-y-4 bg-white p-4 sm:p-8 rounded-2xl shadow-xl border border-gray-100 reveal delay-200">
                    <input type="hidden" name="_redirect" value="thankyou.php">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                        <input type="text" name="name" placeholder="Full Name" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-medical-blue outline-none text-sm sm:text-base">
                        <input type="email" name="email" placeholder="Email" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-medical-blue outline-none text-sm sm:text-base">
                    </div>
                    <input type="tel" name="phone" placeholder="Phone Number" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-medical-blue outline-none text-sm sm:text-base">
                    <textarea rows="3" name="message" placeholder="Message" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-medical-blue outline-none text-sm sm:text-base"></textarea>
                    <button type="submit" class="w-full bg-medical-blue text-white p-3 sm:p-4 rounded-lg font-bold hover:bg-blue-700 transition text-sm sm:text-base">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <!-- Initialize Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize Feather Icons
            feather.replace();

            // Intersection Observer for Reveal on Scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

            // Blog posts are rendered via PHP from posts_data.json - no JS fetch needed
        });
    </script>
</body>
</html>
