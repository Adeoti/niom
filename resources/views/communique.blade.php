<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIOTIM - 1st International Conference Communiqué</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { primary: { 500: '#0a914c', 600: '#087d42', 700: '#066937' }, secondary: { 500: '#d2d925' } },
                    fontFamily: { montserrat: ['Montserrat'], poppins: ['Poppins'] }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Poppins', sans-serif; scroll-behavior: smooth; }
        h1, h2, h3 { font-family: 'Montserrat', sans-serif; }
        .hero-gradient { background: linear-gradient(135deg, rgba(10,145,76,0.9) 0%, rgba(210,217,37,0.85) 100%), url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80'); background-size: cover; }
        .resolution-item { transition: all 0.2s; }
        .resolution-item:hover { transform: translateX(5px); background-color: #f0f9f4; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <!-- Same header as membership page -->
    <header id="navbar" class="fixed w-full bg-white z-50 transition-all duration-300 py-4 shadow-sm">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="#" class="flex items-center space-x-2"><div class="w-10 h-10 bg-primary-500 rounded-lg flex items-center justify-center"><i class="fas fa-chart-line text-white"></i></div><span class="font-montserrat font-bold text-xl">NIOTIM</span></a>
            <nav class="hidden lg:flex space-x-8">
                <a href="{{route('home')}}" class="text-dark-600 hover:text-primary-500 transition font-medium">Home</a>
                <a href="{{route('about')}}" class="text-dark-600 hover:text-primary-500 transition font-medium">About</a>
                <a href="{{route('membership')}}" class="text-dark-600 hover:text-primary-500 transition font-medium">Membership</a>
                <a href="{{route('communique')}}" class="text-primary-500 font-semibold border-b-2 border-primary-500 pb-1">Communiqué</a>
                <a href="{{route('news.index')}}" class="text-dark-600 hover:text-primary-500 transition font-medium">News</a>
                <a href="{{route('home')}}#contact" class="text-dark-600 hover:text-primary-500 transition font-medium">Contact</a>
            </nav>
            <button id="mobile-menu-button" class="lg:hidden"><i class="fas fa-bars text-2xl"></i></button>
        </div>
        <div id="mobile-menu" class="mobile-menu fixed top-0 right-0 w-64 h-full bg-white shadow-2xl z-50 p-6 transform translate-x-full transition-transform"><div class="flex justify-between items-center mb-8"><span class="font-bold text-xl text-primary-600">NIOTIM</span><button id="close-menu" class="text-2xl">&times;</button></div><nav class="flex flex-col space-y-5"><a href="#">Home</a><a href="#">About</a><a href="#">Membership</a><a href="#">News</a><a href="#">Contact</a></nav></div>
    </header>

    <section class="hero-gradient text-white pt-32 pb-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">1st International Conference Communiqué</h1>
            <p class="text-xl">Office Technology and Information Management for Sustainable Development in the Digital Economy</p>
            <div class="w-24 h-1 bg-secondary-500 mx-auto my-6"></div>
            <p class="text-lg">Lagos State University of Science and Technology (LASUSTECH) | 8th – 11th September, 2025</p>
        </div>
    </section>

    <section class="py-12 container mx-auto px-4 max-w-5xl">
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-10">
            <h2 class="text-2xl font-bold text-primary-600 border-l-4 border-primary-500 pl-4 mb-6">Introduction</h2>
            <p class="mb-6 leading-relaxed">The 1st International Conference of the Nigerian Institute of Office Technology and Information Management (NIOTIM) was held from 8th to 11th September, 2025, at the Ikorodu Main Campus and Isolo Campus of Lagos State University of Science and Technology (LASUSTECH), Lagos State, Nigeria. The conference brought together eminent scholars, policymakers, technocrats, entrepreneurs, and professionals to deliberate on the application of office technology and information management for sustainable development in the digital economy.</p>
            
            <h2 class="text-2xl font-bold text-primary-600 border-l-4 border-primary-500 pl-4 mt-8 mb-6">Proceedings</h2>
            <div class="space-y-5">
                <div><span class="font-bold text-primary-700">Day 1 – Monday, September 8, 2025:</span> Arrival & Registration of delegates from across Nigeria and beyond.</div>
                <div><span class="font-bold text-primary-700">Day 2 – Tuesday, September 9, 2025 (Opening Ceremony – Ikorodu Campus):</span> The conference was declared open by the Vice Chancellor of LASUSTECH, Prof. Olumuyiwa Omotola Odusanya (represented by Prof. Olumuyiwa Owolabi Olamade). Key events included the inauguration of National Officers, history of NIOTIM by Dr. Lydia Y. Oludele, unveiling of the Institute’s Logo, and the installation of the Patron.</div>
                <div><span class="font-bold text-primary-700">Keynote Presentations:</span>
                    <ul class="list-disc pl-6 mt-2 space-y-1">
                        <li><strong>Prof. Chris I. Ogbechie</strong> – "Strategic Management in the Digital Age: Leveraging Office Technology and Information Management for Sustainable Competitiveness." He emphasized that AI is a tool, not a threat, and human creativity remains essential.</li>
                        <li><strong>Dr. Mrs. Charlotte B. Iro-Idoro</strong> (represented by Dr. Tajudeen Adisa Jimoh) – "Leadership in the Digital Age: Leveraging Office Technology and Information Management for Sustainable Competitive Advantage."</li>
                    </ul>
                </div>
                <div><span class="font-bold text-primary-700">Lead Paper Presentation:</span> Dr. Philomena N. Ogadi – "Harnessing Office Technology and Information Management to Enhance Human Relations for Sustainable Organizational Competitiveness." She reflected on the evolution of the secretarial profession and the transformative role of digital tools.</div>
                <div><span class="font-bold text-primary-700">Day 3 – Wednesday, September 10, 2025 (Technical Sessions – Isolo Campus):</span> Over 40 academic papers were presented across sub-themes including Accounting, Agriculture, Arts, Communication, Entrepreneurship, Environment, Government, Management, Transportation, and Science. The sessions underscored the cross-cutting importance of OTIM.</div>
            </div>

            <h2 class="text-2xl font-bold text-primary-600 border-l-4 border-primary-500 pl-4 mt-8 mb-6">Resolutions</h2>
            <div class="grid gap-3">
                <div class="resolution-item p-3 bg-gray-50 rounded-lg">1. Office Technology and Information Management (OTIM) should be recognized as a central driver for achieving sustainable development goals in the digital economy.</div>
                <div class="resolution-item p-3 bg-gray-50 rounded-lg">2. Governments, institutions, and organizations must urgently adopt digital innovations such as e-governance, automation, artificial intelligence (AI), and green office practices to enhance efficiency, accountability, and sustainability.</div>
                <div class="resolution-item p-3 bg-gray-50 rounded-lg">3. The curriculum of OTIM and OIM programmes in tertiary institutions should be redesigned and updated to align with the needs of the digital economy, global competitiveness, and the future of work.</div>
                <div class="resolution-item p-3 bg-gray-50 rounded-lg">4. Collaboration among academia, industry, policymakers, and professional bodies is crucial to foster innovation, research, and practical application of OTIM.</div>
                <div class="resolution-item p-3 bg-gray-50 rounded-lg">5. Professionals and students in the field should embrace continuous learning, research-driven innovations, and digital skill acquisition to remain relevant in the 21st-century workplace.</div>
                <div class="resolution-item p-3 bg-gray-50 rounded-lg">6. Information security, data protection, and ethical practices must be prioritized as digital systems become increasingly central to governance, business, and education.</div>
                <div class="resolution-item p-3 bg-gray-50 rounded-lg">7. Adoption of ICT in agriculture, transportation, communication, and the creative industries will contribute significantly to inclusive and sustainable national development.</div>
                <div class="resolution-item p-3 bg-gray-50 rounded-lg">8. Entrepreneurship and technopreneurship opportunities should be encouraged among OTM graduates to leverage digital platforms for business creation and innovation.</div>
                <div class="resolution-item p-3 bg-gray-50 rounded-lg">9. Green office practices and eco-friendly digitization must be mainstreamed into organizational cultures to ensure environmental sustainability.</div>
                <div class="resolution-item p-3 bg-gray-50 rounded-lg">10. Professional development programmes should be institutionalized by NIOTIM and similar bodies to continually build the digital competencies of practitioners.</div>
                <div class="resolution-item p-3 bg-gray-50 rounded-lg">11. Research in office technology and information management should be expanded to address pressing societal issues, including governance, education, health, and economic transformation.</div>
                <div class="resolution-item p-3 bg-gray-50 rounded-lg">12. NIOTIM should strengthen its institutional capacity by sustaining partnerships, mentoring younger professionals, and advancing scholarship to consolidate its role as a leading voice in digital transformation.</div>
            </div>

            <div class="mt-10 p-6 bg-primary-50 rounded-lg border-l-4 border-primary-500">
                <p class="italic text-gray-700">The conference concluded with a call to action for all stakeholders to prioritize digital transformation through effective office technology and information management. Participants departed on Thursday, September 11, 2025, with renewed commitment to advancing the practice and scholarship of NIOTIM for sustainable development in Nigeria and beyond.</p>
                <p class="mt-4 font-semibold">Issued this 11th day of September, 2025, at Lagos State University of Science and Technology (LASUSTECH), Lagos State, Nigeria.</p>
            </div>
        </div>
    </section>

    <footer class="bg-gradient-to-r from-primary-900 to-primary-600 text-white py-8 text-center">
        <div class="container mx-auto px-4">&copy; 2025 NIOTIM. All rights reserved.</div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileBtn = document.getElementById('mobile-menu-button');
        const closeBtn = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        if(mobileBtn && closeBtn) {
            mobileBtn.addEventListener('click', () => { mobileMenu.classList.add('translate-x-0', 'open'); document.body.style.overflow = 'hidden'; });
            closeBtn.addEventListener('click', () => { mobileMenu.classList.remove('translate-x-0', 'open'); document.body.style.overflow = 'auto'; });
        }
        // Back to top not needed but smooth scroll for anchor if any
    </script>
</body>
</html>