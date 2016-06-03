#!/usr/bin/env bash

# CofeeScript and SASS
./node_modules/.bin/gulp build

# Download library
./node_modules/.bin/bower install

# Generate README.md for github
./node_modules/grunt/lib readme

# generate mo
./node_modules/grunt/lib i18n
