const babel = require('gulp-babel');
const uglify = require('gulp-uglify');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const csswring = require('csswring');
const autoprefixer = require('autoprefixer-core');
const uncss = require('postcss-uncss');
const concat = require('gulp-concat');
const browserSync = require('browser-sync');
const imagemin = require('gulp-imagemin');
const pngquant = require('imagemin-pngquant');
const cache = require('gulp-cache');
const eslint = require('gulp-eslint');
const plumber = require('gulp-plumber');
const postscss = require('gulp-postcss');
const reporter = require('postcss-reporter');
const syntaxScss = require('postcss-scss');
const stylelint = require('stylelint');

const { src, dest, parallel, series, watch } = require('gulp');

// local_server-----------------
const browsersync = () => {
  browserSync.init({
    proxy: 'dev.impel'
  })
}
exports.browsersync = browsersync
// -----------------local_server

// scripts-----------------------
const js = () => src([
  './src/scripts/core/*.js',
  './src/scripts/modules/**/*.js',
  './src/scripts/pages/*.js',
  './src/scripts/hooks/*.js',
  './src/scripts/barba.hooks.js',
])
  .pipe(eslint({}))
  .pipe(concat('app.js'))
  .pipe(babel())
  .pipe(uglify())
  .pipe(dest('./dist/js'))
  .pipe(browserSync.stream())
  .pipe(eslint.format())
exports.js = js

const libs = () => src([
  './node_modules/babel-polyfill/dist/polyfill.min.js',
  './node_modules/gsap/dist/gsap.min.js',
  './src/libs/barba.min.js'
])
  .pipe(concat('libs.js'))
  .pipe(uglify())
  .pipe(dest('./dist/js/'));
exports.libs = libs
// -----------------------scripts

// styles-----------------------
const styles = () => {
  const stylelintConfig = {
    rules: {
      'block-no-empty': true,
      'color-no-invalid-hex': true,
      'declaration-colon-space-after': 'always',
      'declaration-colon-space-before': 'never',
      'function-comma-space-after': 'always',
      'media-feature-colon-space-after': 'always',
      'media-feature-colon-space-before': 'never',
      'media-feature-name-no-vendor-prefix': true,
      'max-empty-lines': 5,
      'number-no-trailing-zeros': true,
      'property-no-vendor-prefix': true,
      'string-quotes': 'double',
      'value-no-vendor-prefix': true
    }
  }

  const scssProcessors = [
    stylelint(stylelintConfig),
    reporter({
      clearMessages: true,
      throwError: true
    })
  ]

  const processors = [
    csswring,
    autoprefixer({
      browsers: ['last 2 version']
    })
  ]
  return src('./src/styles/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(postscss(scssProcessors, { syntax: syntaxScss }))
    .pipe(postcss(processors))
    .pipe(plumber({
      errorHandler: console.error
    }))
    .pipe(dest('./dist/css'))
    .pipe(browserSync.stream());
}
exports.styles = styles
// -----------------------styles

// css-libs-------------------
const cssLibs = () =>
  // const processors = [
  //   uncss({
  //     html: './*.php'
  //     // ignore: ['example']
  //   })
  // ]
  src([
    './node_modules/bootstrap/dist/css/bootstrap-grid.min.css',
  ])
    .pipe(concat('libs.css'))
    // .pipe(postcss(processors))
    .pipe(dest('./dist/css/'))

exports.cssLibs = cssLibs
// -------------------css-libs

// images-----------------------
const img = () => src('./src/img/**/*')
  .pipe(
    cache(
      imagemin({
        interlaced: true,
        progressive: true,
        svgoPlugins: [
          {
            removeViewBox: false
          }
        ],
        use: [pngquant()]
      })
    )
  )
  .pipe(dest('dist/img'))
exports.img = img
// -----------------------images

// fonts----------------------
const fonts = () => src('./src/fonts/**/*').pipe(dest('dist/fonts'))
exports.fonts = fonts

// delete cache and dist folder
const clear = () => cache.clearAll()
exports.clear = clear

const live = () => {
  watch('src/scripts/**/*.js', js)
  watch('src/styles/**/*.scss', parallel(cssLibs, styles))
  watch('src/img/**/*', img)
  watch('src/fonts/**/*', fonts)
  watch('./**/*.php', parallel(cssLibs, styles))
}
exports.live = live

exports.default = series(
  parallel(cssLibs, styles, libs, js, img, fonts),
  parallel(live, browsersync)
)
