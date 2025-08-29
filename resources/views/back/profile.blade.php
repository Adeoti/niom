<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - NIOTIM</title>
    
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
        
        .profile-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .profile-card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
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
        
        .tab-button {
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .tab-button.active {
            background-color: #0a914c;
            color: white;
        }
        
        .tab-button:hover:not(.active) {
            background-color: #f0f9f4;
            color: #0a914c;
        }
        
        .form-input {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 10px 14px;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #0a914c;
            box-shadow: 0 0 0 3px rgba(10, 145, 76, 0.1);
        }
        
        .avatar-upload {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }
        
        .avatar-upload-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .avatar-upload:hover .avatar-upload-overlay {
            opacity: 1;
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
                    <a href="profile.html" class="nav-item active">
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
                    <h1 class="text-2xl font-bold text-dark-800">My Profile</h1>
                    <p class="text-dark-500">View and manage your personal information</p>
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

            <!-- Profile Overview -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Profile Card -->
                <div class="lg:col-span-1">
                    <div class="profile-card text-center">
                        <div class="flex justify-center mb-4">
                            <div class="avatar-upload">
                                <div class="w-32 h-32 rounded-full bg-accent-500 flex items-center justify-center text-4xl text-primary-500 font-bold">
                                    JD
                                </div>
                                <div class="avatar-upload-overlay">
                                    <i class="fas fa-camera text-white text-xl"></i>
                                </div>
                            </div>
                        </div>
                        <h2 class="text-xl font-bold text-dark-800">John Doe</h2>
                        <p class="text-dark-500 mb-2">Professional Member</p>
                        <p class="text-primary-500 font-medium mb-4">Member since: Jan 2020</p>
                        
                        <div class="flex justify-center space-x-3 mb-6">
                            <button class="bg-primary-50 text-primary-500 p-3 rounded-lg hover:bg-primary-100 transition">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button class="bg-primary-50 text-primary-500 p-3 rounded-lg hover:bg-primary-100 transition">
                                <i class="fab fa-twitter"></i>
                            </button>
                            <button class="bg-primary-50 text-primary-500 p-3 rounded-lg hover:bg-primary-100 transition">
                                <i class="fab fa-linkedin-in"></i>
                            </button>
                        </div>
                        
                        <button class="btn-primary text-white w-full py-3 rounded-lg font-medium">
                            <i class="fas fa-download mr-2"></i> Download Profile
                        </button>
                    </div>
                    
                    <!-- Verification Status -->
                    <div class="profile-card">
                        <h3 class="font-semibold text-dark-800 mb-4">Verification Status</h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mr-3">
                                        <i class="fas fa-check text-green-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-dark-700">Email Address</p>
                                        <p class="text-sm text-dark-500">Verified</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mr-3">
                                        <i class="fas fa-check text-green-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-dark-700">Phone Number</p>
                                        <p class="text-sm text-dark-500">Verified</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center mr-3">
                                        <i class="fas fa-exclamation text-yellow-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-dark-700">Identity</p>
                                        <p class="text-sm text-dark-500">Pending Review</p>
                                    </div>
                                </div>
                                <button class="text-primary-500 hover:underline text-sm">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Profile Details -->
                <div class="lg:col-span-2">
                    <!-- Tabs -->
                    <div class="flex space-x-2 mb-6 bg-white rounded-xl shadow-md p-2">
                        <div class="tab-button active">Personal Information</div>
                        <div class="tab-button">Professional Details</div>
                        <div class="tab-button">Account Settings</div>
                        <div class="tab-button">Preferences</div>
                    </div>
                    
                    <!-- Personal Information Form -->
                    <div class="profile-card">
                        <h3 class="font-semibold text-dark-800 mb-6">Personal Information</h3>
                        
                        <form>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label class="block text-dark-700 mb-2">First Name</label>
                                    <input type="text" class="form-input w-full" value="John">
                                </div>
                                <div>
                                    <label class="block text-dark-700 mb-2">Last Name</label>
                                    <input type="text" class="form-input w-full" value="Doe">
                                </div>
                                
                                <div>
                                    <label class="block text-dark-700 mb-2">Email Address</label>
                                    <input type="email" class="form-input w-full" value="john.doe@example.com">
                                </div>
                                <div>
                                    <label class="block text-dark-700 mb-2">Phone Number</label>
                                    <input type="tel" class="form-input w-full" value="+234 812 345 6789">
                                </div>
                                
                                <div>
                                    <label class="block text-dark-700 mb-2">Date of Birth</label>
                                    <input type="date" class="form-input w-full" value="1985-06-15">
                                </div>
                                <div>
                                    <label class="block text-dark-700 mb-2">Gender</label>
                                    <select class="form-input w-full">
                                        <option selected>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                
                                <div class="md:col-span-2">
                                    <label class="block text-dark-700 mb-2">Residential Address</label>
                                    <input type="text" class="form-input w-full" value="123 Victoria Island, Lagos">
                                </div>
                                
                                <div>
                                    <label class="block text-dark-700 mb-2">City</label>
                                    <input type="text" class="form-input w-full" value="Lagos">
                                </div>
                                <div>
                                    <label class="block text-dark-700 mb-2">State</label>
                                    <select class="form-input w-full">
                                        <option selected>Lagos</option>
                                        <option>Abuja</option>
                                        <option>Rivers</option>
                                        <option>Kano</option>
                                        <option>Oyo</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="button" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-medium mr-3">Cancel</button>
                                <button type="submit" class="btn-primary text-white px-6 py-2 rounded-lg font-medium">Save Changes</button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Additional Information -->
                    <div class="profile-card">
                        <h3 class="font-semibold text-dark-800 mb-6">Additional Information</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-medium text-dark-700 mb-3">Emergency Contact</h4>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="font-medium">Jane Doe</p>
                                    <p class="text-dark-600">Spouse</p>
                                    <p class="text-dark-600">+234 803 456 7890</p>
                                </div>
                            </div>
                            
                            <div>
                                <h4 class="font-medium text-dark-700 mb-3">Membership Details</h4>
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <p class="font-medium">Professional Membership</p>
                                    <p class="text-dark-600">Member ID: NTM-2020-0895</p>
                                    <p class="text-dark-600">Expires: Dec 2024</p>
                                </div>
                            </div>
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

        // Tab switching functionality
        const tabButtons = document.querySelectorAll('.tab-button');
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                tabButtons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                // In a real application, this would switch the tab content
                const tabName = this.textContent;
                alert(`Switching to ${tabName} tab`);
            });
        });

        // Form submission handling
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Profile updated successfully!');
            });
        }
    </script>
</body>
</html>