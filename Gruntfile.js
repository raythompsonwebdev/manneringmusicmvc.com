const sass = require('node-sass');

module.exports = (grunt) => {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    responsive_images: {
      dev: {
        options: {
          engine: 'im',
          sizes: [
            {
              name: '220',
              width: 220,
            },
            {
              name: '240',
              width: 240,
            },
            {
              name: '260',
              width: 260,
            },
            {
              name: '280',
              width: 280,
            },
            {
              name: '300',
              width: 300,
            },
            {
              name: '320',
              width: 320,
            },
            {
              name: '340',
              width: 340,
            },
            {
              name: '360',
              width: 360,
            },
          ],
        },

        /*
            You don"t need to change this part if you don"t change
            the directory structure.
            */
        files: [
          {
            expand: true,
            src: ['*.{gif,jpg,png}'],
            cwd: 'test-images/',
            dest: 'img/',
          },
        ],
      },
    },

    cwebp: {
      dynamic: {
        options: {
          q: 60,
        },
        files: [
          {
            expand: true,
            cwd: 'test-images/',
            src: ['*.{gif,jpg,png}'],
            dest: 'img/',
          },
        ],
      },
    },

    babel: {
      files: {
        expand: true,
        src: ['public_html/**/*.js'],
        ext: '-compiled.js',
      },
      options: {
        sourceMap: true,
        presets: ['@babel/preset-env'],
      },
    },

    stylelint: {
      options: {
        configFile: '.stylelintrc.js',
        formatter: 'string',
        ignoreDisables: false,
        failOnError: true,
        outputFile: '',
        reportNeedlessDisables: false,
        fix: false,
        syntax: 'sass',
      },
      src: ['sass/**/*.scss'],
    },

    eslint: {
      options: {
        overrideConfigFile: '.eslintrc.json',
        fix: true,
      },
      target: ['public_html/**/*.js', 'Gruntfile.js'],
    },

    /* Generate the directory if it is missing */
    mkdir: {
      dev: {
        options: {
          create: ['img', 'test-images'],
        },
      },
    },

    /**
     * sass Task
     */
    sass: {
      options: {
        implementation: sass,
        sourceMap: false,
        sourceMapEmbed: false,
        sourceMapContents: false,
      },
      dev: {
        options: {
          style: 'expanded',
          sourcemap: false,
        },

        files: {
          'public_html/style.css': 'public_html/assets/css/style.scss',
          /* where file goes-----/where file from */
        },
      },
      dist: {
        options: {
          style: 'compressed',
          sourcemap: false,
        },
        files: {
          'public_html/style-min.css': 'public_html/assets/css/style.scss',
          /* where file goes-----/where file from */
        },
      },
    },

    /**
     * watch
     */
    watch: {
      sass: {
        files: [
          'public_html/assets/css/*.scss',
          'public_html/**/*.js',
          'Gruntfile.js',
        ],
        tasks: ['sass'],
      },
    },
  });

  grunt.loadNpmTasks('grunt-responsive-images');
  grunt.loadNpmTasks('grunt-babel');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-mkdir');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-eslint');
  grunt.loadNpmTasks('grunt-stylelint');
  grunt.loadNpmTasks('grunt-cwebp');

  grunt.registerTask('default', [
    'babel',
    'sass',
    'watch',
    'responsive_images',
    'eslint',
    'clean',
    'mkdir',
    'c-webp',
  ]);
};

/* add bag (!) to wordpress css theme top-title so that it shows on minified file */
