const sass = require('node-sass');

module.exports = function (grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		babel: {
			files: {
				expand: true,
				src: ['public_html/assets/js/*.js'],
				dest: 'public_html/assets/js/',
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
				sourceMap: true,
				sourceMapEmbed: true,
				sourceMapContents: true,
			},
			dev: {
				options: {
					style: 'expanded',
					sourcemap: true,
				},

				files: {
					'public_html/style.css': 'public_html/assets/css/style.scss',
					/*where file goes-----/where file from*/
				},
			},
			dist: {
				options: {
					style: 'compressed',
					sourcemap: true,
				},
				files: {
					'public_html/style-min.css': 'public_html/assets/css/style.scss',
					/*where file goes-----/where file from*/
				},
			},
		},

		cssmin: {
			// Begin CSS Minify Plugin
			target: {
				files: [
					{
						expand: true,
						cwd: 'scss',
						src: ['public_html/assets/css/*.scss', '!*.min.scss'],
						dest: 'public_html/',
						ext: '.min.css',
					},
				],
			},
		},

		/**
		 * watch
		 */
		watch: {
			sass: {
				files: 'public_html/assets/css/*.scss',
				tasks: ['sass', 'cssmin'],
			},
		},
	});

	grunt.loadNpmTasks('grunt-babel');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default', ['babel', 'sass', 'watch']);
};

/* add bag (!) to wordpress css theme top-title so that it shows on minified file*/
