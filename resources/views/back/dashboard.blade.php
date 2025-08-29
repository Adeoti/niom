<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard - NIOTIM</title>
    
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
        
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: 280px;
            background: linear-gradient(to bottom, #044223 0%, #087d42 100%);
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            z-index: 100;
        }
        
        .main-content {
            flex: 1;
            padding: 20px;
            transition: all 0.3s ease;
        }
        
        .nav-item {
            padding: 14px 20px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }
        
        .nav-item:hover, .nav-item.active {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #d2d925;
        }
        
        .nav-item i {
            width: 24px;
            margin-right: 12px;
        }
        
        .stats-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
        }
        
        .event-item {
            border-left: 4px solid #0a914c;
            padding: 12px 15px;
            background: white;
            margin-bottom: 10px;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }
        
        .payment-item {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            background: white;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
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
        
        .hamburger {
            display: none;
            cursor: pointer;
        }
        
        .profile-header {
            background: linear-gradient(to right, #044223 0%, #087d42 100%);
            border-radius: 12px;
            color: white;
        }
        
        @media (max-width: 1024px) {
            .sidebar {
                position: fixed;
                left: -280px;
                height: 100%;
            }
            
            .sidebar.open {
                left: 0;
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .hamburger {
                display: block;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar Navigation -->
        <aside class="sidebar" id="sidebar">
            <div class="p-5">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-12 h-12 rounded-full bg-white text-primary-500 flex items-center justify-center font-bold text-xl shadow-md">N</div>
                    <div>
                        <h2 class="font-semibold">NIOTIM</h2>
                        <p class="text-accent-500 text-sm">Member Portal</p>
                    </div>
                </div>
                
                <div class="mb-8">
                    <div class="flex items-center space-x-3 bg-primary-800 p-3 rounded-lg">
                        <div class="w-14 h-14 rounded-full bg-accent-500 flex items-center justify-center">
                            <span class="text-primary-500 font-bold text-xl">JD</span>
                        </div>
                        <div>
                            <h3 class="font-semibold">John Doe</h3>
                            <p class="text-accent-300 text-sm">Professional Member</p>
                        </div>
                    </div>
                </div>
                
                <nav class="flex-1">
                    <a href="#" class="nav-item active">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('payment.history') }}" class="nav-item">
                        <i class="fas fa-credit-card"></i>
                        <span>Payment History</span>
                    </a>
                    <a href="#" class="nav-item">
                        <i class="fas fa-clock"></i>
                        <span>Pending Payments</span>
                    </a>
                    <a href="#" class="nav-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Events</span>
                    </a>
                    <a href="#" class="nav-item">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                    
                </nav>
                
                <div class="mt-auto pt-4 border-t border-primary-700">
                    <a href="{{ route('logout') }}" class="nav-item text-accent-300 hover:text-white">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <!-- Header -->
            <header class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-dark-800">Member Dashboard</h1>
                    <p class="text-dark-500">Welcome back, John! Here's your activity summary.</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <i class="fas fa-bell text-dark-400 text-xl"></i>
                        <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
                    </div>
                    <div class="hamburger" id="hamburger">
                        <i class="fas fa-bars text-2xl text-dark-500"></i>
                    </div>
                </div>
            </header>

            <!-- Stats Section -->
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stats-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-dark-500">Membership Status</p>
                            <h3 class="text-2xl font-bold text-primary-500">Active</h3>
                        </div>
                        <div class="bg-primary-100 p-3 rounded-lg">
                            <i class="fas fa-check-circle text-primary-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-sm text-dark-400 mt-2">Renewal: 12/12/2023</p>
                </div>
                
                <div class="stats-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-dark-500">Pending Payments</p>
                            <h3 class="text-2xl font-bold text-primary-500">₦15,000</h3>
                        </div>
                        <div class="bg-red-100 p-3 rounded-lg">
                            <i class="fas fa-exclamation-triangle text-red-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-sm text-dark-400 mt-2">1 invoice pending</p>
                </div>
                
                <div class="stats-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-dark-500">Upcoming Events</p>
                            <h3 class="text-2xl font-bold text-primary-500">3</h3>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <i class="fas fa-calendar-alt text-blue-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-sm text-dark-400 mt-2">Next: Conference 2023</p>
                </div>
                
                <div class="stats-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-dark-500">Member Since</p>
                            <h3 class="text-2xl font-bold text-primary-500">2019</h3>
                        </div>
                        <div class="bg-green-100 p-3 rounded-lg">
                            <i class="fas fa-award text-green-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-sm text-dark-400 mt-2">4 years of membership</p>
                </div>
            </section>

            <!-- Two Column Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Left Column -->
                <div>
                    <!-- Upcoming Events -->
                    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold text-dark-800">Upcoming Events</h2>
                            <a href="#" class="text-primary-500 text-sm">View All</a>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="event-item">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-semibold">Annual Conference 2023</h3>
                                        <p class="text-dark-500 text-sm">Lagos Convention Center</p>
                                    </div>
                                    <span class="bg-primary-100 text-primary-500 text-xs px-2 py-1 rounded-full">Nov 15</span>
                                </div>
                                <div class="flex items-center text-dark-400 text-sm mt-2">
                                    <i class="far fa-clock mr-2"></i>
                                    <span>9:00 AM - 5:00 PM</span>
                                </div>
                            </div>
                            
                            <div class="event-item">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-semibold">Workshop: Digital Transformation</h3>
                                        <p class="text-dark-500 text-sm">Virtual Event</p>
                                    </div>
                                    <span class="bg-primary-100 text-primary-500 text-xs px-2 py-1 rounded-full">Nov 22</span>
                                </div>
                                <div class="flex items-center text-dark-400 text-sm mt-2">
                                    <i class="far fa-clock mr-2"></i>
                                    <span>2:00 PM - 4:00 PM</span>
                                </div>
                            </div>
                            
                            <div class="event-item">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="font-semibold">Networking Mixer</h3>
                                        <p class="text-dark-500 text-sm">NIOTIM Headquarters</p>
                                    </div>
                                    <span class="bg-primary-100 text-primary-500 text-xs px-2 py-1 rounded-full">Dec 5</span>
                                </div>
                                <div class="flex items-center text-dark-400 text-sm mt-2">
                                    <i class="far fa-clock mr-2"></i>
                                    <span>6:00 PM - 8:00 PM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pending Payments -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold text-dark-800">Pending Payments</h2>
                            <a href="#" class="text-primary-500 text-sm">View All</a>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="payment-item">
                                <div>
                                    <h3 class="font-semibold">Annual Membership Dues</h3>
                                    <p class="text-dark-500 text-sm">Due: Nov 30, 2023</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-red-500">₦15,000</p>
                                    <button class="btn-primary text-white text-xs px-3 py-1 rounded-full mt-2">Pay Now</button>
                                </div>
                            </div>
                            
                            <div class="payment-item">
                                <div>
                                    <h3 class="font-semibold">Conference Registration</h3>
                                    <p class="text-dark-500 text-sm">Due: Dec 5, 2023</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-dark-500">₦7,500</p>
                                    <button class="btn-primary text-white text-xs px-3 py-1 rounded-full mt-2">Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column -->
                <div>
                    <!-- Profile Summary -->
                    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-bold text-dark-800">Profile Summary</h2>
                            <a href="#" class="text-primary-500 text-sm">Edit Profile</a>
                        </div>
                        
                        <div class="profile-header p-4 rounded-lg mb-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-16 h-16 rounded-full bg-white flex items-center justify-center">
                                    <span class="text-primary-500 font-bold text-xl">JD</span>
                                </div>
                                <div>
                                    <h3 class="font-semibold">John Doe</h3>
                                    <p class="text-accent-300">Professional Member</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-dark-500 text-sm">Email</p>
                                <p class="font-medium">john.doe@example.com</p>
                            </div>
                            
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-dark-500 text-sm">Phone</p>
                                <p class="font-medium">+234 801 234 5678</p>
                            </div>
                            
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-dark-500 text-sm">Membership ID</p>
                                <p class="font-medium">NIOTIM-2020-0895</p>
                            </div>
                            
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-dark-500 text-sm">Member Since</p>
                                <p class="font-medium">January 2019</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Actions -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h2 class="text-xl font-bold text-dark-800 mb-6">Quick Actions</h2>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <a href="#" class="flex flex-col items-center justify-center p-4 bg-primary-50 rounded-lg hover:bg-primary-100 transition">
                                <div class="w-12 h-12 rounded-full bg-primary-500 text-white flex items-center justify-center mb-2">
                                    <i class="fas fa-calendar-plus"></i>
                                </div>
                                <span class="text-sm font-medium">Register for Event</span>
                            </a>
                            
                            <a href="#" class="flex flex-col items-center justify-center p-4 bg-primary-50 rounded-lg hover:bg-primary-100 transition">
                                <div class="w-12 h-12 rounded-full bg-primary-500 text-white flex items-center justify-center mb-2">
                                    <i class="fas fa-file-invoice"></i>
                                </div>
                                <span class="text-sm font-medium">View Invoices</span>
                            </a>
                            
                            <a href="#" class="flex flex-col items-center justify-center p-4 bg-primary-50 rounded-lg hover:bg-primary-100 transition">
                                <div class="w-12 h-12 rounded-full bg-primary-500 text-white flex items-center justify-center mb-2">
                                    <i class="fas fa-download"></i>
                                </div>
                                <span class="text-sm font-medium">Download ID Card</span>
                            </a>
                            
                            <a href="#" class="flex flex-col items-center justify-center p-4 bg-primary-50 rounded-lg hover:bg-primary-100 transition">
                                <div class="w-12 h-12 rounded-full bg-primary-500 text-white flex items-center justify-center mb-2">
                                    <i class="fas fa-users"></i>
                                </div>
                                <span class="text-sm font-medium">Member Directory</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Footer -->
    <footer class="bg-white shadow-md mt-8 py-4">
        <div class="container mx-auto px-4 text-center">
            <p class="text-dark-500 text-sm font-medium">
                Designed by 
                <span class="text-primary-500 font-semibold">
                    <a href="https://wa.link/1tz78w">Paramount Computer</a>
                </span>
            </p>
        </div>
    </footer>
        </main>
        
    </div>

    <script>
        // Toggle sidebar on mobile
        document.getElementById('hamburger').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const hamburger = document.getElementById('hamburger');
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickInsideHamburger = hamburger.contains(event.target);
            
            if (!isClickInsideSidebar && !isClickInsideHamburger && window.innerWidth < 1024) {
                sidebar.classList.remove('open');
            }
        });

        // Active nav item handling
        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach(item => {
            item.addEventListener('click', function(e) {
                // e.preventDefault();
                navItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                
                // Close sidebar on mobile after selection
                if (window.innerWidth < 1024) {
                    document.getElementById('sidebar').classList.remove('open');
                }
            });
        });

        // Simulate loading animation for stats cards
        const statsCards = document.querySelectorAll('.stats-card');
        statsCards.forEach((card, index) => {
            setTimeout(() => {
                card.style.opacity = 1;
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    </script>
    
   
</body>
</html>