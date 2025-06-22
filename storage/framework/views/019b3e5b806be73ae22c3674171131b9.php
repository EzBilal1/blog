<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write New Post - BlogSpace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .editor-container {
            min-height: 500px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            transition: border-color 0.3s ease;
        }

        .editor-container:focus-within {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .editor-content {
            min-height: 400px;
            outline: none;
            padding: 1.5rem;
            font-size: 18px;
            line-height: 1.7;
        }

        .editor-content:empty:before {
            content: "Tell your story...";
            color: #9ca3af;
            font-style: italic;
        }

        .toolbar-btn {
            padding: 8px 12px;
            border: 1px solid #e5e7eb;
            background: white;
            border-radius: 6px;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .toolbar-btn:hover {
            background: #f3f4f6;
            border-color: #d1d5db;
        }

        .toolbar-btn.active {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }

        .tag-input {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 8px 12px;
            transition: border-color 0.3s ease;
        }

        .tag-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .tag {
            background: #eff6ff;
            color: #1d4ed8;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            margin: 2px;
            gap: 6px;
        }

        .tag .remove-tag {
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.2s ease;
        }

        .tag .remove-tag:hover {
            opacity: 1;
        }

        .image-upload-area {
            border: 2px dashed #d1d5db;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .image-upload-area:hover {
            border-color: #3b82f6;
            background: #f8fafc;
        }

        .image-upload-area.dragover {
            border-color: #3b82f6;
            background: #eff6ff;
        }

        .preview-modal {
            backdrop-filter: blur(10px);
        }

        .word-count {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            z-index: 1000;
        }

        .auto-save-indicator {
            position: fixed;
            top: 80px;
            right: 20px;
            background: #10b981;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            z-index: 1000;
            transform: translateX(100px);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .auto-save-indicator.show {
            transform: translateX(0);
            opacity: 1;
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

        .pulse {
            animation: pulse 2s infinite;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="dashboard.html" class="text-2xl font-bold text-gray-900">BlogSpace</a>
                </div>
                <div class="flex items-center space-x-4">
                    <button onclick="showPreview()" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                        <i class="fas fa-eye mr-1"></i>Preview
                    </button>
                    <button onclick="saveDraft()" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300">
                        <i class="fas fa-save mr-1"></i>Save Draft
                    </button>
                    <button onclick="publishPost()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300">
                        <i class="fas fa-paper-plane mr-1"></i>Publish
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Auto-save Indicator -->
    <div id="autoSaveIndicator" class="auto-save-indicator">
        <i class="fas fa-check mr-2"></i>Auto-saved
    </div>

    <!-- Word Count -->
    <div id="wordCount" class="word-count">
        <i class="fas fa-file-word mr-2"></i>0 words
    </div>

    <div class="max-w-5xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Post Editor -->
        <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
            <!-- Title Section -->
            <div class="p-6 border-b border-gray-200">
                <input type="text" id="postTitle" placeholder="Enter your post title..."
                    class="w-full text-4xl font-bold text-gray-900 placeholder-gray-400 border-none focus:outline-none focus:ring-0 bg-transparent">
                <div class="mt-2 text-sm text-gray-500" id="titleCount">0/100 characters</div>
            </div>

            <!-- Subtitle Section -->
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <input type="text" id="postSubtitle" placeholder="Write a compelling subtitle (optional)..."
                    class="w-full text-xl text-gray-700 placeholder-gray-400 border-none focus:outline-none focus:ring-0 bg-transparent">
            </div>

            <!-- Featured Image Upload -->
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Featured Image</h3>
                    <div class="flex items-center space-x-2">
                        <button onclick="uploadFromUrl()" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            <i class="fas fa-link mr-1"></i>Add from URL
                        </button>
                        <button onclick="removeImage()" class="text-red-600 hover:text-red-800 text-sm font-medium" id="removeImageBtn" style="display: none;">
                            <i class="fas fa-trash mr-1"></i>Remove
                        </button>
                    </div>
                </div>

                <div id="imageUploadArea" class="image-upload-area" onclick="document.getElementById('imageInput').click()">
                    <div id="uploadPlaceholder">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                        <p class="text-lg font-medium text-gray-700 mb-2">Drop your image here or click to browse</p>
                        <p class="text-sm text-gray-500">Supports JPG, PNG, GIF up to 10MB</p>
                    </div>
                    <div id="imagePreview" class="hidden">
                        <img id="previewImg" class="max-w-full h-64 object-cover rounded-lg mx-auto" alt="Preview">
                        <div class="mt-4">
                            <input type="text" id="imageAlt" placeholder="Add alt text for accessibility..."
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>
                <input type="file" id="imageInput" class="hidden" accept="image/*" onchange="handleImageUpload(event)">
            </div>

            <!-- Advanced Toolbar -->
            <div class="px-6 py-3 border-b border-gray-200 bg-gray-50">
                <div class="flex flex-wrap items-center gap-2">
                    <!-- Text Formatting -->
                    <div class="flex items-center space-x-1 border-r border-gray-300 pr-3">
                        <button class="toolbar-btn" onclick="formatText('bold')" title="Bold (Ctrl+B)">
                            <i class="fas fa-bold"></i>
                        </button>
                        <button class="toolbar-btn" onclick="formatText('italic')" title="Italic (Ctrl+I)">
                            <i class="fas fa-italic"></i>
                        </button>
                        <button class="toolbar-btn" onclick="formatText('underline')" title="Underline (Ctrl+U)">
                            <i class="fas fa-underline"></i>
                        </button>
                        <button class="toolbar-btn" onclick="formatText('strikeThrough')" title="Strikethrough">
                            <i class="fas fa-strikethrough"></i>
                        </button>
                    </div>

                    <!-- Headings -->
                    <div class="flex items-center space-x-1 border-r border-gray-300 pr-3">
                        <select class="toolbar-btn" onchange="formatHeading(this.value)">
                            <option value="">Heading</option>
                            <option value="h1">Heading 1</option>
                            <option value="h2">Heading 2</option>
                            <option value="h3">Heading 3</option>
                            <option value="h4">Heading 4</option>
                        </select>
                    </div>

                    <!-- Lists -->
                    <div class="flex items-center space-x-1 border-r border-gray-300 pr-3">
                        <button class="toolbar-btn" onclick="formatText('insertUnorderedList')" title="Bullet List">
                            <i class="fas fa-list-ul"></i>
                        </button>
                        <button class="toolbar-btn" onclick="formatText('insertOrderedList')" title="Numbered List">
                            <i class="fas fa-list-ol"></i>
                        </button>
                    </div>

                    <!-- Alignment -->
                    <div class="flex items-center space-x-1 border-r border-gray-300 pr-3">
                        <button class="toolbar-btn" onclick="formatText('justifyLeft')" title="Align Left">
                            <i class="fas fa-align-left"></i>
                        </button>
                        <button class="toolbar-btn" onclick="formatText('justifyCenter')" title="Align Center">
                            <i class="fas fa-align-center"></i>
                        </button>
                        <button class="toolbar-btn" onclick="formatText('justifyRight')" title="Align Right">
                            <i class="fas fa-align-right"></i>
                        </button>
                    </div>

                    <!-- Insert Elements -->
                    <div class="flex items-center space-x-1">
                        <button class="toolbar-btn" onclick="insertLink()" title="Insert Link">
                            <i class="fas fa-link"></i>
                        </button>
                        <button class="toolbar-btn" onclick="insertQuote()" title="Insert Quote">
                            <i class="fas fa-quote-left"></i>
                        </button>
                        <button class="toolbar-btn" onclick="insertCode()" title="Insert Code">
                            <i class="fas fa-code"></i>
                        </button>
                        <button class="toolbar-btn" onclick="insertDivider()" title="Insert Divider">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Content Editor -->
            <div class="editor-container">
                <div id="contentEditor" class="editor-content" contenteditable="true"
                    onpaste="handlePaste(event)" oninput="updateWordCount(); autoSave();">
                </div>
            </div>

            <!-- Tags and Settings -->
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Tags Section -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                        <div class="flex flex-wrap gap-2 mb-3" id="tagsContainer"></div>
                        <div class="flex">
                            <input type="text" id="tagInput" placeholder="Add a tag..."
                                class="flex-1 tag-input rounded-r-none"
                                onkeypress="handleTagInput(event)">
                            <button onclick="addTag()" class="px-4 py-2 bg-blue-600 text-white rounded-r-lg hover:bg-blue-700 transition duration-300">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Press Enter or click + to add tags</p>
                    </div>

                    <!-- Settings Section -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select id="categorySelect" class="w-full tag-input mb-4">
                            <option value="">Select a category</option>
                            <option value="technology">Technology</option>
                            <option value="design">Design</option>
                            <option value="programming">Programming</option>
                            <option value="business">Business</option>
                            <option value="lifestyle">Lifestyle</option>
                            <option value="education">Education</option>
                            <option value="health">Health & Fitness</option>
                            <option value="travel">Travel</option>
                        </select>

                        <div class="space-y-3">
                            <label class="flex items-center">
                                <input type="checkbox" id="allowComments" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" checked>
                                <span class="ml-2 text-sm text-gray-700">Allow comments</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" id="featuredPost" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Mark as featured</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" id="emailNotify" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" checked>
                                <span class="ml-2 text-sm text-gray-700">Notify followers via email</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SEO Section -->
            <div class="px-6 py-4 border-t border-gray-200">
                <button onclick="toggleSEOSection()" class="flex items-center justify-between w-full text-left">
                    <h3 class="text-lg font-semibold text-gray-900">SEO Settings</h3>
                    <i class="fas fa-chevron-down transition-transform duration-300" id="seoChevron"></i>
                </button>

                <div id="seoSection" class="hidden mt-4 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                        <textarea id="metaDescription" rows="3" placeholder="Write a compelling description for search engines..."
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        <div class="text-sm text-gray-500 mt-1" id="metaDescCount">0/160 characters</div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Focus Keyword</label>
                        <input type="text" id="focusKeyword" placeholder="Enter your main keyword..."
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h4 class="font-medium text-blue-900 mb-2">SEO Score: <span id="seoScore">0/100</span></h4>
                        <div class="w-full bg-blue-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full transition-all duration-300" id="seoScoreBar" style="width: 0%"></div>
                        </div>
                        <ul class="mt-3 text-sm text-blue-800 space-y-1" id="seoSuggestions">
                            <li>• Add a focus keyword</li>
                            <li>• Write a meta description</li>
                            <li>• Add alt text to images</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Modal -->
    <div id="previewModal" class="fixed inset-0 bg-black bg-opacity-50 preview-modal hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-screen overflow-y-auto">
                <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Preview</h3>
                    <div class="flex items-center space-x-3">
                        <button onclick="previewMode('desktop')" class="px-3 py-1 text-sm bg-gray-100 rounded-lg hover:bg-gray-200 transition duration-300" id="desktopBtn">
                            <i class="fas fa-desktop mr-1"></i>Desktop
                        </button>
                        <button onclick="previewMode('mobile')" class="px-3 py-1 text-sm bg-gray-100 rounded-lg hover:bg-gray-200 transition duration-300" id="mobileBtn">
                            <i class="fas fa-mobile-alt mr-1"></i>Mobile
                        </button>
                        <button onclick="hidePreview()" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                </div>
                <div id="previewContent" class="p-6">
                    <!-- Preview content will be inserted here -->
                </div>
            </div>
        </div>
    </div>

    <!-- URL Input Modal -->
    <div id="urlModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Add Image from URL</h3>
                <input type="url" id="imageUrl" placeholder="https://example.com/image.jpg"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4">
                <div class="flex space-x-3">
                    <button onclick="hideUrlModal()" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-300">
                        Cancel
                    </button>
                    <button onclick="addImageFromUrl()" class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                        Add Image
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        class PostEditor {
            constructor() {
                this.tags = [];
                this.autoSaveInterval = null;
                this.wordCount = 0;
                this.init();
            }

            init() {
                this.setupEventListeners();
                this.setupDragAndDrop();
                this.setupAutoSave();
                this.setupKeyboardShortcuts();
                this.updateWordCount();
            }

            setupEventListeners() {
                // Title character count
                document.getElementById('postTitle').addEventListener('input', () => {
                    const title = document.getElementById('postTitle').value;
                    document.getElementById('titleCount').textContent = `${title.length}/100 characters`;
                });

                // Meta description character count
                document.getElementById('metaDescription').addEventListener('input', () => {
                    const desc = document.getElementById('metaDescription').value;
                    document.getElementById('metaDescCount').textContent = `${desc.length}/160 characters`;
                    this.updateSEOScore();
                });

                // Focus keyword
                document.getElementById('focusKeyword').addEventListener('input', () => {
                    this.updateSEOScore();
                });
            }

            setupDragAndDrop() {
                const uploadArea = document.getElementById('imageUploadArea');

                uploadArea.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    uploadArea.classList.add('dragover');
                });

                uploadArea.addEventListener('dragleave', () => {
                    uploadArea.classList.remove('dragover');
                });

                uploadArea.addEventListener('drop', (e) => {
                    e.preventDefault();
                    uploadArea.classList.remove('dragover');

                    const files = e.dataTransfer.files;
                    if (files.length > 0 && files[0].type.startsWith('image/')) {
                        this.handleImageFile(files[0]);
                    }
                });
            }

            setupAutoSave() {
                this.autoSaveInterval = setInterval(() => {
                    this.autoSave();
                }, 30000); // Auto-save every 30 seconds
            }

            setupKeyboardShortcuts() {
                document.addEventListener('keydown', (e) => {
                    if (e.ctrlKey || e.metaKey) {
                        switch (e.key) {
                            case 'b':
                                e.preventDefault();
                                this.formatText('bold');
                                break;
                            case 'i':
                                e.preventDefault();
                                this.formatText('italic');
                                break;
                            case 'u':
                                e.preventDefault();
                                this.formatText('underline');
                                break;
                            case 's':
                                e.preventDefault();
                                this.saveDraft();
                                break;
                        }
                    }
                });
            }

            handleImageFile(file) {
                if (file.size > 10 * 1024 * 1024) { // 10MB limit
                    alert('File size must be less than 10MB');
                    return;
                }

                const reader = new FileReader();
                reader.onload = (e) => {
                    this.showImagePreview(e.target.result);
                };
                reader.readAsDataURL(file);
            }

            showImagePreview(src) {
                document.getElementById('uploadPlaceholder').classList.add('hidden');
                document.getElementById('imagePreview').classList.remove('hidden');
                document.getElementById('previewImg').src = src;
                document.getElementById('removeImageBtn').style.display = 'inline-block';
            }

            formatText(command, value = null) {
                document.execCommand(command, false, value);
                document.getElementById('contentEditor').focus();
            }

            formatHeading(tag) {
                if (tag) {
                    document.execCommand('formatBlock', false, tag);
                }
                document.getElementById('contentEditor').focus();
            }

            insertLink() {
                const url = prompt('Enter URL:');
                if (url) {
                    const text = window.getSelection().toString() || url;
                    document.execCommand('insertHTML', false, `<a href="${url}" target="_blank">${text}</a>`);
                }
            }

            insertQuote() {
                const selection = window.getSelection().toString();
                const quote = selection || 'Quote text here...';
                document.execCommand('insertHTML', false, `<blockquote style="border-left: 4px solid #3b82f6; padding-left: 1rem; margin: 1rem 0; font-style: italic; color: #4b5563;">${quote}</blockquote>`);
            }

            insertCode() {
                const code = prompt('Enter code:');
                if (code) {
                    document.execCommand('insertHTML', false, `<code style="background: #f3f4f6; padding: 2px 6px; border-radius: 4px; font-family: monospace;">${code}</code>`);
                }
            }

            insertDivider() {
                document.execCommand('insertHTML', false, '<hr style="border: none; border-top: 2px solid #e5e7eb; margin: 2rem 0;">');
            }

            handleTagInput(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    this.addTag();
                }
            }

            addTag() {
                const input = document.getElementById('tagInput');
                const tag = input.value.trim().toLowerCase();

                if (tag && !this.tags.includes(tag) && this.tags.length < 10) {
                    this.tags.push(tag);
                    this.renderTags();
                    input.value = '';
                }
            }

            removeTag(tag) {
                this.tags = this.tags.filter(t => t !== tag);
                this.renderTags();
            }

            renderTags() {
                const container = document.getElementById('tagsContainer');
                container.innerHTML = this.tags.map(tag => `
                    <span class="tag">
                        #${tag}
                        <i class="fas fa-times remove-tag" onclick="postEditor.removeTag('${tag}')"></i>
                    </span>
                `).join('');
            }

            updateWordCount() {
                const content = document.getElementById('contentEditor').textContent || '';
                const words = content.trim().split(/\s+/).filter(word => word.length > 0);
                this.wordCount = words.length;

                document.getElementById('wordCount').innerHTML = `
                    <i class="fas fa-file-word mr-2"></i>${this.wordCount} words
                `;
            }

            updateSEOScore() {
                let score = 0;
                const suggestions = [];

                const title = document.getElementById('postTitle').value;
                const content = document.getElementById('contentEditor').textContent || '';
                const metaDesc = document.getElementById('metaDescription').value;
                const focusKeyword = document.getElementById('focusKeyword').value;

                // Title checks
                if (title.length > 0) {
                    score += 20;
                    if (title.length >= 30 && title.length <= 60) score += 10;
                } else {
                    suggestions.push('• Add a compelling title');
                }

                // Content checks
                if (content.length > 300) {
                    score += 20;
                } else {
                    suggestions.push('• Write at least 300 words');
                }

                // Meta description checks
                if (metaDesc.length > 0) {
                    score += 15;
                    if (metaDesc.length >= 120 && metaDesc.length <= 160) score += 10;
                } else {
                    suggestions.push('• Add a meta description');
                }

                // Focus keyword checks
                if (focusKeyword.length > 0) {
                    score += 15;
                    if (title.toLowerCase().includes(focusKeyword.toLowerCase())) score += 10;
                    if (content.toLowerCase().includes(focusKeyword.toLowerCase())) score += 10;
                } else {
                    suggestions.push('• Add a focus keyword');
                }

                // Update UI
                document.getElementById('seoScore').textContent = `${score}/100`;
                document.getElementById('seoScoreBar').style.width = `${score}%`;
                document.getElementById('seoSuggestions').innerHTML = suggestions.join('<br>');
            }

            autoSave() {
                const data = this.getPostData();
                localStorage.setItem('blogspace_draft', JSON.stringify(data));

                // Show auto-save indicator
                const indicator = document.getElementById('autoSaveIndicator');
                indicator.classList.add('show');
                setTimeout(() => indicator.classList.remove('show'), 2000);
            }

            saveDraft() {
                const data = this.getPostData();
                localStorage.setItem('blogspace_draft', JSON.stringify(data));
                alert('Draft saved successfully!');
            }

            getPostData() {
                return {
                    title: document.getElementById('postTitle').value,
                    subtitle: document.getElementById('postSubtitle').value,
                    content: document.getElementById('contentEditor').innerHTML,
                    tags: this.tags,
                    category: document.getElementById('categorySelect').value,
                    metaDescription: document.getElementById('metaDescription').value,
                    focusKeyword: document.getElementById('focusKeyword').value,
                    allowComments: document.getElementById('allowComments').checked,
                    featuredPost: document.getElementById('featuredPost').checked,
                    emailNotify: document.getElementById('emailNotify').checked,
                    timestamp: new Date().toISOString()
                };
            }

            loadDraft() {
                const draft = localStorage.getItem('blogspace_draft');
                if (draft) {
                    const data = JSON.parse(draft);
                    document.getElementById('postTitle').value = data.title || '';
                    document.getElementById('postSubtitle').value = data.subtitle || '';
                    document.getElementById('contentEditor').innerHTML = data.content || '';
                    this.tags = data.tags || [];
                    this.renderTags();
                    document.getElementById('categorySelect').value = data.category || '';
                    document.getElementById('metaDescription').value = data.metaDescription || '';
                    document.getElementById('focusKeyword').value = data.focusKeyword || '';
                    document.getElementById('allowComments').checked = data.allowComments !== false;
                    document.getElementById('featuredPost').checked = data.featuredPost || false;
                    document.getElementById('emailNotify').checked = data.emailNotify !== false;
                    this.updateWordCount();
                    this.updateSEOScore();
                }
            }
        }

        // Global functions
        function handleImageUpload(event) {
            const file = event.target.files[0];
            if (file) {
                postEditor.handleImageFile(file);
            }
        }

        function uploadFromUrl() {
            document.getElementById('urlModal').classList.remove('hidden');
        }

        function hideUrlModal() {
            document.getElementById('urlModal').classList.add('hidden');
            document.getElementById('imageUrl').value = '';
        }

        function addImageFromUrl() {
            const url = document.getElementById('imageUrl').value;
            if (url) {
                postEditor.showImagePreview(url);
                hideUrlModal();
            }
        }

        function removeImage() {
            document.getElementById('uploadPlaceholder').classList.remove('hidden');
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('previewImg').src = '';
            document.getElementById('removeImageBtn').style.display = 'none';
            document.getElementById('imageInput').value = '';
        }

        function toggleSEOSection() {
            const section = document.getElementById('seoSection');
            const chevron = document.getElementById('seoChevron');

            section.classList.toggle('hidden');
            chevron.style.transform = section.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
        }

        function showPreview() {
            const title = document.getElementById('postTitle').value || 'Untitled Post';
            const subtitle = document.getElementById('postSubtitle').value;
            const content = document.getElementById('contentEditor').innerHTML || '<p class="text-gray-500">No content yet...</p>';
            const previewImg = document.getElementById('previewImg').src;

            const previewContent = document.getElementById('previewContent');
            previewContent.innerHTML = `
                <article class="max-w-4xl mx-auto">
                    <header class="mb-8">
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">${title}</h1>
                        ${subtitle ? `<p class="text-xl text-gray-600 mb-6">${subtitle}</p>` : ''}
                        <div class="flex items-center text-sm text-gray-500 mb-6">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" 
                                 alt="Author" class="w-10 h-10 rounded-full mr-3">
                            <div>
                                <p class="font-medium text-gray-900">John Doe</p>
                                <p>${new Date().toLocaleDateString()} • ${postEditor.wordCount} words</p>
                            </div>
                        </div>
                    </header>
                    ${previewImg ? `<img src="${previewImg}" alt="Featured image" class="w-full h-96 object-cover rounded-lg mb-8">` : ''}
                    <div class="prose prose-lg max-w-none">${content}</div>
                    ${postEditor.tags.length > 0 ? `
                        <div class="mt-8 pt-8 border-t">
                            <div class="flex flex-wrap gap-2">
                                ${postEditor.tags.map(tag => `<span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">#${tag}</span>`).join('')}
                            </div>
                        </div>
                    ` : ''}
                </article>
            `;

            document.getElementById('previewModal').classList.remove('hidden');
        }

        function hidePreview() {
            document.getElementById('previewModal').classList.add('hidden');
        }

        function previewMode(mode) {
            const content = document.getElementById('previewContent');
            const desktopBtn = document.getElementById('desktopBtn');
            const mobileBtn = document.getElementById('mobileBtn');

            if (mode === 'mobile') {
                content.style.maxWidth = '375px';
                content.style.margin = '0 auto';
                mobileBtn.classList.add('bg-blue-600', 'text-white');
                mobileBtn.classList.remove('bg-gray-100');
                desktopBtn.classList.remove('bg-blue-600', 'text-white');
                desktopBtn.classList.add('bg-gray-100');
            } else {
                content.style.maxWidth = '';
                content.style.margin = '';
                desktopBtn.classList.add('bg-blue-600', 'text-white');
                desktopBtn.classList.remove('bg-gray-100');
                mobileBtn.classList.remove('bg-blue-600', 'text-white');
                mobileBtn.classList.add('bg-gray-100');
            }
        }

        function handlePaste(event) {
            event.preventDefault();
            const text = (event.clipboardData || window.clipboardData).getData('text/plain');
            document.execCommand('insertText', false, text);
        }

        function createArticle() {
            const token = localStorage.getItem('token');
            if (!token) {
                alert('You must be logged in to publish a post.');
                return;
            }
            const data = postEditor.getPostData();
            // Prepare data to send to backend
            const payload = {
                title: data.title,
                subtitle: data.subtitle,
                content: data.content,
                image: document.getElementById('previewImg').src || null,
                image_alt: document.getElementById('imageAlt') ? document.getElementById('imageAlt').value : null,
                tags: data.tags,
                category: data.category,
                meta_description: data.metaDescription,
                focus_keyword: data.focusKeyword,
                allow_comments: data.allowComments,
                featured: data.featuredPost,
                email_notify: data.emailNotify
            };
            fetch('http://127.0.0.1:8000/api/articles', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + token
                },
                body: JSON.stringify(payload)
            })
            .then(response => response.json())
            .then(res => {
                console.log(res);
                if (res.id) {
                    alert('Article created successfully!');
                    localStorage.removeItem('blogspace_draft');
                    window.location.href = 'blog-feed.html';
                } else {
                    alert('Error creating article: ' + (res.message || '')); 
                }
            })
            .catch((e) => console.error('Error:', e));
        }

        function publishPost() {
            const data = postEditor.getPostData();
            if (!data.title.trim()) {
                alert('Please add a title to your post');
                return;
            }
            if (!data.content.trim()) {
                alert('Please add some content to your post');
                return;
            }
            if (confirm('Are you ready to publish this post?')) {
                createArticle();
            }
        }

        // Initialize the post editor
        let postEditor;
        document.addEventListener('DOMContentLoaded', () => {
            postEditor = new PostEditor();
            postEditor.loadDraft();
        });
    </script>
</body>

</html><?php /**PATH C:\Users\bbila\OneDrive\Desktop\nezss\myproject\resources\views/post/index.blade.php ENDPATH**/ ?>