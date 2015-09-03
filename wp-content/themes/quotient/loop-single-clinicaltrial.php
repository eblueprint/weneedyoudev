<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Quotient
 * @since Quotient 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<div id="top-image" style="background-image: url(
	<?php if ( $url ) { ?>
    <?php echo $url; ?>
    <?php } else { ?>
    /wp-content/themes/quotient/images/top-image.jpg
    <?php } ?>
);">

	<?php
	$custom = get_post_custom($post->ID);
	$studycode = $custom["wpcf-study-code"][0];
	?>

<h1 class="entry-title"><?php the_title(); ?></h1>
</div><!-- /top-image -->

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div id="crumbs"><a href="/">Home</a> &raquo; <a href="/our-current-clinical-trials/">Clinical Trials</a> &raquo; <span class="current"><?php the_title(); ?></span></div>

					<div class="entry-content">
                    <div class="trialtext">
                    	<strong>Study reference: <?php echo $studycode; ?></strong><br /><br />
						<?php the_content(); ?>
                        <hr />
						<?php if ( is_single( '945' ) ) { //COPD ?>
								<div id="copdmsg">
									<strong>If you are interested in this study, you should not fill in any online forms but contact the COPD recruitment team direct on 0115 931 5113 or email <a href="mailto:COPD@quotientclinical.com">COPD@quotientclinical.com</a></strong>
								</div><!-- copdmsg -->
						<?php } else { ?>
                            <div class="formbutton existing">
                                <form id="clinicalexisting" method="post" action="/apply-now/register-your-interest">
                                <input type="hidden" name="trialname" value="<?php echo $studycode; ?>">
                                <input type='submit' name='Submit' value='Already a Volunteer?' />
                                </form>
                            </div><!-- /existing -->
                            
                            <div class="formbutton newapp">
                                <form id="clinicalnew" method="post" action="/apply-now/application-form">
                                <input type="hidden" name="trialname" value="<?php echo $studycode; ?>">
                                <input type='submit' name='Submit' value='Application Form' />
                                </form>
                            </div><!-- /new app -->
                            
                            <div class="formbutton quickapp">
                                <form id="clinicalquick" method="post" action="/apply-now/quick-application-form">
                                <input type="hidden" name="trialname" value="<?php echo $studycode; ?>">
                                <input type='submit' name='Submit' value='Quick Application' />
                                </form>
                            </div><!-- /quickapp -->
                            
                            <div class="clear"> </div>
                        <p class="trial-footer"><br /><strong>Click 'Already a volunteer' if you're on our panel and wish to register your interest in this trial. Click 'Application Form' to apply to join our volunteer panel.</strong></p>
						
						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style " style="padding: 10px 0;">
						<a class="addthis_button_preferred_1"></a>
						<a class="addthis_button_preferred_2"></a>
						<a class="addthis_button_preferred_3"></a>
						<a class="addthis_button_preferred_4"></a>
						<a class="addthis_button_compact"></a>
						<a class="addthis_counter addthis_bubble_style"></a>
						</div>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-52a7102549606123"></script>
						<!-- AddThis Button END -->
						
						<?php } ?>
							
                    </div><!-- /trialtext -->
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'quotient' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

				</div><!-- #post-## -->
				
				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>