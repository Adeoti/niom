<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - NIOTIM</title>
    
    <!-- Required Libraries -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9f4',
                            100: '#dbf0e3',
                            500: '#0a914c',
                            600: '#087d42',
                            700: '#066937',
                            800: '#05552d',
                            900: '#044223',
                        },
                        secondary: {
                            50: '#fbfce9',
                            100: '#f5f8c9',
                            500: '#d2d925',
                            600: '#bcc321',
                            700: '#a6ad1d',
                            800: '#909719',
                            900: '#7a8115',
                        },
                        accent: {
                            50: '#fefef8',
                            100: '#fdfcec',
                            500: '#f3f4c8',
                            600: '#dbdcb4',
                            700: '#c3c4a0',
                        },
                        dark: {
                            50: '#f5f5f5',
                            100: '#e9e9e9',
                            500: '#333333',
                            600: '#2e2e2e',
                            700: '#292929',
                            800: '#242424',
                            900: '#1f1f1f',
                        }
                    },
                    fontFamily: {
                        montserrat: ['Montserrat', 'sans-serif'],
                        poppins: ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
            background-color: #f5f7fa;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
        }
        
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .auth-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            width: 100%;
            max-width: 420px;
        }
        
        .auth-header {
            background: linear-gradient(to right, #044223 0%, #087d42 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .auth-body {
            padding: 30px;
        }
        
        .form-input {
            width: 100%;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px 16px;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #0a914c;
            box-shadow: 0 0 0 3px rgba(10, 145, 76, 0.2);
        }
        
        .btn-primary {
            background-color: #0a914c;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 14px 20px;
            font-weight: 600;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(10, 145, 76, 0.2);
        }
        
        .btn-primary:hover {
            background-color: #087d42;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(10, 145, 76, 0.3);
        }
        
        .auth-footer {
            text-align: center;
            padding: 20px 30px 30px;
            border-top: 1px solid #f1f1f1;
        }
        
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #718096;
            font-size: 14px;
            margin: 20px 0;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .divider::before {
            margin-right: 10px;
        }
        
        .divider::after {
            margin-left: 10px;
        }
        
        .social-login {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }
        
        .social-btn {
            flex: 1;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .social-btn:hover {
            background-color: #f7fafc;
            transform: translateY(-2px);
        }
        
        .toggle-form {
            color: #0a914c;
            text-decoration: none;
            font-weight: 600;
        }
        
        .toggle-form:hover {
            text-decoration: underline;
        }
        
        .password-toggle {
            position: relative;
        }
        
        .password-toggle .form-input {
            padding-right: 45px;
        }
        
        .toggle-icon {
            position: absolute;
            right: 15px;
            top: 12px;
            color: #a0aec0;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Register Page -->
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="w-16 h-16 rounded-full bg-white text-primary-500 flex items-center justify-center text-2xl font-bold mx-auto mb-4">N</div>
                <h1 class="text-2xl font-bold">Create Account</h1>
                <p class="text-accent-300">Join the NIOTIM community</p>
            </div>
            
            <div class="auth-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-4 mb-5">
                        <div>
                            <label for="firstName" class="block text-dark-700 font-medium mb-2">First Name</label>
                            <input type="text" id="firstName" name="first_name" class="form-input" placeholder="First name" required>
                        </div>
                        <div>
                            <label for="lastName" class="block text-dark-700 font-medium mb-2">Last Name</label>
                            <input type="text" id="lastName" name="last_name" class="form-input" placeholder="Last name" required>
                        </div>
                    </div>
                    
                    <div class="mb-5">
                        <label for="email" class="block text-dark-700 font-medium mb-2">Email Address</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email" required>
                    </div>
                    
                    <div class="mb-5 password-toggle">
                        <label for="password" class="block text-dark-700 font-medium mb-2">Password</label>
                        <input type="password" id="password" name="password" class="form-input" placeholder="Create a password" required>
                        <span class="toggle-icon">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    
                    <div class="mb-5 password-toggle">
                        <label for="password_confirmation" class="block text-dark-700 font-medium mb-2">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Confirm your password" required>
                        <span class="toggle-icon">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    
                    <div class="mb-5">
                        <div class="flex items-center">
                            <input type="checkbox" id="terms" name="terms" class="h-4 w-4 text-primary-500 focus:ring-primary-400 border-gray-300 rounded" required>
                            <label for="terms" class="ml-2 block text-sm text-dark-600">I agree to the <a href="#" class="text-primary-500 hover:underline">Terms of Service</a> and <a href="#" class="text-primary-500 hover:underline">Privacy Policy</a></label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-primary">Create Account</button>
                </form>
                
                <div class="divider">Or sign up with</div>
                
                <div class="social-login">
                    <button type="button" class="social-btn">
                        <i class="fab fa-google text-red-500"></i>
                    </button>
                    <button type="button" class="social-btn">
                        <i class="fab fa-facebook-f text-blue-600"></i>
                    </button>
                    <button type="button" class="social-btn">
                        <i class="fab fa-linkedin-in text-blue-500"></i>
                    </button>
                </div>
            </div>
            
            <div class="auth-footer">
                <p class="text-dark-600">Already have an account? <a href="{{ route('login') }}" class="toggle-form">Sign in</a></p>
            </div>
        </div>
    </div>
</body>
</html>