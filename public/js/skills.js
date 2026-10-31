import * as THREE from "https://cdn.jsdelivr.net/npm/three@0.155.0/build/three.module.js";
// import { Children } from "react";

(function () {
    // --- VARIABEL GLOBAL INTERNAL & CACHE DOM ---
    let skBrainMainGroup, skRenderer, skScene, skCamera, skPlanet;
    let skHologramMaterial;

    // Cache elemen DOM agar tidak dipanggil terus-menerus di dalam requestAnimationFrame (Hemat RAM/CPU)
    let skContainer,
        skWrapper,
        skLogoName,
        skLogoImg,
        skDescText,
        skLine,
        clothDisp,
        skillsContainerContent,
        allCards;

    function cacheDomElements() {
        skContainer = document.querySelector(".skillsContainer");
        skWrapper = document.querySelector(".skillsWrapper");
        skLogoName = document.querySelector(".logoContainer h3");
        skLogoImg = document.querySelector(".logoContainer img");
        skDescText = document.querySelector(".skillsWrapper p");
        skLine = document.querySelector(".lineSkills");
        clothDisp = document.getElementById("cloth-disp");
        skillsContainerContent = document.querySelector(
            ".skillsContainerContent",
        );
        allCards = document.querySelectorAll(".sk-revolving-card");
    }

    // --- HELPER UI & LOGO ---
    const assetsKey = (isAM, wlogo) =>
        !isAM && window.assets
            ? wlogo
                ? window.assets.wlogo
                : window.assets.logo
            : null;

    function updateUIState(isActive, isEnd, isAboutMeActive) {
        if (skWrapper) {
            skWrapper.classList.toggle("active", isActive);
            skWrapper.classList.toggle("end", isEnd);
        }

        const logoSrc = assetsKey(isAboutMeActive, isActive);
        if (skLogoImg && logoSrc) skLogoImg.src = logoSrc;

        if (skLogoName)
            skLogoName.classList.toggle("logoNameActiveSkill", isActive);
        if (skDescText) skDescText.classList.toggle("removeText", isActive);
        if (skLine) skLine.classList.toggle("removeLine", isActive);
    }

    // --- 1. PEMBUAT OTAK DAN PLANET---
    function buildSkHologramPlanet() {
        const planetGroup = new THREE.Group();
        planetGroup.name = "skHologramPlanet";

        const planetMaterial = new THREE.ShaderMaterial({
            uniforms: {
                uColor: { value: new THREE.Color("#5c3e9f") },
                uEmissive: { value: new THREE.Color("#300983") },
                uScrollProgress: { value: 0.0 },
            },
            vertexShader: `
                varying vec3 vPosition;
                varying float vPosY;

                void main() {
                    vPosition = position;
                    vPosY = position.y;
                    gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
                }
            `,
            fragmentShader: `
                uniform vec3 uColor;
                uniform vec3 uEmissive;
                uniform float uScrollProgress;
                varying vec3 vPosition;
                varying float vPosY;

                void main() {
                    float factor = smoothstep(-5.2, 35.0, vPosY);
                    float minAlpha = 0.0; 
                    float maxAlpha = mix(1.0, 5.0, uScrollProgress);
                    
                    float alpha = mix(minAlpha, maxAlpha, factor);
                    if (alpha < 0.01) discard;

                    vec3 finalColor = mix(uColor, uEmissive, 0.6);
                    gl_FragColor = vec4(finalColor, alpha);
                }
            `,
            wireframe: true,
            transparent: true,
            depthWrite: false,
            depthTest: true,
            blending: THREE.NormalBlending,
        });

        const sphereGeo = new THREE.SphereGeometry(5.0, 32, 32);
        const sphereMesh = new THREE.Mesh(sphereGeo, planetMaterial);
        planetGroup.add(sphereMesh);

        const numRings = 5;
        const baseRadius = 7.0;
        const ringSpacing = 3;

        for (let i = 0; i < numRings; i++) {
            const currentRadius = baseRadius + i * ringSpacing;
            const ringGeo = new THREE.TorusGeometry(
                currentRadius,
                0.05,
                1.6,
                100,
            );
            ringGeo.rotateX(Math.PI / 2 + 0.55);

            const ringMesh = new THREE.Mesh(ringGeo, planetMaterial);
            planetGroup.add(ringMesh);
        }

        planetGroup.position.set(0, 5, -30);
        planetGroup.rotation.z = 0.4;

        planetGroup.traverse((child) => {
            if (child.isMesh) child.renderOrder = -9999;
        });

        planetGroup.visible = false;
        return planetGroup;
    }

    function buildSkProceduralBrain() {
        const skGroup = new THREE.Group();

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

        function buildSkHemisphere(xOffset) {
            const geo = new THREE.SphereGeometry(1, 100, 100);
            const pos = geo.attributes.position;
            const vec = new THREE.Vector3();

            for (let i = 0; i < pos.count; i++) {
                vec.fromBufferAttribute(pos, i);
                vec.z *= 1.35;
                vec.x *= 0.9;
                if (vec.y < 0) vec.y *= 0.65;

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

        skGroup.add(buildSkHemisphere(-0.48), buildSkHemisphere(0.48));

        // --- 2. OTAK BELAKANG (Cerebellum) ---
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
        const skStem = new THREE.Mesh(
            new THREE.CylinderGeometry(0.2, 0.12, 1.2, 12),
            skMaterial,
        );
        skStem.position.set(0, -1.1, -0.5);
        skStem.rotation.x = 0.35;
        skGroup.add(skStem);

        // --- 4. TAMBAHAN DASAR: PANGGUNG & GRID HOLOGRAM ---
        const skPlatformGroup = new THREE.Group();
        skPlatformGroup.name = "skPlatform";

        const stageMesh1 = new THREE.Mesh(
            new THREE.CylinderGeometry(2, 2, 0.5, 40),
            new THREE.MeshStandardMaterial({
                transparent: false,
                color: "#486ad8",
                wireframe: true,
                opacity: 0.8,
            }),
        );
        stageMesh1.position.set(0, -2.6, -0.3);

        const stageMesh2 = new THREE.Mesh(
            new THREE.CylinderGeometry(3, 3, 0.5, 80),
            new THREE.MeshStandardMaterial({
                transparent: false,
                color: "#415aad",
                wireframe: true,
                opacity: 0.9,
            }),
        );
        stageMesh2.position.set(0, -3.2, -0.3);

        skPlatformGroup.add(stageMesh1, stageMesh2);

        const gridSize = 370;
        const gridGeometry = new THREE.PlaneGeometry(
            gridSize,
            gridSize,
            250,
            250,
        );
        gridGeometry.rotateX(-Math.PI / 2);

        const gridMaterial = new THREE.ShaderMaterial({
            transparent: true,
            wireframe: true,
            uniforms: {
                uColor: { value: new THREE.Color("#7085c7") },
                uMaxDistance: { value: gridSize * 0.27 },
            },
            vertexShader: `
            varying vec3 vPosition;

            float random(vec2 st){
                return fract(sin(dot(st.xy, vec2(12.9898, 78.233))) * 43758.5453123);
            }

            float noise(vec2 st){
                vec2 i = floor(st);
                vec2 f = fract(st);
                vec2 u = f * f * (3.0 - 2.0 * f);

                float a = random(i);
                float b = random(i + vec2(1.0, 0.0));
                float c = random(i + vec2(0.0, 1.0));
                float d = random(i + vec2(1.0, 1.0));

                return mix(a, b, u.x) + (c - a) * u.y * (1.0 - u.x) + (d - b) * u.x * u.y;
            }

            float moonCraters(vec2 st) {
                float value = 0.0;
                float amplitude = 0.5;
                float frequency = 0.8;
                
                for (int i = 0; i < 3; i++) {
                    float n = 1.0 - abs(noise(st * frequency) * 2.0 - 1.0);
                    n = pow(n, 2.5);
                    value += n * amplitude;
                    
                    amplitude *= 0.06;
                    frequency *= 29.0;
                }
                return value;
            }

            void main() {
                vec3 pos = position;

                vec2 stretchedCoord = vec2(pos.x * 0.001, pos.z * 0.001);
                float baseTerrain = (noise(stretchedCoord * 1.5) - 0.5) * 20.0;
                
                vec2 warp = vec2(noise(pos.xz * 1.005), noise(pos.xz * 1.005)) * 1.0;
                float craters = moonCraters((pos.xz + warp) * 0.003) * 70.0;

                float dist = length(pos.xz + 1.0);
                float ringCenter = 35.0; 
                float ringWidth = 6.0;
                
                float ringFactor = exp(-pow((dist - ringCenter) / ringWidth, 2.0));
                float smallHills = ringFactor * noise(pos.xz * 0.05) * 7.0;
                float centerClearing = smoothstep(6.0, 10.0, dist);

                pos.y += baseTerrain + craters + (smallHills * centerClearing);
            
                vPosition = pos;
                gl_Position = projectionMatrix * modelViewMatrix * vec4(pos, 1.0);      
            }
        `,
            fragmentShader: `
            uniform vec3 uColor;
            uniform float uMaxDistance;
            varying vec3 vPosition;
            void main() {
                float dist = length(vPosition.xz);
                float alpha = 0.8 - smoothstep(0.0, uMaxDistance, dist);
                gl_FragColor = vec4(uColor, alpha);
            }
        `,
        });

        const terrainMesh = new THREE.Mesh(gridGeometry, gridMaterial);
        terrainMesh.position.set(0, 5.75, 0);
        terrainMesh.renderOrder = 1;
        skPlatformGroup.add(terrainMesh);
        skPlatformGroup.visible = false;

        skGroup.add(skPlatformGroup);
        return skGroup;
    }

    // --- 2. INITIALIZATION ---
    document.addEventListener("DOMContentLoaded", () => {
        const skCanvasHolder = document.getElementById("brainContainer");
        if (!skCanvasHolder) return;

        cacheDomElements();

        skScene = new THREE.Scene();
        skCamera = new THREE.PerspectiveCamera(
            35,
            skCanvasHolder.clientWidth / skCanvasHolder.clientHeight,
            0.1,
            100,
        );
        skCamera.position.z = 10;

        skRenderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        skRenderer.setSize(
            skCanvasHolder.clientWidth,
            skCanvasHolder.clientHeight,
        );
        skRenderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        skCanvasHolder.appendChild(skRenderer.domElement);

        const skLight = new THREE.DirectionalLight(0xffffff, 2);
        skLight.position.set(5, 5, 5);

        const skAmbientLight = new THREE.AmbientLight(0xffffff, 0.8);
        skScene.add(skLight, skAmbientLight);

        skPlanet = buildSkHologramPlanet();
        skScene.add(skPlanet);

        skBrainMainGroup = buildSkProceduralBrain();
        skScene.add(skBrainMainGroup);

        window.addEventListener("resize", () => {
            if (!skCanvasHolder) return;
            skCamera.aspect =
                skCanvasHolder.clientWidth / skCanvasHolder.clientHeight;
            skCamera.updateProjectionMatrix();
            skRenderer.setSize(
                skCanvasHolder.clientWidth,
                skCanvasHolder.clientHeight,
            );
            skRenderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        });

        skAnimate();
    });

    let winW = window.innerWidth;
    let isSmallScreen = winW <= 700;

    window.addEventListener("resize", () => {
        winW = window.innerWidth;
        isSmallScreen = winW <= 700;
    });

    function skClamp(val, min, max) {
        return Math.min(Math.max(val, min), max);
    }

    let mouseX = 0;
    let mouseY = 0;
    let targetMouseX = 0;
    let targetMouseY = 0;

    let planetCurrentX = 0;

    window.addEventListener("mousemove", (e) => {
        targetMouseX = (e.clientX / window.innerWidth) * 2 - 1;
        targetMouseY = -(e.clientY / window.innerHeight) * 2 + 1;
    });

    // --- 3. SCROLL & UI ANIMATION LOGIC ---
    function skAnimate() {
        requestAnimationFrame(skAnimate);

        cacheDomElements();

        mouseX += (targetMouseX - mouseX) * 0.05;
        mouseY += (targetMouseY - mouseY) * 0.05;

        if (
            !skContainer ||
            typeof skBrainMainGroup === "undefined" ||
            !skBrainMainGroup
        )
            return;

        const skRect = skContainer.getBoundingClientRect();
        const winH = window.innerHeight;
        const skOffset = 240;
        const isAboutMeActive = document.body.classList.contains("activeAM");
        const skPlatform = skBrainMainGroup.getObjectByName("skPlatform");

        // --- A. LOGIKA STICKY / FIXED WRAPPER ---
        const isStickyActive = skRect.top <= -skOffset && skRect.bottom >= winH;
        const isStickyEnd = skRect.bottom < winH;

        if (isStickyActive) {
            updateUIState(true, false, isAboutMeActive);
            setTimeout(() => {
                if (skPlatform) skPlatform.visible = true;
            }, 500);
        } else if (isStickyEnd) {
            updateUIState(false, true, isAboutMeActive);
            if (skPlatform) skPlatform.visible = false;
        } else {
            updateUIState(false, false, isAboutMeActive);
            if (skPlatform) skPlatform.visible = false;
        }

        // --- B. ANIMASI 3D OTAK & CARD ---
        const skScrollY = Math.max(0, Math.abs(skRect.top) - skOffset);
        const skBaseScale = isSmallScreen ? 0.65 : 1.0;

        const skPhase1 = skClamp(skScrollY / (3 * winH), 0, 1);

        if (skillsContainerContent) {
            skillsContainerContent.classList.remove("active");
        }

        if (skRect.top <= -skOffset) {
            if (skPhase1 < 1) {
                let curentScale;
                let moveProgress = 0;

                const targetMinScale = 0;
                const midScale = 0.12;
                skPlanet.visible = false;

                if (skPhase1 <= 0.5) {
                    const p1 = skPhase1 / 0.5;
                    curentScale = skBaseScale * (1.0 - p1 * (1.0 - midScale));
                    moveProgress = 0;
                    if (skPlanet) skPlanet.visible = false;
                } else {
                    const p2 = (skPhase1 - 0.5) / 1.0;
                    curentScale =
                        skBaseScale *
                        (midScale - p2 * (midScale - targetMinScale));

                    moveProgress = p2;

                    if (skPlanet) {
                        skPlanet.traverse((child) => {
                            skPlanet.visible = true;
                            if (
                                child.isMesh &&
                                child.material.uniforms &&
                                child.material.uniforms.uScrollProgress
                            ) {
                                child.material.uniforms.uScrollProgress.value =
                                    p2;
                            }
                        });
                    }
                }

                skBrainMainGroup.position.y = moveProgress * -4;
                skBrainMainGroup.position.z = moveProgress * 2;

                skBrainMainGroup.scale.set(
                    curentScale,
                    curentScale * 1.02,
                    curentScale * 0.9,
                );

                skBrainMainGroup.rotation.y = 1.2 * (1.0 - moveProgress);
                skBrainMainGroup.rotation.x = 0.32 * (1.0 - moveProgress);

                // if (skillsContainerContent)
                //     skillsContainerContent.style.display = "none";
            } else {
                const defaultRotationY = 0.12;
                const defaultRotationX = 0.2;

                let targetRotY = defaultRotationY - mouseX * 0.8;
                let clampedTargetY = skClamp(targetRotY, -0.2, 0.2);

                skBrainMainGroup.rotation.y +=
                    (clampedTargetY - skBrainMainGroup.rotation.y) * 0.05;
                skBrainMainGroup.rotation.x = defaultRotationX;

                if (skPlanet) {
                    const planetTargetX = mouseX * -0.5;
                    planetCurrentX += (planetTargetX - planetCurrentX) * 0.1;

                    skPlanet.position.x = planetCurrentX;
                }

                if (skillsContainerContent) {
                    skillsContainerContent.classList.add("active");
                }
            }
        } else {
            skBrainMainGroup.scale.setScalar(skBaseScale);
            skBrainMainGroup.rotation.y = 1.2;
            skBrainMainGroup.rotation.x = 0.3;

            if (skPlanet) {
                skPlanet.position.x = 0;
                planetCurrentX = 0;
            }
        }
        skRenderer.render(skScene, skCamera);
    }
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
