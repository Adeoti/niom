<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Members - NIOTIM</title>    
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
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-out forwards',
                        'slide-up': 'slideUp 0.8s ease-out forwards',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
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
            background: linear-gradient(135deg, rgba(10,145,76,0.9) 0%, rgba(210,217,37,0.85) 100%);
        }
        
        .section-padding {
            padding: 5rem 0;
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
        
        .nav-scroll {
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
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
        
        /* List view styles */
        .list-view .member-card {
            display: flex;
            flex-direction: row;
            height: auto;
        }
        
        .list-view .member-image {
            width: 200px;
            height: 200px;
            flex-shrink: 0;
        }
        
        .list-view .member-details {
            flex: 1;
            padding: 1.5rem;
        }
        
        /* Grid view styles */
        .grid-view .member-card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        .grid-view .member-image {
            width: 100%;
            height: 250px;
        }
        
        .grid-view .member-details {
            padding: 1.5rem;
            flex: 1;
        }
        
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 100;
            justify-content: center;
            align-items: center;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 12px;
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
        }
        
        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 1.5rem;
            cursor: pointer;
            color: #333;
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
                    <li><a href="{{route('membership.create')}}" class="text-dark-500 hover:text-primary-500 transition font-medium">Application</a></li>
                    <li><a href="{{route('news.index')}}" class="text-dark-500 hover:text-primary-500 transition font-medium">News</a></li>
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
                    <li><a href="{{route('membership.create')}}" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">Application</a></li>
                    <li><a href="{{route('news.index')}}" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">News</a></li>
                    <li><a href="{{route('home')}}#contact" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">Contact</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Page Header Section -->
    <section class="hero-gradient text-white pt-32 pb-16 relative overflow-hidden">
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 slide-up">NIOTIM Members Directory</h1>
            <p class="text-xl md:text-2xl mb-2 slide-up" style="animation-delay: 0.2s;">Discover our community of professionals and students</p>
            <div class="w-24 h-1 bg-secondary-500 mx-auto my-8 slide-up" style="animation-delay: 0.6s;"></div>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="py-10 bg-accent-50">
        <div class="container mx-auto px-4">
            <div x-data="{ search: '', membershipType: 'all', isFilterOpen: false }" class="max-w-6xl mx-auto">
                <!-- Search Bar -->
                <div class="mb-6 slide-up">
                    <div class="relative">
                        <input 
                            x-model="search" 
                            type="text" 
                            placeholder="Search members by name, location, or specialty..." 
                            class="w-full form-input pl-12 pr-4 py-3 text-lg"
                            id="searchInput"
                        >
                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
                
                <!-- Filter Toggle for Mobile -->
                <div class="md:hidden mb-4">
                    <button 
                        @click="isFilterOpen = !isFilterOpen" 
                        class="flex items-center text-primary-500 font-semibold"
                    >
                        <span>Filter Members</span>
                        <i class="fas ml-2" :class="isFilterOpen ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                    </button>
                </div>
                
                <!-- Filters -->
                <div 
                    :class="isFilterOpen ? 'block' : 'hidden'"
                    class="md:flex items-center justify-between space-y-4 md:space-y-0"
                >
                    <div class="flex flex-wrap gap-4">
                        <div>
                            <label class="block text-sm font-medium text-dark-700 mb-1">Membership Type</label>
                            <select x-model="membershipType" class="form-input py-2" id="membershipTypeFilter">
                                <option value="all">All Types</option>
                                <option value="student-hnd">OTM Student (HND)</option>
                                <option value="university-student">University Student</option>
                                <option value="polytechnic-lecturer">Polytechnic Lecturer</option>
                                <option value="university-lecturer">University Lecturer</option>
                                <option value="professional">Professional</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-dark-700 mb-1">Location</label>
                            <select class="form-input py-2" id="locationFilter">
                                <option value="all">All Locations</option>
                                <option value="lagos">Lagos</option>
                                <option value="abuja">Abuja</option>
                                <option value="port-harcourt">Port Harcourt</option>
                                <option value="ibadan">Ibadan</option>
                                <option value="kano">Kano</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-dark-700 mb-1">Sort By</label>
                            <select class="form-input py-2" id="sortFilter">
                                <option value="newest">Newest First</option>
                                <option value="name-asc">Name (A-Z)</option>
                                <option value="name-desc">Name (Z-A)</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="flex items-end">
                        <button class="btn-primary px-6 py-2 rounded-lg" style="color: #fff;" id="applyFilters">
                            Apply Filters
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Members Grid Section -->
    <section class="section-padding bg-white">
        <div class="container mx-auto px-4">
            <div class="mb-8 flex justify-between items-center">
                <h2 class="text-2xl font-bold text-primary-500">Our Members <span class="text-dark-600 text-lg font-normal">(<span id="totalMembers">{{ $stats['total'] }}</span> total)</span></h2>
                
                <div class="flex items-center space-x-2">
                    <span class="text-dark-600">View:</span>
                    <button class="p-2 rounded-lg bg-primary-100 text-primary-500" id="gridViewBtn">
                        <i class="fas fa-th"></i>
                    </button>
                    <button class="p-2 rounded-lg text-dark-400 hover:bg-primary-100 hover:text-primary-500" id="listViewBtn">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>
            
            <div id="membersContainer" class="grid-view grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <!-- Members will be dynamically loaded here -->
            </div>
            
            <!-- Pagination -->
            <div class="mt-12">
                {{ $members->links() }}
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-primary-50">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
                <h2 class="text-3xl font-bold text-center text-primary-500 mb-12">Membership Statistics</h2>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="bg-white rounded-xl p-6 text-center shadow-md">
                        <div class="text-4xl font-bold text-primary-500 mb-2">{{ $stats['total'] }}</div>
                        <div class="text-dark-600">Total Members</div>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 text-center shadow-md">
                        <div class="text-4xl font-bold text-primary-500 mb-2">{{ $stats['students'] }}</div>
                        <div class="text-dark-600">Student Members</div>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 text-center shadow-md">
                        <div class="text-4xl font-bold text-primary-500 mb-2">{{ $stats['lecturers'] }}</div>
                        <div class="text-dark-600">Lecturers</div>
                    </div>
                    
                    <div class="bg-white rounded-xl p-6 text-center shadow-md">
                        <div class="text-4xl font-bold text-primary-500 mb-2">{{ $stats['professionals'] }}</div>
                        <div class="text-dark-600">Professionals</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary-500 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Become a NIOTIM Member Today</h2>
            <p class="text-xl max-w-3xl mx-auto mb-10">Join our community of Office Technology and Information Management professionals and students</p>
            
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="{{ route('membership.create') }}" class="bg-white text-primary-500 px-8 py-4 rounded-full font-semibold text-lg hover:bg-gray-100 transition inline-flex items-center justify-center">
                    <span>Apply for Membership</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
                <a href="{{ route('home') }}#membership" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-primary-500 transition inline-flex items-center justify-center">
                    <span>Learn More</span>
                    <i class="fas fa-info-circle ml-2"></i>
                </a>
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

    <!-- Member Detail Modal -->
    <div id="memberModal" class="modal">
        <div class="modal-content">
            <span class="close-modal" id="closeModal">&times;</span>
            <div class="p-6">
                <div class="flex flex-col md:flex-row items-start gap-6 mb-6">
                    <img id="modalImage" src="https://ui-avatars.com/api/?name=John+Doe&background=0A914C&color=fff&size=200" alt="Member" class="w-32 h-32 rounded-full object-cover">
                    <div>
                        <h2 id="modalName" class="text-2xl font-bold text-primary-500">Dr. John Doe</h2>
                        <p id="modalTitle" class="text-dark-600">Professor of Office Technology</p>
                        <p id="modalType" class="text-primary-500 font-semibold">Professional Member</p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-3">Contact Information</h3>
                        <div class="space-y-2">
                            <p><i class="fas fa-envelope text-primary-500 mr-2"></i> <span id="modalEmail">johndoe@example.com</span></p>
                            <p><i class="fas fa-phone text-primary-500 mr-2"></i> <span id="modalPhone">+234 801 234 5678</span></p>
                            <p><i class="fas fa-map-marker-alt text-primary-500 mr-2"></i> <span id="modalAddress">Lagos, Nigeria</span></p>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold mb-3">Professional Details</h3>
                        <div class="space-y-2">
                            <p><i class="fas fa-university text-primary-500 mr-2"></i> <span id="modalInstitution">Lagos State University</span></p>
                            <p><i class="fas fa-graduation-cap text-primary-500 mr-2"></i> <span id="modalEducation">Ph.D. in Information Management</span></p>
                            <p><i class="fas fa-award text-primary-500 mr-2"></i> <span id="modalSpecialty">Office Technology & Systems</span></p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <h3 class="text-lg font-semibold mb-3">Bio</h3>
                    <p id="modalBio" class="text-dark-600">Dr. John Doe is a renowned expert in Office Technology and Information Management with over 15 years of experience. He has published numerous papers and contributed significantly to the field.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Get member data from PHP
        // const membersData = @json($members->items());
        // Get member data from PHP (update this line)
const membersData = @json($members->items());
let filteredMembers = [...membersData];

        // DOM elements
        const membersContainer = document.getElementById('membersContainer');
        const searchInput = document.getElementById('searchInput');
        const membershipTypeFilter = document.getElementById('membershipTypeFilter');
        const locationFilter = document.getElementById('locationFilter');
        const sortFilter = document.getElementById('sortFilter');
        const applyFiltersBtn = document.getElementById('applyFilters');
        const gridViewBtn = document.getElementById('gridViewBtn');
        const listViewBtn = document.getElementById('listViewBtn');
        const totalMembersSpan = document.getElementById('totalMembers');
        const memberModal = document.getElementById('memberModal');
        const closeModalBtn = document.getElementById('closeModal');
        const modalInstitution = document.getElementById('modalInstitution');

        // Current view state
        let currentView = 'grid'; // 'grid' or 'list'
        // let filteredMembers = [...membersData];

        // Initialize the page
        function initPage() {
            renderMembers(filteredMembers);
            setupEventListeners();
        }

        // Set up event listeners
        // function setupEventListeners() {
        //     // Search functionality
        //     searchInput.addEventListener('input', handleSearch);
            
        //     // Filter functionality
        //     applyFiltersBtn.addEventListener('click', applyFilters);
            
        //     // View toggle functionality
        //     gridViewBtn.addEventListener('click', () => toggleView('grid'));
        //     listViewBtn.addEventListener('click', () => toggleView('list'));
            
        //     // Modal functionality
        //     closeModalBtn.addEventListener('click', closeModal);
        //     window.addEventListener('click', (e) => {
        //         if (e.target === memberModal) {
        //             closeModal();
        //         }
        //     });
        // }

        // // Handle search input
        // function handleSearch() {
        //     const searchTerm = searchInput.value.toLowerCase();
            
        //     if (searchTerm.length === 0) {
        //         filteredMembers = [...membersData];
        //     } else {
        //         filteredMembers = membersData.filter(member => {
        //             const fullName = `${member.title} ${member.first_name} ${member.surname}`.toLowerCase();
        //             const institution = member.institution.toLowerCase();
        //             const specialty = member.specialty.toLowerCase();
                    
        //             return fullName.includes(searchTerm) || 
        //                    institution.includes(searchTerm) || 
        //                    specialty.includes(searchTerm);
        //         });
        //     }
            
        //     renderMembers(filteredMembers);
        // }

        // // Apply filters
        // function applyFilters() {
        //     const typeValue = membershipTypeFilter.value;
        //     const locationValue = locationFilter.value;
        //     const sortValue = sortFilter.value;
            
        //     // Filter by type
        //     if (typeValue !== 'all') {
        //         filteredMembers = membersData.filter(member => member.type.toLowerCase() === typeValue);
        //     } else {
        //         filteredMembers = [...membersData];
        //     }
            
        //     // Filter by location (simplified for demo)
        //     if (locationValue !== 'all') {
        //         filteredMembers = filteredMembers.filter(member => 
        //             member.address.toLowerCase().includes(locationValue)
        //         );
        //     }
            
        //     // Sort results
        //     if (sortValue === 'name-asc') {
        //         filteredMembers.sort((a, b) => {
        //             const nameA = `${a.surname} ${a.first_name}`.toLowerCase();
        //             const nameB = `${b.surname} ${b.first_name}`.toLowerCase();
        //             return nameA.localeCompare(nameB);
        //         });
        //     } else if (sortValue === 'name-desc') {
        //         filteredMembers.sort((a, b) => {
        //             const nameA = `${a.surname} ${a.first_name}`.toLowerCase();
        //             const nameB = `${b.surname} ${b.first_name}`.toLowerCase();
        //             return nameB.localeCompare(nameA);
        //         });
        //     }
            
        //     renderMembers(filteredMembers);
        // }

        function handleSearch() {
    const searchTerm = searchInput.value.toLowerCase();
    
    filteredMembers = membersData.filter(member => {
        const fullName = `${member.title} ${member.first_name} ${member.surname}`.toLowerCase();
        const institution = (member.institution || '').toLowerCase();
        const address = (member.address || '').toLowerCase();
        const type = (member.type || '').toLowerCase();
        
        return fullName.includes(searchTerm) || 
               institution.includes(searchTerm) || 
               address.includes(searchTerm) ||
               type.includes(searchTerm);
    });
    
    renderMembers(filteredMembers);
}


function applyFilters() {
    let results = [...membersData];
    
    // Filter by type
    const typeValue = membershipTypeFilter.value;
    if (typeValue !== 'all') {
        results = results.filter(member => member.type === typeValue);
    }
    
    // Filter by location
    const locationValue = locationFilter.value;
    if (locationValue !== 'all') {
        results = results.filter(member => 
            member.address && member.address.toLowerCase().includes(locationValue.toLowerCase())
        );
    }
    
    // Sort results
    const sortValue = sortFilter.value;
    results.sort((a, b) => {
        if (sortValue === 'newest') {
            return new Date(b.created_at) - new Date(a.created_at);
        } else if (sortValue === 'name-asc') {
            return (a.surname + ' ' + a.first_name).localeCompare(b.surname + ' ' + b.first_name);
        } else if (sortValue === 'name-desc') {
            return (b.surname + ' ' + b.first_name).localeCompare(a.surname + ' ' + a.first_name);
        }
        return 0;
    });
    
    filteredMembers = results;
    renderMembers(results);
}

function setupEventListeners() {
    // Search functionality with debounce
    let searchTimeout;
    searchInput.addEventListener('input', () => {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(handleSearch, 300);
    });
    
    // Filter functionality
    membershipTypeFilter.addEventListener('change', applyFilters);
    locationFilter.addEventListener('change', applyFilters);
    sortFilter.addEventListener('change', applyFilters);
    applyFiltersBtn.addEventListener('click', applyFilters);
    
    // View toggle functionality
    gridViewBtn.addEventListener('click', () => toggleView('grid'));
    listViewBtn.addEventListener('click', () => toggleView('list'));
    
    // Modal functionality
    closeModalBtn.addEventListener('click', closeModal);
    window.addEventListener('click', (e) => {
        if (e.target === memberModal) {
            closeModal();
        }
    });
}
        // Toggle between grid and list view
        function toggleView(view) {
            currentView = view;
            
            if (view === 'grid') {
                membersContainer.classList.remove('list-view');
                membersContainer.classList.add('grid-view');
                gridViewBtn.classList.add('bg-primary-100', 'text-primary-500');
                listViewBtn.classList.remove('bg-primary-100', 'text-primary-500');
            } else {
                membersContainer.classList.remove('grid-view');
                membersContainer.classList.add('list-view');
                listViewBtn.classList.add('bg-primary-100', 'text-primary-500');
                gridViewBtn.classList.remove('bg-primary-100', 'text-primary-500');
            }
            
            renderMembers(filteredMembers);
        }

        // Render members based on current view
        function renderMembers(members) {
            totalMembersSpan.textContent = members.length;
            membersContainer.innerHTML = '';
            
            if (members.length === 0) {
                membersContainer.innerHTML = `
                    <div class="col-span-4 text-center py-12">
                        <div class="bg-accent-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-users text-4xl text-primary-500"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-dark-600 mb-2">No members found</h3>
                        <p class="text-dark-500">We couldn't find any members matching your criteria.</p>
                    </div>
                `;
                return;
            }
            
            members.forEach(member => {
                const memberCard = document.createElement('div');
                memberCard.className = 'member-card bg-white rounded-xl shadow-lg overflow-hidden card-hover animate-on-scroll';
                
                const avatarUrl = `https://ui-avatars.com/api/?name=${encodeURIComponent(member.first_name + ' ' + member.surname)}&background=0A914C&color=fff&size=256`;
                
                const passportUrl = member.passport_path ? `/storage/${member.passport_path}` : avatarUrl;
                memberCard.innerHTML = `
                    <div class="member-image relative">
                        <img src="${passportUrl}" alt="${member.title} ${member.surname} ${member.first_name}" class="w-full h-full object-cover">
                        <div class="absolute top-4 right-4 bg-primary-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            ${member.type}
                        </div>
                    </div>
                    <div class="member-details">
                        <h3 class="text-xl font-semibold text-primary-500 mb-2">${member.title} ${member.surname} ${member.first_name}</h3>
                        <p class="text-gray-600 text-sm mb-3">${member.nationality}</p>
                        
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <span>${member.address}</span>
                        </div>
                        
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="fas fa-phone mr-2"></i>
                            <span>${member.phone}</span>
                        </div>
                        
                        <div class="flex space-x-2 pt-4 border-t border-gray-100">
                            <a href="mailto:${member.user ? member.user.email : ''}" class="flex-1 bg-primary-50 text-primary-500 py-2 rounded-lg text-center hover:bg-primary-100 transition">
                                <i class="fas fa-envelope"></i>
                            </a>
                            <button class="view-details flex-1 bg-primary-50 text-primary-500 py-2 rounded-lg hover:bg-primary-100 transition" data-id="${member.id}">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="flex-1 bg-primary-50 text-primary-500 py-2 rounded-lg hover:bg-primary-100 transition">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                `;
                
                membersContainer.appendChild(memberCard);
            });
            
            // Add event listeners to view details buttons
            document.querySelectorAll('.view-details').forEach(button => {
                button.addEventListener('click', () => {
                    const memberId = parseInt(button.getAttribute('data-id'));
                    showMemberDetails(memberId);
                });
            });
        }

        // Add this helper function before using it
        function stripHtml(html) {
            const temp = document.createElement('div');
            temp.innerHTML = html;
            return temp.textContent || temp.innerText || '';
        }

            
        // Show member details in modal
        // function showMemberDetails(memberId) {
        //     const member = membersData.find(m => m.id === memberId);
        //     if (!member) return;

        //         console.log('Member data:', member);

            
        //     const passportUrl = member.passport_path ? `/storage/${member.passport_path}` : `https://ui-avatars.com/api/?name=${encodeURIComponent(member.first_name + ' ' + member.surname)}&background=0A914C&color=fff&size=200`;
            
        //     // Update modal content
        //     document.getElementById('modalImage').src = passportUrl;
        //     document.getElementById('modalName').textContent = `${member.title} ${member.first_name} ${member.surname}`;
        //     document.getElementById('modalType').textContent = member.type;
        //     document.getElementById('modalEmail').textContent = member.user ? member.user.email : 'N/A';
        //     document.getElementById('modalPhone').textContent = member.phone;
        //     document.getElementById('modalAddress').textContent = member.address;
        //     document.getElementById('modalInstitution').textContent = member.institution ?? 'N/A';
        //     document.getElementById('modalBio').textContent = stripHtml(member.biography) ?? 'N/A';
        //     document.getElementById('modalEducation').textContent = member.qualification ?? 'N/A';
        //     // document.getElementById('modalSpecialty').textContent = member.rank.name ?? 'N/A';
        //     document.getElementById('modalSpecialty').textContent = member.rank?.name ?? 'N/A';
            
            
            
        //     // Show modal
        //     memberModal.style.display = 'flex';
        //     document.body.style.overflow = 'hidden';
        // }

        function showMemberDetails(memberId) {
    const member = membersData.find(m => m.id === memberId);
    if (!member) return;
    
    // Add this debug line to check the member data
    console.log('Member data:', member);
    
    const passportUrl = member.passport_path ? `/storage/${member.passport_path}` : `https://ui-avatars.com/api/?name=${encodeURIComponent(member.first_name + ' ' + member.surname)}&background=0A914C&color=fff&size=200`;
    
    // Update modal content
    document.getElementById('modalImage').src = passportUrl;
    document.getElementById('modalName').textContent = `${member.title} ${member.first_name} ${member.surname}`;
    document.getElementById('modalType').textContent = member.type;
    document.getElementById('modalEmail').textContent = member.user ? member.user.email : 'N/A';
    document.getElementById('modalPhone').textContent = member.phone;
    document.getElementById('modalAddress').textContent = member.address;
    document.getElementById('modalInstitution').textContent = member.institution ?? 'N/A';
    document.getElementById('modalBio').textContent = stripHtml(member.biography) ?? 'N/A';
    
    // Update this line to correctly access the rank name
    document.getElementById('modalSpecialty').textContent = member.rank ? member.rank.name : 'N/A';
    
    // Show modal
    memberModal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}
        // Close modal
        function closeModal() {
            memberModal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Initialize the page when loaded
        document.addEventListener('DOMContentLoaded', initPage);

        // Scroll Animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('fade-in');
                    }, 100);
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