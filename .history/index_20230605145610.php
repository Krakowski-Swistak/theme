index.php
<?php 
	get_header(); 
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="ks-container">
			<button class="ks-button ks-button--primary mb-[50px]">
				<a href="https://swistak.webo.design/"><- Powrót do Strony Głównej</a>
			</button>

				<div class="posts-wrapper mb-[30px]">
					<?php
						while ( have_posts() ) :
							the_post();
							// get_template_part( 'template-parts/content', get_post_type() );
					?>
							<div class="post-wrapper mb-[30px]">
								<h2 class=""><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<p><?php the_excerpt(); ?></p>
								<button class="ks-button ks-button--primary">
									<a href="<?php the_permalink(); ?>">Czytaj więcej >></a>
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
