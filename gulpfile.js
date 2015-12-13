'use stirct';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    prefix = require('gulp-autoprefixer');

/**
 * Compile sass files from sass/ to css/ and _site/css
 */
gulp.task('sass', function() {
  return gulp.src('assets/css/main.sass')
    .pipe(sass().on('error', sass.logError))
    .pipe(prefix(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true }))
    .pipe(gulp.dest('assets/css'));
});

/**
 * Watch sass/ folder and compile
 */
gulp.task('watch', function() {
  gulp.watch(['assets/css/sass/**/*.sass'], ['sass']);
});


gulp.task('default', ['sass', 'watch'], function () {
  console.log('Default task. Watching sass files!');
});