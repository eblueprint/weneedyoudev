<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package quotient-mobile
 */
?>

<?php
$custom = get_post_custom($post->ID);
$mobilecontent = $custom["wpcf-mobile-content"][0];
$tagline = $custom["wpcf-home-tagline"][0];
?>
<?php
/* @Recreate the default filters on the_content
-------------------------------------------------------------- */
add_filter( 'meta_content', 'wptexturize'        );
add_filter( 'meta_content', 'convert_smilies'    );
add_filter( 'meta_content', 'convert_chars'      );
add_filter( 'meta_content', 'wpautop'            );
add_filter( 'meta_content', 'shortcode_unautop'  );
add_filter( 'meta_content', 'prepend_attachment' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="header-wrapper">
	<header class="entry-header">
		<?php if ( is_front_page() ) { ?>
		<h1 class="entry-title">We need you...</h1>
		<?php } else { ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php } ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
<?php if (is_page(32)) { //FAQs ?>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript">
				function toggleDiv(divId) {
				   $("#"+divId).toggle(200);
				}
				$(document).ready(function(){
				$('.question.section').click(function(){
					//$('.faqsection').hide();
					$('.question.section').removeClass('active');
					$(this).addClass('active');
					$(this).parent().next().toggle();
				});

$('.question:not(".section")').click(function(){
					$(this).toggleClass('active');
					$(this).parent().next().toggle();
				});



				});
		</script>
		<?php } ?>

		<?php if ( $mobilecontent ) { ?>
			<?php echo apply_filters('the_content', $mobilecontent, true); ?>
		<?php } else { ?>
			<?php the_content(); ?>
		<?php } ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'quotient-mobile' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	</div>
	<?php edit_post_link( __( 'Edit', 'quotient-mobile' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
	<?php if ( is_front_page() ) { ?>
		<!-- <div id="homepage-tagline">
			<a href="/our-current-clinical-trials/"><?php // echo $tagline; ?></a>
		</div><!/tagline -->
		
		<?php // if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow( "home", "" ); } ?>


		 	<div id="home-slider">
							<?php // if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow( "home", "" ); } ?>
                            
			<!-- start here -->


	<div id="slider_wrapper">
				<div class="slider">

							<div class="slide">
	<video id="video" width="593" height="327" poster="/wp-content/themes/quotient/images/poster.png" preload="none">
		<source src="/wp-content/themes/quotient/tim.mp4" type="video/mp4" />
		<p>Your browser does not support html5 video element.</p>
	</video>

				 <!-- Video Controls -->
 <!-- Video Controls -->
  <div id="video-controls">
    <img id="play-pause" src="/wp-content/themes/quotient/images/play.png" alt="play" />
   </div>


</div>
					<div class="slide">
						<img src="/wp-content/themes/quotient/images/ajax-loader.gif" data-src="/wp-content/themes/quotient/images/two.jpg" />
					</div>
					<div class="slide">
						<img src="/wp-content/themes/quotient/images/ajax-loader.gif" data-src="/wp-content/themes/quotient/images/three.jpg"  />
					</div>
		
				</div>
					<div class="navslide">
					<p>
						<span class="prev"><img src="/wp-content/themes/quotient/images/prev.png" alt="" /></span>
						<span class="next"><img src="/wp-content/themes/quotient/images/next.png" alt="" /></span>
					</p>
				</div>
			</div>
	
					<!-- end here -->



		
		<div class="3-boxes">
		
			<a href="/check-your-eligibility/"><div class="box-1 boxes"><img src="/wp-content/themes/quotient-mobile/images/eligible2.png">
			</div></a>
			
			<a href="/our-current-clinical-trials/"><div class="box-2 boxes"><img src="/wp-content/themes/quotient-mobile/images/mobi.png">
			</div></a>
			
			<a href="/apply-now/new-application-form/"><div class="box-3 boxes"><img src="/wp-content/themes/quotient-mobile/images/applynow2.png">
			</div></a>	
			
		</div>
		
		<div id="home-main">
			<!-- <div id="links">
				<a href="/check-your-eligibility/">Are you eligible?</a>
				<a href="/our-current-clinical-trials/">Latest trials</a>
				<a href="/apply-now/new-application-form/">Apply now</a>
			</div><!-- /links -->
			<div id="updates">
				<div id="updates-form">
					<h3><span>Get updates:</span> Sign up for our newsletter &amp; study alerts</h3>
					<?php echo do_shortcode('[contact-form-7 id="209" title="Footer Get Updates"]'); ?>
				</div><!-- /form -->
			</div><!-- /updates -->
			<div class="competition-section">
				<a href="/recommend-a-friend/"><img alt="Recommend a friend" src="/wp-content/themes/quotient-mobile/images/hero-newest.png"></a>
			</div>
		</div><!-- /home-main -->
	<?php } ?>
	
	<?php if (is_page(32)) { //FAQs ?>
		<div id="next-steps">
			<a href="/check-your-eligibility/">Are you eligible?</a>
			<a href="/apply-now/new-application-form/">Apply<br />now</a>
			<a href="/our-current-clinical-trials/">Clinical trials</a>
		</div><!-- /next-steps -->
	<?php } ?>
</article><!-- #post-## -->
