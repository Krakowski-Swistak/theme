<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Swistak_Theme
 */

 function getPageClassName() {
	$classname;
	if ( is_front_page() ) {
		$classname = 'ks-front-page';
	}
	else {
		$classname = 'ks-page';
	}
	return $classname;
 }

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<script src="https://cdn.tailwindcss.com"></script>

  <script>
      tailwind.config = {
      theme: {
        container: {
            screens: {
                // sm: '640px',
                // md: '768px',
                // lg: '1024px',
                xl: '1080px',
                '2xl': '1496px',
            },
        },
        extend: {
            colors: {
              'primary': '#091242',
              'secondary': '#FFBE34',
              'textgray': '#4D5053',
              'darkblue': '#091242',
            },
        }, 
        screens: {
          'tablet': '640px',
          // => @media (min-width: 640px) { ... }

          'desktop': '1024px',
          // => @media (min-width: 1024px) { ... }
        },  
      }
      }
  </script>

	
	<?php wp_head(); ?>
	<script>
		var acf = {};
		acf.data = {};
		var lazySizes = {};
		lazySizes.cfg = {}; 
		lazySizes.cfg.nativeLoading = {};
		</script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="<?php echo getPageClassName(); ?> site">
	<div class="ks-header" data-header>
		<header id="masthead" class="ks-container site-header">
			<div class="ks-header__bar">
				<div class="site-branding">
					<?php the_custom_logo(); ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle ks-menu-toggler" aria-controls="primary-menu" aria-expanded="false">
					<span class="ks-sr-only">Menu</span>
					<div class="ks-menu-toggler__line"></div>
					<div class="ks-menu-toggler__line"></div>
					<div class="ks-menu-toggler__line"></div>
				</button>
				<div class="ks-menu-items-container">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
					?>
					<div class="ks-contact-info">
						<div class="ks-contact-info__social-media">
						<?php
							if( have_rows('social_images', 'option') ):
								while ( have_rows('social_images', 'option') ) : the_row();
									$image = get_sub_field('social_image');
									$link = get_sub_field('social_url');
									?>	
									<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
										<img width="23" height="23" class="ks-social-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" alt="<?php echo $image['title']; ?>" />
									</a>
									<?php
								endwhile;
							else :
							endif;
						?>
						</div>
						<button class="ks-button ks-button--primary inverted">
							<a class="scroll" href="#kontakt">Skontaktuj się</a>
						</button>
						<style>.ks-button--primary.inverted{color: #00b3a7;background: transparent;border: 2px solid #00b3a7;}
							   .ks-button--primary.inverted a{color: #00b3a7; transition: all 0.3}
.ks-button--primary.inverted:hover{background: #00b3a7;color: #fff}
.ks-button--primary.inverted:hover a{color: #fff}
</style>
					</div>
				</div>
				</nav><!-- #site-navigation -->
			</div>
		</header><!-- #masthead -->
	</div>

	<div id="content" class="site-content">
