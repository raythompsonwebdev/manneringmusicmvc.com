const sass = require('sass');

module.exports = (grunt) => {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    responsive_images: {
      dev: {
        options: {
          engine: 'im',
          sizes: [
            {
              name: '125',
              width: 125,
            },
            {
              name: '145',
              width: 145,
            },
            {
              name: '175',
              width: 175,
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
        src: ['public_html/js/*.js'],
        ext: '-compiled.js',
      },
      options: {
        sourceMap: true,
        presets: ['@babel/preset-env'],
      },
    },

    stylelint: {
      options: {
        configFile: '.stylelintrc.json',
        formatter: 'string',
        ignoreDisables: false,
        failOnError: true,
        outputFile: '',
        reportNeedlessDisables: false,
        fix: true,
        syntax: '',
      },
      src: ['public_html/assets/css/**/*.{css,less,scss}'],
    },

    postcss: {
      options: {
        map: true, // inline sourcemaps

        processors: [
          // eslint-disable-next-line global-require
          require('@csstools/postcss-sass')(/* node-sass options */),
          // eslint-disable-next-line global-require
          require('autoprefixer')(),
          // eslint-disable-next-line global-require
          require('postcss-preset-env')({
            stage: 1,
          }),
          // eslint-disable-next-line global-require
          // require('cssnano')(),
        ],
      },
      dist: {
        src: 'public_html/assets/css/style-copy.scss',
        dest: 'public_html/style.css',
      },
    },

    eslint: {
      options: {
        overrideConfigFile: '.eslintrc.json',
        fix: true,
      },
      target: ['public_html/assets/js/*.js', 'Gruntfile.js'],
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
        },

        files: {
          'public_html/style.css': 'public_html/assets/css/style-copy.scss',
          /* where file goes-----/where file from */
        },
      },
      dist: {
        options: {
          style: 'compressed',
          sourcemap: false,
        },
        files: {
          'public_html/style-min.css': 'public_html/assets/css/style-copy.scss',
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
          'public_html/assets/css/style-copy.scss',
          'public_html/assets/css/partials/*.scss',
        ],
        tasks: ['sass', 'postcss'],
      },

      js: {
        files: ['public_html/**/*.js'],
        task: ['babel'],
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
  // grunt.loadNpmTasks('grunt-cwebp');
  grunt.loadNpmTasks('@lodder/grunt-postcss');

  grunt.registerTask('default', [
    'babel',
    'sass',
    'watch',
    'responsive_images',
    'eslint',
    'clean',
    'mkdir',
    // 'c-webp',
    'postcss',
  ]);
};

/* add bag (!) to wordpress css theme top-title so that it shows on minified file */
