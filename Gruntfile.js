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
          'dist/<%= pkg.name %>.css': 'sass/<%= pkg.name %>.build.scss',
          'dist/<%= pkg.name %>.theme.css': 'sass/<%= pkg.name %>.theme.scss'
        }
      }
    },
    csslint: {
      dist: {
        src: ['dist/*.css']
      }
    },
    recess: {
      dist: {
        src: ['dist/<%= pkg.name %>.css', 'dist/<%= pkg.name %>.theme.css']
      }
    },
    rework: {
      'dist/<%= pkg.name %>.prefixed.css': 'dist/<%= pkg.name %>.css',
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
        src: 'dist/<%= pkg.name %>.css',
        dest: 'dist/<%= pkg.name %>.min.css'
      },
      prefixed: {
        src: 'dist/<%= pkg.name %>.prefixed.css',
        dest: 'dist/<%= pkg.name %>.prefixed.min.css'
      }
    }
  });

  // Default task.
  grunt.registerTask('default', ['sass', 'rework', 'csslint', 'recess', 'cssmin']);

  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-csslint');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-rework');
  grunt.loadNpmTasks('grunt-recess');
};