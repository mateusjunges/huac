const mix = require('laravel-mix');

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

mix.webpackConfig({
    node: {
        fs: "empty",
    }
});

mix.extend('aliasConfig', new class {
    webpackConfig(webpackConfig) {
        webpackConfig.resolve.extensions.push('.js', '.json', '.vue'); // you don't need this on v4
        webpackConfig.resolve.alias = {
            'vue$': 'vue/dist/vue.esm.js',
            '@components': __dirname + '/resources/js/components',
            '@passport': __dirname + '/resources/js/components/passport',
            '@views': __dirname + '/resources/js/views',
            '@report': __dirname + '/resources/js/views/report',
            '@routes': __dirname + '/resources/js/routes/routes'
        };
    }
});
mix.aliasConfig();

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
