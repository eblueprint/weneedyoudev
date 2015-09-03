<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 * @package WordPress
 * @subpackage Quotient
 * @since Quotient 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<?php
        $custom = get_post_custom($post->ID);
        $tagline = $custom["wpcf-home-tagline"][0];
        ?>

			<div class="test3">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>

					<div class="entry-content">
                    	<div id="home-slider">
							<?php // if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow( "home", "" ); } ?>
                            
					<!-- start here -->


	<div id="slider_wrapper">

<div class="slider"> <!-- start slider container -->

	<!-- TIMS VIDEO start video slide -->
	<div class="slide">
	<video id="video" width="593" height="327" poster="/wp-content/themes/quotient/images/poster.png" preload="preload">
	<source src="/wp-content/themes/quotient/tim.mp4" type="video/mp4" />
	<p>Your browser does not support html5 video element.</p>
	</video>
	<!-- start video controls -->
	<div id="video-controls">
	<img id="play-pause" src="/wp-content/themes/quotient/images/play.png" alt="play" />
	</div>
	<!-- end video controls -->
	</div>
	<!-- end video slide -->



	<!-- VIDEO TWO start video slide Volunteer Jo pays for family holidays with payment she receives -->
	<div class="slide">
	<video id="video1" poster="/wp-content/themes/quotient/images/poster2.png" width="593" height="327" preload="preload">
	<source src="/wp-content/themes/quotient/two.mp4" type="video/mp4" />
	<p>Your browser does not support html5 video element.</p>
	</video>
	<!-- start video controls -->
	<div id="video-controls">
	<img id="play-pause1" src="/wp-content/themes/quotient/images/play.png" alt="play" />
	</div>
	<!-- end video controls -->
	</div>
	<!-- end video slide -->



	<!-- VIDEO THREE start video slide Pam and Julie - volunteering for clinical trials for over 20 years -->
	<div class="slide">
	<video id="video2" poster="/wp-content/themes/quotient/images/poster3.png" width="593" height="327" preload="preload">
	<source src="/wp-content/themes/quotient/three.mp4" type="video/mp4" />
	<p>Your browser does not support html5 video element.</p>
	</video>
	<!-- start video controls -->
	<div id="video-controls">
	<img id="play-pause2" src="/wp-content/themes/quotient/images/play.png" alt="play" />
	</div>
	<!-- end video controls -->
	</div>
	<!-- end video slide -->			


	<!-- VIDEO FOUR start video slide Why do people like David volunteer for clinical trials -->
	<div class="slide">
	<video id="video3" poster="/wp-content/themes/quotient/images/poster4.png" width="593" height="327" preload="preload">
	<source src="/wp-content/themes/quotient/four.mp4" type="video/mp4" />
	<p>Your browser does not support html5 video element.</p>
	</video>
	<!-- start video controls -->
	<div id="video-controls">
	<img id="play-pause3" src="/wp-content/themes/quotient/images/play.png" alt="play" />
	</div>
	<!-- end video controls -->
	</div>
	<!-- end video slide -->

	
	<!-- start image slide -->
	<div class="slide">
	<img data-src="/wp-content/themes/quotient/images/two.jpg" />
	</div>
	<!-- end image slide -->

	<!-- start image slide -->
	<div class="slide">
	<img data-src="/wp-content/themes/quotient/images/three.jpg"  />
	</div>
	<!-- end image slide -->

</div> <!-- end slider contains -->


					<div class="navslide">
					<p>
						<span class="prev"><img src="/wp-content/themes/quotient/images/prev.png" alt="" /></span>
						<span class="next"><img src="/wp-content/themes/quotient/images/next.png" alt="" /></span>
					</p>
				</div>
			</div>
	
					<!-- end here -->

                            <div id="home-imgs">
                            <a href="https://www.weneedyou.co.uk/our-current-clinical-trials/"><img src="/wp-content/themes/quotient/images/latest-studies.png" alt="Latest Studies"/></a><br />
                            <a href="https://www.weneedyou.co.uk/apply-now/"><img src="/wp-content/themes/quotient/images/apply-now2.png" alt="Apply now" /></a><br />
							
                            </div><!-- /home-imgs -->
                        </div><!-- /home-slider -->
                        
                        <div class="clear"> </div>
                        

					</div><!-- .entry-content -->
					</div><!-- #post-## -->
					
				<div class="home-form">
					<div class="form-section">
						<span class="span1">Get updates: </span><span class="span2">Sign up for our newsletter & study alerts</span>
						<div class="home-form-entry">
							<?php echo do_shortcode("[contact-form-7 id='209' title='Footer Get Updates']"); ?>
						</div>
					</div>
				</div>
				
				<div class="home-bottom">
					<div class="bottom-section-left">
						<a href="https://www.weneedyou.co.uk/check-your-eligibility/"><img src="/wp-content/themes/quotient/images/eligible.png" alt="Are you eligible?" /></a>
					</div>
					
					<div class="bottom-section-middle">
						<div class="full-width">
                        
                            <div id="slider-footer">
                                <?php echo $tagline; ?>
                            </div>
                            
                            <div id="welcome">
                            	<h1>We need you...</h1>
                            </div><!-- /welcome -->
                            
                            <div id="home-content">
								<?php the_content(); ?>
                                <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'quotient' ), 'after' => '</div>' ) ); ?>
                            	<?php edit_post_link( __( 'Edit', 'quotient' ), '<span class="edit-link">', '</span>' ); ?>
                            </div><!-- /home-content -->
                            
                        </div><!-- /full-width -->
					</div>
					
					<div class="bottom-section-right">
						<a href="https://www.weneedyou.co.uk/recommend-a-friend/"><img src="/wp-content/themes/quotient/images/hero-newest.png" alt="Recommend a friend" /></a>
					</div>				
				</div>

				</div>
<?php endwhile; // end of the loop. ?>

			


	