const gulp = require( 'gulp' );
const { fontawesomeSubset } = require( 'fontawesome-subset' );

// Define a task in your Gulpfile
gulp.task( 'subset', function( done ) {
	fontawesomeSubset(
		[
			'reply',
			'retweet',
			'star',
			'bookmark',
			'ellipsis-h',
		],
		'.'
	)
	.then( () => done() )
	.catch( error => done(error) );
});

gulp.task( 'default', gulp.series( 'subset' ) );
