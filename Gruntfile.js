module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON("package.json"),

    
    /**
     * sass Task
     */
    sass: {
      dev: {
        options: {
          style: "expanded",
          sourcemap: "auto"
        },

        files: {
          "public_html/style.css": "public_html/assets/css/style.scss"
          /*where file goes-----/where file from*/
        }
      },

      dist: {
        options: {
          style: "compressed",
          sourcemap: "auto"
        },
        files: {
          "public_html/style-min.css": "public_html/assets/css/style.scss"
          /*where file goes-----/where file from*/
        }
      }
    },

    /**
     * watch
     */
    watch: {
      css: {
        files: "public_html/**/*.scss",
        tasks: ["sass"]
      }
    }
  });


  grunt.loadNpmTasks("grunt-contrib-copy");
  grunt.loadNpmTasks("grunt-contrib-sass");
  grunt.loadNpmTasks("grunt-contrib-watch");

  grunt.registerTask("default", ["sass", "watch"]);
};

/* add bag (!) to wordpress css theme top-title so that it shows on minified file*/
