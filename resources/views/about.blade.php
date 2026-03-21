<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIOTIM - About Us | Nigerian Institute of Office Technology & Information Management</title>
    
    <!-- Required Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/react@18.0.0/umd/react.development.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/react-dom@18.0.0/umd/react-dom.development.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@babel/standalone/babel.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out forwards',
                        'slide-up': 'slideUp 0.8s ease-out forwards',
                        'slide-in-left': 'slideInLeft 0.8s ease-out forwards',
                        'slide-in-right': 'slideInRight 0.8s ease-out forwards',
                        'pulse-slow': 'pulse 3s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideInLeft: {
                            '0%': { opacity: '0', transform: 'translateX(-50px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        },
                        slideInRight: {
                            '0%': { opacity: '0', transform: 'translateX(50px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' },
                        }
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
        
        .hero-gradient {
            background: linear-gradient(135deg, rgba(10,145,76,0.9) 0%, rgba(210,217,37,0.85) 100%), url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        
        .section-padding {
            padding: 5rem 0;
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
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
        
        .btn-secondary {
            background-color: transparent;
            border: 2px solid #0a914c;
            color: #0a914c;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background-color: #0a914c;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(10, 145, 76, 0.3);
        }
        
        .nav-scroll {
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }
        
        .floating-shape {
            position: absolute;
            z-index: 0;
            opacity: 0.1;
            border-radius: 50%;
            background: linear-gradient(135deg, #0a914c 0%, #d2d925 100%);
        }
        
        .form-input {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #0a914c;
            box-shadow: 0 0 0 3px rgba(10, 145, 76, 0.2);
        }
        
        /* Animation classes */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        
        .fade-in {
            opacity: 1;
            transform: translateY(0);
        }
        
        .slide-up {
            opacity: 0;
            transform: translateY(40px);
            animation: slideUp 0.8s ease forwards;
        }
        
        .slide-in-left {
            opacity: 0;
            transform: translateX(-40px);
            animation: slideInLeft 0.8s ease forwards;
        }
        
        .slide-in-right {
            opacity: 0;
            transform: translateX(40px);
            animation: slideInRight 0.8s ease forwards;
        }

        @keyframes slideUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        /* Mobile menu styles */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease-out;
        }
        
        .mobile-menu.open {
            transform: translateX(0);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-gradient {
                background-attachment: scroll;
            }
            
            .section-padding {
                padding: 3rem 0;
            }
        }
        
        .object-list-item {
            transition: all 0.2s ease;
        }
        .object-list-item:hover {
            transform: translateX(5px);
            color: #0a914c;
        }
        .value-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px -12px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body class="bg-white text-dark-500">
    <!-- Header Navigation (Static version from template design) -->
    <header id="navbar" class="fixed w-full bg-white z-50 transition-all duration-300 py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <!-- Logo / Brand -->
            <a href="{{route('home')}}" class="flex items-center space-x-2">
               <img src="{{asset('images/niotim-logo.jpeg')}}" alt="NIOTIM Logo" class="w-10 h-10 rounded-full object-cover">
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex space-x-8">
                <a href="{{route('home')}}" class="text-dark-600 hover:text-primary-500 transition font-medium">Home</a>
                <a href="{{route('about')}}" class="text-primary-500 font-semibold border-b-2 border-primary-500 pb-1">About</a>
                <a href="{{route('membership')}}" class="text-dark-600 hover:text-primary-500 transition font-medium">Membership</a>
                <a href="{{route('communique')}}" class="text-dark-600 hover:text-primary-500 transition font-medium">Communiqué</a>

                <a href="{{route('news.index')}}" class="text-dark-600 hover:text-primary-500 transition font-medium">News</a>
                <a href="{{route('home')}}#contact" class="text-dark-600 hover:text-primary-500 transition font-medium">Contact</a>
            </nav>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="lg:hidden text-dark-600 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        
        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu" class="mobile-menu fixed top-0 right-0 w-64 h-full bg-white shadow-2xl z-50 p-6">
            <div class="flex justify-between items-center mb-8">
                <span class="font-montserrat font-bold text-xl text-primary-600">NIOTIM</span>
                <button id="close-menu" class="text-dark-500 text-2xl">&times;</button>
            </div>
            <nav class="flex flex-col space-y-5">
                <a href="{{route('home')}}" class="text-dark-700 hover:text-primary-500 transition font-medium py-2">Home</a>
                <a href="{{route('about')}}" class="text-primary-500 font-semibold border-l-4 border-primary-500 pl-2">About</a>
                <a href="{{route('membership')}}" class="text-dark-700 hover:text-primary-500 transition font-medium py-2">Membership</a>
                <a href="{{route('communique')}}" class="text-dark-700 hover:text-primary-500 transition font-medium py-2">Communiqué</a>

                <a href="{{route('news.index')}}" class="text-dark-700 hover:text-primary-500 transition font-medium py-2">News</a>
                <a href="{{route('home')}}#contact" class="text-dark-700 hover:text-primary-500 transition font-medium py-2">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Page Header Section (About Hero) -->
    <section class="hero-gradient text-white pt-32 pb-16 relative overflow-hidden">
        <!-- Floating shapes -->
        <div class="floating-shape w-64 h-64 -top-32 -left-32"></div>
        <div class="floating-shape w-40 h-40 top-1/4 right-20"></div>
        <div class="floating-shape w-32 h-32 bottom-20 left-1/4"></div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 slide-up">About NIOTIM</h1>
            <p class="text-xl md:text-2xl mb-2 slide-up" style="animation-delay: 0.2s;">Pioneering Excellence in Office Technology & Information Management</p>
            <div class="w-24 h-1 bg-secondary-500 mx-auto my-8 slide-up" style="animation-delay: 0.6s;"></div>
        </div>
    </section>

    <!-- Introduction & Objects Section -->
    <section class="section-padding bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-16 animate-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-dark-800 mb-6">Who We Are</h2>
                <div class="w-20 h-1 bg-primary-500 mx-auto mb-6"></div>
                <p class="text-lg text-dark-600 leading-relaxed">
                    Nigerian Institute of Office Technology and Information Management (NIOTIM) is a registered body of academia and professionals in the field of office technology and information management in the universities and polytechnics across all geopolitical zones of Nigeria. 
                    <strong class="text-primary-600">Incorporated under the Companies and Allied Matters Acts of 2020 on 27th February, 2025 with Registration Number 8301138.</strong>
                </p>
            </div>
            
            <!-- Objects of the Institute -->
            <div class="animate-on-scroll">
                <h3 class="text-2xl font-bold text-dark-800 mb-8 text-center">Our Core Objectives</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start space-x-3 p-4 bg-primary-50 rounded-xl object-list-item">
                        <i class="fas fa-users text-primary-500 text-xl mt-1"></i>
                        <p class="text-dark-700">To bring together all Office Technology and Management/Office Information Management professionals in Nigeria.</p>
                    </div>
                    <div class="flex items-start space-x-3 p-4 bg-primary-50 rounded-xl object-list-item">
                        <i class="fas fa-network-wired text-primary-500 text-xl mt-1"></i>
                        <p class="text-dark-700">To create, foster relationship and assist subsidiary chapters composed of persons of acceptable professional standing in the States of the Federation.</p>
                    </div>
                    <div class="flex items-start space-x-3 p-4 bg-primary-50 rounded-xl object-list-item">
                        <i class="fas fa-handshake text-primary-500 text-xl mt-1"></i>
                        <p class="text-dark-700">To cooperate with governments through their Agencies, the Private Sector and examining bodies for the improvement of Office Technology and Information Management professionals in Nigeria.</p>
                    </div>
                    <div class="flex items-start space-x-3 p-4 bg-primary-50 rounded-xl object-list-item">
                        <i class="fas fa-building text-primary-500 text-xl mt-1"></i>
                        <p class="text-dark-700">To serve as a unifying body between institutions and business community, and to promote Office professionals through curriculum development within educational organizations.</p>
                    </div>
                    <div class="flex items-start space-x-3 p-4 bg-primary-50 rounded-xl object-list-item">
                        <i class="fas fa-chalkboard-user text-primary-500 text-xl mt-1"></i>
                        <p class="text-dark-700">To organise conferences, symposia, seminars and workshops in Office Technology and Information Management for professionals and business community.</p>
                    </div>
                    <div class="flex items-start space-x-3 p-4 bg-primary-50 rounded-xl object-list-item">
                        <i class="fas fa-chart-line text-primary-500 text-xl mt-1"></i>
                        <p class="text-dark-700">To promote the professional growth of office technology and information management.</p>
                    </div>
                    <div class="flex items-start space-x-3 p-4 bg-primary-50 rounded-xl object-list-item md:col-span-2">
                        <i class="fas fa-book-open text-primary-500 text-xl mt-1"></i>
                        <p class="text-dark-700">To publish professional journals, books and/or newsletters for the purpose of disseminating information relevant to the improvement, refinement and updating of knowledge of its members.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="section-padding bg-primary-50 relative">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Vision Card -->
                <div class="bg-white p-8 rounded-2xl shadow-lg animate-on-scroll card-hover">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-eye text-primary-500 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-dark-800 mb-4">Our Vision</h3>
                    <p class="text-dark-600 leading-relaxed text-lg">NIOTIM is envisioned to be a leading professional institute dedicated to advancing knowledge and skills for sustainable national growth and adherence to global best practices.</p>
                </div>
                <!-- Mission Card -->
                <div class="bg-white p-8 rounded-2xl shadow-lg animate-on-scroll card-hover">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-bullseye text-primary-500 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-dark-800 mb-4">Our Mission</h3>
                    <p class="text-dark-600 leading-relaxed text-lg">To build a community of skilled and innovative Office Technology and Information Management professionals by offering continuous opportunities for growth, innovative development, and excellence.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="section-padding bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 animate-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-dark-800 mb-4">Our Core Values</h2>
                <div class="w-20 h-1 bg-primary-500 mx-auto mb-6"></div>
                <p class="text-dark-600 max-w-2xl mx-auto">The principles that guide our actions and define our community</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                <!-- Value 1: Integrity -->
                <div class="text-center p-6 rounded-xl bg-primary-50 value-card animate-on-scroll">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm">
                        <i class="fas fa-shield-alt text-primary-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark-800 mb-2">Integrity</h3>
                    <p class="text-dark-600 text-sm">Upholding honesty, transparency, and accountability in all endeavors.</p>
                </div>
                <!-- Value 2: Innovation -->
                <div class="text-center p-6 rounded-xl bg-primary-50 value-card animate-on-scroll">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm">
                        <i class="fas fa-lightbulb text-primary-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark-800 mb-2">Innovation</h3>
                    <p class="text-dark-600 text-sm">Encouraging creativity, research, and adoption of emerging technologies.</p>
                </div>
                <!-- Value 3: Excellence -->
                <div class="text-center p-6 rounded-xl bg-primary-50 value-card animate-on-scroll">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm">
                        <i class="fas fa-trophy text-primary-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark-800 mb-2">Excellence</h3>
                    <p class="text-dark-600 text-sm">Pursuing continuous improvement and outstanding performance.</p>
                </div>
                <!-- Value 4: Professionalism -->
                <div class="text-center p-6 rounded-xl bg-primary-50 value-card animate-on-scroll">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm">
                        <i class="fas fa-briefcase text-primary-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark-800 mb-2">Professionalism</h3>
                    <p class="text-dark-600 text-sm">High standards of competence, ethical conduct, and professional behavior.</p>
                </div>
                <!-- Value 5: Life-long Learning -->
                <div class="text-center p-6 rounded-xl bg-primary-50 value-card animate-on-scroll">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm">
                        <i class="fas fa-graduation-cap text-primary-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-dark-800 mb-2">Life-long Learning</h3>
                    <p class="text-dark-600 text-sm">Promoting continuous professional development and acquisition of new knowledge.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Membership Section -->
    <section class="section-padding bg-gradient-to-br from-primary-50 to-white relative overflow-hidden">
        <div class="floating-shape w-96 h-96 -bottom-48 -left-48 opacity-20"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-12 animate-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-dark-800 mb-4">Membership</h2>
                <div class="w-20 h-1 bg-primary-500 mx-auto mb-6"></div>
                <p class="text-dark-600 max-w-2xl mx-auto">Join a thriving community of passionate academics and professionals driving excellence in office technology and information management across Nigeria.</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <!-- Membership Categories -->
                <div class="bg-white p-8 rounded-2xl shadow-lg animate-on-scroll">
                    <h3 class="text-2xl font-bold text-dark-800 mb-6 flex items-center"><i class="fas fa-id-card text-primary-500 mr-3"></i> Membership Categories</h3>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="border-l-4 border-primary-500 pl-4 py-2"><span class="font-bold text-dark-800">Student Member</span></div>
                        <div class="border-l-4 border-primary-500 pl-4 py-2"><span class="font-bold text-dark-800">Associate Member</span></div>
                        <div class="border-l-4 border-primary-500 pl-4 py-2"><span class="font-bold text-dark-800">Member</span></div>
                        <div class="border-l-4 border-primary-500 pl-4 py-2"><span class="font-bold text-dark-800">Fellow</span></div>
                        <div class="border-l-4 border-primary-500 pl-4 py-2 col-span-2"><span class="font-bold text-dark-800">Honorary Fellow</span></div>
                    </div>
                    <p class="text-dark-600 mb-4">Our membership spans the six geo-political zones in Nigeria, comprising mostly holders of Doctor of Philosophy degrees, passionate academics with wealth of professional and teaching experiences.</p>
                    <a href="#" class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-800 transition"><span>Learn more about membership</span> <i class="fas fa-arrow-right ml-2"></i></a>
                </div>
                
                <!-- Member Benefits -->
                <div class="bg-white p-8 rounded-2xl shadow-lg animate-on-scroll">
                    <h3 class="text-2xl font-bold text-dark-800 mb-6 flex items-center"><i class="fas fa-gem text-primary-500 mr-3"></i> Member Benefits</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start"><i class="fas fa-check-circle text-primary-500 mt-1 mr-3"></i> <span>Professional recognition and credibility within the industry</span></li>
                        <li class="flex items-start"><i class="fas fa-check-circle text-primary-500 mt-1 mr-3"></i> <span>Networking with renowned academia and experts in office technology & information management</span></li>
                        <li class="flex items-start"><i class="fas fa-check-circle text-primary-500 mt-1 mr-3"></i> <span>Career growth opportunities and exclusive job postings</span></li>
                        <li class="flex items-start"><i class="fas fa-check-circle text-primary-500 mt-1 mr-3"></i> <span>Use of professional post-nominal designations (MNIM, FNIM, etc.)</span></li>
                        <li class="flex items-start"><i class="fas fa-check-circle text-primary-500 mt-1 mr-3"></i> <span>Access to conferences, workshops, and continuous development programs</span></li>
                        <li class="flex items-start"><i class="fas fa-check-circle text-primary-500 mt-1 mr-3"></i> <span>Subscription to professional journals and research publications</span></li>
                    </ul>
                    <div class="mt-8">
                        <a href="#" class="btn-primary inline-block px-6 py-3 rounded-lg text-white font-semibold">Become a Member Today</a>
                    </div>
                </div>
            </div>
            
            <!-- Additional Fact: Spread & Growth -->
            <div class="mt-12 text-center animate-on-scroll">
                <div class="inline-block bg-white rounded-full px-6 py-3 shadow-md">
                    <p class="text-dark-700"><i class="fas fa-map-marker-alt text-primary-500 mr-2"></i> Active across all 6 geopolitical zones &nbsp;|&nbsp; <i class="fas fa-user-graduate text-primary-500 mr-2"></i> 500+ Doctoral Fellows & Members &nbsp;|&nbsp; <i class="fas fa-chart-line text-primary-500 mr-2"></i> Rapidly growing community</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section (Kept from template) -->
    <section class="py-16 bg-primary-50 relative overflow-hidden">
        <div class="floating-shape w-64 h-64 -bottom-32 -right-32 opacity-20"></div>
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="md:flex items-center">
                    <div class="md:w-2/5 p-10 bg-primary-500 text-white">
                        <h2 class="text-2xl font-bold mb-4">Stay Updated</h2>
                        <p>Subscribe to our newsletter to receive the latest news and updates directly in your inbox.</p>
                    </div>
                    <div class="md:w-3/5 p-10">
                        <form id="newsletterForm" class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                            <input type="email" id="newsEmail" placeholder="Your email address" class="form-input flex-grow" required>
                            <button type="submit" class="btn-primary px-6 py-3 rounded-lg font-semibold whitespace-nowrap">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-gradient text-white pt-16 pb-8" style="background: linear-gradient(to right, #044223 0%, #087d42 100%);">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div>
                    <h3 class="text-xl font-semibold mb-6">About NIOTIM</h3>
                    <p class="mb-6">A registered body of academia and professionals in Office Technology and Information Management dedicated to advancing knowledge and practice in the field.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-white hover:text-accent-500 transition"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white hover:text-accent-500 transition"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white hover:text-accent-500 transition"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-white hover:text-accent-500 transition"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-6">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="hover:text-accent-500 transition">Home</a></li>
                        <li><a href="#" class="hover:text-accent-500 transition">About Us</a></li>
                        <li><a href="#" class="hover:text-accent-500 transition">Membership</a></li>
                        <li><a href="#" class="hover:text-accent-500 transition">Application</a></li>
                        <li><a href="#" class="hover:text-accent-500 transition">News & Events</a></li>
                        <li><a href="#" class="hover:text-accent-500 transition">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-6">Membership</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="hover:text-accent-500 transition">Benefits</a></li>
                        <li><a href="#" class="hover:text-accent-500 transition">Eligibility</a></li>
                        <li><a href="#" class="hover:text-accent-500 transition">Application Process</a></li>
                        <li><a href="#" class="hover:text-accent-500 transition">Fees</a></li>
                        <li><a href="#" class="hover:text-accent-500 transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-6">Contact Info</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start"><i class="fas fa-map-marker-alt mt-1 mr-3 text-accent-500"></i><span>Lagos State University, Ikeja Campus, Lagos, Nigeria</span></li>
                        <li class="flex items-center"><i class="fas fa-phone mr-3 text-accent-500"></i><span>+234 7035559223</span></li>
                        <li class="flex items-center"><i class="fas fa-envelope mr-3 text-accent-500"></i><span>nioitim@nigeria.org</span></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-white/20 pt-8 text-center">
                <p>&copy; 2025 NIOTIM. All rights reserved. Website by <a href="#" class="hover:text-accent-500">Paramount Computer</a></p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-8 right-8 w-12 h-12 rounded-full bg-primary-500 text-white shadow-lg flex items-center justify-center transition-opacity duration-300 opacity-0">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Scroll Animation Observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('fade-in');
                    }, 100);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15, rootMargin: '-50px 0px' });
        document.querySelectorAll('.animate-on-scroll').forEach(el => observer.observe(el));

        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const closeMenuButton = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuButton && closeMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.add('open');
                document.body.style.overflow = 'hidden';
            });
            closeMenuButton.addEventListener('click', () => {
                mobileMenu.classList.remove('open');
                document.body.style.overflow = 'auto';
            });
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.remove('open');
                    document.body.style.overflow = 'auto';
                });
            });
        }

        // Navbar background on scroll
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('nav-scroll', 'py-2');
            } else {
                navbar.classList.remove('nav-scroll', 'py-2');
            }
        });

        // Back to top button
        const backToTopButton = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTopButton.classList.remove('opacity-0');
                backToTopButton.classList.add('opacity-100');
            } else {
                backToTopButton.classList.remove('opacity-100');
                backToTopButton.classList.add('opacity-0');
            }
        });
        backToTopButton.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Newsletter simple alert (demo)
        const newsletterForm = document.getElementById('newsletterForm');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const email = document.getElementById('newsEmail').value;
                if (email) alert(`Thank you for subscribing! Updates will be sent to ${email}`);
                else alert('Please enter a valid email address');
                newsletterForm.reset();
            });
        }
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                if (targetId !== "#" && targetId !== "#0") {
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        e.preventDefault();
                        targetElement.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            });
        });
    </script>
</body>
</html>