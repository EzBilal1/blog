<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - BlogSpace</title>
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

        .step {
            display: none;
        }

        .step.active {
            display: block;
            animation: fadeInUp 0.5s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .progress-bar {
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: white;
            border-radius: 2px;
            transition: width 0.3s ease;
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
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .input-field.error {
            border-color: #ef4444;
            background-color: #fef2f2;
        }

        .input-field.success {
            border-color: #10b981;
            background-color: #f0fdf4;
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

        .verification-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            margin: 0 4px;
            transition: all 0.3s ease;
        }

        .verification-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: scale(1.05);
        }

        .verification-input.filled {
            border-color: #10b981;
            background-color: #f0fdf4;
        }

        .timer {
            font-family: 'Courier New', monospace;
            font-size: 18px;
            font-weight: bold;
            color: #667eea;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: #10b981;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            animation: bounceIn 0.6s ease-out;
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s infinite ease-in-out;
        }

        .floating-element:nth-child(1) {
            width: 60px;
            height: 60px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            width: 80px;
            height: 80px;
            top: 70%;
            right: 10%;
            animation-delay: -2s;
        }

        .floating-element:nth-child(3) {
            width: 40px;
            height: 40px;
            bottom: 10%;
            left: 30%;
            animation-delay: -4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }
    </style>
</head>

<body class="gradient-bg min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative">
    <!-- Floating Elements -->
    <div class="floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <div class="max-w-md w-full space-y-8 relative z-10">
        <!-- Header -->
        <div class="text-center">
            <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                <i class="fas fa-key text-2xl text-blue-600"></i>
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">Reset Password</h1>
            <p class="text-blue-100">We'll help you get back into your account</p>
        </div>

        <!-- Progress Bar -->
        <div class="progress-bar">
            <div class="progress-fill" id="progressFill" style="width: 33%"></div>
        </div>

        <!-- Reset Form -->
        <div class="glass-effect rounded-2xl shadow-2xl p-8">
            <!-- Step 1: Email Input -->
            <div class="step active" id="step1">
                <div class="text-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">Enter your email</h2>
                    <p class="text-gray-600">We'll send you a verification code</p>
                </div>

                <form id="emailForm" class="space-y-6">
                    <div>
                        <input type="email" id="email" class="input-field" placeholder="Enter your email address" required>
                        <div class="text-red-500 text-sm mt-2 hidden" id="emailError">Please enter a valid email address</div>
                        <div class="text-green-500 text-sm mt-2 hidden" id="emailSuccess">Email is valid!</div>
                    </div>

                    <button type="submit" class="btn-primary w-full" id="sendCodeBtn">
                        <span id="sendCodeText">Send Verification Code</span>
                        <i class="fas fa-spinner fa-spin ml-2 hidden" id="sendCodeSpinner"></i>
                    </button>
                </form>

                <div class="text-center mt-6">
                    <a href="login.html" class="text-blue-600 hover:text-blue-500 text-sm font-medium">
                        <i class="fas fa-arrow-left mr-1"></i>Back to Sign In
                    </a>
                </div>
            </div>

            <!-- Step 2: Verification Code -->
            <div class="step" id="step2">
                <div class="text-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">Enter verification code</h2>
                    <p class="text-gray-600">We sent a 6-digit code to <span id="emailDisplay" class="font-medium"></span></p>
                </div>

                <form id="verificationForm" class="space-y-6">
                    <div class="flex justify-center">
                        <input type="text" class="verification-input" maxlength="1" id="code1">
                        <input type="text" class="verification-input" maxlength="1" id="code2">
                        <input type="text" class="verification-input" maxlength="1" id="code3">
                        <input type="text" class="verification-input" maxlength="1" id="code4">
                        <input type="text" class="verification-input" maxlength="1" id="code5">
                        <input type="text" class="verification-input" maxlength="1" id="code6">
                    </div>

                    <div class="text-center">
                        <div class="text-red-500 text-sm hidden" id="codeError">Invalid verification code</div>
                        <div class="text-green-500 text-sm hidden" id="codeSuccess">Code verified successfully!</div>
                    </div>

                    <button type="submit" class="btn-primary w-full" id="verifyCodeBtn">
                        <span id="verifyCodeText">Verify Code</span>
                        <i class="fas fa-spinner fa-spin ml-2 hidden" id="verifyCodeSpinner"></i>
                    </button>
                </form>

                <div class="text-center mt-6">
                    <p class="text-gray-600 text-sm mb-2">
                        Didn't receive the code?
                        <button id="resendBtn" class="text-blue-600 hover:text-blue-500 font-medium" disabled>
                            Resend in <span class="timer" id="timer">60</span>s
                        </button>
                    </p>
                    <button onclick="goToStep(1)" class="text-gray-500 hover:text-gray-700 text-sm">
                        <i class="fas fa-arrow-left mr-1"></i>Change email
                    </button>
                </div>
            </div>

            <!-- Step 3: New Password -->
            <div class="step" id="step3">
                <div class="text-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">Create new password</h2>
                    <p class="text-gray-600">Choose a strong password for your account</p>
                </div>

                <form id="passwordForm" class="space-y-6">
                    <div>
                        <div class="relative">
                            <input type="password" id="newPassword" class="input-field pr-12" placeholder="New password" required>
                            <i class="fas fa-eye absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 cursor-pointer" id="toggleNewPassword"></i>
                        </div>
                        <div class="mt-2">
                            <div class="flex justify-between text-xs text-gray-500 mb-1">
                                <span>Password strength:</span>
                                <span id="strengthText">Weak</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-red-500 h-2 rounded-full transition-all duration-300" id="strengthBar" style="width: 0%"></div>
                            </div>
                        </div>
                        <div class="text-red-500 text-sm mt-2 hidden" id="passwordError">Password must be at least 8 characters</div>
                    </div>

                    <div>
                        <div class="relative">
                            <input type="password" id="confirmPassword" class="input-field pr-12" placeholder="Confirm new password" required>
                            <i class="fas fa-eye absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 cursor-pointer" id="toggleConfirmPassword"></i>
                        </div>
                        <div class="text-red-500 text-sm mt-2 hidden" id="confirmPasswordError">Passwords do not match</div>
                        <div class="text-green-500 text-sm mt-2 hidden" id="confirmPasswordSuccess">Passwords match!</div>
                    </div>

                    <div class="bg-blue-50 p-4 rounded-lg">
                        <h4 class="font-medium text-blue-900 mb-2">Password Requirements:</h4>
                        <ul class="text-sm text-blue-800 space-y-1">
                            <li class="flex items-center" id="req1">
                                <i class="fas fa-times text-red-500 mr-2"></i>
                                At least 8 characters
                            </li>
                            <li class="flex items-center" id="req2">
                                <i class="fas fa-times text-red-500 mr-2"></i>
                                One uppercase letter
                            </li>
                            <li class="flex items-center" id="req3">
                                <i class="fas fa-times text-red-500 mr-2"></i>
                                One lowercase letter
                            </li>
                            <li class="flex items-center" id="req4">
                                <i class="fas fa-times text-red-500 mr-2"></i>
                                One number
                            </li>
                        </ul>
                    </div>

                    <button type="submit" class="btn-primary w-full" id="resetPasswordBtn">
                        <span id="resetPasswordText">Reset Password</span>
                        <i class="fas fa-spinner fa-spin ml-2 hidden" id="resetPasswordSpinner"></i>
                    </button>
                </form>
            </div>

            <!-- Step 4: Success -->
            <div class="step" id="step4">
                <div class="text-center">
                    <div class="success-icon">
                        <i class="fas fa-check text-3xl text-white"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Password Reset Successful!</h2>
                    <p class="text-gray-600 mb-8">Your password has been successfully reset. You can now sign in with your new password.</p>

                    <button onclick="window.location.href='login.html'" class="btn-primary w-full">
                        <i class="fas fa-sign-in-alt mr-2"></i>Sign In Now
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        class PasswordResetManager {
            constructor() {
                this.currentStep = 1;
                this.totalSteps = 4;
                this.timer = null;
                this.timeLeft = 60;
                this.init();
            }

            init() {
                this.bindEvents();
                this.setupPasswordToggle();
                this.setupVerificationInputs();
            }

            bindEvents() {
                // Email form
                document.getElementById('emailForm').addEventListener('submit', (e) => this.handleEmailSubmit(e));
                document.getElementById('email').addEventListener('input', () => this.validateEmail());

                // Verification form
                document.getElementById('verificationForm').addEventListener('submit', (e) => this.handleVerificationSubmit(e));

                // Password form
                document.getElementById('passwordForm').addEventListener('submit', (e) => this.handlePasswordSubmit(e));
                document.getElementById('newPassword').addEventListener('input', () => this.validatePassword());
                document.getElementById('confirmPassword').addEventListener('input', () => this.validatePasswordMatch());

                // Resend button
                document.getElementById('resendBtn').addEventListener('click', () => this.resendCode());
            }

            setupPasswordToggle() {
                const toggles = ['toggleNewPassword', 'toggleConfirmPassword'];
                const fields = ['newPassword', 'confirmPassword'];

                toggles.forEach((toggleId, index) => {
                    const toggle = document.getElementById(toggleId);
                    const field = document.getElementById(fields[index]);

                    toggle.addEventListener('click', () => {
                        const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
                        field.setAttribute('type', type);
                        toggle.classList.toggle('fa-eye');
                        toggle.classList.toggle('fa-eye-slash');
                    });
                });
            }

            setupVerificationInputs() {
                const inputs = document.querySelectorAll('.verification-input');

                inputs.forEach((input, index) => {
                    input.addEventListener('input', (e) => {
                        const value = e.target.value;

                        if (value.length === 1) {
                            input.classList.add('filled');
                            if (index < inputs.length - 1) {
                                inputs[index + 1].focus();
                            }
                        } else {
                            input.classList.remove('filled');
                        }
                    });

                    input.addEventListener('keydown', (e) => {
                        if (e.key === 'Backspace' && !input.value && index > 0) {
                            inputs[index - 1].focus();
                        }
                    });

                    input.addEventListener('paste', (e) => {
                        e.preventDefault();
                        const paste = e.clipboardData.getData('text');
                        const digits = paste.replace(/\D/g, '').slice(0, 6);

                        digits.split('').forEach((digit, i) => {
                            if (inputs[i]) {
                                inputs[i].value = digit;
                                inputs[i].classList.add('filled');
                            }
                        });
                    });
                });
            }

            validateEmail() {
                const email = document.getElementById('email');
                const errorMsg = document.getElementById('emailError');
                const successMsg = document.getElementById('emailSuccess');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                this.resetValidation(email, errorMsg, successMsg);

                if (!email.value.trim()) {
                    return false;
                }

                if (!emailRegex.test(email.value)) {
                    this.showError(email, errorMsg, 'Please enter a valid email address');
                    return false;
                }

                this.showSuccess(email, successMsg, 'Email is valid!');
                return true;
            }

            validatePassword() {
                const password = document.getElementById('newPassword').value;
                const strengthBar = document.getElementById('strengthBar');
                const strengthText = document.getElementById('strengthText');

                let strength = 0;
                let strengthLabel = 'Weak';
                let color = '#ef4444';

                // Check requirements
                const requirements = [{
                        id: 'req1',
                        test: password.length >= 8
                    },
                    {
                        id: 'req2',
                        test: /[A-Z]/.test(password)
                    },
                    {
                        id: 'req3',
                        test: /[a-z]/.test(password)
                    },
                    {
                        id: 'req4',
                        test: /\d/.test(password)
                    }
                ];

                requirements.forEach(req => {
                    const element = document.getElementById(req.id);
                    const icon = element.querySelector('i');

                    if (req.test) {
                        strength++;
                        icon.className = 'fas fa-check text-green-500 mr-2';
                    } else {
                        icon.className = 'fas fa-times text-red-500 mr-2';
                    }
                });

                // Update strength indicator
                switch (strength) {
                    case 0:
                    case 1:
                        strengthLabel = 'Weak';
                        color = '#ef4444';
                        break;
                    case 2:
                        strengthLabel = 'Fair';
                        color = '#f59e0b';
                        break;
                    case 3:
                        strengthLabel = 'Good';
                        color = '#3b82f6';
                        break;
                    case 4:
                        strengthLabel = 'Strong';
                        color = '#10b981';
                        break;
                }

                strengthBar.style.width = `${(strength / 4) * 100}%`;
                strengthBar.style.backgroundColor = color;
                strengthText.textContent = strengthLabel;

                return strength >= 3;
            }

            validatePasswordMatch() {
                const password = document.getElementById('newPassword').value;
                const confirmPassword = document.getElementById('confirmPassword');
                const errorMsg = document.getElementById('confirmPasswordError');
                const successMsg = document.getElementById('confirmPasswordSuccess');

                this.resetValidation(confirmPassword, errorMsg, successMsg);

                if (!confirmPassword.value) {
                    return false;
                }

                if (password !== confirmPassword.value) {
                    this.showError(confirmPassword, errorMsg, 'Passwords do not match');
                    return false;
                }

                this.showSuccess(confirmPassword, successMsg, 'Passwords match!');
                return true;
            }

            async handleEmailSubmit(e) {
                e.preventDefault();

                if (!this.validateEmail()) {
                    return;
                }

                const btn = document.getElementById('sendCodeBtn');
                const text = document.getElementById('sendCodeText');
                const spinner = document.getElementById('sendCodeSpinner');

                btn.disabled = true;
                text.textContent = 'Sending...';
                spinner.classList.remove('hidden');

                try {
                    // Simulate API call
                    await new Promise(resolve => setTimeout(resolve, 2000));

                    const email = document.getElementById('email').value;
                    document.getElementById('emailDisplay').textContent = email;

                    this.goToStep(2);
                    this.startTimer();
                } catch (error) {
                    alert('Failed to send verification code. Please try again.');
                } finally {
                    btn.disabled = false;
                    text.textContent = 'Send Verification Code';
                    spinner.classList.add('hidden');
                }
            }

            async handleVerificationSubmit(e) {
                e.preventDefault();

                const code = this.getVerificationCode();
                if (code.length !== 6) {
                    this.showCodeError('Please enter the complete 6-digit code');
                    return;
                }

                const btn = document.getElementById('verifyCodeBtn');
                const text = document.getElementById('verifyCodeText');
                const spinner = document.getElementById('verifyCodeSpinner');

                btn.disabled = true;
                text.textContent = 'Verifying...';
                spinner.classList.remove('hidden');

                try {
                    // Simulate API call
                    await new Promise(resolve => setTimeout(resolve, 1500));

                    // Simulate verification (accept 123456 as valid code)
                    if (code === '123456') {
                        this.showCodeSuccess('Code verified successfully!');
                        setTimeout(() => this.goToStep(3), 1000);
                    } else {
                        this.showCodeError('Invalid verification code. Try 123456 for demo.');
                    }
                } catch (error) {
                    this.showCodeError('Verification failed. Please try again.');
                } finally {
                    btn.disabled = false;
                    text.textContent = 'Verify Code';
                    spinner.classList.add('hidden');
                }
            }

            async handlePasswordSubmit(e) {
                e.preventDefault();

                const isPasswordValid = this.validatePassword();
                const isMatchValid = this.validatePasswordMatch();

                if (!isPasswordValid || !isMatchValid) {
                    return;
                }

                const btn = document.getElementById('resetPasswordBtn');
                const text = document.getElementById('resetPasswordText');
                const spinner = document.getElementById('resetPasswordSpinner');

                btn.disabled = true;
                text.textContent = 'Resetting...';
                spinner.classList.remove('hidden');

                try {
                    // Simulate API call
                    await new Promise(resolve => setTimeout(resolve, 2000));

                    this.goToStep(4);
                } catch (error) {
                    alert('Failed to reset password. Please try again.');
                } finally {
                    btn.disabled = false;
                    text.textContent = 'Reset Password';
                    spinner.classList.add('hidden');
                }
            }

            getVerificationCode() {
                let code = '';
                for (let i = 1; i <= 6; i++) {
                    code += document.getElementById(`code${i}`).value;
                }
                return code;
            }

            showCodeError(message) {
                const errorMsg = document.getElementById('codeError');
                const successMsg = document.getElementById('codeSuccess');

                errorMsg.textContent = message;
                errorMsg.classList.remove('hidden');
                successMsg.classList.add('hidden');
            }

            showCodeSuccess(message) {
                const errorMsg = document.getElementById('codeError');
                const successMsg = document.getElementById('codeSuccess');

                successMsg.textContent = message;
                successMsg.classList.remove('hidden');
                errorMsg.classList.add('hidden');
            }

            showError(field, errorElement, message) {
                field.classList.add('error');
                field.classList.remove('success');
                errorElement.textContent = message;
                errorElement.classList.remove('hidden');
            }

            showSuccess(field, successElement, message) {
                field.classList.add('success');
                field.classList.remove('error');
                successElement.textContent = message;
                successElement.classList.remove('hidden');
            }

            resetValidation(field, errorElement, successElement) {
                field.classList.remove('error', 'success');
                errorElement.classList.add('hidden');
                successElement.classList.add('hidden');
            }

            goToStep(step) {
                // Hide current step
                document.getElementById(`step${this.currentStep}`).classList.remove('active');

                // Show new step
                document.getElementById(`step${step}`).classList.add('active');

                this.currentStep = step;
                this.updateProgress();
            }

            updateProgress() {
                const progress = (this.currentStep / this.totalSteps) * 100;
                document.getElementById('progressFill').style.width = `${progress}%`;
            }

            startTimer() {
                this.timeLeft = 60;
                const timerElement = document.getElementById('timer');
                const resendBtn = document.getElementById('resendBtn');

                resendBtn.disabled = true;

                this.timer = setInterval(() => {
                    this.timeLeft--;
                    timerElement.textContent = this.timeLeft;

                    if (this.timeLeft <= 0) {
                        clearInterval(this.timer);
                        resendBtn.disabled = false;
                        resendBtn.innerHTML = 'Resend Code';
                    }
                }, 1000);
            }

            async resendCode() {
                const resendBtn = document.getElementById('resendBtn');
                resendBtn.disabled = true;
                resendBtn.textContent = 'Sending...';

                try {
                    // Simulate API call
                    await new Promise(resolve => setTimeout(resolve, 1000));

                    alert('Verification code sent successfully!');
                    this.startTimer();
                } catch (error) {
                    alert('Failed to resend code. Please try again.');
                    resendBtn.disabled = false;
                    resendBtn.textContent = 'Resend Code';
                }
            }
        }

        // Global function for step navigation
        function goToStep(step) {
            passwordResetManager.goToStep(step);
        }

        // Initialize password reset manager
        let passwordResetManager;
        document.addEventListener('DOMContentLoaded', () => {
            passwordResetManager = new PasswordResetManager();
        });
    </script>
</body>

</html>