<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIOTIM - Membership Directory</title>
    
    <!-- Required Libraries -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 50: '#f0f9f4', 100: '#dbf0e3', 500: '#0a914c', 600: '#087d42', 700: '#066937', 800: '#05552d', 900: '#044223' },
                        secondary: { 50: '#fbfce9', 100: '#f5f8c9', 500: '#d2d925', 600: '#bcc321' },
                        dark: { 500: '#333333', 600: '#2e2e2e', 700: '#292929' }
                    },
                    fontFamily: { montserrat: ['Montserrat', 'sans-serif'], poppins: ['Poppins', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Poppins', sans-serif; scroll-behavior: smooth; }
        h1, h2, h3 { font-family: 'Montserrat', sans-serif; }
        .hero-gradient { background: linear-gradient(135deg, rgba(10,145,76,0.9) 0%, rgba(210,217,37,0.85) 100%), url('https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80'); background-size: cover; background-position: center; }
        .nav-scroll { background-color: rgba(255,255,255,0.95); box-shadow: 0 2px 20px rgba(0,0,0,0.1); backdrop-filter: blur(10px); }
        .btn-primary { background-color: #0a914c; transition: all 0.3s ease; }
        .btn-primary:hover { background-color: #087d42; transform: translateY(-2px); }
        .table-row:hover { background-color: #f0f9f4; transition: 0.2s; }
        .mobile-menu { transform: translateX(100%); transition: transform 0.3s ease-out; }
        .mobile-menu.open { transform: translateX(0); }
    </style>
</head>
<body class="bg-white text-dark-500">
    <!-- Header Navigation (same as about page) -->
    <header id="navbar" class="fixed w-full bg-white z-50 transition-all duration-300 py-4">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="#" class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-primary-500 rounded-lg flex items-center justify-center"><i class="fas fa-chart-line text-white text-xl"></i></div>
                <span class="font-montserrat font-bold text-xl text-dark-800">NIOTIM</span>
            </a>
              <nav class="hidden lg:flex space-x-8">
                <a href="{{route('home')}}" class="text-dark-600 hover:text-primary-500 transition font-medium">Home</a>
                <a href="{{route('about')}}" class="text-dark-600 hover:text-primary-500 transition font-medium">About</a>
                <a href="{{route('membership')}}" class="text-primary-500 font-semibold border-b-2 border-primary-500 pb-1">Membership</a>
                <a href="{{route('communique')}}" class="text-dark-600 hover:text-primary-500 transition font-medium">Communiqué</a>

                <a href="{{route('news.index')}}" class="text-dark-600 hover:text-primary-500 transition font-medium">News</a>
                <a href="{{route('home')}}#contact" class="text-dark-600 hover:text-primary-500 transition font-medium">Contact</a>
            </nav>
            <button id="mobile-menu-button" class="lg:hidden text-dark-600"><i class="fas fa-bars text-2xl"></i></button>
        </div>
        <div id="mobile-menu" class="mobile-menu fixed top-0 right-0 w-64 h-full bg-white shadow-2xl z-50 p-6">
            <div class="flex justify-between items-center mb-8"><span class="font-bold text-xl text-primary-600">NIOTIM</span><button id="close-menu" class="text-2xl">&times;</button></div>
            <nav class="flex flex-col space-y-5">
                <a href="#" class="text-dark-700 hover:text-primary-500">Home</a>
                <a href="#" class="text-dark-700 hover:text-primary-500">About</a>
                <a href="#" class="text-primary-500 font-semibold border-l-4 border-primary-500 pl-2">Membership</a>
                <a href="#" class="text-dark-700 hover:text-primary-500">News</a>
                <a href="#" class="text-dark-700 hover:text-primary-500">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-gradient text-white pt-32 pb-16 relative overflow-hidden">
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">NIOTIM Membership Directory</h1>
            <p class="text-xl mb-2">Our growing community of academics and professionals</p>
            <div class="w-24 h-1 bg-secondary-500 mx-auto my-8"></div>
        </div>
    </section>

    <!-- Membership Table Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <!-- Search and Filter -->
            <div class="mb-8 flex flex-col md:flex-row gap-4 justify-between items-center">
                <div class="relative w-full md:w-96">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" id="searchInput" placeholder="Search by name, institution, or membership number..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                </div>
                <div class="flex gap-2">
                    <button class="filter-btn active bg-primary-500 text-white px-4 py-2 rounded-lg" data-grade="all">All</button>
                    <button class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-primary-100" data-grade="Fellow">Fellows</button>
                    <button class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-primary-100" data-grade="Member">Members</button>
                    <button class="filter-btn bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-primary-100" data-grade="Asst. Member">Assistant Members</button>
                </div>
            </div>

            <!-- Desktop Table -->
            <div class="hidden md:block overflow-x-auto bg-white rounded-lg shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-primary-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">S/N</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Membership No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Place of Work</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email / Phone</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grade</th>
                        </tr>
                    </thead>
                    <tbody id="membersTableBody" class="bg-white divide-y divide-gray-200"></tbody>
                </table>
            </div>

            <!-- Mobile Cards -->
            <div id="mobileCardsContainer" class="md:hidden space-y-4"></div>
        </div>
    </section>

    <!-- Footer (same as template) -->
    <footer class="bg-gradient-to-r from-primary-900 to-primary-600 text-white pt-16 pb-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2025 NIOTIM. All rights reserved.</p>
        </div>
    </footer>

    <button id="back-to-top" class="fixed bottom-8 right-8 w-12 h-12 rounded-full bg-primary-500 text-white shadow-lg opacity-0 transition-opacity"><i class="fas fa-arrow-up"></i></button>

    <script>
        // Membership data from the document
        const membersData = [
            { sn:1, no:"AMN0001", name:"Mr Imoh, Oghenekaro Benson", work:"Federal Polytechnic, Orogun, Delta State", email:"imohoghenekaro@gmail.com", phone:"08106966024", grade:"Asst. Member" },
            { sn:2, no:"AMN0002", name:"Wakgaka, Cephas Daniel", work:"Plateau State Polytechnic, Barkin Ladi", email:"cdwakgaka@gmail.com", phone:"08030462458", grade:"Asst. Member" },
            { sn:3, no:"AMN0003", name:"Ujah John Augustine", work:"Federal Polytechnic, Orogun, Delta State", email:"talk2johnbosco2@gmail.com", phone:"07065615078 / 09064678280", grade:"Asst. Member" },
            { sn:4, no:"FN0001", name:"Dr Akewusola Lanre", work:"Kwara State Polytechnic, Ilorin", email:"akewusolalanre@yahoo.com", phone:"08035257252", grade:"Fellow" },
            { sn:5, no:"FN0002", name:"Dr Oludele, Lydia Yemisi", work:"Osun State Polytechnic, Iree", email:"yemisioludele70@gmail.com", phone:"08033479720", grade:"Fellow" },
            { sn:6, no:"FN0003", name:"Dr. Garba, Gude Ado", work:"Federal University of Science and Technology, Kabo, Kano", email:"adogarba@fedpolykabo.edu.ng", phone:"08066067606", grade:"Fellow" },
            { sn:7, no:"FN0004", name:"Dr Osakwe, Stephen Onyeanwuna", work:"Delta State Polytechnic, Otefe-Oghara", email:"steveosakwe1212@gmail.com", phone:"07033228533", grade:"Fellow" },
            { sn:8, no:"FN0005", name:"Dr Onche, Virginia Ochanya", work:"University of Ibadan", email:"vidogwu39@yahoo.com", phone:"08023337899", grade:"Fellow" },
            { sn:9, no:"FN0006", name:"Dr. Folorunso, Isaac Oluwole", work:"University of Ilesa", email:"folounsooluwole@gmail.com", phone:"09034719313", grade:"Fellow" },
            { sn:10, no:"FN0007", name:"Dr Akasi, Sunday Ebhodaghe", work:"Federal Polytechnic, Ede", email:"aksunebo@yahoo.co.uk", phone:"08033802347", grade:"Fellow" },
            { sn:11, no:"FN0012", name:"Mrs. Arikwandu, Sympathy Ogechukwu", work:"Federal Polytechnic, Bauchi", email:"soarikwandu@fptb.edu.ng", phone:"08025257818", grade:"Fellow" },
            { sn:12, no:"FN0013", name:"Dr (Mrs) Ifeolu, Adepeju Anike", work:"Federal Polytechnic, Offa", email:"Adepeju.ifeolu@gmail.com", phone:"08085039286", grade:"Fellow" },
            { sn:13, no:"FN0014", name:"Dr Elemure, Clement Boluwaji", work:"Federal Polytechnic, Ado-Ekiti", email:"", phone:"08034687813", grade:"Fellow" },
            { sn:14, no:"FN0015", name:"Dr Idiake, Christiana Omoye", work:"Lagos State University of Science and Technology", email:"christianaomoye@yahoo.com", phone:"08023656549", grade:"Fellow" },
            { sn:15, no:"FN0016", name:"Dr Fasae, Felicia Bosede Kehinde", work:"Bamidele Olumilua University of Education, Ikere-Ekiti", email:"fafeboke@gmail.com", phone:"08033726612", grade:"Fellow" },
            { sn:16, no:"FN0017", name:"Dr Nna-Emmanuel, Sarah Wariboko", work:"Ken SaroWiwa Polytechnic, Bori", email:"sarahnna01@gmail.com", phone:"07060855967", grade:"Fellow" },
            { sn:17, no:"FN0018", name:"Dr Adepoju Adenike Abiodun", work:"Tai Solarin University of Education", email:"adenikepoju@gmail.com", phone:"08105667121", grade:"Fellow" },
            { sn:18, no:"FN0019", name:"Dr. Adeyeye Munirat Opeyemi", work:"Bamidele Olumilua University of Education", email:"adeyeye.ope@gmail.com", phone:"08030715156", grade:"Fellow" },
            { sn:19, no:"MN0006", name:"Mrs. Ikuenomore, Olubusayo Mosunmola", work:"Tai Solarin University of Education", email:"ikuenomoreom@gmail.com", phone:"08051836414", grade:"Member" },
            { sn:20, no:"MN0007", name:"Dr Enyekit, Ebenezer Owaji", work:"Captain Elechi Amadi Polytechnic, Rumuola", email:"drbenowaji2013@gmail.com", phone:"07036965109", grade:"Member" },
            { sn:21, no:"MN0008", name:"Mr Asimegbe Gabriel Obozuwa", work:"Federal Polytechnic, Offa", email:"asimegbegabriel1@gmail.com", phone:"07062857833", grade:"Member" },
            { sn:22, no:"MN0009", name:"Mr. Adegbe, Emmanuel", work:"Federal Polytechnic, Offa", email:"adegbeemmy4@gmail.com", phone:"07039716296", grade:"Member" },
            { sn:23, no:"MN0010", name:"Dr Iheukwumere, Odochi Chinwe-Edozie", work:"Ogbonnaya Onu Polytechnic, Aba", email:"chinwedozie1@gmail.com", phone:"08057993661", grade:"Member" },
            { sn:24, no:"MN0011", name:"Mrs Yusuf Ramat", work:"Federal Polytechnic, Offa", email:"sodiqramat06@gmail.com", phone:"08060328715", grade:"Member" },
            { sn:25, no:"MN0012", name:"Dr. Alikornwo, Peter Mezenye", work:"Captain Elechi Amadi Polytechnic, P/Harcourt", email:"peter.alikornwob@portharcourtpoly.edu.ng", phone:"08132922362", grade:"Member" },
            { sn:26, no:"MN0013", name:"Mrs. Immam, Ramat Omolola", work:"Federal Polytechnic, Offa", email:"abakeenterprise8@gmail.com", phone:"08169901606", grade:"Member" },
            { sn:27, no:"MN0014", name:"Mrs. Jimada, Bola Elelu", work:"Federal Training Centre, Ilorin", email:"Bolajimada1970@gmail.com", phone:"08033584597", grade:"Member" },
            { sn:28, no:"MN0015", name:"Dr. Nnaji, Florence Oluchi", work:"The Federal Polytechnic, Bali", email:"Nnajiflorence15@gmail.com", phone:"07064815343", grade:"Member" },
            { sn:29, no:"MN0016", name:"Dr. Adiele, Goodluck Chidi", work:"Capt. Elechi Amadi Polytechnic, Rumuola", email:"adielegoodluck5@gmail.com", phone:"09132800227", grade:"Member" },
            { sn:30, no:"MN0017", name:"Dr. Ikoromasoma, Emmanuel", work:"Rivers State University, Port Harcourt", email:"emmanuelikoromasoma@gmail.com", phone:"07063254607", grade:"Member" },
            { sn:31, no:"MN0018", name:"Dr Nmehiele, Edith Luke", work:"Captain Elechi Amadi Polytechnic, Rumuola", email:"emmanuel.nweke@portharcourtpoly.edu.ng", phone:"08037817527", grade:"Member" },
            { sn:32, no:"MN0019", name:"Dr. Ogwe, Chinyere Goodlife", work:"Rivers State College of Health Science and Management Tech.", email:"chinyereogwe77@gmail.com", phone:"08032543247", grade:"Member" },
            { sn:33, no:"MN0020", name:"Dr. Obara, Chizi Ernuchi", work:"Rivers State University", email:"chizi.obara@ust.edu.ng", phone:"07061550126", grade:"Member" },
            { sn:34, no:"MN0021", name:"Dr. Omunakwe, Priscilla Obunwo", work:"Rivers State University", email:"priscaomunakee90@gmail.com", phone:"08039429801", grade:"Member" },
            { sn:35, no:"MN0022", name:"Mrs. Ayo-Ogunlusi, Veronica Abiola", work:"Bamidele Olumilua University of Education", email:"abiolaveronica3@gmail.com", phone:"08166490138", grade:"Member" },
            { sn:36, no:"MN0023", name:"Mrs. Sodiyan, Titilayo Juliet", work:"Federal College of Animal Health and Production Tech., Ibadan", email:"titilayosodiyan@gmail.com", phone:"07066465706", grade:"Member" },
            { sn:37, no:"MN0024", name:"Mr Azeez Femi", work:"The Oke Ogun Polytechnic, Saki", email:"iamazeezfemi@gmail.com", phone:"08070697789", grade:"Member" },
            { sn:38, no:"MN0025", name:"Dr Ogunyemi Olufunso Titilope", work:"Ekiti State Govt. Staff Development Centre", email:"olufunsoyemi@gmail.com", phone:"07030594195", grade:"Member" },
            { sn:39, no:"MN0026", name:"Mrs. Irokanulo, Cynthia Jane", work:"Yaba College of Technology", email:"Cynthiairoka79@gmail.com", phone:"08169611723", grade:"Member" },
            { sn:40, no:"MN0027", name:"Miss Nkoro, Mary Kelechi", work:"Ogbonnaya Onu Polytechnic, Abia", email:"Kelechimary776@gmail.com", phone:"08188577187", grade:"Member" },
            { sn:41, no:"MN0028", name:"Mr Ige, Oluwaseye Jacob", work:"Yaba College of Technology", email:"oluwaseye.ige16@gmail.com", phone:"07035559223", grade:"Member" },
            { sn:42, no:"MN0029", name:"Mrs. Ogunyemi, Adebola Adedotun", work:"Gateway (ICT) Polytechnic, Saapade", email:"aboladot7@gmail.com", phone:"08130478131", grade:"Member" },
            { sn:43, no:"MN0030", name:"Mr. Shu'aibu, Musa", work:"Jigawa State Polytechnic, Dutse", email:"Musashuaibu82@gmail.com", phone:"08063724574", grade:"Member" },
            { sn:44, no:"MN0031", name:"Dr Kalagbor, Peace Iyingi", work:"Capt. Elechi Amadi Polytechnic, Rumuola", email:"peace.kalagbor@gmail.com", phone:"08037171642", grade:"Member" },
            { sn:45, no:"MN0032", name:"Dr Ukata Philip Festus", work:"Captain Elechi Amadi Poly, Port-Harcourt", email:"ukata4mephilip@yahoo.com", phone:"08038877937", grade:"Member" },
            { sn:46, no:"MN0033", name:"Mrs Akinpelu Toyin", work:"Osun State College of Technology, Esa Oke", email:"Julianahtoyin9@gmail.com", phone:"07068081089", grade:"Member" },
            { sn:47, no:"MN0034", name:"Mr Adegboye Adenrele Olalekan", work:"Osun State Polytechnic, Iree", email:"Lekan7777@gmail.com", phone:"08030862530", grade:"Member" },
            { sn:48, no:"MN0035", name:"Mr Abiodun Samuel Adebayo", work:"Federal Polytechnic, Ado-Ekiti", email:"", phone:"08037553208", grade:"Member" },
            { sn:49, no:"MN0036", name:"Dr. Agwatu, Chioma Ozuruonyeoke", work:"Lagos State University of Science and Technology", email:"agwatuchioma@gmail.com", phone:"08067860045", grade:"Member" },
            { sn:50, no:"MN0037", name:"Mr Aliu, Zainul Abideen", work:"Federal Polytechnic, Ayede", email:"Zainabideen2453@gmail.com", phone:"08033025519", grade:"Member" },
            { sn:51, no:"MN0038", name:"Mrs. Fasipe, Oluyemisi Omowumi", work:"The Polytechnic Ibadan", email:"yemfash1971@gmail.com", phone:"08038188474", grade:"Member" },
            { sn:52, no:"MN0039", name:"Bankole Olabisi Grace", work:"Kwara State Polytechnic, Ilorin", email:"olabisigbankole@gmail.com", phone:"08032412957", grade:"Member" },
            { sn:53, no:"MN0040", name:"Mr. Abiodun Wilson", work:"Auchi Polytechnic, Auchi", email:"papawisman4life@gmail.com", phone:"09024182675", grade:"Member" },
            { sn:54, no:"MN0041", name:"Mr. Olayanju, Tobi Emmanuel", work:"Bamidele Olumilua University of Education", email:"olayanjutobi4christ@gmail.com", phone:"08058526930", grade:"Member" },
            { sn:55, no:"MN0042", name:"Mr. Osholonge, Agboola Rasheed", work:"Bamidele Olumilua University of Education", email:"longolarheed@yahoo.com", phone:"08030784661", grade:"Member" },
            { sn:56, no:"MN0043", name:"Mrs. Chiemeka Ngozi Mary", work:"Redeemer's University, Ede", email:"mayngg4@gmail.com", phone:"08077611639", grade:"Member" },
            { sn:57, no:"MN0044", name:"Adieze Charity", work:"Ogbonnaya Onu Polytechnic, Aba", email:"charityadieze@gmail.com", phone:"08030865120", grade:"Member" },
            { sn:58, no:"MN0045", name:"Adegboye, Tajudeen Adekunle", work:"The Federal Polytechnic, Offa", email:"adegboyetajudeen@yahoo.com", phone:"07032496057", grade:"Member" },
            { sn:59, no:"MN0046", name:"Dr. Alalibo, Obelem Otonye", work:"Rivers State University of Science and Technology", email:"obelem.alalibo@ust.edu.ng", phone:"08056211223", grade:"Member" },
            { sn:60, no:"MN0047", name:"Okuma-Okpe, Tessy Kesiena", work:"Federal Polytechnic, Orogun", email:"tessykes1@gmail.com", phone:"07067127032", grade:"Member" },
            { sn:61, no:"MN0048", name:"Sogaolu, Abosede Adebukola", work:"Redeemer's University, Ede", email:"abosedegiwa74@gmail.com", phone:"08028299839", grade:"Member" },
            { sn:62, no:"MN0049", name:"Omoniyi, Osefat Omolola", work:"Federal Polytechnic, Ede", email:"feyisaraatuni@gmail.com", phone:"09067985029", grade:"Member" }
        ];

        function renderMembers(filterGrade = 'all', searchTerm = '') {
            let filtered = membersData;
            if (filterGrade !== 'all') filtered = filtered.filter(m => m.grade === filterGrade);
            if (searchTerm.trim() !== '') {
                const term = searchTerm.toLowerCase();
                filtered = filtered.filter(m => 
                    m.name.toLowerCase().includes(term) || 
                    m.work.toLowerCase().includes(term) || 
                    m.no.toLowerCase().includes(term)
                );
            }

            // Table rows
            const tbody = document.getElementById('membersTableBody');
            tbody.innerHTML = filtered.map(m => `
                <tr class="table-row">
                    <td class="px-6 py-4 whitespace-nowrap text-sm">${m.sn}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-mono">${m.no}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">${m.name}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">${m.work}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">${m.email}<br>${m.phone}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm"><span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full ${m.grade === 'Fellow' ? 'bg-green-100 text-green-800' : m.grade === 'Member' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800'}">${m.grade}</span></td>
                </tr>
            `).join('');

            // Mobile cards
            const cardsContainer = document.getElementById('mobileCardsContainer');
            cardsContainer.innerHTML = filtered.map(m => `
                <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
                    <div class="flex justify-between items-start">
                        <div><span class="font-bold text-primary-600">${m.no}</span> - <span class="font-semibold">${m.name}</span></div>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full ${m.grade === 'Fellow' ? 'bg-green-100 text-green-800' : m.grade === 'Member' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800'}">${m.grade}</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-2"><i class="fas fa-building mr-1"></i> ${m.work}</p>
                    <p class="text-sm text-gray-600"><i class="fas fa-envelope mr-1"></i> ${m.email || '—'}</p>
                    <p class="text-sm text-gray-600"><i class="fas fa-phone mr-1"></i> ${m.phone}</p>
                </div>
            `).join('');
        }

        // Event listeners
        let currentGrade = 'all';
        let currentSearch = '';
        document.getElementById('searchInput').addEventListener('input', (e) => {
            currentSearch = e.target.value;
            renderMembers(currentGrade, currentSearch);
        });
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active', 'bg-primary-500', 'text-white'));
                btn.classList.add('active', 'bg-primary-500', 'text-white');
                currentGrade = btn.getAttribute('data-grade');
                renderMembers(currentGrade, currentSearch);
            });
        });

        renderMembers();

        // Mobile menu, back to top (same as template)
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const closeMenuButton = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenuButton.addEventListener('click', () => { mobileMenu.classList.add('open'); document.body.style.overflow = 'hidden'; });
        closeMenuButton.addEventListener('click', () => { mobileMenu.classList.remove('open'); document.body.style.overflow = 'auto'; });
        const backToTop = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) backToTop.classList.add('opacity-100'); else backToTop.classList.remove('opacity-100');
        });
        backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    </script>
</body>
</html>