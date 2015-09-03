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

<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<div id="top-image" style="background-image: url(
	<?php if ( $url ) { ?>
    <?php echo $url; ?>
    <?php } else { ?>
    /wp-content/themes/quotient/images/top-image.jpg
    <?php } ?>
);">
<h1 class="entry-title"><?php the_title(); ?></h1>
</div><!-- /top-image -->

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

					<div class="entry-content">
                    	<?php if (is_page(32)) { ?>
                        	<script type="text/javascript">
								function showonlyone(thechosenone, aElement) {
									 $('.faqsection').each(function(index) {
										  if ($(this).attr("id") == thechosenone) {
											   $(this).show(500);
										  }
										  else {
											   $(this).hide(100);
										  }
									});
								}
								$(document).ready(function(){
									$('.faqsection-link').click(function(){
										$('.faqsection-link').css('backgroundImage','url(/wp-content/themes/quotient/images/faqsection-up1.png)');
        $(this).css('backgroundImage','url(/wp-content/themes/quotient/images/faqsection-down1.png)');
									});
								});
						</script>
                        <script type="text/javascript">
								function toggleDiv(divId) {
								   $("#"+divId).toggle(200);
								}
								$(document).ready(function(){
								$('.question').click(function(){
									$('.question').css('backgroundImage','url(/wp-content/themes/quotient/images/question-up-bg.png)');
									$(this).css('backgroundImage','url(/wp-content/themes/quotient/images/question-down-bg.png)');
								});
								});
						</script>
                        <div id="faqlinks">
                        <a class="faqsection-link medical" href="javascript:showonlyone('medical', this)">Your medical<br />& screening</a>
                        <a class="faqsection-link" href="javascript:showonlyone('stay', this)">Your stay</a>
                        <a class="faqsection-link" href="javascript:showonlyone('safety', this)">Your safety</a>
                        <a class="faqsection-link" href="javascript:showonlyone('payment', this)">Your payment</a>
						<a class="faqsection-link" href="javascript:showonlyone('info', this)">About clinical<br />trials</a>
                        <div class="clear"> </div>
                        </div><!-- /faqlinks -->
                        <?php } ?>
						
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'quotient' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'quotient' ), '<span class="edit-link">', '</span>' ); ?>
						
					</div><!-- .entry-content -->
					<?php if (is_page(337)) { ?>
						<!-- Google Code for ApplicationComplete Conversion Page -->
						<script type="text/javascript">
						/* <![CDATA[ */
						var google_conversion_id = 994759909;
						var google_conversion_language = "en";
						var google_conversion_format = "3";
						var google_conversion_color = "ffffff";
						var google_conversion_label = "8zmXCPO87QUQ5amr2gM";
						var google_conversion_value = 1;
						/* ]]> */
						</script>
						<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
						</script>
						<noscript>
						<div style="display:inline;">
						<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/994759909/?value=1&amp;label=8zmXCPO87QUQ5amr2gM&amp;guid=ON&amp;script=0"/>
						</div>
						</noscript> 
					<?php } ?>
					
				</div><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>