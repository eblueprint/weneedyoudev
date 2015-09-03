<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package quotient-mobile
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="icon" href="/wp-content/themes/quotient/images/favicon.ico" type="image/x-icon" />
<?php wp_head(); ?>

<link rel="stylesheet" href="/wp-content/themes/quotient/scripts/cookiecuttr.css">
<script src="/wp-content/themes/quotient/scripts/jquery.cookie.js"></script>
<script src="/wp-content/themes/quotient/scripts/jquery.cookiecuttr.js"></script>
<script type="text/javascript">
jQuery(function ($) {
	$(document).ready(function () {

	$.cookieCuttr({
		cookieAnalytics: false,
		cookieAcceptButton: false,
		cookieMessage: 'We use cookies on this website. Some of the cookies we use are essential for parts of the site to operate and have already been set. You may delete and block all cookies from this site if you wish. By continuing to use our website without changing your settings, you are agreeing to our use of cookies. Please see our <a href="{{cookiePolicyLink}}" title="read about our cookies">Privacy Policy</a> for more information.',
		cookiePolicyLink: '/privacy-policy/'
	});
	}); 
});
</script>
<script type="text/javascript">
jQuery(function ($) {
	$(document).on('click touchstart touchend touchmove mousemove dblclick', function() {
		$.cookie("cc_cookie_accept", "cc_cookie_accept", {
                    expires: 365,
                    path: '/'
                });
		$(".cc-cookies").hide();
	});
	$(".cc-cookies").on('click touchstart touchend touchmove mousemove dblclick', function(e) {
		$.cookie("cc_cookie_accept", "cc_cookie_accept", {
                    expires: 365,
                    path: '/'
                });
		e.stopPropogation();
	});
});
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20299038-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();


</script>

</head>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-547deceb167cab2b" async="async"></script> 

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<a href="/"><div class="site-branding">
			<h1 class="site-title">Welcome to<span> Quotient Clinical<span></h1>
			<h2>You can help us to develop medicines of the future</h2>
		</div></a>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h1 class="menu-toggle">Menu</h1>
			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'quotient-mobile' ); ?>"><?php _e( 'Skip to content', 'quotient-mobile' ); ?></a></div>

			<?php wp_nav_menu( array('menu' => 'Mobile menu' )); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="main" class="site-main">
