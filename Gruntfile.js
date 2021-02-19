const sass = require('node-sass');

module.exports = function (grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

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
					/*where file goes-----/where file from*/
				},
			},
			dist: {
				options: {
					style: 'compressed',
					sourcemap: false,
				},
				files: {
					'public_html/style-min.css': 'public_html/assets/css/style.scss',
					/*where file goes-----/where file from*/
				},
			},
		},

		/**
		 * watch
		 */
		watch: {
			sass: {
				files: 'public_html/assets/css/*.scss',
				tasks: ['sass'],
			},
		},
	});

	grunt.loadNpmTasks('grunt-babel');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default', ['babel', 'sass', 'watch']);
};

/* add bag (!) to wordpress css theme top-title so that it shows on minified file*/
