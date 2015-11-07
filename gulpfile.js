var gulp = require('gulp');
var browserSync = require('browser-sync');
var reload = browserSync.reload;
var uncss = require('gulp-uncss');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var concat = require('gulp-concat');
var nano = require('gulp-cssnano');

// IMAGEMIN optimizer task
gulp.task('images', function () {
    return gulp.src('assets/img/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('assets/img/optimized/'));
});

//UNCSS TASK - not piped into serve
gulp.task('css', function () {
    return gulp.src('assets/css/**/*.css')
        .pipe(concat('main.css'))
        .pipe(uncss({
            html: ['**/*.html']
        }))
        .pipe(nano())
        .pipe(gulp.dest('./out'));
});

// watch files for changes and reload
gulp.task('serve', function() {
  browserSync({
    server: {
      baseDir: './'
    },
    notify: false
  });

  gulp.watch(['./*.html', './assets/css/*.css', './assets/js/*.js'], {cwd: './'}, reload);
});
