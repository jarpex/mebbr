/* eslint-disable space-in-parens */
/*eslint no-undef: "error"*/
/* eslint-disable no-console */
/*eslint-env node*/
const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const del = require('del');
const cleanCSS = require('gulp-clean-css');
const csso = require('gulp-csso');

gulp.task('styles', () => {
	return gulp
		.src([ 'sass/page.scss', 'sass/home.scss' ])
		.pipe(sass().on('error', sass.logError))
		.pipe(gulp.dest('./css/'))
		.pipe(
			cleanCSS({ debug: true }, (details) => {
				console.log(`File: ${ details.name }`);
				console.log(`Original size: ${ details.stats.originalSize } Bytes`);
				console.log(`Compressed size: ${ details.stats.minifiedSize } Bytes`);
			})
		)
		.pipe(csso())
		.pipe(gulp.dest('./css/min/'));
});

gulp.task('clean', () => {
	return del([ 'css/page.css', 'css/home.css' ]);
});

gulp.task('default', gulp.series([ 'clean', 'styles' ]));
