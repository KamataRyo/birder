module.exports = (grunt)->
    'use strict'
    banner = '/**\n * <%= pkg.homepage %>\n * Initiated by <%= grunt.template.today("yyyy") %>\n * This file is generated automatically. Do not edit.\n */\n'
    # Project configuration
    grunt.initConfig {

        pkg: grunt.file.readJSON 'package.json'
        addtextdomain:
            options:
                textdomain: 'biwako'
            target:
                files:
                    src: [
                        '*.php',
                        '**/*.php',
                        '!node_modules/**',
                        '!tests/**',
                        '!bin/**'
                    ]


        wp_readme_to_markdown:
            your_target:
                files:
                    'README.md': 'readme.txt'

        makepot:
            target:
                options:
                    domainPath: '/languages'
                    mainFile: 'functions.php'
                    potFilename: 'biwako.pot'
                    potHeaders:
                        poedit: true
                        'x-poedit-keywordslist': true
                    type: 'wp-theme'
                    updateTimestamp: true
    }


    grunt.loadNpmTasks 'grunt-wp-i18n'
    grunt.loadNpmTasks 'grunt-wp-readme-to-markdown'
    grunt.registerTask 'i18n', ['addtextdomain', 'makepot']
    grunt.registerTask 'readme', ['wp_readme_to_markdown']

    grunt.util.linefeed = '\n'
