<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - NIOTIM</title>
    
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
        
        .event-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .event-card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .status-upcoming {
            background-color: #f0f9f4;
            color: #0a914c;
        }
        
        .status-ongoing {
            background-color: #fef6e6;
            color: #f5a623;
        }
        
        .status-completed {
            background-color: #f3f4f6;
            color: #6b7280;
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
        
        .calendar-day {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            cursor: pointer;
        }
        
        .calendar-day.has-event {
            background-color: #f0f9f4;
            color: #0a914c;
            font-weight: 600;
        }
        
        .calendar-day.selected {
            background-color: #0a914c;
            color: white;
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
                    <a href="events.html" class="nav-item active">
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
                    <h1 class="text-2xl font-bold text-dark-800">Events Calendar</h1>
                    <p class="text-dark-500">Discover and register for upcoming NIOTIM events</p>
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
                            <p class="text-dark-500">Upcoming Events</p>
                            <h3 class="text-2xl font-bold text-primary-500">8</h3>
                        </div>
                        <div class="bg-primary-100 p-3 rounded-lg">
                            <i class="fas fa-calendar-plus text-primary-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-sm text-dark-400 mt-2">Scheduled for the next 30 days</p>
                </div>
                
                <div class="stats-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-dark-500">Registered Events</p>
                            <h3 class="text-2xl font-bold text-primary-500">5</h3>
                        </div>
                        <div class="bg-green-100 p-3 rounded-lg">
                            <i class="fas fa-calendar-check text-green-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-sm text-dark-400 mt-2">Events you've registered for</p>
                </div>
                
                <div class="stats-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-dark-500">This Month</p>
                            <h3 class="text-2xl font-bold text-primary-500">3</h3>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <i class="fas fa-calendar-day text-blue-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-sm text-dark-400 mt-2">Events happening this month</p>
                </div>
                
                <div class="stats-card">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-dark-500">Past Events</p>
                            <h3 class="text-2xl font-bold text-primary-500">12</h3>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-lg">
                            <i class="fas fa-history text-purple-500 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-sm text-dark-400 mt-2">Events you've attended</p>
                </div>
            </section>

            <!-- Filter Bar -->
            <div class="filter-bar flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h3 class="font-semibold text-dark-800">Event Calendar</h3>
                    <p class="text-dark-500 text-sm">Browse and filter upcoming events</p>
                </div>
                
                <div class="flex flex-col md:flex-row gap-3">
                    <div class="relative">
                        <select class="appearance-none bg-gray-50 border border-gray-300 text-dark-700 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8">
                            <option selected>All Categories</option>
                            <option>Conferences</option>
                            <option>Workshops</option>
                            <option>Networking</option>
                            <option>Training</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <select class="appearance-none bg-gray-50 border border-gray-300 text-dark-700 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 pr-8">
                            <option selected>All Status</option>
                            <option>Upcoming</option>
                            <option>Ongoing</option>
                            <option>Completed</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-search text-gray-500"></i>
                        </div>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-dark-700 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5" placeholder="Search events...">
                    </div>
                </div>
            </div>

            <!-- Events Calendar and List -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Calendar Section -->
                <div class="lg:col-span-1 bg-white rounded-xl shadow-md p-6">
                    <h2 class="text-xl font-bold text-dark-800 mb-4">October 2023</h2>
                    <div class="grid grid-cols-7 gap-2 mb-2">
                        <div class="text-center text-xs font-medium text-dark-500">Sun</div>
                        <div class="text-center text-xs font-medium text-dark-500">Mon</div>
                        <div class="text-center text-xs font-medium text-dark-500">Tue</div>
                        <div class="text-center text-xs font-medium text-dark-500">Wed</div>
                        <div class="text-center text-xs font-medium text-dark-500">Thu</div>
                        <div class="text-center text-xs font-medium text-dark-500">Fri</div>
                        <div class="text-center text-xs font-medium text-dark-500">Sat</div>
                    </div>
                    <div class="grid grid-cols-7 gap-2">
                        <div class="calendar-day text-dark-400">24</div>
                        <div class="calendar-day text-dark-400">25</div>
                        <div class="calendar-day text-dark-400">26</div>
                        <div class="calendar-day text-dark-400">27</div>
                        <div class="calendar-day text-dark-400">28</div>
                        <div class="calendar-day text-dark-400">29</div>
                        <div class="calendar-day text-dark-400">30</div>
                        
                        <div class="calendar-day">1</div>
                        <div class="calendar-day">2</div>
                        <div class="calendar-day">3</div>
                        <div class="calendar-day">4</div>
                        <div class="calendar-day">5</div>
                        <div class="calendar-day has-event">6</div>
                        <div class="calendar-day">7</div>
                        
                        <div class="calendar-day">8</div>
                        <div class="calendar-day has-event">9</div>
                        <div class="calendar-day">10</div>
                        <div class="calendar-day">11</div>
                        <div class="calendar-day has-event">12</div>
                        <div class="calendar-day">13</div>
                        <div class="calendar-day">14</div>
                        
                        <div class="calendar-day">15</div>
                        <div class="calendar-day">16</div>
                        <div class="calendar-day has-event">17</div>
                        <div class="calendar-day">18</div>
                        <div class="calendar-day">19</div>
                        <div class="calendar-day">20</div>
                        <div class="calendar-day">21</div>
                        
                        <div class="calendar-day">22</div>
                        <div class="calendar-day">23</div>
                        <div class="calendar-day has-event">24</div>
                        <div class="calendar-day">25</div>
                        <div class="calendar-day">26</div>
                        <div class="calendar-day">27</div>
                        <div class="calendar-day">28</div>
                        
                        <div class="calendar-day">29</div>
                        <div class="calendar-day">30</div>
                        <div class="calendar-day has-event">31</div>
                        <div class="calendar-day text-dark-400">1</div>
                        <div class="calendar-day text-dark-400">2</div>
                        <div class="calendar-day text-dark-400">3</div>
                        <div class="calendar-day text-dark-400">4</div>
                    </div>
                    
                    <div class="mt-6">
                        <h3 class="font-semibold text-dark-700 mb-3">Event Legend</h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-primary-500 mr-2"></div>
                                <span class="text-sm text-dark-600">Conference</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-secondary-500 mr-2"></div>
                                <span class="text-sm text-dark-600">Workshop</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full bg-accent-500 mr-2"></div>
                                <span class="text-sm text-dark-600">Networking</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Events List -->
                <div class="lg:col-span-2 space-y-4">
                    <!-- Event Card 1 -->
                    <div class="event-card">
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="md:w-1/4">
                                <div class="bg-primary-50 rounded-lg p-3 text-center">
                                    <p class="text-primary-500 font-bold text-lg">12</p>
                                    <p class="text-primary-500 font-medium">OCT</p>
                                    <p class="text-dark-500 text-sm">2023</p>
                                    <div class="mt-2">
                                        <span class="status-badge status-upcoming">Upcoming</span>
                                    </div>
                                </div>
                            </div>
                            <div class="md:w-2/4">
                                <h3 class="font-bold text-lg text-dark-800 mb-2">Annual Tech Conference 2023</h3>
                                <p class="text-dark-600 mb-2">Join industry leaders for a day of innovation, networking, and insights into the future of technology.</p>
                                <div class="flex flex-wrap items-center gap-3 text-sm text-dark-500">
                                    <span><i class="fas fa-clock mr-1"></i> 9:00 AM - 5:00 PM</span>
                                    <span><i class="fas fa-map-marker-alt mr-1"></i> Convention Center</span>
                                </div>
                            </div>
                            <div class="md:w-1/4 flex flex-col justify-between">
                                <div class="mb-4">
                                    <p class="text-2xl font-bold text-dark-800">₦25,000</p>
                                    <p class="text-dark-500 text-sm">Member price</p>
                                </div>
                                <button class="btn-primary text-white px-4 py-2 rounded-lg font-medium">
                                    Register Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Event Card 2 -->
                    <div class="event-card">
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="md:w-1/4">
                                <div class="bg-green-50 rounded-lg p-3 text-center">
                                    <p class="text-green-500 font-bold text-lg">17</p>
                                    <p class="text-green-500 font-medium">OCT</p>
                                    <p class="text-dark-500 text-sm">2023</p>
                                    <div class="mt-2">
                                        <span class="status-badge status-upcoming">Upcoming</span>
                                    </div>
                                </div>
                            </div>
                            <div class="md:w-2/4">
                                <h3 class="font-bold text-lg text-dark-800 mb-2">Digital Marketing Workshop</h3>
                                <p class="text-dark-600 mb-2">Learn the latest strategies in digital marketing, SEO, and social media advertising from experts.</p>
                                <div class="flex flex-wrap items-center gap-3 text-sm text-dark-500">
                                    <span><i class="fas fa-clock mr-1"></i> 10:00 AM - 4:00 PM</span>
                                    <span><i class="fas fa-map-marker-alt mr-1"></i> Training Room B</span>
                                </div>
                            </div>
                            <div class="md:w-1/4 flex flex-col justify-between">
                                <div class="mb-4">
                                    <p class="text-2xl font-bold text-dark-800">₦15,000</p>
                                    <p class="text-dark-500 text-sm">Member price</p>
                                </div>
                                <button class="btn-primary text-white px-4 py-2 rounded-lg font-medium">
                                    Register Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Event Card 3 -->
                    <div class="event-card">
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="md:w-1/4">
                                <div class="bg-blue-50 rounded-lg p-3 text-center">
                                    <p class="text-blue-500 font-bold text-lg">24</p>
                                    <p class="text-blue-500 font-medium">OCT</p>
                                    <p class="text-dark-500 text-sm">2023</p>
                                    <div class="mt-2">
                                        <span class="status-badge status-upcoming">Upcoming</span>
                                    </div>
                                </div>
                            </div>
                            <div class="md:w-2/4">
                                <h3 class="font-bold text-lg text-dark-800 mb-2">Networking Dinner with Industry Leaders</h3>
                                <p class="text-dark-600 mb-2">An exclusive evening of networking with top executives and industry pioneers.</p>
                                <div class="flex flex-wrap items-center gap-3 text-sm text-dark-500">
                                    <span><i class="fas fa-clock mr-1"></i> 7:00 PM - 10:00 PM</span>
                                    <span><i class="fas fa-map-marker-alt mr-1"></i> Grand Hotel</span>
                                </div>
                            </div>
                            <div class="md:w-1/4 flex flex-col justify-between">
                                <div class="mb-4">
                                    <p class="text-2xl font-bold text-dark-800">₦10,000</p>
                                    <p class="text-dark-500 text-sm">Member price</p>
                                </div>
                                <button class="btn-primary text-white px-4 py-2 rounded-lg font-medium">
                                    Register Now
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Event Card 4 -->
                    <div class="event-card">
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="md:w-1/4">
                                <div class="bg-purple-50 rounded-lg p-3 text-center">
                                    <p class="text-purple-500 font-bold text-lg">6</p>
                                    <p class="text-purple-500 font-medium">OCT</p>
                                    <p class="text-dark-500 text-sm">2023</p>
                                    <div class="mt-2">
                                        <span class="status-badge status-completed">Completed</span>
                                    </div>
                                </div>
                            </div>
                            <div class="md:w-2/4">
                                <h3 class="font-bold text-lg text-dark-800 mb-2">Project Management Certification</h3>
                                <p class="text-dark-600 mb-2">A comprehensive 2-day workshop on advanced project management techniques and certification prep.</p>
                                <div class="flex flex-wrap items-center gap-3 text-sm text-dark-500">
                                    <span><i class="fas fa-clock mr-1"></i> 9:00 AM - 5:00 PM</span>
                                    <span><i class="fas fa-map-marker-alt mr-1"></i> Training Center</span>
                                </div>
                            </div>
                            <div class="md:w-1/4 flex flex-col justify-between">
                                <div class="mb-4">
                                    <p class="text-2xl font-bold text-dark-800">₦35,000</p>
                                    <p class="text-dark-500 text-sm">Member price</p>
                                </div>
                                <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium cursor-not-allowed">
                                    Completed
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="mt-8 flex items-center justify-between">
                <div>
                    <p class="text-sm text-dark-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">8</span> results
                    </p>
                </div>
                <div class="flex space-x-2">
                    <a href="#" class="flex items-center px-4 py-2 text-sm font-medium text-dark-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                        Previous
                    </a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-white bg-primary-500 border border-primary-500 rounded-lg hover:bg-primary-600">
                        1
                    </a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-dark-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                        2
                    </a>
                    <a href="#" class="px-4 py-2 text-sm font-medium text-dark-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                        Next
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

        // Event registration button handlers
        const registerButtons = document.querySelectorAll('.btn-primary');
        registerButtons.forEach(button => {
            button.addEventListener('click', function() {
                if (!this.classList.contains('cursor-not-allowed')) {
                    const eventCard = this.closest('.event-card');
                    const eventTitle = eventCard.querySelector('h3').textContent;
                    alert(`Registering for: ${eventTitle}`);
                    // In a real application, this would open a registration modal or redirect to a registration page
                }
            });
        });

        // Calendar day selection
        const calendarDays = document.querySelectorAll('.calendar-day:not(.text-dark-400)');
        calendarDays.forEach(day => {
            day.addEventListener('click', function() {
                calendarDays.forEach(d => d.classList.remove('selected'));
                this.classList.add('selected');
                
                // In a real application, this would filter events for the selected date
                const date = this.textContent;
                alert(`Showing events for October ${date}, 2023`);
            });
        });
    </script>
</body>
</html>