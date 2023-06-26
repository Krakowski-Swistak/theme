<?php 
	get_header(); 
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="ks-container">
				<div class="blog-title-wrapper flex gap-[30px] items-center">
					<?php the_field('blog_page_title_text', 443); ?>
					<p class="text-[22px]">
						<?php echo get_field('blog_page_subtitle', 443); ?>
					</p>
				</div>

				<div class="page-content-container flex justify-between gap-[80px]">
					<div class="posts-wrapper mb-[30px] basis-[70%]">
							<?php
								while ( have_posts() ) :
									the_post();
									$postImageUrl = wp_get_attachment_image_src(get_post_thumbnail_id(),'portrait');
							?>
									<div class="relativev post-wrapper group mb-[30px] h-[200px] flex gap-[30px] justify-between overflow-hidden">
										<?php
											if ($postImageUrl){
											?>
												<a href="<?php the_permalink(); ?>" class="post-img basis-1/3 rounded-[10px] overflow-hidden">
													<img src="<?php echo $postImageUrl[0]; ?>" alt="post-img" class="object-cover">
												</a>
											<?php }; ?>
			
										<div class="post-date mx-auto text-center leading-[60px] flex flex-col justify-center items-center">
											<img src="https://swistak.webo.design/wp-content/uploads/2023/06/calendar2.png" alt="calendar-icon" width="35" class="inline">
											<div class="date-text-wrapper">
												<p class="day mb-0 text-[36px] font-medium"><?php the_time('d'); ?></p>  
												<p class="month mt-[-30px] text-[20px] font-light"><?php the_time('M'); ?></p>
											</div>
										</div>
										<div class="post-text-wrapper relative basis-2/3 pr-[50px]">
											<h3 class="text-[25px] font-medium leading-[30px] mb-[10px]">
												<a href="<?php the_permalink(); ?> " class="text-black text-black hover:text-[#00b3a7] transition ease-out duration-200"><?php echo the_title(); ?></a>
											</h3>
											<div class="category-list mb-[15px] inline-block">
												<ul class="inline text-[14px] text-neutral-500">
													<?php 
														$categories = get_the_category();
														foreach ($categories as $category) {
														$category_link = get_category_link($category->term_id);
														?>
														<li class="inline">
															<a href="<?php echo esc_url($category_link); ?>" class="text-white bg-[#00b3a7] p-[4px_8px] rounded-full"><?php echo $category->name; ?></a>
														</li>
													<?php }; ?>
												</ul>
											</div>
											<p class="mb-0 text-[15px] leading-[22px]"><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
											<a href="<?php the_permalink(); ?>" class="text-black hover:text-[#00b3a7] transition ease-out duration-200 absolute bottom-[0px] right-[50px]">Czytaj więcej <span class="text-[20px]">&rarr;</span></a>
										</div>
									</div>
								<?php	
								endwhile;
								the_posts_navigation();
							?>
					</div>

					<div class="sidebar-wrapper basis-[30%]">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
