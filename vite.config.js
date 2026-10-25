import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

let baseRouteCss = "public/css/";
let baseRouteJs = "public/js/";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: [
                // CSS Route
                baseRouteCss + "skills.css",
                baseRouteCss + "index.css",
                baseRouteCss + "hireMe.css",
                baseRouteCss + "hero.css",
                baseRouteCss + "experience.css",
                baseRouteCss + "certificate.css",
                baseRouteCss + "aboutMe.css",

                // JS Route
                baseRouteJs + "skills.js",
                // baseRouteJs + "index.js",
                // baseRouteJs + "hireMe.js",
                baseRouteJs + "hero.js",
                // baseRouteJs + "experience.js",
                // baseRouteJs + "certificate.js",
                baseRouteJs + "aboutMe.js",

                "resources/views/**/*.blade.php",
            ],

            server: {
                watch: {
                    usePolling: true,
                    interval: 100,
                },
            },
        }),
        tailwindcss(),
    ],
});
