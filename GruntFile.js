module.exports = function(grunt) {
    var fs = require('fs')
      , path = require('path')
      , chromosome = grunt.file.readJSON('chromosome.json')
      , content = chromosome['path:items']
      , isDir = function(path) {
            return fs.lstatSync(path).isDirectory();
        }
      , itemJson = 'item.json'
      , itemHtml = 'item.html'
      , search = function(dir) {
            return [].reduce.call(arguments, function(ret, n, i) {
                try {
                    i && fs.existsSync(path.join(dir, n)) && ret.push(n);
                } catch(e) {}
                return ret;
            }, []);
        }
      , toPrettyJson = function(object) {
            return JSON.stringify(object, null, '    ');
        };

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        jshint: {
            all: ['./'],
            shallow: ['**.js'],
            gruntfile: ['GruntFile.js'],
            options: {
                // `**/**` matches in current and sub dirs.
                ignores: ['**/**/node_modules/', '**/**/vendor/', '**/**.min.js'],
                expr:true, sub:true, supernew:true, debug:true, node:true, 
                boss:true, devel:true, evil:true, laxcomma:true, eqnull:true, 
                undef:true, unused:true, browser:true, jquery:true, maxerr:10
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-jshint');
    //grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.registerTask('listposts', function() {
        function accum(list, str) {
            var full = path.join(this.base, str);
            if (!isDir(full) || !search(full, itemJson).length) return list;
            list.push(path.join(this.base, str));
            return fs.readdirSync(full).reduce(accum.bind({base:full}), list);
        }
        grunt.file.write('list.json', toPrettyJson(fs.readdirSync(content).reduce(
            accum.bind({base:content}), []
        ).sort(function(a, b) {
            function stat(dir) {
                return fs.statSync(path.join(dir, search(dir, itemHtml, itemJson)[0]));
            }
            return stat(b).mtime - stat(a).mtime;
        }).map(function(str) {
            str = str.replace(/\\+|\/+/g, '/');
            return str.slice(str.indexOf('/') + 1);
        })));
    });
    grunt.registerTask('default', ['jshint:gruntfile', 'listposts']);
};