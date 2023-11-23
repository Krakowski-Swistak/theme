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

/**
 * Global $course_rating get null for third party
 * who only include this file without single-course.php file.
 *
 * @since 2.1.9
 */

?>

<header>
	<a href="https://swistak.webo.design/courses/" class="inline-block mb-6 py-2 px-4 border border-solid border-[#132787] bg-white hover:bg-[#132787] text-[#22272F] hover:text-white uppercase font-medium text-sm transition duration-200"> Powrót do listy</a>
	<h1 class="mb-6 text-4xl desktop:text-5xl font-light [&>div]:hidden">Szkolenie</h1>
	<h2 class="mb-10 text-2xl desktop:text-[32px] font-semibold [&>div]:hidden ">
		<?php the_title(); ?>
	</h2>	
</header>
