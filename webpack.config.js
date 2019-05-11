var Encore = require('@symfony/webpack-encore');



Encore
    // directory where compiled assets will be stored
    .setOutputPath('web/build/')

    //Versioning changes the different file names to a hash name , making all cache irrelevant

    // public path used by the web server to access the output path
    .setPublicPath('/build')

    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG
     *
     * Add 1 entry for each "page" of your app
     * (including one that's included on every page - e.g. "app")
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if you JavaScript imports CSS.
     */

    //SCCS
    .addStyleEntry('css/baseStyles', './assets/css/baseStyles.scss')

    .addStyleEntry('css/front/index', './assets/css/front/index.scss')
    .addStyleEntry('css/front/register', './assets/css/front/register.scss')

    .addStyleEntry('css/journal/baseStyles', './assets/css/journal/baseStyles.scss')
    .addStyleEntry('css/journal/index', './assets/css/journal/index.scss')
    .addStyleEntry('css/journal/monthTasks', './assets/css/journal/monthTasks.scss')

    //JS

    .addEntry('js/journal/baseJS', './assets/js/journal/baseJS.js')

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()


    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning()



    // uncomment if you use Sass/SCSS files
    .enableSassLoader(function(sassOptions) {}, {
        resolveUrlLoader: false
    })

    .enableSassLoader()

    // uncomment if you're having problems with a jQuery plugin
    .autoProvidejQuery()

    
    ;

module.exports = Encore.getWebpackConfig();
