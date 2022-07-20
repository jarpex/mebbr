const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const del = require("del");
const cleanCSS = require("gulp-clean-css");

gulp.task("styles", () => {
  return gulp
    .src("src/sass/page.scss")
    .pipe(sass().on("error", sass.logError))
    .pipe(gulp.dest("./css/"))
    .pipe(
      cleanCSS({ debug: true }, (details) => {
        console.log(`File: ${details.name}`);
        console.log(`Original size: ${details.stats.originalSize} Bytes`);
        console.log(`Compressed size: ${details.stats.minifiedSize} Bytes`);
      })
    )
    .pipe(gulp.dest("./css/min/"));
});

gulp.task("clean", () => {
  return del(["css/page.css"]);
});

gulp.task("default", gulp.series(["clean", "styles"]));
