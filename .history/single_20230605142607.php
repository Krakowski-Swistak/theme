single.php
<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Swistak_Theme
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main ks-container">
		<button class="ks-button ks-button--primary mb-[50px]">
			<a href="https://swistak.webo.design/blog/"><- Powrót do Bloga</a>
		</button>

		<?php
		while ( have_posts() ) :
			the_post();
			// get_template_part( 'template-parts/content', get_post_type() );
		?>
		<h1><?php the_title(); ?></h1>
			 
		<div class="post-wrapper">
			<?php the_content(); ?>
			
		</div>

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'swistak-theme' ),
					'after'  => '</div>',
				)
			);
		?>

		<button class="ks-button ks-button--primary my-[50px]">
			<a href="https://swistak.webo.design/blog/"><- Powrót do Bloga</a>
		</button>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_sidebar();
get_footer();
