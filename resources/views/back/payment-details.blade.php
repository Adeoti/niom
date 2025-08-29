<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details - NIOTIM</title>
    
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
        
        .payment-detail-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }
        
        .status-badge {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }
        
        .status-completed {
            background-color: #f0f9f4;
            color: #0a914c;
        }
        
        .status-pending {
            background-color: #fef6e6;
            color: #f5a623;
        }
        
        .status-failed {
            background-color: #fee6e6;
            color: #e53e3e;
        }
        
        .detail-row {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .detail-label {
            width: 200px;
            font-weight: 500;
            color: #6b7280;
        }
        
        .detail-value {
            flex: 1;
            font-weight: 500;
            color: #1f2937;
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
            
            .detail-row {
                flex-direction: column;
                gap: 5px;
            }
            
            .detail-label {
                width: 100%;
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
                    <a href="dashboard.html" class="nav-item">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="payment-history.html" class="nav-item">
                        <i class="fas fa-credit-card"></i>
                        <span>Payment History</span>
                    </a>
                    <a href="pending-payments.html" class="nav-item">
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
                    <a href="edit-profile.html" class="nav-item">
                        <i class="fas fa-edit"></i>
                        <span>Edit Profile</span>
                    </a>
                    <a href="settings.html" class="nav-item">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
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
                    <h1 class="text-2xl font-bold text-dark-800">Payment Details</h1>
                    <p class="text-dark-500">Transaction ID: #PAY-4892</p>
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

            <!-- Back Navigation -->
            <div class="mb-6">
                <a href="payment-history.html" class="inline-flex items-center text-primary-500 hover:text-primary-600">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Payment History
                </a>
            </div>

            <!-- Payment Details Card -->
            <div class="payment-detail-card">
                <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4 mb-6">
                    <div>
                        <h2 class="text-xl font-bold text-dark-800">Annual Membership Dues</h2>
                        <p class="text-dark-500">Payment processed on October 15, 2023</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="status-badge status-completed">Completed</span>
                        <span class="text-2xl font-bold text-primary-500">₦15,000</span>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <h3 class="text-lg font-semibold text-dark-800 mb-4">Payment Information</h3>
                        
                        <div class="detail-row">
                            <div class="detail-label">Payment ID</div>
                            <div class="detail-value">#PAY-4892</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Description</div>
                            <div class="detail-value">Annual Membership Dues</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Date & Time</div>
                            <div class="detail-value">October 15, 2023 at 14:30</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Payment Method</div>
                            <div class="detail-value">Credit Card (Ending in 4567)</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Amount</div>
                            <div class="detail-value">₦15,000</div>
                        </div>
                        
                        <div class="detail-row" style="border-bottom: none;">
                            <div class="detail-label">Status</div>
                            <div class="detail-value">
                                <span class="status-badge status-completed">Completed</span>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-dark-800 mb-4">Member Information</h3>
                        
                        <div class="detail-row">
                            <div class="detail-label">Membership ID</div>
                            <div class="detail-value">NIOTIM-2020-0895</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Name</div>
                            <div class="detail-value">John Doe</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Email</div>
                            <div class="detail-value">john.doe@example.com</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Phone</div>
                            <div class="detail-value">+234 801 234 5678</div>
                        </div>
                        
                        <div class="detail-row">
                            <div class="detail-label">Membership Tier</div>
                            <div class="detail-value">Professional Member</div>
                        </div>
                        
                        <div class="detail-row" style="border-bottom: none;">
                            <div class="detail-label">Billing Cycle</div>
                            <div class="detail-value">Annual</div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg mb-6">
                    <h3 class="text-lg font-semibold text-dark-800 mb-2">Additional Information</h3>
                    <p class="text-dark-600">
                        This payment covers your annual membership dues for the period of October 15, 2023 to October 14, 2024. 
                        Your membership benefits will remain active throughout this period.
                    </p>
                </div>
                
                <div class="flex flex-col md:flex-row gap-4 justify-end">
                    <button class="btn-primary text-white px-6 py-3 rounded-lg flex items-center">
                        <i class="fas fa-download mr-2"></i>
                        Download Receipt
                    </button>
                    <button class="border border-primary-500 text-primary-500 px-6 py-3 rounded-lg flex items-center hover:bg-primary-50 transition">
                        <i class="fas fa-print mr-2"></i>
                        Print Receipt
                    </button>
                </div>
            </div>
            
            <!-- Related Actions -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <h2 class="text-xl font-bold text-dark-800 mb-6">Related Actions</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="#" class="flex flex-col items-center justify-center p-4 bg-primary-50 rounded-lg hover:bg-primary-100 transition">
                        <div class="w-12 h-12 rounded-full bg-primary-500 text-white flex items-center justify-center mb-2">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                        <span class="text-sm font-medium text-center">View Invoice</span>
                    </a>
                    
                    <a href="#" class="flex flex-col items-center justify-center p-4 bg-primary-50 rounded-lg hover:bg-primary-100 transition">
                        <div class="w-12 h-12 rounded-full bg-primary-500 text-white flex items-center justify-center mb-2">
                            <i class="fas fa-question-circle"></i>
                        </div>
                        <span class="text-sm font-medium text-center">Get Help</span>
                    </a>
                    
                    <a href="#" class="flex flex-col items-center justify-center p-4 bg-primary-50 rounded-lg hover:bg-primary-100 transition">
                        <div class="w-12 h-12 rounded-full bg-primary-500 text-white flex items-center justify-center mb-2">
                            <i class="fas fa-flag"></i>
                        </div>
                        <span class="text-sm font-medium text-center">Report Issue</span>
                    </a>
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
    </script>
</body>
</html>