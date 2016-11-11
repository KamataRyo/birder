import gulp       from 'gulp'
import plumber    from 'gulp-plumber'
import autoprefixer from 'gulp-autoprefixer'
import rename     from 'gulp-rename'
import uglify     from 'gulp-uglify'
import concat     from 'gulp-concat'
import sass       from 'gulp-sass'
import minify     from 'gulp-clean-css'
import sourcemaps from 'gulp-sourcemaps'
import rtlcss     from 'gulp-rtlcss'
import sort       from 'gulp-sort'
import wpPot      from 'gulp-wp-pot'
import gettext    from 'gulp-gettext'

import browserify from 'browserify'
import babelify   from 'babelify'
import source     from 'vinyl-source-stream'
import streamqueue  from 'streamqueue'
import buffer     from 'vinyl-buffer'
import browserSync from 'browser-sync'

import meta       from './package.json'

const scripts = {
  main: {
    src: ['./scripts/main.js'],
    dest: './'
  },
  customizer: {
    src: ['./scripts/customizer.js'],
    dest: './'
  }
}

const styles = {
  src: [
    './sass/**/*.scss'
  ],
  dest: './'
}

const exStyles = {
  src: [
    './node_modules/highlight.js/styles/default.css',
    './node_modules/genericons/genericons/genericons.css'
  ]
}

const pots = {
  src: './**/*.php',
  dest: './languages/'
}

const languages = {
  src: './languages/*.po',
  dest: 'languages/'
}

gulp.task('js:main', () => {
  const {src, dest} = scripts.main
  browserify({ entries: src })
    .transform([babelify])
    .bundle()
    .pipe(source('bundle.js'))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(gulp.dest(dest))
})

gulp.task('js:customizer', () => {
  const {src, dest} = scripts.customizer
  browserify({ entries: src })
    .transform([babelify])
    .bundle()
    .pipe(source('customizer.js'))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(gulp.dest(dest))
})

gulp.task('css', () => {

  streamqueue(
    { objectMode: true },

    gulp.src(exStyles.src)
      .pipe(plumber())
      .pipe(sourcemaps.init()),

    gulp.src(styles.src)
      .pipe(plumber())
      .pipe(sourcemaps.init())
      .pipe(sass())
  )
    .pipe(autoprefixer({
      browsers: ['last 2 versions'],
      cascade: false
    }))
    .pipe(concat('style.css'))
    .pipe(minify())
    .pipe(gulp.dest(styles.dest))
    .pipe(rtlcss())
    .pipe(rename('rtl.css'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(styles.dest))
})

gulp.task('wpPot', () => {
  const {src, dest} = pots

  gulp.src(src)
   .pipe(plumber())
   .pipe(sort())
   .pipe(wpPot({
     domain: meta.name,
     destFile: `${meta.name}.pot`
   }))
   .pipe(gulp.dest(dest))
})


gulp.task('gettext', () => {
  const {src, dest} = languages
  gulp.src(src)
    .pipe(plumber())
    .pipe(gettext())
    .pipe(gulp.dest(dest))
})

gulp.task('build', ['js:main', 'js:customizer', 'css', 'gettext'])

gulp.task('start', ['build'], () => {
  // browserSync.init({ server: { baseDir: './' } })
  gulp.watch(scripts.customizer.src, ['js:customizer'])
  gulp.watch(scripts.main.src,       ['js:main'])
  gulp.watch(styles.src,             ['css'])
  gulp.watch(languages.src,          ['gettext'])
  gulp.watch([languages.src, './*.css', './*.js'])
    // .on('change', browserSync.reload)
})
