<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Swistak_Theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
};
?>

<aside id="secondary" class="widget-area">
	<div class="recent-posts-wrapper">
		<p class="font-medium text-[24px] mb-[25px]">Ostatnie wpisy</p>
		<ul id="slider-id" class="slider-class">
			<?php
			$recent_posts = wp_get_recent_posts(array(
				'numberposts' => 4,
				'post_status' => 'publish' 
			));
			foreach( $recent_posts as $post_item ) : ?>
				<li class="desktop:mb-0 mb-[16px]">
					<a href="<?php echo get_permalink($post_item['ID']) ?>" class="flex gap-[15px] text-black hover:text-[#00b3a7] transition ease-out duration-200">
					<?php
						if(get_the_post_thumbnail($post_item['ID'])){
						?>
						<div class="recent-post-img min-w-[60px] max-h-[60px] overflow-hidden rounded-[10px]">	
							<?php echo get_the_post_thumbnail($post_item['ID'], 'recentPost'); ?>
						</div>
					<?php
						};
					?>
						<div class="recent-post-info leading-[20px]">
							<p class="slider-caption-class mb-0"><?php echo $post_item['post_title'] ?></p>
							<p class="post-date text-[#A3A3A3] text-[14px]"><?php the_time('d F Y') ?></p>
						</div>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

	<!-- <hr class="wp-block-separator has-alpha-channel-opacity "> -->

	<!-- wp admin panel -->
	<?php dynamic_sidebar( 'sidebar-1' ); ?>

	<!-- share post -->
	<?php 
		if(is_single()){ 
		?>
		<div class="share-wrapper mb-[40px] flex items-center gap-[20px]">
			<p class="mb-0 font-medium text-[22px]">Udostępnij post:  </p>
			<?php
				$url = get_permalink();
				$title = get_the_title();
				$socialMedia = array(
					'facebook' => array(
						'url' => 'https://www.facebook.com/sharer/sharer.php?u=' . $url,
						'icon' => '<img width="46" height="46" class="ks-social-img lazyloaded" src="https://swistak.webo.design/wp-content/uploads/2020/07/facebook-square-1.svg" alt="fb-icon">'
					),
					'linkedin' => array(
						'url' => 'https://www.linkedin.com/shareArticle?url=' . $url . '&title=' . $title,
						'icon' => '<img width="46" height="46" class="ks-social-img lazyloaded" src="https://swistak.webo.design/wp-content/uploads/2020/07/linkedin-square.svg" alt="linkedin-icon">'
					),
				); 
			?>
			<ul class="share-links flex gap-[25px]">
				<?php
					foreach ($socialMedia as $platform => $data) {
				?>
					<li class="scale-[1.7]">
						<a href="<?php echo $data['url']; ?>" target="_blank">
							<?php echo $data['icon']; ?>
						</a>
					</li>
				<?php }; ?>
			</ul>
		</div>
	<?php }; ?>
</aside><!-- #secondary -->
