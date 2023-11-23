<?php
/**
 * Template for displaying course content
 *
 * @package Tutor\Templates
 * @subpackage Single\Course
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.0.0
 */

global $post;

do_action( 'tutor_course/single/before/content' );

if ( tutor_utils()->get_option( 'enable_course_about', true, true ) ) {
	$string             = apply_filters( 'tutor_course_about_content', get_the_content() );
	$content_summary    = (bool) get_tutor_option( 'course_content_summary', true );
	$post_size_in_words = sizeof( explode( ' ', $string ) );
		$word_limit     = 100;
		$has_show_more  = false;

	?>
	<?php if ( ! empty( $string ) ) : ?>
	<div class="mb-20 tutor-course-details-content<?php echo $has_show_more ? ' tutor-toggle-more-content tutor-toggle-more-collapsed' : ''; ?>"<?php echo $has_show_more ? ' data-tutor-toggle-more-content data-toggle-height="200" style="height: 200px;"' : ''; ?>>
		<h2 class="text-xl mb-5 font-semibold [&>div]:hidden">
			<?php echo esc_html( apply_filters( 'tutor_course_about_title', __( 'About Course', 'tutor' ) ) ); ?>
		</h2>
		
		<div class="text-base font-light text-justify [&_h2]:text-xl [&_h2]:mt-10 [&_h2]:desktop:mt-[70px] [&_h2]:mb-5 [&_h2]:font-semibold [&_h2>div]:hidden [&_ul]:list-disc [&_ul]:ml-5 marker:text-[#132787]">
			<?php echo apply_filters( 'the_content', $string ); //phpcs:ignore ?>
		</div>
	</div>

	<?php endif; ?>
	<?php
}

do_action( 'tutor_course/single/after/content' ); ?>
