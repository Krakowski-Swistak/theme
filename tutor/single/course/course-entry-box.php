<?php
/**
 * Template for course entry box
 *
 * @package Tutor\Templates
 * @subpackage Single\Course
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.0.0
 */

use Tutor\Models\CourseModel;

// Utility data.
global $is_enrolled;

$is_enrolled          = apply_filters( 'tutor_alter_enroll_status', $is_enrolled );
$lesson_url           = tutor_utils()->get_course_first_lesson();
$is_privileged_user   = tutor_utils()->has_user_course_content_access();
$tutor_course_sell_by = apply_filters( 'tutor_course_sell_by', null );
$is_public            = get_post_meta( get_the_ID(), '_tutor_is_public_course', true ) == 'yes';
$course_categories    = get_tutor_course_categories();
$course_type          = get_field( 'course_type' );

// Monetization info.
$monetize_by    = tutor_utils()->get_option( 'monetize_by' );
$is_purchasable = tutor_utils()->is_course_purchasable();

// Get login url if.
$is_tutor_login_disabled = ! tutor_utils()->get_option( 'enable_tutor_native_login', null, true, true );
$auth_url                = $is_tutor_login_disabled ? ( isset( $_SERVER['REQUEST_SCHEME'] ) ? wp_login_url( tutor_utils()->get_current_url() ) : '' ) : '';
$default_meta            = array(
	array(
		'icon_class' => 'tutor-icon-mortarboard',
		'label'      => __( 'Total Enrolled', 'tutor' ),
		'value'      => tutor_utils()->get_option( 'enable_course_total_enrolled' ) ? tutor_utils()->count_enrolled_users_by_course() . ' ' . __( 'Total Enrolled', 'tutor' ) : null,
	),
	array(
		'icon_class' => 'tutor-icon-clock-line',
		'label'      => __( 'Duration', 'tutor' ),
		'value'      => get_tutor_option( 'enable_course_duration' ) ? ( get_tutor_course_duration_context() ? . '<div class="font-bold uppercase">' . __( 'Duration', 'tutor' ) . '</div>' . get_tutor_course_duration_context()  : false ) : null,
	),
	array(
		'icon_class' => 'tutor-icon-refresh-o',
		'label'      => __( 'Last Updated', 'tutor' ),
		'value'      => get_tutor_option( 'enable_course_update_date' ) ? get_the_modified_date( get_option( 'date_format' ) ) . ' ' . __( 'Last Updated', 'tutor' ) : null,
	),
);

// Add level if enabled.
if ( tutor_utils()->get_option( 'enable_course_level', true, true ) ) {
	array_unshift(
		$default_meta,
		array(
			'icon_class' => 'tutor-icon-level',
			'label'      => __( 'Level', 'tutor' ),
			'value'      => get_tutor_course_level( get_the_ID() ),
		)
	);
}

// Right sidebar meta data.
$sidebar_meta = apply_filters( 'tutor/course/single/sidebar/metadata', $default_meta, get_the_ID() );
$login_url    = tutor_utils()->get_option( 'enable_tutor_native_login', null, true, true ) ? '' : wp_login_url( tutor()->current_url );


?>

<div class="border border-[#DDE3EE] border-solid rounded-sm p-6">
	<!-- Course Info -->
	<div class="">
		<span class="block text-xl desktop:text-2xl font-semibold mb-6">Informacje:</span>
		<ul class="tutor-ul text-sm">
			<?php if ( $course_type ) : ?>
				<li class="py-6 first:border-y border-b border-solid border-[#DDE3EE] flex items-center justify-between">
					<span class="flex gap-2 items-center font-bold uppercase" aria-labelledby="<?php esc_html_e( 'Rodzaj', 'tutor' ) ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M19 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3H19C20.1046 3 21 3.89543 21 5V19C21 20.1046 20.1046 21 19 21ZM5 10V19H19V10H5ZM5 5V8H19V5H5Z" fill="#22272F"></path>
						</svg>
						<?php esc_html_e( 'Rodzaj', 'tutor' ); ?>
					</span>
					<span class="font-normal">
						<?php echo esc_html( $course_type ) ?>
					</span>
				</li>
			<?php endif; ?>
			<?php foreach ( $sidebar_meta as $key => $meta ) : ?>
				<?php
				if ( ! $meta['value'] || ( $meta['icon_class'] == "tutor-icon-level" )   ) {
					continue;
				}
				?>
				<li class="py-6 first:border-y border-b border-solid border-[#DDE3EE] flex items-center justify-between">
					<span class="<?php echo esc_attr( $meta['icon_class'] ); ?> font-bold uppercase" aria-labelledby="<?php echo esc_html( $meta['label'] ); ?>"></span>
					<span class="font-normal">
						<?php echo wp_kses_post( $meta['value'] ); ?>
					</span>
				</li>
			<?php endforeach; ?>
			<?php if ( ! empty( $course_categories ) && is_array( $course_categories ) && count( $course_categories ) ) : ?>
				<li class="py-6 border-b border-solid border-[#DDE3EE] flex items-center justify-between [&_a]:font-normal [&_a]:!text-[#132787]">
					<span class="flex gap-2 items-center font-bold uppercase" aria-labelledby="Categories">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" viewBox="0 0 16 20" fill="none">
							<path d="M8 20C3.664 20 0 17.965 0 15.556V4.444C0 2.035 3.664 0 8 0C12.336 0 16 2.035 16 4.444V15.556C16 17.965 12.337 20 8 20ZM2 12.9V15.559C2.07 16.112 4.309 17.781 8 17.781C11.691 17.781 13.931 16.107 14 15.553V12.9C12.1794 13.9554 10.1039 14.4905 8 14.447C5.89606 14.4906 3.82058 13.9554 2 12.9ZM2 7.341V10C2.07 10.553 4.309 12.222 8 12.222C11.691 12.222 13.931 10.548 14 9.994V7.341C12.1795 8.39678 10.104 8.93226 8 8.889C5.89596 8.93231 3.82046 8.39683 2 7.341ZM8 2.222C4.308 2.222 2.069 3.896 2 4.451C2.07 5 4.311 6.666 8 6.666C11.689 6.666 13.931 4.992 14 4.438C13.93 3.887 11.689 2.222 8 2.222Z" fill="#22272F"/>
						</svg>
						<?php esc_html_e( 'Categories:', 'tutor' ); ?>
					</span>
					<?php
						$category_links = array();
					foreach ( $course_categories as $course_category ) :
						$category_name    = $course_category->name;
						$category_link    = get_term_link( $course_category->term_id );
						$category_links[] = wp_sprintf( '<a href="%1$s" >%2$s</a>', esc_url( $category_link ), esc_html( $category_name ) );
						endforeach;
						echo wp_kses(
							implode( ', ', $category_links ),
							array( 'a' => array( 'href' => true ) )
						);
					?>

				</li>
			<?php endif; ?>
		</ul>
	</div>

	<?php
	$tutor_load_sidebar_actions = apply_filters( 'tutor_load_single_sidebar_actions', true, get_the_ID() );
	if ( $tutor_load_sidebar_actions ) :
		?>
	<div class="mt-8">
		<?php
		if ( $is_enrolled || $is_privileged_user ) {
			ob_start();

			// Course Info.
			$user_id             = get_current_user_id();
			$course_id           = get_the_ID();
			$completion_mode     = tutor_utils()->get_option( 'course_completion_process' );
			$is_completed_course = tutor_utils()->is_completed_course();
			$retake_course       = tutor_utils()->can_user_retake_course();
			$course_progress     = tutor_utils()->get_course_completed_percent( $course_id, 0, true );
			$completed_percent   = $course_progress['completed_percent'];
			?>
			<!-- course progress -->
			<?php if ( tutor_utils()->get_option( 'enable_course_progress_bar', true, true ) && is_array( $course_progress ) && count( $course_progress ) ) : ?>
				<div class="tutor-course-progress-wrapper tutor-mb-32">
					<h3 class="tutor-color-black tutor-fs-5 tutor-fw-bold tutor-mb-16">
						<?php esc_html_e( 'Course Progress', 'tutor' ); ?>
					</h3>
					<div class="list-item-progress">
						<div class="tutor-fs-6 tutor-color-secondary tutor-d-flex tutor-align-center tutor-justify-between">
							<span class="progress-steps">
								<?php echo esc_html( $course_progress['completed_count'] . '/' . $course_progress['total_count'] ); ?>
							</span>
							<span class="progress-percentage">
								<?php echo esc_html( $completed_percent . '%' ); ?>
								<?php esc_html_e( 'Complete', 'tutor' ); ?>
							</span>
						</div>
						<div class="tutor-progress-bar tutor-mt-12" style="--tutor-progress-value:<?php echo esc_attr( $completed_percent ); ?>%;">
							<span class="tutor-progress-value" area-hidden="true"></span>
						</div>
					</div>
				</div>
			<?php endif; ?>
			<?php
			$start_content = '';

			// The user is enrolled anyway. No matter manual, free, purchased, woocommerce, edd, membership.
			do_action( 'tutor_course/single/actions_btn_group/before' );

			// Show Start/Continue/Retake Button.
			if ( $lesson_url ) {
				ob_start();
				/**
				 * Course retake button.
				 *
				 * Todo: `href` attribute is exist for backward compatibility.
				 *       we need to make it `data-link` attribute and update the js code at course-landing.js
				 *
				 * @since 1.0.0
				 * @since 2.4.0 refactored and hide it when strict mode enabled and course not completed.
				 */
				if ( $retake_course && ( CourseModel::MODE_FLEXIBLE === $completion_mode || $is_completed_course ) ) {
					?>
					<button type="button" 
							class="tutor-btn tutor-btn-block tutor-btn-outline-primary start-continue-retake-button tutor-course-retake-button" 
							href="<?php echo esc_url( $lesson_url ); ?>"
							data-course_id="<?php echo esc_attr( get_the_ID() ); ?>">
						<?php esc_html_e( 'Retake This Course', 'tutor' ); ?>
					</button>
					<?php
				}

				/**
				 * Start/Continue learning button
				 *
				 * @since 1.0.0
				 * @since 2.4.0 refactored for enhance readibility.
				 */
				$link_text = '';
				if ( ! $is_completed_course ) {
					if ( 0 === (int) $completed_percent ) {
						$link_text = __( 'Start Learning', 'tutor' );
					}
					if ( $completed_percent > 0 && $completed_percent < 100 ) {
						$link_text = __( 'Continue Learning', 'tutor' );
					}

					/**
					 * `Review Progress` link text shown when
					 * - strict mode enabled
					 * - course progress 100%
					 * - in course progress any quiz or assignemnt result is not passed.
					 *
					 * @since 2.4.0
					 */
					if ( 100 === (int) $completed_percent && false === CourseModel::can_complete_course( $course_id, $user_id ) ) {
						$lesson_url = CourseModel::get_review_progress_link( $course_id, $user_id );
						$link_text  = __( 'Review Progress', 'tutor' );
					}
				}

				if ( strlen( $link_text ) > 0 ) {
					?>
					<a 	href="<?php echo esc_url( $lesson_url ); ?>" 
						class="tutor-btn tutor-btn-block tutor-btn-primary tutor-mt-20">
						<?php echo esc_html( $link_text ); ?>
					</a>
					<?php
				}

				$start_content = ob_get_clean();
			}
			echo apply_filters( 'tutor_course/single/start/button', $start_content, get_the_ID() );//phpcs:ignore

			// Show Course Completion Button.
			if ( ! $is_completed_course ) {
				ob_start();
				?>
				<form method="post" class="tutor-mt-20">
					<?php wp_nonce_field( tutor()->nonce_action, tutor()->nonce ); ?>

					<input type="hidden" value="<?php echo esc_attr( get_the_ID() ); ?>" name="course_id"/>
					<input type="hidden" value="tutor_complete_course" name="tutor_action"/>

					<button type="submit" class="tutor-btn tutor-btn-outline-primary tutor-btn-block" name="complete_course_btn" value="complete_course">
						<?php esc_html_e( 'Complete Course', 'tutor' ); ?>
					</button>
				</form>
				<?php
				echo apply_filters( 'tutor_course/single/complete_form', ob_get_clean() );//phpcs:ignore
			}

			?>
				<?php
					// check if has enrolled date.
					$post_date = is_object( $is_enrolled ) && isset( $is_enrolled->post_date ) ? $is_enrolled->post_date : '';
				if ( '' !== $post_date ) :
					?>
					<div class="tutor-fs-7 tutor-color-muted tutor-mt-20 tutor-d-flex">
						<span class="tutor-fs-6 tutor-color-success tutor-icon-purchase-mark tutor-mr-8"></span>
						<span class="tutor-enrolled-info-text">
						<?php esc_html_e( 'You enrolled in this course on', 'tutor' ); ?>
							<span class="tutor-fs-7 tutor-fw-bold tutor-color-success tutor-ml-4 tutor-enrolled-info-date">
							<?php
								echo esc_html( tutor_i18n_get_formated_date( $post_date, get_option( 'date_format' ) ) );
							?>
							</span>
						</span>
					</div>
				<?php endif; ?>
			<?php
			do_action( 'tutor_course/single/actions_btn_group/after' );
			echo apply_filters( 'tutor/course/single/entry-box/is_enrolled', ob_get_clean(), get_the_ID() );//phpcs:ignore
		} elseif ( $is_public ) {
			// Get the first content url.
			$first_lesson_url                       = tutor_utils()->get_course_first_lesson( get_the_ID(), tutor()->lesson_post_type );
			! $first_lesson_url ? $first_lesson_url = tutor_utils()->get_course_first_lesson( get_the_ID() ) : 0;
			ob_start();
			?>
				<a href="<?php echo esc_url( $first_lesson_url ); ?>" class="tutor-btn tutor-btn-primary tutor-btn-lg tutor-btn-block">
					<?php esc_html_e( 'Start Learning', 'tutor' ); ?>
				</a>
			<?php
			echo apply_filters( 'tutor/course/single/entry-box/is_public', ob_get_clean(), get_the_ID() );//phpcs:ignore
		} else {
			// The course enroll options like purchase or free enrollment.
			$price = apply_filters( 'get_tutor_course_price', null, get_the_ID() );

			if ( tutor_utils()->is_course_fully_booked( null ) ) {
				ob_start();
				?>
					<div class="tutor-alert tutor-warning tutor-mt-28">
						<div class="tutor-alert-text">
							<span class="tutor-icon-circle-info tutor-alert-icon tutor-mr-12" area-hidden="true"></span>
							<span>
								<?php esc_html_e( 'This course is full right now. We limit the number of students to create an optimized and productive group dynamic.', 'tutor' ); ?>
							</span>
						</div>
					</div>
				<?php
				echo apply_filters( 'tutor/course/single/entry-box/fully_booked', ob_get_clean(), get_the_ID() );//phpcs:ignore
			} elseif ( $is_purchasable && $price && $tutor_course_sell_by ) {
				// Load template based on monetization option.
				ob_start();
				tutor_load_template( 'single.course.add-to-cart-' . $tutor_course_sell_by );
				echo apply_filters( 'tutor/course/single/entry-box/purchasable', ob_get_clean(), get_the_ID() );//phpcs:ignore
			} else {
				ob_start();
				?>
					<div class="tutor-course-single-pricing">
						<span class="text-4xl font-semibold text-[#132787]">
							<?php esc_html_e( 'Free', 'tutor' ); ?>
						</span>
					</div>

					<div class="tutor-course-single-btn-group <?php echo is_user_logged_in() ? '' : 'tutor-course-entry-box-login'; ?>" data-login_url="<?php echo esc_url( $login_url ); ?>">
						<form class="tutor-enrol-course-form" method="post">
							<?php wp_nonce_field( tutor()->nonce_action, tutor()->nonce ); ?>
							<input type="hidden" name="tutor_course_id" value="<?php echo esc_attr( get_the_ID() ); ?>">
							<input type="hidden" name="tutor_course_action" value="_tutor_course_enroll_now">
							<button type="submit" class="tutor-btn tutor-btn-primary tutor-btn-lg tutor-btn-block tutor-mt-24 tutor-enroll-course-button tutor-static-loader">
								<?php esc_html_e( 'Enroll now', 'tutor' ); ?>
							</button>
						</form>
					</div>

					<div class="tutor-fs-7 tutor-color-muted tutor-mt-20 tutor-text-center">
						<?php esc_html_e( 'Free access this course', 'tutor' ); ?>
					</div>
				<?php
				echo apply_filters( 'tutor/course/single/entry-box/free', ob_get_clean(), get_the_ID() );//phpcs:ignore
			}
		}

		do_action( 'tutor_course/single/entry/after', get_the_ID() );
		?>
	</div>
	<?php endif; ?>
</div>

<?php
if ( ! is_user_logged_in() ) {
	tutor_load_template_from_custom_path( tutor()->path . '/views/modal/login.php' );
}
?>
