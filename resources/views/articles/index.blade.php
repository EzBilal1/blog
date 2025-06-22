<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Detail - BlogSpace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.7;
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Article Content Styling */
        .article-content {
            font-size: 18px;
            line-height: 1.8;
            color: #374151;
        }

        .article-content h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin: 3rem 0 1.5rem 0;
            color: #1f2937;
            line-height: 1.2;
        }

        .article-content h2 {
            font-size: 2rem;
            font-weight: 700;
            margin: 2.5rem 0 1rem 0;
            color: #1f2937;
            position: relative;
            padding-left: 1rem;
        }

        .article-content h2::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }

        .article-content h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 2rem 0 0.75rem 0;
            color: #374151;
        }

        .article-content p {
            margin-bottom: 1.5rem;
            color: #4b5563;
        }

        .article-content blockquote {
            border-left: 4px solid #667eea;
            padding: 1.5rem 2rem;
            margin: 2rem 0;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 0 12px 12px 0;
            font-style: italic;
            position: relative;
        }

        .article-content blockquote::before {
            content: '"';
            font-size: 4rem;
            color: #667eea;
            position: absolute;
            top: -10px;
            left: 20px;
            font-family: serif;
        }

        .article-content code {
            background: #f3f4f6;
            padding: 4px 8px;
            border-radius: 6px;
            font-family: 'Courier New', monospace;
            font-size: 0.9em;
            color: #e11d48;
            border: 1px solid #e5e7eb;
        }

        .article-content pre {
            background: #1f2937;
            color: #f9fafb;
            padding: 2rem;
            border-radius: 12px;
            overflow-x: auto;
            margin: 2rem 0;
            position: relative;
        }

        .article-content pre::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
        }

        .article-content ul,
        .article-content ol {
            margin: 1.5rem 0;
            padding-left: 2rem;
        }

        .article-content li {
            margin-bottom: 0.5rem;
            position: relative;
        }

        .article-content ul li::before {
            content: '•';
            color: #667eea;
            font-weight: bold;
            position: absolute;
            left: -1rem;
        }

        /* Floating Actions */
        .floating-actions {
            position: fixed;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 12px;
            z-index: 1000;
        }

        .floating-btn {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            border: 2px solid #f1f5f9;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .floating-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s ease;
        }

        .floating-btn:hover::before {
            left: 100%;
        }

        .floating-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
        }

        .floating-btn.liked {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            color: #ef4444;
            border-color: #fecaca;
        }

        .floating-btn.bookmarked {
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
            color: #f59e0b;
            border-color: #fed7aa;
        }

        .floating-btn.shared {
            background: linear-gradient(135deg, #f0f9ff 0%, #dbeafe 100%);
            color: #3b82f6;
            border-color: #bfdbfe;
        }

        /* Progress Bar */
        .progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: rgba(255, 255, 255, 0.2);
            z-index: 1000;
            backdrop-filter: blur(10px);
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
            width: 0%;
            transition: width 0.1s ease;
            border-radius: 0 2px 2px 0;
        }

        /* Comments Section */
        .comment-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            border: 1px solid #f1f5f9;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .comment-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            border-color: #e2e8f0;
        }

        .comment-form {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 20px;
            padding: 2rem;
            border: 2px solid #e2e8f0;
            position: relative;
            overflow: hidden;
        }

        .comment-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
        }

        .comment-input {
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            width: 100%;
            transition: all 0.3s ease;
            font-size: 16px;
            resize: vertical;
            min-height: 120px;
        }

        .comment-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .comment-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 32px;
            border-radius: 25px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .comment-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .comment-btn:hover::before {
            left: 100%;
        }

        .comment-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .comment-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        /* Related Articles */
        .related-article {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #f1f5f9;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
        }

        .related-article:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: #e2e8f0;
        }

        .related-article img {
            transition: transform 0.3s ease;
        }

        .related-article:hover img {
            transform: scale(1.05);
        }

        /* Author Card */
        .author-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 2rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .author-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: rotate(45deg);
        }

        .author-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 4px solid rgba(255, 255, 255, 0.3);
            object-fit: cover;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .floating-actions {
                position: static;
                transform: none;
                flex-direction: row;
                justify-content: center;
                margin: 2rem 0;
                gap: 8px;
            }

            .floating-btn {
                width: 48px;
                height: 48px;
            }

            .article-content {
                font-size: 16px;
            }

            .article-content h1 {
                font-size: 2rem;
            }

            .article-content h2 {
                font-size: 1.5rem;
            }
        }

        /* Loading Animation */
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

        /* Notification Toast */
        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: white;
            border-radius: 12px;
            padding: 1rem 1.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #10b981;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast.error {
            border-left-color: #ef4444;
        }

        /* Emoji Reactions */
        .emoji-reactions {
            display: flex;
            gap: 8px;
            margin-top: 1rem;
        }

        .emoji-btn {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 6px 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .emoji-btn:hover {
            background: #667eea;
            color: white;
            transform: scale(1.05);
        }

        .emoji-btn.active {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Progress Bar -->
    <div class="progress-bar">
        <div class="progress-fill" id="progressFill"></div>
    </div>

    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b sticky top-0 z-40 backdrop-blur-md bg-white/90">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="enhanced-landing.html" class="text-gray-600 hover:text-gray-900 mr-4 transition duration-300">
                        <i class="fas fa-arrow-left text-lg"></i>
                    </a>
                    <a href="enhanced-landing.html" class="text-2xl font-bold gradient-text">BlogSpace</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="enhanced-landing.html" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                        <i class="fas fa-home mr-1"></i>Home
                    </a>
                    <a href="articles.html" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                        <i class="fas fa-newspaper mr-1"></i>Articles
                    </a>
                    <div id="userNavSection"></div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Floating Actions -->
    <div class="floating-actions">
        <button class="floating-btn" id="likeBtn" title="Like this article">
            <i class="fas fa-heart text-lg"></i>
        </button>
        <button class="floating-btn" id="bookmarkBtn" title="Bookmark this article">
            <i class="fas fa-bookmark text-lg"></i>
        </button>
        <button class="floating-btn" id="shareBtn" title="Share this article">
            <i class="fas fa-share text-lg"></i>
        </button>
        <button class="floating-btn" onclick="window.scrollTo({top: 0, behavior: 'smooth'})" title="Back to top">
            <i class="fas fa-arrow-up text-lg"></i>
        </button>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Article Header -->
        <article class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-8" data-aos="fade-up">
            <!-- Featured Image -->
            <div class="relative h-96 overflow-hidden">
                <div class="loading-skeleton w-full h-full" id="imageLoader"></div>
                <img id="articleImage" src="/placeholder.svg" alt="" class="w-full h-full object-cover hidden">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6">
                    <div class="flex items-center space-x-3 mb-4">
                        <span id="articleCategory" class="px-4 py-2 bg-white/20 backdrop-blur-md text-white rounded-full text-sm font-medium border border-white/30"></span>
                        <span id="articleReadTime" class="px-4 py-2 bg-black/30 backdrop-blur-md text-white rounded-full text-sm"></span>
                        <span id="featuredBadge" class="px-4 py-2 bg-gradient-to-r from-yellow-400 to-orange-500 text-white rounded-full text-sm font-bold hidden">
                            <i class="fas fa-star mr-1"></i>Featured
                        </span>
                    </div>
                    <h1 id="articleTitle" class="text-3xl md:text-4xl font-bold text-white mb-4 leading-tight"></h1>
                    <p id="articleSubtitle" class="text-lg text-gray-200 leading-relaxed"></p>
                </div>
            </div>

            <!-- Article Meta & Content -->
            <div class="p-8">
                <!-- Author Info -->
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center space-x-4">
                        <div class="loading-skeleton w-14 h-14 rounded-full" id="avatarLoader"></div>
                        <img id="authorAvatar" src="/placeholder.svg" alt="" class="w-14 h-14 rounded-full border-3 border-gray-200 hidden">
                        <div>
                            <div id="authorName" class="font-semibold text-gray-900 text-lg"></div>
                            <div class="flex items-center space-x-4 text-sm text-gray-500">
                                <span id="publishDate"></span>
                                <span id="articleViews"></span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-6">
                        <div class="flex items-center space-x-2 text-gray-500">
                            <i class="fas fa-heart text-red-500"></i>
                            <span id="likesCount" class="font-semibold">0</span>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-500">
                            <i class="fas fa-comment text-blue-500"></i>
                            <span id="commentsCount" class="font-semibold">0</span>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-500">
                            <i class="fas fa-eye text-green-500"></i>
                            <span id="viewsCount" class="font-semibold">0</span>
                        </div>
                    </div>
                </div>

                <!-- Article Content -->
                <div class="article-content" id="articleContent">
                    <!-- Loading skeleton -->
                    <div id="contentLoader">
                        <div class="loading-skeleton h-6 w-3/4 mb-4"></div>
                        <div class="loading-skeleton h-4 w-full mb-2"></div>
                        <div class="loading-skeleton h-4 w-full mb-2"></div>
                        <div class="loading-skeleton h-4 w-2/3 mb-6"></div>
                        <div class="loading-skeleton h-6 w-1/2 mb-4"></div>
                        <div class="loading-skeleton h-4 w-full mb-2"></div>
                        <div class="loading-skeleton h-4 w-full mb-2"></div>
                        <div class="loading-skeleton h-4 w-3/4 mb-6"></div>
                    </div>
                </div>

                <!-- Tags -->
                <div class="flex flex-wrap gap-2 mt-8 pt-8 border-t border-gray-200">
                    <div id="articleTags"></div>
                </div>
            </div>
        </article>

        <!-- Author Card -->
        <div class="author-card mb-8 relative z-10" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center space-x-4 relative z-10">
                <img id="authorCardAvatar" src="/placeholder.svg" alt="" class="author-avatar">
                <div>
                    <h3 id="authorCardName" class="text-xl font-bold mb-2">Author Name</h3>
                    <p id="authorCardBio" class="text-white/90 mb-3">Passionate writer and developer sharing insights about technology and life.</p>
                    <div class="flex items-center space-x-4">
                        <span class="text-white/80 text-sm">
                            <i class="fas fa-newspaper mr-1"></i>
                            <span id="authorArticleCount">12</span> Articles
                        </span>
                        <span class="text-white/80 text-sm">
                            <i class="fas fa-users mr-1"></i>
                            <span id="authorFollowers">1.2K</span> Followers
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 mb-8" data-aos="fade-up" data-aos-delay="200">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <i class="fas fa-comments mr-3 text-blue-500"></i>
                Comments (<span id="totalCommentsCount">0</span>)
            </h3>

            <!-- Comment Form -->
            <div class="comment-form mb-8" id="commentFormSection">
                <h4 class="font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-pen mr-2 text-blue-500"></i>
                    Leave a Comment
                </h4>
                <form id="commentForm">
                    <div class="mb-4">
                        <textarea id="commentText"
                            placeholder="Share your thoughts about this article..."
                            class="comment-input"
                            maxlength="1000"></textarea>
                        <div class="flex justify-between items-center mt-2">
                            <div class="text-sm text-gray-500">
                                <span id="commentCharCount">0</span>/1000 characters
                            </div>
                            <div class="emoji-reactions">
                                <button type="button" class="emoji-btn" data-emoji="👍">👍 Like</button>
                                <button type="button" class="emoji-btn" data-emoji="❤️">❤️ Love</button>
                                <button type="button" class="emoji-btn" data-emoji="🤔">🤔 Think</button>
                                <button type="button" class="emoji-btn" data-emoji="🎉">🎉 Celebrate</button>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i>
                            Please be respectful and constructive in your comments
                        </div>
                        <button type="submit" class="comment-btn" id="submitCommentBtn">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Post Comment
                        </button>
                    </div>
                </form>
            </div>

            <!-- Login Prompt for Non-authenticated Users -->
            <div class="comment-form mb-8 text-center hidden" id="loginPrompt">
                <div class="text-gray-600 mb-4">
                    <i class="fas fa-lock text-3xl mb-3 text-gray-400"></i>
                    <p class="text-lg">Please log in to leave a comment</p>
                </div>
                <div class="space-x-4">
                    <a href="login.html" class="comment-btn inline-block">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Login
                    </a>
                    <a href="register.html" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-full font-semibold transition duration-300">
                        <i class="fas fa-user-plus mr-2"></i>
                        Register
                    </a>
                </div>
            </div>

            <!-- Comments List -->
            <div id="commentsList">
                <!-- Loading skeleton -->
                <div id="commentsLoader">
                    <div class="comment-card">
                        <div class="flex items-start space-x-4">
                            <div class="loading-skeleton w-12 h-12 rounded-full"></div>
                            <div class="flex-1">
                                <div class="loading-skeleton h-4 w-32 mb-2"></div>
                                <div class="loading-skeleton h-3 w-full mb-1"></div>
                                <div class="loading-skeleton h-3 w-3/4 mb-3"></div>
                                <div class="loading-skeleton h-6 w-20"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Comments -->
            <div class="text-center mt-6 hidden" id="loadMoreSection">
                <button id="loadMoreBtn" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-semibold transition duration-300">
                    <i class="fas fa-chevron-down mr-2"></i>
                    Load More Comments
                </button>
            </div>
        </div>

        <!-- Related Articles -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8" data-aos="fade-up" data-aos-delay="300">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <i class="fas fa-newspaper mr-3 text-green-500"></i>
                Related Articles
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="relatedArticles">
                <!-- Loading skeletons -->
                <div class="related-article">
                    <div class="loading-skeleton h-48"></div>
                    <div class="p-4">
                        <div class="loading-skeleton h-4 w-3/4 mb-2"></div>
                        <div class="loading-skeleton h-3 w-full mb-1"></div>
                        <div class="loading-skeleton h-3 w-2/3"></div>
                    </div>
                </div>
                <div class="related-article">
                    <div class="loading-skeleton h-48"></div>
                    <div class="p-4">
                        <div class="loading-skeleton h-4 w-3/4 mb-2"></div>
                        <div class="loading-skeleton h-3 w-full mb-1"></div>
                        <div class="loading-skeleton h-3 w-2/3"></div>
                    </div>
                </div>
                <div class="related-article">
                    <div class="loading-skeleton h-48"></div>
                    <div class="p-4">
                        <div class="loading-skeleton h-4 w-3/4 mb-2"></div>
                        <div class="loading-skeleton h-3 w-full mb-1"></div>
                        <div class="loading-skeleton h-3 w-2/3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast" id="toast">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-2 text-green-500"></i>
            <span id="toastMessage">Success!</span>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        class ArticleDetailManager {
            constructor() {
                this.articleId = this.getArticleIdFromUrl();
                this.article = null;
                this.comments = [];
                this.currentUser = null;
                this.isLiked = false;
                this.isBookmarked = false;
                this.commentsPage = 1;
                this.commentsPerPage = 5;

                this.init();
            }

            init() {
                this.bindEvents();
                this.loadCurrentUser();
                this.loadArticle();
                this.setupScrollProgress();
            }

            getArticleIdFromUrl() {
                const urlParams = new URLSearchParams(window.location.search);
                return parseInt(urlParams.get('id')) || 1;
            }

            bindEvents() {
                // Like button
                document.getElementById('likeBtn').addEventListener('click', () => {
                    this.toggleLike();
                });

                // Bookmark button
                document.getElementById('bookmarkBtn').addEventListener('click', () => {
                    this.toggleBookmark();
                });

                // Share button
                document.getElementById('shareBtn').addEventListener('click', () => {
                    this.shareArticle();
                });

                // Comment form
                document.getElementById('commentForm').addEventListener('submit', (e) => {
                    e.preventDefault();
                    this.submitComment();
                });

                // Comment character count
                document.getElementById('commentText').addEventListener('input', (e) => {
                    const count = e.target.value.length;
                    document.getElementById('commentCharCount').textContent = count;
                });

                // Emoji reactions
                document.querySelectorAll('.emoji-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        e.preventDefault();
                        this.addEmojiToComment(btn.dataset.emoji);
                    });
                });

                // Load more comments
                document.getElementById('loadMoreBtn').addEventListener('click', () => {
                    this.loadMoreComments();
                });
            }

            async loadCurrentUser() {
                const token = localStorage.getItem('token');
                if (!token) {
                    this.showLoginPrompt();
                    return;
                }

                // استخدام بيانات مستخدم وهمية بدلاً من API
                this.currentUser = {
                    id: 5,
                    firstname: "Ahmed",
                    lastname: "Hassan",
                    email: "ahmed@example.com",
                    photo_profile: "https://randomuser.me/api/portraits/men/5.jpg"
                };

                this.showCommentForm();
                this.updateUserNav();
            }

            showLoginPrompt() {
                document.getElementById('commentFormSection').classList.add('hidden');
                document.getElementById('loginPrompt').classList.remove('hidden');
            }

            showCommentForm() {
                document.getElementById('commentFormSection').classList.remove('hidden');
                document.getElementById('loginPrompt').classList.add('hidden');
            }

            updateUserNav() {
                const userNavSection = document.getElementById('userNavSection');
                if (this.currentUser) {
                    const avatar = this.currentUser.photo_profile ||
                        `https://ui-avatars.com/api/?name=${this.currentUser.firstname}+${this.currentUser.lastname}&background=667eea&color=fff`;

                    userNavSection.innerHTML = `
                        <div class="flex items-center space-x-3">
                            <img src="${avatar}" alt="Profile" class="w-8 h-8 rounded-full object-cover border-2 border-blue-500">
                            <span class="text-sm font-medium text-gray-700">${this.currentUser.firstname}</span>
                        </div>
                    `;
                } else {
                    userNavSection.innerHTML = `
                        <a href="login.html" class="text-blue-600 hover:text-blue-800 font-semibold transition duration-300">Login</a>
                        <a href="register.html" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition duration-300">Join Now</a>
                    `;
                }
            }

            async loadArticle() {
                try {
                    // تحميل البيانات مباشرة بدون API
                    this.article = this.generateMockArticle();
                    this.renderArticle();
                    this.loadComments();
                    this.loadRelatedArticles();
                    this.checkUserInteractions();
                    this.incrementViews();
                } catch (error) {
                    console.error('Failed to load article:', error);
                    this.showToast('Failed to load article', 'error');
                }
            }

            generateMockArticle() {
                // استخدام البيانات المحددة مباشرة
                return {
                    id: 1,
                    title: "Introduction to Laravel API Development",
                    subtitle: "A beginner's guide to building APIs with Laravel",
                    content: "This article explains how to build and consume APIs using Laravel and best practices for RESTful architecture.",
                    image: "https://images.unsplash.com/photo-1.jpg",
                    image_alt: "Laravel API",
                    tags: ["laravel", "api", "backend"],
                    category: "programming",
                    meta_description: "Learn how to build APIs with Laravel.",
                    focus_keyword: "Laravel API",
                    allow_comments: true,
                    featured: false,
                    email_notify: true,
                    created_at: "2025-06-21T16:08:05Z",
                    updated_at: "2025-06-21T16:08:05Z",
                    user: {
                        id: 1,
                        firstname: "John",
                        lastname: "Doe",
                        email: "john@example.com",
                        photo_profile: "https://randomuser.me/api/portraits/men/1.jpg"
                    },
                    comments: [{
                            id: 101,
                            content: "Great article! Very helpful.",
                            created_at: "2025-06-21T18:00:00Z",
                            user: {
                                id: 2,
                                firstname: "Jane",
                                lastname: "Smith",
                                email: "jane@example.com",
                                photo_profile: "https://randomuser.me/api/portraits/women/2.jpg"
                            }
                        },
                        {
                            id: 102,
                            content: "Thanks for sharing this.",
                            created_at: "2025-06-21T19:00:00Z",
                            user: {
                                id: 3,
                                firstname: "Ali",
                                lastname: "Ahmed",
                                email: "ali@example.com",
                                photo_profile: "https://randomuser.me/api/portraits/men/3.jpg"
                            }
                        }
                    ],
                    likes: [{
                            id: 201,
                            user: {
                                id: 2,
                                firstname: "Jane",
                                lastname: "Smith",
                                photo_profile: "https://randomuser.me/api/portraits/women/2.jpg"
                            }
                        },
                        {
                            id: 202,
                            user: {
                                id: 4,
                                firstname: "Sara",
                                lastname: "Lee",
                                photo_profile: "https://randomuser.me/api/portraits/women/4.jpg"
                            }
                        }
                    ],
                    // خصائص محسوبة
                    views_count: 1250,
                    read_time: "5 min read"
                };
            }

            async loadComments() {
                try {
                    // استخدام التعليقات من البيانات مباشرة
                    this.comments = this.article.comments.map(comment => ({
                        ...comment,
                        likes_count: Math.floor(Math.random() * 10) + 1,
                        replies: []
                    }));

                    this.renderComments();

                    // Hide loading skeleton
                    document.getElementById('commentsLoader').classList.add('hidden');
                } catch (error) {
                    console.error('Failed to load comments:', error);
                }
            }

            checkUserInteractions() {
                const likedArticles = JSON.parse(localStorage.getItem('likedArticles') || '[]');
                const bookmarkedArticles = JSON.parse(localStorage.getItem('bookmarkedArticles') || '[]');

                // التحقق من الإعجابات بناءً على المستخدم الحالي
                if (this.currentUser) {
                    this.isLiked = this.article.likes.some(like => like.user.id === this.currentUser.id);
                } else {
                    this.isLiked = likedArticles.includes(this.articleId);
                }

                this.isBookmarked = bookmarkedArticles.includes(this.articleId);

                if (this.isLiked) {
                    document.getElementById('likeBtn').classList.add('liked');
                }

                if (this.isBookmarked) {
                    document.getElementById('bookmarkBtn').classList.add('bookmarked');
                }
            }

            toggleLike() {
                const likeBtn = document.getElementById('likeBtn');
                const likesCount = document.getElementById('likesCount');

                if (this.isLiked) {
                    // Unlike - إزالة الإعجاب
                    if (this.currentUser) {
                        this.article.likes = this.article.likes.filter(like => like.user.id !== this.currentUser.id);
                    }
                    likeBtn.classList.remove('liked');
                    this.isLiked = false;
                    this.showToast('Removed from liked articles');
                } else {
                    // Like - إضافة الإعجاب
                    if (this.currentUser) {
                        this.article.likes.push({
                            id: Date.now(), // ID مؤقت
                            user: {
                                id: this.currentUser.id,
                                firstname: this.currentUser.firstname,
                                lastname: this.currentUser.lastname,
                                photo_profile: this.currentUser.photo_profile
                            }
                        });
                    }
                    likeBtn.classList.add('liked');
                    this.isLiked = true;
                    this.showToast('Added to liked articles');
                }

                // تحديث عدد الإعجابات
                likesCount.textContent = this.article.likes.length;

                // حفظ في localStorage للمستخدمين غير المسجلين
                if (!this.currentUser) {
                    let likedArticles = JSON.parse(localStorage.getItem('likedArticles') || '[]');
                    if (this.isLiked) {
                        likedArticles.push(this.articleId);
                    } else {
                        likedArticles = likedArticles.filter(id => id !== this.articleId);
                    }
                    localStorage.setItem('likedArticles', JSON.stringify(likedArticles));
                }
            }

            toggleBookmark() {
                const bookmarkBtn = document.getElementById('bookmarkBtn');

                if (this.isBookmarked) {
                    bookmarkBtn.classList.remove('bookmarked');
                    this.isBookmarked = false;
                    this.showToast('Removed from bookmarked articles');
                } else {
                    bookmarkBtn.classList.add('bookmarked');
                    this.isBookmarked = true;
                    this.showToast('Added to bookmarked articles');
                }

                let bookmarkedArticles = JSON.parse(localStorage.getItem('bookmarkedArticles') || '[]');
                if (this.isBookmarked) {
                    bookmarkedArticles.push(this.articleId);
                } else {
                    bookmarkedArticles = bookmarkedArticles.filter(id => id !== this.articleId);
                }
                localStorage.setItem('bookmarkedArticles', JSON.stringify(bookmarkedArticles));
            }

            shareArticle() {
                const shareUrl = window.location.href;
                navigator.clipboard.writeText(shareUrl)
                    .then(() => {
                        this.showToast('Article URL copied to clipboard');
                    })
                    .catch(err => {
                        console.error('Failed to copy:', err);
                        this.showToast('Failed to copy article URL', 'error');
                    });
            }

            submitComment() {
                const commentText = document.getElementById('commentText').value;
                if (!commentText.trim()) {
                    this.showToast('Please enter a comment', 'error');
                    return;
                }

                const newComment = {
                    id: Date.now(),
                    content: commentText,
                    created_at: new Date().toISOString(),
                    user: {
                        id: this.currentUser.id,
                        firstname: this.currentUser.firstname,
                        lastname: this.currentUser.lastname,
                        photo_profile: this.currentUser.photo_profile
                    },
                    likes_count: 0,
                    replies: []
                };

                this.comments.unshift(newComment);
                this.renderComments();

                document.getElementById('commentText').value = '';
                document.getElementById('commentCharCount').textContent = 0;
                this.showToast('Comment posted successfully');
            }

            addEmojiToComment(emoji) {
                const commentText = document.getElementById('commentText');
                commentText.value += emoji;

                const count = commentText.value.length;
                document.getElementById('commentCharCount').textContent = count;
            }

            renderComments() {
                const commentsList = document.getElementById('commentsList');
                commentsList.innerHTML = this.comments.slice(0, this.commentsPerPage * this.commentsPage).map(comment => `
                    <div class="comment-card">
                        <div class="flex items-start space-x-4">
                            <img src="${comment.user.photo_profile}" alt="${comment.user.firstname} ${comment.user.lastname}" class="w-12 h-12 rounded-full object-cover">
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900">${comment.user.firstname} ${comment.user.lastname}</div>
                                <div class="text-sm text-gray-500">${this.getTimeAgo(comment.created_at)}</div>
                                <p class="mt-2 text-gray-700">${comment.content}</p>
                                <div class="flex items-center space-x-4 mt-3">
                                    <button class="text-blue-500 hover:text-blue-700 font-medium">
                                        <i class="fas fa-reply mr-1"></i>Reply
                                    </button>
                                    <span class="text-gray-500">
                                        <i class="fas fa-heart mr-1 text-red-500"></i>
                                        ${comment.likes_count}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                `).join('');

                // Show/hide load more button
                if (this.comments.length > this.commentsPerPage * this.commentsPage) {
                    document.getElementById('loadMoreSection').classList.remove('hidden');
                } else {
                    document.getElementById('loadMoreSection').classList.add('hidden');
                }
            }

            loadMoreComments() {
                this.commentsPage++;
                this.renderComments();
            }

            loadRelatedArticles() {
                const relatedArticlesContainer = document.getElementById('relatedArticles');

                // Simulate API call
                setTimeout(() => {
                    const relatedArticles = this.generateMockRelatedArticles();
                    relatedArticlesContainer.innerHTML = relatedArticles.map(article => `
                        <div class="related-article">
                            <img src="${article.image}" alt="${article.title}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-900 mb-2">${article.title}</h4>
                                <p class="text-gray-600 text-sm">${article.description}</p>
                            </div>
                        </div>
                    `).join('');
                }, 500);
            }

            generateMockRelatedArticles() {
                return [{
                        id: 2,
                        title: "Advanced Laravel Techniques",
                        description: "Explore advanced techniques for building scalable Laravel applications.",
                        image: "https://images.unsplash.com/photo-2.jpg"
                    },
                    {
                        id: 3,
                        title: "Vue.js for Laravel Developers",
                        description: "Learn how to integrate Vue.js with Laravel for dynamic front-end development.",
                        image: "https://images.unsplash.com/photo-3.jpg"
                    },
                    {
                        id: 4,
                        title: "Securing Your Laravel API",
                        description: "Best practices for securing your Laravel API against common threats.",
                        image: "https://images.unsplash.com/photo-4.jpg"
                    }
                ];
            }

            incrementViews() {
                // Simulate API call
                setTimeout(() => {
                    const viewsCount = document.getElementById('viewsCount');
                    let currentViews = parseInt(viewsCount.textContent.replace(/,/g, '')) || 0;
                    currentViews++;
                    viewsCount.textContent = currentViews.toLocaleString();
                    document.getElementById('articleViews').textContent = `${currentViews.toLocaleString()} views`;
                }, 300);
            }

            renderArticle() {
                // Update page title
                document.title = `${this.article.title} - BlogSpace`;

                // Hide loading skeletons and show content
                document.getElementById('imageLoader').classList.add('hidden');
                document.getElementById('avatarLoader').classList.add('hidden');
                document.getElementById('contentLoader').classList.add('hidden');

                // Article image
                const articleImage = document.getElementById('articleImage');
                articleImage.src = this.article.image;
                articleImage.alt = this.article.image_alt;
                articleImage.classList.remove('hidden');

                // Article details
                document.getElementById('articleTitle').textContent = this.article.title;
                document.getElementById('articleSubtitle').textContent = this.article.subtitle;
                document.getElementById('articleCategory').textContent = this.article.category;
                document.getElementById('articleReadTime').textContent = this.article.read_time;

                // Featured badge
                if (this.article.featured) {
                    document.getElementById('featuredBadge').classList.remove('hidden');
                }

                // Author info
                const authorAvatar = document.getElementById('authorAvatar');
                authorAvatar.src = this.article.user.photo_profile;
                authorAvatar.alt = `${this.article.user.firstname} ${this.article.user.lastname}`;
                authorAvatar.classList.remove('hidden');

                document.getElementById('authorName').textContent = `${this.article.user.firstname} ${this.article.user.lastname}`;
                document.getElementById('publishDate').textContent = this.getTimeAgo(this.article.created_at);
                document.getElementById('articleViews').textContent = `${this.article.views_count?.toLocaleString() || 0} views`;

                // Stats - استخدام البيانات الفعلية
                document.getElementById('likesCount').textContent = this.article.likes.length;
                document.getElementById('commentsCount').textContent = this.article.comments.length;
                document.getElementById('viewsCount').textContent = this.article.views_count?.toLocaleString() || 0;
                document.getElementById('totalCommentsCount').textContent = this.article.comments.length;

                // Article content - عرض المحتوى كما هو
                document.getElementById('articleContent').innerHTML = `<p>${this.article.content}</p>`;

                // Tags
                const tagsContainer = document.getElementById('articleTags');
                tagsContainer.innerHTML = this.article.tags.map(tag =>
                    `<span class="px-4 py-2 bg-blue-100 text-blue-600 rounded-full text-sm font-medium hover:bg-blue-200 transition duration-300 cursor-pointer">#${tag}</span>`
                ).join('');

                // Author card
                document.getElementById('authorCardAvatar').src = this.article.user.photo_profile;
                document.getElementById('authorCardName').textContent = `${this.article.user.firstname} ${this.article.user.lastname}`;
            }

            getTimeAgo(dateStr) {
                const date = new Date(dateStr);
                const now = new Date();
                const diffInSeconds = Math.floor((now - date) / 1000);

                if (diffInSeconds < 60) {
                    return `${diffInSeconds} seconds ago`;
                }

                const diffInMinutes = Math.floor(diffInSeconds / 60);
                if (diffInMinutes < 60) {
                    return `${diffInMinutes} minutes ago`;
                }

                const diffInHours = Math.floor(diffInMinutes / 60);
                if (diffInHours < 24) {
                    return `${diffInHours} hours ago`;
                }

                const diffInDays = Math.floor(diffInHours / 24);
                if (diffInDays < 7) {
                    return `${diffInDays} days ago`;
                }

                const diffInWeeks = Math.floor(diffInDays / 7);
                if (diffInWeeks < 4) {
                    return `${diffInWeeks} weeks ago`;
                }

                const diffInMonths = Math.floor(diffInDays / 30);
                if (diffInMonths < 12) {
                    return `${diffInMonths} months ago`;
                }

                const diffInYears = Math.floor(diffInDays / 365);
                return `${diffInYears} years ago`;
            }

            setupScrollProgress() {
                window.addEventListener('scroll', () => {
                    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                    const scrollTop = document.documentElement.scrollTop;
                    const progress = (scrollTop / scrollHeight) * 100;
                    document.getElementById('progressFill').style.width = `${progress}%`;
                });
            }

            showToast(message, type = 'success') {
                const toast = document.getElementById('toast');
                const toastMessage = document.getElementById('toastMessage');

                toastMessage.textContent = message;
                toast.classList.remove('show', 'error');

                if (type === 'error') {
                    toast.classList.add('error');
                }

                toast.classList.add('show');

                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            }
        }

        // Initialize Article Detail Manager
        document.addEventListener('DOMContentLoaded', () => {
            new ArticleDetailManager();
        });
    </script>
</body>

</html>