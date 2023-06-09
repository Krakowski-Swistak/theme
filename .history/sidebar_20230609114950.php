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

$footer_phone = get_field('footer_phone', 'option');
if( $footer_phone ): 
    $footer_phone_url = $footer_phone['url'];
    $footer_phone_title = $footer_phone['title'];
    $footer_phone_target = $footer_phone['target'] ? $footer_phone['target'] : '_self';
endif;
$footer_email = get_field('footer_e-mail', 'option');
if( $footer_email ): 
    $footer_email_url = $footer_email['url'];
    $footer_email_title = $footer_email['title'];
    $footer_email_target = $footer_email['target'] ? $footer_email['target'] : '_self';
endif;
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<div class="contact-wrapper">
		<p class="text-[24px] font-medium mb-[20px]">Skontaktuj się!</p>
		<div class="ks-contact-label ks-contact-label--phone ">
			<a href="<?php echo esc_url( $footer_phone_url ); ?>" target="<?php echo esc_attr( $footer_phone_target ); ?>"><?php echo esc_html( $footer_phone_title ); ?></a>
		</div>
		<div class="ks-contact-label ks-contact-label--email ">
			<a href="<?php echo esc_url( $footer_email_url ); ?>" target="<?php echo esc_attr( $footer_email_target ); ?>"><?php echo esc_html( $footer_email_title ); ?></a>
		</div>
	</div>
</aside><!-- #secondary -->
