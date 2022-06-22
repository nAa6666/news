const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('public/styles/style.scss', 'public/styles/compiled/style.min.css').options({
        processCssUrls: false,
    }, require('autoprefixer')({
        browsers: ['last 40 versions']
    })
).version();

mix.sass('public/styles/admin/style.scss', 'public/styles/compiled/admin/style.min.css').options({
        processCssUrls: false,
    }, require('autoprefixer')({
        browsers: ['last 40 versions']
    })
).version();
