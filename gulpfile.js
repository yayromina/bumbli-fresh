// Include main components
var gulp = require('gulp'),
    gutil = require('gulp-util'),
    replace = require('gulp-replace');
var $    = require('gulp-load-plugins')();

// Include CSS components
var sass = require('gulp-sass'),
    prefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css');

// Include JS components
var include = require('gulp-include'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify');

// Include utilities
var rename = require('gulp-rename'),
    livereload = require('gulp-livereload');

// Source and Target directories
var sourceSASS = 'src/scss',
    targetCSS = '';

var sourceJS = 'src/js',
    targetJS = 'dist/js';

var sassPaths = [
  'bower_components/foundation-sites/scss',
  'bower_components/motion-ui/src'
];

gulp.task('styles', function() {
  return gulp.src(sourceSASS + '/style.scss')
    .pipe($.sass({
      includePaths: sassPaths
    }).on('error', $.sass.logError))
    .pipe(sass().on('error', gutil.log))
    // .pipe(prefixer('last 10 versions'))
    .pipe(minifycss({ keepSpecialComments: 1 }))
    .pipe(gulp.dest(targetCSS))
    .pipe(livereload());
});


// JS compilation
gulp.task('js', function(){
  gulp.src('src/js/scripts.js')
    .pipe(include({
    extensions: "js",
    includePaths: [
      __dirname + "/bower_components",
      __dirname + '/'+sourceJS
    ]
  }))
    .pipe(concat('scripts.min.js'))
    .pipe(uglify({mangle:true}).on('error', gutil.log))
    .pipe(gulp.dest(targetJS))
    .pipe(livereload());
});

// Watch for changes to php files
gulp.watch('**/*.php', livereload.reload);

// Watch for Sass and JS changes and run the respective compilers automatically
gulp.task('watch', function(){
  livereload.listen();
  gulp.watch(sourceSASS + '**/*.scss', ['styles']);
  gulp.watch(sourceJS + '/scripts.js', ['js']);
})

// Default Task
gulp.task('default', ['styles', 'js', 'watch']);