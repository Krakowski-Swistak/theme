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

				<div class="Share-wrapper">
					<p class="mb-0 inline">Udostępnij -> </p>
					<?php
						$url = get_permalink();
						$title = get_the_title();
						$socialMedia = array(
							'facebook' => array(
								'url' => 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url),
								'icon' => '<img width="23" height="23" class="ks-social-img lazyloaded" src="https://swistak.webo.design/wp-content/uploads/2020/07/facebook-square-1.svg" alt="fb-icon">'
							),
							'linkedin' => array(
								'url' => 'https://www.linkedin.com/shareArticle?url=' . urlencode($url) . '&title=' . urlencode($title),
								'icon' => '<img width="23" height="23" class="ks-social-img lazyloaded" src="https://swistak.webo.design/wp-content/uploads/2020/07/linkedin-square.svg" alt="linkedin-icon">'
							),
						); 
					?>

					<ul class="share-links flex gap-[10px]">
						<?php
							foreach ($socialMedia as $platform => $data) {
						?>
							<li class="scale-[2]">
								<a href="<?php echo $data['url']; ?>" target="_blank">
									<?php echo $data['icon']; ?>
								</a>
							</li>
						<?php }; ?>
					</ul>
				</div>

				<div class="related-posts-wrapper">
					<hr>
					<div class="category-list mb-[15px] inline-block">
						<span class="text-[14px] text-neutral-500"> Powiązane posty z kategorii: </span>
						<ul class="inline text-[14px] text-neutral-500">
							<?php 
								$categoriesArray = get_the_category();
								foreach ($categoriesArray as $category) {
								$category_link = get_category_link($category->term_id);
								?>
								<li class="inline">
									<a href="<?php echo esc_url($category_link); ?>" class="text-white bg-[#00b3a7] p-[4px_8px] rounded-full"><?php echo $category->name; ?></a>
								</li>
							<?php }; ?>
						</ul>
					</div>

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
							if ($query->have_posts()) {
								$counter2 = 0;
								while ($query->have_posts()) {
										$query->the_post();
										$counter2++;
										if($counter2 > 1){
										?>
										<li class="w-[300px]">
											<a href="<?php the_permalink(); ?>" class="block mb-0 text-black font-medium"><?php the_title(); ?></a>
											<div class="category-list mb-[5px] inline-block">
												<span class="text-[14px] text-neutral-500"> Kategoria: </span>
												<ul class="inline text-[14px] text-neutral-500">
													<?php 
														$categories = get_the_category();
														foreach ($categories as $category) {
														$category_link = get_category_link($category->term_id);
														?>
														<li class="inline">
															<a href="<?php echo esc_url($category_link); ?>" class="text-neutral-500"><?php echo $category->name; ?></a>
														</li>
													<?php }; ?>
												</ul>
											</div>
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
