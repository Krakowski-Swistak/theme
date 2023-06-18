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
	<ul id="slider-id" class="slider-class">
		<?php
		$recent_posts = wp_get_recent_posts(array(
			'numberposts' => 4,
			'post_status' => 'publish' 
		));
		foreach( $recent_posts as $post_item ) : ?>
			<li>
				<a href="<?php echo get_permalink($post_item['ID']) ?>">
					<div class="recent-post-img max-w-[50px]">	
						<?php echo get_the_post_thumbnail($post_item['ID'], 'full'); ?>
					</div>
					<p class="slider-caption-class"><?php echo $post_item['post_title'] ?></p>
					<p class="post-date"><?php echo get_the_date(); ?></p>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>

	<hr>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
