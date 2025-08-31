@extends('layouts.app')

@section('content')
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
                    <form id="avatar-form" action="{{ route('profile.update.avatar') }}" method="POST" enctype="multipart/form-data" class="avatar-upload">
                        @csrf
                        @if($membership && $membership->passport_path)
                            <img src="{{ Storage::url($membership->passport_path) }}" alt="Profile" class="w-32 h-32 rounded-full object-cover">
                        @else
                            <div class="w-32 h-32 rounded-full bg-accent-500 flex items-center justify-center text-4xl text-primary-500 font-bold">
                                {{ substr($membership->first_name, 0, 1) }}{{ substr($membership->surname, 0, 1) }}
                            </div>
                        @endif
                        <div class="avatar-upload-overlay">
                            <i class="fas fa-camera text-white text-xl"></i>
                        </div>
                        <input type="file" name="avatar" id="avatar-input" class="hidden" accept="image/*">
                    </form>
                </div>
                <h2 class="text-xl font-bold text-dark-800">{{ $membership->first_name }} {{ $membership->surname }}</h2>
                <p class="text-dark-500 mb-2">{{ $membership->rank->name ?? 'Member' }}</p>
                <p class="text-primary-500 font-medium mb-4">
                    Member since: {{ $membership->application_date ? $membership->application_date->format('M Y') : 'N/A' }}
                </p>
                
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
                <div class="tab-button active" data-tab="personal">Personal Information</div>
                <div class="tab-button" data-tab="professional">Professional Details</div>
                <div class="tab-button" data-tab="account">Account Settings</div>
                <div class="tab-button" data-tab="preferences">Preferences</div>
            </div>
            
            <!-- Personal Information Form -->
            <div id="personal-tab" class="tab-content">
                <div class="profile-card">
                    <h3 class="font-semibold text-dark-800 mb-6">Personal Information</h3>
                    
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-dark-700 mb-2">First Name</label>
                                <input type="text" name="first_name" class="form-input w-full" value="{{ old('first_name', $membership->first_name) }}" required>
                            </div>
                            <div>
                                <label class="block text-dark-700 mb-2">Last Name</label>
                                <input type="text" name="last_name" class="form-input w-full" value="{{ old('last_name', $membership->surname) }}" required>
                            </div>
                            
                            <div>
                                <label class="block text-dark-700 mb-2">Email Address</label>
                                <input type="email" name="email" class="form-input w-full" value="{{ old('email', $user->email) }}" required>
                            </div>
                            <div>
                                <label class="block text-dark-700 mb-2">Phone Number</label>
                                <input type="tel" name="phone" class="form-input w-full" value="{{ old('phone', $membership->phone) }}">
                            </div>
                            
                            <div>
                                <label class="block text-dark-700 mb-2">Date of Birth</label>
                                <input type="date" name="date_of_birth" class="form-input w-full" value="{{ old('date_of_birth', $membership->date_of_birth ? $membership->date_of_birth->format('Y-m-d') : '') }}">
                            </div>
                            <div>
                                <label class="block text-dark-700 mb-2">Gender</label>
                                <select name="gender" class="form-input w-full">
                                    <option value="male" {{ old('gender', $membership->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender', $membership->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender', $membership->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="block text-dark-700 mb-2">Residential Address</label>
                                <input type="text" name="address" class="form-input w-full" value="{{ old('address', $membership->address) }}">
                            </div>
                            
                            {{-- <div>
                                <label class="block text-dark-700 mb-2">City</label>
                                <input type="text" name="city" class="form-input w-full" value="{{ old('city', $membership->city) }}">
                            </div>
                            <div>
                                <label class="block text-dark-700 mb-2">State</label>
                                <input type="text" name="state" class="form-input w-full" value="{{ old('state', $membership->state) }}">
                            </div> --}}
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
                                <p class="font-medium">Not provided</p>
                                <p class="text-dark-600">Add emergency contact information</p>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="font-medium text-dark-700 mb-3">Membership Details</h4>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="font-medium">{{ $membership->rank->name ?? 'Member' }}</p>
                                <p class="text-dark-600">Member ID: NIOTIM-{{ $membership->id }}</p>
                                <p class="text-dark-600">
                                    @if($membership->approval_date)
                                        Member since: {{ $membership->approval_date->format('M Y') }}
                                    @else
                                        Application pending
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Professional Details Tab -->
            <div id="professional-tab" class="tab-content hidden">
                <div class="profile-card">
                    <h3 class="font-semibold text-dark-800 mb-6">Professional Details</h3>
                    
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-dark-700 mb-2">Title</label>
                                <input type="text" name="title" class="form-input w-full" value="{{ old('title', $membership->title) }}">
                            </div>
                            <div>
                                <label class="block text-dark-700 mb-2">Qualification</label>
                                <input type="text" name="qualification" class="form-input w-full" value="{{ old('qualification', $membership->qualification) }}">
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="block text-dark-700 mb-2">Institution/Organization</label>
                                <input type="text" name="institution" class="form-input w-full" value="{{ old('institution', $membership->institution) }}">
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="block text-dark-700 mb-2">Biography</label>
                                <textarea name="biography" class="form-input w-full" rows="4">{{ old('biography', $membership->biography) }}</textarea>
                            </div>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="button" class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-medium mr-3">Cancel</button>
                            <button type="submit" class="btn-primary text-white px-6 py-2 rounded-lg font-medium">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Account Settings Tab -->
            <div id="account-tab" class="tab-content hidden">
                <div class="profile-card">
                    <h3 class="font-semibold text-dark-800 mb-6">Account Settings</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <h4 class="font-medium text-dark-700 mb-3">Change Password</h4>
                            <form action="{{ route('profile.update.password') }}" method="POST">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                    <div class="md:col-span-2">
                                        <label class="block text-dark-700 mb-2">Current Password</label>
                                        <input type="password" name="current_password" class="form-input w-full" required>
                                    </div>
                                    <div>
                                        <label class="block text-dark-700 mb-2">New Password</label>
                                        <input type="password" name="new_password" class="form-input w-full" required>
                                    </div>
                                    <div>
                                        <label class="block text-dark-700 mb-2">Confirm New Password</label>
                                        <input type="password" name="new_password_confirmation" class="form-input w-full" required>
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="btn-primary text-white px-6 py-2 rounded-lg font-medium">Update Password</button>
                                </div>
                            </form>
                        </div>
                        
                        <div class="border-t pt-6">
                            <h4 class="font-medium text-dark-700 mb-3">Account Security</h4>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-medium text-dark-700">Two-Factor Authentication</p>
                                    <p class="text-dark-600 text-sm">Add an extra layer of security to your account</p>
                                </div>
                                <button class="bg-primary-50 text-primary-500 px-4 py-2 rounded-lg font-medium">Enable</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Preferences Tab -->
            <div id="preferences-tab" class="tab-content hidden">
                <div class="profile-card">
                    <h3 class="font-semibold text-dark-800 mb-6">Notification Preferences</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-dark-700">Email Notifications</p>
                                <p class="text-dark-600 text-sm">Receive emails about important updates</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                            </label>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-dark-700">SMS Notifications</p>
                                <p class="text-dark-600 text-sm">Receive text messages about important updates</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                            </label>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-dark-700">Event Reminders</p>
                                <p class="text-dark-600 text-sm">Get reminders about upcoming events</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                            </label>
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
@endsection

@push('styles')
<style>
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
    
    .tab-content {
        display: block;
    }
</style>
@endpush

@push('scripts')
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

    // Tab switching functionality
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            tabButtons.forEach(b => b.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Hide all tab contents
            tabContents.forEach(content => content.classList.add('hidden'));
            
            // Show the selected tab content
            const tabId = this.getAttribute('data-tab') + '-tab';
            document.getElementById(tabId).classList.remove('hidden');
        });
    });

    // Avatar upload functionality
    const avatarInput = document.getElementById('avatar-input');
    const avatarForm = document.getElementById('avatar-form');
    
    if (avatarInput) {
        avatarInput.addEventListener('change', function() {
            avatarForm.submit();
        });
        
        document.querySelector('.avatar-upload').addEventListener('click', function() {
            avatarInput.click();
        });
    }

    // Form submission handling
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            // You can add form validation here if needed
        });
    });
</script>
@endpush