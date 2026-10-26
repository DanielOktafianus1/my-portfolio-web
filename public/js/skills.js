import * as THREE from "https://cdn.jsdelivr.net/npm/three@0.155.0/build/three.module.js";

(function () {
    // --- VARIABEL GLOBAL INTERNAL ---
    let skBrainMainGroup, skRenderer, skScene, skCamera;
    let skDefaultMaterial, skHologramMaterial;
    let isHologramActive = true; // Hologram aktif secara default

    // --- 1. PEMBUAT OTAK ---
    function buildSkProceduralBrain() {
        const skGroup = new THREE.Group();

        // 1. Inisialisasi Material Hologram
        // Catatan: Nilai warna heksadesimal dengan 8 digit (misal: "#30098358")
        // menggunakan format 0xRRGGBBAA. Pastikan format ini didukung oleh renderer Anda.
        skHologramMaterial = new THREE.MeshStandardMaterial({
            color: "#30098358",
            emissive: "#30098358",
            emissiveIntensity: 0.8,
            roughness: 0.1,
            metalness: 0.9,
            transparent: true,
            opacity: 0.65,
            wireframe: true,
            blending: THREE.AdditiveBlending,
        });

        const skMaterial = skHologramMaterial;

        /**
         * Helper internal untuk membuat satu belahan otak besar (hemisphere).
         * Menggunakan manipulasi vertex berbasis fungsi sinus/kosinus untuk efek lekukan organik.
         *
         * @param {number} xOffset - Posisi offset pada sumbu X untuk memisahkan hemisfer kiri dan kanan.
         * @returns {THREE.Mesh} Mesh hemisfer otak.
         */
        function buildSkHemisphere(xOffset) {
            // Menggunakan geometri bola dengan subdivisi tinggi untuk detail vertex yang halus
            const geo = new THREE.SphereGeometry(1, 128, 128);
            const pos = geo.attributes.position;
            const vec = new THREE.Vector3();

            // Deformasi bentuk bola dasar menjadi bentuk lonjong menyerupai struktur otak
            for (let i = 0; i < pos.count; i++) {
                vec.fromBufferAttribute(pos, i);
                vec.z *= 1.35;
                vec.x *= 0.9;
                if (vec.y < 0) vec.y *= 0.65;

                // Kalkulasi gelombang noise prosedural untuk tekstur gyri/sulci (lipatan otak)
                const f1 = 7.0;
                const f2 = 14.0;
                const noise =
                    Math.sin(vec.x * f1 + Math.sin(vec.y * f1)) *
                        Math.cos(vec.z * f1) *
                        0.7 +
                    Math.cos(vec.y * f2 + Math.cos(vec.z * f2)) *
                        Math.sin(vec.x * f2) *
                        0.3;

                vec.multiplyScalar(
                    1 +
                        Math.pow(Math.abs(noise), 0.8) *
                            Math.sign(noise) *
                            0.12,
                );
                pos.setXYZ(i, vec.x, vec.y, vec.z);
            }

            geo.computeVertexNormals();
            const mesh = new THREE.Mesh(geo, skMaterial);
            mesh.position.x = xOffset;
            return mesh;
        }

        // Menambahkan Hemisfer Kiri (-0.48) dan Kanan (0.48) ke dalam Grup Utama
        skGroup.add(buildSkHemisphere(-0.48), buildSkHemisphere(0.48));

        // --- 2. OTAK BELAKANG (Cerebellum) ---
        // Membuat geometri dasar cerebellum dengan detail gelombang folia (garis-garis horizontal khas)
        const skCerebellumGeo = new THREE.SphereGeometry(0.5, 64, 64);
        const cPos = skCerebellumGeo.attributes.position;
        const cVec = new THREE.Vector3();

        for (let i = 0; i < cPos.count; i++) {
            cVec.fromBufferAttribute(cPos, i);
            const waveFrequency = 35.0;
            const waveAmplitude = 0.05;
            const folia = Math.sin(cVec.y * waveFrequency) * waveAmplitude;
            const detailNoise = Math.cos(cVec.x * 10.0 + cVec.z * 10.0) * 0.04;

            cVec.multiplyScalar(1 + folia + detailNoise);
            cPos.setXYZ(i, cVec.x, cVec.y, cVec.z);
        }
        skCerebellumGeo.computeVertexNormals();

        const skCerebellum = new THREE.Mesh(skCerebellumGeo, skMaterial);
        skCerebellum.position.set(0, -0.65, -0.65);
        skCerebellum.scale.set(1.1, 0.85, 0.95);
        skGroup.add(skCerebellum);

        // --- 3. BATANG OTAK (Brain Stem) ---
        // Membuat struktur silinder untuk batang otak yang menghubungkan otak besar ke sumsum tulang belakang
        const skStem = new THREE.Mesh(
            new THREE.CylinderGeometry(0.2, 0.12, 1.2, 16),
            skMaterial,
        );
        skStem.position.set(0, -1.1, -0.5);
        skStem.rotation.x = 0.35;
        skGroup.add(skStem);

        // --- 4. TAMBAHAN DASAR: PANGGUNG & GRID HOLOGRAM ---
        const skPlatformGroup = new THREE.Group();
        skPlatformGroup.name = "skPlatform";

        // A. Panggung bertingkat di bawah batang otak
        const stageGeo1 = new THREE.CylinderGeometry(2, 2, 0.5, 100);
        const stageMesh1 = new THREE.Mesh(
            stageGeo1,
            new THREE.MeshStandardMaterial({
                color: 0x8a75b8,
                wireframe: true, 
                transparent: true,
                opacity: 0.8,
            }),
        );
        stageMesh1.position.set(0, -2.6, -0.3);

        const stageGeo2 = new THREE.CylinderGeometry(3, 3, 0.5, 200);
        const stageMesh2 = new THREE.Mesh(
            stageGeo2,
            new THREE.MeshStandardMaterial({
                color: 0x8a75b8,
                wireframe: true, 
                transparent: true,
                opacity: 0.8,
            }),
        );
        stageMesh2.position.set(0, -3.2, -0.3);

        skPlatformGroup.add(stageMesh1, stageMesh2);

        const gridSize = 200;
        const gridDivisions = 200;
        const gridHelper = new THREE.GridHelper(
            gridSize,
            gridDivisions,
            0x300983,
            0x300983,
        );
        gridHelper.position.set(0, -1.75, 0);

        const gridMaterial = new THREE.ShaderMaterial({
            transparent: true,
            blending: THREE.AdditiveBlending,
            uniforms: {
                uColor: {
                    value: new THREE.Color("#afa1cd"),
                },
                uMaxDistance: {
                    value: gridSize * 0.5,
                },
            },
            vertexShader: `
            varying vec3 vPosition;
            void main() {
                vPosition = position;
                gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
            }
        `,
            fragmentShader: `
            uniform vec3 uColor;
            uniform float uMaxDistance;
            varying vec3 vPosition;
            void main() {
                float dist = length(vPosition.xz);
                float alpha = 1.0 - smoothstep(0.0, uMaxDistance, dist);
                gl_FragColor = vec4(uColor, alpha * 0.5);
            }
        `,
        });

        // // Sesuaikan material/opacity dari grid agar senada dengan efek hologram
        // gridHelper.material.transparent = true;
        // gridHelper.material.opacity = 0.4;
        // gridHelper.material.blending = THREE.AdditiveBlending;
        gridHelper.material = gridMaterial;

        skPlatformGroup.add(gridHelper);

        // Sembunyikan platform secara default di awal halaman
        skPlatformGroup.visible = false;

        skGroup.add(skPlatformGroup);

        return skGroup;
    }

    /**
     * --- 2. INITIALIZATION ---
     * Menjalankan inisialisasi utama aplikasi Three.js saat dokumen HTML selesai dimuat.
     * Menyiapkan Scene, Camera, WebGLRenderer, pencahayaan, objek otak, serta memulai loop animasi.
     */
    document.addEventListener("DOMContentLoaded", () => {
        // Mengambil elemen kontainer DOM tempat canvas Three.js akan disematkan
        const skCanvasHolder = document.getElementById("brainContainer");
        if (!skCanvasHolder) return;

        // 1. Inisialisasi Scene dan Kamera Perspektif
        skScene = new THREE.Scene();
        skCamera = new THREE.PerspectiveCamera(
            35, // Field of View (FOV) dalam derajat
            skCanvasHolder.clientWidth / skCanvasHolder.clientHeight, // Aspect Ratio berdasarkan kontainer
            0.1, // Near clipping plane
            100, // Far clipping plane
        );
        skCamera.position.z = 10;

        // 2. Inisialisasi WebGL Renderer
        skRenderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        skRenderer.setSize(
            skCanvasHolder.clientWidth,
            skCanvasHolder.clientHeight,
        );
        skRenderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        skCanvasHolder.appendChild(skRenderer.domElement);

        // 3. Konfigurasi Pencahayaan (Lighting)
        const skLight = new THREE.DirectionalLight(0xffffff, 2);
        skLight.position.set(5, 5, 5);

        const skAmbientLight = new THREE.AmbientLight(0xffffff, 0.8);
        skScene.add(skLight, skAmbientLight);

        // 4. Membangun dan Menambahkan Model Otak ke dalam Scene
        skBrainMainGroup = buildSkProceduralBrain();
        skScene.add(skBrainMainGroup);

        // 5. Event Listener untuk Resize Browser / Kontainer
        window.addEventListener("resize", () => {
            if (!skCanvasHolder) return;

            // Perbarui aspek rasio kamera dan ukuran renderer mengikuti kontainer/jendela
            skCamera.aspect =
                skCanvasHolder.clientWidth / skCanvasHolder.clientHeight;
            skCamera.updateProjectionMatrix();

            skRenderer.setSize(
                skCanvasHolder.clientWidth,
                skCanvasHolder.clientHeight,
            );
            skRenderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        });

        // 6. Memulai Loop Animasi Utama
        skAnimate();
    });

    // --- GLOBAL VARIABLES & CACHE ---
    let winW = window.innerWidth;
    let isSmallScreen = winW <= 700;
    let skSnapTimeout = null;
    let skIsSnapping = false;

    window.addEventListener("resize", () => {
        winW = window.innerWidth;
        isSmallScreen = winW <= 700;
    });

    function skClamp(val, min, max) {
        return Math.min(Math.max(val, min), max);
    }

    // --- 3. SCROLL & UI ANIMATION LOGIC ---
    function skAnimate() {
        /**
         * Melanjutkan loop animasi Three.js menggunakan requestAnimationFrame.
         */
        requestAnimationFrame(skAnimate);

        // Mengambil referensi elemen-elemen DOM yang berkaitan dengan section "Skills" dan UI pendukung
        const skContainer = document.querySelector(".skillsContainer");
        const skWrapper = document.querySelector(".skillsWrapper");
        const skLogoName = document.querySelector(".logoContainer h3");
        const skLogoImg = document.querySelector(".logoContainer img");
        const skDescText = document.querySelector(".skillsWrapper p");
        const skLine = document.querySelector(".lineSkills");
        const clothDisp = document.getElementById("cloth-disp");

        // Validasi awal: Keluar dari fungsi jika container tidak ditemukan atau model otak belum dimuat
        if (
            !skContainer ||
            typeof skBrainMainGroup === "undefined" ||
            !skBrainMainGroup
        )
            return;

        // Menghitung posisi dan dimensi elemen relatif terhadap viewport
        const skRect = skContainer.getBoundingClientRect();
        const winH = window.innerHeight;
        const skOffset = 240; // Batas offset pixel untuk pemicu transisi sticky
        const isAboutMeActive = document.body.classList.contains("activeAM");
        const skPlatform = skBrainMainGroup.getObjectByName("skPlatform");

        // --- A. LOGIKA STICKY / FIXED WRAPPER BERDASARKAN POSISI SCROLL ---
        if (skRect.top <= -skOffset && skRect.bottom >= winH) {
            // 1. Kondisi ketika section "Skills" sedang aktif di tengah layar (Sticky aktif)
            if (skWrapper) {
                skWrapper.classList.add("active");
                skWrapper.classList.remove("end");
            }
            // Ubah logo menjadi versi putih/alternatif jika aset tersedia dan mode "About Me" tidak aktif
            if (!isAboutMeActive && skLogoImg && window.assets?.wlogo)
                skLogoImg.src = window.assets.wlogo;

            if (skLogoName) skLogoName.classList.add("logoNameActiveSkill");
            if (skDescText) skDescText.classList.add("removeText");
            if (skLine) skLine.classList.add("removeLine");

            if (skPlatform) skPlatform.visible = true;
        } else if (skRect.bottom < winH) {
            // 2. Kondisi ketika pengguna sudah melewati section "Skills" (Mencapai akhir section)
            if (skWrapper) {
                skWrapper.classList.add("end");
                skWrapper.classList.remove("active");
            }
            // Kembalikan logo ke logo utama/standar
            if (!isAboutMeActive && skLogoImg && window.assets?.logo)
                skLogoImg.src = window.assets.logo;

            if (skLogoName) skLogoName.classList.remove("logoNameActiveSkill");
        } else {
            // 3. Kondisi ketika section "Skills" belum dicapai (Berada di atas section)
            if (skWrapper) skWrapper.classList.remove("active", "end");

            if (!isAboutMeActive && skLogoImg && window.assets?.logo)
                skLogoImg.src = window.assets.logo;

            if (skLogoName) skLogoName.classList.remove("logoNameActiveSkill");
            if (skDescText) skDescText.classList.remove("removeText");
            if (skLine) skLine.classList.remove("removeLine");
            if (skPlatform) skPlatform.visible = false;
        }

        // --- B. ANIMASI 3D OTAK & CARD (EFEK KAIN AIR & MAX-WIDTH 1500PX) ---
        const skScrollY = Math.max(0, Math.abs(skRect.top) - skOffset);
        const skBaseScale = isSmallScreen ? 0.65 : 1.0;
        const skTargetX = isSmallScreen ? 1.2 : 3.5;

        const skPhase1 = skClamp(skScrollY / (2 * winH), 0, 1);
        const skPhase2 = skClamp((skScrollY - 2 * winH) / (2.5 * winH), 0, 1);

        const skillsContainerContent = document.querySelector(
            ".skillsContainerContent",
        );

        const allCards = document.querySelectorAll(".sk-revolving-card");

        if (skRect.top <= -skOffset) {
            if (skPhase1 < 1) {
                let curentScale;
                let moveProgress = 0;

                const targetMinScale = 0;
                const midScale = 0.35;

                if (skPhase1 <= 0.5) {
                    const p1 = skPhase1 / 0.5;
                    curentScale = skBaseScale * (1.0 - p1 * (1.0 - midScale));
                    moveProgress = 0;
                } else {
                    const p2 = (skPhase1 - 0.5) / 1.0;
                    curentScale =
                        skBaseScale *
                        (midScale - p2 * (midScale - targetMinScale));

                    moveProgress = p2;
                }

                const targetY = -4;
                const targetZ = 2;
                // const targetX = skTargetX || 1;

                // skBrainMainGroup.position.x = moveProgress * targetX;
                skBrainMainGroup.position.y = moveProgress * targetY;
                skBrainMainGroup.position.z = moveProgress * targetZ;

                skBrainMainGroup.scale.set(
                    curentScale,
                    curentScale * 1.02,
                    curentScale * 0.9,
                );

                skBrainMainGroup.rotation.y = 1.2 * (1.0 - moveProgress);
                skBrainMainGroup.rotation.x = 0.32 * (1.0 - moveProgress);

                if (skillsContainerContent)
                    skillsContainerContent.style.display = "none";
            }
            // else {
            //     // FASE 2: Otak Berada di Kanan & Animasi Kartu
            //     skBrainMainGroup.position.x = skTargetX;
            //     // const curentScale = ;

            //     skBrainMainGroup.scale.set(
            //         2 * skBaseScale,
            //         2 * skBaseScale * 1.1,
            //         2 * skBaseScale,
            //     );

            //     // skBrainMainGroup.rotation.y = -(skPhase2 * Math.PI * 0.4);
            //     // skBrainMainGroup.rotation.x = 0;

            //     if (skillsContainerContent) {
            //         if (skPhase2 > 0) {
            //             setTimeout(() => {
            //                 let skillCategorys = document.querySelectorAll(
            //                     ".textHard,.textSkill",
            //                 );

            //                 skillCategorys.forEach((sklStgry) => {
            //                     sklStgry.classList.add("active");
            //                 });
            //             }, 200);

            //             skillsContainerContent.style.display = "block";

            //             // Batasi basis lebar maksimal container card menjadi 1500px
            //             const effectiveW = Math.min(winW, 1500);
            //             const brainCenterX = effectiveW * -0.04;
            //             const targetLeftX = -(effectiveW * 0.22);
            //             const totalCards = allCards.length || 1;
            //             const slotWindow = 1 / totalCards;

            //             const maxRotationY = -(totalCards * 0.3);

            //             skBrainMainGroup.rotation.y = skPhase2 * maxRotationY;
            //             skBrainMainGroup.rotation.x = 0;
            //             window.idxActive = {};
            //             setTimeout(() => {
            //                 Object.values(allCards).forEach((card, idx) => {
            //                     window.idxActive = idx;
            //                     if (card.classList.contains("softCategory")) {
            //                         card.style.display = "none";
            //                         return;
            //                     } else if (
            //                         card.classList.contains("hardCategory") &&
            //                         window.idxActive > card.length - 1
            //                     ) {
            //                         card.style.display = "none";
            //                         return;
            //                     }

            //                     const cardStart = idx * slotWindow;

            //                     const localProgress = skClamp(
            //                         (skPhase2 - cardStart) / slotWindow,
            //                         0,
            //                         1,
            //                     );

            //                     let currentX = 0;
            //                     let currentY = 0;
            //                     let currentZ = 0;
            //                     let opacity = 0;
            //                     let scaleX = 1;
            //                     let scaleY = 1;
            //                     let skewX = 0;
            //                     let waveDistort = 0;
            //                     let cardZIndex = 20 + idx;

            //                     if (localProgress <= 0) {
            //                         opacity = 0;
            //                         card.style.display = "none";
            //                     } else if (localProgress < 0.25) {
            //                         // 1. KELUAR DARI BELAKANG OTAK KECIL -> MEMBESAR KE KIRI
            //                         card.style.display = "block";

            //                         card.classList.add("countIdx"); // Menambahkan class

            //                         const rawProgress = localProgress / 0.25;

            //                         const enterProgress =
            //                             1 - Math.pow(1 - rawProgress, 3);

            //                         currentX =
            //                             brainCenterX +
            //                             (targetLeftX - brainCenterX) *
            //                                 enterProgress;
            //                         currentZ = -300 + (1 - enterProgress);

            //                         scaleX = 0.3 + enterProgress * 0.7;
            //                         scaleY = 0.3 + enterProgress * 0.7;

            //                         const speedFactor = Math.sin(
            //                             enterProgress * Math.PI,
            //                         );
            //                         waveDistort = speedFactor * 30;
            //                         skewX = speedFactor * 10;

            //                         opacity = skClamp(
            //                             enterProgress / 0.15,
            //                             0,
            //                             1,
            //                         );
            //                         cardZIndex = 2 + idx;
            //                         card.style.transformOrigin = "right center";
            //                     } else if (localProgress <= 0.75) {
            //                         // 2. BERHENTI DENGAN STABIL & MEMBENTANG SEMPURNA DI KIRI
            //                         card.style.display = "block";
            //                         currentX = targetLeftX;
            //                         currentZ = 0;
            //                         opacity = 1;
            //                         scaleX = 1;
            //                         scaleY = 1;
            //                         skewX = 0;
            //                         waveDistort = 0;
            //                         cardZIndex = 20 + idx;
            //                         card.style.transformOrigin =
            //                             "center center";
            //                     } else {
            //                         // 3. HILANG BERGELOMBANG KE KANAN
            //                         card.style.display = "block";

            //                         const rawExit =
            //                             (localProgress - 0.75) / 0.25;
            //                         const exitProgress = Math.pow(rawExit, 2);

            //                         currentX =
            //                             targetLeftX +
            //                             effectiveW * 0.7 * exitProgress;
            //                         currentZ = -exitProgress * 50;

            //                         const exitSpeed = Math.sin(
            //                             exitProgress * Math.PI,
            //                         );
            //                         skewX = exitSpeed * -15;
            //                         waveDistort = exitSpeed * 25;

            //                         const exitScale = 1 + exitProgress * 0.3;
            //                         scaleX = exitScale;
            //                         scaleY = exitScale;

            //                         opacity = 1 - rawExit;
            //                         cardZIndex = 25 + idx;
            //                         card.style.transformOrigin = "left center";
            //                     }

            //                     // Efek Distorsi SVG Filter Kain Air
            //                     if (clothDisp && waveDistort > 0) {
            //                         clothDisp.setAttribute(
            //                             "scale",
            //                             waveDistort,
            //                         );
            //                     }

            //                     card.style.filter =
            //                         waveDistort > 1
            //                             ? "url(#fluid-cloth-filter)"
            //                             : "none";
            //                     card.style.transform = `translate3d(${currentX}px, ${currentY}px, ${currentZ}px) skewX(${skewX}deg) scale(${scaleX}, ${scaleY})`;
            //                     card.style.opacity = opacity;
            //                     card.style.zIndex = cardZIndex;

            //                     // console.log(cards.length);

            //                     // if (window.idxActive > cards.length - 1) {
            //                     //     alert("Abis cardnya cuy");
            //                     // }
            //                 });
            //             }, 500);
            //         } else {
            //             skillsContainerContent.style.display = "none";
            //         }
            //     }
            // }
        } else {
            skBrainMainGroup.position.x = 0;
            // Dikembalikan murni menggunakan skBaseScale agar sinkron di awal
            skBrainMainGroup.scale.setScalar(skBaseScale);
            skBrainMainGroup.rotation.y = 1.2;
            skBrainMainGroup.rotation.x = 0.3;

            if (skillsContainerContent)
                skillsContainerContent.style.display = "none";
        }

        skRenderer.render(skScene, skCamera);
    }

    // --- 4. SNAP SCROLL LOGIC 50% ---
    // window.addEventListener("scroll", () => {
    //     const skContainer = document.querySelector(".skillsContainer");
    //     if (!skContainer) return;

    //     const winH = window.innerHeight;
    //     const skOffset = 240;
    //     const skRect = skContainer.getBoundingClientRect();
    //     const skScrollY = Math.max(0, Math.abs(skRect.top) - skOffset);

    //     const skPhase1 = skClamp(skScrollY / (2 * winH), 0, 1);
    //     const skPhase2 = skClamp((skScrollY - 2 * winH) / (2.5 * winH), 0, 1);

    //     if (skRect.top <= -skOffset && skPhase1 >= 1 && skPhase2 > 0 && skPhase2 < 0.65 && !skIsSnapping) {
    //         clearTimeout(skSnapTimeout);

    //         skSnapTimeout = setTimeout(() => {
    //             skIsSnapping = true;

    //             const phase2StartScroll = skContainer.offsetTop + skOffset + (2 * winH);
    //             let targetScroll = 0;

    //             if (skPhase2 < 0.4) {
    //                 // Di bawah 50% -> Tarik kembali sembunyi ke dalam otak
    //                 targetScroll = phase2StartScroll;
    //             } else {
    //                 // Di atas 50% -> Kunci otomatis membentang di kiri
    //                 targetScroll = phase2StartScroll + (1.2 * winH);
    //             }

    //             window.scrollTo({
    //                 top: targetScroll,
    //                 behavior: "smooth"
    //             });

    //             setTimeout(() => { skIsSnapping = false; }, 600);
    //         }, 250);
    //     }
    // });
})();

// --- 5. LOGIKA SVG LINE SCROLL ---
document.addEventListener("DOMContentLoaded", () => {
    window.addEventListener("scroll", () => {
        const svg = document.querySelector(".lineSkills");
        if (!svg) return;

        const isMobile = window.innerWidth <= 700;
        const path = isMobile
            ? svg.querySelector(".mobileLineSkill")
            : svg.querySelector(".desktopLineSkill");

        if (!path) return;

        const pathLength = path.getTotalLength();
        path.style.strokeDasharray = pathLength;

        const svgRect = svg.getBoundingClientRect();
        const windowHeight = window.innerHeight;

        const start = windowHeight * 0.5;
        const end = windowHeight * 0;

        let progress = (start - svgRect.top) / (start - end);
        progress = Math.min(Math.max(progress, 0), 1);

        path.style.strokeDashoffset = pathLength - pathLength * progress;
    });
});
