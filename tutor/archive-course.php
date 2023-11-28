<header class="entry-header">
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header>

<?php swistak_theme_post_thumbnail(); ?>

<div class="entry-content">
	<?php
	the_content();

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'swistak-theme' ),
			'after'  => '</div>',
		)
	);
	?>
</div>

<?php
/**
 * Template for displaying courses
 *
 * @package Tutor\Templates
 * @subpackage CourseArchive
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.5.8
 */

use TUTOR\Input;

tutor_utils()->tutor_custom_header();

$get = isset( $_GET['course_filter'] ) ? Input::sanitize_array( $_GET ) : array();//phpcs:ignore
if ( isset( $get['course_filter'] ) ) {
	$filter = ( new \Tutor\Course_Filter( false ) )->load_listing( $get, true );
	query_posts( $filter );
}

// Load the template.
tutor_load_template(
	'archive-course-init',
	array_merge(
		$get,
		array(
			'course_filter'     => (bool) tutor_utils()->get_option( 'course_archive_filter', false ),
			'supported_filters' => tutor_utils()->get_option( 'supported_course_filters', array() ),
			'loop_content_only' => false,
		)
	)
);

tutor_utils()->tutor_custom_footer();
