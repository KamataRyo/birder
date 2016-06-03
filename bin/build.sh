#!/usr/bin/env bash

# CofeeScript and SASS
./node_modules/.bin/gulp build

# Download library
./node_modules/.bin/bower install

ls -la ./node_modules/grunt/lib/grunt

# Generate README.md for github
./node_modules/grunt/lib/grunt readme

# generate mo
./node_modules/grunt/lib/grunt i18n
