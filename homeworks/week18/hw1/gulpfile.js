const gulp = require('gulp');
const sass = require('gulp-sass'); // 將 scss 轉譯成 css
const minifyCss = require('gulp-minify-css'); // 壓縮 css
const rename = require('gulp-rename'); // 重新命名檔案
const babel = require('gulp-babel'); // 用 babel 將 js 轉成 ES5
const uglify = require('gulp-uglify'); // 壓縮js
const minify = require('gulp-minifier'); // 一次壓縮所有類型(html, css, js)的檔案

// 將 scss 轉譯成 css 並壓縮
function css() {
  return gulp
    .src('./file/*.scss')
    .pipe(sass({ outputStyle: 'expanded' }))
    .pipe(minifyCss({ keepBreaks: true })) // 也可以之後再一起壓縮
    .pipe(rename({ suffix: 'min' }))
    .pipe(gulp.dest('./build/'));
}

// 將 js 轉成 ES5 並壓縮
function script() {
  return gulp
    .src('./file/*.js')
    .pipe(babel({ presets: ['@babel/env'] }))
    .pipe(uglify()) // 也可以之後再一起壓縮
    .pipe(rename({ duffix: 'min' }))
    .pipe(gulp.dest('./build/'));
}

// 壓縮全部檔案
function minifier() {
  return gulp
    .src('./build/*')
    .pipe(minify({
      minify: true,
      minifyJS: {
        sourceMap: true,
      },
      minifyCSS: true,
    }))
    .pipe(gulp.dest('./build/min_document/'));
}

// 輸出
// 方法一：用 gulp.css, gulp.script 分別呼叫函式、執行不同動作
exports.css = css;
exports.script = script;
exports.minifier = minifier;

// 方法二：全部裝進 default 然後用 gulp 一次輸出
const build = gulp.series(css, script, minifier);
exports.default = build;
