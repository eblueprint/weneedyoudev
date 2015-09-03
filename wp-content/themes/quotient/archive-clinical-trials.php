<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Quotient
 * @since Quotient 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">
			
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<div id="top-image" style="background-image: url(
	<?php if ( $url ) { ?>
    <?php echo $url; ?>
    <?php } else { ?>
    /wp-content/themes/quotient/images/top-image.jpg
    <?php } ?>
);">

<?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

			<h1 class="page-title">Clinical Trial Archive</h1>
</div><!-- /top-image -->

<?php rewind_posts(); ?>

<?php while ( have_posts() ) : the_post(); ?>

		<?php
        $custom = get_post_custom($post->ID);
        $dates = $custom["wpcf-dates"][0];
        $payment = $custom["wpcf-payment"][0];
		$shortdesc = $custom["wpcf-short-description"][0];
		$studycode = $custom["wpcf-study-code"][0];
        ?>


<div class="trialtext">

    <p><a href="<?php the_permalink() ?>"><strong>Study reference: 
		<?php echo $studycode; ?>
    </strong></a></p>
    
    <p><strong>Dates:</strong> <?php echo $dates; ?></p>
    
    <p><strong>Payment:</strong> <?php echo $payment; ?></p>
    
    <div class="formbutton existing">
        <form id="clinicalexisting" method="post" action="../apply-now/register-your-interest">
        <input type="hidden" name="trialname" value="<?php echo $studycode; ?>">
        <input type='submit' name='Submit' value='Already a Volunteer?' onClick="_gaq.push(['_trackEvent', 'Latest Studies: Already a Volunteer', 'Click', '<?php echo $studycode; ?>']);" />
        </form>
    </div><!-- /existing -->
    
    <div class="formbutton newapp">
        <form id="clinicalnew" method="post" action="../apply-now/application-form">
        <input type="hidden" name="trialname" value="<?php echo $studycode; ?>">
        <input type='submit' name='Submit' value='Full Application' onClick="_gaq.push(['_trackEvent', 'Latest Studies: Full Application', 'Click', '<?php echo $studycode; ?>']);" />
        </form>
    </div><!-- /new app -->
    
    <div class="formbutton quickapp">
        <form id="clinicalquick" method="post" action="../apply-now/quick-application-form">
        <input type="hidden" name="trialname" value="<?php echo $studycode; ?>">
        <input type='submit' name='Submit' value='Quick Application' onClick="_gaq.push(['_trackEvent', 'Latest Studies: Quick Application', 'Click', '<?php echo $studycode; ?>']);" />
        </form>
    </div><!-- /quickapp -->
    
    <div class="clear"> </div>

</div><!-- /trialtext -->

<?php endwhile; // End the loop. Whew. ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older studies', 'quotient' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer studies <span class="meta-nav">&rarr;</span>', 'quotient' ) ); ?></div>
				</div><!-- #nav-below -->
<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
