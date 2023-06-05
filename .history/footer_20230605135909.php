<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Swistak_Theme
 */

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

	</div>

	<footer id="kontakt" class="site-footer ks-footer ks-fade">
		<div class="ks-footer__bg-custom">
            <img class="bg" src="/wp-content/themes/swistak-theme/assets/public/dist/css/images/450b3e9126216c73cee8cb8e54bfde45.png" alt="Tło"/>
			<div class="ks-container ks-fadeInBottom">
				<div class="ks-footer__content">
					<div>
						<h3><?php echo get_field('footer_text', 'option'); ?></h3>
					</div>
					<div>
						<h2 class="ks-util-color-primary"><?php echo get_field('footer_heading', 'option'); ?></h2>
					</div>
					<div class="ks-contact-label ks-contact-label--phone">
						<a href="<?php echo esc_url( $footer_phone_url ); ?>" target="<?php echo esc_attr( $footer_phone_target ); ?>"><?php echo esc_html( $footer_phone_title ); ?></a>
					</div>
					<div class="ks-contact-label ks-contact-label--email">
						<a href="<?php echo esc_url( $footer_email_url ); ?>" target="<?php echo esc_attr( $footer_email_target ); ?>"><?php echo esc_html( $footer_email_title ); ?></a>
					</div>
					<div class="ks-form">
						<?php 
							acfe_form('footer-contact-form'); 
						?>
					</div>
					<?php if( get_field('hero_button_1') ): ?>
						<button class="ks-button ks-button--primary">
							<a class="scroll" href="<?php echo get_field('hero_button_1')['url']; ?>" target="_self"  title="<?php echo get_field('hero_button_1')['title']; ?>"><?php echo get_field('hero_button_1')['title']; ?></a>
						</button>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="ks-container">
			<div class="site-info ks-copyright">
				<div class="ks-copyright__rights">
					<span>&copy; <?php the_time('Y'); ?> time All Rights Reserved</span>
					<span>&copy; <?php echo date('Y') ?> date All Rights Reserved</span>
				</div>
				<div class="ks-copyright__social-media">
				<?php
					if( have_rows('social_images', 'option') ):
						while ( have_rows('social_images', 'option') ) : the_row();
							$image = get_sub_field('social_image');
							$link = get_sub_field('social_url');
							?>	
							<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="last-of-type:ml-[2px]">
								<img width="23" height="23" class="ks-social-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" alt="<?php echo $image['title']; ?>" />
							</a>
							<?php
						endwhile;
					else :
					endif;
				?>
				</div>
				<div class="ks-copyright__author">
					<a 
						id="webo" 
						href="https://www.webo.pl" 
						rel="noopener noreferrer nofollow" 
						target="_blank">
							Realizacja - WEBO 
							<svg 
								xmlns="http://www.w3.org/2000/svg" 
								height="20px"
								viewBox="0 0 17363 17363"
								fill-rule="evenodd" 
								clip-rule="evenodd" 
								stroke-linejoin="round" 
								stroke-miterlimit="2" 
							>
								<path d="M11837.1 15782.8l-.029.029v1575.28l-7496.83 3.004c-2395.47 0-4340.29-1944.81-4340.29-4340.29v-8680.54c0-2395.45 1944.78-4340.25 4340.29-4340.29h8680.54c2395.5.033 4340.29 1944.83 4340.29 4340.29v7493.83h-1578.28l-.001-6704.71c.001-1959.88-1591.13-3551.06-3551.14-3551.15H5129.4c-1960.02.083-3551.15 1591.27-3551.15 3551.15v7102.25c0 1959.91 1591.2 3551.13 3551.15 3551.15h6707.71z" fill="#333" />
								<path d="M15782.8 17361.1h-2367.43v-3945.71l3945.71-.001v2367.43c0 871.058-707.171 1578.25-1578.28 1578.28z" fill="#333"/>
							</svg>
							<style>
								#webo{
									color: #333;
									display: flex;
									align-items: center;
									justify-content: center;
									margin: auto;
									text-align: center;
									font-size: 12px;
									line-height: 24px;
									transition: color 0.3s;
									will-change: color;
									padding-left: 5px;
									user-select: none;
								}
								#webo:hover,
								#webo:focus{
									color: #00e0b4;
									outline: 0;
								}
								#webo:focus{
									outline-style: auto;
								}
								#webo svg path:last-child{
									transition: fill 0.3s;
									will-change: fill;
								}
								#webo:hover svg path:last-child,
								#webo:focus svg path:last-child{
									fill: #00e0b4;
								}
								#webo svg{
									margin: 5px;
								}
							</style>
					</a>
				</div>
			</div>
		</div>
	</footer>
</div>

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/swiper.min.css' ?>">

<?php wp_footer(); ?>
</body>
</html>
