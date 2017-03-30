/*!
* @author Md. Mozahidur Rahman
*/

'use strict';

//Grunt Module function
module.exports = function (grunt) {

  //Display the elapsed execution time of grunt tasks
  require('time-grunt')(grunt);

  //Grunt Configuration
  grunt.initConfig({

  //Get package meta data
  pkg: grunt.file.readJSON('package.json'),

  //Set project object
  project: {
   bower: 'src/components'
 },


//Clean
clean: {
  dev: ['tmp'],
},

//Sass
sass:{
  dev: {
    options: {
      style: 'expanded',
      lineNumbers: true
      },
      files:{
        'style.css' : 'src/sass/styles.scss'
      }
    },

    build_css: {
      options: {
        style: 'expanded',
        //compass: true,
        sourcemap: 'none'
      },
      files:{
        'tmp/style.dev.css' : 'src/sass/styles.scss'
      }
    },

    build_min: {
      options: {
        style: 'compressed',
        sourcemap: 'none'
      },
      files:{
        'tmp/style.css' : 'src/sass/styles.scss'
      }
    },
  },

//Autoprefixer
autoprefixer: {
  options:{
    browsers:[    
    'Android >= 2.3',
    'BlackBerry >= 7',
    'Chrome >= 9',
    'Firefox >= 4',
    'Explorer >= 9',
    'iOS >= 5',
    'Opera >= 11',
    'Safari >= 5',
    'OperaMobile >= 11',
    'OperaMini >= 6',
    'ChromeAndroid >= 9',
    'FirefoxAndroid >= 4',
    'ExplorerMobile >= 9'
    ]
  },

  multiple_files: {
    expand: true,
    flatten: true,
    src: 'tmp/*.css',
    dest: 'css/'
  },
},

//copy
copy: {
  dev: {
    files: [
    {expand: true, flatten: true, src: ['src/js/*-settings.js'], dest: 'js/', filter: 'isFile'},
    ],
  },

  build_css: {
    files: [
    {expand: true, flatten: true, src: ['css/style.css'], dest: '', filter: 'isFile'},
    ],
  },

  build_js: { // need to dynamic_mappings http://gruntjs.com/configuring-tasks#globbing-patterns
    files: [
    {expand: true, flatten: true, src: ['src/js/**'], dest: 'js/', filter: 'isFile'},
    {expand: true, flatten: true, src: ['<%= project.bower %>/bootstrap-sass/assets/javascripts/bootstrap.min.js'], dest: 'js/', filter: 'isFile'},
    {expand: true, flatten: true, src: ['<%= project.bower %>/bPopup/jquery.bpopup.min.js'], dest: 'js/', filter: 'isFile'},
    {expand: true, flatten: true, src: ['<%= project.bower %>/imagesloaded/imagesloaded.pkgd.min.js'], dest: 'js/', filter: 'isFile'},
    {expand: true, flatten: true, src: ['<%= project.bower %>/isotope/dist/isotope.pkgd.min.js'], dest: 'js/', filter: 'isFile'},
    {expand: true, flatten: true, src: ['<%= project.bower %>/gsap/src/minified/TweenMax.min.js'], dest: 'js/', filter: 'isFile'},
    {expand: true, flatten: true, src: ['<%= project.bower %>/matchHeight/dist/jquery.matchHeight-min.js'], dest: 'js/', filter: 'isFile'},
    {expand: true, flatten: true, src: ['<%= project.bower %>/jquery/dist/jquery.min.js'], dest: 'js/', filter: 'isFile'}
    ],
  },
},

//uglify
uglify: {
  my_target: {
    files: [{
      expand: true,
      theme_502mediad: 'js',
      src: ['*.js', '!*.min.js'],
      dest: 'js',
      ext: '.min.js'
    }]
  }
},

//jshint
jshint: {
  options: {
    curly: true,
    eqeqeq: true,
    eqnull: true,
    browser: true,
    globals: {
      jQuery: true
    },
  },
  all: ['src/js/*.js'],
},

//Notify
notify: {
  watch:{
    options: {
      enabled: true,
      message: 'Watch task is running...',
      duration: 0.2, // the duration of notification in seconds, for `notify-send only
      success: true
    },
  },
  watch_dev:{
    options: {
      enabled: true,
      message: 'DEV task is running...',
      duration: 0.2, // the duration of notification in seconds, for `notify-send only
      success: true
    },
  },
  watch_build:{
    options: {
      enabled: true,
      message: 'BUILD task is running...',
      duration: 3, // the duration of notification in seconds, for `notify-send only
      },
  },
},

//Browsersync 
browserSync: {
  main: {
    bsFiles: {
      src : ['**/*.css','**/*.php','js/*.js']
    },

    options: {
      watchTask: true,
      proxy: 'http://192.168.0.104/502mediagroup/502media/'
    }
  }
},

//Watch
// watch: {
//   dev_css: {
//     files: 'src/**/*.scss', 
//     tasks: ['sass:dev']
//   },

//   dev_js: {
//     files: 'src/**/*js',
//     tasks: ['copy:dev']
//   },

 //  build: {
 //    files: 'src/{,**/}*.{scss,js}', //or files: ['src/**/*.scss','src/**/*js']
 //    tasks: ['clean','sass:build_css','sass:build_min','autoprefixer','copy:build','uglify']
 //  },

 //  options: {
 //   //   spawn: false, //to see the time disable this
 // },
// },

//Concurrent
// concurrent: {
//   dev: ['watch:dev_css','watch:dev_js'],
// },

});// Grunt Configuration END!


//Load the required Grunt plugins automatically
require('jit-grunt')(grunt, {
  notify: 'grunt-notify', //If any plugin that can not be resolved in the automatic mapping.
});

//Run using concurrent
//grunt.registerTask('default', ['concurrent']);

//Run using watch
// grunt.registerTask('default', ['browserSync','notify:watch','watch']);

//Custom watch configuration For DEV
grunt.registerTask('watch_dev', function () {
  grunt.config.merge({
    watch: {
      dev_css: {
        files: 'src/**/*.scss', 
        tasks: ['sass:dev']
      },
      dev_js: {
        files: 'src/**/*js',
        tasks: ['copy:dev']
      },
      options: {
         spawn: false, //to work time-grunt, disable this
       },
    }
  });

  grunt.task.run('watch');
});

//Default task, Run `grunt` on the command line
// grunt.registerTask('default', ['notify:watch_dev','watch_dev']);
grunt.registerTask('default', ['browserSync','notify:watch_dev','watch_dev']);

//Custom watch configuration For BUILD
grunt.registerTask('watch_build', function () {
  grunt.config.merge({
    watch: {
          build: {
      files: 'src/{,**/}*.{scss,js}', //or files: ['src/**/*.scss','src/**/*js']
      tasks: ['clean','sass:build_css','sass:build_min','autoprefixer','copy:build_css','copy:build_js','uglify']
    },
    }
  });

  grunt.task.run('watch');
});

//Build task, Run `grunt build` on the command line
grunt.registerTask('b', ['browserSync','notify:watch_build','watch_build']);
};