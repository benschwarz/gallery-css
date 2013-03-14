/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    watch: {
      files: ['sass/*.scss', 'index.html'],
      tasks: ['sass:dev']
    },
    sass: {
      dist: {
        options: {
          style: 'expanded'
        },
        files: {
          'css/<%= pkg.name %>.css': 'sass/<%= pkg.name %>.build.scss',
          'css/<%= pkg.name %>.theme.css': 'sass/<%= pkg.name %>.theme.scss'
        }
      }
    },
    csslint: {
      dist: {
        src: ['css/*.css']
      }
    },
    rework: {
      'css/<%= pkg.name %>.prefixed.css': 'css/<%= pkg.name %>.css',
      options: {
        use: [
          ['rework.keyframes'],
          ['rework.prefix', 'animation'],
          ['rework.prefix', 'animation-delay'],
          ['rework.prefix', 'transition']
        ],
        vendors: ['-moz-', '-webkit-', '-o-']
      }
    },
    cssmin: {
      unprefixed: {
        src: 'css/gallery.css',
        dest: 'css/gallery.min.css'
      },
      prefixed: {
        src: 'css/gallery.prefixed.css',
        dest: 'css/gallery.prefixed.min.css'
      }
    }
  });

  // Default task.
  grunt.registerTask('default', ['sass', 'rework', 'csslint', 'cssmin']);

  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-csslint');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-rework');
};