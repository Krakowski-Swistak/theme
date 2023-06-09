<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Swistak_Theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<div class="contact-wrapper">
		<p>Skontaktuj się!</p>
		<div class="ks-contact-label ks-contact-label--phone">
			<a href="<?php echo esc_url( $footer_phone_url ); ?>" target="<?php echo esc_attr( $footer_phone_target ); ?>"><?php echo esc_html( $footer_phone_title ); ?></a>
		</div>
	</div>
</aside><!-- #secondary -->
