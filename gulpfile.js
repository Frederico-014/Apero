var gulp        =require('gulp'),
    sass        =require('gulp-sass'),
    minify      =require('gulp-minify-css'),
    uglify      =require('gulp-uglify'),
    rename      =require('gulp-rename');
browserSync =require('browser-sync');

var path=
{
    'resources':
    {
        'sass':'./resources/assets/sass',
        'js':'./resources/assets/js'
    },
    'public':
    {
        'css':'./public/assets/css',
        'js':'./public/assets/js'
    },
    'sass':'./resources/assets/sass/**/*.scss',
    'js':'./resources/assets/js/**/*.js'
};

gulp.task('hello',function()
{
    console.log('Hello les devs');
});

gulp.task('browserSync', function () {
    browserSync.init({
        proxy: ""
    });
});

gulp.task('task-sass',function ()
{
    return gulp.src(path.resources.sass+'/app.scss')
        .pipe(sass({onError:console.error.bind(console,'SASS ERROR')}))
        .pipe(minify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(path.public.css));
});

gulp.task('task-js',function ()
{
    return gulp.src(path.resources.js+'/app.js')
        .pipe(uglify())
        .pipe(rename({suffix:'.min'}))
        .pipe(gulp.dest(path.public.js))
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('watch',function ()
{
    gulp.watch(path.sass,['task-sass']);
    gulp.watch(path.js,['task-js']);
});

gulp.task('default', ['watch']);