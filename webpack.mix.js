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
// Start Admin
mix.scripts(
    [
        "resources/js/admin/waves.min.js",
        "resources/js/admin/jquery.slimscroll.js",
        "resources/js/admin/pcoded.min.js",
        "resources/js/admin/vertical-layout.min.js",
        "resources/js/admin/script.min.js"
    ],
    "public/backend/js/all.js"
)
    .js("resources/js/admin/app.js", "public/backend/js")
    .sass("resources/sass/admin/app.scss", "public/backend/css");

// Datatables
mix.js("resources/js/admin/datatables.js", "public/backend/js/").sass(
    "resources/sass/admin/datatables.scss",
    "public/backend/css"
);
// End Admin

mix.js("resources/js/fronted/app.js", "public/js").sass(
    "resources/sass/fronted/app.scss",
    "public/css"
);
