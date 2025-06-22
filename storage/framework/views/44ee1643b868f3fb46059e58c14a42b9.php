<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - BlogSpace</title>
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
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-field {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: white;
        }

        .input-field:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .input-field.valid {
            border-color: #10b981;
            background-color: #f0fdf4;
        }

        .input-field.invalid {
            border-color: #ef4444;
            background-color: #fef2f2;
        }

        .input-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            transition: color 0.3s ease;
        }

        .input-field.valid+.input-icon {
            color: #10b981;
        }

        .input-field.invalid+.input-icon {
            color: #ef4444;
        }

        .validation-message {
            font-size: 14px;
            margin-top: 4px;
            transition: all 0.3s ease;
        }

        .validation-message.success {
            color: #10b981;
        }

        .validation-message.error {
            color: #ef4444;
        }

        .password-strength {
            height: 4px;
            background: #e5e7eb;
            border-radius: 2px;
            margin-top: 8px;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak {
            background: #ef4444;
            width: 25%;
        }

        .strength-fair {
            background: #f59e0b;
            width: 50%;
        }

        .strength-good {
            background: #3b82f6;
            width: 75%;
        }

        .strength-strong {
            background: #10b981;
            width: 100%;
        }

        .floating-label {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 16px;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .input-field:focus+.floating-label,
        .input-field:not(:placeholder-shown)+.floating-label {
            top: -8px;
            left: 12px;
            font-size: 12px;
            color: #667eea;
            background: white;
            padding: 0 4px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
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
        }

        .social-btn:hover {
            border-color: #667eea;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .progress-bar {
            height: 4px;
            background: #e5e7eb;
            border-radius: 2px;
            margin-bottom: 2rem;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }
        }

        .shake {
            animation: shake 0.5s ease-in-out;
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }
    </style>
</head>

<body class="gradient-bg min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Header -->
        <div class="text-center">
            <h1 class="text-3xl font-bold text-white mb-2">BlogSpace</h1>
            <h2 class="text-2xl font-bold text-white">Create your account</h2>
            <p class="mt-2 text-sm text-blue-100">
                Already have an account?
                <a href="login" class="font-medium text-white hover:text-blue-200 underline">Sign in</a>
            </p>
        </div>

        <!-- Progress Bar -->
        <div class="progress-bar">
            <div class="progress-fill" id="progressFill" style="width: 33%"></div>
        </div>

        <!-- Registration Form -->
        <div class="glass-effect rounded-2xl shadow-2xl p-8">
            <form id="registrationForm" class="space-y-6" novalidate>
                <div class="step active" id="step1">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Basic Information</h3>

                    <div class="input-group">
                        <input type="text" id="firstname" name="firstname" class="input-field" placeholder=" " required>
                        <label class="floating-label">First Name</label>
                        <i class="fas fa-user input-icon"></i>
                        <div id="firstnameMessage" class="validation-message"></div>
                    </div>

                    <div class="input-group">
                        <input type="text" id="lastname" name="lastname" class="input-field" placeholder=" " required>
                        <label class="floating-label">Last Name</label>
                        <i class="fas fa-user input-icon"></i>
                        <div id="lastnameMessage" class="validation-message"></div>
                    </div>

                    <div class="input-group">
                        <input type="email" id="email" name="email" class="input-field" placeholder=" " required>
                        <label class="floating-label">Email Address</label>
                        <i class="fas fa-envelope input-icon"></i>
                        <div id="emailMessage" class="validation-message"></div>
                    </div>

                    <button type="button" class="btn-primary w-full" id="step1Next">
                        Continue <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>

                <div class="step" id="step2">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Secure Your Account</h3>

                    <div class="input-group">
                        <input type="password" id="password" name="password" class="input-field" placeholder=" " required>
                        <label class="floating-label">Password</label>
                        <i class="fas fa-eye input-icon cursor-pointer" id="togglePassword"></i>
                        <div id="passwordMessage" class="validation-message"></div>

                        <div class="password-strength">
                            <div class="password-strength-bar" id="strengthBar"></div>
                        </div>
                        <div class="text-xs text-gray-500 mt-2" id="strengthText">Password strength: Weak</div>
                    </div>

                    <div class="input-group">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="input-field" placeholder=" " required>
                        <label class="floating-label">Confirm Password</label>
                        <i class="fas fa-eye input-icon cursor-pointer" id="toggleConfirmPassword"></i>
                        <div id="password_confirmationMessage" class="validation-message"></div>
                    </div>

                    <div class="flex space-x-3">
                        <button type="button" class="flex-1 border-2 border-gray-300 text-gray-700 py-3 rounded-lg font-medium hover:border-gray-400 transition duration-300" id="step2Back">
                            <i class="fas fa-arrow-left mr-2"></i>Back
                        </button>
                        <button type="button" class="flex-1 btn-primary" id="step2Next">
                            Continue <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>

                <div class="step" id="step3">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Almost Done!</h3>

                    <div class="flex items-start space-x-3 mb-6">
                        <input type="checkbox" id="terms" name="terms" class="mt-1 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required>
                        <label for="terms" class="text-sm text-gray-700">
                            I agree to the
                            <a href="#" class="text-blue-600 hover:text-blue-500 underline">Terms of Service</a>
                            and
                            <a href="#" class="text-blue-600 hover:text-blue-500 underline">Privacy Policy</a>
                        </label>
                    </div>

                    <div class="flex space-x-3">
                        <button type="button" class="flex-1 border-2 border-gray-300 text-gray-700 py-3 rounded-lg font-medium hover:border-gray-400 transition duration-300" id="step3Back">
                            <i class="fas fa-arrow-left mr-2"></i>Back
                        </button>
                        <button type="submit" class="flex-1 btn-primary" id="submitBtn">
                            <span id="submitText">Create Account</span>
                            <i class="fas fa-spinner fa-spin ml-2 hidden" id="submitSpinner"></i>
                        </button>
                    </div>
                </div>
            </form>



            <!-- Social Registration -->
            <div class="mt-8">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or sign up with</span>
                    </div>
                </div>

                <div class="mt-6 grid grid-cols-2 gap-3">
                    <a href="#" class="social-btn">
                        <i class="fab fa-google text-red-500 mr-2"></i>
                        <span class="font-medium">Google</span>
                    </a>
                    <a href="#" class="social-btn">
                        <i class="fab fa-github text-gray-900 mr-2"></i>
                        <span class="font-medium">GitHub</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Success Modal -->
        <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="glass-effect rounded-2xl p-8 max-w-md mx-4 text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-check text-2xl text-green-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Welcome to BlogSpace!</h3>
                <p class="text-gray-600 mb-6">Your account has been created successfully. Please check your email to verify your account.</p>
                <button onclick="window.location.href='/'" class="btn-primary w-full">
                    Continue to home
                </button>
            </div>
        </div>
    </div>

    <script>
        class RegistrationValidator {
            constructor() {
                this.currentStep = 1;
                this.totalSteps = 3;
                this.validationRules = {
                    firstname: {
                        required: true,
                        minLength: 2,
                        pattern: /^[a-zA-Z\s]+$/,
                        message: 'First name must contain only letters and spaces'
                    },
                    lastname: {
                        required: true,
                        minLength: 2,
                        pattern: /^[a-zA-Z\s]+$/,
                        message: 'Last name must contain only letters and spaces'
                    },
                    email: {
                        required: true,
                        pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                        message: 'Please enter a valid email address'
                    },
                    password: {
                        required: true,
                        minLength: 8,
                        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/,
                        message: 'Password must contain at least 8 characters with uppercase, lowercase, number, and special character'
                    }
                };

                this.init();
            }

            init() {
                this.bindEvents();
                this.setupPasswordToggle();
                this.setupRealTimeValidation();
            }

            bindEvents() {
                document.getElementById('step1Next').addEventListener('click', () => this.nextStep(1));
                document.getElementById('step2Next').addEventListener('click', () => this.nextStep(2));
                document.getElementById('step2Back').addEventListener('click', () => this.prevStep(2));
                document.getElementById('step3Back').addEventListener('click', () => this.prevStep(3));

                document.getElementById('registrationForm').addEventListener('submit', (e) => this.handleSubmit(e));
            }

            setupPasswordToggle() {
                const togglePassword = document.getElementById('togglePassword');
                const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
                const password = document.getElementById('password');
                const confirmPassword = document.getElementById('password_confirmation');

                togglePassword.addEventListener('click', () => {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    togglePassword.classList.toggle('fa-eye');
                    togglePassword.classList.toggle('fa-eye-slash');
                });

                toggleConfirmPassword.addEventListener('click', () => {
                    const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                    confirmPassword.setAttribute('type', type);
                    toggleConfirmPassword.classList.toggle('fa-eye');
                    toggleConfirmPassword.classList.toggle('fa-eye-slash');
                });
            }

            setupRealTimeValidation() {
                ['firstname', 'lastname', 'email', 'password', 'password_confirmation'].forEach(fieldName => {
                    const field = document.getElementById(fieldName);
                    if (!field) return;
                    if (fieldName !== 'password_confirmation') {
                        field.addEventListener('input', () => this.validateField(fieldName));
                        field.addEventListener('blur', () => this.validateField(fieldName));
                    }
                });

                document.getElementById('password').addEventListener('input', () => this.updatePasswordStrength());
                document.getElementById('password_confirmation').addEventListener('input', () => this.validatePasswordMatch());
            }

            validateField(fieldName) {
                const field = document.getElementById(fieldName);
                const rules = this.validationRules[fieldName];
                if (!rules) return true; // No rules means no validation
                const value = field.value.trim();
                const messageElement = document.getElementById(fieldName + 'Message');

                field.classList.remove('valid', 'invalid');
                if (!value && rules.required) {
                    this.showValidationMessage(messageElement, 'This field is required', 'error');
                    field.classList.add('invalid');
                    return false;
                }
                if (value && rules.minLength && value.length < rules.minLength) {
                    this.showValidationMessage(messageElement, `Minimum ${rules.minLength} characters required`, 'error');
                    field.classList.add('invalid');
                    return false;
                }
                if (value && rules.pattern && !rules.pattern.test(value)) {
                    this.showValidationMessage(messageElement, rules.message, 'error');
                    field.classList.add('invalid');
                    return false;
                }

                this.showValidationMessage(messageElement, '✓ Looks good!', 'success');
                field.classList.add('valid');
                return true;
            }

            updatePasswordStrength() {
                const password = document.getElementById('password').value;
                const strengthBar = document.getElementById('strengthBar');
                const strengthText = document.getElementById('strengthText');

                let strength = 0;
                if (password.length >= 8) strength++;
                if (/[a-z]/.test(password)) strength++;
                if (/[A-Z]/.test(password)) strength++;
                if (/\d/.test(password)) strength++;
                if (/[@$!%*?&]/.test(password)) strength++;

                let strengthLabel = 'Weak';
                let strengthClass = 'strength-weak';

                if (strength === 5) {
                    strengthLabel = 'Strong';
                    strengthClass = 'strength-strong';
                } else if (strength >= 3) {
                    strengthLabel = 'Fair';
                    strengthClass = 'strength-fair';
                }

                strengthBar.className = `password-strength-bar ${strengthClass}`;
                strengthText.textContent = `Password strength: ${strengthLabel}`;
            }

            validatePasswordMatch() {
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('password_confirmation').value;
                const messageElement = document.getElementById('password_confirmationMessage');
                const field = document.getElementById('password_confirmation');

                field.classList.remove('valid', 'invalid');

                if (!confirmPassword) {
                    this.showValidationMessage(messageElement, 'Please confirm your password', 'error');
                    field.classList.add('invalid');
                    return false;
                }

                if (password !== confirmPassword) {
                    this.showValidationMessage(messageElement, 'Passwords do not match', 'error');
                    field.classList.add('invalid');
                    return false;
                }

                this.showValidationMessage(messageElement, '✓ Passwords match!', 'success');
                field.classList.add('valid');
                return true;
            }

            nextStep(currentStep) {
                let canProceed = false;
                if (currentStep === 1) {
                    const validFirst = this.validateField('firstname');
                    const validLast = this.validateField('lastname');
                    const validEmail = this.validateField('email');
                    canProceed = validFirst && validLast && validEmail;
                } else if (currentStep === 2) {
                    const validPass = this.validateField('password');
                    const validConfirm = this.validatePasswordMatch();
                    canProceed = validPass && validConfirm;
                }

                if (canProceed) {
                    document.getElementById(`step${currentStep}`).classList.remove('active');
                    this.currentStep++;
                    document.getElementById(`step${this.currentStep}`).classList.add('active');
                    // Update progress bar
                    const progress = [33, 66, 100][this.currentStep - 1];
                    document.getElementById('progressFill').style.width = progress + '%';
                }
            }

            prevStep(currentStep) {
                document.getElementById(`step${currentStep}`).classList.remove('active');
                this.currentStep--;
                document.getElementById(`step${this.currentStep}`).classList.add('active');
                // Update progress bar
                const progress = [33, 66, 100][this.currentStep - 1];
                document.getElementById('progressFill').style.width = progress + '%';
            }

            showValidationMessage(element, message, type) {
                if (!element) return;
                element.textContent = message;
                element.classList.remove('error', 'success');
                if (type === 'error') {
                    element.classList.add('error');
                } else if (type === 'success') {
                    element.classList.add('success');
                }
            }

            async handleSubmit(event) {
                event.preventDefault();
                const terms = document.getElementById('terms');
                if (!terms.checked) {
                    alert('Please accept the terms and conditions.');
                    return false;
                }
                const validFirst = this.validateField('firstname');
                const validLast = this.validateField('lastname');
                const validEmail = this.validateField('email');
                const validPass = this.validateField('password');
                const validConfirm = this.validatePasswordMatch();

                if (!(validFirst && validLast && validEmail && validPass && validConfirm)) {
                    alert('Please fix errors in the form before submitting.');
                    return false;
                }

                document.getElementById('submitText').classList.add('hidden');
                document.getElementById('submitSpinner').classList.remove('hidden');

                // Send data to API
                const data = {
                    firstname: document.getElementById('firstname').value.trim(),
                    lastname: document.getElementById('lastname').value.trim(),
                    email: document.getElementById('email').value.trim(),
                    password: document.getElementById('password').value,
                    password_confirmation: document.getElementById('password_confirmation').value
                };

                try {
                    const response = await fetch('http://127.0.0.1:8000/api/register', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(data)
                    });
                    const result = await response.json();
                    if (result.status && result.token) {
                        localStorage.setItem('token', result.token);
                        document.getElementById('successModal').classList.remove('hidden');
                    } else {
                        alert(result.message || 'Registration failed.');
                    }
                } catch (error) {
                    alert('Registration failed. Please try again.');
                } finally {
                    document.getElementById('submitText').classList.remove('hidden');
                    document.getElementById('submitSpinner').classList.add('hidden');
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            new RegistrationValidator();
        });
    </script>
</body>

</html><?php /**PATH C:\Users\bbila\OneDrive\Desktop\nezss\myproject\resources\views/auth/register.blade.php ENDPATH**/ ?>