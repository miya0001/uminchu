'use strict';

var gulp = require( 'gulp' );
var replace = require( 'gulp-replace' );
var concat = require( 'gulp-concat' );
var uglify = require( 'gulp-uglify' );
var rename = require( 'gulp-rename' );
var minifyCss = require( 'gulp-minify-css' );
var download = require( 'gulp-download' );
var decompress = require( 'gulp-decompress' );

gulp.task( 'download_twentythirteen', function () {
	return download( [
				'https://downloads.wordpress.org/theme/twentythirteen.1.6.zip',
		] )
		.pipe( decompress() )
		.pipe( gulp.dest( 'tmp' ) );
} );

gulp.task( 'twentythirteen_style', [ 'download_twentythirteen' ], function () {
	return gulp.src( [
			'tmp/twentythirteen/style.css'
		] )
		.pipe( decompress() )
		.pipe( replace( '#f7f5e7', '#fafafa' ) )
		.pipe( replace( '#e8e5ce', '#333' ) )
		.pipe( replace( '#bc360a', '#337ab7' ) )
		.pipe( replace( '#e6402a', '#337ab7' ) )
		.pipe( replace( '#220e10', '#000000' ) )
		.pipe( replace( '#db572f', '#337ab7' ) )
		.pipe( replace( 'rgba(247, 245, 231, 0.7)', 'transparent' ) )
		.pipe( replace( '604px', '970px' ) )
		.pipe( replace( '1040px', '100%' ) )
		.pipe( replace( 'padding: 0 376px 0 60px;', 'padding: 0;' ) )
		.pipe( replace( 'padding: 30px 376px 10px 60px;', 'padding: 30px 0 10px 0;' ) )
		.pipe( replace( 'padding: 40px 376px 40px 60px;', 'padding: 40px 0 40px 0;' ) )
		.pipe( replace( 'padding-right: 376px;', 'padding-right: 0;' ) )
		.pipe( replace( 'italic', 'normal' ) )
		.pipe( replace( 'images/search-icon.png', '../../twentythirteen/images/search-icon.png' ) )
		.pipe( replace( 'images/search-icon-2x.png', '../../twentythirteen/images/search-icon-2x.png' ) )
		.pipe( replace( 'images/dotted-line-', '../../twentythirteen/images/dotted-line-' ) )
		.pipe( replace( 'input', '__' ) )
		.pipe( replace( '.sidebar-container', '__' ) )
		.pipe( replace( '.error404', '__' ) )
		.pipe( rename( {
			basename: 'custom-twentythirteen',
			extname: '.css'
		} ) )
		.pipe( gulp.dest( 'src' ) );
} );

gulp.task( 'twitter_bootstrap', function () {
	return gulp.src( [
			'node_modules/bootstrap/dist/css/bootstrap.css'
		] )
		.pipe( gulp.dest( 'src' ) );
} );

gulp.task( 'parallax_js', function () {
	return gulp.src( [
			'bower_components/parallax.js/parallax.js'
		] )
		.pipe( replace( 'iPod', '_iPod' ) )
		.pipe( replace( 'iPhone', '_iPhone' ) )
		.pipe( replace( 'iPad', '_iPad' ) )
		.pipe( replace( 'Android', '_Android' ) )
		.pipe( gulp.dest( 'src' ) );
} );

gulp.task( 'css', [ 'twentythirteen_style', 'twitter_bootstrap' ], function () {
	return gulp.src( [
			'src/*.css'
		] )
		.pipe( minifyCss() )
		.pipe( rename( {
			extname: '.min.css'
		} ) )
		.pipe( gulp.dest( 'css' ) );
} );

gulp.task( 'js', [ 'parallax_js' ], function () {
	return gulp.src( [
			'src/*.js'
		] )
		.pipe( uglify( { compress: true } ) )
		.pipe( rename( {
			extname: '.min.js'
		} ) )
		.pipe( gulp.dest( 'js' ) );
} );

gulp.task( "genericons", function(){
	return gulp.src( [
			'node_modules/genericons/genericons/*',
		] )
		.pipe( gulp.dest( 'css' ) );
} );



gulp.task( 'default', [ 'css', 'js', 'genericons' ], function () {

} );
