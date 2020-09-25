const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js").sass(
    "resources/sass/app.scss",
    "public/css"
);

// Datarables
mix.js("resources/js/datatables.js", "public/js").sass(
    "resources/sass/datatables.scss",
    "public/css"
);

mix.js("resources/js/fronted/app.js", "public/fronted/js").sass(
    "resources/sass/fronted/app.scss",
    "public/fronted/css"
);
