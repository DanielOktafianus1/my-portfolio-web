@extends('client.base')
@section('mainClientContent')
    {{-- Home --}}
    <div class="homeContainer">
        <div class="textHome">
            <h1><i>Welcome,</i> </h1>
            <h2> to my portfolio website.</h2>
            <p>Welcome to my portfolio! Here, you can check out my projects and work experience. I enjoy trying new things
                and finding the right solutions for every need. Feel free to explore my work!</p>

            <div class="containerIconNext">
                <a onclick="document.getElementById('subMenu').scrollIntoView({behavior: 'smooth', block:'center'})"
                    style="text-decoration: none; color:white">
                    <i class="ri-arrow-down-wide-line"></i>
                </a>
            </div>
        </div>
        <div class="homeImageContainer">
            <img src="{{ asset('staticImages/logoDaniel.png') }}" alt="" class="imgHome">
        </div>
    </div>

    {{-- Sub Menu --}}
    <div>
        <ul class="subMenu" id="subMenu">
            <a onclick="document.getElementById('hireMe').scrollIntoView({behavior: 'smooth', block: 'center'})">
                <li>
                    <i class="ri-mail-send-fill"></i>
                    Hire Me
                </li>
            </a>
            <a onclick="document.getElementById('aboutMe').scrollIntoView({behavior: 'smooth', block:'center'})">
                <li>
                    <i class="ri-folder-user-fill"></i>
                    About Me
                </li>
            </a>
            <a>
                <li class="hardSkillsMenu">
                    <i class="ri-settings-3-fill"></i>
                    Hard Skills
                </li>
            </a>
            <a>
                <li class="softSkillsMenu">
                    <i class="ri-settings-3-fill"></i>
                    Soft Skills
                </li>
            </a>
            <a>
                <li class="workExperiencesMenu">
                    <i class="ri-macbook-fill"></i>
                    Work Experiences
                </li>
            </a>
            <a>
                <li class="projectShowcaseMenu">
                    <i class="ri-book-shelf-fill"></i>
                    Project Showcases
                </li>
            </a>
            <a>
                <li id="certificate">
                    <i class="ri-file-list-3-fill"></i>
                    Certificates
                </li>
            </a>

        </ul>
    </div>

    {{-- About Me --}}
    <div class="aboutMeContainer" id="aboutMe">
        <h1>
            About <div style="color: red">Me</div>
        </h1>


        <div class="profileContainer">
            <div class="imgProfileContainer">
                <img src="{{ asset('staticImages/fotoDaniel.png') }}" alt="" class="imgProfile">
            </div>
            <div class="textProfileContainer">
                <div class="headerTextProfile">
                    <div>
                        <img src="{{ asset('staticImages/contoh1.jpg') }}" alt="" width="100%" height="100%">
                    </div>
                    <h5>
                        Daniel Oktafianus
                    </h5>
                </div>
                <div class="bodyTextProfile">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore eveniet culpa cupiditate quaerat
                        ullam
                        nam delectus voluptatum dolor repellat rerum id, tempore nesciunt explicabo provident. Veritatis ad
                        impedit enim repellendus.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto vitae assumenda amet fuga odit
                        beatae, fugit magni inventore itaque iste excepturi similique tenetur repellat harum, temporibus
                        modi et aspernatur corrupti.
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam nesciunt necessitatibus neque
                        cupiditate eius sequi debitis nihil quia aspernatur iste consectetur, enim corporis voluptatibus
                        facilis qui rerum quam, omnis sapiente.
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae iste nam quam nesciunt perferendis
                        optio omnis magnam illum! Expedita amet provident asperiores in tenetur iste quaerat, exercitationem
                        mollitia alias culpa!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad molestiae esse nostrum velit magni et
                        reprehenderit impedit, dicta possimus eum iste cupiditate assumenda dolorum ex quos laborum
                        asperiores vitae accusantium!
                    </p>
                </div>
                <div class="footerTextProfile">
                    <div>
                        <div>
                            <a href="" class="iconSosmed">
                                <i class="ri-instagram-fill "></i>
                                <span class="textIcon">Instagram</span>
                            </a>
                            <a href="" class="iconSosmed">
                                <i class="ri-instagram-fill "></i>
                                <span class="textIcon">Instagram</span>
                            </a>
                            <a href="" class="iconSosmed">
                                <i class="ri-instagram-fill "></i>
                                <span class="textIcon">Instagram</span>
                            </a>
                            <a href="" class="iconSosmed">
                                <i class="ri-instagram-fill "></i>
                                <span class="textIcon">Instagram</span>
                            </a>

                        </div>
                        <div>
                            <a href="" class="iconDownload">
                                <i class="ri-download-2-line"></i>
                                <span>Download CV</span>
                            </a>
                        </div>
                    </div>

                    <p>Update On: January 10 2024</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Skills --}}
    <div class="skillsContainer" id="skills">
        <div class="subSkillsContainer">
            <h1>Skills</h1>
            <ul>
                <li id="hardSkills">
                    <h5>Hard Skills</h5>
                    <div></div>
                </li>
                <li id="softSkills">
                    <h5>Soft Skills</h5>
                    <div></div>
                </li>
            </ul>
        </div>

        <div class="skillsContentContainer">

            {{-- Hard Skills --}}
            <div class="hardSkillsContainer">
                <div class="hardSkillTitle">
                    <div>JavaScript</div>
                    <i class="ri-arrow-down-s-line"></i>
                </div>
                <div class="hardSkillDesc">
                    <div>
                        <p>0%</p>
                        <span>
                            <progress value="100" max="100" min="1"> </progress>
                            <h6></h6>
                        </span>
                        <p>100%</p>
                    </div>

                    Konten 1 ipsum dolor sit amet consectetur adipisicing elit. Doloribus labore qui sunt, vero minus id
                    quibusdam hic nostrum? Officia, tenetur tempora velit fuga saepe quisquam odio distinctio. Culpa,
                    illum
                    temporibus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque veniam et vitae,
                    architecto optio in id odio dolorem accusantium, accusamus ex quos delectus totam quis iure
                    veritatis
                    commodi quo quas.
                </div>
            </div>
            <div class="hardSkillsContainer">
                <div class="hardSkillTitle">
                    <div>PHP</div>
                    <i class="ri-arrow-down-s-line"></i>
                </div>
                <div class="hardSkillDesc">
                    <div>
                        <p>0%</p>
                        <span>
                            <progress value="90" max="100" min="1"></progress>
                            <h6></h6>
                        </span>
                        <p>100%</p>
                    </div>

                    Untuk menampilkan dan menyembunyikan deskripsi keterampilan (skill descriptions) secara dinamis dengan
                    transisi yang halus dan responsif terhadap konten yang berbeda-beda panjangnya, kita dapat menggunakan
                    pendekatan kombinasi antara JavaScript dan CSS di mana elemen deskripsi diberikan efek transisi melalui
                    properti max-height dan opacity, sementara nilai max-height disesuaikan secara real-time menggunakan
                    properti scrollHeight dari JavaScript, sehingga ketika pengguna mengklik salah satu judul keterampilan,
                    sistem secara otomatis akan menentukan tinggi maksimum aktual dari konten tersebut dan menerapkannya ke
                    dalam elemen terkait, memungkinkan animasi slide-down terjadi dengan mulus tanpa membatasi isi konten,
                    serta sekaligus menutup elemen lainnya dengan cara menghapus class active dan menghapus nilai max-height
                    agar kembali ke kondisi tersembunyi, sehingga pengalaman interaktif yang diberikan menjadi lebih
                    fleksibel, elegan, dan sesuai dengan praktik UI/UX modern.
                </div>
            </div>

            {{-- Soft Skills --}}
            <div class="softSkillsContainer">
                <div class="softSkillTitle">
                    <div>Leadership</div>
                    <i class="ri-arrow-down-s-line"></i>
                </div>
                <div class="softSkillDesc">

                    <div>
                        <p>0%</p>
                        <span>
                            <progress value="100" max="100" min="1"></progress>
                            <h6></h6>
                        </span>
                        <p>100%</p>
                    </div>

                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus labore qui sunt, vero minus id
                    quibusdam hic nostrum? Officia, tenetur tempora velit fuga saepe quisquam odio distinctio. Culpa,
                    illum
                    temporibus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque veniam et vitae,
                    architecto optio in id odio dolorem accusantium, accusamus ex quos delectus totam quis iure
                    veritatis
                    commodi quo quas.
                </div>
            </div>
            <div class="softSkillsContainer">
                <div class="softSkillTitle">
                    <div>Problem Solving</div>
                    <i class="ri-arrow-down-s-line"></i>
                </div>
                <div class="softSkillDesc">

                    <div>
                        <p>0%</p>
                        <span>
                            <progress value="45" max="100" min="1"></progress>
                            <h6></h6>
                        </span>
                        <p>100%</p>
                    </div>

                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus labore qui sunt, vero minus id
                    quibusdam hic nostrum? Officia, tenetur tempora velit fuga saepe quisquam odio distinctio. Culpa,
                    illum
                    temporibus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque veniam et vitae,
                    architecto optio in id odio dolorem accusantium, accusamus ex quos delectus totam quis iure
                    veritatis
                    commodi quo quas.
                </div>
            </div>
        </div>
    </div>

    {{-- Experiences --}}
    <div class="experiencesContainer" id="experience">
        <h1>Experiences</h1>

        <div class="experiencesWrepper">
            <div class="buttonExperiencesContainer">
                <h5 class="btnProjectShowcase">Project Showcases</h5>
                <h5 class="btnWorkExperiences">Work Experiences</h5>
            </div>
            <div class="mainExperiencesContentContainer">

                <div class="workExperiences">

                    <div class="containerInputSearch">
                        <input type="search" name="" id="searchWorkExperiences"
                            placeholder="Search Work Experience here!">
                        <div><i class="ri-search-line"></i></div>
                    </div>

                    <div class="mainExperienceContent">
                        <img src="{{ asset('staticImages/contoh2.jpg') }}" alt="">
                        <a href="">
                            <div class="textExperienceContainer">
                                <div>
                                    <h5>Work 1Experiences Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid
                                        ex
                                        possimus,
                                        quia, nihil quam quisquam illum voluptatibus suscipit doloribus repudiandae
                                        blanditiis
                                        neque
                                        impedit. Quibusdam, voluptatem veritatis velit eius dolorum adipisci.</h5>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque rerum
                                        praesentium
                                        reiciendis, tempore harum quia, nulla veniam vitae delectus nisi quibusdam saepe
                                        earum
                                        accusantium reprehenderit quam accusamus! In, laborum quia! Lorem ipsum dolor sit,
                                        amet
                                        consectetur adipisicing elit. Ipsum sequi impedit dolorum consequatur dolore?
                                        Facilis
                                        repellat
                                        molestias nisi. Aut veritatis voluptatem doloribus distinctio ea, facilis ex
                                        corporis
                                        cum?
                                        Omnis, doloribus?</p>
                                </div>
                                <div>
                                    <i class="ri-arrow-right-wide-fill"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mainExperienceContent">
                        <img src="{{ asset('staticImages/contoh2.jpg') }}" alt="">
                        <a href="">
                            <div class="textExperienceContainer">
                                <div>
                                    <h5>Work 2 Experiences Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid
                                        ex
                                        possimus,
                                        quia, nihil quam quisquam illum voluptatibus suscipit doloribus repudiandae
                                        blanditiis
                                        neque
                                        impedit. Quibusdam, voluptatem veritatis velit eius dolorum adipisci.</h5>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque rerum
                                        praesentium
                                        reiciendis, tempore harum quia, nulla veniam vitae delectus nisi quibusdam saepe
                                        earum
                                        accusantium reprehenderit quam accusamus! In, laborum quia! Lorem ipsum dolor sit,
                                        amet
                                        consectetur adipisicing elit. Ipsum sequi impedit dolorum consequatur dolore?
                                        Facilis
                                        repellat
                                        molestias nisi. Aut veritatis voluptatem doloribus distinctio ea, facilis ex
                                        corporis
                                        cum?
                                        Omnis, doloribus?</p>
                                </div>
                                <div>
                                    <i class="ri-arrow-right-wide-fill"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mainExperienceContent">
                        <img src="{{ asset('staticImages/contoh2.jpg') }}" alt="">
                        <a href="">
                            <div class="textExperienceContainer">
                                <div>
                                    <h5>Work 3 Experiences Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid
                                        ex
                                        possimus,
                                        quia, nihil quam quisquam illum voluptatibus suscipit doloribus repudiandae
                                        blanditiis
                                        neque
                                        impedit. Quibusdam, voluptatem veritatis velit eius dolorum adipisci.</h5>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque rerum
                                        praesentium
                                        reiciendis, tempore harum quia, nulla veniam vitae delectus nisi quibusdam saepe
                                        earum
                                        accusantium reprehenderit quam accusamus! In, laborum quia! Lorem ipsum dolor sit,
                                        amet
                                        consectetur adipisicing elit. Ipsum sequi impedit dolorum consequatur dolore?
                                        Facilis
                                        repellat
                                        molestias nisi. Aut veritatis voluptatem doloribus distinctio ea, facilis ex
                                        corporis
                                        cum?
                                        Omnis, doloribus?</p>
                                </div>
                                <div>
                                    <i class="ri-arrow-right-wide-fill"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mainExperienceContent">
                        <img src="{{ asset('staticImages/contoh2.jpg') }}" alt="">
                        <a href="">
                            <div class="textExperienceContainer">
                                <div>
                                    <h5>Work 4 Experiences Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid
                                        ex
                                        possimus,
                                        quia, nihil quam quisquam illum voluptatibus suscipit doloribus repudiandae
                                        blanditiis
                                        neque
                                        impedit. Quibusdam, voluptatem veritatis velit eius dolorum adipisci.</h5>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque rerum
                                        praesentium
                                        reiciendis, tempore harum quia, nulla veniam vitae delectus nisi quibusdam saepe
                                        earum
                                        accusantium reprehenderit quam accusamus! In, laborum quia! Lorem ipsum dolor sit,
                                        amet
                                        consectetur adipisicing elit. Ipsum sequi impedit dolorum consequatur dolore?
                                        Facilis
                                        repellat
                                        molestias nisi. Aut veritatis voluptatem doloribus distinctio ea, facilis ex
                                        corporis
                                        cum?
                                        Omnis, doloribus?</p>
                                </div>
                                <div>
                                    <i class="ri-arrow-right-wide-fill"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mainExperienceContent">
                        <img src="{{ asset('staticImages/contoh2.jpg') }}" alt="">
                        <a href="">
                            <div class="textExperienceContainer">
                                <div>
                                    <h5>Work 5 Experiences Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid
                                        ex
                                        possimus,
                                        quia, nihil quam quisquam illum voluptatibus suscipit doloribus repudiandae
                                        blanditiis
                                        neque
                                        impedit. Quibusdam, voluptatem veritatis velit eius dolorum adipisci.</h5>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque rerum
                                        praesentium
                                        reiciendis, tempore harum quia, nulla veniam vitae delectus nisi quibusdam saepe
                                        earum
                                        accusantium reprehenderit quam accusamus! In, laborum quia! Lorem ipsum dolor sit,
                                        amet
                                        consectetur adipisicing elit. Ipsum sequi impedit dolorum consequatur dolore?
                                        Facilis
                                        repellat
                                        molestias nisi. Aut veritatis voluptatem doloribus distinctio ea, facilis ex
                                        corporis
                                        cum?
                                        Omnis, doloribus?</p>
                                </div>
                                <div>
                                    <i class="ri-arrow-right-wide-fill"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mainExperienceContent">
                        <img src="{{ asset('staticImages/contoh2.jpg') }}" alt="">
                        <a href="">
                            <div class="textExperienceContainer">
                                <div>
                                    <h5>Work 5 Experiences Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid
                                        ex
                                        possimus,
                                        quia, nihil quam quisquam illum voluptatibus suscipit doloribus repudiandae
                                        blanditiis
                                        neque
                                        impedit. Quibusdam, voluptatem veritatis velit eius dolorum adipisci.</h5>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque rerum
                                        praesentium
                                        reiciendis, tempore harum quia, nulla veniam vitae delectus nisi quibusdam saepe
                                        earum
                                        accusantium reprehenderit quam accusamus! In, laborum quia! Lorem ipsum dolor sit,
                                        amet
                                        consectetur adipisicing elit. Ipsum sequi impedit dolorum consequatur dolore?
                                        Facilis
                                        repellat
                                        molestias nisi. Aut veritatis voluptatem doloribus distinctio ea, facilis ex
                                        corporis
                                        cum?
                                        Omnis, doloribus?</p>
                                </div>
                                <div>
                                    <i class="ri-arrow-right-wide-fill"></i>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="iconMore"><i class="ri-arrow-down-wide-line"></i></div>

                </div>

                <div class="projectShowcase">

                    <div class="containerInputSearch">
                        <input type="search" name="" id="searchProjectShowcase"
                            placeholder="Search Project Showcase here!">
                        <div><i class="ri-search-line"></i></div>
                    </div>

                    <div class="mainExperienceContent">
                        <img src="{{ asset('staticImages/contoh1.jpg') }}" alt="">
                        <a href="">
                            <div class="textExperienceContainer">
                                <div>
                                    <h5>Project 1 Showcase ke 1 Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Aliquid ex
                                        possimus,
                                        quia, nihil quam quisquam illum voluptatibus suscipit doloribus repudiandae
                                        blanditiis
                                        neque
                                        impedit. Quibusdam, voluptatem veritatis velit eius dolorum adipisci.</h5>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque rerum
                                        praesentium
                                        reiciendis, tempore harum quia, nulla veniam vitae delectus nisi quibusdam saepe
                                        earum
                                        accusantium reprehenderit quam accusamus! In, laborum quia! Lorem ipsum dolor
                                        sit,
                                        amet
                                        consectetur adipisicing elit. Ipsum sequi impedit dolorum consequatur dolore?
                                        Facilis
                                        repellat
                                        molestias nisi. Aut veritatis voluptatem doloribus distinctio ea, facilis ex
                                        corporis
                                        cum?
                                        Omnis, doloribus?</p>
                                </div>
                                <div>
                                    <i class="ri-arrow-right-wide-fill"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mainExperienceContent">
                        <img src="{{ asset('staticImages/contoh1.jpg') }}" alt="">
                        <a href="">
                            <div class="textExperienceContainer">
                                <div>
                                    <h5>Project 2 Showcase ke 2Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Aliquid ex
                                        possimus,
                                        quia, nihil quam quisquam illum voluptatibus suscipit doloribus repudiandae
                                        blanditiis
                                        neque
                                        impedit. Quibusdam, voluptatem veritatis velit eius dolorum adipisci.</h5>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque rerum
                                        praesentium
                                        reiciendis, tempore harum quia, nulla veniam vitae delectus nisi quibusdam saepe
                                        earum
                                        accusantium reprehenderit quam accusamus! In, laborum quia! Lorem ipsum dolor
                                        sit,
                                        amet
                                        consectetur adipisicing elit. Ipsum sequi impedit dolorum consequatur dolore?
                                        Facilis
                                        repellat
                                        molestias nisi. Aut veritatis voluptatem doloribus distinctio ea, facilis ex
                                        corporis
                                        cum?
                                        Omnis, doloribus?</p>
                                </div>
                                <div>
                                    <i class="ri-arrow-right-wide-fill"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mainExperienceContent">
                        <img src="{{ asset('staticImages/contoh1.jpg') }}" alt="">
                        <a href="">
                            <div class="textExperienceContainer">
                                <div>
                                    <h5>Project 3 Showcase ke 3 Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Aliquid ex
                                        possimus,
                                        quia, nihil quam quisquam illum voluptatibus suscipit doloribus repudiandae
                                        blanditiis
                                        neque
                                        impedit. Quibusdam, voluptatem veritatis velit eius dolorum adipisci.</h5>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque rerum
                                        praesentium
                                        reiciendis, tempore harum quia, nulla veniam vitae delectus nisi quibusdam saepe
                                        earum
                                        accusantium reprehenderit quam accusamus! In, laborum quia! Lorem ipsum dolor
                                        sit,
                                        amet
                                        consectetur adipisicing elit. Ipsum sequi impedit dolorum consequatur dolore?
                                        Facilis
                                        repellat
                                        molestias nisi. Aut veritatis voluptatem doloribus distinctio ea, facilis ex
                                        corporis
                                        cum?
                                        Omnis, doloribus?</p>
                                </div>
                                <div>
                                    <i class="ri-arrow-right-wide-fill"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mainExperienceContent">
                        <img src="{{ asset('staticImages/contoh1.jpg') }}" alt="">
                        <a href="">
                            <div class="textExperienceContainer">
                                <div>
                                    <h5>Project 4 Showcase ke 4 Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Aliquid ex
                                        possimus,
                                        quia, nihil quam quisquam illum voluptatibus suscipit doloribus repudiandae
                                        blanditiis
                                        neque
                                        impedit. Quibusdam, voluptatem veritatis velit eius dolorum adipisci.</h5>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque rerum
                                        praesentium
                                        reiciendis, tempore harum quia, nulla veniam vitae delectus nisi quibusdam saepe
                                        earum
                                        accusantium reprehenderit quam accusamus! In, laborum quia! Lorem ipsum dolor
                                        sit,
                                        amet
                                        consectetur adipisicing elit. Ipsum sequi impedit dolorum consequatur dolore?
                                        Facilis
                                        repellat
                                        molestias nisi. Aut veritatis voluptatem doloribus distinctio ea, facilis ex
                                        corporis
                                        cum?
                                        Omnis, doloribus?</p>
                                </div>
                                <div>
                                    <i class="ri-arrow-right-wide-fill"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mainExperienceContent">
                        <img src="{{ asset('staticImages/contoh1.jpg') }}" alt="">
                        <a href="">
                            <div class="textExperienceContainer">
                                <div>
                                    <h5>Project Showcase ke 5 Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Aliquid ex
                                        possimus,
                                        quia, nihil quam quisquam illum voluptatibus suscipit doloribus repudiandae
                                        blanditiis
                                        neque
                                        impedit. Quibusdam, voluptatem veritatis velit eius dolorum adipisci.</h5>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque rerum
                                        praesentium
                                        reiciendis, tempore harum quia, nulla veniam vitae delectus nisi quibusdam saepe
                                        earum
                                        accusantium reprehenderit quam accusamus! In, laborum quia! Lorem ipsum dolor
                                        sit,
                                        amet
                                        consectetur adipisicing elit. Ipsum sequi impedit dolorum consequatur dolore?
                                        Facilis
                                        repellat
                                        molestias nisi. Aut veritatis voluptatem doloribus distinctio ea, facilis ex
                                        corporis
                                        cum?
                                        Omnis, doloribus?</p>
                                </div>
                                <div>
                                    <i class="ri-arrow-right-wide-fill"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mainExperienceContent">
                        <img src="{{ asset('staticImages/contoh1.jpg') }}" alt="">
                        <a href="">
                            <div class="textExperienceContainer">
                                <div>
                                    <h5>Project Showcase ke 6Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Aliquid ex
                                        possimus,
                                        quia, nihil quam quisquam illum voluptatibus suscipit doloribus repudiandae
                                        blanditiis
                                        neque
                                        impedit. Quibusdam, voluptatem veritatis velit eius dolorum adipisci.</h5>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque rerum
                                        praesentium
                                        reiciendis, tempore harum quia, nulla veniam vitae delectus nisi quibusdam saepe
                                        earum
                                        accusantium reprehenderit quam accusamus! In, laborum quia! Lorem ipsum dolor
                                        sit,
                                        amet
                                        consectetur adipisicing elit. Ipsum sequi impedit dolorum consequatur dolore?
                                        Facilis
                                        repellat
                                        molestias nisi. Aut veritatis voluptatem doloribus distinctio ea, facilis ex
                                        corporis
                                        cum?
                                        Omnis, doloribus?</p>
                                </div>
                                <div>
                                    <i class="ri-arrow-right-wide-fill"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="iconMore"><i class="ri-arrow-down-wide-line"></i></div>
                </div>


            </div>
        </div>
    </div>

    {{-- Certificates --}}
    <div class="certificateContainer">
        <div class="closeCertif"><i class="ri-close-circle-line"></i></div>
        <div class="certificatesWrapper">
            <div class="mainCertificate">
                <div class="mainImgCertifContainer">
                    <img src="{{ asset('staticImages/contoh1.jpg') }}" alt="">
                </div>
                <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit eos esse voluptatem beatae in quasi,
                    impedit voluptas aperiam vel commodi modi fugit ipsam, expedita totam saepe velit explicabo consectetur
                    quidem!</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa earum quos consectetur, quisquam
                    cupiditate
                    aliquam dolore repellat exercitationem quo? Dolores eveniet eos voluptatum in, recusandae dolorum magni
                    ullam autem beatae. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste aliquam harum hic
                    quos,
                    quasi reiciendis praesentium aliquid error facilis omnis sit cupiditate. Distinctio unde illo quibusdam,
                    officiis voluptate dolorem debitis.lorem Lorem ipsum dolor sit amet consectetur, adipisicing elit. Minus
                    et
                    libero totam earum itaque quo, recusandae, cupiditate accusamus facere ad atque quidem natus cumque cum
                    voluptatibus aut culpa voluptate nostrum! Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Facere
                    quaerat officia quibusdam non! Labore, dolorum quaerat possimus iste delectus culpa, qui vitae, dolor
                    hic
                    officia perferendis incidunt! Sequi, eveniet facere!
                </p>
            </div>

            <div class="certificateCollection">

                <h3>Certificates</h3>
                <div class="certifCollContainer">
                    <div class="imgCertifContainer">
                        <img src="{{ asset('staticImages/contoh2.jpg') }}" alt="">
                    </div>
                    <div class="textCertifContainer">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quia nostrum odit
                            assumenda
                            error
                            dolor minus animi eligendi doloremque ducimus, hic illo. Sed at distinctio velit, excepturi
                            dolore
                            voluptate ipsum! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae rem
                            facilis
                            minus
                            ad provident obcaecati autem harum iusto esse possimus? Architecto voluptate possimus, quisquam
                            atque
                            aperiam doloribus provident recusandae doloremque.</p>
                        <div>2024 - 2027</div>
                    </div>
                </div>
                <div class="certifCollContainer">
                    <div class="imgCertifContainer">
                        <img src="{{ asset('staticImages/contoh1.jpg') }}" alt="">
                    </div>
                    <div class="textCertifContainer">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quia nostrum odit
                            assumenda
                            error
                            dolor minus animi eligendi doloremque ducimus, hic illo. Sed at distinctio velit, excepturi
                            dolore
                            voluptate ipsum! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae rem
                            facilis
                            minus
                            ad provident obcaecati autem harum iusto esse possimus? Architecto voluptate possimus, quisquam
                            atque
                            aperiam doloribus provident recusandae doloremque.</p>
                        <div>2024 - 2027</div>
                    </div>
                </div>
                <div class="certifCollContainer">
                    <div class="imgCertifContainer">
                        <img src="{{ asset('staticImages/contoh2.jpg') }}" alt="">
                    </div>
                    <div class="textCertifContainer">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quia nostrum odit
                            assumenda
                            error
                            dolor minus animi eligendi doloremque ducimus, hic illo. Sed at distinctio velit, excepturi
                            dolore
                            voluptate ipsum! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae rem
                            facilis
                            minus
                            ad provident obcaecati autem harum iusto esse possimus? Architecto voluptate possimus, quisquam
                            atque
                            aperiam doloribus provident recusandae doloremque.</p>
                        <div>2024 - 2027</div>
                    </div>
                </div>
                <div class="certifCollContainer">
                    <div class="imgCertifContainer">
                        <img src="{{ asset('staticImages/contoh2.jpg') }}" alt="">
                    </div>
                    <div class="textCertifContainer">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quia nostrum odit
                            assumenda
                            error
                            dolor minus animi eligendi doloremque ducimus, hic illo. Sed at distinctio velit, excepturi
                            dolore
                            voluptate ipsum! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae rem
                            facilis
                            minus
                            ad provident obcaecati autem harum iusto esse possimus? Architecto voluptate possimus, quisquam
                            atque
                            aperiam doloribus provident recusandae doloremque.</p>
                        <div>2024 - 2027</div>
                    </div>
                </div>
                <div class="certifCollContainer">
                    <div class="imgCertifContainer">
                        <img src="{{ asset('staticImages/contoh2.jpg') }}" alt="">
                    </div>
                    <div class="textCertifContainer">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quia nostrum odit
                            assumenda
                            error
                            dolor minus animi eligendi doloremque ducimus, hic illo. Sed at distinctio velit, excepturi
                            dolore
                            voluptate ipsum! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae rem
                            facilis
                            minus
                            ad provident obcaecati autem harum iusto esse possimus? Architecto voluptate possimus, quisquam
                            atque
                            aperiam doloribus provident recusandae doloremque.</p>
                        <div>2024 - 2027</div>
                    </div>
                </div>
                <div class="certifCollContainer">
                    <div class="imgCertifContainer">
                        <img src="{{ asset('staticImages/contoh2.jpg') }}" alt="">
                    </div>
                    <div class="textCertifContainer">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem quia nostrum odit
                            assumenda
                            error
                            dolor minus animi eligendi doloremque ducimus, hic illo. Sed at distinctio velit, excepturi
                            dolore
                            voluptate ipsum! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae rem
                            facilis
                            minus
                            ad provident obcaecati autem harum iusto esse possimus? Architecto voluptate possimus, quisquam
                            atque
                            aperiam doloribus provident recusandae doloremque.</p>
                        <div>2024 - 2027</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Js --}}
    <script>
        // SKILLS START
        borderBottom = document.querySelectorAll('.subSkillsContainer li div');

        borderBottom.forEach(function(e, index) {
            if (index === 0) {
                e.classList.add('active');
            } else {
                e.classList.remove('active');
            }
        });


        // Hard Skills

        document.querySelectorAll('.hardSkillDesc').forEach(function(skillDesc, i) {
            if (i === 0) {
                const isActive = skillDesc.classList.contains('active');

                if (!isActive) {
                    skillDesc.classList.add('active');
                    skillDesc.style.maxHeight = skillDesc.scrollHeight + 'px';
                }

                document.querySelectorAll('.hardSkillTitle i').forEach(function(icon, index) {
                    if (index === i) {

                        const rotateIcon = icon.classList.contains('active');

                        icon.classList.remove('active');

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

        document.getElementById('hardSkills').addEventListener('click', function(eHardSkills) {

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

                    document.querySelectorAll('.hardSkillTitle i').forEach(function(icon, index) {
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

        });


        document.querySelectorAll('.hardSkillTitle').forEach(function(event, index) {
            event.addEventListener('click', () => {
                document.querySelectorAll('.hardSkillDesc').forEach(function(skillDesc, i) {
                    if (i === index) {

                        const isActive = skillDesc.classList.contains('active')

                        skillDesc.classList.remove('active');
                        skillDesc.style.maxHeight = null;

                        if (!isActive) {
                            skillDesc.classList.add('active');
                            skillDesc.style.maxHeight = skillDesc.scrollHeight + 'px';
                        }
                    } else {
                        skillDesc.classList.remove('active')
                        skillDesc.style.maxHeight = null;
                    }
                })

                document.querySelectorAll('.hardSkillTitle i').forEach(function(icon, i) {
                    if (i === index) {

                        const rotateIcon = icon.classList.contains('active');

                        icon.classList.remove('active');

                        if (!rotateIcon) {
                            icon.classList.add('active');
                        }
                    } else {
                        icon.classList.remove('active');
                    }
                })
            })
        });

        // Soft Skills
        document.getElementById('softSkills').addEventListener('click', function(eSoftSkills) {

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

                    const icon = document.querySelectorAll('.softSkillTitle i').forEach(function(icon,
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
        });


        document.querySelectorAll('.softSkillTitle').forEach(function(event, index) {


            event.addEventListener('click', () => {
                document.querySelectorAll('.softSkillDesc').forEach(function(skillDesc, i) {
                    if (i === index) {

                        const isActive = skillDesc.classList.contains('active')

                        skillDesc.classList.remove('active');
                        skillDesc.style.maxHeight = null;

                        if (!isActive) {
                            skillDesc.classList.add('active');
                            skillDesc.style.maxHeight = skillDesc.scrollHeight + 'px';
                        }
                    } else {
                        skillDesc.classList.remove('active')
                        skillDesc.style.maxHeight = null;
                    }
                })

                const icon = document.querySelectorAll('.softSkillTitle i').forEach(function(icon, i) {

                    if (i === index) {

                        const rotateIcon = icon.classList.contains('active');

                        icon.classList.remove('active');

                        if (!rotateIcon) {
                            icon.classList.add('active');
                        }
                    } else {
                        icon.classList.remove('active');
                    }
                });
            });
        });

        // Skills persentation
        function updateAllLabels() {

            const hardSkillProgressContainer = document.querySelectorAll('.hardSkillDesc span');
            const softSkillrogressContainer = document.querySelectorAll('.softSkillDesc span');

            hardSkillProgressContainer.forEach(container => {
                const progress = container.querySelector('progress');
                const label = container.querySelector('h6');

                if (!progress || !label) return;

                const max = parseFloat(progress.max);
                const value = parseFloat(progress.value);
                const width = progress.offsetWidth;

                if (!max || !label) return;

                const percent = value / max;
                const offset = percent * width;
                const maxOffset = width + label.offsetWidth;

                if (!isNaN(offset) && isFinite(offset)) {
                    label.style.position = 'absolute';
                    const labelLeft = Math.min(offset + 1, maxOffset);
                    label.style.left = `${labelLeft}px`;
                    label.textContent = `${Math.round(percent * 100)}%`;
                }
            })

            softSkillrogressContainer.forEach(container => {
                const progress = container.querySelector('progress');
                const label = container.querySelector('h6');

                if (!progress || !label) return;

                const max = parseFloat(progress.max);
                const value = parseFloat(progress.value);
                const width = progress.offsetWidth;

                if (!max || !width) return;

                const percent = value / max;
                const offset = percent * width;
                const maxOffset = width + label.offsetWidth

                if (!isNaN(offset) && isFinite(offset)) {
                    label.style.position = 'absolute';
                    const labelLeft = Math.min(offset + 1, maxOffset);
                    label.style.left = `${labelLeft}px`;
                    label.textContent = `${Math.round(percent * 100)}%`;
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {

            setTimeout(updateAllLabels, 200);

            const target = document.querySelector('.softSkillsContainer');

            if (target) {
                const observer = new MutationObserver(() => {
                    setTimeout(updateAllLabels, 50);
                })

                observer.observe(target, {
                    attributes: true,
                    childList: true,
                    subtree: true
                });
            } else {
                console.warn('.skillsContentContainer not found');

            }
        });

        window.addEventListener('resize', updateAllLabels);
        //SKILLS END



        // EXPERIENCES START
        // Work experiences
        const workExperience = document.querySelector('.workExperiences');
        const projectShowcase = document.querySelector('.projectShowcase');
        const btnWorkExperiences = document.querySelector('.btnWorkExperiences');
        const btnProjectShowcase = document.querySelector('.btnProjectShowcase');

        btnProjectShowcase.classList.add('active');

        workExperience.style.display = 'none';
        projectShowcase.style.display = 'block';



        document.querySelector('.btnWorkExperiences').addEventListener('click', function() {
            workExperience.style.display = 'block';
            projectShowcase.style.display = 'none';

            btnWorkExperiences.classList.add('active')
            btnProjectShowcase.classList.remove('active')
        })

        // Project showcase
        document.querySelector('.btnProjectShowcase').addEventListener('click', function() {
            workExperience.style.display = 'none';
            projectShowcase.style.display = 'block';

            btnProjectShowcase.classList.add('active')
            btnWorkExperiences.classList.remove('active')
        })

        // Search experiances
        document.querySelectorAll('.containerInputSearch div').forEach(function(e, i) {
            e.addEventListener('click', () => {
                document.querySelectorAll('.containerInputSearch input').forEach(function(evnt, index) {

                    if (i === index) {
                        evnt.classList.toggle('active')
                    }
                })
            })
        })


        const searchExperiences = document.querySelectorAll('.containerInputSearch');
        const iconMore = document.querySelectorAll('.iconMore');
        const icons = document.querySelectorAll('.iconMore i');
        const workExperiences = document.querySelectorAll('.workExperiences .mainExperienceContent')
        const projectShowcases = document.querySelectorAll('.projectShowcase .mainExperienceContent')

        const LIMIT = 4;

        function setupToggle(experiences, toggleIcon, searchContainer) {

            experiences.forEach((e, i) => {
                e.style.display = i < LIMIT ? 'block' : 'none';
            });

            if (experiences.length > LIMIT) {

                if (searchContainer) searchContainer.classList.add('active');
                if (toggleIcon) toggleIcon.classList.add('active');

                toggleIcon.addEventListener('click', () => {
                    const isExpanded = experiences[LIMIT].style.display === 'block';
                    experiences.forEach((e, i) => {
                        if (i >= LIMIT) {
                            e.style.display = isExpanded ? 'none' : 'block';
                        }
                    });

                    const icon = toggleIcon.querySelector('i');


                    if (icon) icon.classList.toggle('active');

                });

            }
        }

        setupToggle(workExperiences, iconMore[0], searchExperiences[0]);
        setupToggle(projectShowcases, iconMore[1], searchExperiences[1]);


        document.addEventListener('DOMContentLoaded', function() {
            const searchProject = document.getElementById('searchProjectShowcase');
            const searchWork = document.getElementById('searchWorkExperiences');
            const projects = document.querySelectorAll('.projectShowcase .mainExperienceContent');
            const works = document.querySelectorAll('.workExperiences .mainExperienceContent');
            const parent = document.querySelector('.projectShowcase');
            const parents = document.querySelector('.workExperiences');
            const iconMore = document.querySelectorAll('.iconMore');
            const icon = document.querySelectorAll('.iconMore i');

            searchProject.addEventListener('input', function() {
                const keyword = this.value.toLowerCase();
                let matchCount = 0;

                projects.forEach(function(project, i) {
                    const text = project.textContent.toLowerCase();
                    const isMatch = text.includes(keyword);

                    if (isMatch) {
                        project.style.display = 'block'
                        matchCount++

                        if (iconMore[1]) {
                            iconMore[1].classList.remove('active');
                        }

                    } else {
                        project.style.display = 'none';
                        if (iconMore[1]) {
                            iconMore[1].classList.remove('active');
                        }

                    }

                    if (matchCount === 0 && keyword !== '') {
                        if (!document.querySelector('.alertSearch')) {
                            alertProject = document.createElement('span');
                            alertProject.classList.add('alertSearch');
                            alertProject.textContent = "Sorry, project showcases not found";

                            parent.appendChild(alertProject)
                        }

                    } else {
                        const existingAlert = document.querySelector('.alertSearch');

                        if (existingAlert) {
                            existingAlert.remove();
                        }
                    }


                    if (keyword == '') {
                        const backToDefault = project.style.display = i >= 4 ? 'none' : 'block';

                        if (icon[1]) {
                            icon[1].classList.remove('active');
                        }

                        if (iconMore[1]) {
                            iconMore[1].classList.add('active');
                        }
                    }


                })

            })

            searchWork.addEventListener('input', function() {
                const keyword = this.value.toLowerCase();
                let matchCount = 0;

                works.forEach(function(work, i) {
                    const text = work.textContent.toLowerCase();
                    const isMatch = text.includes(keyword);

                    if (isMatch) {
                        work.style.display = 'block'
                        matchCount++

                        if (iconMore[0]) {
                            iconMore[0].classList.remove('active');
                        }

                    } else {
                        work.style.display = 'none';
                        if (iconMore[0]) {
                            iconMore[0].classList.remove('active');
                        }

                    }

                    if (matchCount === 0 && keyword !== '') {
                        if (!document.querySelector('.alertSearch')) {
                            alertWork = document.createElement('span');
                            alertWork.classList.add('alertSearch');
                            alertWork.textContent = "Sorry, work experiences not found";

                            parents.appendChild(alertWork)
                        }

                    } else {
                        const existingAlert = document.querySelector('.alertSearch');

                        if (existingAlert) {
                            existingAlert.remove();
                        }
                    }


                    if (keyword == '') {
                        const backToDefault = work.style.display = i >= 4 ? 'none' : 'block';

                        if (icon[0]) {
                            icon[0].classList.remove('active');
                        }

                        if (iconMore[0]) {
                            iconMore[0].classList.add('active');
                        }
                    }


                })

            })

        })

        // EXPERIENCES END

        // CERTIFICATE START
        const certif = document.querySelector('.certificateContainer');

        document.getElementById('certificate').addEventListener('click', () => {
            certif.classList.add('active')
        })

        document.querySelector('.closeCertif').addEventListener('click', () => {
            certif.classList.remove('active')
        })
    </script>
@endsection
