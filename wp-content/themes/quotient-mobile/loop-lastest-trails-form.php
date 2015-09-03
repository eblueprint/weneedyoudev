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
 * @package quotient-mobile
 */
?>



<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<h1 class="entry-title"><?php the_title(); ?></h1>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'quotient' ), 'after' => '</div>' ) ); ?>

<div>
<?php
$args=array(
  //'orderby' => 'menu_order',
  'orderby' => 'date',
  'order'=> 'ASC',
  'post_type' => 'clinical-trials',
  'post_status' => 'publish',
  'posts_per_page' => 20,
  'caller_get_posts'=> 1,
);

$my_query = null;

if ( is_page(750)) {

// Create a new filtering function that will add our where clause to the query
function filter_where_2( $where = '' ) {
	// posts in the last 30 days
	$where .= " AND post_date < '" . date('Y-m-d', strtotime('-365 days')) . "'";
	return $where;
}

add_filter( 'posts_where', 'filter_where_2' );
$my_query = new WP_Query($args);
remove_filter( 'posts_where', 'filter_where_2' );

} else {

// Create a new filtering function that will add our where clause to the query
function filter_where_3( $where = '' ) {
	// posts in the last 30 days
	$where .= " AND post_date >= '" . date('Y-m-d', strtotime('-365 days')) . "'";
	return $where;
}

add_filter( 'posts_where', 'filter_where_3' );
$my_query = new WP_Query($args);
remove_filter( 'posts_where', 'filter_where_3' );
}

if( $my_query->have_posts() ) {

  while ($my_query->have_posts()) : $my_query->the_post(); ?>

		<?php
        $custom = get_post_custom($post->ID);
        $dates = $custom["wpcf-dates"][0];
        $payment = $custom["wpcf-payment"][0];
		$shortdesc = $custom["wpcf-short-description"][0];
		$studycode = $custom["wpcf-study-code"][0];
        ?>

<div class="trialtext">

    <p><strong><a href="<?php the_permalink() ?>">Study reference: <?php echo $studycode; ?></a></strong></p>
    <p><strong>Dates:</strong> <?php echo $dates; ?></p>
    <p><strong>Payment:</strong> <?php echo $payment; ?></p>
	
	<?php if ( $post->ID == 945 ) { //COPD ?>
		<div id="copdmsg">
			<strong>If you are interested in this study, you should not fill in any online forms but contact the COPD recruitment team direct on 0115 931 5113 or email <a href="mailto:COPD@quotientclinical.com">COPD@quotientclinical.com</a></strong>
		</div><!-- copdmsg -->
	<?php } else { ?>
    
    <div class="formbutton eligibility">
        <form id="clinicalnew" method="post" action="/check-your-eligibility/">
        <input type="hidden" name="trialname" value="<?php echo $studycode; ?>">
        <input type='submit' name='Submit' value='Eligibility' onClick="_gaq.push(['_trackEvent', 'Latest Studies: Full Application', 'Click', '<?php echo $studycode; ?>']);" />
        </form>
    </div><!-- /new app -->
    
    <div class="formbutton quickapp">
        <form id="clinicalquick" method="post" action="/apply-now/application-form/">
        <input type="hidden" name="trialname" value="<?php echo $studycode; ?>">
        <input type='submit' name='Submit' value='Application&#10;form' onClick="_gaq.push(['_trackEvent', 'Latest Studies: Application Form', 'Click', '<?php echo $studycode; ?>']);" />
        </form>
    </div><!-- /quickapp -->
	
    <div class="formbutton existing">
        <form id="clinicalexisting" method="post" action="/apply-now/register-your-interest/">
        <input type="hidden" name="trialname" value="<?php echo $studycode; ?>">
        <input type='submit' name='Submit' value='Already&nbsp;a&#10;volunteer' onClick="_gaq.push(['_trackEvent', 'Latest Studies: Already a Volunteer', 'Click', '<?php echo $studycode; ?>']);" />
        </form>
    </div><!-- /existing -->
	
<?php } ?>
    
    <div class="clear"> </div>

</div><!-- /trialtext -->

<?php endwhile; } wp_reset_query(); ?>

<p style="display: none;"><a href="/clinical-trial-archive/">View our clinical trial archive</a></p>

</div>

						<?php edit_post_link( __( 'Edit', 'quotient' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

<?php endwhile; // end of the loop. ?>