<?php
/**
 * The homepage template file
 *
 * @package Swistak_Theme
 */

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="ks-hero">
		    <img src="<?php echo get_template_directory_uri() . '/assets/images/hero.jpg' ?>" alt="Baner" class="baner-bg-custom"/>
				<div class="ks-hero__container">
					<div class="ks-container">
						<div class="ks-hero__content">
							<?php echo the_field('hero_title'); ?>
							<p><?php echo the_field('hero_description'); ?></p>
							<div class="ks-hero__buttons">
								<?php
								
									$hero_button_1 = get_field('hero_button_1');
									if( $hero_button_1 ): 
										$hero_button_1_url = $hero_button_1['url'];
										$hero_button_1_title = $hero_button_1['title'];
										$hero_button_1_target = $hero_button_1['target'] ? $hero_button_1['target'] : '_self';
									endif;

									$hero_button_2 = get_field('hero_button_2');
									if( $hero_button_2 ): 
										$hero_button_2_url = $hero_button_2['url'];
										$hero_button_2_title = $hero_button_2['title'];
										$hero_button_2_target = $hero_button_2['target'] ? $hero_button_2['target'] : '_self';
									endif;

								?>

								<button class="ks-button ks-button--primary">
									<a class="scroll" href="<?php echo esc_url( $hero_button_1_url ); ?>" target="<?php echo esc_attr( $hero_button_1_target ); ?>"><?php echo esc_html( $hero_button_1_title ); ?></a>
								</button>
								<button class="ks-button ks-button__video ks-button__video--primary">
									<a href="<?php echo esc_url( $hero_button_2_url ); ?>" target="<?php echo esc_attr( $hero_button_2_target ); ?>" data-video-trigger><?php echo esc_html( $hero_button_2_title ); ?></a>
								</button>
							</div>
						</div>
					</div>
				</div>
			</section>
	
			<section id="ks-about" class="ks-background-shape ks-background-shape__square ks-about ks-fade">
				<div class="ks-container ks-fadeInBottom">
					<div class="ks-about__inner">
						<div class="ks-image ks-image--big">
							<?php
							
								$about_img = get_field('about_image');
								if( $about_img ): 
									$about_img_url = $about_img['url'];
									$about_img_alt = $about_img['alt'];
									$about_img_title = $about_img['title'];
								endif;

								if($about_img): $about_img_sizes = $about_img['sizes'];?>
								<img 
									src="<?php echo $about_img_sizes['portrait']; ?>" 
									width="<?php echo $about_img_sizes['portrait-width']; ?>"
									height="<?php echo $about_img_sizes['portrait-height']; ?>" 
									alt="<?php echo $about_img['alt']; ?>" alt="<?php echo $about_img['title']; ?>" />
							<?php endif; ?>
						</div>
						<div class="ks-about__content ks-decoration ks-decoration--left">
							<div><?php echo the_field('about_heading'); ?></div>

							<div class="ks-about__facilities">
							<?php
								if( have_rows('about_facilities') ):
									while ( have_rows('about_facilities') ) : the_row();
										$image = get_sub_field('about_facility_image');
										$content = get_sub_field('about_facility_info');
										?>	
											<div class="ks-facility">
												<img width="67" height="67" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" alt="<?php echo $image['title']; ?>" />
												<h3 class="ks-facility__title"><?php echo $content; ?></h3>
											</div>
										<?php
									endwhile;
								else :
								endif;
							?>
							</div>

							<div class="ks-about__text"><?php echo the_field('about_content'); ?></div>
						</div>
					</div>	
				</div>
			</section>
			
			<section id="ks-how-do-i-help" class="ks-help ks-background-shape ks-background-shape__rectangle ks-fade">
				<div class="ks-container ks-fadeInBottom">
					<div class="ks-help__info">
						<div class="ks-help__content">
							<?php echo the_field('help_heading'); ?>
							<?php echo the_field('help_content'); ?>
						</div>
						<div class="ks-help__images">
							<?php
								 
								$help_img_1 = get_field('help_image_1');
								if( $help_img_1 ): 
									$help_img_1_url = $help_img_1['url'];
									$help_img_1_alt = $help_img_1['alt'];
									$help_img_1_title = $help_img_1['title'];
								endif;

								$help_img_2 = get_field('help_image_2');
								if( $help_img_2 ): 
									$help_img_2_url = $help_img_2['url'];
									$help_img_2_alt = $help_img_2['alt'];
									$help_img_2_title = $help_img_2['title'];
								endif;
							?>

							<?php if($help_img_1): $help_img_1_sizes = $help_img_1['sizes'];?>
								<div class="ks-image ks-image--normal">
									<img src="<?php echo $help_img_1_sizes['help1']; ?>"
										alt="<?php echo $help_img_1['alt']; ?>"
										title="<?php echo $help_img_1['title']; ?>"
										width="<?php echo $help_img_1_sizes['help1-width']; ?>"
										height="<?php echo $help_img_1_sizes['help1-height']; ?>" 
									/>
								</div>
							<?php endif; ?>

							<?php if($help_img_2): $help_img_2_sizes = $help_img_2['sizes'];?>
								<div class="ks-image ks-image--normal">
									<img src="<?php echo $help_img_2_sizes['help2']; ?>"
										alt="<?php echo $help_img_2['alt']; ?>"
										title="<?php echo $help_img_2['title']; ?>"
										width="<?php echo $help_img_2_sizes['help2-width']; ?>"
										height="<?php echo $help_img_2_sizes['help2-height']; ?>" 
									/>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="ks-help__facilities ks-decoration ks-decoration--center">
						<?php
							if( have_rows('help_facilities') ):
								while ( have_rows('help_facilities') ) : the_row();
									$icon = get_sub_field('help_facility_icon');
									$title = get_sub_field('help_facility_title');
									$description = get_sub_field('help_facility_description');
									?>	
										<div class="ks-facility ks-facility--extended">
											<div>
												<img width="57" height="57" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" alt="<?php echo $icon['title']; ?>" />
												<span class="ks-facility__title ks-facility__title--with-line"><?php echo $title; ?></span>
											</div>
											<?php echo $description; ?>
										</div>
									<?php
								endwhile;
							else :
							endif;
						?>
					</div>
				</div>
			</section>

			<section id="ks-strategy" class="ks-strategy ks-fade">
				<div class="ks-container ks-fadeInBottom">
					<div class="ks-strategy__container">
						<div class="ks-strategy__column ks-strategy__column--content ks-decoration ks-decoration--left">
							<?php echo the_field('strategy_heading'); ?>
							<p class="ks-facility__title"><?php echo the_field('strategy_heading_2'); ?></p>
							<?php echo the_field('strategy_content'); ?>
						</div>
						<?php
							
							$strategy_image = get_field('strategy_image');
							if( $strategy_image ): 
								$strategy_image_url = $strategy_image['url'];
								$strategy_image_alt = $strategy_image['alt'];
								$strategy_image_title = $strategy_image['title'];
							endif;
							
						?>
						<div class="ks-strategy__column ks-strategy__column--image">
							<img src="<?php echo $strategy_image['url']; ?>" alt="<?php echo $strategy_image['alt']; ?>" title="<?php echo $strategy_image['title']; ?>" width="772" height="576"/>
						</div>
					</div>
				</div>
			</section>
			
			<section id="ks-case-studies" class="ks-case-studies ks-fade">
				<div class="ks-container ks-fadeInBottom">
					<?php echo the_field('case_studies_heading'); ?>
					<div class="ks-swiper ks-swiper--shadow">
						<div class="swiper-container ks-swiper__case-studies" data-slider-case-studies>
							<ul class="swiper-wrapper">
								<?php
									if( have_rows('case_studies_cases') ):
										while ( have_rows('case_studies_cases') ) : the_row();
											$title = get_sub_field('case_study_title');
											$description = get_sub_field('case_study_description');
											?>	
												<li class="swiper-slide" data-case-slide>
													<div class="ks-case-studies__slide">
														<div class="ks-facility">
															<span class="ks-facility__title ks-util-weight-500 ks-case-studies-swiper-slide"></span>
															<span class="ks-facility__title ks-facility__title--with-line"><?php echo $title; ?></span>
														</div>
														<div class="ks-case-studies__content-wrapper">
															<div class="ks-case-studies__content" data-case-studies-content><?php echo $description; ?></div>
														</div>
													</div>
												</li>
											<?php
										endwhile;
									else :
									endif;
								?>
							</ul>
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
						<div class="swiper-pagination ks-case-studies__swiper-pagination"></div>
					</div>
				</div>
			</section>

			<section id="ks-recommendations" class="ks-recommendations ks-fade">
				<div class="ks-container ks-fadeInBottom relative flex flex-col justify-center ">
					<?php echo the_field('recommendations_heading'); ?>
					<button class="ks-button ks-button--primary inverted w-fit absolute desktop:top-[10px] bottom-[-130px] desktop:bottom-auto desktop:right-0">
						<a class="" href="https://www.linkedin.com/in/swistak-krakow/details/recommendations/?detailScreenTabIndex=0" target="_blank"><?php the_field('recomendation_button_text'); ?></a>
					</button>
					<div class="ks-swiper">
						<div class="swiper-container ks-recommendations__swiper-container" data-slider-recommendation >
							<ul class="swiper-wrapper">
								<?php
									if( have_rows('recommendations_items') ):
										while ( have_rows('recommendations_items') ) : the_row();
											$image = get_sub_field('recommendation_image');
											$author_role = get_sub_field('recommendation_author_role');
											$author_name = get_sub_field('recommendation_author_name');
											$description = get_sub_field('recommendation_description');
											
											?>	
												<li class="swiper-slide">	
													<div class="ks-recommendation">
														<?php if($image): $image_sizes = $image['sizes'];?>
															<div class="ks-image ks-image--small">
																<img
																	src="<?php echo $image_sizes['recommendation']; ?>"
																	alt="<?php echo $image['alt']; ?>"
																	title="<?php echo $image['title']; ?>"
																	width="<?php echo $image_sizes['recommendation-width']; ?>"
																	height="<?php echo $image_sizes['recommendation-height']; ?>" 
																/>
															</div>
														<?php endif; ?>
														<div class="ks-recommendation__content">
															<div class="ks-facility">
																<span class="ks-facility__title ks-facility__title--thin ks-facility__title--small"><?php echo $author_role; ?></span>
																<span class="ks-facility__title ks-facility__title--with-line"><?php echo $author_name; ?></span>
															</div>
															<?php echo $description; ?>
														</div>
													</div>
												</li>
											<?php
										endwhile;
									else :
									endif;
								?>
							</ul>
						</div>
						<div class="swiper-pagination ks-recommendations__swiper-pagination"></div>
					</div>
				</div>
			</section>

			<section id="ks-clients" class="ks-clients ks-fade">
				<div class="ks-container ks-fadeInBottom">
					<?php echo the_field('clients_heading'); ?>
					<?php
						$clients_brands = get_field('clients_brands');
						$clients_brands_count = count($clients_brands);
						$board_size = 8;
						$clients_chunks = array_chunk($clients_brands, $board_size, true);
						foreach ($clients_chunks as $key => $chunk) {
							?>
							<div class="ks-clients__board">
										<?php
											foreach ($chunk as $key => $brand) {
												?>
													<div class="ks-clients__logotype">
														<div class="ks-clients-logotype-img">
															<a href="<?php echo $brand['client_url']['url']; ?>" target="<?php echo $brand['client_url']['target']; ?>">
																<img
																	src="<?php echo $brand['clients_brand_logotype']['url']; ?>"
																	alt="<?php echo $brand['clients_brand_logotype']['alt']; ?>"
																	title="<?php echo $brand['clients_brand_logotype']['title']; ?>"
																/>
															</a>
														</div>
													</div>
												<?php
											}
										?>
								</div>
							<?php
						}
					?>
				</div>
			</section>

			<section id="ks-calendy" class="ks-calendy ks-fade">
				<div class="ks-container">
					<h2>Umów się na <br/><span class="ks-util-color-primary">konsultacje</span></h2>
					<div class="container">
						<?php echo the_field('calendy_html_widget'); ?>
					</div>
				</div>
			</section>

			<section id="ks-career-offer" class="ks-career-offer ks-fade mb-[135px]">
				<div class="ks-container ks-fadeInBottom">
					<div class="ks-career-offer__info">
						<div class="ks-career-offer__content mb-[100px]">
							<?php echo the_field('career_offer_heading'); ?>
							<?php echo the_field('career_offer_content'); ?>
						</div>
					</div>
					<div class="wrapper pb-[10px] desktop:overflow-x-auto overflow-x-scroll">
						<div class="ks-career-offer__options flex justify-between gap-[20px]">
							<?php
								$options2 = get_field('career_offer_button');

								if( have_rows('career_offer_options') ):
									while ( have_rows('career_offer_options') ) : the_row();
										$icon = get_sub_field('career_offer_icon');
										$title = get_sub_field('career_offer_title');
										$description = get_sub_field('career_offer_description');
										$button = get_sub_field('career_offer_button');
										?>	
											<div class="ks-option__wrapper bg-[#f3f3f3] p-[40px] drop-shadow-lg basis-full flex flex-col justify-center">
												<div class="flex justify-center items-center flex-col gap-[40px] text-center">
													<div class="temp-icon w-[110px] h-[110px] rounded-full bg-[#00b3a7]">icon</div>
													<!-- <img width="57" height="57" src="<?php echo $icon['url']; ?>" alt="icon" /> -->
													<p class="ks-option__title text-[21px] font-bold"><?php echo $title; ?></p>
												</div>
												<div class="ks-option__description-wrapper h-[290px] mb-[50px] overflow-y-scroll">
													<p class="ks-option__description">
														<?php echo $description; ?>
													</p>
												</div>
												<button class="ks-button ks-button--primary w-fit mx-auto text-[20px]">
													<a href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
												</button>
											</div>
										<?php
									endwhile;
								else :
								endif;
							?>
						</div>
					</div>
				</div>
			</section>

			<section id="ks-blog" class="ks-blog ks-fade mb-[135px] pt-[64px] bg-[#f6f6f6]">
				<div class="ks-container ks-fadeInBottom">
					<h2><a href="https://swistak.webo.design/blog" class="ks-util-color-primary">Blog</a></h2>
					<div class="blog-wrapper mb-[60px] flex justify-between gap-[30px]">
						<?php 
							$homepagePost = new WP_Query(array(
								'posts_per_page' => 2
							));

							// blog posts
							while ($homepagePost -> have_posts()){
								$homepagePost -> the_post(); 
								$postImageUrl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'post');
						?>
							<div class="post-wrapper relative mb-[30px] w-1/2">
								<div class="post-img h-[395px] mb-[35px] overflow-hidden drop-shadow-lg
									bg-[url('<?php echo $postImageUrl[0]; ?>')] bg-center bg-cover bg-no-repeat
								">
								</div>
								<?php the_title('<h3 class="text-[24px] font-semibold mb-[7px]">', '</h3>'); ?></php>
								<p class="text-[14px] text-neutral-400"><?php the_time('d F Y') ?></p>
								<p class="text-[#252525] mb-[70px]"><?php echo get_the_excerpt(); ?></p>
								<button class="ks-button ks-button--primary absolute bottom-0 left-0">
									<a href="<?php the_permalink(); ?>">Czytaj więcej >></a>
								</button>
							</div>
						<?php };
							wp_reset_postdata(); 
						?>
					</div>
				</div>
			</section>

			<section id="ks-content" class="ks-content ks-fade">
				<div class="ks-container ks-fadeInBottom">
					<?php echo the_field('materials_heading'); ?>
					<?php echo the_field('materials_description'); ?>
					<div class="ks-content__container">
						<div class="ks-content__column">
							<div class="ks-image ks-image--no-shadow">
								<img src="<?php echo get_template_directory_uri() . '/assets/images/video-plug.png' ?>" alt="<?php bloginfo( 'name' ); ?>" />
								<div class="ks-overlay"></div>
								
								<button class="ks-button ks-button__video ks-button__video--white">
									<a href="<?php echo esc_url( $hero_button_2_url ); ?>" target="<?php echo esc_attr( $hero_button_2_target ); ?>" data-video-trigger><?php echo esc_html( $hero_button_2_title ); ?></a>
								</button>
							</div>
						</div>
						<div class="ks-content__column">
							<div class="ks-content__swiper-container" data-slider-materials>
								<ul class="swiper-wrapper">
									<?php
									$materials_articles = get_field('materials_articles');
									$materials_articles_count = count($materials_articles);
									$slide_size = 5;
									$materials_chunks = array_chunk($materials_articles, $slide_size, true);
									foreach ($materials_chunks as $key => $chunk) {
										?>
											<li class="swiper-slide">
												<div class="ks-content__links">	
													<?php
														foreach ($chunk as $key => $article) {
															?>
																<a class="ks-button ks-button--custom" href="<?php echo esc_url( $article['materials_single_article']['url'] ); ?>" target="<?php echo esc_attr( $article['materials_single_article']['target'] ); ?>"><?php echo esc_html( $article['materials_single_article']['title'] ); ?></a>
															<?php
														}
													?>
												</div>
											</li>
										<?php
									}
									?>
								</ul>
								<div class="ks-content__swiper-pagination"></div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<div id="ks-video-popup" class="ks-popup">
				<div class="ks-popup__content">
					<?php echo str_replace('src', "data-lazy-src", get_field('main_page_video')); ?>
				</div>
				<div class="ks-overlay"></div>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
