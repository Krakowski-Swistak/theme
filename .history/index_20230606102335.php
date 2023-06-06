index.php
<?php 
	get_header(); 
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="ks-container">
			<div class="blog-title-wrapper bg-[url('<?php the_field('blog_page_title_background',443); ?>')] bg-no-repeat bg-fill bg-[right_-5px] h-[300px] mb-[100px]">
				<?php the_field('blog_page_title_text', 443); ?>
				<p class="text-[22px] w-[420px] leading-[35px]">
					<?php echo get_field('blog_page_subtitle', 443); ?>
				</p>
			</div>

				<div class="posts-wrapper mb-[30px]">
					<?php
						$counter = 0;
						while ( have_posts() ) :
							the_post();
							$counter++;
							$postImageUrl = wp_get_attachment_image_src(get_post_thumbnail_id(),'portrait');
					?>
							<div class="relativev post-wrapper mb-[30px] h-[300px] flex gap-[30px] justify-between overflow-hidden rounded-tl-[60px] rounded-br-[60px]
							<?php if (($counter % 2)) echo 'bg-[#f6f6f6]'; else echo 'bg-white'; ?> 
							">
								<div class="post-img basis-1/3">
									<img src="<?php echo $postImageUrl[0]; ?>" alt="post-img" class="object-cover">
								</div>
								<div class="post-date mx-auto pt-[30px] text-center leading-[60px]">
									<img src="https://swistak.webo.design/wp-content/uploads/2023/06/calendar.png" alt="calendar-icon" width="52" class="inline">
									<div class="date-text-wrapper inline">
										<p class="day mb-[10px] text-[40px] text-[#00b3a7] font-semibold"><?php the_time('d'); ?></p>  
										<p class="month text-[20px] text-[#00b3a7] font-light leading-[16px]"><?php the_time('M'); ?></p>
									</div>
								</div>
								<div class="post-text-wrapper basis-2/3 pt-[30px]">
									<h3 class="text-[35px] font-semibold">
										<a href="<?php the_permalink(); ?> " class="text-black"><?php the_title(); ?></a>
									</h3>
									<p><?php the_excerpt(); ?></p>
									<button class="ks-button ks-button--primary absolute bottom-0 left-[70%]">
										<a href="<?php the_permalink(); ?>">więcej >></a>
									</button>
								</div>
							</div>
						<?php	
						endwhile;
						the_posts_navigation();
					?>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
