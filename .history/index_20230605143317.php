index.php
<?php

get_header();

?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="ks-container">
			<button class="ks-button ks-button--primary">
				<a href="https://swistak.webo.design/"><- Powrót do Strony Głównej</a>
			</button>
				<?php
				if ( have_posts() ) :
					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;
					while ( have_posts() ) :
						the_post();
						// get_template_part( 'template-parts/content', get_post_type() );
						?>
						<h2><?php the_title(); ?></h2>
						<p> <?php the_excerpt(); ?> </p>
					<?php	
					endwhile;

					the_posts_navigation();
				else :
					
				endif;
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
