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
			<div class="ks-container">
				<div class="blog-title-wrapper bg-[url('<?php the_field('blog_page_title_background',443); ?>')] bg-no-repeat bg-fill bg-[right_-5px] h-[300px] mb-[40px]">
					<?php the_field('blog_page_title_text', 443); ?>
					<p class="text-[22px] w-[420px] leading-[35px]">
						<?php echo get_field('blog_page_subtitle', 443); ?>
					</p>
				</div>
				<button class="ks-button ks-button--primary mb-[50px]">
					<a href="https://swistak.webo.design/blog/"><- Powrót do Bloga</a>
				</button>

				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php
				$postPageID = the_ID();
				while ( have_posts() ) :
					the_post();
				?>
				<h1><?php the_title(); ?></h1>
					
				<div class="post-wrapper">
					<?php the_content(); ?>
				</div>
				</article>
				<?php
					the_post_navigation($args = array(
						'prev_text' => 'Poprzedni wpis',
						'next_text' => 'Następny wpis'
					));

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

				<div class="related-posts-wrapper">
					<hr>
					<p>Powiązane posty z kategorii:
						<?php 
							$categoriesArray = get_the_category();
							foreach($categoriesArray as $category) echo $category->name;
						?>
					</p>
					<ul class="flex gap-[30px] flex-wrap">
						<?php
							foreach($categoriesArray as $category){
								$categorySearch = $category->term_id;
							};
							$args = array(
								'category__in' => array($categorySearch),
								'posts_per_page' => -1
							);
							$query = new WP_Query($args);
							
							$counter2 = 0;
							if ($query->have_posts()) {
								while ($query->have_posts()) {
									if($counter2 > 1){
										$query->the_post();
										$counter++;
										?>
										<li class="w-[300px]">
											<p><?php the_title(); ?></p>
											<p><?php the_excerpt(); ?></p>
										</li>
										<?php
											
										};
								};
							} else {
								echo 'No posts found.';
							};
							wp_reset_postdata();
						?>
					</ul>
				</div>
			</div>
		</main>
		<!-- #main -->
	</div><!-- #primary -->


<?php
// get_sidebar();
get_footer();
