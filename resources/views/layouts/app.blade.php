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


        .toast {
    padding: 12px 16px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    display: flex;
    align-items: center;
    animation: slideIn 0.3s ease-out forwards;
    position: relative;
    overflow: hidden;
}

.toast.success {
    background-color: #f0f9f4;
    border-left: 4px solid #0a914c;
    color: #0a914c;
}

.toast.error {
    background-color: #fef2f2;
    border-left: 4px solid #ef4444;
    color: #dc2626;
}

.toast.warning {
    background-color: #fffbeb;
    border-left: 4px solid #f59e0b;
    color: #d97706;
}

.toast.info {
    background-color: #eff6ff;
    border-left: 4px solid #3b82f6;
    color: #2563eb;
}

.toast-icon {
    margin-right: 12px;
    font-size: 20px;
    flex-shrink: 0;
}

.toast-content {
    flex-grow: 1;
    font-size: 14px;
    line-height: 1.4;
}

.toast-close {
    background: none;
    border: none;
    font-size: 18px;
    cursor: pointer;
    opacity: 0.7;
    margin-left: 8px;
    color: inherit;
}

.toast-close:hover {
    opacity: 1;
}

.toast-progress {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.1);
}

.toast-progress-bar {
    height: 100%;
    animation: progressBar 5s linear forwards;
}

.toast.success .toast-progress-bar {
    background-color: #0a914c;
}

.toast.error .toast-progress-bar {
    background-color: #ef4444;
}

.toast.warning .toast-progress-bar {
    background-color: #f59e0b;
}

.toast.info .toast-progress-bar {
    background-color: #3b82f6;
}

@keyframes slideIn {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes progressBar {
    from {
        width: 100%;
    }
    to {
        width: 0%;
    }
}

@keyframes slideOut {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(100%);
        opacity: 0;
    }
}

.toast.hiding {
    animation: slideOut 0.3s ease-in forwards;
}
    </style>
    
    @stack('styles')
</head>
<body>
     <!-- Toast Notifications Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-3 w-80 max-w-full"></div>
    <div class="dashboard-container">
        <!-- Sidebar Navigation -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            @yield('content')
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







        // Toast notification system
class ToastManager {
    constructor() {
        this.container = document.getElementById('toast-container');
        this.toasts = new Map();
        this.nextId = 1;
    }

    show(message, type = 'info', duration = 5000) {
        const id = this.nextId++;
        const toast = this.createToast(message, type, id);
        
        this.container.appendChild(toast);
        this.toasts.set(id, toast);

        // Auto remove after duration
        if (duration > 0) {
            setTimeout(() => {
                this.remove(id);
            }, duration);
        }

        return id;
    }

    createToast(message, type, id) {
        const toast = document.createElement('div');
        toast.className = `toast ${type}`;
        toast.setAttribute('role', 'alert');
        
        const icons = {
            success: 'fas fa-check-circle',
            error: 'fas fa-exclamation-circle',
            warning: 'fas fa-exclamation-triangle',
            info: 'fas fa-info-circle'
        };

        toast.innerHTML = `
            <div class="toast-icon">
                <i class="${icons[type]}"></i>
            </div>
            <div class="toast-content">${message}</div>
            <button class="toast-close" onclick="toastManager.remove(${id})">
                <i class="fas fa-times"></i>
            </button>
            <div class="toast-progress">
                <div class="toast-progress-bar"></div>
            </div>
        `;

        return toast;
    }

    remove(id) {
        if (this.toasts.has(id)) {
            const toast = this.toasts.get(id);
            toast.classList.add('hiding');
            
            // Remove after animation completes
            setTimeout(() => {
                if (toast.parentNode) {
                    toast.parentNode.removeChild(toast);
                }
                this.toasts.delete(id);
            }, 300);
        }
    }

    clearAll() {
        this.toasts.forEach((toast, id) => {
            this.remove(id);
        });
    }
}

// Initialize toast manager
const toastManager = new ToastManager();

// Display any flash messages from server
document.addEventListener('DOMContentLoaded', function() {
    // Check for success message
    @if(session('success'))
        toastManager.show("{{ session('success') }}", 'success');
    @endif

    // Check for error message
    @if(session('error'))
        toastManager.show("{{ session('error') }}", 'error');
    @endif

    // Check for warning message
    @if(session('warning'))
        toastManager.show("{{ session('warning') }}", 'warning');
    @endif

    // Check for info message
    @if(session('info'))
        toastManager.show("{{ session('info') }}", 'info');
    @endif
});

// Make toastManager available globally for other scripts
window.toastManager = toastManager;
    </script>
    
    @stack('scripts')
</body>
</html>