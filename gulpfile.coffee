gulp     = require 'gulp'
plumber  = require 'gulp-plumber'
notify   = require 'gulp-notify'
rename   = require 'gulp-rename'
coffee   = require 'gulp-coffee'
concat   = require 'gulp-concat'
uglify   = require 'gulp-uglify'
sass     = require 'gulp-sass'
minify   = require 'gulp-minify-css'
sourcemaps = require 'gulp-sourcemaps'
rtlcss   = require 'gulp-rtlcss'
sort     = require 'gulp-sort'
wpPot    = require 'gulp-wp-pot'
gettext  = require 'gulp-gettext'
meta     = require './package.json'

scopes = [
    'js/**/*.coffee'
    'sass/**/*.scss'
    '**/*.php'
    'languages/*.po'
]

tasks = ['coffee', 'sass', 'wpPot', 'gettext']

src =
    coffee:   'js/**/*.coffee'
    sass:  'sass/**/*.scss'
    wpPot:    '**/*.php'
    gettext:  'languages/*.po'

gulp.task 'coffee', ()->
    gulp.src src['coffee']
        .pipe plumber(errorHandler: notify.onError '<%= error.message %>')
        .pipe coffee { bare:false }
        # .pipe concat 'index.min.js'
        .pipe uglify()
        .pipe gulp.dest './js/'


gulp.task 'sass', ()->
    gulp.src src['sass']
        .pipe plumber(errorHandler: notify.onError '<%= error.message %>')
        .pipe sourcemaps.init()
        .pipe sass()
        .pipe minify()
        .pipe gulp.dest './'
        .pipe rtlcss()
        .pipe rename 'rtl.css'
        .pipe sourcemaps.write()
        .pipe gulp.dest './'


gulp.task 'wpPot', ()->
    gulp.src src['wpPot']
        .pipe plumber(errorHandler: notify.onError '<%= error.message %>')
        .pipe sort()
        .pipe wpPot
            domain: meta.name
            destFile: "#{meta.name}.pot"
        .pipe gulp.dest './languages'


gulp.task 'gettext', ()->
    gulp.src src['gettext']
        .pipe plumber(errorHandler: notify.onError '<%= error.message %>')
        .pipe gettext()
        .pipe gulp.dest './languages'

gulp.task 'build', tasks

gulp.task 'watch', tasks, ()->
    gulp.watch scopes, tasks

gulp.task 'default', tasks.concat 'watch'
