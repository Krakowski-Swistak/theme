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
<!-- test -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main ks-container">
			<div class="ks-container">
				<!-- hidden -->
				<div class="hidden blog-title-wrapper bg-[url('<?php the_field('blog_page_title_background',443); ?>')] bg-no-repeat bg-fill bg-[right_-5px] h-[300px] mb-[40px]">
					<?php the_field('blog_page_title_text', 443); ?>
					<p class="text-[22px] w-[420px] leading-[35px]">
						<?php echo get_field('blog_page_subtitle', 443); ?>
					</p>
				</div>

				<div class="page-content-container mb-[40px] desktop:flex desktop:justify-between desktop:gap-[80px]">
					<div class="page-post-content-container basis-[70%]">
						<a href="https://swistak.webo.design/blog/" class="mb-[25px] text-black text-[16px] font-semibold hover:text-[#00b3a7] transition-text ease-out duration-200"><span class="text-[20px]">&larr; </span> Powrót do Bloga</a>

						<?php
							// post content
							while ( have_posts() ) :
								the_post(); 
								$avatarUrl = get_avatar_url(get_the_author_id());
							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<h1 class="my-[40px] text-[36px] leading-[50px]"><?php the_title(); ?></h1>

									<div class="category-list mb-[35px] ml-[-40px] inline-block">
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
									<div class="post-author-wrapper mb-[20px] flex gap-[10px] items-center [&>img]:rounded-full [&>img]:w-[55px] [&>img]:h-[55px]">
										<img src="<?php echo $avatarUrl; ?>" alt="avatar-image">
										<span class="mb-0">Autor: <?php the_author(); ?>,</span>
										<span class="mb-0 text-neutral-500"><?php the_time('j F Y'); ?></span>
									</div>

									<?php the_content(); ?>
								</article>

								<?php
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
							endwhile;
						?>

						<?php
							$footer_email = get_field('footer_e-mail', 'option');
							if( $footer_email ): 
									$footer_email_url = $footer_email['url'];
									$footer_email_title = $footer_email['title'];
									$footer_email_target = $footer_email['target'] ? $footer_email['target'] : '_self';
							endif;
						?>

						<p>Zainteresował Cię ten materiał? Zapraszam do dyskusji link do Linked-in</p>
						<a href="<?php echo esc_url( $footer_email_url ); ?>" target="<?php echo esc_attr( $footer_email_target ); ?>"><?php echo esc_html( $footer_email_title ); ?></a>
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
						
						<a href="https://swistak.webo.design/blog/" class="text-black text-[16px] font-semibold hover:text-[#00b3a7] transition-text ease-out duration-200"><span class="text-[20px]">&larr; </span> Powrót do Bloga</a>

						<div class="page-nav-wrapper flex gap-[30px]">
							<?php
								wp_link_pages(
									array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'swistak-theme' ),
										'after'  => '</div>',
									)
								);
							?>
						</div>

					</div>

					<div class="sidebar-wrapper basis-[30%] desktop:block hidden">
							<?php get_sidebar(); ?>
					</div>
				</div>
				
				<!-- hidden related posts -->
				<div class="hidden related-posts-container">
					<div class="category-list mb-[15px] inline-block">
						<span class="text-[14px]"> Powiązane posty z kategorii: </span>
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

					<ul class="related-post-wrapper flex gap-[30px] flex-wrap">
						<?php
							$categorySearch = array();
							foreach($categoriesArray as $category){
								$categorySearch[] = $category->term_id;
							};
							$args = array(
								'category__in' => $categorySearch,
								'posts_per_page' => -1
							);

							$query = new WP_Query($args);
							if ($query->have_posts()) {
								while ($query->have_posts()) {
									$query->the_post();
									$postImageUrl = wp_get_attachment_image_src(get_post_thumbnail_id(),'help1');

									if(true){
								?>
									<li class="w-[300px]">
										<a href="<?php the_permalink(); ?>" class="related-post-img block w-full h-[200px] overflow-hidden bg-[url('<?php echo $postImageUrl[0]; ?>')] bg-center bg-no-repeat bg-cover">
											<img src="<?php echo $postImageUrl[0]; ?>" alt="post-image" class="object-cover h-[200px] mb-[6px]">
										</a>
										<a href="<?php the_permalink(); ?>" class="block mb-0 text-black font-medium"><?php the_title(); ?></a>
										<div class="category-list inline-block">
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
										<hr>
										<p class="mb-0"><?php the_excerpt(); ?></p>
									</li>
									<?php
									};
								};
							} else {
								echo 'Nie znaleziono postów';
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
	get_sidebar();

	get_footer();
?>
