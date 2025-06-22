<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - BlogSpace</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(16px);
            border: 1.5px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.10);
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.13);
            border-radius: 50%;
            animation: float 8s infinite ease-in-out;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 18%;
            left: 8%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 62%;
            right: 8%;
            animation-delay: -2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 18%;
            left: 22%;
            animation-delay: -4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            33% {
                transform: translateY(-30px) rotate(120deg);
            }

            66% {
                transform: translateY(20px) rotate(240deg);
            }
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-field {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .input-field:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.10);
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            transition: color 0.3s ease;
        }

        .input-field:focus+.input-icon {
            color: #667eea;
        }

        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .toggle-password:hover {
            color: #667eea;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 16px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-primary:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.18);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            background: #a5b4fc;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            background: white;
            transition: all 0.3s ease;
            text-decoration: none;
            color: #374151;
            font-weight: 500;
        }

        .social-btn:hover {
            border-color: #667eea;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .custom-checkbox {
            width: 20px;
            height: 20px;
            border: 2px solid #d1d5db;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .custom-checkbox.checked {
            background: #667eea;
            border-color: #667eea;
        }

        .loading-spinner {
            width: 20px;
            height: 20px;
            border: 2px solid #ffffff;
            border-top: 2px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Error Alert Styling */
        #errorAlert {
            display: none;
        }

        #errorAlert.active {
            display: block;
            animation: fadeIn 0.4s;
        }
    </style>
</head>

<body class="gradient-bg min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative">
    <!-- Floating Shapes Background -->
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="max-w-md w-full space-y-8 relative z-10">
        <!-- Header -->
        <div class="text-center fade-in">
            <div class="mb-6">
                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fas fa-blog text-3xl text-blue-600"></i>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Welcome Back</h1>
                <h2 class="text-xl text-blue-100">Sign in to BlogSpace</h2>
            </div>
            <p class="text-sm text-blue-100">
                Don't have an account?
                <a href="register" class="font-medium text-white hover:text-blue-200 underline transition duration-300">Create one now</a>
            </p>
        </div>

        <!-- Login Form -->
        <div class="glass-effect rounded-2xl shadow-2xl p-8 fade-in">
            <form id="loginForm" class="space-y-6">
                <!-- Email Field -->
                <div class="input-group">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" id="email" class="input-field pl-12" placeholder="Email address" required autocomplete="username">
                </div>

                <!-- Password Field -->
                <div class="input-group">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" id="password" class="input-field pl-12 pr-12" placeholder="Password" required autocomplete="current-password">
                    <i class="fas fa-eye toggle-password" id="togglePassword" tabindex="0" aria-label="Show/Hide password"></i>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <div class="remember-me">
                        <div class="custom-checkbox" id="rememberCheckbox">
                            <i class="fas fa-check text-white text-sm" style="display: none;"></i>
                        </div>
                        <label for="remember" class="text-sm text-gray-700 cursor-pointer">Remember me</label>
                        <input type="checkbox" id="remember" class="hidden">
                    </div>
                    <a href="reset-password.html" class="text-sm text-blue-600 hover:text-blue-500 font-medium transition duration-300">
                        Forgot password?
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-primary w-full" id="submitBtn">
                    <span id="submitText">Sign In</span>
                    <div class="loading-spinner hidden" id="loadingSpinner"></div>
                </button>

                <!-- Error Alert -->
                <div id="errorAlert" class="bg-red-50 border border-red-200 rounded-lg p-4 mt-4">
                    <div class="flex">
                        <i class="fas fa-exclamation-circle text-red-400 mr-3 mt-0.5"></i>
                        <div>
                            <h3 class="text-sm font-medium text-red-800">Sign in failed</h3>
                            <p class="text-sm text-red-700 mt-1" id="errorMessage">Please check your credentials and try again.</p>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Social Login -->
            <div class="mt-8">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue with</span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-3">
                    <button class="social-btn" onclick="signInWithGoogle()">
                        <i class="fab fa-google text-red-500 mr-2"></i>
                        <span>Google</span>
                    </button>
                    <button class="social-btn" onclick="signInWithGithub()">
                        <i class="fab fa-github text-gray-900 mr-2"></i>
                        <span>GitHub</span>
                    </button>
                </div>
            </div>

            <!-- Quick Demo Login -->
            <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                <h4 class="text-sm font-medium text-blue-900 mb-2">Quick Demo Access</h4>
                <p class="text-xs text-blue-700 mb-3">Try BlogSpace without creating an account</p>
                <button onclick="demoLogin()" class="w-full bg-blue-100 hover:bg-blue-200 text-blue-800 py-2 px-4 rounded-lg text-sm font-medium transition duration-300">
                    <i class="fas fa-play mr-2"></i>Demo Login
                </button>
            </div>
        </div>

        <!-- Security Notice -->
        <div class="text-center text-xs text-blue-100 fade-in">
            <i class="fas fa-shield-alt mr-1"></i>
            Your data is protected with enterprise-grade security
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('loginForm');
            const emailField = document.getElementById('email');
            const passwordField = document.getElementById('password');
            const errorAlert = document.getElementById('errorAlert');
            const errorMessage = document.getElementById('errorMessage');
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            const togglePassword = document.getElementById('togglePassword');

            // Password show/hide
            togglePassword.addEventListener('click', function() {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                togglePassword.classList.toggle('fa-eye');
                togglePassword.classList.toggle('fa-eye-slash');
            });

            // Hide error on input
            [emailField, passwordField].forEach(input => {
                input.addEventListener('input', () => {
                    errorAlert.classList.remove('active');
                });
            });

            // Submit
            let isSubmitting = false;
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                if (isSubmitting) return;
                isSubmitting = true;
                errorAlert.classList.remove('active');
                submitBtn.disabled = true;
                submitText.textContent = 'Signing In...';
                loadingSpinner.classList.remove('hidden');
                try {
                    const response = await fetch('http://127.0.0.1:8000/api/login', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({
                            email: emailField.value,
                            password: passwordField.value
                        })
                    });
                    const data = await response.json();
                    if (response.ok && data.token) {
                        localStorage.setItem('token', data.token);
                        window.location.href = '/';
                    } else {
                        errorMessage.textContent = data.message || 'Login failed.';
                        errorAlert.classList.add('active');
                    }
                } catch (err) {
                    errorMessage.textContent = 'Network error.';
                    errorAlert.classList.add('active');
                } finally {
                    submitBtn.disabled = false;
                    submitText.textContent = 'Sign In';
                    loadingSpinner.classList.add('hidden');
                    isSubmitting = false;
                }
            });

            // Demo login
            const demoBtn = document.querySelector('button[onclick="demoLogin()"]');
            if (demoBtn) {
                demoBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (isSubmitting) return;
                    emailField.value = 'demo@blogspace.com';
                    passwordField.value = 'demo123';
                    form.dispatchEvent(new Event('submit'));
                });
            }
        });
    </script>
</body>

</html>