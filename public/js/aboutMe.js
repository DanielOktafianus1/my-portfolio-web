import * as THREE from "https://cdn.jsdelivr.net/npm/three@0.155.0/build/three.module.js";

document.addEventListener("DOMContentLoaded", () => {
    // --- 1. Logika Scroll SVG ---
    document.addEventListener("scroll", () => {
        const svg = document.querySelector(".lineAboutMe");
        if (!svg) return;

        const isMobile = window.innerWidth <= 700;
        const path = isMobile
            ? svg.querySelector(".mobileLine")
            : svg.querySelector(".desktopLine");

        if (!path) return;

        const pathLength = path.getTotalLength();
        path.style.strokeDasharray = pathLength;

        const svgRect = svg.getBoundingClientRect();
        const windowHeight = window.innerHeight;
        const start = windowHeight * 0.5;
        const end = windowHeight * 1;

        let progress = (windowHeight - svgRect.top - start) / (end - start);
        progress = Math.min(Math.max(progress, 0), 1);

        const drawLength = pathLength * progress;
        path.style.strokeDashoffset = pathLength - drawLength;
    });

    // --- 2. Logika Klik Tombol & Transisi ---
    const logoText = document.querySelector(".logoContainer h3");
    const logoImgAboutMe = document.querySelector(".logoContainer img");
    const btnAboutMe = document.querySelector(".btnAboutMe");
    const camera = document.querySelector(".aboutMeCamera");
    const target = document.querySelector(".targetZoom");
    const logoTransition = document.querySelector(".logoTransition");
    const logoBox = document.querySelector(".targetZoom img");

    if (btnAboutMe && camera && target) {
        btnAboutMe.addEventListener("click", () => {
            document.body.classList.add("activeAM");
            camera.classList.add("active");

            if (logoBox) logoBox.classList.add("hidden");
            if (logoTransition) logoTransition.style.display = "flex";

            // Perubahan Logo & Warna Teks
            if (logoText) {
                logoText.style.transition = "color 1s ease-out";
                logoText.style.color = "white";
            }

            if (window.assets) logoImgAboutMe.src = window.assets.wlogo;

            // Hitung Zoom
            const targetRect = target.getBoundingClientRect();
            const cameraRect = camera.getBoundingClientRect();
            const scaleX = window.innerWidth / targetRect.width;
            const scaleY = window.innerHeight / targetRect.height;
            const zoomBoost = 3;
            const scale = Math.max(scaleX, scaleY) * zoomBoost;

            const targetCenterX =
                targetRect.left - cameraRect.left + targetRect.width / 2;
            const targetCenterY =
                targetRect.top - cameraRect.top + targetRect.height / 2;
            const screenCenterX = window.innerWidth / 2;
            const screenCenterY = window.innerHeight / 2;

            camera.style.transform = `
                translate(${screenCenterX}px, ${screenCenterY}px)
                scale(${scale})
                translate(${-targetCenterX}px, ${-targetCenterY}px)
            `;

            setTimeout(() => {
                if (logoTransition) logoTransition.classList.add("active");
                setTimeout(() => {
                    location.assign(window.routes.baseUrl + "/about-me");
                }, 1000);
            }, 1800);
        });
    }

    // --- 3. Logika Detail Transition ---
    const logoTransition2nd = document.querySelector(".logoTransition2nd");
    const conDetailAM = document.querySelector(".conDetailAM");

    if (logoTransition2nd && conDetailAM) {
        logoTransition2nd.classList.add("hidden");
        setTimeout(() => {
            logoTransition2nd.style.display = "none";
            conDetailAM.style.opacity = 1;
        }, 500);
    }

    // --- 4. Logika Mouse Light (PENYEBAB ERROR TADI) ---
    const avatar = document.querySelector(".containerAvatar");

    // Kita bungkus semua logika avatar dalam satu IF besar
    if (avatar) {
        const glow = avatar.querySelector(".mouseGlow");

        if (glow) {
            let gx = 0,
                gy = 0;
            let tx = 0,
                ty = 0;
            let isHover = false;

            avatar.addEventListener("mouseenter", () => {
                isHover = true;
                glow.style.opacity = "1";
            });

            avatar.addEventListener("mouseleave", () => {
                isHover = false;
                glow.style.opacity = "0";
            });

            avatar.addEventListener("mousemove", (e) => {
                const rect = avatar.getBoundingClientRect();
                tx = e.clientX - rect.left;
                ty = e.clientY - rect.top;
            });

            function animateGlow() {
                if (isHover) {
                    gx += (tx - gx) * 0.12;
                    gy += (ty - gy) * 0.12;
                    glow.style.left = `${gx}px`;
                    glow.style.top = `${gy}px`;
                }
                requestAnimationFrame(animateGlow);
            }
            animateGlow();
        }
    }
});

document.addEventListener("DOMContentLoaded", () => {
    const container = document.querySelector(".containerAvatar");
    if (!container) return;

    // =========================
    // THREE.JS SETUP
    // =========================
    const scene = new THREE.Scene();

    const camera = new THREE.PerspectiveCamera(45, 1, 0.1, 1000);
    camera.position.z = 300;

    const renderer = new THREE.WebGLRenderer({
        antialias: true,
        alpha: true,
    });
    renderer.setPixelRatio(window.devicePixelRatio);
    container.appendChild(renderer.domElement);

    let pointCloud = null;
    let buildId = 0; // cegah async ghost

    // =========================
    // STEP CONTROL
    // =========================
    let currentStep = 4;
    let targetStep = 4;
    let stepLerp = 4;

    // =========================
    // FADE CONTROL
    // =========================
    let opacity = 0;
    let targetOpacity = 1;
    let isTransitioning = false;

    // =========================
    // AVATARS
    // =========================
    const avatars = [
        window.assets?.avatarLeft,
        window.assets?.avatarCenter,
        window.assets?.avatarRight,
    ];

    let currentAvatar = avatars[0];

    // =========================
    // CREATE POINT CLOUD
    // =========================
    function createPointCloud(stepValue, imageSrc) {
        const localBuildId = ++buildId;

        const width = container.clientWidth;
        const height = container.clientHeight;

        renderer.setSize(width, height);
        camera.aspect = width / height;
        camera.updateProjectionMatrix();

        const img = new Image();
        img.crossOrigin = "anonymous";
        img.src = imageSrc;

        img.onload = () => {
            if (localBuildId !== buildId) return;

            const canvas = document.createElement("canvas");
            canvas.width = img.width;
            canvas.height = img.height;
            const ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0);

            const data = ctx.getImageData(0, 0, img.width, img.height).data;
            const points = [];

            const scale =
                Math.min(width / img.width, height / img.height) * 0.35;

            for (let y = 0; y < img.height; y += stepValue) {
                for (let x = 0; x < img.width; x += stepValue) {
                    const i = (y * img.width + x) * 4;
                    if (data[i + 3] < 50) continue;

                    const gray = (data[i] + data[i + 1] + data[i + 2]) / 3;

                    const nx = x / img.width - 0.5;
                    const ny = y / img.height - 0.5;

                    const oval =
                        Math.exp(-(nx * nx) * 6.5) * Math.exp(-(ny * ny) * 4.5);
                    const nose =
                        Math.exp(-(nx * nx) * 35) * Math.exp(-(ny * ny) * 10);
                    const jaw = Math.exp(-((ny + 0.25) ** 2) * 12);

                    const depth =
                        (1 - gray / 255) * 28 +
                        oval * 15 +
                        nose * 35 +
                        jaw * 18;

                    points.push(
                        new THREE.Vector3(
                            (x - img.width / 2) * scale,
                            -(y - img.height / 2) * scale,
                            depth - 60,
                        ),
                    );
                }
            }

            const geometry = new THREE.BufferGeometry().setFromPoints(points);

            // GLOW TEXTURE
            const dotCanvas = document.createElement("canvas");
            dotCanvas.width = dotCanvas.height = 100;
            const dctx = dotCanvas.getContext("2d");

            const grad = dctx.createRadialGradient(50, 50, 0, 50, 50, 50);
            grad.addColorStop(0, "rgba(0,200,255,1)");
            grad.addColorStop(0.4, "rgba(0,200,255,0.5)");
            grad.addColorStop(1, "rgba(0,200,255,0)");

            dctx.fillStyle = grad;
            dctx.fillRect(0, 0, 100, 100);

            let sizeDot;

            if (window.innerWidth <= 700) {
                sizeDot = 3;
            } else {
                sizeDot = 4;
            }

            const material = new THREE.PointsMaterial({
                size: sizeDot,
                map: new THREE.CanvasTexture(dotCanvas),
                transparent: true,
                opacity: 0,
                depthWrite: false,
                blending: THREE.AdditiveBlending,
            });

            pointCloud = new THREE.Points(geometry, material);
            scene.add(pointCloud);

            opacity = 0;
            targetOpacity = 1;
            isTransitioning = true;
        };
    }

    // INIT
    createPointCloud(currentStep, currentAvatar);

    // =========================
    // SECTION OBSERVER
    // =========================
    document.querySelectorAll(".aboutMeDesc").forEach((sec, index) => {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;

                    targetStep = entry.intersectionRatio < 0.4 ? 20 : 4;

                    if (avatars[index] && currentAvatar !== avatars[index]) {
                        currentAvatar = avatars[index];
                        targetOpacity = 0;
                        isTransitioning = true;
                    }
                });
            },
            {
                threshold: [0.3, 0.6],
            },
        );

        observer.observe(sec);
    });

    // =========================
    // MOUSE ROTATION
    // =========================
    let mouseX = 0;
    document.addEventListener("mousemove", (e) => {
        mouseX = (e.clientX / window.innerWidth - 0.5) * 2;
    });

    const maxRotation = (4 * Math.PI) / 180;
    let currentRotationY = 0;

    // =========================
    // ANIMATION LOOP
    // =========================
    function animate() {
        requestAnimationFrame(animate);

        // smooth step
        stepLerp += (targetStep - stepLerp) * 0.08;
        const roundedStep = Math.round(stepLerp);

        // fade logic
        if (pointCloud && isTransitioning) {
            opacity += (targetOpacity - opacity) * 0.08;
            pointCloud.material.opacity = opacity;

            if (Math.abs(targetOpacity - opacity) < 0.01) {
                opacity = targetOpacity;
                pointCloud.material.opacity = opacity;

                if (opacity === 0) {
                    scene.remove(pointCloud);
                    pointCloud.geometry.dispose();
                    pointCloud.material.dispose();
                    pointCloud = null;

                    createPointCloud(roundedStep, currentAvatar);
                }

                isTransitioning = false;
            }
        }

        // rebuild step
        if (roundedStep !== currentStep && !isTransitioning) {
            currentStep = roundedStep;
            targetOpacity = 0;
            isTransitioning = true;
        }

        // rotation
        if (pointCloud) {
            const targetY = mouseX * maxRotation;
            currentRotationY += (targetY - currentRotationY) * 0.08;
            pointCloud.rotation.y = currentRotationY;
        }

        renderer.render(scene, camera);
    }

    animate();

    // =========================
    // RESIZE
    // =========================
    window.addEventListener("resize", () => {
        targetOpacity = 0;
        isTransitioning = true;
    });
});
