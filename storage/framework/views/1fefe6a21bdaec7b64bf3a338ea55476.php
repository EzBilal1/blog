<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogSpace - Share Your Stories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .blob {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: blob 7s infinite;
        }

        @keyframes blob {

            0%,
            100% {
                border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            }

            25% {
                border-radius: 58% 42% 75% 25% / 76% 46% 54% 24%;
            }

            50% {
                border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%;
            }

            75% {
                border-radius: 33% 67% 58% 42% / 63% 68% 32% 37%;
            }
        }

        .typewriter {
            overflow: hidden;
            border-right: .15em solid orange;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: .15em;
            animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent
            }

            50% {
                border-color: orange;
            }
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .particle {
            position: absolute;
            background: #667eea;
            border-radius: 50%;
            pointer-events: none;
            animation: particle-float 8s infinite linear;
        }

        @keyframes particle-float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }

        /* Enhanced Article Card Styles */
        .article-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .article-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .article-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .article-card:hover::before {
            opacity: 1;
        }

        .article-image {
            width: 100%;
            height: 240px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .article-card:hover .article-image {
            transform: scale(1.1);
        }

        .article-meta {
            position: absolute;
            top: 16px;
            left: 16px;
            right: 16px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .category-badge {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: #667eea;
            border: 1px solid rgba(102, 126, 234, 0.2);
        }

        .featured-badge {
            background: linear-gradient(135deg, #ff6b6b, #ffa500);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            animation: pulse 2s infinite;
        }

        .author-info {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 16px;
        }

        .author-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #f8fafc;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .engagement-stats {
            display: flex;
            align-items: center;
            gap: 16px;
            color: #64748b;
            font-size: 14px;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 4px;
            transition: color 0.3s ease;
        }

        .stat-item:hover {
            color: #667eea;
        }

        .read-more-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .read-more-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .read-more-btn:hover::before {
            left: 100%;
        }

        .read-more-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 32px;
            margin-top: 48px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 64px;
        }

        .section-subtitle {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 16px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .loading-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
            border-radius: 8px;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }

        .filter-tabs {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-bottom: 48px;
            flex-wrap: wrap;
        }

        .filter-tab {
            padding: 12px 24px;
            border-radius: 30px;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid #e2e8f0;
            background: white;
            color: #64748b;
        }

        .filter-tab.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .filter-tab:hover:not(.active) {
            border-color: #667eea;
            color: #667eea;
            transform: translateY(-2px);
        }

        .view-all-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 16px 32px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-top: 48px;
        }

        .view-all-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(102, 126, 234, 0.4);
        }

        .articles-section {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            position: relative;
            overflow: hidden;
        }

        .articles-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23667eea' fill-opacity='0.03'%3E%3Ccircle cx='30' cy='30' r='4'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            pointer-events: none;
        }

        @media (max-width: 768px) {
            .articles-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .filter-tabs {
                gap: 4px;
            }

            .filter-tab {
                padding: 8px 16px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body class="bg-gray-50 overflow-x-hidden">
    <!-- Floating Particles -->
    <div id="particles-container" class="fixed inset-0 pointer-events-none z-0"></div>

    <!-- Navigation with Glass Effect -->
    <nav class="glass-effect fixed w-full top-0 z-50 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold gradient-text">BlogSpace</h1>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#features" class="text-gray-700 hover:text-blue-600 transition duration-300">Features</a>
                    <a href="#articles" class="text-gray-700 hover:text-blue-600 transition duration-300">Articles</a>
                    <a href="#testimonials" class="text-gray-700 hover:text-blue-600 transition duration-300">Testimonials</a>
                    <a href="post" class="text-gray-700 hover:text-blue-600 transition duration-300">Write New Post</a>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- User info will be injected here by JS -->
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#features" class="block px-3 py-2 text-gray-700 hover:text-blue-600">Features</a>
                <a href="#articles" class="block px-3 py-2 text-gray-700 hover:text-blue-600">Articles</a>
                <a href="#testimonials" class="block px-3 py-2 text-gray-700 hover:text-blue-600">Testimonials</a>
                <a href="post" class="block px-3 py-2 text-gray-700 hover:text-blue-600">Write New Post</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Creative Elements -->
    <section class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-purple-50 overflow-hidden">
        <!-- Animated Background Blobs -->
        <div class="absolute top-20 left-20 w-72 h-72 bg-blue-300 rounded-full blob opacity-20"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-300 rounded-full blob opacity-20" style="animation-delay: -2s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-pink-300 rounded-full blob opacity-10" style="animation-delay: -4s;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 relative z-10">
            <div class="text-center">
                <div class="floating-animation mb-8">
                    <div class="inline-flex items-center px-4 py-2 bg-blue-100 rounded-full text-blue-800 text-sm font-medium mb-6">
                        <i class="fas fa-rocket mr-2"></i>
                        <span class="typewriter">Welcome to the Future of Blogging</span>
                    </div>
                </div>

                <h1 class="text-5xl md:text-7xl font-bold mb-6" data-aos="fade-up" data-aos-delay="200">
                    Share Your Stories with the
                    <span class="gradient-text">World</span>
                </h1>

                <p class="text-xl md:text-2xl mb-8 text-gray-600 max-w-4xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-delay="400">
                    Join thousands of writers and readers in our community. Write, read, and connect with people who share your interests in a beautiful, distraction-free environment.
                </p>

                <div class="flex flex-col sm:flex-row gap-6 justify-center mb-12" data-aos="fade-up" data-aos-delay="600">
                    <a href="register" class="group bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-8 py-4 rounded-full text-lg font-semibold transition duration-300 transform hover:scale-105 hover:shadow-2xl">
                        <i class="fas fa-pen-fancy mr-2 group-hover:animate-bounce"></i>
                        Start Writing Free
                    </a>
                    <a href="#articles" class="group border-2 border-gray-300 hover:border-blue-500 text-gray-700 hover:text-blue-600 px-8 py-4 rounded-full text-lg font-semibold transition duration-300 transform hover:scale-105 bg-white hover:shadow-xl">
                        <i class="fas fa-book-open mr-2 group-hover:animate-pulse"></i>
                        Explore Stories
                    </a>
                </div>

                <!-- Stats Counter -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="800">
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold gradient-text counter" data-target="10000">0</div>
                        <div class="text-gray-600 mt-2">Active Writers</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold gradient-text counter" data-target="50000">0</div>
                        <div class="text-gray-600 mt-2">Stories Published</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold gradient-text counter" data-target="1000000">0</div>
                        <div class="text-gray-600 mt-2">Monthly Readers</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl md:text-4xl font-bold gradient-text counter" data-target="150">0</div>
                        <div class="text-gray-600 mt-2">Countries</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <i class="fas fa-chevron-down text-2xl text-gray-400"></i>
        </div>
    </section>

    <!-- Features Section with Enhanced Creativity -->
    <section id="features" class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Why Choose <span class="gradient-text">BlogSpace?</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Everything you need to share your thoughts and connect with readers in one powerful platform
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-12">
                <div class="text-center hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="relative mb-8">
                        <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto transform rotate-3 hover:rotate-6 transition duration-300">
                            <i class="fas fa-pen-fancy text-3xl text-white"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-full pulse-animation"></div>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">AI-Powered Writing</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Beautiful, distraction-free editor with AI assistance that helps you focus on your content and improve your writing style.
                    </p>
                </div>

                <div class="text-center hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="relative mb-8">
                        <div class="w-24 h-24 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto transform -rotate-3 hover:-rotate-6 transition duration-300">
                            <i class="fas fa-users text-3xl text-white"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-red-400 rounded-full pulse-animation" style="animation-delay: 0.5s;"></div>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Global Community</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Connect with like-minded readers and writers from around the world. Build your audience and grow your influence.
                    </p>
                </div>

                <div class="text-center hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="relative mb-8">
                        <div class="w-24 h-24 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto transform rotate-3 hover:rotate-6 transition duration-300">
                            <i class="fas fa-chart-line text-3xl text-white"></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-green-400 rounded-full pulse-animation" style="animation-delay: 1s;"></div>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Advanced Analytics</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Track your story performance, understand your audience better, and optimize your content for maximum engagement.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Articles Section -->
    <section id="articles" class="articles-section py-24 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="section-header" data-aos="fade-up">
                <div class="section-subtitle">Latest Stories</div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    Discover Amazing <span class="gradient-text">Articles</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Explore the latest stories from our talented community of writers across various topics and interests
                </p>
            </div>

            <!-- Filter Tabs -->
            <div class="filter-tabs" data-aos="fade-up" data-aos-delay="200">
                <div class="filter-tab active" data-category="all">All Articles</div>
                <div class="filter-tab" data-category="programming">Programming</div>
                <div class="filter-tab" data-category="design">Design</div>
                <div class="filter-tab" data-category="technology">Technology</div>
                <div class="filter-tab" data-category="business">Business</div>
                <div class="filter-tab" data-category="lifestyle">Lifestyle</div>
            </div>

            <!-- Articles Grid -->
            <div class="articles-grid" id="articlesGrid">
                <!-- Loading skeletons will be shown initially -->
                <div class="article-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="loading-skeleton h-60"></div>
                    <div class="p-6">
                        <div class="loading-skeleton h-4 w-3/4 mb-4"></div>
                        <div class="loading-skeleton h-3 w-full mb-2"></div>
                        <div class="loading-skeleton h-3 w-2/3 mb-4"></div>
                        <div class="flex items-center justify-between">
                            <div class="loading-skeleton h-8 w-8 rounded-full"></div>
                            <div class="loading-skeleton h-4 w-20"></div>
                        </div>
                    </div>
                </div>
                <!-- Repeat for more loading cards -->
                <div class="article-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="loading-skeleton h-60"></div>
                    <div class="p-6">
                        <div class="loading-skeleton h-4 w-3/4 mb-4"></div>
                        <div class="loading-skeleton h-3 w-full mb-2"></div>
                        <div class="loading-skeleton h-3 w-2/3 mb-4"></div>
                        <div class="flex items-center justify-between">
                            <div class="loading-skeleton h-8 w-8 rounded-full"></div>
                            <div class="loading-skeleton h-4 w-20"></div>
                        </div>
                    </div>
                </div>
                <div class="article-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="loading-skeleton h-60"></div>
                    <div class="p-6">
                        <div class="loading-skeleton h-4 w-3/4 mb-4"></div>
                        <div class="loading-skeleton h-3 w-full mb-2"></div>
                        <div class="loading-skeleton h-3 w-2/3 mb-4"></div>
                        <div class="flex items-center justify-between">
                            <div class="loading-skeleton h-8 w-8 rounded-full"></div>
                            <div class="loading-skeleton h-4 w-20"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View All Button -->
            <div class="text-center" data-aos="fade-up" data-aos-delay="600">
                <a href="articles" class="view-all-btn">
                    <span>View All Articles</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-24 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    What Our <span class="gradient-text">Writers</span> Say
                </h2>
                <p class="text-xl text-gray-600">
                    Join thousands of satisfied writers who've found their voice on BlogSpace
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass-effect rounded-2xl p-8 hover-lift" data-aos="fade-up" data-aos-delay="100">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Sarah Johnson" class="w-16 h-16 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Sarah Johnson</h4>
                            <p class="text-gray-600">Tech Writer</p>
                            <div class="flex text-yellow-400 mt-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "BlogSpace has completely transformed my writing experience. The AI-powered editor helps me write better content, and the community engagement is incredible!"
                    </p>
                </div>

                <div class="glass-effect rounded-2xl p-8 hover-lift" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Mike Chen" class="w-16 h-16 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Mike Chen</h4>
                            <p class="text-gray-600">Entrepreneur</p>
                            <div class="flex text-yellow-400 mt-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "The analytics dashboard is amazing! I can see exactly how my content performs and what resonates with my audience. Game changer!"
                    </p>
                </div>

                <div class="glass-effect rounded-2xl p-8 hover-lift" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Emily Davis" class="w-16 h-16 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Emily Davis</h4>
                            <p class="text-gray-600">Content Creator</p>
                            <div class="flex text-yellow-400 mt-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "I love how clean and distraction-free the writing environment is. It helps me focus on what matters most - creating great content."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section with Creative Design -->
    <section class="relative py-24 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-black opacity-20"></div>
            <div class="absolute top-20 left-20 w-32 h-32 bg-white rounded-full opacity-10 floating-animation"></div>
            <div class="absolute bottom-20 right-20 w-48 h-48 bg-white rounded-full opacity-5 floating-animation" style="animation-delay: -2s;"></div>
        </div>

        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8 relative z-10">
            <h2 class="text-4xl md:text-6xl font-bold text-white mb-6" data-aos="fade-up">
                Ready to Start Your Journey?
            </h2>
            <p class="text-xl md:text-2xl text-blue-100 mb-12" data-aos="fade-up" data-aos-delay="200">
                Join our community of writers and readers today. Your story matters.
            </p>

            <div class="flex flex-col sm:flex-row gap-6 justify-center" data-aos="fade-up" data-aos-delay="400">
                <a href="register" class="group bg-white hover:bg-gray-100 text-blue-600 px-8 py-4 rounded-full text-lg font-semibold transition duration-300 transform hover:scale-105 hover:shadow-2xl">
                    <i class="fas fa-rocket mr-2 group-hover:animate-bounce"></i>
                    Get Started Free
                </a>
                <a href="articles" class="group border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-full text-lg font-semibold transition duration-300 transform hover:scale-105">
                    <i class="fas fa-play mr-2 group-hover:animate-pulse"></i>
                    Explore Articles
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-12">
                <div>
                    <h3 class="text-2xl font-bold gradient-text mb-4">BlogSpace</h3>
                    <p class="text-gray-400 mb-6">
                        A platform for writers and readers to connect and share amazing stories.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-700 transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-800 rounded-full flex items-center justify-center hover:bg-blue-900 transition duration-300">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-pink-600 rounded-full flex items-center justify-center hover:bg-pink-700 transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-gray-600 transition duration-300">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="font-semibold mb-6">Product</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="#" class="hover:text-white transition duration-300">Features</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Pricing</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">API</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Integrations</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-6">Company</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="#" class="hover:text-white transition duration-300">About</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Careers</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Press</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-semibold mb-6">Support</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="#" class="hover:text-white transition duration-300">Help Center</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Privacy</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Terms</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; 2024 BlogSpace. All rights reserved. Made with ❤️ for writers everywhere.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white', 'shadow-lg');
                navbar.classList.remove('glass-effect');
            } else {
                navbar.classList.remove('bg-white', 'shadow-lg');
                navbar.classList.add('glass-effect');
            }
        });

        // Counter animation
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-target'));
            const increment = target / 100;
            let current = 0;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current).toLocaleString();
            }, 20);
        }

        // Trigger counter animation when in view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.counter');
                    counters.forEach(counter => {
                        if (!counter.classList.contains('animated')) {
                            counter.classList.add('animated');
                            animateCounter(counter);
                        }
                    });
                }
            });
        });

        document.querySelectorAll('.counter').forEach(counter => {
            observer.observe(counter.closest('[data-aos]'));
        });

        // Floating particles
        function createParticle() {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + 'vw';
            particle.style.width = particle.style.height = Math.random() * 10 + 5 + 'px';
            particle.style.animationDuration = Math.random() * 3 + 5 + 's';
            particle.style.opacity = Math.random() * 0.5 + 0.1;

            document.getElementById('particles-container').appendChild(particle);

            setTimeout(() => {
                particle.remove();
            }, 8000);
        }

        // Create particles periodically
        setInterval(createParticle, 2000);

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Articles Management
        class ArticlesManager {
            constructor() {
                this.articles = [];
                this.currentCategory = 'all';
                this.isLoggedIn = !!localStorage.getItem('token');
                // Singleton instance
                window.ArticlesManagerInstance = this;
                this.init();
            }

            init() {
                this.bindEvents();
                this.loadArticles();
            }

            bindEvents() {
                // Filter tabs
                document.querySelectorAll('.filter-tab').forEach(tab => {
                    tab.addEventListener('click', (e) => {
                        this.handleCategoryFilter(e.target.dataset.category);
                    });
                });

                // Like button event delegation
                const container = document.getElementById('articlesGrid');
                container.addEventListener('click', async (e) => {
                    const likeBtn = e.target.closest('.like-btn');
                    if (likeBtn) {
                        const articleId = likeBtn.dataset.articleId;
                        await this.handleLike(articleId, likeBtn);
                    }
                });
            }

            async loadArticles() {
                try {
                    const token = localStorage.getItem('token');
                    const res = await fetch('http://127.0.0.1:8000/api/all/articles', {
                        headers: token ? {
                            'Authorization': 'Bearer ' + token,
                            'Accept': 'application/json'
                        } : {
                            'Accept': 'application/json'
                        }
                    });
                    const data = await res.json();
                    this.articles = Array.isArray(data) ? data : (data.data || []);
                    this.renderArticles();
                } catch (error) {
                    console.error('Failed to load articles:', error);
                }
            }

            handleCategoryFilter(category) {
                this.currentCategory = category;
                // Update active tab
                document.querySelectorAll('.filter-tab').forEach(tab => {
                    tab.classList.remove('active');
                });
                document.querySelector(`[data-category="${category}"]`).classList.add('active');
                this.renderArticles();
            }

            renderArticles() {
                const container = document.getElementById('articlesGrid');
                let filteredArticles = this.articles;
                if (this.currentCategory !== 'all') {
                    filteredArticles = this.articles.filter(article => article.category === this.currentCategory);
                }
                filteredArticles = filteredArticles.slice(0, 6);
                container.innerHTML = filteredArticles.map(article => this.createArticleCard(article)).join('');
            }

            async handleLike(articleId, likeBtn) {
                const token = localStorage.getItem('token');
                if (!token) {
                    window.location.href = 'login';
                    return;
                }
                // Find article in local array
                const article = this.articles.find(a => a.id == articleId);
                if (!article) return;

                // Optimistic UI update
                const wasLiked = !!article.isLiked;
                article.isLiked = !wasLiked;
                article.likes_count = wasLiked ? (article.likes_count - 1) : (article.likes_count + 1);
                this.renderArticles();

                try {
                    const response = await fetch('http://127.0.0.1:8000/api/like', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + token,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            article_id: articleId
                        })
                    });

                    if (!response.ok) {
                        // Rollback UI if failed
                        article.isLiked = wasLiked;
                        article.likes_count = wasLiked ? (article.likes_count + 1) : (article.likes_count - 1);
                        this.renderArticles();
                        const errorData = await response.json();
                        console.error('Error:', errorData);
                        throw new Error('Like failed');
                    }
                } catch (error) {
                    // Rollback UI if error
                    article.isLiked = wasLiked;
                    article.likes_count = wasLiked ? (article.likes_count + 1) : (article.likes_count - 1);
                    this.renderArticles();
                    console.error('Failed to like/unlike article:', error);
                }
            }

            createArticleCard(article) {
                const timeAgo = this.getTimeAgo(article.created_at);
                const featuredBadge = article.featured ? '<div class="featured-badge">Featured</div>' : '';
                // Default images
                const defaultArticleImg = 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80';
                const defaultUserImg = 'https://randomuser.me/api/portraits/lego/1.jpg';
                const articleImg = article.image ? article.image : defaultArticleImg;
                const userImg = (article.user && article.user.photo_profile) ? article.user.photo_profile : defaultUserImg;
                // Tags: handle stringified array or array
                let tags = [];
                if (typeof article.tags === 'string') {
                    try {
                        tags = JSON.parse(article.tags);
                    } catch {
                        tags = [];
                    }
                } else if (Array.isArray(article.tags)) {
                    tags = article.tags;
                }
                // isLiked: only show if logged in
                let likedHtml = '';
                if (this.isLoggedIn && typeof article.isLiked !== 'undefined') {
                    likedHtml = `<div class="stat-item like-btn" data-article-id="${article.id}" style="cursor:pointer;">
        <i class="fas fa-heart${article.isLiked ? ' text-red-500' : ''}"></i>
        <span>${article.likes_count}</span>
    </div>`;
                } else {
                    likedHtml = `<div class="stat-item"><i class="fas fa-heart"></i><span>${article.likes_count}</span></div>`;
                }
                return `
            <div class="article-card" data-aos="fade-up">
                <div class="relative overflow-hidden">
                    <img src="${articleImg}" alt="${article.image_alt || 'Article Image'}" class="article-image">
                    <div class="article-meta">
                        <div class="category-badge">${article.category || ''}</div>
                        ${featuredBadge}
                    </div>
                </div>
                <div class="p-6">
                    <div class="author-info">
                        <img src="${userImg}" alt="${article.user ? (article.user.firstname + ' ' + article.user.lastname) : 'User'}" class="author-avatar">
                        <div>
                            <div class="font-semibold text-gray-900 text-sm">${article.user ? (article.user.firstname + ' ' + article.user.lastname) : 'Unknown'}</div>
                            <div class="text-gray-500 text-xs">${timeAgo}</div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2 hover:text-blue-600 transition duration-300 cursor-pointer" onclick="openArticle(${article.id})">
                        ${article.title}
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">${article.subtitle || ''}</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        ${tags.slice(0, 3).map(tag => `<span class="px-2 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-medium">#${tag}</span>`).join('')}
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="engagement-stats">
                            ${likedHtml}
                            <div class="stat-item">
                                <i class="fas fa-comment"></i>
                                <span>${article.comments_count}</span>
                            </div>
                        </div>
                        <button onclick="openArticle(${article.id})" class="read-more-btn">
                            Read More
                        </button>
                    </div>
                </div>
            </div>
        `;
            }



            getTimeAgo(dateString) {
                const now = new Date();
                const date = new Date(dateString);
                const diffInSeconds = Math.floor((now - date) / 1000);

                if (diffInSeconds < 60) return 'Just now';
                if (diffInSeconds < 3600) return `${Math.floor(diffInSeconds / 60)}m ago`;
                if (diffInSeconds < 86400) return `${Math.floor(diffInSeconds / 3600)}h ago`;
                if (diffInSeconds < 2592000) return `${Math.floor(diffInSeconds / 86400)}d ago`;
                return `${Math.floor(diffInSeconds / 2592000)}mo ago`;
            }



        }

        // Global functions
        function openArticle(articleId) {
            window.location.href = `article-detail?id=${articleId}`;
        }

        // --- User Auth Display ---
        async function showUserInNavbar() {
            const token = localStorage.getItem('token');
            const navbar = document.querySelector('#navbar .flex.items-center.space-x-4');

            function showLoginRegister() {
                if (!navbar) return;
                if (!navbar.querySelector('a[href="login"]')) {
                    let loginBtn = document.createElement('a');
                    loginBtn.href = 'login';
                    loginBtn.className = 'text-blue-600 hover:text-blue-800 font-semibold transition duration-300';
                    loginBtn.textContent = 'Login';
                    navbar.appendChild(loginBtn);
                }
                if (!navbar.querySelector('a[href="register"]')) {
                    let registerBtn = document.createElement('a');
                    registerBtn.href = 'register';
                    registerBtn.className = 'bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition duration-300 ml-2';
                    registerBtn.textContent = 'Join Now';
                    navbar.appendChild(registerBtn);
                }
            }

            if (!token) {
                showLoginRegister();
                return;
            }

            try {
                const res = await fetch('http://127.0.0.1:8000/api/user-from-token', {
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });
                const data = await res.json();

                if (data.status && data.user) {
                    document.querySelectorAll('a[href="login"], a[href="register"]').forEach(el => el.remove());

                    // Add user avatar or initial
                    if (navbar && !navbar.querySelector('.user-profile')) {
                        let userDiv = document.createElement('div');
                        userDiv.className = 'flex items-center user-profile';

                        if (data.user.photo_profile) {
                            userDiv.innerHTML = `<img src="${data.user.photo_profile}" alt="Profile" class="w-10 h-10 rounded-full object-cover border-2 border-blue-500">`;
                        } else {
                            const initial = (data.user.firstname || 'U').charAt(0).toUpperCase();
                            userDiv.innerHTML = `<div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-lg border-2 border-blue-500">${initial}</div>`;
                        }

                        navbar.appendChild(userDiv);
                    }
                } else {
                    showLoginRegister();
                }
            } catch (e) {
                showLoginRegister();
                console.error('Error fetching user data:', e);
            }
        }







        // Initialize everything
        document.addEventListener('DOMContentLoaded', () => {
            showUserInNavbar();
            new ArticlesManager();
        });
    </script>
</body>

</html><?php /**PATH C:\Users\bbila\OneDrive\Desktop\nezss\myproject\resources\views/welcome.blade.php ENDPATH**/ ?>