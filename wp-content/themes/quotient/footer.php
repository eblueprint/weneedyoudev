<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Quotient
 * @since Quotient 1.0
 */
?>
	</div><!-- #main -->
<div class="clear"></div>
</div><!-- #wrapper -->

    

	<div id="footer" role="contentinfo">
		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

			<div id="site-info">
				<a href=""><img src="/wp-content/themes/quotient/images/logo-footer.png" alt="footer logo" /></a>
			</div><!-- #site-info -->

			<div class="footer-right">
			<div id="site-generator">
				<div id="left">
					<strong><span style="font-size: 12px;">Address: </span><span style="color:white; font-size: 12px;">Quotient Clinical, Mere Way, Ruddington Fields, Ruddington, Nottingham, NG11 6JS</span></strong><br>
                    <strong><span style="font-size: 12px;">Tel:</span><span style="color:white; font-size: 12px; padding-right: 25px;"> 0115 974 9000</span></strong>
                    <strong><span style="font-size: 12px;">Email: <a href="mailto:nottingham@quotientclinical.com"><span style="color:white; font-size: 12px;">nottingham@quotientclinical.com</a></span></strong>
                </div><!-- /left -->
                
			</div><!-- #site-generator -->
				
                <div class="clear"> </div>
                
			<div id="attention">
            	<p>This legal notice applies to the entire contents of the Website under the domain name www.weneedyou.co.uk (Website) and to any correspondence by e-mail between us and you. Please read these terms carefully before using the Website. Using the Website indicates that you accept these terms regardless of whether or not you choose to register with us. If you do not accept these terms, do not use the Website. This notice is issued by Quotient Clinical Limited (Company). <a href="/terms-and-conditions/">Terms &amp; Conditions</a> | <a href="/privacy-policy/">Privacy Policy</a></p>
            </div><!-- /attention -->
			</div>

		</div><!-- #colophon -->
	</div><!-- #footer -->


<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>

<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1003323704;
var google_conversion_label = "9PDnCMCtuAQQuIK23gM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1003323704/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

</body>
</html>
