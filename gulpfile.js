'use strict';

var browserSync = require('browser-sync');
var gulp = require('gulp');
var sass = require('gulp-sass');
var strip = require('gulp-strip-comments');

//browser sync
gulp.task('browser-sync', ['sass', 'templates'], function() {
    browserSync.init({
        proxy: "gatheringplaces.local"
    });
});

//move templates
gulp.task('templates', function(){
  return gulp.src(['!src/theme/**/*.jpg', 'src/theme/**/*'])
    .pipe(strip())
    .pipe(gulp.dest('./omeka-2.6.1/themes/gatheringplaces'))
    .pipe(gulp.dest('./dist/gatheringplaces'))
    .pipe(browserSync.reload({stream:true}))
});

gulp.task('sass', function () {
  return gulp.src('./src/scss/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./omeka-2.6.1/themes/gatheringplaces/css'))
    .pipe(gulp.dest('./dist/gatheringplaces/css'))
    .pipe(browserSync.reload({stream:true}))
});

//watch
gulp.task('watch', function () {
    gulp.watch('src/scss/*.scss', ['sass']);
    gulp.watch('src/theme/**/*', ['templates']);
});

//default task
gulp.task('default', ['browser-sync', 'watch']);
