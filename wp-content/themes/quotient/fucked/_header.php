<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Quotient
 * @since Quotient 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php if ( is_page('check-your-eligibility') ) { ?>
<meta http-equiv="pragma" content="no-cache" />
<?php } else { ?>
<?php } ?>
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'quotient' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="/wp-content/themes/quotient/scripts/bvalidator.css" />
<link rel="stylesheet" type="text/css" href="/wp-content/themes/quotient/scripts/bvalidator.theme.gray2.css" />
<link rel="stylesheet" type="text/css" href="/wp-content/themes/quotient/scripts/messi.css" />
<link rel="stylesheet" href="/wp-content/themes/quotient/scripts/cookiecuttr.css">
<link rel="icon" href="/wp-content/themes/quotient/images/favicon.ico" type="image/x-icon" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="/wp-content/themes/quotient/scripts/jquery.bxSlider.min.js"></script>
<script src="/wp-content/themes/quotient/scripts/jquery.fontsize.js"></script>
<script src="/wp-content/themes/quotient/scripts/jquery.cookie.js"></script>
<script src="/wp-content/themes/quotient/scripts/jquery.cookiecuttr.js"></script>
<script src="/wp-content/themes/quotient/scripts/date.js"></script>
<!--[if IE 7]>
<script type="text/javascript" src="/wp-content/themes/quotient/scripts/jquery.bgiframe.js"></script>
<link rel="stylesheet" type="text/css" href="/wp-content/themes/quotient/ie7.css" />
<![endif]-->
<script src="/wp-content/themes/quotient/scripts/jquery.datePicker.js"></script>
<script src="/wp-content/themes/quotient/scripts/custom-form-elements.js"></script>
<script src="/wp-content/themes/quotient/scripts/html5placeholder.jquery.min.js"></script>
<script src="/wp-content/themes/quotient/scripts/jquery.bvalidator-yc.js"></script>
<script src="/wp-content/themes/quotient/scripts/form.errors.js"></script>
<script src="/wp-content/themes/quotient/scripts/showhide.js"></script>
<script src="/wp-content/themes/quotient/scripts/messi.min.js"></script>
<script src="/wp-content/themes/quotient/scripts/bmicalc.js"></script>
<script>
	$(function(){
	  $('input[placeholder]').placeholder({
	   color: '#000000'
	  });
	});
</script>
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
	$(document).click(function() {
		$.cookie("cc_cookie_accept", "cc_cookie_accept", {
                    expires: 365,
                    path: '/'
                });
		$(".cc-cookies").hide();
	});
	$(".cc-cookies").click(function(e) {
		$.cookie("cc_cookie_accept", "cc_cookie_accept", {
                    expires: 365,
                    path: '/'
                });
		e.stopPropogation();
	});
});
</script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

<!-- Facebook Conversion Code for Applications -->
<script>(function() {
var _fbq = window._fbq || (window._fbq = []);
if (!_fbq.loaded) {
var fbds = document.createElement('script');
fbds.async = true;
fbds.src = '//connect.facebook.net/en_US/fbds.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(fbds, s);
_fbq.loaded = true;
}
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6015361387723', {'value':'0.01','currency':'GBP'}]);
</script>

<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6015361387723&amp;cd[value]=0.01&amp;cd[currency]=GBP&amp;noscript=1" /></noscript>

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

<?php if (is_page(337)) { ?>
<script type="text/javascript">
var fb_param = {};
fb_param.pixel_id = '6007977105402';
fb_param.value = '0.00';
(function(){
  var fpw = document.createElement('script');
  fpw.async = true;
  fpw.src = '//connect.facebook.net/en_US/fp.js';
  var ref = document.getElementsByTagName('script')[0];
  ref.parentNode.insertBefore(fpw, ref);
})();
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6007977105402&amp;value=0" /></noscript>
<?php } ?>

<style type="text/css">
	#enquiries .col.add {
		width: 130px;
		padding-top: 0;
		position: relative;
		top: -35px;
	}
	#enquiries #right {
		margin-left: 15px;
	}
	#hear-mobile {
		display: none;
	}
	@media screen and (max-device-width: 480px), screen and (max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2) {
		#hear-mobile {
			display: block;
		}
	}
</style>

</head>

<body <?php body_class(); ?>>

<!-- FROM HERE -->

<img src="/wp-content/themes/quotient/images/cloud-bg.png" alt="bg" class="bg" />

	<div id="header">
		<div id="masthead">
			<div id="branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				
				<div class="header-top">
					<div class="header-nav">
						<div class="header-tel"><span class="tel">Tel: 0115 974 9000</span> <a href="http://www.weneedyou.co.uk/quotient-tv/">Quotient TV</a> <a href="http://www.weneedyou.co.uk/blog/">Blog</a> <a href="http://www.weneedyou.co.uk/contact-us/">Find Us</a></div>
						<div class="header-social">
							<div class="social-images">
								<a href="http://www.youtube.com/user/quotientweneedyou" target="_blank"><img src="/wp-content/themes/quotient/images/header-youtube.png" alt="Youtube" /></a>
								<a href="http://www.facebook.com/quotientclinical" target="_blank"><img src="/wp-content/themes/quotient/images/header-facebook.png" alt="Facebook" /></a>
								<a href="https://twitter.com/Quotientnotts" target="_blank"><img src="/wp-content/themes/quotient/images/header-twitter.png" alt="Twitter" /></a>
								<a href="mailto:nottingham@quotientclinical.com" target="_blank"><img src="/wp-content/themes/quotient/images/header-mail.png" alt="Mail" /></a>
								<!--<a href="http://www.youtube.com/user/quotientweneedyou" target="_blank"><img src="/wp-content/themes/quotient/images/header-youtube.png" alt="Youtube" /></a>
								
								<img src="/wp-content/themes/quotient/images/header-addthis.png" style="padding-right: 1px;" alt="Social" />-->
							<!--	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-546cf5275e22113a" async="async"></script>
								<div class="addthis_sharing_toolbox"></div> -->
									<!-- Go to www.addthis.com/dashboard to customize your tools -->
									<!-- Go to www.addthis.com/dashboard to customize your tools -->
									<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-538672c13cc52ebc" async="async"></script>
									<div class="addthis_sharing_toolbox"></div> 
							</div>
						</div>
					</div>
				</div>
				
				<div class="header-bottom">
					<div class="h-left">
						<div class="title-big"><span>Welcome to</span> Quotient Clinical</div><br>
						<span class="sub-head">You can help us to develop medicines of the future</span>
					</div>
					
					<div class="h-right">
						<div class="head-search">
							
						</div>
					</div>
				</div>	

<!-- TO HERE -->
				
                
                <div id="header-search">
                	<div id="search">
						<?php get_search_form(); ?> 
                    </div><!-- /search -->
                    <div class="fontResizer">
                         <ul class="resizer">
                         <li class="small"><a href="#">A-</a></li>
                         <li class="medium"><a href="#">A</a></li>
                         <li class="large"><a href="#">A+</a></li>
                        </ul>  
                    </div><!-- /fontresizer -->
                </div><!-- /header-search -->

			</div><!-- #branding -->
		</div><!-- #masthead -->
	</div><!-- #header -->
<div class="clear"> </div>
<div id="wrapper" class="hfeed">

	<div id="main">