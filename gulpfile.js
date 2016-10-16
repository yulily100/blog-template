var gulp = require("gulp");
var sass = require("gulp-sass");
var browser = require("browser-sync");
var plumber = require("gulp-plumber");
var autoprefixer = require('gulp-autoprefixer');


// sass
gulp.task("sass", function() {
  gulp.src("sass/**/*scss")
    .pipe(plumber())
    .pipe(sass())
    .pipe(autoprefixer())
    .pipe(gulp.dest("./"));
    //.pipe(browser.reload({stream:true}));
});

// sassをwatchする
gulp.task('sass-watch', ['sass'], function(){
  var watcher = gulp.watch('./sass/**/*.scss', ['sass']);
  watcher.on('change', function(event) {
    console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
  });
});

gulp.task("default", ["sass-watch"]);


// 起動するやつ
// gulp.task("server", function() {
//   browser({
//     server: {
//       baseDir: "./"
//     }
//   });
// });

// //htmlも見る
// gulp.task("html", function() {
//   gulp.src("./*.html")
//     .pipe(browser.reload({stream:true}));
// });
//
// gulp.task("default",['server'], function() {
//   gulp.watch("sass/**/*.scss",["sass"]);
//   gulp.watch(["./*.html"],["html"]);
// });
