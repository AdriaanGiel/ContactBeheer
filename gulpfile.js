var elixir      = require('laravel-elixir');
var gulp        = require('gulp');
var browserSync = require('browser-sync');
var prefix      = require('gulp-autoprefixer');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

gulp.task('browser-sync',function(){
   browserSync.init({

   })
});

gulp.task('sass',function(){
    return gulp.src('resources/assets/sass/app.scss')
        .pipe(sass({
            includePaths: ['scss'],
            onError: browserSync.notify
        }))
        .pipe(prefix(['last 15 versions', '1%','ie 8', 'ie 7'], {cascade:true} ))
        .pipe(gulp.dest('public/css'))

});

elixir(function(mix) {
    //mix.sass('app.scss');

    mix.styles([
        '../bower/bootswatch-dist/css/bootstrap.min.css',
        '../bower/jquery.jscrollpane/jquery.jscrollpane.css',
        '../bower/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css',
        'style.css'
    ]);



    mix.scripts([
        '../bower/jquery/dist/jquery.js',
        '../bower/jquery-ui/jquery-ui.min.js',
        '../bower/jquery-mousewheel/jquery.mousewheel.js',
        '../bower/jquery.jscrollpane/mwheelIntent.js',
        '../bower/jquery.jscrollpane/jquery.jscrollpane.min.js',
        '../bower/bootstrap-sass/assets/javascripts/bootstrap.min.js',
        '../bower/bootstrap-switch/dist/js/bootstrap-switch.min.js',
        'main.js'
    ]);

    mix.styles([
        "../bower/admin-lte/bootstrap/css/bootstrap.min.css",
        "../bower/admin-lte/plugins/datatables/dataTables.bootstrap.css",
        "../bower/admin-lte/dist/css/skins/_all-skins.css",
        "../bower/admin-lte/dist/css/AdminLTE.css",
        "admin/style.css",
        "../bower/summernote/dist/summernote.css"
    ], 'public/css/admin/main.css');

    mix.scripts([
        '../bower/admin-lte/plugins/jQuery/jQuery-2.2.0.min.js',
        '../bower/admin-lte/plugins/jQueryUI/jquery-ui.min.js',
        // '../bower/admin-lte/bootstrap/js/bootstrap.min.js',
        '../bower/admin-lte/plugins/datatables/jquery.dataTables.js',
        '../bower/admin-lte/plugins/datatables/dataTables.bootstrap.js',
        '../bower/admin-lte/dist/js/app.min.js'
        // "../bower/summernote/dist/summernote.js"
    ], 'public/js/admin/main.js');


    mix.copy('resources/assets/bower/bootstrap-sass/assets/fonts/bootstrap/','public/fonts');
    mix.copy('resources/assets/bower/admin-lte/bootstrap/fonts', 'public/css/fonts');
    mix.version(['public/css/all.css', 'public/js/all.js', 'public/css/admin/main.css','public/js/admin/main.js']);


});
