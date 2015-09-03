<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Quotient
 * @since Quotient 1.0
 */

get_header(); ?>

		<div id="container">
		<div class="blog-title">
			<h1>Blog</h1>
		</div>
		<div id="crumbs"><a href="https://www.weneedyou.co.uk">Home</a> &raquo; <span class="current">Blog</span></div>
			<div id="content" role="main">

			<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.
			 */
			 get_template_part( 'loop', 'index' );
			?>
			
			<?php wp_pagenavi(); ?>
			
			</div><!-- #content -->
			
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
