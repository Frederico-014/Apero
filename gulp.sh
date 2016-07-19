#!/usr/bin/env bash

GULP='yes'

if [[ $GULP=='yes' ]];
    then
    npm install -g gulp
    npm install gulp --save-dev
    npm install gulp-sass --save-dev
    npm install gulp-uglify --save-dev
    npm install gulp-minify-css --save-dev
    npm install gulp-concat --save-dev
    npm install gulp-rename --save-dev
    npm install browser-sync --save-dev
    exit ;
fi