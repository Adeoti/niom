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

                        <!-- About Dropdown -->
                        <li class="relative group">
                    <!-- Parent -->
                    <a href="{{route('home')}}#about"
                    class="text-dark-500 hover:text-primary-500 transition font-medium flex items-center">
                        About
                        <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </a>

                    <!-- Dropdown -->
                    <ul class="absolute top-full left-0 mt-0 w-48 bg-white shadow-lg rounded-lg 
                            hidden group-hover:block z-50">
                        <li>
                            <a href="{{route('membership.excos')}}#about" 
                            class="block px-4 py-2 text-dark-500 hover:bg-primary-50 hover:text-primary-500">
                            Excos
                            </a>
                            <a href="{{route('membership.councils')}}#about" 
                            class="block px-4 py-2 text-dark-500 hover:bg-primary-50 hover:text-primary-500">
                            Councils
                            </a>
                        </li>
                       
                    </ul>
                </li>


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

            <!-- About Dropdown (mobile) -->
            <li>
                <button class="flex justify-between items-center w-full text-dark-500 hover:text-primary-500 font-medium py-2 focus:outline-none" onclick="toggleSubmenu('about-submenu')">
                    About <i class="fas fa-chevron-down"></i>
                </button>
                <ul id="about-submenu" class="hidden pl-4 space-y-2">
                    <li><a href="{{route('membership.excos')}}" class="block py-2 text-dark-500 hover:text-primary-500">Excos</a></li>
                    <li><a href="{{route('membership.councils')}}" class="block py-2 text-dark-500 hover:text-primary-500">Councils</a></li>

                </ul>
            </li>

            <li><a href="{{route('home')}}#membership" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">Membership</a></li>
            <li><a href="{{route('membership.create')}}" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">Application</a></li>
            <li><a href="{{route('news.index')}}" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">News</a></li>
            <li><a href="{{route('home')}}#contact" class="text-dark-500 hover:text-primary-500 transition font-medium block py-2">Contact</a></li>
        </ul>
    </div>
</div>

    </header>

