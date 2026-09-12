import * as THREE from "https://cdn.jsdelivr.net/npm/three@0.155.0/build/three.module.js";

(function () {
    // --- VARIABEL GLOBAL INTERNAL ---
    let skBrainMainGroup, skRenderer, skScene, skCamera;
    
    const skClamp = (v, min = 0, max = 1) => Math.max(min, Math.min(max, v));

    // --- 1. PEMBUAT OTAK ---
    function buildSkProceduralBrain() {
        const skGroup = new THREE.Group();
        const skMaterial = new THREE.MeshStandardMaterial({
            color: 0xffffff, roughness: 0.2, metalness: 0.1,
        });

        function buildSkHemisphere(xOffset) {
            const geo = new THREE.SphereGeometry(1, 128, 128);
            const pos = geo.attributes.position;
            const vec = new THREE.Vector3();

            for (let i = 0; i < pos.count; i++) {
                vec.fromBufferAttribute(pos, i);
                vec.z *= 1.35; vec.x *= 0.9;
                if (vec.y < 0) vec.y *= 0.75;

                const f1 = 7.0; const f2 = 14.0;
                const noise = Math.sin(vec.x * f1 + Math.sin(vec.y * f1)) * Math.cos(vec.z * f1) * 0.7 +
                              Math.cos(vec.y * f2 + Math.cos(vec.z * f2)) * Math.sin(vec.x * f2) * 0.3;

                vec.multiplyScalar(1 + Math.pow(Math.abs(noise), 0.8) * Math.sign(noise) * 0.12);
                pos.setXYZ(i, vec.x, vec.y, vec.z);
            }
            geo.computeVertexNormals();
            const mesh = new THREE.Mesh(geo, skMaterial);
            mesh.position.x = xOffset;
            return mesh;
        }

        skGroup.add(buildSkHemisphere(-0.48), buildSkHemisphere(0.48));

        const skCerebellum = new THREE.Mesh(new THREE.SphereGeometry(0.5, 32, 32), skMaterial);
        skCerebellum.position.set(0, -0.6, -0.7);
        skCerebellum.scale.set(1.1, 0.7, 0.9);
        skGroup.add(skCerebellum);

        const skStem = new THREE.Mesh(new THREE.CylinderGeometry(0.2, 0.12, 1.2, 16), skMaterial);
        skStem.position.set(0, -1.1, -0.5);
        skStem.rotation.x = 0.35;
        skGroup.add(skStem);

        return skGroup;
    }

    // --- 2. INITIALIZATION ---
    document.addEventListener("DOMContentLoaded", () => {
        const skCanvasHolder = document.getElementById("brainContainer");
        if (!skCanvasHolder) return;

        skScene = new THREE.Scene();
        skCamera = new THREE.PerspectiveCamera(35, window.innerWidth / window.innerHeight, 0.1, 100);
        skCamera.position.z = 10;

        skRenderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        skRenderer.setSize(window.innerWidth, window.innerHeight);
        skRenderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        skCanvasHolder.appendChild(skRenderer.domElement);

        const skLight = new THREE.DirectionalLight(0xffffff, 2);
        skLight.position.set(5, 5, 5);
        skScene.add(skLight, new THREE.AmbientLight(0xffffff, 0.8));

        skBrainMainGroup = buildSkProceduralBrain();
        skScene.add(skBrainMainGroup);

        skAnimate();
    });

    // --- 3. SCROLL & UI LOGIC ---
    function skAnimate() {
        requestAnimationFrame(skAnimate);

        const skContainer = document.querySelector(".skillsContainer");
        const skWrapper = document.querySelector(".skillsWrapper");
        const skLogoName = document.querySelector(".logoContainer h3");
        const skLogoImg = document.querySelector(".logoContainer img");
        const skDescText = document.querySelector(".skillsWrapper p");
        const skLine = document.querySelector(".lineSkills");

        if (!skContainer || !skBrainMainGroup) return;

        const skRect = skContainer.getBoundingClientRect();
        const winH = window.innerHeight;
        const skOffset = 240;
        const isAboutMeActive = document.body.classList.contains("activeAM");

        // --- A. LOGIKA STICKY / FIXED ---
        if (skRect.top <= -skOffset && skRect.bottom >= winH) {
            if (skWrapper) { skWrapper.classList.add("active"); skWrapper.classList.remove("end"); }
            if (!isAboutMeActive && skLogoImg && window.assets?.wlogo) skLogoImg.src = window.assets.wlogo;
            if (skLogoName) skLogoName.classList.add("logoNameActiveSkill");
            if (skDescText) skDescText.classList.add("removeText");
            if (skLine) skLine.classList.add("removeLine");
        } else if (skRect.bottom < winH) {
            if (skWrapper) { skWrapper.classList.add("end"); skWrapper.classList.remove("active"); }
            if (!isAboutMeActive && skLogoImg && window.assets?.logo) skLogoImg.src = window.assets.logo;
            if (skLogoName) skLogoName.classList.remove("logoNameActiveSkill");
        } else {
            if (skWrapper) skWrapper.classList.remove("active", "end");
            if (!isAboutMeActive && skLogoImg && window.assets?.logo) skLogoImg.src = window.assets.logo;
            if (skLogoName) skLogoName.classList.remove("logoNameActiveSkill");
            if (skDescText) skDescText.classList.remove("removeText");
            if (skLine) skLine.classList.remove("removeLine");
        }

        // --- B. ANIMASI 3D OTAK ---
        const skScrollY = Math.max(0, Math.abs(skRect.top) - skOffset);
        const isSmallScreen = window.innerWidth <= 700;
        const skBaseScale = isSmallScreen ? 0.65 : 1.0;
        const skTargetX = isSmallScreen ? 1.2 : 3.5;

        const skPhase1 = skClamp(skScrollY / (2 * winH), 0, 1);
        const skPhase2 = skClamp((skScrollY - 2 * winH) / (1.5 * winH), 0, 1);

        const skillsContainerContent = document.querySelector('.skillsContainerContent')

        if (skRect.top <= -skOffset) {
            if (skPhase1 < 1) {
                skBrainMainGroup.position.x = skPhase1 * skTargetX;
                skBrainMainGroup.scale.setScalar((1 + skPhase1) * skBaseScale);
                skBrainMainGroup.rotation.y = 1.2 * (1 - skPhase1);
                skBrainMainGroup.rotation.x = 0.3 * (1 - skPhase1);
                skillsContainerContent.style.display = "none";
            } else {
                skBrainMainGroup.position.x = skTargetX;
                skBrainMainGroup.scale.setScalar(2 * skBaseScale);
                skBrainMainGroup.rotation.y = -(skPhase2 * Math.PI * 2);
                skBrainMainGroup.rotation.x = 0;

                skillsContainerContent.style.display = "flex";
            }
        } else {
            skBrainMainGroup.position.x = 0;
            skBrainMainGroup.scale.setScalar(skBaseScale);
            skBrainMainGroup.rotation.y = 1.2;
            skBrainMainGroup.rotation.x = 0.3;
        }

        skRenderer.render(skScene, skCamera);
    }

    window.addEventListener("resize", () => {
        if (!skCamera || !skRenderer) return;
        skCamera.aspect = window.innerWidth / window.innerHeight;
        skCamera.updateProjectionMatrix();
        skRenderer.setSize(window.innerWidth, window.innerHeight);
    });
})();

// --- LOGIKA SVG LINE SCROLL ---
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

        path.style.strokeDashoffset = pathLength - (pathLength * progress);
    });
});