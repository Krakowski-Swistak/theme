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
				<?php
					while ( have_posts() ) :
						the_post();
						// get_template_part( 'template-parts/content', get_post_type() );
				?>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p> <?php the_excerpt(); ?> </p>
						<button class="ks-button ks-button--primary">
							<a href="<?php the_permalink(); ?>">Czytaj więcej >></a>
						</button>
					<?php	
					endwhile;
					the_posts_navigation();
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
