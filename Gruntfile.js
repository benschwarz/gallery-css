/*global module:false*/
module.exports = function(grunt) {

  var tilde = require('tilde-expansion'), 
      s3Credentials;

  tilde('~/.gallery-css-s3-credentials', function ( path ) {
    s3Credentials = grunt.file.readJSON( path );
  }),

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    watch: {
      files: ['sass/*.scss', 'index.html'],
      tasks: ['sass']
    },
    sass: {
      main: {
        options: {
          style: 'expanded',
          precision: 1
        },
        files: {
          'dist/<%= pkg.name %>.css': 'sass/<%= pkg.name %>.build.scss'
        }
      },
      theme: {
        options: {
          style: 'expanded'
        },
        files: {
          'dist/<%= pkg.name %>.theme.css': 'sass/<%= pkg.name %>.theme.scss'
        }
      }
    },
    csslint: {
      options: {
        csslintrc: '.csslintrc'
      },
      dist: {
        src: ['dist/*.css']
      }
    },
    recess: {
      dist: {
        options: {
          noOverqualifying: false
        },
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
          ['rework.prefix', 'animation-play-state'],
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
    },

    s3: {
      options: {
        key: s3Credentials.key,
        secret: s3Credentials.secret,
        bucket: 'gallery-css',
        access: 'public-read'
      },
      dist: {
        upload: [
          {
            src: 'dist/*.css',
            dest: './'
          }
        ]
      }      
    },
    connect: {
      server: {
        options: {
          port: 3000,
          base: './'
        }
      }
    }
  });

  // Default task.
  grunt.registerTask('default', ['sass', 'rework', 'csslint', 'recess', 'cssmin']);

  // Use for development
  grunt.registerTask('dev', ['connect', 'watch']);

  // S3 credentials required to run this
  grunt.registerTask('release', ['default', 's3']);

  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);
};