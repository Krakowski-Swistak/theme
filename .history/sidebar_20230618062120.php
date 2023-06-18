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
	<p class="font-medium text-[24px] mb-[5px]">Ostatnie wpisy</p>
		<ul id="slider-id" class="slider-class">
			<?php
			$recent_posts = wp_get_recent_posts(array(
				'numberposts' => 4,
				'post_status' => 'publish' 
			));
			foreach( $recent_posts as $post_item ) : ?>
				<li>
					<a href="<?php echo get_permalink($post_item['ID']) ?>" class="flex gap-[15px]">
						<div class="recent-post-img max-w-[60px] max-h-[60px] overflow-hidden">	
							<?php echo get_the_post_thumbnail($post_item['ID'], 'recommendation'); ?>
						</div>
						<div class="recent-post-info leading-[20px]">
							<p class="slider-caption-class mb-0"><?php echo $post_item['post_title'] ?></p>
							<p class="post-date text-[#A3A3A3] text-[14px]"><?php echo get_the_date(); ?></p>
						</div>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

	<hr>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
