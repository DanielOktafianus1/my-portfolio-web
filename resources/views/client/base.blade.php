<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- font logo CDN --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&display=swap" rel="stylesheet">

    {{-- font  CDN --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    {{-- font CDN about me --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=BBH+Sans+Bogle&family=Bebas+Neue&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Orbitron:wght@400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    {{-- CDN Font Skill --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Oswald:wght@200..700&family=Stack+Sans+Headline:wght@200..700&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Bebas+Neue&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Oswald:wght@200..700&family=Stack+Sans+Headline:wght@200..700&display=swap"
        rel="stylesheet">

    {{-- Remix Icon CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet" />

    {{-- Bootstrap 5.3 Folder Address --}}
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.min.css') }}">


    {{-- Css File Address --}}
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aboutMe.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skills.css') }}">
    <link rel="stylesheet" href="{{ asset('css/experience.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hireMe.css') }}">
    <link rel="stylesheet" href="{{ asset('css/certificate.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('staticImages/logo.png') }}">
    <title>Creative Web Portfolio | Daniel Oktafianus</title>

</head>


<body style="background-color: #94897914" class="contentLoaded">

    <div class="baseContainer">
        {{-- Navbar Start --}}
        <nav class="navbarContainer" id="navbarSticky">

            {{-- Logo --}}
            <div class="logoContainer">
                <a href="" style="display: flex; gap:0px">
                    <div style="width:40px; height:40px; overflow:hidden">
                        <img src="{{ request()->routeIs('aboutMe') ? asset('staticImages/wlogo.png') : asset('staticImages/logo.png') }}"
                            alt="" style="height: 100%; width:100%; object-fit:fill;" id="logoImg">
                    </div>
                    <h3 class="{{ request()->is('about-me*') ? 'text-white' : '' }} ">
                        Daniel Oktafianus
                    </h3>
                </a>
            </div>

            <div class="menuBarContainer">
                {{-- Hire Me --}}
                <div class="hireMeMenu">
                    <i class="ri-arrow-right-long-line"></i>
                    <p>CONTACT ME</p>
                    <div></div>
                </div>
                <div class="wrapperMenu">
                    <div class="containerMenu">
                        <p class="text-menu active">MENU</p>
                        <p class="text-menu next">CLOSE</p>
                    </div>
                    {{-- Menu Icon --}}
                    <div class="containerIconMenu">
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>

            {{-- List Menu --}}
            <div class="containerListMenu">
                <ul>
                    <li>About Me</li>
                    <li>Skills</li>
                    <li>Experiences</li>
                </ul>
                <ul>
                    <li>Certificates</li>
                </ul>
            </div>
        </nav>

        {{-- Navbar End --}}

        {{-- Main Content Start --}}
        <main class="mainContentContainer">
            @yield('mainClientContent')
        </main>
        {{-- Main Content End --}}

    </div>


    {{-- CDN ReCaptha --}}
    <script async src="https://www.google.com/recaptcha/api.js"></script>

    {{-- CDN Sweet Alert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- CDN Tree.js --}}
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/face_mesh/face_mesh.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@mediapipe/camera_utils/camera_utils.js"></script>
    <script type="module" src="{{ asset('js/aboutMe.js') }}"></script>
    <script type="module" src="{{ asset('js/skills.js') }}"></script>
    <script src="{{ asset('js/hero.js') }}"></script>

    <script>
        window.routes = {
            baseUrl: "{{ url('/') }}"
        };

        window.assets = {
            logo: "{{ asset('staticImages/logo.png') }}",
            wlogo: "{{ asset('staticImages/wlogo.png') }}",
            avatarLeft: "{{ asset('staticImages/fotoDaniel2.png') }}",
            avatarCenter: "{{ asset('staticImages/fotoDaniel.png') }}",
            avatarRight: "{{ asset('staticImages/danielFull.png') }}",
        };
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Menu Click
            const wrapperMenu = document.querySelector('.wrapperMenu')
            const hireMeMenu = document.querySelector('.hireMeMenu')
            const containerIconMenu = document.querySelector('.containerIconMenu')
            const containerMenu = document.querySelector('.containerMenu')

            const containerListMenu = document.querySelector('.containerListMenu')
            const secFirst = document.querySelector('.containerListMenu ul:first-child')
            const secLast = document.querySelector('.containerListMenu ul:last-child')
            const isMobile = window.innerWidth <= 600;

            let sts = false

            wrapperMenu.addEventListener('click', function() {
                const active = containerMenu.querySelector('.text-menu.active');
                const next = containerMenu.querySelector('.text-menu.next');

                if (sts === false) {
                    containerIconMenu.classList.add('active')
                    containerListMenu.classList.add('active')
                    secFirst.classList.add('active')
                    secLast.classList.add('active')
                    hireMeMenu.classList.add('active')
                    document.body.classList.add('active')

                    if (isMobile) document.body.classList.add('blur-bg');

                    sts = true
                } else {
                    containerIconMenu.classList.remove('active')
                    containerListMenu.classList.remove('active')
                    secFirst.classList.remove('active')
                    secLast.classList.remove('active')
                    hireMeMenu.classList.remove('active')
                    document.body.classList.remove('active')
                    if (isMobile) document.body.classList.remove('blur-bg');

                    sts = false
                }

                active.classList.toggle('active');
                active.classList.toggle('next');
                next.classList.toggle('next');
                next.classList.toggle('active');
            })


            const scrollEffect = document.querySelectorAll('.scrollEffect');

            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("active");
                        } else {
                            entry.target.classList.remove("active");
                        }
                    });
                }, {
                    threshold: 0.3
                }
            )

            scrollEffect.forEach(el => observer.observe(el))
        });
    </script>



    @if (Session::has('sentEmailSucess'))
        <script>
            Swal.fire({
                title: "SUCCESS!",
                icon: "success",
                text: `{{ Session::get('sentEmailSucess') }}`,
                // timer: 5000,
                draggable: true
            });
        </script>
    @endif
    @if (Session::has('sentEmailFail'))
        <script>
            Swal.fire({
                title: "FAIL!",
                icon: "error",
                text: `{{ Session::get('sentEmailFail') }}`,
                // timer: 5000,
                draggable: true
            });
        </script>
    @endif




</body>

</html>
