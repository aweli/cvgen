module.exports = function (grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // Remove temporary files
        clean: {
            options: {force: true},
            images: ['web/images/*'],
            fonts: ['web/fonts/*'],
            js: ['web/js', 'web/lib/*'],
            temp: {
                src: [
                    "web/css/*.map",
                    "web/css/main.css.map",
                    "./jpgtmp.jpg"
                ]
            }
        },
        sass: {
            dev: {
                options: {
                    bundleExec: true,
                    style: 'expanded',
                    loadPath: ['node_modules', 'sass'],
                    lineNumbers: true
                },
                files: [{
                    bundleExec: true,
                    expand: true,
                    cwd: 'app/Resources/sass/',
                    src: ['*.sass', '*.scss'],
                    dest: 'web/css',
                    ext: '.css'
                }]
            }
        },
        postcss: {
            options: {
                map: false,
                processors: [
                    require('autoprefixer')({browsers: ['> 5%', 'last 3 versions', 'Firefox > 20', 'Opera > 12.1', 'ie > 9']}),
                    require('cssnano')()
                ]
            },
            dist: {
                src: 'web/css/*.css'
            }
        },
        watch: {
            styles: {
                files: ['sass/**/*.{sass,scss}'],
                tasks: ['sass:dev'],
                options: {
                    spawn: false
                }
            }
        },
        copy: {
            jsApp: {
                cwd: 'app/Resources/js/',
                src: '**/*.js',
                dest: 'web/js',
                flatten: false,
                expand: true
            },
            imagesApp: {
                cwd: 'app/Resources/images/',
                src: '**',
                dest: 'web/images',
                flatten: false,
                expand: true
            }
        }
    });

    grunt.registerTask('clean-copy', ['clean', 'copy']);

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-clean');

    grunt.registerTask('default', ['clean-copy', 'sass:dev', 'postcss']);
    grunt.registerTask('dev', ['clean-copy', 'sass:dev']);
};
