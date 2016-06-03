#!/usr/bin/env bash

# CofeeScript and SASS
./node_modules/.bin/gulp build

# Download library
./node_modules/.bin/bower install

# temporary use global module
# Generate README.md for github
grunt readme

# generate mo
grunt i18n
