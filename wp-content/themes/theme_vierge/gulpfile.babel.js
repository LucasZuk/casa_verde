import gulp from 'gulp';

const config = require('./gulp-config.json');

const P = require("gulp-load-plugins")({
    pattern: ['gulp-*', 'gulp.*'],
    replaceString: /\bgulp[\-.]/
});

var log = require('fancy-log');

// ====================================================
// JS Vendor : Bower
// ====================================================
gulp.task('vendors', (done) => {
    gulp.src('browserify.js')
        .pipe(P.browserify({
            insertGlobals: true
        }))
        .pipe(P.rename(config.dest.filePrefix + 'vendors.js'))
        .pipe(gulp.dest(config.dest.js))
        .pipe(P.rename(config.dest.filePrefix + 'vendors.min.js'))
        .pipe(P.uglify())
        .pipe(gulp.dest(config.dest.js));
    done();
});

// ====================================================
// JS Scripts
// ====================================================
gulp.task('scripts', (done) => {
    gulp.src([config.assets.js + '*/*.js', config.assets.js + '*.js'])
        .pipe(P.babel({
            presets: ['@babel/env']
        }))
        .pipe(P.concat(config.dest.filePrefix + 'scripts.js'))
        .pipe(gulp.dest(config.dest.js))
        .pipe(P.rename(config.dest.filePrefix + 'scripts.min.js'))
        .pipe(P.uglify())
        .on('error', log)
        .pipe(gulp.dest(config.dest.js));
    done();
});

// ====================================================
// SASS Styles > CSS
// ====================================================
gulp.task('sass', (done) => {
    gulp.src(config.assets.sass + 'main.scss')
        .pipe(P.sass({
            outputStyle: 'expanded',
            includePaths: [
                config.assets.sass
            ]
        }).on('error', P.sass.logError))
        .pipe(P.autoprefixer())
        .pipe(P.rename(config.dest.filePrefix + 'main.css'))
        .pipe(gulp.dest(config.dest.css))
        .pipe(P.rename(config.dest.filePrefix + 'main.min.css'))
        .pipe(P.uglifycss())
        .pipe(gulp.dest(config.dest.css));
    done();
});

// ====================================================
// SVG Symbols
// ====================================================
gulp.task('icons', (done) => {
    gulp.src(config.assets.icons+'*.svg')
        .pipe(P.imagemin([
            P.imagemin.svgo({
                plugins: [{
                    removeViewBox: false
                }]
            })
        ]))
        .pipe(gulp.dest(config.dest.icons))
        .pipe(P.svgSymbols({
            title: '',
            templates: ['default-svg']
        }))
        .pipe(gulp.dest(config.dest.icons));
    done();
});

// ====================================================
// Fonts
// ====================================================
gulp.task('fonts', (done) => {
    gulp.src([config.assets.fonts+'*.ttf'])
        .pipe(gulp.dest(config.dest.fonts));

    gulp.src([config.assets.fonts+'*.ttf']) 
        .pipe(P.ttf2eot())
        .pipe(gulp.dest(config.dest.fonts));

    gulp.src([config.assets.fonts+'*.ttf']) 
        .pipe(P.ttf2woff())
        .pipe(gulp.dest(config.dest.fonts));

    gulp.src([config.assets.fonts+'*.ttf']) 
        .pipe(P.ttfSvg())
        .pipe(gulp.dest(config.dest.fonts));

    gulp.src([config.assets.fonts+'*.ttf']) 
        .pipe(P.ttf2woff2())
        .pipe(gulp.dest(config.dest.fonts));
    done();
});

// ====================================================
// Images
// ====================================================
gulp.task('images', (done) => {
    gulp.src(config.assets.img + '**')
        .pipe(P.newer(config.dest.img))
        .pipe(P.imagemin([
            P.imagemin.gifsicle({interlaced: true}),
            P.imagemin.mozjpeg({progressive: true}),
            P.imagemin.optipng({optimizationLevel: 5}),
            P.imagemin.svgo()
        ]))
        .pipe(gulp.dest(config.dest.img));
    done();
});

// ====================================================
// WATCH
// ====================================================
gulp.task('watch:js', (done) => {
    P.watch([
        config.assets.js + '**/*.js'
    ], gulp.series('scripts') );
    done();
});

gulp.task('watch:sass', (done) => {
    P.watch([
        config.assets.sass + '**/*.scss'
    ], gulp.series('sass') );
    done();
});

gulp.task('watch:images', (done) => {
    P.watch([
        config.assets.img + '**/*.jpg',
        config.assets.img + '**/*.png',
        config.assets.img + '**/*.gif',
        config.assets.img + '**/*.svg'
    ], gulp.series('images') );
    done();
});

gulp.task('watch:icons', (done) => {
    P.watch([
        config.assets.icons + '**/*.svg'
    ], gulp.series('icons') );
    done();
});

// ====================================================
// BUILD
// ====================================================
export const watch = gulp.parallel('watch:js', 'watch:sass', 'watch:images', 'watch:icons');
export const build = gulp.parallel('vendors', 'scripts', 'sass', 'images', 'fonts', 'icons');
export const prod = gulp.series(build, watch);
export default prod;