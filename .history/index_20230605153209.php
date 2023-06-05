index.php
<?php 
	get_header(); 
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="title-bg bg-[#f6f6f6] h-[250px] mb-[40px] text-center flex justify-center items-center">
				<h2 class="[&>div]:left-[50%] [&>div]:translate-x-[-50%] mb-0">Witaj na moim <br/><span class="ks-util-color-primary">Blogu</span></h2>
			</div>
			<div class="ks-container relative">
				<button class="ks-button ks-button--primary mb-[50px]">
					<a href="https://swistak.webo.design/"><- Powrót do Strony Głównej</a>
				</button>

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
								<button class="ks-button ks-button--primary absolute bottom-0 right-[40px]">
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
