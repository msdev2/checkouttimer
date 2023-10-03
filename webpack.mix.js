const mix = require('laravel-mix');
const path = require("path");
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

mix
.sass('resources/backend/scss/app.scss', 'public/backend')
.js('resources/backend/js/app.js', 'public/backend')
.copy('resources/backend/img', 'public/backend/img')
.vue()
.webpackConfig({
    resolve: {
        alias: {
            '@': path.resolve('resources/backend')
        }
    },
})
.webpackConfig({
    output: {
        filename:'[name].js',
        chunkFilename: 'js/chunks/[name].[hash].js',
    },
})
.version()
.sourceMaps();


