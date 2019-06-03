var Encore = require('@symfony/webpack-encore');

var webpack = require('webpack');



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
    .addStyleEntry('css/app', './assets/css/app.scss')
    .addStyleEntry('css/formInputs', './assets/css/formInputs.scss')
    .addStyleEntry('css/jquery-timepicker', './assets/css/jquery-ui-timepicker-addon.css')
    .addStyleEntry('css/baseStyles', './assets/css/baseStyles.scss')
    .addStyleEntry('css/journal/_variables_custom', './assets/css/journal/_variables_custom.scss')
    .addStyleEntry('css/journal/calendar', './assets/css/journal/calendar.scss')
    .addStyleEntry('css/journal/colors', './assets/css/journal/_colors.scss')

    .addStyleEntry('css/front/index', './assets/css/front/index.scss')
    .addStyleEntry('css/front/register', './assets/css/front/register.scss')

    .addStyleEntry('css/journal/baseStyles', './assets/css/journal/baseStyles.scss')
    .addStyleEntry('css/journal/index', './assets/css/journal/index.scss')
    .addStyleEntry('css/journal/monthTasks', './assets/css/journal/monthTasks.scss')

    .addStyleEntry('css/journal/category/category_select', './assets/css/journal/category/category_select.scss')
    .addStyleEntry('css/journal/category/scrollable_typehead', './assets/css/journal/category/scrollable_typehead.scss')
    .addStyleEntry('css/journal/event/new_edit', './assets/css/journal/event/new_edit.scss')

    .addStyleEntry('css/journal/transactions/index', './assets/css/journal/transactions/index.scss')

    //JS

    .addEntry('js/app', './assets/js/app.js')
    .addEntry('js/jquery-timepicker', './assets/js/timepickeraddon.js')
    .addEntry('js/jquery.datetimepicker.full', './assets/js/datetimepicker.js')
    .addEntry('js/journal/baseJS', './assets/js/journal/baseJS.js')
    .addEntry('js/journal/event/calendar', './assets/js/journal/event/calendar.js')
    .addEntry('js/journal/event/dashboard', './assets/js/journal/event/dashboard.js')

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk()


    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning()

    .autoProvidejQuery()
    .createSharedEntry('vendor', './assets/js/shared_entry')


    // uncomment if you use Sass/SCSS files
    .enableSassLoader(function (sassOptions) { }, {
        resolveUrlLoader: false
    })

    .enableSassLoader()

    // uncomment if you're having problems with a jQuery plugin



    ;

module.exports = Encore.getWebpackConfig();
