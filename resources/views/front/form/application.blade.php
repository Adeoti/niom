<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIOTIM Membership Application</title>
    
    <!-- Required Libraries -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    
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
        
        .form-input {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #0a914c;
            box-shadow: 0 0 0 3px rgba(10, 145, 76, 0.2);
        }
        
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: none;
        }
        
        .alert-success {
            background-color: #f0f9f4;
            color: #0a914c;
            border: 1px solid #dbf0e3;
        }
        
        .alert-error {
            background-color: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }
        
        .form-error {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            display: none;
        }
        
        .step {
            display: none;
        }
        
        .step.active {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }
        
        .progress-bar {
            height: 8px;
            border-radius: 4px;
            background-color: #e2e8f0;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            background-color: #0a914c;
            transition: width 0.5s ease;
        }
        
        .step-indicator {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #64748b;
        }
        
        .step-indicator.active {
            background-color: #0a914c;
            color: white;
        }
        
        .step-indicator.completed {
            background-color: #0a914c;
            color: white;
        }
        
        .file-upload {
            border: 2px dashed #cbd5e1;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .file-upload:hover {
            border-color: #0a914c;
            background-color: #f0f9f4;
        }
        
        .file-preview {
            max-width: 150px;
            max-height: 150px;
            border-radius: 8px;
            margin-top: 1rem;
            display: none;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-white text-dark-500">
    <!-- Multi-Step Application Form -->
    <section id="application" class="py-16 bg-primary-50 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="p-8 border-b border-gray-200">
                    <h2 class="text-3xl font-bold text-primary-500 mb-2">NIOTIM Membership Application</h2>
                    <p class="text-dark-600">Complete all sections of this form to apply for membership</p>
                    
                    <!-- Progress Bar -->
                    <div class="mt-6">
                        <div class="progress-bar">
                            <div class="progress-fill" id="progressFill" style="width: 25%;"></div>
                        </div>
                        
                        <div class="flex justify-between mt-4">
                            <div class="step-indicator active" data-step="1">1</div>
                            <div class="step-indicator" data-step="2">2</div>
                            <div class="step-indicator" data-step="3">3</div>
                            <div class="step-indicator" data-step="4">4</div>
                        </div>
                    </div>
                </div>
                
                <form id="membershipForm" class="p-8" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Step 1: Personal Information -->
                    <div class="step active" id="step1">
                        <h3 class="text-xl font-semibold text-primary-500 mb-6">Personal Information</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="title" class="block text-dark-700 font-medium mb-2">Title *</label>
                                <select id="title" name="title" class="form-input" required>
                                    <option value="">Select Title</option>
                                    <option value="Prof.">Prof.</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="form-error" id="titleError"></div>
                            </div>
                            
                            <div>
                                <label for="membership_type" class="block text-dark-700 font-medium mb-2">Membership Type *</label>
                                <select id="membership_type" name="membership_type" class="form-input" required>
                                    <option value="">Select Membership Type</option>
                                    <option value="student-hnd">OTM Student (HND)</option>
                                    <option value="university-student">University Student (300 Level+)</option>
                                    <option value="polytechnic-lecturer">Polytechnic Lecturer</option>
                                    <option value="university-lecturer">University Lecturer</option>
                                    <option value="professional">Professional</option>
                                </select>
                                <div class="form-error" id="membershipTypeError"></div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div>
                                <label for="surname" class="block text-dark-700 font-medium mb-2">Surname *</label>
                                <input type="text" id="surname" name="surname" class="form-input" required>
                                <div class="form-error" id="surnameError"></div>
                            </div>
                            
                            <div>
                                <label for="first_name" class="block text-dark-700 font-medium mb-2">First Name *</label>
                                <input type="text" id="first_name" name="first_name" class="form-input" required>
                                <div class="form-error" id="firstNameError"></div>
                            </div>
                            
                            <div>
                                <label for="middle_name" class="block text-dark-700 font-medium mb-2">Middle Name</label>
                                <input type="text" id="middle_name" name="middle_name" class="form-input">
                                <div class="form-error" id="middleNameError"></div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="dob" class="block text-dark-700 font-medium mb-2">Date of Birth *</label>
                                <input type="date" id="dob" name="dob" class="form-input" required>
                                <div class="form-error" id="dobError"></div>
                            </div>
                            
                            <div>
                                <label for="nationality" class="block text-dark-700 font-medium mb-2">Nationality *</label>
                                <input type="text" id="nationality" name="nationality" class="form-input" required>
                                <div class="form-error" id="nationalityError"></div>
                            </div>
                        </div>
                        
                        <div class="flex justify-between mt-8">
                            <div></div> <!-- Empty div for spacing -->
                            <button type="button" class="bg-primary-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-600 transition next-step" data-next="2">
                                Continue <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Step 2: Contact Information -->
                    <div class="step" id="step2">
                        <h3 class="text-xl font-semibold text-primary-500 mb-6">Contact Information</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="phone" class="block text-dark-700 font-medium mb-2">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" class="form-input" required>
                                <div class="form-error" id="phoneError"></div>
                            </div>
                            
                            <div>
                                <label for="email" class="block text-dark-700 font-medium mb-2">Email Address *</label>
                                <input type="email" id="email" name="email" class="form-input" required>
                                <div class="form-error" id="emailError"></div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="institution" class="block text-dark-700 font-medium mb-2">Institution *</label>
                                <input type="text" id="institution" name="institution" class="form-input" required>
                                <div class="form-error" id="institutionError"></div>
                            </div>
                            
                            <div>
                                <label for="qualification" class="block text-dark-700 font-medium mb-2">Highest Qualification *</label>
                                <input type="text" id="qualification" name="qualification" placeholder="Ph.D. in Information Management" class="form-input" required >
                                    
                                <div class="form-error" id="qualificationError"></div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="password" class="block text-dark-700 font-medium mb-2">Password *</label>
                                <input type="password" id="password" name="password" class="form-input" required minlength="8">
                                <div class="form-error" id="passwordError"></div>
                            </div>
                            
                            <div>
                                <label for="password_confirmation" class="block text-dark-700 font-medium mb-2">Confirm Password *</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" required minlength="8">
                                <div class="form-error" id="passwordConfirmationError"></div>
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <label for="address" class="block text-dark-700 font-medium mb-2">Address *</label>
                            <textarea id="address" name="address" rows="3" class="form-input" required></textarea>
                            <div class="form-error" id="addressError"></div>
                        </div>
                        
                        <div class="flex justify-between mt-8">
                            <button type="button" class="bg-gray-200 text-dark-500 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition prev-step" data-prev="1">
                                <i class="fas fa-arrow-left mr-2"></i> Back
                            </button>
                            <button type="button" class="bg-primary-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-600 transition next-step" data-next="3">
                                Continue <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Step 3: Passport Upload -->
                    <div class="step" id="step3">
                        <h3 class="text-xl font-semibold text-primary-500 mb-6">Passport Photograph</h3>
                        
                        <div class="mb-6">
                            <label class="block text-dark-700 font-medium mb-2">Upload Passport Photograph *</label>
                            <div class="file-upload" id="passportUpload">
                                <i class="fas fa-cloud-upload-alt text-3xl text-primary-500 mb-3"></i>
                                <p class="text-dark-600">Click to upload or drag and drop</p>
                                <p class="text-sm text-dark-400 mt-1">JPG, PNG, or GIF (Max 1MB)</p>
                                <input type="file" id="passport" name="passport" class="hidden" accept="image/*" required>
                                <img id="passportPreview" class="file-preview mx-auto">
                            </div>
                            <div class="form-error" id="passportError"></div>
                        </div>
                        
                        <div class="flex justify-between mt-8">
                            <button type="button" class="bg-gray-200 text-dark-500 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition prev-step" data-prev="2">
                                <i class="fas fa-arrow-left mr-2"></i> Back
                            </button>
                            <button type="button" class="bg-primary-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-600 transition next-step" data-next="4">
                                Continue <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Step 4: Review and Submit -->
                    <div class="step" id="step4">
                        <h3 class="text-xl font-semibold text-primary-500 mb-6">Review Your Information</h3>
                        
                        <div class="bg-gray-50 p-6 rounded-lg mb-6">
                            <h4 class="font-semibold text-lg mb-4">Personal Information</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <p class="text-sm text-dark-400">Title</p>
                                    <p id="reviewTitle" class="font-medium"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-dark-400">Membership Type</p>
                                    <p id="reviewMembershipType" class="font-medium"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-dark-400">Surname</p>
                                    <p id="reviewSurname" class="font-medium"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-dark-400">First Name</p>
                                    <p id="reviewFirstName" class="font-medium"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-dark-400">Middle Name</p>
                                    <p id="reviewMiddleName" class="font-medium"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-dark-400">Date of Birth</p>
                                    <p id="reviewDob" class="font-medium"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-dark-400">Nationality</p>
                                    <p id="reviewNationality" class="font-medium"></p>
                                </div>
                            </div>
                            
                            <h4 class="font-semibold text-lg mb-4 mt-6">Contact Information</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-sm text-dark-400">Phone Number</p>
                                    <p id="reviewPhone" class="font-medium"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-dark-400">Email Address</p>
                                    <p id="reviewEmail" class="font-medium"></p>
                                </div>
                                <div class="md:col-span-2">
                                    <p class="text-sm text-dark-400">Address</p>
                                    <p id="reviewAddress" class="font-medium"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-dark-400">Institution</p>
                                    <p id="reviewInstitution" class="font-medium"></p>
                                </div>
                                <div>
                                    <p class="text-sm text-dark-400">Highest Qualification</p>
                                    <p id="reviewQualification" class="font-medium"></p>
                                </div>
                            </div>
                            
                            <h4 class="font-semibold text-lg mb-4 mt-6">Passport Photograph</h4>
                            <div>
                                <img id="reviewPassport" class="h-32 rounded-lg border border-gray-200">
                            </div>
                        </div>
                        
                        <div class="flex justify-between mt-8">
                            <button type="button" class="bg-gray-200 text-dark-500 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition prev-step" data-prev="3">
                                <i class="fas fa-arrow-left mr-2"></i> Back
                            </button>
                            <button type="submit" id="submitBtn" class="bg-primary-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-600 transition flex items-center">
                                <span class="mr-2">Submit Application</span>
                                <span id="submitSpinner" class="hidden">
                                    <i class="fas fa-circle-notch fa-spin"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Step navigation
            const steps = document.querySelectorAll('.step');
            const stepIndicators = document.querySelectorAll('.step-indicator');
            const progressFill = document.getElementById('progressFill');
            let currentStep = 1;
            
            // Update progress bar
            function updateProgress() {
                const progress = (currentStep / steps.length) * 100;
                progressFill.style.width = `${progress}%`;
                
                // Update step indicators
                stepIndicators.forEach((indicator, index) => {
                    if (index + 1 < currentStep) {
                        indicator.classList.add('completed');
                        indicator.classList.remove('active');
                    } else if (index + 1 === currentStep) {
                        indicator.classList.add('active');
                        indicator.classList.remove('completed');
                    } else {
                        indicator.classList.remove('active', 'completed');
                    }
                });
            }
            
            // Navigate to step
            function goToStep(stepNumber) {
                steps.forEach(step => step.classList.remove('active'));
                document.getElementById(`step${stepNumber}`).classList.add('active');
                currentStep = stepNumber;
                updateProgress();
                
                // If we're on the review step, populate the review data
                if (stepNumber === 4) {
                    populateReviewData();
                }
            }
            
            // Next step buttons
            document.querySelectorAll('.next-step').forEach(button => {
                button.addEventListener('click', function() {
                    const nextStep = parseInt(this.getAttribute('data-next'));
                    
                    // Validate current step before proceeding
                    if (validateStep(currentStep)) {
                        goToStep(nextStep);
                    }
                });
            });
            
            // Previous step buttons
            document.querySelectorAll('.prev-step').forEach(button => {
                button.addEventListener('click', function() {
                    const prevStep = parseInt(this.getAttribute('data-prev'));
                    goToStep(prevStep);
                });
            });
            
            // File upload handling
            const passportUpload = document.getElementById('passportUpload');
            const passportInput = document.getElementById('passport');
            const passportPreview = document.getElementById('passportPreview');
            
            passportUpload.addEventListener('click', function() {
                passportInput.click();
            });
            
            passportInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    if (file.size > 1024 * 1024) { // 1MB limit
                        alert('File size must be less than 1MB');
                        this.value = '';
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        passportPreview.src = e.target.result;
                        passportPreview.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                }
            });
            
            // Form submission
            const form = document.getElementById('membershipForm');
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                // Validate all steps before submission
                let isValid = true;
                for (let i = 1; i <= 3; i++) {
                    if (!validateStep(i)) {
                        isValid = false;
                        goToStep(i);
                        break;
                    }
                }
                
                if (!isValid) {
                    showToast('Please correct the errors in the form.', 'error');
                    return;
                }
                
                // Submit the form via AJAX
                const formData = new FormData(form);
                const submitBtn = document.getElementById('submitBtn');
                const submitSpinner = document.getElementById('submitSpinner');
                
                // Show loading state
                submitBtn.disabled = true;
                submitSpinner.classList.remove('hidden');
                
                try {
                    const response = await fetch('/membership/apply', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });
                    
                    const data = await response.json();
                    
                    
                 if (response.ok) {
                    
                    showToast('Application submitted successfully!', 'success');
                    
                    // Replace form content with redirect message
                    const formContainer = document.querySelector('.max-w-4xl');
                    formContainer.innerHTML = `
                        <div class="p-8 text-center">
                            <div class="mb-4">
                                <i class="fas fa-spinner fa-spin text-4xl text-primary-500"></i>
                            </div>
                            <h2 class="text-2xl font-bold text-primary-500 mb-3">Application Submitted Successfully!</h2>
                            <p class="text-dark-600 mb-4">Please stay on this page while we redirect you to the payment portal...</p>
                            <div class="w-16 h-1 bg-primary-500 mx-auto"></div>
                        </div>
                    `;
                    
                    // Show redirect toast and redirect after a short delay
                    setTimeout(() => {
                        showToast('Redirecting to checkout...', 'success');
                        window.location.href = `/checkout?application_id=${data.application_id}`;
                    }, 2000);
                } else {
                        if (data.errors) {
                            // Display validation errors
                            displayValidationErrors(data.errors);
                            // Go to the step with the first error
                            const firstErrorField = Object.keys(data.errors)[0];
                            const stepWithError = getStepForField(firstErrorField);
                            goToStep(stepWithError);
                            showToast('Please check the form for errors.', 'error');
                        } else {
                            showToast(data.message || 'An error occurred. Please try again.', 'error');
                        }
                    }
                } catch (error) {
                    showToast('Network error. Please check your connection and try again.', 'error');
                } finally {
                    // Reset loading state
                    submitBtn.disabled = false;
                    submitSpinner.classList.add('hidden');
                }
            });
            
            // Validate a specific step
            function validateStep(stepNumber) {
                let isValid = true;
                const step = document.getElementById(`step${stepNumber}`);
                
                // Check all required fields in this step
                const requiredFields = step.querySelectorAll('[required]');
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        const errorElement = document.getElementById(`${field.id}Error`);
                        if (errorElement) {
                            errorElement.textContent = 'This field is required';
                            errorElement.style.display = 'block';
                        }
                    }
                });
                
                // Additional validation for specific fields
                if (stepNumber === 2) {
                    const email = document.getElementById('email');
                    if (email.value && !isValidEmail(email.value)) {
                        isValid = false;
                        const errorElement = document.getElementById('emailError');
                        errorElement.textContent = 'Please enter a valid email address';
                        errorElement.style.display = 'block';
                    }
                    
                    const phone = document.getElementById('phone');
                    if (phone.value && !isValidPhone(phone.value)) {
                        isValid = false;
                        const errorElement = document.getElementById('phoneError');
                        errorElement.textContent = 'Please enter a valid phone number';
                        errorElement.style.display = 'block';
                    }

                    // Password validation
                    if (stepNumber === 2) {
                        const password = document.getElementById('password');
                        const passwordConfirm = document.getElementById('password_confirmation');
                        
                        if (password.value.length < 8) {
                            isValid = false;
                            const errorElement = document.getElementById('passwordError');
                            errorElement.textContent = 'Password must be at least 8 characters long';
                            errorElement.style.display = 'block';
                        }
                        
                        if (password.value !== passwordConfirm.value) {
                            isValid = false;
                            const errorElement = document.getElementById('passwordConfirmationError');
                            errorElement.textContent = 'Passwords do not match';
                            errorElement.style.display = 'block';
                        }
                    }
                }
                
                return isValid;
            }
            
            // Email validation
            function isValidEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }
            
            // Phone validation (basic)
            function isValidPhone(phone) {
                const re = /^[+]?[\d\s\-()]{10,}$/;
                return re.test(phone);
            }
            
            // Display validation errors
            function displayValidationErrors(errors) {
                // Clear all previous errors
                document.querySelectorAll('.form-error').forEach(el => {
                    el.style.display = 'none';
                });
                
                // Show new errors
                for (const field in errors) {
                    const errorElement = document.getElementById(`${field}Error`);
                    if (errorElement) {
                        errorElement.textContent = errors[field][0];
                        errorElement.style.display = 'block';
                    }
                }
            }
            
            // Determine which step a field belongs to
            function getStepForField(fieldName) {
                const field = document.querySelector(`[name="${fieldName}"]`);
                if (!field) return 1;
                
                for (let i = 1; i <= 4; i++) {
                    if (document.getElementById(`step${i}`).contains(field)) {
                        return i;
                    }
                }
                return 1;
            }
            
            // Populate review data
            function populateReviewData() {
                document.getElementById('reviewTitle').textContent = document.getElementById('title').value;
                document.getElementById('reviewMembershipType').textContent = document.getElementById('membership_type').options[document.getElementById('membership_type').selectedIndex].text;
                document.getElementById('reviewSurname').textContent = document.getElementById('surname').value;
                document.getElementById('reviewFirstName').textContent = document.getElementById('first_name').value;
                document.getElementById('reviewMiddleName').textContent = document.getElementById('middle_name').value || 'N/A';
                
                const dob = document.getElementById('dob').value;
                document.getElementById('reviewDob').textContent = dob ? new Date(dob).toLocaleDateString() : '';
                
                document.getElementById('reviewNationality').textContent = document.getElementById('nationality').value;
                document.getElementById('reviewPhone').textContent = document.getElementById('phone').value;
                document.getElementById('reviewEmail').textContent = document.getElementById('email').value;
                document.getElementById('reviewAddress').textContent = document.getElementById('address').value;
                document.getElementById('reviewInstitution').textContent = document.getElementById('institution').value;
                document.getElementById('reviewQualification').textContent = document.getElementById('qualification').options[document.getElementById('qualification').selectedIndex].text;
                
                if (passportPreview.src) {
                    document.getElementById('reviewPassport').src = passportPreview.src;
                }
            }
            
            // Initialize progress bar
            updateProgress();

            // Toast notification function
            function showToast(message, type = 'success') {
                const backgroundColor = type === 'success' ? '#0a914c' : '#dc2626';
                
                Toastify({
                    text: message,
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    style: {
                        background: backgroundColor,
                        borderRadius: "8px",
                        fontFamily: "'Poppins', sans-serif",
                        fontSize: "14px"
                    },
                    onClick: function(){} // Callback after click
                }).showToast();
            }
        });
    </script>

    <!-- Footer -->
    <footer class="py-4 text-center text-sm text-gray-600 bg-gray-100 mt-8">
        <p>Designed by <a href="https://wa.link/1tz78w" class="font-semibold text-primary-500">Paramount Computer</a></p>
    </footer>
</body>
</html>