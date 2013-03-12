/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    watch: {
      files: ['sass/*.scss', 'index.html'],
      tasks: ['sass:dev']
    },
    sass: {
      dist: {
        files: {
          'css/gallery.build.css': 'sass/gallery.build.scss',
          'css/gallery.theme.css': 'sass/gallery.theme.scss'
        }
      },
      dev: {
        options: {
          style: 'expanded'
        },
        files: {
          'css/gallery.build.css': 'sass/gallery.build.scss',
          'css/gallery.theme.css': 'sass/gallery.theme.scss'
        }
      }
    },
    csslint: {
      dist: {
        src: ['css/*.css']
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
  grunt.registerTask('default', ['sass', 'csslint', 'cssmin']);

  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-csslint');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
};