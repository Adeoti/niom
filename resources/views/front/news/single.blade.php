<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }} - NIOTIM News</title>
    
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
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, rgba(10,145,76,0.9) 0%, rgba(210,217,37,0.85) 100%);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
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
        
        .footer-gradient {
            background: linear-gradient(to right, #044223 0%, #087d42 100%);
        }
        
        /* Animation classes */
        .fade-in {
            animation: fadeIn 0.8s ease forwards;
        }
        
        .slide-up {
            animation: slideUp 0.8s ease forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Content styles */
        .news-content h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #0a914c;
            margin: 2rem 0 1rem;
        }
        
        .news-content h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #087d42;
            margin: 1.5rem 0 0.8rem;
        }
        
        .news-content p {
            margin-bottom: 1.2rem;
            line-height: 1.7;
        }
        
        .news-content ul, .news-content ol {
            margin-bottom: 1.2rem;
            padding-left: 1.5rem;
        }
        
        .news-content li {
            margin-bottom: 0.5rem;
            line-height: 1.6;
        }
        
        .news-content blockquote {
            border-left: 4px solid #0a914c;
            padding-left: 1.5rem;
            margin: 1.5rem 0;
            font-style: italic;
            color: #555;
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
            .section-padding {
                padding: 3rem 0;
            }
        }
    </style>
</head>
<body class="bg-white text-dark-500">
    <!-- Header Navigation -->
    @include('partials.header')

    <!-- Page Header Section -->
    <section class="pt-32 pb-16 bg-accent-50">
        <div class="container mx-auto px-4">
            <a href="{{route('news.index')}}" class="inline-flex items-center text-primary-500 hover:text-primary-700 mb-6 transition fade-in">
                <i class="fas fa-arrow-left mr-2"></i> Back to All News
            </a>
            
            <div class="mb-6 fade-in">
                @if($news->category)
                <span class="text-primary-500 bg-primary-50 px-3 py-1 rounded-full text-sm font-medium">{{ $news->category }}</span>
                @endif
                <span class="text-dark-600 ml-3 text-sm">{{ $news->created_at->format('F j, Y') }}</span>
            </div>
            
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-primary-500 mb-6 fade-in">{{ $news->title }}</h1>
                <div class="my-4">
                        @if($news->featured_image)
                            <img src="{{ Storage::url($news->featured_image) }}" alt="{{ $news->title }}">

                        @else
                            <img src="https://placehold.co/600x400" alt="{{ $news->title }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        @endif
                    </div>
            
            <div class="flex items-center text-dark-600 fade-in">
                <div class="flex items-center mr-6">
                    <i class="far fa-clock mr-2"></i>
                    <span>{{ $news->read_time ?? '5' }} min read</span>
                </div>
                <div class="flex items-center">
                    <i class="far fa-user mr-2"></i>
                    <span>By {{ $news->author->name ?? 'NIOTIM Press Office' }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Image -->
    @if($news->image_url)
    <section class="mb-12">
        <div class="container mx-auto px-4">
            <div class="rounded-xl overflow-hidden shadow-lg slide-up">
                <img src="{{ $news->image_url }}" 
                     alt="{{ $news->title }}" class="w-full h-auto object-cover">
            </div>
        </div>
    </section>
    @endif

    <!-- News Content -->
    <section class="section-padding pt-0">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row">
                <!-- Main Content -->
                <div class="lg:w-2/3 lg:pr-12">
                    <div class="news-content">
                        {!! $news->content !!}
                    </div>
                    
                    <!-- Tags and Share -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mt-12 pt-8 border-t border-gray-200 fade-in">
                        @if($news->tags)
                        <div class="mb-4 sm:mb-0">
                            <span class="text-dark-700 font-medium mr-3">Tags:</span>
                            @foreach(explode(',', $news->tags) as $tag)
                            <a href="#" class="text-primary-500 hover:text-primary-700 mr-2">#{{ trim($tag) }}</a>
                            @endforeach
                        </div>
                        @endif
                        
                        <div>
                            <span class="text-dark-700 font-medium mr-3">Share:</span>
                            <a href="#" class="text-primary-500 hover:text-primary-700 text-xl mr-3"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-primary-500 hover:text-primary-700 text-xl mr-3"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-primary-500 hover:text-primary-700 text-xl mr-3"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="text-primary-500 hover:text-primary-700 text-xl"><i class="fas fa-link"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Sidebar -->
                <div class="lg:w-1/3 mt-12 lg:mt-0">
                    <!-- Additional details if available -->
                    @if($news->event_date || $news->event_location)
                    <div class="bg-accent-100 p-6 rounded-xl shadow-md sticky top-32 fade-in">
                        <h3 class="text-xl font-semibold text-primary-500 mb-4">Event Details</h3>
                        
                        <div class="space-y-4">
                            @if($news->event_date)
                            <div class="flex items-start">
                                <div class="w-10 h-10 rounded-full bg-primary-500 text-white flex items-center justify-center mt-1 mr-4 flex-shrink-0">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                                <div>
                                    <p class="font-medium">Date</p>
                                    <p>{{ \Carbon\Carbon::parse($news->event_date)->format('F j, Y') }}</p>
                                </div>
                            </div>
                            @endif
                            
                            @if($news->event_location)
                            <div class="flex items-start">
                                <div class="w-10 h-10 rounded-full bg-primary-500 text-white flex items-center justify-center mt-1 mr-4 flex-shrink-0">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <p class="font-medium">Location</p>
                                    <p>{{ $news->event_location }}</p>
                                </div>
                            </div>
                            @endif
                            
                            @if($news->event_website)
                            <div class="flex items-start">
                                <div class="w-10 h-10 rounded-full bg-primary-500 text-white flex items-center justify-center mt-1 mr-4 flex-shrink-0">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div>
                                    <p class="font-medium">Website</p>
                                    <a href="{{ $news->event_website }}" class="text-primary-500 hover:text-primary-700" target="_blank">Event Website</a>
                                </div>
                            </div>
                            @endif
                            
                            @if($news->event_registration_link)
                            <div class="pt-4">
                                <a href="{{ $news->event_registration_link }}" class="btn-primary w-full py-3 rounded-lg font-semibold text-center block" target="_blank">Register Now</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                    
                    <!-- Related News -->
                    <div class="mt-8 fade-in">
                        <h3 class="text-xl font-semibold text-primary-500 mb-4">Recent News</h3>
                        
                        <div class="space-y-6">
                            @foreach($recentNews as $recent)
                            <div class="bg-white p-4 rounded-lg shadow-sm card-hover">
                                <p class="text-primary-500 text-sm mb-2">{{ $recent->created_at->format('F j, Y') }}</p>
                                <h4 class="font-semibold mb-2">{{ $recent->title }}</h4>
                                <p class="text-sm text-dark-600 mb-2">{{ Str::limit($recent->excerpt ?? $recent->content, 80) }}</p>
                                <a href="{{ route('news.show', $recent->id) }}" class="text-primary-500 text-sm font-medium hover:text-primary-700 transition">Read More</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-primary-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-primary-500 mb-4">Stay Updated with NIOTIM</h2>
                <p class="text-dark-600 mb-8">Subscribe to our newsletter to receive the latest news, events, and updates directly in your inbox.</p>
                
                <form class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <input type="email" placeholder="Your email address" class="px-6 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent flex-grow">
                    <button type="submit" class="btn-primary px-8 py-3 rounded-lg font-semibold whitespace-nowrap">Subscribe</button>
                </form>
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
                        <li><a href="{{route('membership.create')}}" class="hover:text-accent-500 transition">Application</a></li>
                        <li><a href="{{route('news.index')}}" class="hover:text-accent-500 transition">News & Events</a></li>
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

        // Add animations to elements as they come into view
        const animatedElements = document.querySelectorAll('.fade-in, .slide-up');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.visibility = 'visible';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        animatedElements.forEach(el => {
            el.style.visibility = 'hidden';
            observer.observe(el);
        });

         function toggleSubmenu(id) {
            const submenu = document.getElementById(id);
            submenu.classList.toggle('hidden');
        }
    </script>
</body>
</html>