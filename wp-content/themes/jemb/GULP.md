# Gulp file usage

### Latest updates

- Incorporated gulp-auto-load plugins
- Split larger tasks into external files to reduce gulpfile.js bloat
- Created new sassdev to print out stylesheet with sourcemap
- Added yargs to pass flags to tasks

## Gulp watch dev flag

You may now pass a flag to `gulp watch` to generate stylesheet with source map. Not passing a flag will generate a compressed stylesheet. See [styles.js](tasks/styles.js)

```shell
$ gulp watch --dev
```

The sourcemap will be generated in the `css/maps` directory which as been added to `.gitignore`

This is using [yargs](https://www.npmjs.com/package/yargs) to parse passed arguments. 

```javascript
// Require yargs
argv = require('yargs').argv;

// Within the watch task
if (argv.dev) {
    gulp.watch(paths.sass, ['sassdev']);
} else {
    gulp.watch(paths.sass, ['sass']);
}
```

## Gulp auto load plugins

Plugins are now autoloaded from `package.json` using [gulp-load-plugins](https://www.npmjs.com/package/gulp-load-plugins). They are loaded into a `plugins` object. Use plugins as you normally woudl but within the scope of `plugins`

```javascript
// Instead of using
.sass()

// Now use
plugins.sass()
```

## External task files

To reduce bloat within the `gulpfile.js` tasks are placed within a separate files inside the `tasts/` directory [here](tasks). There is a example file in `tasks/template.js` that can be used as a starter for new tasks. Tasks are exported from the external file using module.export

```javascript
// Export your task so you can require it within gulfile.js
exports.yourtaskname = function(gulp, plugins, paths) {

    // Task methods
    return function() {
        gulp.src(paths.YOUR_PATH)
            .pipe(plugins.YOUR_PLUGIN());
    }
}
```

And loaded within the gulpfile using require. Be sure pass the `gulp`, `plugins`, and `path` variables.

```javascript
gulp.task('yourtaskname', require('./tasks/yourtaskfile').yourtaskname(gulp, plugins, paths));
```