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

	<?php
	$custom = get_post_custom($post->ID);
	$studycode = $custom["wpcf-study-code"][0];
	?>

<h1 class="entry-title"><?php the_title(); ?></h1>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
                            <div class="formbutton eligibility">
                                <form id="clinicalexisting" method="post" action="/check-your-eligibility/">
                                <input type="hidden" name="trialname" value="<?php echo $studycode; ?>">
                                <input type='submit' name='Submit' value='Eligibility' />
                                </form>
                            </div><!-- /existing -->
                            
                            <div class="formbutton quickapp">
                                <form id="clinicalnew" method="post" action="/apply-now/application-form/">
                                <input type="hidden" name="trialname" value="<?php echo $studycode; ?>">
                                <input type='submit' name='Submit' value='Application&#10;Form' />
                                </form>
                            </div><!-- /new app -->
                            
                            <div class="formbutton existing">
                                <form id="clinicalquick" method="post" action="/apply-now/register-your-interest/">
                                <input type="hidden" name="trialname" value="<?php echo $studycode; ?>">
                                <input type='submit' name='Submit' value='Already&nbsp;a&#10;volunteer' />
                                </form>
                            </div><!-- /quickapp -->
                            
                            <div class="clear"> </div>
                        <p class="trial-footer"><strong>Click 'Already a volunteer' if you're on our panel and wish to register your interest in this trial. Click 'Application Form' to apply to join our volunteer panel.</strong></p>
						
						<?php } ?>
							
                    </div><!-- /trialtext -->
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'quotient' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

				</div><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>