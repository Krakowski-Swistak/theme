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
<!-- test -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main ks-container">
			<div class="ks-container">
				<div class="blog-title-wrapper bg-[url('<?php the_field('blog_page_title_background',443); ?>')] bg-no-repeat bg-fill bg-[right_-5px] h-[300px] mb-[40px]">
					<?php the_field('blog_page_title_text', 443); ?>
					<p class="text-[22px] w-[420px] leading-[35px]">
						<?php echo get_field('blog_page_subtitle', 443); ?>
					</p>
				</div>

				<div class="page-content-container flex justify-between gap-[100px]">
					<div class="page-post-content-container">
						<button class="ks-button ks-button--primary mb-[50px]">
							<a href="https://swistak.webo.design/blog/"><- Powrót do Bloga</a>
						</button>

						<?php
							// post content
							while ( have_posts() ) :
								the_post(); 
								$avatarUrl = get_avatar_url(get_the_author_id());
							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<h1 class="mb-[50px]"><?php the_title(); ?></h1>
									<div class="category-list mb-[35px] inline-block">
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
										<span class="mb-0">Autor: <?php the_author(); ?></span>
									</div>

									<?php the_content(); ?>

									<div class="ks-swiper ks-swiper--shadow">
										<div class="swiper-container ks-swiper__blog-post-gallery" data-slider-case-studies>
											<ul class="swiper-wrapper">
												<?php
													if( have_rows('case_studies_cases') ):
														while ( have_rows('case_studies_cases') ) : the_row();
															$title = get_sub_field('case_study_title');
															$description = get_sub_field('case_study_description');
															?>	
																<li class="swiper-slide" data-case-slide>
																	<div class="ks-case-studies__slide">
																		<div class="ks-facility">
																			<span class="ks-facility__title ks-util-weight-500 ks-case-studies-swiper-slide"></span>
																			<span class="ks-facility__title ks-facility__title--with-line"><?php echo $title; ?></span>
																		</div>
																		<div class="ks-case-studies__content-wrapper">
																			<div class="ks-case-studies__content" data-case-studies-content><?php echo $description; ?></div>
																		</div>
																	</div>
																</li>
															<?php
														endwhile;
													else :
													endif;
												?>
											</ul>
											<div class="swiper-button-next"></div>
											<div class="swiper-button-prev"></div>
										</div>
										<div class="swiper-pagination ks-case-studies__swiper-pagination"></div>
									</div>

									<!-- <div class="swiper">
										<div class="swiper-wrapper">
											<div class="swiper-slide bg-slate-200 w-[450px] h-[250px]">Slide 1</div>
											<div class="swiper-slide bg-slate-200 w-[450px] h-[250px]">Slide 2</div>
											<div class="swiper-slide bg-slate-200 w-[450px] h-[250px]">Slide 3</div>
										</div>
										<div class="swiper-pagination"></div>

										<div class="swiper-button-prev"></div>
										<div class="swiper-button-next"></div>

										<div class="swiper-scrollbar"></div>
									</div> -->
								</article>

								<div class="share-wrapper mb-[40px] flex items-center gap-[20px]">
									<p class="mb-0 font-medium text-[22px]">Udostępnij post:  </p>
									<?php
										$url = get_permalink();
										$title = get_the_title();
										$socialMedia = array(
											'facebook' => array(
												'url' => 'https://www.facebook.com/sharer/sharer.php?u=' . $url,
												'icon' => '<img width="46" height="46" class="ks-social-img lazyloaded" src="https://swistak.webo.design/wp-content/uploads/2020/07/facebook-square-1.svg" alt="fb-icon">'
											),
											'linkedin' => array(
												'url' => 'https://www.linkedin.com/shareArticle?url=' . $url . '&title=' . $title,
												'icon' => '<img width="46" height="46" class="ks-social-img lazyloaded" src="https://swistak.webo.design/wp-content/uploads/2020/07/linkedin-square.svg" alt="linkedin-icon">'
											),
										); 
									?>
									<ul class="share-links flex gap-[30px]">
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

								<?php
									the_post_navigation($args = array(
										'prev_text' => '<< Poprzedni wpis',
										'next_text' => 'Następny wpis >>'
									));

									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
							endwhile;
						?>
						
						<button class="ks-button ks-button--primary mt-[20px] mb-[50px]">
								<a href="https://swistak.webo.design/blog/"><- Wszystkie posty</a>
							</button>

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

						<div class="related-posts-wrapper">
							<hr class="mb-[20px]">
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

							<ul class="related-post-wrapper flex gap-[30px] flex-wrap">
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
												$postImageUrl = wp_get_attachment_image_src(get_post_thumbnail_id(),'recommendation');

												if($counter2 >= 0){
												?>
												<li class="w-[300px]">
													<a href="<?php the_permalink(); ?>" class="related-post-img w-full h-[200px] overflow-hidden bg-[url('<?php echo $postImageUrl[0]; ?>')] bg-center bg-no-repeat bg-cover">
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
										echo 'No posts found.';
									};
									wp_reset_postdata();
								?>
							</ul>
						</div>
					</div>

					<div class="sidebar-wrapper basis-[30%]">
							<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</main>
		<!-- #main -->
	</div><!-- #primary -->

<?php
	get_sidebar();

	get_footer();
?>
