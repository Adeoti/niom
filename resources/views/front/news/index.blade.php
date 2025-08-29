<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIOTIM - News & Updates</title>
    
    <!-- Required Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/react@18.0.0/umd/react.development.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/react-dom@18.0.0/umd/react-dom.development.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@babel/standalone/babel.js"></script>
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
                <div class="w-12 h-12 rounded-full bg-primary-500 flex items-center justify-center text-white font-bold text-xl mr-3 shadow-md">N</div>
                <span class="text-xl font-bold text-primary-500">NIOTIM</span>
            </div>
            
            <!-- Desktop Navigation -->
            <nav class="hidden md:block">
                <ul class="flex space-x-8">
                    <li><a href="{{route('home')}}" class="text-dark-500 hover:text-primary-500 transition font-medium">Home</a></li>
                    <li><a href="{{route('home')}}#about" class="text-dark-500 hover:text-primary-500 transition font-medium">About</a></li>
                    <li><a href="{{route('home')}}#membership" class="text-dark-500 hover:text-primary-500 transition font-medium">Membership</a></li>
                    <li><a href="{{route('home')}}{{route('membership.create')}}" class="text-dark-500 hover:text-primary-500 transition font-medium">Application</a></li>
                    <li><a href="{{route('news.index')}}" class="text-primary-500 transition font-medium">News</a></li>
                    <li><a href="{{route('home')}}#contact" class="text-dark-500 hover:text-primary-500 transition font-medium">Contact</a></li>
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
                    <li><a href="{{route('home')}}" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">Home</a></li>
                    <li><a href="{{route('home')}}#about" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">About</a></li>
                    <li><a href="{{route('home')}}#membership" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">Membership</a></li>
                    <li><a href="{{route('home')}}{{route('membership.create')}}" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">Application</a></li>
                    <li><a href="news.html" class="text-primary-500 transition font-medium block py-2">News</a></li>
                    <li><a href="{{route('home')}}#contact" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">Contact</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Page Header Section -->
    <section class="hero-gradient text-white pt-32 pb-16 relative overflow-hidden">
        <!-- Floating shapes -->
        <div class="floating-shape w-64 h-64 -top-32 -left-32"></div>
        <div class="floating-shape w-40 h-40 top-1/4 right-20"></div>
        <div class="floating-shape w-32 h-32 bottom-20 left-1/4"></div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 slide-up">NIOTIM News & Updates</h1>
            <p class="text-xl md:text-2xl mb-2 slide-up" style="animation-delay: 0.2s;">Stay informed with the latest from NIOTIM</p>
            <div class="w-24 h-1 bg-secondary-500 mx-auto my-8 slide-up" style="animation-delay: 0.6s;"></div>
        </div>
    </section>

    <!-- News Section -->
    <section class="section-padding bg-white">
        <div class="container mx-auto px-4">
            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12" id="news-container">
                <!-- Real news items from controller -->
                @foreach($news as $item)
                <div class="bg-white rounded-xl overflow-hidden shadow-md card-hover transition-all duration-300 animate-on-scroll">
                        <div class="h-48 overflow-hidden">
                        @if($item->featured_image)
                            <img src="{{ Storage::url($item->featured_image) }}" alt="{{ $item->title }}">

                        @else
                            <img src="https://placehold.co/600x400" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="text-primary-500 text-sm mb-2">{{ $item->created_at->format('F j, Y') }}</div>
                        <h3 class="text-xl font-semibold mb-3">{{ $item->title }}</h3>
                        <p class="text-dark-600 mb-4">{{ Str::limit($item->excerpt ?? $item->content, 120) }}</p>
                        <a href="{{ route('news.show', $item->id) }}" class="text-primary-500 font-semibold hover:text-primary-700 transition flex items-center">
                            <span>Read More</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Laravel Pagination -->
            <div class="flex justify-center mt-8">
                {{-- {{ $news->links('vendor.pagination.custom') }} --}}
                {{ $news->links() }}
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-primary-50 relative overflow-hidden">
        <!-- Floating shapes -->
        <div class="floating-shape w-64 h-64 -bottom-32 -right-32 opacity-20"></div>
        
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="md:flex items-center">
                    <div class="md:w-2/5 p-10 bg-primary-500 text-white">
                        <h2 class="text-2xl font-bold mb-4">Stay Updated</h2>
                        <p>Subscribe to our newsletter to receive the latest news and updates directly in your inbox.</p>
                    </div>
                    <div class="md:w-3/5 p-10">
                        <form class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                            <input type="email" placeholder="Your email address" class="form-input flex-grow">
                            <button type="submit" class="btn-primary px-6 py-3 rounded-lg font-semibold whitespace-nowrap">Subscribe</button>
                        </form>
                    </div>
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
                        <li><a href="{{route('home')}}" class="hover:text-accent-500 transition">Home</a></li>
                        <li><a href="{{route('home')}}#about" class="hover:text-accent-500 transition">About Us</a></li>
                        <li><a href="{{route('home')}}#membership" class="hover:text-accent-500 transition">Membership</a></li>
                        <li><a href="{{route('home')}}{{route('membership.create')}}" class="hover:text-accent-500 transition">Application</a></li>
                        <li><a href="news.html" class="hover:text-accent-500 transition">News & Events</a></li>
                        <li><a href="{{route('home')}}#contact" class="hover:text-accent-500 transition">Contact Us</a></li>
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
        // Remove the dummy newsData array and JavaScript pagination logic
        // since we're using Laravel's server-side rendering

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
    </script>
</body>
</html>