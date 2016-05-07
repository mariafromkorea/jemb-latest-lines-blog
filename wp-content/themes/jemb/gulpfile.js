/**
 * Front end tasks for rezFusion.
 */

var gulp = require('gulp'),
    plugins = require('gulp-load-plugins')({
        lazy: false
    }),
    argv = require('yargs').argv;

// Define variables for our paths
var paths = {
    sass: ['scss/*.scss', 'scss/**/*.scss'],
    css: './css',
    files: 'templates/*.php',
    js: 'js/*.js',
    img: 'images/',
    imgmin: 'imagemin/*.{jpg,png,gif,svg}',
    maps: './maps'
};

console.log(argv);

// Sass stylesheet tasks
gulp.task('sass', require('./tasks/styles').sass(gulp, plugins, paths));
gulp.task('sassdev', require('./tasks/styles').sassdev(gulp, plugins, paths));

// Minify images 
gulp.task('img', require('./tasks/images').img(gulp, plugins, paths));

// Create icon font from a folder of SVGs (icons/*.svg). Has to be run separately from default task
gulp.task('icons', require('./tasks/icons').icons(gulp, plugins, paths));

// Clear the gulp cache - run `gulp clear`
gulp.task('clear', function(done) {
    return plugins.cache.clearAll(done);
});

// Watch function
// Pass flag --dev to generate sourcemap
gulp.task('watch', function() {
    if (argv.dev) {
        gulp.watch(paths.sass, ['sassdev']);
    } else {
        gulp.watch(paths.sass, ['sass']);
    }
    gulp.watch(paths.imgmin, ['img']);
    plugins.livereload.listen({
        basePath: './**'
    });
    gulp.watch(['./css/*.css', 'templates/*.php', 'js/*.js', 'images/*.{jpg,png,gif,svg}', 'imging/*.{jpg,png,gif,svg}']).on('change', plugins.livereload.changed);

});

// Define default task
gulp.task('default', ['watch']);
