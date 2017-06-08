module.exports = function(grunt) {
  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat: {
      options: {
        separator: "\n", //add a new line after each file
        banner: "", //added before everything
        footer: "" //added after everything
      },
      css: {
          src: [
          'assets/**/*.css'
          ],
          dest: 'dist/css/main.css'
      },
      js: {
        // the files to concatenate
        src: [
          //include libs
          'assets/**/*.js',
        ],
        // the location of the resulting JS file
        dest: 'dist/js/main.js'
      }
    },
    uglify: {
      dist: {
        files: {
          'dist/js/main.min.js': ['<%= concat.js.dest %>'],
        }
      }
    },
    cssmin: {
      target: {
        files: [{
          expand: true,
          cwd: 'dist/css',
          src: ['*.css', '!*.min.css'],
          dest: 'dist/css',
          ext: '.min.css'
        }]
      }
    },
    watch: {
      files: ['assets/**/*.js', 'assets/**/*.css'],
      tasks: ['concat', 'uglify', 'cssmin'],
      options: {
        interrupt: true
      }
    }
  }); 

  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');

  //register the task
  grunt.registerTask('default', ['concat', 'uglify', 'cssmin']);
};