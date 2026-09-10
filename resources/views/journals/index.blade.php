<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journals | NIOTIM</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('images/niotim-logo.jpeg') }}">
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
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
        }

        .hero-gradient {
            background:
                linear-gradient(135deg, rgba(4, 66, 35, 0.96) 0%, rgba(10, 145, 76, 0.9) 100%);
        }

        .journal-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .journal-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 50px rgba(0, 0, 0, 0.12);
        }

        .cover-wrapper {
            background: linear-gradient(145deg, #f0f9f4, #fdfcec);
        }

        .download-button {
            transition: all 0.3s ease;
        }

        .download-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(10, 145, 76, 0.2);
        }

        .nav-scroll {
            background-color: rgba(255, 255, 255, 0.96);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
            backdrop-filter: blur(12px);
        }

        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease-out;
        }

        .mobile-menu.open {
            transform: translateX(0);
        }
    </style>
</head>

<body class="bg-gray-50 text-dark-500">

@include('partials.header')

<section class="hero-gradient pt-36 pb-24 text-white relative overflow-hidden">
    <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-secondary-500/10"></div>
    <div class="absolute -bottom-32 -left-20 w-80 h-80 rounded-full bg-white/5"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 text-sm font-medium mb-6">
                <i class="fas fa-book-open text-secondary-500"></i>
                <span>NIOTIM Publications</span>
            </div>

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                NIOTIM Journals
            </h1>

            <div class="w-20 h-1 bg-secondary-500 mx-auto mb-7"></div>

            <p class="text-lg md:text-xl text-white/85 max-w-3xl mx-auto leading-relaxed">
                Explore our collection of academic and professional publications advancing knowledge in Office Technology and Information Management.
            </p>
        </div>
    </div>
</section>

<section class="py-20 md:py-24">
    <div class="container mx-auto px-4">

        @if($journals->isNotEmpty())
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">
                <div>
                    <p class="text-primary-500 font-semibold uppercase tracking-[0.2em] text-sm mb-3">
                        Publications Library
                    </p>

                    <h2 class="text-3xl md:text-4xl font-bold text-dark-800">
                        Browse Our Journals
                    </h2>

                    <div class="w-16 h-1 bg-secondary-500 mt-5"></div>
                </div>

                <p class="text-gray-500 max-w-md md:text-right">
                    Select a publication to learn more and download the complete journal in PDF format.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($journals as $journal)
                    <article class="journal-card bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-md">
                        <div class="cover-wrapper relative h-80 overflow-hidden">
                            @if($journal->cover_image_url)
                                <img
                                    src="{{ $journal->cover_image_url }}"
                                    alt="{{ $journal->name }}"
                                    class="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <div class="text-center px-8">
                                        <div class="w-20 h-20 rounded-2xl bg-primary-500 text-white mx-auto mb-5 flex items-center justify-center shadow-lg">
                                            <i class="fas fa-book-open text-3xl"></i>
                                        </div>

                                        <p class="text-primary-700 font-bold text-lg">
                                            NIOTIM
                                        </p>

                                        <p class="text-gray-500 text-sm mt-1">
                                            Journal Publication
                                        </p>
                                    </div>
                                </div>
                            @endif

                            <div class="absolute top-5 left-5">
                                <span class="inline-flex items-center px-4 py-2 rounded-full bg-white/95 text-primary-700 text-sm font-bold shadow-md">
                                    {{ $journal->year }}
                                </span>
                            </div>
                        </div>

                        <div class="p-7">
                            <div class="flex flex-wrap items-center gap-2 mb-4">
                                @if($journal->volume)
                                    <span class="px-3 py-1 rounded-full bg-primary-50 text-primary-700 text-xs font-semibold">
                                        Volume {{ $journal->volume }}
                                    </span>
                                @endif

                                @if($journal->issue)
                                    <span class="px-3 py-1 rounded-full bg-accent-100 text-dark-600 text-xs font-semibold">
                                        Issue {{ $journal->issue }}
                                    </span>
                                @endif
                            </div>

                            <h3 class="text-xl font-bold text-dark-800 leading-snug mb-4">
                                {{ $journal->name }}
                            </h3>

                            @if($journal->description)
                                <div class="text-gray-600 text-sm leading-7 mb-6">
                                    {!! Str::limit(strip_tags($journal->description), 180) !!}
                                </div>
                            @else
                                <p class="text-gray-500 text-sm leading-7 mb-6">
                                    Explore this NIOTIM publication and access the complete journal in PDF format.
                                </p>
                            @endif

                            <div class="flex items-center justify-between gap-4 pt-5 border-t border-gray-100">
                                <div class="flex items-center gap-2 text-gray-400 text-sm">
                                    <i class="far fa-calendar"></i>
                                    <span>
                                        {{ $journal->published_at?->format('M Y') ?? $journal->year }}
                                    </span>
                                </div>

                                <a
                                    href="{{ route('journals.download', $journal) }}"
                                    class="download-button inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-primary-500 text-white font-semibold text-sm hover:bg-primary-600"
                                >
                                    <i class="fas fa-download"></i>
                                    <span>Download PDF</span>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="max-w-2xl mx-auto text-center py-20">
                <div class="w-24 h-24 rounded-3xl bg-primary-50 text-primary-500 flex items-center justify-center mx-auto mb-7">
                    <i class="fas fa-book-open text-4xl"></i>
                </div>

                <h2 class="text-3xl font-bold text-dark-800 mb-4">
                    Journals Coming Soon
                </h2>

                <p class="text-gray-500 leading-7 mb-8">
                    Our journal collection is currently being prepared. Please check back soon for new academic and professional publications from NIOTIM.
                </p>

                <a
                    href="{{ route('home') }}"
                    class="inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-primary-500 text-white font-semibold hover:bg-primary-600 transition"
                >
                    <i class="fas fa-arrow-left"></i>
                    <span>Back to Home</span>
                </a>
            </div>
        @endif

    </div>
</section>

<section class="py-20 bg-primary-50">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="bg-primary-500 text-white p-10 md:p-12">
                    <div class="w-14 h-14 rounded-2xl bg-white/15 flex items-center justify-center mb-7">
                        <i class="fas fa-graduation-cap text-2xl"></i>
                    </div>

                    <h2 class="text-3xl font-bold mb-5">
                        Advancing Knowledge
                    </h2>

                    <p class="text-white/85 leading-8">
                        NIOTIM's publications contribute to the development of research, education and professional practice in Office Technology and Information Management.
                    </p>
                </div>

                <div class="p-10 md:p-12">
                    <p class="text-primary-500 font-semibold uppercase tracking-[0.2em] text-sm mb-4">
                        Research & Publications
                    </p>

                    <h3 class="text-2xl font-bold text-dark-800 mb-4">
                        Access knowledge. Share ideas. Shape the future.
                    </h3>

                    <p class="text-gray-600 leading-7">
                        Browse our published journals and download the editions relevant to your academic, professional or research interests.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="bg-dark-900 text-white py-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center justify-between gap-5">
            <p class="text-white/70 text-sm">
                &copy; {{ date('Y') }} NIOTIM. All rights reserved.
            </p>

            <a href="{{ route('home') }}" class="text-sm text-white/80 hover:text-secondary-500 transition">
                Back to NIOTIM
            </a>
        </div>
    </div>
</footer>

<script>
    const navbar = document.getElementById('navbar');

    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('nav-scroll', 'py-2');
            } else {
                navbar.classList.remove('nav-scroll', 'py-2');
            }
        });
    }

    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const closeMenuButton = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu && closeMenuButton) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.add('open');
            document.body.style.overflow = 'hidden';
        });

        closeMenuButton.addEventListener('click', () => {
            mobileMenu.classList.remove('open');
            document.body.style.overflow = 'auto';
        });

        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('open');
                document.body.style.overflow = 'auto';
            });
        });
    }

    function toggleSubmenu(id) {
        const submenu = document.getElementById(id);

        if (submenu) {
            submenu.classList.toggle('hidden');
        }
    }
</script>

</body>
</html>