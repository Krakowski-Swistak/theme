<?php 
	get_header(); 
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="ks-container">
				<div class="hidden blog-title-wrapper bg-[url('<?php the_field('blog_page_title_background',443); ?>')] bg-no-repeat bg-fill bg-[right_-5px] h-[300px] mb-[100px]">
					<?php the_field('blog_page_title_text', 443); ?>
					<p class="text-[22px] w-[420px] leading-[35px]">
						<?php echo get_field('blog_page_subtitle', 443); ?>
					</p>
				</div>

				<div class="page-content-container flex justify-between gap-[80px]">
					<div class="posts-wrapper mb-[30px] basis-[70%]">
							<?php
								$counter = 0;
								while ( have_posts() ) :
									the_post();
									$counter++;
									$postImageUrl = wp_get_attachment_image_src(get_post_thumbnail_id(),'portrait');
							?>
									<div class="relativev post-wrapper mb-[30px] h-[250px] flex gap-[30px] justify-between overflow-hidden rounded-tl-[60px] rounded-br-[60px]
									<?php if (($counter % 2)) echo 'bg-[#f6f6f6]'; else echo 'bg-white'; ?> 
									">
										<?php
											if ($postImageUrl){
											?>
												<div class="post-img basis-1/3">
													<img src="<?php echo $postImageUrl[0]; ?>" alt="post-img" class="object-cover">
												</div>
											<?php }; ?>
			
										<div class="post-date mx-auto pt-[50px] text-center leading-[60px]">
											<img src="https://swistak.webo.design/wp-content/uploads/2023/06/calendar2.png" alt="calendar-icon" width="52" class="inline">
											<div class="date-text-wrapper">
												<p class="day mb-0 text-[36px] font-medium"><?php the_time('d'); ?></p>  
												<p class="month mt-[-30px] text-[20px] font-light"><?php the_time('M'); ?></p>
											</div>
										</div>
										<div class="post-text-wrapper basis-2/3 pt-[50px] pr-[50px]">
											<h3 class="text-[25px] font-medium leading-[30px] mb-[10px]">
												<a href="<?php the_permalink(); ?> " class="text-black"><?php echo the_title(); ?></a>
											</h3>
											<p class="text-[14px] text-neutral-500 mb-[0px] inline">Autor: <?php the_author(); ?>,</p>
											<div class="category-list mb-[15px] inline-block">
												<span class="text-[14px] text-neutral-500"> Kategoria: </span>
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
											<p><?php wp_trim_words(get_the_excerpt(), 10); ?></p>
											<button class="hidden ks-button ks-button--primary absolute bottom-0 left-[70%]">
												<a href="<?php the_permalink(); ?>">więcej >></a>
											</button>
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
