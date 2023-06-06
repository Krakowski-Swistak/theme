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
						while ( have_posts() ) :
							the_post();
							$postImageUrl = wp_get_attachment_image_src(get_post_thumbnail_id(),'portrait');
					?>
							<div class="relativev post-wrapper mb-[30px] h-[300px] flex gap-[30px] justify-between overflow-hidden">
								<div class="post-img basis-1/3">
									<img src="<?php echo $postImageUrl[0]; ?>" alt="post-img" class="object-cover">
								</div>
								<div class="post-text-wrapper basis-2/3">
									<h2>
										<a href="<?php the_permalink(); ?> " class="text-black"><?php the_title(); ?></a>
									</h2>
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
