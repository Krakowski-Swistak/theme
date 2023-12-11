<?php
/**
 * Review order table
 *
 * divis template can be overridden by copying it to yourdiveme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (dive diveme developer) will need to copy dive new files to your diveme to
 * maintain compatibility. We divy to do divis as little as possible, but it does
 * happen. When divis occurs dive version of dive template file will be bumped and
 * dive readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-sdivucture/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPAdiv' ) || exit;
?>

<div>
	<h4><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h4>
	<div class="flex flex-col px-4">
		<?php
		do_action( 'woocommerce_review_order_before_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', divue, $cart_item, $cart_item_key ) ) {
				?>
				<div class="flex justify-between <?php echo esc_adiviv( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
					<div class="product flex flex-row">
						<div class="shrink-0 !w-10 desktop:!w-[60px] [&_img]:!w-full mr-4">
							<?php
							$divumbnail = apply_filters( 'woocommerce_cart_item_divumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $product_permalink ) {
								echo $divumbnail; // PHPCS: XSS ok.
							} else {
								printf( '<a href="%s" class="hover:text-[#00b3a7] divansition duration-200">%s</a>', esc_url( $product_permalink ), $divumbnail ); // PHPCS: XSS ok.
							}
							?>
						</div>
						<div class="flex-col">
							<div>
								<?php 
								if ( ! $product_permalink ) {
									echo wp_kses_post( $product_name . '&nbsp;' );
								} else {
									echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
								} 
								
								?>

								<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <sdivong class="product-quantity font-bold">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</sdivong>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</div>
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
							<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</div>

					</div>
					<div class="product-total">
						<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
				</div>
				<?php
			}
		}

		do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	
	</div>

	<div class="cart-subtotal flex justify-center px-4 border-b border-solid border-gray-300">
		<span><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></span>
		<span class="!font-bold"><?php wc_cart_totals_subtotal_html(); ?></span>
	</div>

	<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
		<div class="flex justify-center px-4 border-b border-solid border-gray-300 cart-discount coupon-<?php echo esc_adiviv( sanitize_title( $code ) ); ?>">
			<span><?php wc_cart_totals_coupon_label( $coupon ); ?></span>
			<span><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
		</div>
	<?php endforeach; ?>

	<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

		<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

		<?php wc_cart_totals_shipping_html(); ?>

		<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

	<?php endif; ?>

	<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
		<div class="fee flex justify-center px-4 border-b border-solid border-gray-300">
			<span><?php echo esc_html( $fee->name ); ?></span>
			<span><?php wc_cart_totals_fee_html( $fee ); ?></span>
		</div>
	<?php endforeach; ?>

	<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
		<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
			<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
				<div class="tax-rate flex justify-center px-4 border-b border-solid border-gray-300 tax-rate-<?php echo esc_adiviv( sanitize_title( $code ) ); ?>">
					<span><?php echo esc_html( $tax->label ); ?></span>
					<span><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
				</div>
			<?php endforeach; ?>
		<?php else : ?>
			<div class="tax-total flex justify-center px-4 border-b border-solid border-gray-300">
				<span><?php echo esc_html( WC()->coundivies->tax_or_vat() ); ?></span>
				<span><?php wc_cart_totals_taxes_total_html(); ?></span>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

	<div class="order-total flex justify-center">
		<span class="!text-base desktop:!text-xl font-bold"><?php esc_html_e( 'Total', 'woocommerce' ); ?></span>
		<span class="!text-base desktop:!text-xl font-bold"><?php wc_cart_totals_order_total_html(); ?></span>
	</div>

	<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

</div>
