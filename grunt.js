/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    watch: {
      files: ['sass/gallery.scss', 'index.html'],
      tasks: 'default'
    },
    sass: {
      dist: {
        files: {
          'css/gallery.css': 'sass/gallery.scss'
        }
      },
      dev: {
        options: {
          style: 'expanded'
        },
        files: {
          'css/gallery.css': 'sass/gallery.scss'
        }
      }
    },
    cssmin: {
      dist: {
        src: 'css/gallery.css',
        dest: 'css/gallery.min.css'
      }
    }
  });

  // Default task.
  grunt.registerTask('default', 'sass cssmin');

  grunt.loadNpmTasks('grunt-yui-compressor');
  grunt.loadNpmTasks('grunt-contrib-sass');

};
