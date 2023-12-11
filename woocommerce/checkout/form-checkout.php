<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>		
		<div class="flex flex-col-reverse tablet:flex-row" id="customer_details">
			<div class="w-full tablet:w-2/3 tablet:pr-10 mb-20
				[&_abbr]:!no-underline 
				[&_.input-text]:border [&_.input-text]:border-solid [&_.input-text]:border-[#252525] [&_.input-text]:rounded-[5px] [&_.input-text]:text-base [&_.input-text]:p-2 
				[&_.select2-selection]:!h-11 [&_#select2-billing\_country-container]:p-2 [&_#select2-billing\_country-container]:text-basis [&_.select2-selection\_\_arrow]:!top-2"
			>
				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				<?php do_action( 'woocommerce_checkout_payment_hook' ); ?>
			</div>
			
			<div class="w-full tablet:w-1/3 shrink-0 grow-0 relative">
				<div id="order_review" class="woocommerce-checkout-review-order w-full sticky top-20 cart_totals !w-full p-4 border border-solid border-gray-300 rounded-[10px] mb-10">
					<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
					<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
					<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
				</div>
			</div>
		</div>
		
	<?php endif; ?>	

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
