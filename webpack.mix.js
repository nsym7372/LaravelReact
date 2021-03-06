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

mix.ts('resources/ts/index.tsx', 'public/js')
    .browserSync({
        proxy: {
            target: "http://localhost/public",
        },
        files: [
            './resources/**/*',
            './public/**/*',
        ]})
    .sass('resources/scss/app.scss', 'public/css');

if(mix.inProduction()){
    mix.version();
}
