<?php
/**
 * Template Name: Application Form
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Quotient
 * @since Quotient 1.0
 */
get_header(); ?>
		<div id="container">
			<div id="content" role="main">
				<?php if ( is_page(12) ) { ?>
					<?php
                    /* Run the loop to output the page.
                     * If you want to overload this in a child theme then include a file
                     * called loop-page.php and that will be used instead.
                     */
                    get_template_part( 'loop', 'quick-application-form' );
                    ?>
                <?php } elseif ( is_page(15) ) { ?>
					<?php
                    /* Run the loop to output the page.
                     * If you want to overload this in a child theme then include a file
                     * called loop-page.php and that will be used instead.
                     */
                    get_template_part( 'loop', 'elibility-application-form' );
                    ?>
 <?php } elseif ( is_page(47) ) { ?>
					<?php
                    /* Run the loop to output the page.
                     * If you want to overload this in a child theme then include a file
                     * called loop-page.php and that will be used instead.
                     */
                    get_template_part( 'loop', 'existing-volunteers-application-form' );
                    ?>
<?php } elseif ( is_page(34) || is_page(750) ) { ?>
					<?php
                    /* Run the loop to output the page.
                     * If you want to overload this in a child theme then include a file
                     * called loop-page.php and that will be used instead.
                     */
                    get_template_part( 'loop', 'lastest-trails-form' );
                    ?>
<?php } elseif ( is_page(210) ) { ?>
					<?php
                    /* Run the loop to output the page.
                     * If you want to overload this in a child theme then include a file
                     * called loop-page.php and that will be used instead.
                     */
                    get_template_part( 'loop', 'application-form-empty' );
                    ?>
                                        
                <?php } else { ?>
					<?php
                    /* Run the loop to output the page.
                     * If you want to overload this in a child theme then include a file
                     * called loop-page.php and that will be used instead.
                     */
                    get_template_part( 'loop', 'application-form' );
                    ?>
				<?php } ?>
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>