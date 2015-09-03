<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package quotient-mobile
 */
?>
<?php if ( is_home() || is_single() || is_archive() ) { ?>

	<div id="secondary" class="widget-area" role="complementary">
		<?php //do_action( 'before_sidebar' ); ?>
		<?php //if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
		
			<aside id="recent-posts" class="widget">
				<h1 class="widget-title"><?php _e( 'Recent Posts', 'quotient-mobile' ); ?></h1>
				<ul>
				<?php
					$args = array( 'numberposts' => '7' );
					$recent_posts = wp_get_recent_posts( $args );
					foreach( $recent_posts as $recent ){
						echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> ';
					}
				?>
				</ul>
			</aside>

			<aside id="archives" class="widget">
				<h1 class="widget-title"><?php _e( 'Archives', 'quotient-mobile' ); ?></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

		<?php //endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
	
<?php } ?>