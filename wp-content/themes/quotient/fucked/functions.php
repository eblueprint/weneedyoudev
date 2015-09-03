<?php

/**

 * quotient functions and definitions

 *

 * Sets up the theme and provides some helper functions. Some helper functions

 * are used in the theme as custom template tags. Others are attached to action and

 * filter hooks in WordPress to change core functionality.

 *

 * The first function, quotient_setup(), sets up the theme by registering support

 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.

 *

 * When using a child theme (see http://codex.wordpress.org/Theme_Development and

 * http://codex.wordpress.org/Child_Themes), you can override certain functions

 * (those wrapped in a function_exists() call) by defining them first in your child theme's

 * functions.php file. The child theme's functions.php file is included before the parent

 * theme's file, so the child theme functions would be used.

 *

 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached

 * to a filter or action hook. The hook can be removed by using remove_action() or

 * remove_filter() and you can attach your own function to the hook.

 *

 * We can remove the parent theme's hook only after it is attached, which means we need to

 * wait until setting up the child theme:

 *

 * <code>

 * add_action( 'after_setup_theme', 'my_child_theme_setup' );

 * function my_child_theme_setup() {

 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)

 *     remove_filter( 'excerpt_length', 'quotient_excerpt_length' );

 *     ...

 * }

 * </code>

 *

 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.

 *

 * @package WordPress

 * @subpackage Quotient

 * @since Quotient 1.0

 */



/**

 * Set the content width based on the theme's design and stylesheet.

 *

 * Used to set the width of images and content. Should be equal to the width the theme

 * is designed for, generally via the style.css stylesheet.

 */

if ( ! isset( $content_width ) )

	$content_width = 640;



/** Tell WordPress to run quotient_setup() when the 'after_setup_theme' hook is run. */

add_action( 'after_setup_theme', 'quotient_setup' );



if ( ! function_exists( 'quotient_setup' ) ):

/**

 * Sets up theme defaults and registers support for various WordPress features.

 *

 * Note that this function is hooked into the after_setup_theme hook, which runs

 * before the init hook. The init hook is too late for some features, such as indicating

 * support post thumbnails.

 *

 * To override quotient_setup() in a child theme, add your own quotient_setup to your child theme's

 * functions.php file.

 *

 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.

 * @uses register_nav_menus() To add support for navigation menus.

 * @uses add_custom_background() To add support for a custom background.

 * @uses add_editor_style() To style the visual editor.

 * @uses load_theme_textdomain() For translation/localization support.

 * @uses add_custom_image_header() To add support for a custom header.

 * @uses register_default_headers() To register the default custom header images provided with the theme.

 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.

 *

 * @since Quotient 1.0

 */

function quotient_setup() {



	// This theme styles the visual editor with editor-style.css to match the theme style.

	add_editor_style();



	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.

	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );



	// This theme uses post thumbnails

	add_theme_support( 'post-thumbnails' );



	// Add default posts and comments RSS feed links to head

	add_theme_support( 'automatic-feed-links' );



	// Make theme available for translation

	// Translations can be filed in the /languages/ directory

	load_theme_textdomain( 'quotient', get_template_directory() . '/languages' );



	$locale = get_locale();

	$locale_file = get_template_directory() . "/languages/$locale.php";

	if ( is_readable( $locale_file ) )

		require_once( $locale_file );



	// This theme uses wp_nav_menu() in one location.

	register_nav_menus( array(

		'primary' => __( 'Primary Navigation', 'quotient' ),

	) );



	// This theme allows users to set a custom background

	add_custom_background();



	// Your changeable header business starts here

	if ( ! defined( 'HEADER_TEXTCOLOR' ) )

		define( 'HEADER_TEXTCOLOR', '' );



	// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.

	if ( ! defined( 'HEADER_IMAGE' ) )

		define( 'HEADER_IMAGE', '%s/images/headers/path.jpg' );



	// The height and width of your custom header. You can hook into the theme's own filters to change these values.

	// Add a filter to quotient_header_image_width and quotient_header_image_height to change these values.

	//define( 'HEADER_IMAGE_WIDTH', apply_filters( 'quotient_header_image_width', 940 ) );

	//define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'quotient_header_image_height', 198 ) );



	// We'll be using post thumbnails for custom header images on posts and pages.

	// We want them to be 940 pixels wide by 198 pixels tall.

	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.

	//set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );



	// Don't support text inside the header image.

	if ( ! defined( 'NO_HEADER_TEXT' ) )

		define( 'NO_HEADER_TEXT', true );



	// Add a way for the custom header to be styled in the admin panel that controls

	// custom headers. See quotient_admin_header_style(), below.

	add_custom_image_header( '', 'quotient_admin_header_style' );



	// ... and thus ends the changeable header business.



	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.

	register_default_headers( array(

		'berries' => array(

			'url' => '%s/images/headers/berries.jpg',

			'thumbnail_url' => '%s/images/headers/berries-thumbnail.jpg',

			/* translators: header image description */

			'description' => __( 'Berries', 'quotient' )

		),

		'cherryblossom' => array(

			'url' => '%s/images/headers/cherryblossoms.jpg',

			'thumbnail_url' => '%s/images/headers/cherryblossoms-thumbnail.jpg',

			/* translators: header image description */

			'description' => __( 'Cherry Blossoms', 'quotient' )

		),

		'concave' => array(

			'url' => '%s/images/headers/concave.jpg',

			'thumbnail_url' => '%s/images/headers/concave-thumbnail.jpg',

			/* translators: header image description */

			'description' => __( 'Concave', 'quotient' )

		),

		'fern' => array(

			'url' => '%s/images/headers/fern.jpg',

			'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',

			/* translators: header image description */

			'description' => __( 'Fern', 'quotient' )

		),

		'forestfloor' => array(

			'url' => '%s/images/headers/forestfloor.jpg',

			'thumbnail_url' => '%s/images/headers/forestfloor-thumbnail.jpg',

			/* translators: header image description */

			'description' => __( 'Forest Floor', 'quotient' )

		),

		'inkwell' => array(

			'url' => '%s/images/headers/inkwell.jpg',

			'thumbnail_url' => '%s/images/headers/inkwell-thumbnail.jpg',

			/* translators: header image description */

			'description' => __( 'Inkwell', 'quotient' )

		),

		'path' => array(

			'url' => '%s/images/headers/path.jpg',

			'thumbnail_url' => '%s/images/headers/path-thumbnail.jpg',

			/* translators: header image description */

			'description' => __( 'Path', 'quotient' )

		),

		'sunset' => array(

			'url' => '%s/images/headers/sunset.jpg',

			'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',

			/* translators: header image description */

			'description' => __( 'Sunset', 'quotient' )

		)

	) );

}

endif;



if ( ! function_exists( 'quotient_admin_header_style' ) ) :

/**

 * Styles the header image displayed on the Appearance > Header admin panel.

 *

 * Referenced via add_custom_image_header() in quotient_setup().

 *

 * @since Quotient 1.0

 */

function quotient_admin_header_style() {

?>

<style type="text/css">

/* Shows the same border as on front end */

#headimg {

	border-bottom: 1px solid #000;

	border-top: 4px solid #000;

}

/* If NO_HEADER_TEXT is false, you would style the text with these selectors:

	#headimg #name { }

	#headimg #desc { }

*/

</style>

<?php

}

endif;



/**

 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.

 *

 * To override this in a child theme, remove the filter and optionally add

 * your own function tied to the wp_page_menu_args filter hook.

 *

 * @since Quotient 1.0

 */

function quotient_page_menu_args( $args ) {

	$args['show_home'] = true;

	return $args;

}

add_filter( 'wp_page_menu_args', 'quotient_page_menu_args' );



/**

 * Sets the post excerpt length to 40 characters.

 *

 * To override this length in a child theme, remove the filter and add your own

 * function tied to the excerpt_length filter hook.

 *

 * @since Quotient 1.0

 * @return int

 */

function quotient_excerpt_length( $length ) {

	return 40;

}

add_filter( 'excerpt_length', 'quotient_excerpt_length' );



/**

 * Returns a "Continue Reading" link for excerpts

 *

 * @since Quotient 1.0

 * @return string "Continue Reading" link

 */

function quotient_continue_reading_link() {

	return ' <a href="'. get_permalink() . '">' . __( '', 'quotient' ) . '</a>'; //Continue reading <span class="meta-nav">&rarr;</span>

}



/**

 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and quotient_continue_reading_link().

 *

 * To override this in a child theme, remove the filter and add your own

 * function tied to the excerpt_more filter hook.

 *

 * @since Quotient 1.0

 * @return string An ellipsis

 */

function quotient_auto_excerpt_more( $more ) {

	return ' &hellip;' . quotient_continue_reading_link();

}

add_filter( 'excerpt_more', 'quotient_auto_excerpt_more' );



/**

 * Adds a pretty "Continue Reading" link to custom post excerpts.

 *

 * To override this link in a child theme, remove the filter and add your own

 * function tied to the get_the_excerpt filter hook.

 *

 * @since Quotient 1.0

 * @return string Excerpt with a pretty "Continue Reading" link

 */

function quotient_custom_excerpt_more( $output ) {

	if ( has_excerpt() && ! is_attachment() ) {

		$output .= quotient_continue_reading_link();

	}

	return $output;

}

add_filter( 'get_the_excerpt', 'quotient_custom_excerpt_more' );



/**

 * Remove inline styles printed when the gallery shortcode is used.

 *

 * Galleries are styled by the theme in Quotient's style.css. This is just

 * a simple filter call that tells WordPress to not use the default styles.

 *

 * @since Quotient 1.2

 */

add_filter( 'use_default_gallery_style', '__return_false' );



/**

 * Deprecated way to remove inline styles printed when the gallery shortcode is used.

 *

 * This function is no longer needed or used. Use the use_default_gallery_style

 * filter instead, as seen above.

 *

 * @since Quotient 1.0

 * @deprecated Deprecated in Quotient 1.2 for WordPress 3.1

 *

 * @return string The gallery style filter, with the styles themselves removed.

 */

function quotient_remove_gallery_css( $css ) {

	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );

}

// Backwards compatibility with WordPress 3.0.

if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )

	add_filter( 'gallery_style', 'quotient_remove_gallery_css' );



if ( ! function_exists( 'quotient_comment' ) ) :

/**

 * Template for comments and pingbacks.

 *

 * To override this walker in a child theme without modifying the comments template

 * simply create your own quotient_comment(), and that function will be used instead.

 *

 * Used as a callback by wp_list_comments() for displaying the comments.

 *

 * @since Quotient 1.0

 */

function quotient_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;

	switch ( $comment->comment_type ) :

		case '' :

	?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

		<div id="comment-<?php comment_ID(); ?>">

		<div class="comment-author vcard">

			<?php echo get_avatar( $comment, 40 ); ?>

			<?php printf( __( '%s <span class="says">says:</span>', 'quotient' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>

		</div><!-- .comment-author .vcard -->

		<?php if ( $comment->comment_approved == '0' ) : ?>

			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'quotient' ); ?></em>

			<br />

		<?php endif; ?>



		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">

			<?php

				/* translators: 1: date, 2: time */

				printf( __( '%1$s at %2$s', 'quotient' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'quotient' ), ' ' );

			?>

		</div><!-- .comment-meta .commentmetadata -->



		<div class="comment-body"><?php comment_text(); ?></div>



		<div class="reply">

			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

		</div><!-- .reply -->

	</div><!-- #comment-##  -->



	<?php

			break;

		case 'pingback'  :

		case 'trackback' :

	?>

	<li class="post pingback">

		<p><?php _e( 'Pingback:', 'quotient' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'quotient' ), ' ' ); ?></p>

	<?php

			break;

	endswitch;

}

endif;



/**

 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.

 *

 * To override quotient_widgets_init() in a child theme, remove the action hook and add your own

 * function tied to the init hook.

 *

 * @since Quotient 1.0

 * @uses register_sidebar

 */

function quotient_widgets_init() {

	// Area 1, located at the top of the sidebar.

	register_sidebar( array(

		'name' => __( 'Primary Widget Area', 'quotient' ),

		'id' => 'primary-widget-area',

		'description' => __( 'The primary widget area', 'quotient' ),

		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',

		'after_widget' => '</li>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	) );



	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.

	register_sidebar( array(

		'name' => __( 'Secondary Widget Area', 'quotient' ),

		'id' => 'secondary-widget-area',

		'description' => __( 'The secondary widget area', 'quotient' ),

		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',

		'after_widget' => '</li>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	) );



	// Area 3, located in the footer. Empty by default.

	register_sidebar( array(

		'name' => __( 'First Footer Widget Area', 'quotient' ),

		'id' => 'first-footer-widget-area',

		'description' => __( 'The first footer widget area', 'quotient' ),

		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',

		'after_widget' => '</li>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	) );



	// Area 4, located in the footer. Empty by default.

	register_sidebar( array(

		'name' => __( 'Second Footer Widget Area', 'quotient' ),

		'id' => 'second-footer-widget-area',

		'description' => __( 'The second footer widget area', 'quotient' ),

		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',

		'after_widget' => '</li>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	) );



	// Area 5, located in the footer. Empty by default.

	register_sidebar( array(

		'name' => __( 'Third Footer Widget Area', 'quotient' ),

		'id' => 'third-footer-widget-area',

		'description' => __( 'The third footer widget area', 'quotient' ),

		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',

		'after_widget' => '</li>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	) );



	// Area 6, located in the footer. Empty by default.

	register_sidebar( array(

		'name' => __( 'Fourth Footer Widget Area', 'quotient' ),

		'id' => 'fourth-footer-widget-area',

		'description' => __( 'The fourth footer widget area', 'quotient' ),

		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',

		'after_widget' => '</li>',

		'before_title' => '<h3 class="widget-title">',

		'after_title' => '</h3>',

	) );

}

/** Register sidebars by running quotient_widgets_init() on the widgets_init hook. */

add_action( 'widgets_init', 'quotient_widgets_init' );



/**

 * Removes the default styles that are packaged with the Recent Comments widget.

 *

 * To override this in a child theme, remove the filter and optionally add your own

 * function tied to the widgets_init action hook.

 *

 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1

 * to remove the default style. Using Quotient 1.2 in WordPress 3.0 will show the styles,

 * but they won't have any effect on the widget in default Quotient styling.

 *

 * @since Quotient 1.0

 */

function quotient_remove_recent_comments_style() {

	add_filter( 'show_recent_comments_widget_style', '__return_false' );

}

add_action( 'widgets_init', 'quotient_remove_recent_comments_style' );



if ( ! function_exists( 'quotient_posted_on' ) ) :

/**

 * Prints HTML with meta information for the current post-date/time and author.

 *

 * @since Quotient 1.0

 */

function quotient_posted_on() {

	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'quotient' ),

		'meta-prep meta-prep-author',

		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',

			get_permalink(),

			esc_attr( get_the_time() ),

			get_the_date()

		),

		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',

			get_author_posts_url( get_the_author_meta( 'ID' ) ),

			esc_attr( sprintf( __( 'View all posts by %s', 'quotient' ), get_the_author() ) ),

			get_the_author()

		)

	);

}

endif;



if ( ! function_exists( 'quotient_posted_in' ) ) :

/**

 * Prints HTML with meta information for the current post (category, tags and permalink).

 *

 * @since Quotient 1.0

 */

function quotient_posted_in() {

	// Retrieves tag list of current post, separated by commas.

	$tag_list = get_the_tag_list( '', ', ' );

	if ( $tag_list ) {

		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'quotient' );

	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {

		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'quotient' );

	} else {

		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'quotient' );

	}

	// Prints the string, replacing the placeholders.

	printf(

		$posted_in,

		get_the_category_list( ', ' ),

		$tag_list,

		get_permalink(),

		the_title_attribute( 'echo=0' )

	);

}

endif;



/*

Clincial Trails Custom Post Type

*/





// Add Image Button Taxomoanies



/*add_action( 'init', 'create_clinicaltrial' );

function create_clinicaltrial() {



 $labels = array(

    'name'                          => 'Clinical Trial Categories',

    'singular_name'                 => 'Clinical Trial Category',

    'search_items'                  => 'Search Clinical Trial Categories',

    'popular_items'                 => 'Popular Clinical Trial Categories',

    'all_items'                     => 'All Clinical Trial Categories',

    'parent_item'                   => 'Parent Clinical Trial Categories',

    'edit_item'                     => 'Edit Clinical Trial Categories',

    'update_item'                   => 'Update Clinical Trial Categories',

    'add_new_item'                  => 'Add New Clinical Trial Category',

    'new_item_name'                 => 'New Clinical Trial Category',

    'separate_items_with_commas'    => 'Separate Clinical Trial Categories with commas',

    'add_or_remove_items'           => 'Add or remove Clinical Trial Categories',

    'choose_from_most_used'         => 'Choose from most used Clinical Trial Categories'

    );



$args = array(

    'label'                         => 'clinicaltrialcategories',

    'labels'                        => $labels,

    'public'                        => true,

    'hierarchical'                  => true,

    'show_ui'                       => true,

    'show_in_nav_menus'             => true,

    'args'                          => array( 'orderby' => 'term_order' ),

    'rewrite'                       => array( 'slug' => 'clinicaltrialcategories', 'with_front' => false),

    'query_var'                     => true

);



register_taxonomy( 'clinicaltrialcategories', 'clinicaltrial', $args );

}





add_action( 'init', 'clinical_create_post_type' );

function clinical_create_post_type() {

	register_post_type( 'clinicaltrial',

		array(

            'labels' => array(

                'name' => __( 'Clinical Trials' ),

                'singular_name' => __( 'Clinical Trial' ),

                'add_new' => __( 'Add New Clinical Trial' ),

                'add_new_item' => __( 'Add New Clinical Trial' ),

                'edit_item' => __( 'Edit Clinical Trial' ),

                'new_item' => __( 'Add New Clinical Trial' ),

 		'view_item' => __( 'View Clinical Trial' ),

                'search_items' => __( 'Search Clinical Trial' ),

                'not_found' => __( 'No Clinical Trial found' ),

                'not_found_in_trash' => __( 'No Clinical Trial found in trash' )

            ),

		'public' => true,

		'has_archive' => true,

		'rewrite' => array("slug" => "clinicaltrial"), // Permalinks format

		'supports' => array('title','thumbnail', 'editor','excerpt','custom-fields')

    ));

}



function clinical_excerpt($num) {



     echo utf8_encode(substr(get_the_excerpt(), 0, $num+1)) ."...";



}*/

/*

*/

function dimox_breadcrumbs() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
 
  } else {
 
    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
} // end dimox_breadcrumbs()

function filter_where($where = '') {
	if ( is_search() ) {
		$exclude = array(148,218,337,339);	

		for($x=0;$x<count($exclude);$x++){
		  $where .= " AND ID != ".$exclude[$x];
		}
	}
	return $where;
}
add_filter('posts_where', 'filter_where');

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Blue Uppercase',  
			'inline' => 'span',  
			'classes' => 'blueup',
			'wrapper' => true,
		),
		array(  
			'title' => 'Completed Study',  
			'inline' => 'span',  
			'classes' => 'completedstudy',
			'wrapper' => true,
		),
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 