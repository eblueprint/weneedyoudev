<?php
/**
 * Template Name: Application Form
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package quotient-mobile
 */
get_header(); ?>
<link rel="stylesheet" type="text/css" href="/wp-content/themes/quotient/scripts/bvalidator.css" />
<link rel="stylesheet" type="text/css" href="/wp-content/themes/quotient/scripts/bvalidator.theme.gray2.css" />
<link rel="stylesheet" type="text/css" href="/wp-content/themes/quotient/scripts/messi.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="/wp-content/themes/quotient/scripts/date.js"></script>
<script src="/wp-content/themes/quotient/scripts/jquery.datePicker.js"></script>
<script src="/wp-content/themes/quotient/scripts/custom-form-elements.js"></script>
<script src="/wp-content/themes/quotient/scripts/html5placeholder.jquery.min.js"></script>
<script src="/wp-content/themes/quotient/scripts/jquery.bvalidator-yc.js"></script>
<script src="/wp-content/themes/quotient/scripts/form.errors.js"></script>
<script src="/wp-content/themes/quotient/scripts/showhide.js"></script>
<script src="/wp-content/themes/quotient/scripts/messi.min.js"></script>
<script src="/wp-content/themes/quotient/scripts/bmicalc.js"></script>

		<div id="container">
			<div id="content" role="main">
				<?php if ( is_page(12) ) { ?>
					<?php get_template_part( 'content', 'quick-app' ); ?>
                <?php } elseif ( is_page(15) ) { ?>
					<?php get_template_part( 'loop', 'elibility-application-form' ); ?>
				<?php } elseif ( is_page(47) ) { ?>
					<?php get_template_part( 'loop', 'existing-volunteers-application-form' ); ?>
				<?php } elseif ( is_page(34) || is_page(750) ) { ?>
					<?php get_template_part( 'loop', 'lastest-trails-form' ); ?>
				<?php } elseif ( is_page(210) ) { ?>
					<?php get_template_part( 'loop', 'application-form-empty' ); ?>                          
                <?php } else { ?>
					<?php get_template_part( 'loop', 'application-form' ); ?>
				<?php } ?>
			</div><!-- #content -->
		</div><!-- #container -->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>