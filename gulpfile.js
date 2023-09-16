/**
 * @The Ultimate GulpFile
 * @Author Vishwa LiyanaArachchi
 *
 * @project EME Frontier 
 * @package eme_frontier
 * @since EME Frontier 1.0004
 * 
 * @functionality : SASS/SCSS to CSS (minified) with Sourcemaps (1)
 * @functionality : LESS to CSS (minified) with Sourcemaps (1.1)
 * @functionality : JS Concatenate and Minify (2)
 * @functionality : copy template files from src to public, when not using PUG (3)
 * @functionality : Watcher with Browser-sync (4)
 * @functionality : image compression (5)
 * @functionality : compiling Pug templates - gulp-pug
 * @functionality : cleaning up SVG, minify and make the sprite. Include a watcher to run when new svg is added
 * @functionality : auto prefixer
 * @functionality : run gulp with parameters
 * @functionality : critical CSS
 * 
*/

// ENV file parser 
const envData       = require('dotenv').config();
// import dotenv  from dotenv;

/* *DEF */
const gulp          = require('gulp');
// import gulp from "gulp";
const sass          = require('gulp-sass')(require('sass'));
const less          = require('gulp-less');
const browserSync   = require('browser-sync').create();
const postCSS       = require('gulp-postcss');
const cssNano       = require('cssnano');
const terser        = require('gulp-terser');
const renameFile    = require('gulp-rename');
const sourcemaps    = require('gulp-sourcemaps');
const concat        = require('gulp-concat');

const { src, dest, watch, series } = require('gulp');

// Image minifier
// const imgMin        = require('gulp-imagemin');
// // const {gifsicle, mozjpeg, optipng, svgo} = require('gulp-imagemin');
// const { gifsicle, optipng, svgo} = require('gulp-imagemin');
// // const mozjpeg = require('imagemin-mozjpeg');


// View
const chalk         = require('chalk');


// Startup

console.log( chalk.yellow(" __    __    __                         __        _  _               \r\n|_ |V||_    |_  __ _ __ _|_ o  _  __   (_  _  _ _|__|_ _  |  _| _  __\r\n|__| ||__   |   | (_)| | |_ | (\/_ |    __)(_ (_| |  | (_) | (_|(\/_ | ") );
// https://ascii-generator.site/t/      bigfig

//https://fsymbols.com/generators/carty/
console.log( chalk.yellow("𝕧. "+envData.parsed.PACKAGE_VER) ); 
console.log( chalk.yellow( "@ "+envData.parsed.PACKAGE_AUTHOR+"\n" ) );


// 0. Verify Gulp is workin

function tugvi_theWakeUpCall(basic_cback){
    console.log(chalk.green("The Ultimate GulpFile is running.. \n"))
    basic_cback();
}

// 1. Compile and minify SCSS -> CSS

// 1.1 Public styles
function tugvi_publicSASS(publicSASS_cb){
    console.log("Starting Public");
    return gulp.src("public/css/vi-whatsapp-wp-public.scss" , {sourcemaps:true})
    .pipe( sourcemaps.init() )
    .pipe( sass().on('error', sass.logError) )
    .pipe( postCSS( [cssNano()] )  )
    .pipe( sourcemaps.write('.') )
    .pipe( gulp.dest('public/css/') , {sourcemaps:'.'} );

    publicSASS_cb();
}

// 1.2 Admin styles
function tugvi_adminSASS(adminSASS_cb){
    console.log("Starting Public");
    return gulp.src("admin/css/vi-whatsapp-wp-admin.scss" , {sourcemaps:true})
    .pipe( sourcemaps.init() )
    .pipe( sass().on('error', sass.logError) )
    .pipe( postCSS( [cssNano()] )  )
    .pipe( sourcemaps.write('.') )
    .pipe( gulp.dest('admin/css/') , {sourcemaps:'.'} );

    adminSASS_cb();
}

// function tugvi_sassCompiler(sassCallback){
//     console.log("Starting SASS Ops.");

//     // Set source file
//     // return gulp.src(['./assets/style.scss' , './assets/style-header.scss'], { sourcemaps:true })
//     return gulp.src('src/assets/scss/styles.scss', { sourcemaps:true })

//     // Sourcemaps
//     .pipe(sourcemaps.init())

//     // Compile SASS
//     .pipe( sass().on('error', sass.logError) )

//     // minify compiled
//     .pipe( postCSS( [cssNano()] ) )

//     //rename final file
//     .pipe( renameFile( {
//         extname: ".min.css" 
//         }
//     ) )

//     // write sourcemap to a file
//     .pipe(sourcemaps.write('.'))

//     // save css file
//     .pipe( gulp.dest('public/assets/css/'), { sourcemaps:'.' } );
    
// }


// 1.1 Compile and minify LESS -> CSS
// function tugvi_lessCompiler(lessCallback){
//     console.log("Starting Less Compilation...");

//     return gulp.src('src/assets/less/styles.less')

//     // Sourcemaps
//     .pipe(sourcemaps.init())

//     // Compile less
//     .pipe( less() )

//     // minify compiled
//     .pipe( postCSS( [cssNano()] ) )

//     //rename final file
//     .pipe( renameFile( {
//         extname: ".min.css" 
//         }
//     ) )

//     // write sourcemap to a file
//     .pipe(sourcemaps.write('.'))

//     // save css file
//     .pipe( gulp.dest('public/assets/css/'), { sourcemaps:'.' } );

//     lessCallback();

// }

// 2. Minify and/or concatenate JS 
// function tugvi_jsCompiler(jsCallback){
//     console.log("Starting JS Tasks");

//     return gulp.src('./assets/js/*.js')

//     // Sourcemaps
//     .pipe(sourcemaps.init())

//     // concat
//     .pipe(concat('all.min.js'))

//     .pipe(terser({
//         mangle: {
//             toplevel: true
//         }
//     }))

//     .pipe(sourcemaps.write('.'))

//     // save css file
//     .pipe( gulp.dest('./dist/js'), { sourcemaps:'.' } );

//     jsCallback();
// }

// 3. Basic copy operation for template files from src to public, when not using PUG
// function tugvi_copyTemplatesDirect(fileCopyCallback){
//     console.log("Preparing template files");

//     return gulp.src('src/**/*.php')
//     .pipe( gulp.dest('public/') );

// }

// 4. Le Watcher
function tugvi_leWatcher(watcher_cb){
    browserSync.init({
        browser : "firefox",
        // Get the project serve URL. Ex: https://local.yourtestsite.com
        proxy: "http://localhost/myplugins/"
    });

    gulp.watch('./**/*.scss', series(tugvi_publicSASS, tugvi_adminSASS));

    gulp.watch("./**/*.scss").on('change', series(tugvi_publicSASS, tugvi_adminSASS) );
    gulp.watch("./**/*.scss").on('change', browserSync.reload);
    gulp.watch("./**/*.php").on('change', browserSync.reload);
    // gulp.watch("./**/*.js").on('change', series( tugvi_jsCompiler, browserSync.reload) );

    watcher_cb();
}

// 5. Image minification
// function tugvi_imgMinify(imgMin_cb){

//     return gulp.src('src/assets/images/*')
//     .pipe( imgMin(
//         [
//             gifsicle({interlaced: true, optimizationLevel : 3}),
//             // mozjpeg({quality: 75, progressive: true}),
//             optipng({optimizationLevel: 5}),
//             svgo({
//                 plugins: [
//                     {removeViewBox: true},
//                     {cleanupIDs: false}
//                 ]
//             })
//         ]
//     ) )
//     .pipe( gulp.dest('public/assets/images/') )

//     imgMin_cb();
// }



// Default tasks
// exports.default = series(
//     tugvi_theWakeUpCall,
//     tugvi_sassCompiler,
//     tugvi_jsCompiler,
//     tugvi_copyTemplatesDirect,
//     tugvi_leWatcher,
// );
exports.default = series(
    tugvi_theWakeUpCall,
    tugvi_publicSASS,
    tugvi_adminSASS,
    tugvi_leWatcher,
);

// exports.doLess = series(
//     tugvi_theWakeUpCall,
//     tugvi_lessCompiler,
//     tugvi_jsCompiler,
//     tugvi_copyTemplatesDirect,
//     tugvi_leWatcher,
// );

// exports.images = series(tugvi_imgMinify);

// exports.butcher = function() {
//     // You can use a single task
//     // watch('src/*.css', css);
//     // Or a composed task
//     watch('./assets/scss/*.scss', series(sassCompiler));
// };