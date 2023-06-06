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
							<div class="relativev post-wrapper mb-[30px] h-[350px] flex gap-[30px] justify-between overflow-hidden rounded-tl-[60px] rounded-br-[60px]
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
									<h3 class="text-[35px] font-semibold mb-[10px]">
										<a href="<?php the_permalink(); ?> " class="text-black"><?php echo the_title(); ?></a>
									</h3>
									<p class="text-[14px] text-neutral-500 mb-[10px]">Auto: <?php the_author(); ?></p>
									<p class="text-[14px] text-neutral-500 mb-[20px]">Kategoria: <?php the_author(); ?></p>
									<p class="mb-[45px]"><?php echo get_the_excerpt(); ?></p>
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
