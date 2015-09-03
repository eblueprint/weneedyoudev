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
		</div><!-- /tagline -->
		
		<?php // if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow( "home", "" ); } ?>


<div id="meteor-slideshowhome" class="meteor-slides home navboth { next: '#meteor-nexthome', prev: '#meteor-prevhome', pager: '#meteor-buttonshome' }" style="width: 593px; height: 327px;">
	
			
			
			<ul class="meteor-nav">
		
				<li id="meteor-prevhome" class="prev"><a href="#prev">Previous</a></li>
			
				<li id="meteor-nexthome" class="next"><a href="#next">Next</a></li>
			
			</ul><!-- .meteor-nav -->
		
			<div id="meteor-buttonshome" class="meteor-buttons"><a href="#" class="">1</a><a href="#" class="activeSlide">2</a><a href="#">3</a></div>
		
				
			
		<div class="meteor-clip">
	
		

					<div class="mslide mslide-0" style="position: absolute; top: 0px; left: 0px; display: block; z-index: 4; width: 593px; height: 327px; opacity: 1;">
				
										
	<video id="video"  poster="/wp-content/themes/quotient/images/poster.png" preload="none">
		<source src="tim.mp4" type="video/mp4" />
		<p>Your browser does not support html5 video element.</p>
	</video>
			
			 <!-- Video Controls -->
  <div id="video-controls">
    <img id="play-pause" src="/wp-content/themes/quotient/images/play.png" alt="play" />
   </div>

			</div><!-- .mslide -->


			<div class="mslide mslide-1" style="position: absolute; top: 0px; left: 0px; z-index: 3; opacity: 0; display: none; width: 593px; height: 327px;">
				
					<video id="video1"  poster="/wp-content/themes/quotient/images/poster2.png" preload="none">
		<source src="/wp-content/themes/quotient/two.mp4" type="video/mp4" />
		<p>Your browser does not support html5 video element.</p>
	</video>
	
	 <!-- Video Controls -->
  <div id="video-controls">
    <img id="play-pause" src="/wp-content/themes/quotient/images/play.png" alt="play" />
   </div>						
			</div><!-- .mslide -->
			
			<div class="mslide mslide-2" style="position: absolute; top: 0px; left: 0px; z-index: 3; opacity: 0; display: none; width: 593px; height: 327px;">
				
										
					<video id="video2"  poster="/wp-content/themes/quotient/images/poster3.png" preload="none">
		<source src="/wp-content/themes/quotient/three.mp4" type="video/mp4" />
		<p>Your browser does not support html5 video element.</p>
	</video>
		 <!-- Video Controls -->
  <div id="video-controls">
    <img id="play-pause" src="/wp-content/themes/quotient/images/play.png" alt="play" />
   </div>					
			</div><!-- .mslide -->
			
			<div class="mslide mslide-3" style="position: absolute; top: 0px; left: 0px; z-index: 3; opacity: 0; display: none; width: 593px; height: 327px;">
				
										
						<video id="video"  poster="/wp-content/themes/quotient/images/poster4.png" preload="none">
		<source src="/wp-content/themes/quotient/four.mp4" type="video/mp4" />
		<p>Your browser does not support html5 video element.</p>
	</video>
					 <!-- Video Controls -->
  <div id="video-controls">
    <img id="play-pause" src="/wp-content/themes/quotient/images/play.png" alt="play" />
   </div>		
			</div><!-- .mslide -->
			


			

			<img style="visibility: hidden;" class="meteor-shim" src="https://weneedyou.seoblueprint.co.uk/wp-content/uploads/NotSmoked18-55-593x327.jpg" alt="">
		
			<div class="mslide mslide-4" style="position: absolute; top: 0px; left: 0px; z-index: 3; opacity: 0; display: none; width: 593px; height: 327px;">
				
										
					<a href="https://www.weneedyou.co.uk/clinical-trials/qcl-117426/" title="Healthy non smoking adults"><img width="593" height="327" src="https://weneedyou.seoblueprint.co.uk/wp-content/uploads/NotSmoked18-55-593x327.jpg" class="attachment-featured-slide wp-post-image" alt="NotSmoked18-55" title="Healthy non smoking adults"></a>
			
							
			</div><!-- .mslide -->

			
			
		
		
			
			<div class="mslide mslide-5" style="position: absolute; top: 0px; left: 0px; display: block; z-index: 4; width: 593px; height: 327px; opacity: 1;">
				
										
					<a href="https://www.weneedyou.co.uk/clinical-trials/genotyping-study/" title="Healthy Asian male"><img width="593" height="327" src="https://weneedyou.seoblueprint.co.uk/wp-content/uploads/Asian-Male-slider-visual-593x327.jpg" class="attachment-featured-slide wp-post-image" alt="Asian Male slider visual" title="Healthy Asian male"></a>
			
							
			</div><!-- .mslide -->
			
			
			
		
		
			
			<div class="mslide mslide-6" style="position: absolute; top: 0px; left: 0px; display: none; z-index: 1; width: 593px; height: 327px; opacity: 0;">
				
										
					<a href="https://www.weneedyou.co.uk/clinical-trials/qcl-117375-part-a/" title="Healthy male, non-smoker aged 18-55?"><img width="593" height="327" src="https://weneedyou.seoblueprint.co.uk/wp-content/uploads/male-18-55-593x327.jpg" class="attachment-featured-slide wp-post-image" alt="male 18-55" title="Healthy male, non-smoker aged 18-55?"></a>
			
							
			</div><!-- .mslide -->
			
			
			
				
		</div><!-- .meteor-clip -->
				
					
	</div>

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
