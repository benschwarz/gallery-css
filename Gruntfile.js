module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    watch: {
      files: ['sass/*.scss'],
      tasks: ['sass', 'concat']
    },

    concat: {
      main: {
        files: {
          'css/main.css': [
            'components/normalize-css/normalize.css',
            'css/gallery.css',
            'css/gallery.theme.css',
            'css/screen.css'
          ]
        }
      }
    },

    sass: {
      main: {
        files: {
          'css/screen.css': 'sass/screen.scss',
          'css/narrow.css': 'sass/narrow.scss',
          'css/wide.css': 'sass/wide.scss'
        }
      }
    }
  });
 
  grunt.registerTask('default', ['sass', 'concat']);

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-concat');
};