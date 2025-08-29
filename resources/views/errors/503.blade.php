<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - NIOTIM</title>
    
    <!-- Required Libraries -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
        }
        
        .error-gradient {
            background: linear-gradient(135deg, rgba(10,145,76,0.9) 0%, rgba(210,217,37,0.85) 100%);
        }
        
        .floating-shape {
            position: absolute;
            z-index: 0;
            opacity: 0.1;
            border-radius: 50%;
            background: linear-gradient(135deg, #0a914c 0%, #d2d925 100%);
        }
        
        .btn-primary {
            background-color: #0a914c;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(10, 145, 76, 0.2);
        }
        
        .btn-primary:hover {
            background-color: #087d42;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(10, 145, 76, 0.3);
        }
    </style>
</head>
<body class="bg-white text-dark-500">
    <!-- Error Content Section -->
    <section class="error-gradient min-h-screen flex items-center justify-center text-white relative overflow-hidden py-16">
        <!-- Floating shapes -->
        <div class="floating-shape w-64 h-64 -top-32 -left-32"></div>
        <div class="floating-shape w-40 h-40 top-1/4 right-20"></div>
        <div class="floating-shape w-32 h-32 bottom-20 left-1/4"></div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="max-w-2xl mx-auto">
                <!-- Error Icon/Image -->
                <div class="mb-8">
                    <i class="fas fa-exclamation-circle text-8xl mb-4"></i>
                </div>
                
                <!-- Error Code -->
                <h1 class="text-6xl md:text-8xl font-bold mb-6" x-data="{ count: 0, target: 404 }" x-init="() => { 
                    let start = 0; 
                    const duration = 2000; 
                    const step = timestamp => { 
                        if (!start) start = timestamp; 
                        const progress = Math.min((timestamp - start) / duration, 1); 
                        count = Math.floor(progress * target); 
                        if (progress < 1) requestAnimationFrame(step); 
                    }; 
                    requestAnimationFrame(step); 
                }" x-text="count">404</h1>
                
                <!-- Error Message -->
                <h2 class="text-2xl md:text-3xl font-semibold mb-6">Page Not Found</h2>
                
                <p class="text-xl mb-10">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                
                <div class="w-24 h-1 bg-secondary-500 mx-auto my-8"></div>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6 mt-8">
                    <a href="/" class="btn-primary px-8 py-4 rounded-full font-semibold text-lg flex items-center justify-center mx-auto sm:mx-0">
                        <i class="fas fa-home mr-2"></i>
                        <span>Go to Homepage</span>
                    </a>
                    <a href="javascript:history.back()" class="bg-white text-primary-500 px-8 py-4 rounded-full font-semibold text-lg flex items-center justify-center mx-auto sm:mx-0 hover:bg-gray-100 transition">
                        <i class="fas fa-arrow-left mr-2"></i>
                        <span>Go Back</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary-900 text-white pt-8 pb-6">
        <div class="container mx-auto px-4 text-center">
            <div class="flex justify-center mb-4">
                <div class="w-12 h-12 rounded-full bg-primary-500 flex items-center justify-center text-white font-bold text-xl mr-3 shadow-md">N</div>
                <span class="text-xl font-bold text-white">NIOTIM</span>
            </div>
            <p class="mb-4">Nigeria Institute of Office Technology and Information Management</p>
            <p>&copy; {{ date('Y') }} NIOTIM. All rights reserved.</p>
        </div>
    </footer>

    <!-- Script for dynamic error code display -->
    <script>
        document.addEventListener('alpine:init', () => {
            // Get the error code from the URL or default to 404
            const urlParams = new URLSearchParams(window.location.search);
            const errorCode = urlParams.get('code') || '503';
            const errorMessages = {
                '404': 'Page Not Found',
                '419': 'Page Expired',
                '500': 'Internal Server Error',
                '503': 'Service Unavailable'
            };
            const errorDescriptions = {
                '404': 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.',
                '419': 'Your session has expired. Please refresh and try again.',
                '500': 'The server encountered an internal error and was unable to complete your request.',
                '503': 'The service is temporarily unavailable. Please try again later.'
            };
            
            // Update the page content based on the error code
            if (errorMessages[errorCode]) {
                document.querySelector('h1').setAttribute('x-data', `{ count: 0, target: ${errorCode} }`);
                document.querySelector('h2').textContent = errorMessages[errorCode];
                document.querySelector('p').textContent = errorDescriptions[errorCode];
                document.title = `Error ${errorCode} - NIOTIM`;
            }
        });
    </script>
</body>
</html>