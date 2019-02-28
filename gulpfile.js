'use strict';

var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');

gulp.task('scripts', function() {
    return gulp.src([
        './node_modules/jquery/dist/jquery.min.js', 
        './node_modules/popper.js/dist/umd/popper.min.js', 
        './node_modules/bootstrap/dist/js/bootstrap.min.js', 
        './source/js/lib/sweetalert2.min.js',
        './source/js/app.js',
    ])
        .pipe(concat('app.js'))
        //.pipe(uglify())
        .pipe(gulp.dest('./assets/js/'));
});

gulp.task('sass', function () {
    return gulp.src(['./source/scss/style.scss'])
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('./assets/css/'));
});

gulp.task('scripts:watch', function () {
    gulp.watch('./source/js/**/*.js', ['scripts']);
});

gulp.task('sass:watch', function () {
    gulp.watch('./source/scss/**/*.scss', ['sass']);
});

gulp.task('default', [ 'scripts', 'scripts:watch', 'sass', 'sass:watch' ]);