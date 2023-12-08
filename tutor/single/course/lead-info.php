<?php
/**
 * Template for displaying lead info
 *
 * @package Tutor\Templates
 * @subpackage Single\Course
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.0.0
 */

use TUTOR\Input;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$course_header = get_field( 'course_header_text' );
$course_back_btn = get_field( 'course_back_button' );

if ( $course_back_btn ): 
	$course_back_url = $course_back_btn['url'];
    $course_back_title = $course_back_btn['title'];
endif;

/**
 * Global $course_rating get null for third party
 * who only include this file without single-course.php file.
 *
 * @since 2.1.9
 */

?>

<header>
	<?php if ( $course_back_url && $course_back_title ) : ?>
		<a href="<?php echo esc_url( $course_back_url ); ?>" class="inline-block inverted ks-button ks-button--primary mb-5 px-4 py-2">
			<?php echo esc_html( $course_back_title); ?>
		</a>
	<?php endif; ?>

	<?php if ( $course_header ) : ?>
		<h1 class="mb-20">
			<?php echo esc_html($course_header); ?>
		</h1>
	<?php endif; ?>
	<h2 class="mb-10 text-2xl desktop:text-[32px] font-semibold [&>div]:hidden ">
		<?php the_title(); ?>
	</h2>	
</header>
