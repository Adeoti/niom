{{
    dd($latestEvent);
    // log the latest event to the laravel log
    \Log::info('Latest Event:', $latestEvent->toArray());
}}<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIOTIM - Nigeria Institute of Office Technology and Information Management</title>
    
    <!-- Required Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/react@18.0.0/umd/react.development.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/react-dom@18.0.0/umd/react-dom.development.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@babel/standalone/babel.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></link>
    <link rel="icon" type="image/png" href="{{ asset('images/niotim-logo.jpeg') }}" />
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
            background: linear-gradient(135deg, rgba(10,145,76,0.9) 0%, rgba(210,217,37,0.85) 100%), url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80');
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
        
        .counter-box {
            background: linear-gradient(135deg, #0a914c 0%, #d2d925 100%);
            border-radius: 12px;
            padding: 2rem;
            color: white;
            text-align: center;
            box-shadow: 0 10px 30px rgba(10, 145, 76, 0.2);
        }
        
        .floating-shape {
            position: absolute;
            z-index: 0;
            opacity: 0.1;
            border-radius: 50%;
            background: linear-gradient(135deg, #0a914c 0%, #d2d925 100%);
        }
        
        .testimonial-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            position: relative;
        }
        
        .testimonial-card::before {
            content: """;
            position: absolute;
            top: 10px;
            left: 20px;
            font-size: 5rem;
            color: #0a914c;
            opacity: 0.2;
            font-family: Arial;
        }
        
        .footer-gradient {
            background: linear-gradient(to right, #044223 0%, #087d42 100%);
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

         .form-input {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #0a914c;
            box-shadow: 0 0 0 3px rgba(10, 145, 76, 0.2);
        }
        
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: none;
        }
        
        .alert-success {
            background-color: #f0f9f4;
            color: #0a914c;
            border: 1px solid #dbf0e3;
        }
        
        .alert-error {
            background-color: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }
        
        .form-error {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
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
    </style>
</head>
<body class="bg-white text-dark-500">
    <!-- Header Navigation -->
    <header class="fixed w-full z-50 transition-all duration-300" id="navbar">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <div class="w-12 h-12 rounded-full bg-primary-500 flex items-center justify-center text-white font-bold text-xl mr-3 shadow-md">
                    <img src="{{ asset('images/niotim-logo.jpeg') }}" alt="">
                </div>
                {{-- <span class="text-xl font-bold text-primary-500">NIOTIM</span> --}}
            </div>
            
            <!-- Desktop Navigation -->
            <nav class="hidden md:block">
                <ul class="flex space-x-8">
                    <li><a href="#home" class="text-dark-500 hover:text-primary-500 transition font-medium">Home</a></li>
                    <li><a href="#about" class="text-dark-500 hover:text-primary-500 transition font-medium">About</a></li>
                    <li><a href="#membership" class="text-dark-500 hover:text-primary-500 transition font-medium">Membership</a></li>
                    
                    <li><a href="#news" class="text-dark-500 hover:text-primary-500 transition font-medium">News</a></li>
                    <li><a href="#contact" class="text-dark-500 hover:text-primary-500 transition font-medium">Contact</a></li>
                    @guest
                        <li><a href="{{route('membership.create')}}" class="text-dark-500 hover:text-primary-500 transition font-medium">Application</a></li>
                        <li><a href="{{route('login')}}" class="text-dark-500 hover:text-primary-500 transition font-medium">Login</a></li>
                    @endguest
                    @auth
                        <li><a href="{{route('dashboard')}}" class="text-dark-500 hover:text-primary-500 transition font-medium">Dashboard</a></li>
                        <li><a href="{{route('logout')}}" class="text-dark-500 hover:text-primary-500 transition font-medium">Logout</a></li>
                    @endauth
                </ul>
            </nav>
            
            <!-- Mobile menu button -->
            <button class="md:hidden text-dark-500 text-xl" id="mobile-menu-button">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <!-- Mobile Navigation -->
        <div class="mobile-menu fixed top-0 right-0 h-full w-64 bg-white shadow-2xl z-50 p-6" id="mobile-menu">
            <button class="absolute top-4 right-4 text-dark-500 text-xl" id="close-menu">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="mt-12">
                <ul class="space-y-6">
                    <li><a href="#home" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">Home</a></li>
                    <li><a href="#about" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">About</a></li>
                    <li><a href="#membership" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">Membership</a></li>
                    <li><a href="{{route('membership.create')}}" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">Application</a></li>
                    <li><a href="#news" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">News</a></li>
                    <li><a href="#contact" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">Contact</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero-gradient text-white pt-32 pb-24 relative overflow-hidden">
        <!-- Floating shapes -->
        <div class="floating-shape w-64 h-64 -top-32 -left-32"></div>
        <div class="floating-shape w-40 h-40 top-1/4 right-20"></div>
        <div class="floating-shape w-32 h-32 bottom-20 left-1/4"></div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 slide-up">
                Nigeria Institute Of Office Technology And Information Management 
            </h1>
            <p class="text-xl md:text-2xl mb-2 slide-up" style="animation-delay: 0.2s;">Office Technology and Information Management</p>
            <p class="text-lg md:text-xl mb-2 slide-up" style="animation-delay: 0.4s;">for Sustainable Development in Digital Economy</p>
            <div class="w-24 h-1 bg-secondary-500 mx-auto my-8 slide-up" style="animation-delay: 0.6s;"></div>
            <p class="text-xl mb-10 slide-up" style="animation-delay: 0.8s;"><i class="far fa-calendar-alt mr-2"></i> {{ $latestEvent?->event_date->format('F j, Y') }}</p>

            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6 mt-8 slide-up" style="animation-delay: 1s;">
                @guest
                    <a href="{{ route('membership.create') }}" class="btn-primary px-8 py-4 rounded-full font-semibold text-lg flex items-center justify-center mx-auto sm:mx-0">
                        <span>Join Membership</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="{{route('login')}}" class="btn-secondary px-8 py-4 rounded-full font-semibold text-lg flex items-center justify-center mx-auto sm:mx-0">
                        <span>Login</span>
                        <i class="fas fa-user-graduate ml-2"></i>
                    </a>
                @endguest

                @auth
                    <a href="{{route('dashboard')}}" class="btn-primary px-8 py-4 rounded-full font-semibold text-lg flex items-center justify-center mx-auto sm:mx-0">
                        <span>My Dashboard</span>
                        <i class="fas fa-tachometer-alt ml-2"></i>
                    </a>
                @endauth
                

            </div>
        </div>
        
        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <a href="#about" class="text-white text-2xl">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </section>

    <!-- Stats Counter Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="counter-box slide-in-left">
                    <div class="text-4xl font-bold mb-2" id="member-count">0</div>
                    <div class="text-xl">Active Members</div>
                </div>
                
                <div class="counter-box slide-up">
                    <div class="text-4xl font-bold mb-2" id="event-count">0</div>
                    <div class="text-xl">Events Organized</div>
                </div>
                
                <div class="counter-box slide-in-right">
                    <div class="text-4xl font-bold mb-2" id="years-count">0</div>
                    <div class="text-xl">Years of Excellence</div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section-padding bg-accent-50 relative overflow-hidden">
        <!-- Floating shapes -->
        <div class="floating-shape w-64 h-64 -top-32 -right-32"></div>
        
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-12 md:mb-0 md:pr-10 slide-in-left">
                    <h2 class="text-3xl md:text-4xl font-bold text-primary-500 mb-6">Who We Are</h2>
                    <p class="text-dark-600 mb-6 text-lg">A registered body of academia and professionals in Office Technology and Information Management dedicated to advancing knowledge and practice in the field.</p>
                    <p class="text-dark-600 mb-8 text-lg">Our mission is to promote excellence in office technology and information management through education, research, and professional development.</p>
                    
                    <div class="flex space-x-4">
                        <div class="bg-primary-500 text-white p-4 rounded-lg text-center">
                            <i class="fas fa-bullseye text-2xl mb-2"></i>
                            <h3 class="font-semibold">Mission</h3>
                        </div>
                        
                        <div class="bg-secondary-500 text-white p-4 rounded-lg text-center">
                            <i class="fas fa-eye text-2xl mb-2"></i>
                            <h3 class="font-semibold">Vision</h3>
                        </div>
                        
                        <div class="bg-primary-600 text-white p-4 rounded-lg text-center">
                            <i class="fas fa-star text-2xl mb-2"></i>
                            <h3 class="font-semibold">Values</h3>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 slide-in-right">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" alt="NIOTIM Team Photo" class="rounded-lg shadow-xl w-full">
                        <div class="absolute -bottom-6 -left-6 bg-primary-500 text-white p-6 rounded-lg shadow-lg">
                            <div class="text-3xl font-bold">25+</div>
                            <div class="text-lg">Years of Experience</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Members Section -->
    <section class="section-padding bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary-500 mb-4">Our Distinguished Members</h2>
                <div class="w-24 h-1 bg-secondary-500 mx-auto"></div>
                <p class="text-dark-600 mt-6 text-lg">Meet our esteemed members who contribute to the growth and development of NIOTIM</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse($members as $member)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        @if($member->passport_path)
                            <img src="{{ Storage::url($member->passport_path) }}" alt="{{ $member->title }} {{ $member->surname }} {{ $member->first_name }}" class="w-full h-64 object-cover">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($member->first_name . ' ' . $member->surname) }}&background=0A914C&color=fff" alt="{{ $member->title }} {{ $member->surname }} {{ $member->first_name }}" class="w-full h-64 object-cover">
                        @endif
                        <div class="absolute top-4 right-4 bg-primary-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            {{ $member->type }}
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-primary-500 mb-2">{{ $member->title }} {{ $member->surname }} {{ $member->first_name }}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{ $member->nationality }}</p>
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <span>{{ $member->address }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="fas fa-phone mr-2"></i>
                            <span>{{ $member->phone }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-4 text-center py-8">
                    <p class="text-gray-600">No featured members available at the moment.</p>
                </div>
                @endforelse
            </div>

            <!-- View All Members Button -->
            <div class="text-center mt-12">
                <a href="{{route('membership.index')}}" class="btn-primary px-8 py-3 rounded-full font-semibold inline-flex items-center">
                    <span>View All Members</span>
                    <i class="fas fa-users ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Who Can Join Section -->
    <section id="membership" class="section-padding bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary-500 mb-4">Who Can Join</h2>
                <div class="w-24 h-1 bg-secondary-500 mx-auto"></div>
                <p class="text-dark-600 mt-6 text-lg">We welcome diverse professionals and students in the field of Office Technology and Information Management</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-accent-100 p-8 rounded-xl shadow-md card-hover transition-all duration-300 animate-on-scroll">
                    <div class="text-primary-500 text-4xl mb-6 bg-white p-4 rounded-full w-20 h-20 flex items-center justify-center shadow-md">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">OTM Students (HND)</h3>
                    <p class="text-dark-600">Office Technology and Management students pursuing Higher National Diploma programs.</p>
                </div>
                
                <div class="bg-accent-100 p-8 rounded-xl shadow-md card-hover transition-all duration-300 animate-on-scroll">
                    <div class="text-primary-500 text-4xl mb-6 bg-white p-4 rounded-full w-20 h-20 flex items-center justify-center shadow-md">
                        <i class="fas fa-university"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">University Students (300 Level+)</h3>
                    <p class="text-dark-600">Office and Information Management students from universities at 300 level and above.</p>
                </div>
                
                <div class="bg-accent-100 p-8 rounded-xl shadow-md card-hover transition-all duration-300 animate-on-scroll">
                    <div class="text-primary-500 text-4xl mb-6 bg-white p-4 rounded-full w-20 h-20 flex items-center justify-center shadow-md">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Lecturers</h3>
                    <p class="text-dark-600">OTM lecturers in Polytechnics/Colleges of Technology and Office & Information Management lecturers in Universities.</p>
                </div>
                
                <div class="bg-accent-100 p-8 rounded-xl shadow-md card-hover transition-all duration-300 animate-on-scroll">
                    <div class="text-primary-500 text-4xl mb-6 bg-white p-4 rounded-full w-20 h-20 flex items-center justify-center shadow-md">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Professionals</h3>
                    <p class="text-dark-600">Office Technology and Information Management professionals of high repute and experience.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Membership Benefits Section -->
    <section class="section-padding bg-primary-50 relative overflow-hidden">
        <!-- Floating shapes -->
        <div class="floating-shape w-64 h-64 -bottom-32 -left-32 opacity-20"></div>
        
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary-500 mb-4">Membership Benefits</h2>
                <div class="w-24 h-1 bg-secondary-500 mx-auto"></div>
                <p class="text-dark-600 mt-6 text-lg">Joining NIOTIM provides you with numerous benefits to advance your career and professional development</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-md card-hover transition-all duration-300 animate-on-scroll">
                    <div class="text-primary-500 text-3xl mb-6">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Professional Recognition</h3>
                    <p class="text-dark-600">Gain official recognition as a certified professional in your field with networking opportunities.</p>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-md card-hover transition-all duration-300 animate-on-scroll">
                    <div class="text-primary-500 text-3xl mb-6">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Access to Resources</h3>
                    <p class="text-dark-600">Exclusive access to research papers, journals, and educational materials in the field.</p>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-md card-hover transition-all duration-300 animate-on-scroll">
                    <div class="text-primary-500 text-3xl mb-6">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Networking Opportunities</h3>
                    <p class="text-dark-600">Connect with fellow professionals, academics, and industry leaders through events and forums.</p>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-md card-hover transition-all duration-300 animate-on-scroll">
                    <div class="text-primary-500 text-3xl mb-6">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Conference Discounts</h3>
                    <p class="text-dark-600">Enjoy discounted rates for conferences, workshops, and seminars organized by NIOTIM.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section-padding bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary-500 mb-4">What Our Members Say</h2>
                <div class="w-24 h-1 bg-secondary-500 mx-auto"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="testimonial-card animate-on-scroll">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-500 rounded-full flex items-center justify-center text-white font-bold mr-4">JD</div>
                        <div>
                            <h4 class="font-semibold">John Doe</h4>
                            <p class="text-primary-500">University Lecturer</p>
                        </div>
                    </div>
                    <p class="text-dark-600">"NIOTIM has provided me with incredible networking opportunities and access to cutting-edge research in our field."</p>
                </div>
                
                <div class="testimonial-card animate-on-scroll">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-500 rounded-full flex items-center justify-center text-white font-bold mr-4">AS</div>
                        <div>
                            <h4 class="font-semibold">Alice Smith</h4>
                            <p class="text-primary-500">Professional Member</p>
                        </div>
                    </div>
                    <p class="text-dark-600">"The conferences and workshops organized by NIOTIM have significantly contributed to my professional development."</p>
                </div>
                
                <div class="testimonial-card animate-on-scroll">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-500 rounded-full flex items-center justify-center text-white font-bold mr-4">RJ</div>
                        <div>
                            <h4 class="font-semibold">Robert Johnson</h4>
                            <p class="text-primary-500">HND Student</p>
                        </div>
                    </div>
                    <p class="text-dark-600">"As a student member, I've gained invaluable insights and mentorship opportunities that have shaped my career path."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Form Section -->
    {{-- <section id="application" class="py-16 bg-primary-50 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="md:flex">
                    <div class="md:w-2/5 bg-primary-500 p-10 text-white">
                        <h2 class="text-3xl font-bold mb-6">Apply for Membership</h2>
                        <p class="mb-6">Join our community of professionals and students in Office Technology and Information Management.</p>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-white text-primary-500 flex items-center justify-center mr-3">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span>Professional Networking</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-white text-primary-500 flex items-center justify-center mr-3">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span>Exclusive Resources</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-white text-primary-500 flex items-center justify-center mr-3">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span>Career Development</span>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-3/5 p-10">
                        <!-- Alert Messages -->
                        <div id="successAlert" class="alert alert-success">
                            <i class="fas fa-check-circle mr-2"></i>
                            <span id="successMessage"></span>
                        </div>
                        
                        <div id="errorAlert" class="alert alert-error">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span id="errorMessage"></span>
                        </div>
                        
                        <form id="membershipForm" class="space-y-6">
                            @csrf
                            
                            <div>
                                <label for="name" class="block text-dark-700 font-medium mb-2">Full Name *</label>
                                <input type="text" id="name" name="name" class="form-input" required>
                                <div class="form-error" id="nameError"></div>
                            </div>
                            
                            <div>
                                <label for="email" class="block text-dark-700 font-medium mb-2">Email Address *</label>
                                <input type="email" id="email" name="email" class="form-input" required>
                                <div class="form-error" id="emailError"></div>
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-dark-700 font-medium mb-2">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" class="form-input" required>
                                <div class="form-error" id="phoneError"></div>
                            </div>
                            
                            <div>
                                <label for="membership_type" class="block text-dark-700 font-medium mb-2">Membership Type *</label>
                                <select id="membership_type" name="membership_type" class="form-input" required>
                                    <option value="">Select Membership Type</option>
                                    <option value="student-hnd">OTM Student (HND)</option>
                                    <option value="university-student">University Student (300 Level+)</option>
                                    <option value="polytechnic-lecturer">Polytechnic Lecturer</option>
                                    <option value="university-lecturer">University Lecturer</option>
                                    <option value="professional">Professional</option>
                                </select>
                                <div class="form-error" id="membershipTypeError"></div>
                            </div>
                            
                            <button type="submit" class="w-full bg-primary-500 text-white py-3 rounded-lg font-semibold text-lg hover:bg-primary-600 transition">
                                <span id="submitText">Submit Application</span>
                                <div id="submitSpinner" class="inline-flex hidden">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Processing...
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- News Section -->
    <section id="news" class="section-padding bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary-500 mb-4">Latest News</h2>
                <div class="w-24 h-1 bg-secondary-500 mx-auto"></div>
                <p class="text-dark-600 mt-6 text-lg">Stay updated with the latest news and events from NIOTIM</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($news as $newsItem)
                <div class="bg-white rounded-xl overflow-hidden shadow-md card-hover transition-all duration-300 animate-on-scroll">
                    <div class="h-48 overflow-hidden">
                        @if($newsItem->featured_image)
                            <img src="{{ Storage::url($newsItem->featured_image) }}" alt="{{ $newsItem->title }}">

                        @else
                            <img src="https://placehold.co/600x400" alt="{{ $newsItem->title }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="text-primary-500 text-sm mb-2">{{ $newsItem->created_at->format('F d, Y') }}</div>
                        <h3 class="text-xl font-semibold mb-3">{{ $newsItem->title }}</h3>
                        <p class="text-dark-600 mb-4">{!! Str::limit($newsItem->content, 100) !!}</p>
                        <a href="{{ route('news.show', $newsItem->id) }}" class="text-primary-500 font-semibold hover:text-primary-700 transition flex items-center">
                            <span>Read More</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center">
                    <p class="text-dark-600">No news articles available at the moment.</p>
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="{{route('news.index')}}" class="btn-secondary px-8 py-3 rounded-full font-semibold inline-flex items-center">
                    <span>View All News</span>
                    <i class="fas fa-newspaper ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section-padding bg-white relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary-500 mb-4">Frequently Asked Questions</h2>
                <div class="w-24 h-1 bg-secondary-500 mx-auto"></div>
                <p class="text-dark-600 mt-6 text-lg">Find answers to commonly asked questions about NIOTIM membership and services</p>
            </div>

            <div class="max-w-4xl mx-auto space-y-6" x-data="{ activeTab: null }">
                <!-- FAQ Item 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <button @click="activeTab = activeTab === 1 ? null : 1" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none">
                        <span class="text-lg font-semibold text-dark-700">What are the requirements for NIOTIM membership?</span>
                        <i class="fas" :class="activeTab === 1 ? 'fa-chevron-up text-primary-500' : 'fa-chevron-down text-dark-400'"></i>
                    </button>
                    <div x-show="activeTab === 1" x-collapse>
                        <div class="px-6 pb-4 text-dark-600">
                            <p>Requirements vary by membership category:</p>
                            <ul class="list-disc ml-6 mt-2 space-y-2">
                                <li>Students: Must be enrolled in HND OTM program or University (300 Level+)</li>
                                <li>Lecturers: Must be teaching OTM in polytechnics or universities</li>
                                <li>Professionals: Must have relevant qualifications and experience in the field</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <button @click="activeTab = activeTab === 2 ? null : 2" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none">
                        <span class="text-lg font-semibold text-dark-700">How long does the application process take?</span>
                        <i class="fas" :class="activeTab === 2 ? 'fa-chevron-up text-primary-500' : 'fa-chevron-down text-dark-400'"></i>
                    </button>
                    <div x-show="activeTab === 2" x-collapse>
                        <div class="px-6 pb-4 text-dark-600">
                            <p>The typical application process takes 2-3 weeks. This includes:</p>
                            <ul class="list-disc ml-6 mt-2 space-y-2">
                                <li>Initial application review (3-5 business days)</li>
                                <li>Document verification (7-10 business days)</li>
                                <li>Final approval and membership activation (2-3 business days)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <button @click="activeTab = activeTab === 3 ? null : 3" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none">
                        <span class="text-lg font-semibold text-dark-700">What benefits do members receive?</span>
                        <i class="fas" :class="activeTab === 3 ? 'fa-chevron-up text-primary-500' : 'fa-chevron-down text-dark-400'"></i>
                    </button>
                    <div x-show="activeTab === 3" x-collapse>
                        <div class="px-6 pb-4 text-dark-600">
                            <ul class="list-disc ml-6 space-y-2">
                                <li>Access to exclusive research materials and publications</li>
                                <li>Networking opportunities with industry professionals</li>
                                <li>Discounted rates for conferences and workshops</li>
                                <li>Professional development and training programs</li>
                                <li>Regular newsletters and industry updates</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <button @click="activeTab = activeTab === 4 ? null : 4" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none">
                        <span class="text-lg font-semibold text-dark-700">How can I renew my membership?</span>
                        <i class="fas" :class="activeTab === 4 ? 'fa-chevron-up text-primary-500' : 'fa-chevron-down text-dark-400'"></i>
                    </button>
                    <div x-show="activeTab === 4" x-collapse>
                        <div class="px-6 pb-4 text-dark-600">
                            <p>Membership renewal can be done through:</p>
                            <ul class="list-disc ml-6 mt-2 space-y-2">
                                <li>Online renewal through your member dashboard</li>
                                <li>Direct bank transfer with renewal form submission</li>
                                <li>In-person at our office locations</li>
                            </ul>
                            <p class="mt-2">Renewal notices are sent 30 days before expiration.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <button @click="activeTab = activeTab === 5 ? null : 5" class="w-full px-6 py-4 text-left flex items-center justify-between focus:outline-none">
                        <span class="text-lg font-semibold text-dark-700">Can I upgrade my membership level?</span>
                        <i class="fas" :class="activeTab === 5 ? 'fa-chevron-up text-primary-500' : 'fa-chevron-down text-dark-400'"></i>
                    </button>
                    <div x-show="activeTab === 5" x-collapse>
                        <div class="px-6 pb-4 text-dark-600">
                            <p>Yes, you can upgrade your membership when you:</p>
                            <ul class="list-disc ml-6 mt-2 space-y-2">
                                <li>Graduate from student to professional status</li>
                                <li>Gain additional qualifications</li>
                                <li>Meet the requirements for a higher membership tier</li>
                            </ul>
                            <p class="mt-2">Contact the membership office for upgrade procedures.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
     <section id="contact" class="py-16 bg-primary-50 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary-500 mb-4">Contact Us</h2>
                <div class="w-24 h-1 bg-secondary-500 mx-auto"></div>
                <p class="text-dark-600 mt-6 text-lg">Have questions? Reach out to us and we'll get back to you shortly.</p>
            </div>
            
            <div class="flex flex-col lg:flex-row justify-between bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="lg:w-2/5 p-10 bg-primary-500 text-white">
                    <h3 class="text-2xl font-semibold mb-6">Get In Touch</h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-10 h-10 rounded-full bg-white text-primary-500 flex items-center justify-center mt-1 mr-4 flex-shrink-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <span>Lagos State University, Ikeja Campus, Lagos, Nigeria</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-white text-primary-500 flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-phone"></i>
                            </div>
                            <span>+234 7035559223</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-white text-primary-500 flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <span>nioitim@nigeria.org</span>
                        </div>
                    </div>
                    
                    <div class="mt-10">
                        <h4 class="text-xl font-semibold mb-4">Follow Us</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 rounded-full bg-white text-primary-500 flex items-center justify-center hover:bg-secondary-500 hover:text-white transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-white text-primary-500 flex items-center justify-center hover:bg-secondary-500 hover:text-white transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-white text-primary-500 flex items-center justify-center hover:bg-secondary-500 hover:text-white transition">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-white text-primary-500 flex items-center justify-center hover:bg-secondary-500 hover:text-white transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="lg:w-3/5 p-10">
                    <!-- Alert Messages -->
                    <div id="contactSuccessAlert" class="alert alert-success">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span id="contactSuccessMessage"></span>
                    </div>
                    
                    <div id="contactErrorAlert" class="alert alert-error">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <span id="contactErrorMessage"></span>
                    </div>
                    
                    <form id="contactForm" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="contact-name" class="block text-dark-700 font-medium mb-2">Full Name *</label>
                                <input type="text" id="contact-name" name="name" class="form-input" required>
                                <div class="form-error" id="contactNameError"></div>
                            </div>
                            
                            <div>
                                <label for="contact-email" class="block text-dark-700 font-medium mb-2">Email Address *</label>
                                <input type="email" id="contact-email" name="email" class="form-input" required>
                                <div class="form-error" id="contactEmailError"></div>
                            </div>
                        </div>
                        
                        <div>
                            <label for="contact-subject" class="block text-dark-700 font-medium mb-2">Subject *</label>
                            <input type="text" id="contact-subject" name="subject" class="form-input" required>
                            <div class="form-error" id="contactSubjectError"></div>
                        </div>
                        
                        <div>
                            <label for="contact-message" class="block text-dark-700 font-medium mb-2">Message *</label>
                            <textarea id="contact-message" name="message" rows="5" class="form-input" required></textarea>
                            <div class="form-error" id="contactMessageError"></div>
                        </div>
                        
                        <button type="submit" class="bg-primary-500 text-white py-3 px-8 rounded-lg font-semibold hover:bg-primary-600 transition">
                            <span id="contactSubmitText">Send Message</span>
                            <div id="contactSubmitSpinner" class="inline-flex hidden">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Processing...
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-gradient text-white pt-16 pb-8">
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
                        <li><a href="#home" class="hover:text-accent-500 transition">Home</a></li>
                        <li><a href="#about" class="hover:text-accent-500 transition">About Us</a></li>
                        <li><a href="#membership" class="hover:text-accent-500 transition">Membership</a></li>
                        <li><a href="{{route('membership.create')}}" class="hover:text-accent-500 transition">Application</a></li>
                        <li><a href="#news" class="hover:text-accent-500 transition">News & Events</a></li>
                        <li><a href="#contact" class="hover:text-accent-500 transition">Contact Us</a></li>
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
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-accent-500"></i>
                            <span>Lagos State University, Ikeja Campus, Lagos, Nigeria</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3 text-accent-500"></i>
                            <span>+234 7035559223</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-accent-500"></i>
                            <span>nioitim@nigeria.org</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-white/20 pt-8 text-center">
                <p>&copy; 2023 NIOTIM. All rights reserved. Website by <a href="https://wa.link/1tz78w">Paramount Computer</a></p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-8 right-8 w-12 h-12 rounded-full bg-primary-500 text-white shadow-lg flex items-center justify-center transition-opacity duration-300 opacity-0">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Scripts -->
    <script>
        // Scroll Animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Add a small delay to ensure CSS transitions work properly
                    setTimeout(() => {
                        entry.target.classList.add('fade-in');
                    }, 100);
                    // Unobserve after animation is added to prevent re-animation
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15,
            rootMargin: '-50px 0px'
        });

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });

        // Smooth Scrolling for Anchor Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const closeMenuButton = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.add('open');
            document.body.style.overflow = 'hidden';
        });
        
        closeMenuButton.addEventListener('click', () => {
            mobileMenu.classList.remove('open');
            document.body.style.overflow = 'auto';
        });

        // Close mobile menu when clicking on links
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('open');
                document.body.style.overflow = 'auto';
            });
        });

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
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Counter animation
        function animateCounter(elementId, finalValue, duration) {
            let startTime = null;
            const element = document.getElementById(elementId);
            const initialValue = 0;
            
            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                const progress = Math.min((timestamp - startTime) / duration, 1);
                const value = Math.floor(progress * (finalValue - initialValue) + initialValue);
                element.textContent = value;
                
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            }
            
            window.requestAnimationFrame(step);
        }

        // Initialize counters when they come into view
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter('member-count', 1250, 2000);
                    animateCounter('event-count', 85, 2000);
                    animateCounter('years-count', 25, 2000);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        const counterSection = document.querySelector('.bg-white.py-16');
        if (counterSection) {
            counterObserver.observe(counterSection);
        }
    </script>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('membershipForm');
            const successAlert = document.getElementById('successAlert');
            const errorAlert = document.getElementById('errorAlert');
            const successMessage = document.getElementById('successMessage');
            const errorMessage = document.getElementById('errorMessage');
            const submitText = document.getElementById('submitText');
            const submitSpinner = document.getElementById('submitSpinner');
            
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                // Reset error messages
                hideAllErrors();
                errorAlert.style.display = 'none';
                
                // Show loading state
                submitText.classList.add('hidden');
                submitSpinner.classList.remove('hidden');
                
                // Get form data
                const formData = new FormData(form);
                
                try {
                    const response = await fetch('/membership/apply', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });
                    
                    const data = await response.json();
                    
                    if (response.ok) {
                        // Success
                        successMessage.textContent = data.message || 'Application submitted successfully!';
                        successAlert.style.display = 'flex';
                        form.reset();
                        
                        // Scroll to success message
                        successAlert.scrollIntoView({ behavior: 'smooth' });
                    } else {
                        // Validation errors
                        if (data.errors) {
                            displayValidationErrors(data.errors);
                        } else {
                            errorMessage.textContent = data.message || 'An error occurred. Please try again.';
                            errorAlert.style.display = 'flex';
                        }
                    }
                } catch (error) {
                    errorMessage.textContent = 'Network error. Please check your connection and try again.';
                    errorAlert.style.display = 'flex';
                } finally {
                    // Hide loading state
                    submitText.classList.remove('hidden');
                    submitSpinner.classList.add('hidden');
                }
            });
            
            function displayValidationErrors(errors) {
                for (const field in errors) {
                    const errorElement = document.getElementById(field + 'Error');
                    if (errorElement) {
                        errorElement.textContent = errors[field][0];
                        errorElement.style.display = 'block';
                    }
                }
                
                errorMessage.textContent = 'Please correct the errors in the form.';
                errorAlert.style.display = 'flex';
            }
            
            function hideAllErrors() {
                const errorElements = document.querySelectorAll('.form-error');
                errorElements.forEach(element => {
                    element.style.display = 'none';
                });
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contactForm');
            const contactSuccessAlert = document.getElementById('contactSuccessAlert');
            const contactErrorAlert = document.getElementById('contactErrorAlert');
            const contactSuccessMessage = document.getElementById('contactSuccessMessage');
            const contactErrorMessage = document.getElementById('contactErrorMessage');
            const contactSubmitText = document.getElementById('contactSubmitText');
            const contactSubmitSpinner = document.getElementById('contactSubmitSpinner');
            
            contactForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                // Reset error messages
                hideAllContactErrors();
                contactErrorAlert.style.display = 'none';
                
                // Show loading state
                contactSubmitText.classList.add('hidden');
                contactSubmitSpinner.classList.remove('hidden');
                
                // Get form data
                const formData = new FormData(contactForm);
                
                try {
                    const response = await fetch('/contact/send', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });
                    
                    const data = await response.json();
                    
                    if (response.ok) {
                        // Success
                        contactSuccessMessage.textContent = data.message || 'Message sent successfully!';
                        contactSuccessAlert.style.display = 'flex';
                        contactForm.reset();
                        
                        // Scroll to success message
                        contactSuccessAlert.scrollIntoView({ behavior: 'smooth' });
                    } else {
                        // Validation errors
                        if (data.errors) {
                            displayContactValidationErrors(data.errors);
                        } else {
                            contactErrorMessage.textContent = data.message || 'An error occurred. Please try again.';
                            contactErrorAlert.style.display = 'flex';
                        }
                    }
                } catch (error) {
                    contactErrorMessage.textContent = 'Network error. Please check your connection and try again.';
                    contactErrorAlert.style.display = 'flex';
                } finally {
                    // Hide loading state
                    contactSubmitText.classList.remove('hidden');
                    contactSubmitSpinner.classList.add('hidden');
                }
            });
            
            function displayContactValidationErrors(errors) {
                for (const field in errors) {
                    const errorElement = document.getElementById('contact' + field.charAt(0).toUpperCase() + field.slice(1) + 'Error');
                    if (errorElement) {
                        errorElement.textContent = errors[field][0];
                        errorElement.style.display = 'block';
                    }
                }
                
                contactErrorMessage.textContent = 'Please correct the errors in the form.';
                contactErrorAlert.style.display = 'flex';
            }
            
            function hideAllContactErrors() {
                const errorElements = document.querySelectorAll('.form-error');
                errorElements.forEach(element => {
                    element.style.display = 'none';
                });
            }
        });
    </script>
</body>
</html>