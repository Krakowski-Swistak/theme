index.php
<?php 
	get_header(); 
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="blog-title-wrapper bg-[url('<?php the_field('blog_page_title_background',443); ?>')] bg-no-repeat bg-fill bg-[right_-5px] h-[300px] mb-[40px] text-center flex flex-col justify-center items-center">
				<?php the_field('blog_page_title_text', 443); ?>
				<p class="text-[22px]">
					<?php echo get_field('blog_page_subtitle', 443); ?>
				</p>
			</div>
			<div class="ks-container">
				<div class="posts-wrapper mb-[30px]">
					<?php
						while ( have_posts() ) :
							the_post();
							// get_template_part( 'template-parts/content', get_post_type() );
					?>
							<div class="post-wrapper mb-[30px] relative">
								<h2>
									<a href="<?php the_permalink(); ?> " class="text-black"><?php the_title(); ?></a>
								</h2>
								<p><?php the_excerpt(); ?></p>
								<button class="ks-button ks-button--primary absolute bottom-0 left-[70%]">
									<a href="<?php the_permalink(); ?>">więcej >></a>
								</button>
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
