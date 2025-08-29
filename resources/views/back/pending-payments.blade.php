<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Payments - NIOTIM</title>
    
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
        
        .payment-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .payment-card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-pending {
            background-color: #fef6e6;
            color: #f5a623;
        }
        
        .status-overdue {
            background-color: #fee6e6;
            color: #e53e3e;
        }
        
        .filter-bar {
            background: white;
            border-radius: 12px;
            padding: 15px 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
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
        
        .progress-bar {
            height: 8px;
            border-radius: 4px;
            background-color: #e5e7eb;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            background-color: #0a914c;
            border-radius: 4px;
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
                    <a href="dashboard.html" class="nav-item">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="payment-history.html" class="nav-item">
                        <i class="fas fa-credit-card"></i>
                        <span>Payment History</span>
                    </a>
                    <a href="pending-payments.html" class="nav-item active">
                        <i class="fas fa-clock"></i>
                        <span>Pending Payments</span>
                    </a>
                    <a href="events.html" class="nav-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Events</span>
                    </a>
                    <a href="profile.html" class="nav-item">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                   
                </nav>
                
                <div class="mt-auto pt-4 border-t border-primary-700">
                    <a href="#" class="nav-item text-accent-300 hover:text-white">
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
                    <h1 class="text-2xl font-bold text-dark-800">Pending Payments</h1>
                    <p class="text-dark-500">Review and complete your outstanding payments</p>
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
                            <p class="text-dark-500">Pending Payments</p>
                            <h3 class="text-2xl font-bold text-primary-500">5</h3>
                        </div>
                        <div class="bg-primary-100 p-3 rounded-lg">
                            <i class="fas fa-clock text-primary-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-sm text-dark-400 mt-2">Awaiting completion</p>
                </div>
                
                <div class="stats-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-dark-500">Total Due</p>
                            <h3 class="text-2xl font-bold text-primary-500">₦62,500</h3>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-lg">
                            <i class="fas fa-exclamation-triangle text-yellow-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-sm text-dark-400 mt-2">Outstanding balance</p>
                </div>
                
                <div class="stats-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-dark-500">Overdue</p>
                            <h3 class="text-2xl font-bold text-primary-500">2</h3>
                        </div>
                        <div class="bg-red-100 p-3 rounded-lg">
                            <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-sm text-dark-400 mt-2">Past due date</p>
                </div>
                
                <div class="stats-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-dark-500">Due Soon</p>
                            <h3 class="text-2xl font-bold text-primary-500">3</h3>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <i class="fas fa-hourglass-half text-blue-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-sm text-dark-400 mt-2">Within 7 days</p>
                </div>
            </section>

            <!-- Filter Bar -->
            <div class="filter-bar flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h3 class="font-semibold text-dark-800">Pending Payments</h3>
                    <p class="text-dark-500 text-sm">Filter and manage your outstanding payments</p>
                </div>
                
                <div class="flex flex-col md:flex-row gap-3">
                    <div class="relative">
                        <select class="appearance-none bg-gray-50 border border-gray-300 text-dark-700 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8">
                            <option selected>All Types</option>
                            <option>Membership Dues</option>
                            <option>Event Registration</option>
                            <option>Workshop Fees</option>
                            <option>Certification</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <select class="appearance-none bg-gray-50 border border-gray-300 text-dark-700 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8">
                            <option selected>All Status</option>
                            <option>Pending</option>
                            <option>Overdue</option>
                            <option>Due Soon</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-search text-gray-500"></i>
                        </div>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-dark-700 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5" placeholder="Search payments...">
                    </div>
                </div>
            </div>

            <!-- Pending Payments List -->
            <div class="space-y-4">
                <!-- Payment Card 1 -->
                <div class="payment-card">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-bold text-lg text-dark-800">Annual Membership Dues</h3>
                                <span class="status-badge status-pending">Due in 3 days</span>
                            </div>
                            <p class="text-dark-600 mb-2">Renew your professional membership for 2024</p>
                            <div class="flex flex-wrap items-center gap-4 text-sm text-dark-500">
                                <span><i class="fas fa-calendar-alt mr-1"></i> Due: Oct 28, 2023</span>
                                <span><i class="fas fa-tag mr-1"></i> Membership</span>
                                <span><i class="fas fa-file-invoice mr-1"></i> #INV-2023-7890</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-end">
                            <p class="text-2xl font-bold text-dark-800 mb-2">₦15,000</p>
                            <button class="btn-primary text-white px-6 py-2 rounded-lg font-medium">
                                Pay Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Payment Card 2 -->
                <div class="payment-card">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-bold text-lg text-dark-800">Annual Conference Registration</h3>
                                <span class="status-badge status-overdue">Overdue</span>
                            </div>
                            <p class="text-dark-600 mb-2">NIOTIM Annual Conference 2023 - Early Bird Registration</p>
                            <div class="flex flex-wrap items-center gap-4 text-sm text-dark-500">
                                <span><i class="fas fa-calendar-alt mr-1"></i> Due: Oct 15, 2023</span>
                                <span><i class="fas fa-tag mr-1"></i> Event</span>
                                <span><i class="fas fa-file-invoice mr-1"></i> #INV-2023-7821</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-end">
                            <p class="text-2xl font-bold text-dark-800 mb-2">₦25,000</p>
                            <button class="btn-primary text-white px-6 py-2 rounded-lg font-medium">
                                Pay Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Payment Card 3 -->
                <div class="payment-card">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-bold text-lg text-dark-800">Professional Certification Fee</h3>
                                <span class="status-badge status-pending">Due in 7 days</span>
                            </div>
                            <p class="text-dark-600 mb-2">Advanced Project Management Certification Program</p>
                            <div class="flex flex-wrap items-center gap-4 text-sm text-dark-500">
                                <span><i class="fas fa-calendar-alt mr-1"></i> Due: Nov 2, 2023</span>
                                <span><i class="fas fa-tag mr-1"></i> Certification</span>
                                <span><i class="fas fa-file-invoice mr-1"></i> #INV-2023-7954</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-end">
                            <p class="text-2xl font-bold text-dark-800 mb-2">₦45,000</p>
                            <button class="btn-primary text-white px-6 py-2 rounded-lg font-medium">
                                Pay Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Payment Card 4 -->
                <div class="payment-card">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-bold text-lg text-dark-800">Q4 Workshop Series</h3>
                                <span class="status-badge status-overdue">Overdue</span>
                            </div>
                            <p class="text-dark-600 mb-2">Digital Transformation Strategies Workshop</p>
                            <div class="flex flex-wrap items-center gap-4 text-sm text-dark-500">
                                <span><i class="fas fa-calendar-alt mr-1"></i> Due: Oct 10, 2023</span>
                                <span><i class="fas fa-tag mr-1"></i> Workshop</span>
                                <span><i class="fas fa-file-invoice mr-1"></i> #INV-2023-7765</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-end">
                            <p class="text-2xl font-bold text-dark-800 mb-2">₦7,500</p>
                            <button class="btn-primary text-white px-6 py-2 rounded-lg font-medium">
                                Pay Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Payment Card 5 -->
                <div class="payment-card">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-bold text-lg text-dark-800">Networking Dinner Ticket</h3>
                                <span class="status-badge status-pending">Due in 5 days</span>
                            </div>
                            <p class="text-dark-600 mb-2">Quarterly Networking Dinner with Industry Leaders</p>
                            <div class="flex flex-wrap items-center gap-4 text-sm text-dark-500">
                                <span><i class="fas fa-calendar-alt mr-1"></i> Due: Oct 30, 2023</span>
                                <span><i class="fas fa-tag mr-1"></i> Event</span>
                                <span><i class="fas fa-file-invoice mr-1"></i> #INV-2023-7912</span>
                            </div>
                        </div>
                        <div class="flex flex-col items-end">
                            <p class="text-2xl font-bold text-dark-800 mb-2">₦10,000</p>
                            <button class="btn-primary text-white px-6 py-2 rounded-lg font-medium">
                                Pay Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Payment Summary -->
            <div class="mt-8 bg-white rounded-xl shadow-md p-6">
                <h2 class="text-xl font-bold text-dark-800 mb-4">Payment Summary</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h3 class="font-semibold text-dark-700 mb-3">Payment Distribution</h3>
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-dark-600">Membership Dues</span>
                                    <span class="text-dark-800 font-medium">₦15,000</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 24%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-dark-600">Event Registrations</span>
                                    <span class="text-dark-800 font-medium">₦35,000</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 56%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-dark-600">Certification Fees</span>
                                    <span class="text-dark-800 font-medium">₦45,000</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 72%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-dark-600">Workshop Fees</span>
                                    <span class="text-dark-800 font-medium">₦7,500</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 12%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="font-semibold text-dark-700 mb-3">Quick Actions</h3>
                        <div class="space-y-3">
                            <button class="w-full flex items-center justify-center px-4 py-3 bg-primary-50 text-primary-500 rounded-lg hover:bg-primary-100 transition">
                                <i class="fas fa-credit-card mr-2"></i>
                                <span>Pay All Outstanding</span>
                            </button>
                            <button class="w-full flex items-center justify-center px-4 py-3 bg-primary-50 text-primary-500 rounded-lg hover:bg-primary-100 transition">
                                <i class="fas fa-file-invoice-dollar mr-2"></i>
                                <span>Request Payment Plan</span>
                            </button>
                            <button class="w-full flex items-center justify-center px-4 py-3 bg-primary-50 text-primary-500 rounded-lg hover:bg-primary-100 transition">
                                <i class="fas fa-download mr-2"></i>
                                <span>Download Statements</span>
                            </button>
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
                e.preventDefault();
                navItems.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                
                // Close sidebar on mobile after selection
                if (window.innerWidth < 1024) {
                    document.getElementById('sidebar').classList.remove('open');
                }
            });
        });

        // Payment button handlers
        const payButtons = document.querySelectorAll('.btn-primary');
        payButtons.forEach(button => {
            button.addEventListener('click', function() {
                const paymentCard = this.closest('.payment-card');
                const paymentTitle = paymentCard.querySelector('h3').textContent;
                alert(`Initiating payment for: ${paymentTitle}`);
                // In a real application, this would open a payment modal or redirect to a payment page
            });
        });
    </script>
</body>
</html>