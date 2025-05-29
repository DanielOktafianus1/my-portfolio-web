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

    {{-- Remix Icon CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />

    {{-- Bootstrap 5.3 Folder Address --}}
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.5-dist/css/bootstrap.min.css') }}">

    {{-- Css File Address --}}
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aboutMe.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skills.css') }}">
    <link rel="stylesheet" href="{{ asset('css/experience.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hireMe.css') }}">
    <link rel="stylesheet" href="{{ asset('css/certificate.css') }}">

    <title>PORTLINE</title>

</head>


<body style="background-color: #94897944">
    <div class="baseContainer">
        {{-- Navbar Start --}}
        <nav class="navbarContainer" id="navbarSticky">
            <div class="logoContainer">
                <a href="">
                    <h3>
                        <i>OKT</i>
                        <div style="color: rgb(205, 31, 31)">.</div>
                        DNL
                    </h3>
                </a>
            </div>
            <div class="menuBarContainer">
                <ul>
                    <li>
                        <a class="aboutMeMenu" data-section="aboutMe">
                            About Me</a>
                        <div class="underline"></div>
                    </li>

                    <li>
                        <a class="skillsMenu" data-section="skills">Skills <i
                                class="ri-arrow-down-s-line iconDropdown"></i></a>
                        <div class="underline"></div>

                        <ul class="subCategorySkills">
                            <li>
                                <a class="hardSkillsMenu">Hard Skills</a>
                            </li>
                            <li>
                                <a class="softSkillsMenu">Soft Skills</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="experiencesMenu" data-section="experience">Experiences <i
                                class="ri-arrow-down-s-line iconDropdown"></i></a>
                        <div class="underline"></div>

                        <ul class="subCategoryExperiences">
                            <li>
                                <a class="workExperiencesMenu" style="color: white">Work Experiences</a>
                            </li>
                            <li>
                                <a class="projectShowcaseMenu" style="color: white">Project Showcases</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a style="font-weight: bold; color: #948979" class="hireMeMenu" data-section="hireMe"> <i
                                class="ri-mail-send-fill"></i>
                            Hire Me </a>
                        <div class="underline"></div>
                    </li>
                </ul>

                {{-- Contact Me (Mobile) --}}
                <div class="contactMeContainer">
                    <a style="font-weight: bold; color: #948979; text-decoration:none" class="hireMeMenu"
                        data-section="hireMe"><i class="ri-mail-send-fill"></i>
                        Hire Me</a>
                </div>

                {{-- Menu Icon --}}
                <div class="menuIcon" id="menuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </div>
        </nav>

        {{-- Mobile menu --}}
        <nav class="sidebarContainerMobile" id="sidebarMobile">
            <ul>
                <li>
                    <a class="aboutMeMenu" data-section="aboutMe">About Me</a>
                    <div class="underline"></div>
                </li>

                <li>
                    <div style="display: flex; justify-content:space-between">
                        <a class="skillsMenu" data-section="skills">Skills</a>
                        <i class="ri-arrow-down-s-line iconDropdownMobile" data-target="subCategorySkillsMobile"></i>
                    </div>
                    <div class="underline"></div>

                    <ul class="subCategorySkillsMobile" id="subCategorySkillsMobile">
                        <li>
                            <a class="hardSkillsMenu">Hard Skills</a>
                        </li>
                        <li>
                            <a class="softSkillsMenu">Soft Skills</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <div style="display: flex; justify-content:space-between">
                        <a class="experiencesMenu" data-section="experience">Experiences</a>
                        <i class="ri-arrow-down-s-line iconDropdownMobile"
                            data-target="subCategoryExperiencesMobile"></i>
                    </div>
                    <div class="underline"></div>

                    <ul class="subCategoryExperiencesMobile" id="subCategoryExperiencesMobile">
                        <li>
                            <a class="workExperiencesMenu">Work Experiences</a>
                        </li>
                        <li>
                            <a class="projectShowcaseMenu">Project Showcases</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        {{-- Navbar End --}}

        {{-- Main Content Start --}}
        <main class="mainContentContainer">
            @yield('mainClientContent')
        </main>
        {{-- Main Content End --}}

        {{-- Footer Start --}}
        <footer>
            {{-- Hire Me --}}

            <div class="hireMeContainer">
                <div class="hireMeWrapper">
                    <div class="contactMeWrapper">
                        <h2>Contact Me</h2>
                        <div class="contactAddress">
                            <ul>
                                <li><i class="ri-mail-fill"></i> danieloktafianus60@gmail.com</li>
                                <li><i class="ri-whatsapp-line"></i> +6285718447093</li>
                                <li><i class="ri-github-fill"></i> Danieloktafianus1</li>
                                <li><i class="ri-instagram-fill "></i> dnl.okt</li>
                            </ul>
                        </div>

                        <h2>My Loction</h2>
                        <div class="location">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4018076034145!2d106.73201887349585!3d-6.210617993777241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7501a4001bb%3A0x165b06848a11b2d3!2sGg.%20Mutiara%2C%20Meruya%20Sel.%2C%20Kec.%20Kembangan%2C%20Kota%20Jakarta%20Barat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2011650!5e0!3m2!1sid!2sid!4v1747678554521!5m2!1sid!2sid"
                                width="" height="" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="formEmailContainer">

                        <div class="formEmail" id="hireMe">
                            <form action="{{ route('hireMe') }}" method="POST">
                                @csrf
                                <h2>Hire Me</h2>

                                <div class="emailContainer">
                                    <input type="email" id="formEmail" placeholder=" " name="email">
                                    <label for="formEmail">Email Address</label>
                                    <span class="errorEmail"></span>
                                </div>
                                <div class="subjectContainer">
                                    <input type="text" id="formSubjectEmail" placeholder=" " name="subject">
                                    <label for="formSubjectEmail">Email Subject</label>
                                    <span class="errorSubject"></span>
                                </div>
                                <div class="messageContainer">
                                    <textarea name="message" id="formMessage" cols="30" rows="5" placeholder=" "></textarea>
                                    <label for="formMessage">Message</label>
                                    <span class="errorMessage"></span>
                                </div>

                                <div>
                                    @error('g-recaptcha-response')
                                        <span class="errorReCaptcha">{{ $message }}</span>
                                    @enderror
                                    <div class="g-recaptcha mb-5 recaptchaContainer"
                                        data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}">
                                    </div>
                                </div>

                                <div class="containerButton">
                                    <button type="submit">Send Message <i class="ri-send-plane-fill"></i></button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <div
                    style="text-align: center; padding:25px 20px; color:rgb(126, 126, 126); font-weight:700; font-size:15px">
                    &copy; 2025 Daniel Oktafianus. All right reserved
                </div>
            </div>
        </footer>
        {{-- Footer End --}}
    </div>



    <script>
        // Navbar Sticky
        window.addEventListener('scroll', function() {
            const navbarSticky = document.getElementById('navbarSticky');
            const sidebarMobile = document.getElementById('sidebarMobile')
            const menuToggle = document.getElementById('menuToggle')
            if (window.scrollY > 100) {
                navbarSticky.classList.add('navSticky');
            } else {
                navbarSticky.classList.remove('navSticky');
            }

            if (window.scrollY) {
                sidebarMobile.classList.remove('sidebarToggle')
                menuToggle.classList.remove('active')
            }
        })

        // Menu Icon
        const menuToggle = document.getElementById('menuToggle')
        const sidebarMobile = document.getElementById('sidebarMobile')
        menuToggle.addEventListener('click', function() {
            this.classList.toggle('active')
            sidebarMobile.classList.toggle('sidebarToggle')
        })

        // Dropdown Menu
        document.querySelectorAll('.iconDropdownMobile').forEach(function(element) {
            element.addEventListener('click', function() {
                this.classList.toggle('rotate')

                const targetId = this.getAttribute('data-target');
                const targetElement = document.getElementById(targetId);

                targetElement.classList.toggle('dropDown')
            });
        })


        // Alert sent email

        const button = document.querySelector('.containerButton button');

        // Email require
        document.getElementById('formEmail').addEventListener('input', (inputEmail) => {

            let isValid = true;

            const email = inputEmail.target.value;
            const errorEmail = document.querySelector('.errorEmail');
            errorEmail.textContent = '';
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

            if (!email) {
                errorEmail.textContent = 'Email must be filled in!';
                isValid = false
            } else if (!emailPattern.test(email)) {
                errorEmail.textContent = 'Invalid email!';
                isValid = false;
            }

            if (isValid == true) {
                button.disabled = false
            } else {
                button.disabled = true
            }
        });

        // Subject require
        document.getElementById('formSubjectEmail').addEventListener('input', (inputSubject) => {

            let isValid = true

            const subject = inputSubject.target.value;
            const errorSubject = document.querySelector('.errorSubject');
            errorSubject.textContent = '';
            const subjectPattern = /^[a-zA-Z0-9\s._,'-]{1,200}$/;

            if (!subject) {
                errorSubject.textContent = 'Subject must be filled in!';
                isValid = false
            } else if (!subjectPattern.test(subject)) {
                errorSubject.textContent = 'Invalid email subject!'
                isValid = false
            }

            if (isValid == true) {
                button.disabled = false
            } else {
                button.disabled = true
            }
        });


        // Message require
        document.getElementById('formMessage').addEventListener('input', (inputMessage) => {
            let isValid = true

            const message = inputMessage.target.value;
            const erroMessage = document.querySelector('.errorMessage');
            erroMessage.textContent = '';

            const messagePattern = /^[a-zA-Z0-9\s.,;:!?'"@()\-_\n\r]{1,700}$/;

            if (!message) {
                erroMessage.textContent = 'Message must be filled in!';
                isValid = false
            } else if (!messagePattern.text(message)) {
                erroMessage.textContent = 'Invalid Message!';
                isValid = false
            }

            if (isValid == true) {
                button.disabled = false
            } else {
                button.disabled = true
            }
        })

        // Menu click
        document.addEventListener('DOMContentLoaded', () => {
            const underlines = document.querySelectorAll('.underline');
            const aboutMe = document.getElementById('aboutMe');
            const sectionIds = ['aboutMe', 'skills', 'experience', 'hireMe']
            const sections = sectionIds.map(id => document.getElementById(id))
            let activeMenuIndex = null

            document.querySelectorAll('.aboutMeMenu, .hireMeMenu, .experiencesMenu, .skillsMenu').forEach((event,
                index) => {
                event.addEventListener('click', () => {

                    const targetId = event.getAttribute('data-section');
                    const index = sectionIds.indexOf(targetId);

                    if (index !== -1) {
                        activeMenuIndex = index;
                        sections[index].scrollIntoView({
                            behavior: 'smooth',
                            block: 'nearest'
                        })
                    }
                });
            });


            function updateUnderline(indexToUse) {
                underlines.forEach((underline, idx) => {
                    underline.style.width = (idx === indexToUse) ? '100%' : '0%';

                })
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {

                    const rect = entry.target.getBoundingClientRect();
                    const viewportCenter = entry.isIntersecting ? 0.1 : 0;

                    if (viewportCenter) {
                        const id = entry.target.id;
                        const indexToUse = sectionIds.indexOf(id);
                        updateUnderline(indexToUse)
                        activeMenuIndex = indexToUse;
                    } else {

                        underlines.forEach((underline) => {
                            underline.style.width = '0%';
                        })

                        activeMenuIndex = null
                    }

                })
            }, {
                threshold: 0.7
            });

            sections.forEach(section => observer.observe(section))
        })

        // // Sub Menu click
        const skills = document.getElementById('skills');

        // Hard Skills
        document.querySelectorAll('.hardSkillsMenu').forEach((event, index) => {
            event.addEventListener('click', () => {
                skills.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                })

                document.querySelectorAll('.hardSkillsContainer').forEach(function(eventSoftSkills) {
                    eventSoftSkills.style.display = 'block';

                });
                document.querySelectorAll('.softSkillsContainer').forEach(function(eventSoftSkills) {
                    eventSoftSkills.style.display = 'none';
                });

                borderBottom.forEach(function(e, index) {
                    if (index === 0) {
                        e.classList.add('active');
                    } else {
                        e.classList.remove('active');
                    }
                });

                document.querySelectorAll('.hardSkillDesc').forEach(function(skillDesc, i) {
                    if (i === 0) {
                        const isActive = skillDesc.classList.contains('active')

                        if (!isActive) {
                            skillDesc.classList.add('active');
                            skillDesc.style.maxHeight = skillDesc.scrollHeight + 'px';
                        }

                        document.querySelectorAll('.hardSkillTitle i').forEach(function(icon,
                            index) {
                            if (index === i) {

                                const rotateIcon = icon.classList.contains('active');

                                if (!rotateIcon) {
                                    icon.classList.add('active');
                                }
                            } else {
                                icon.classList.remove('active');
                            }
                        })
                    } else {
                        skillDesc.classList.remove('active')
                        skillDesc.style.maxHeight = null;
                    }
                });
            })
        })

        // Soft Skills
        document.querySelectorAll('.softSkillsMenu').forEach((event, index) => {
            event.addEventListener('click', () => {
                skills.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                })

                document.querySelectorAll('.softSkillsContainer').forEach(function(eventSoftSkills) {
                    eventSoftSkills.style.display = 'block';

                });

                document.querySelectorAll('.hardSkillsContainer').forEach(function(eventHardSkills) {
                    eventHardSkills.style.display = 'none';
                });

                borderBottom.forEach(function(e, index) {
                    if (index === 1) {
                        e.classList.add('active');
                    } else {
                        e.classList.remove('active');
                    }
                });

                document.querySelectorAll('.softSkillDesc').forEach(function(skillDesc, i) {
                    if (i === 0) {

                        const isActive = skillDesc.classList.contains('active');

                        if (!isActive) {
                            skillDesc.classList.add('active');
                            skillDesc.style.maxHeight = skillDesc.scrollHeight + 'px';
                        }

                        const icon = document.querySelectorAll('.softSkillTitle i').forEach(
                            function(icon,
                                index) {

                                if (index === i) {

                                    const rotateIcon = icon.classList.contains('active');

                                    if (!rotateIcon) {
                                        icon.classList.add('active');
                                    }
                                } else {
                                    icon.classList.remove('active');
                                }
                            });
                    } else {
                        skillDesc.classList.remove('active')
                        skillDesc.style.maxHeight = null;
                    }
                });
            })
        })


        const exprcs = document.getElementById('experience');

        // Work Experience
        document.querySelectorAll('.workExperiencesMenu').forEach((event, index) => {
            event.addEventListener('click', () => {
                exprcs.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                })

                workExperience.style.display = 'block';
                projectShowcase.style.display = 'none';

                btnWorkExperiences.classList.add('active')
                btnProjectShowcase.classList.remove('active')
            })
        })

        // Project Showcase
        document.querySelectorAll('.projectShowcaseMenu').forEach((event, index) => {
            event.addEventListener('click', () => {
                exprcs.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                })

                workExperience.style.display = 'none';
                projectShowcase.style.display = 'block';

                btnProjectShowcase.classList.add('active')
                btnWorkExperiences.classList.remove('active')
            })
        })
    </script>


    <script async src="https://www.google.com/recaptcha/api.js"></script>

</body>

</html>
