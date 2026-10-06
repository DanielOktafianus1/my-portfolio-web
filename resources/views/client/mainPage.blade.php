@extends('client.base')
@section('mainClientContent')
    <div>
        {{-- Hero Section --}}
        <section class="heroContainer">
            <div class="plus">
                <div>+</div>
                <div>+</div>
                <div>+</div>
                <div>+</div>
            </div>
            <div class="heroWrapper">
                <div class="heroWellcome scrollEffect">
                    <h1>Welcome to <br> My Personal Website</h1>
                </div>
                <div class="heroContent">
                    {{-- <div class="heroImgContainer">
                        <img src="{{ asset('staticImages/logo.png') }}" alt="">
                    </div> --}}
                    <div class="heroNameContainer">
                        <!-- DAN -->
                        <span>D</span><span>A</span><span>N</span>

                        <!-- IEL -->
                        <span>I</span><span>E</span><span>L</span>

                        <!-- OKTAF -->
                        <span>O</span><span>K</span><span>T</span><span>A</span><span>F</span>

                        <!-- IANUS -->
                        <span>I</span><span>A</span><span>N</span><span>U</span><span>S</span>

                    </div>
                </div>
                <div class="continueScrollText scrollEffect">
                    <div></div>
                    <h5>Keep scrolling to explore my journey.</h5>
                </div>
            </div>
            <div class="plus">
                <div>+</div>
                <div>+</div>
                <div>+</div>
                <div>+</div>
            </div>
        </section>

        <br>
        <br>
        <br>
        <br>

        {{-- About Me Section --}}
        <div class="logoTransition">
            <img src="{{ asset('staticImages/wlogo.png') }}" alt="">
        </div>
        <section class="aboutMeContainer aboutMeCamera" id="aboutMeSec">
            <svg class="lineAboutMe" viewBox="0 0 1000 1000" preserveAspectRatio="none">

                <defs>
                    <linearGradient id="blueGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#b8e3ff" />
                        <stop offset="100%" stop-color="#379dfc" />
                    </linearGradient>

                    <filter id="softShadow" x="-30%" y="-30%" width="180%" height="180%">
                        <feDropShadow dx="0" dy="8" stdDeviation="12" flood-color="#8ccfff"
                            flood-opacity="0.6" />
                    </filter>
                </defs>

                <!-- DESKTOP PATH -->
                <path class="scrollLine desktopLine"
                    d="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  M 0 40
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  C 360 140, 430 500, 340 800
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  C 260 1040, 110 820, 160 520
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  C 220 240, 450 360, 500 600
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  C 560 860, 750 240, 1050 650
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "
                    stroke="url(#blueGradient)" stroke-width="40" fill="none" stroke-linecap="round"
                    vector-effect="non-scaling-stroke" stroke-linejoin="round" filter="url(#softShadow)" />

                <!-- MOBILE PATH (LEBIH PENDEK & SIMPLE) -->
                <path class="scrollLine mobileLine"
                    d="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  M 0 30
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  C 50 50, 650 100, 650 400
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  C 670 700, 240 700, 200 540
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  C 170 350, 650 70, 1500 1200
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                "
                    stroke="url(#blueGradient)" stroke-width="30" fill="none" stroke-linecap="round"
                    vector-effect="non-scaling-stroke" stroke-linejoin="round" filter="url(#softShadow)" />

            </svg>


            <div class="OWAboutMe scrollEffect">
                <h1>Allow Me to Introduce <br> Myself Further</h1>
            </div>

            <div class="aboutMeContent ">

                <div class="aboutMeContentLeft scrollEffect">
                    <div class="targetZoom ">
                        <img src="{{ asset('staticImages/wlogo.png') }}" alt="">
                    </div>
                </div>
                <div class="aboutMeContentRight scrollEffect">
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam magni at perspiciatis quidem.
                            Repellendus, neque! Cumque velit sequi, sed obcaecati unde ratione labore iure, culpa
                            expedita
                            aliquam vero quam iusto! Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, ex
                            consequatur. Delectus, fugit quae! Vel alias, quod placeat vero aspernatur dolores, veniam
                            repellat
                            perspiciatis sit a voluptatem nisi dignissimos unde!</p>

                        <button type="button" class="btnAboutMe">
                            <i class="ri-arrow-right-long-line"></i>
                            <span>ABOUT ME</span>
                            <div></div>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <br>
        <br>
        {{-- <br> --}}
        {{-- <br> --}}

        {{-- Skills Section --}}
        <section class="skillsContainer">
            <div class="OWskills ">
                <h1 class="scrollEffect">An Overview</h1>
                <h1 class="scrollEffect">of My Skills</h1>
            </div>

            {{-- Content Skills --}}
            <div class="skillsWrapper" id="brainContainer">

                <svg class="lineSkills" viewBox="0 0 1000 1000" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="blueGradientSkill" x1="100%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" stop-color="#379dfc" />
                            <stop offset="100%" stop-color="#2563eb" />
                        </linearGradient>

                        <filter id="softShadow" x="-30%" y="-30%" width="180%" height="180%">
                            <feDropShadow dx="0" dy="8" stdDeviation="12" flood-color="#8ccfff"
                                flood-opacity="0.6" />
                        </filter>
                    </defs>


                    <path class="scrollSkillLine desktopLineSkill"
                        d="M 1060,-10
                                                                                                                                                                                                                                                                                                                                                                                                                                        C 900,50 800,200 960,600
                                                                                                                                                                                                                                                                                                                                                                                                                                        S 550,1300 750,300
                                                                                                                                                                                                                                                                                                                                                                                                                                        S 200,-200 500,200
                                                                                                                                                                                                                                                                                                                                                                                                                                        S 300,1000 -100,100"
                        stroke="url(#blueGradientSkill)" stroke-width="40" fill="none" stroke-linecap="round"
                        vector-effect="non-scaling-stroke" stroke-linejoin="round" filter="url(#softShadow)" />

                    <path class="scrollSkillLine mobileLineSkill"
                        d="M 1100,50
                                                                                                                                                                                                                                                                                                                                                                                                                                            C 700,100 400,300 600,450
                                                                                                                                                                                                                                                                                                                                                                                                                                            S 900,600 600,750
                                                                                                                                                                                                                                                                                                                                                                                                                                            S 300,1000 1100,1100"
                        stroke="url(#blueGradientSkill)" stroke-width="30" fill="none" stroke-linecap="round"
                        vector-effect="non-scaling-stroke" stroke-linejoin="round" filter="url(#softShadow)" />
                </svg>

                <div>
                    <p class="scrollEffect">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates, minima
                        unde! Eos laboriosam libero nam repellat ea explicabo possimus. Ducimus placeat hic ullam
                        dignissimos astem temporibus doloribus dolorem iure lalal perspiciatis?</p>
                </div>

                <svg style="position: absolute; width: 0; height: 0; pointer-events: none; visibility: hidden;">
                    <defs>
                        <filter id="fluid-cloth-filter" x="-30%" y="-30%" width="160%" height="160%">
                            <feTurbulence type="fractalNoise" baseFrequency="0.015 0.04" numOctaves="2"
                                result="noise" />
                            <feDisplacementMap id="cloth-disp" in="SourceGraphic" in2="noise" scale="0"
                                xChannelSelector="R" yChannelSelector="G" />
                        </filter>
                    </defs>
                </svg>

                <div class="skillsContainerContent">
                    <div class="sk-card-track">
                        <div class="sk-revolving-card">
                            <h3>Web Development</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta quae magnam excepturi,
                                voluptates nihil vel odit vero quidem dolorum, expedita maiores! Culpa velit eos quam rerum
                                exercitationem tempora ad dignissimos!
                            </p>
                        </div>
                        <div class="sk-revolving-card">
                            <h3>3D & Interactive</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta quae magnam excepturi,
                                voluptates nihil vel odit vero quidem dolorum, expedita maiores! Culpa velit eos quam rerum
                                exercitationem tempora ad dignissimos!
                            </p>
                        </div>
                        <div class="sk-revolving-card">
                            <h3>Cyber Security</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta quae magnam excepturi,
                                voluptates nihil vel odit vero quidem , expedita maiores! Culpa velit eos quam rerum
                                exercitationem tempora ad dignissimos!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
