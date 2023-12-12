<?php
/**
 * Tutor add to cart for WC product that will be visible on the course details page
 *
 * @package Tutor\Templates
 * @subpackage Single\Course
 * @author Themeum <support@themeum.com>
 * @link https://themeum.com
 * @since 1.4.3
 */

$product_id = tutor_utils()->get_course_product_id();
$product    = wc_get_product( $product_id );

$is_logged_in             = is_user_logged_in();
$enable_guest_course_cart = tutor_utils()->get_option( 'enable_guest_course_cart' );
$required_loggedin_class  = '';
if ( ! $is_logged_in && ! $enable_guest_course_cart ) {
	$required_loggedin_class = apply_filters( 'tutor_enroll_required_login_class', 'tutor-open-login-modal' );
}

if ( $product ) {
	if ( tutor_utils()->is_course_added_to_cart( $product_id, true ) ) {
		?>
			<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="flex items-end justify-center ks-button ks-button--primary mt-6 p-4 w-full">
				<?php esc_html_e( 'View Cart', 'tutor' ); ?>
			</a>
		<?php
	} else {
		$regular_price = wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price() ) );
		$sale_price    = wc_get_price_to_display( $product, array( 'price' => $product->get_sale_price() ) );
		$tax_display   = get_option( 'woocommerce_tax_display_shop' );
		?>
		<div>
			<div class="tutor-course-sidebar-card-pricing tutor-d-flex tutor-align-end tutor-justify-between">
					<?php ob_start(); ?>
					<div>
						<span class="text-4xl font-semibold text-[#00b3a7]">
							<?php echo wc_price( $sale_price ? $sale_price : $regular_price ); //phpcs:ignore?>
						</span>
						<?php if ( $regular_price && $sale_price && $sale_price !== $regular_price ) : ?>
							<del class="tutor-fs-7 tutor-color-muted tutor-ml-8">
							<?php echo wc_price( $regular_price ); //phpcs:ignore?>
							</del>
						<?php endif; ?>
					</div>
			</div>
			<div class="tutor-color-muted">
				<?php
				if ( 'incl' === $tax_display ) {
					echo wp_kses(
						$product->get_price_suffix(),
						array( 'small' => array( 'class' => true ) )
					);
				}
				?>
			</div>
			<?php
				/**
				 * Added to show info about price.
				 *
				 * @since 2.2.0
				 */
				do_action( 'tutor_after_course_details_wc_cart_price', $product, get_the_ID() );
			?>
            <?php echo apply_filters( 'tutor_course_details_wc_add_to_cart_price', ob_get_clean(), $product ); //phpcs:ignore ?>
		</div>
		<form action="<?php echo esc_url( apply_filters( 'tutor_course_add_to_cart_form_action', get_permalink( get_the_ID() ) ) ); ?>" method="post" enctype="multipart/form-data">
			<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>"  class="w-full flex justify-center items-end mt-6 p-4 ks-button ks-button--primary <?php echo esc_attr( $required_loggedin_class ); ?>">
				<span class="text-white group-hover:text-[#22272F] uppercase font-medium text-sm transition duration-200"><?php esc_html_e('Add course to cart', 'tutor'); ?></span>
				<svg class="ml-1 stroke-white group-hover:stroke-[#22272F] transition duration-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect x="5" y="7" width="14" height="12" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</button>
		</form>
		<?php
	}
} else {
	?>
	<p class="tutor-alert-warning">
		<?php esc_html_e( 'Please make sure that your product exists and valid for this course', 'tutor' ); ?>
	</p>
	<?php
}
