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

 session_start();
 require_once "scaptcha.php";

?>
<?php
$custom = get_post_custom($post->ID);
$mobilecontent = $custom["wpcf-mobile-content"][0];
?>
<?php
/* @Recreate the default filters on the_content
-------------------------------------------------------------- */
add_filter( 'meta_content', 'wptexturize'        );
add_filter( 'meta_content', 'convert_smilies'    );
add_filter( 'meta_content', 'convert_chars'      );
add_filter( 'meta_content', 'wpautop'            );
add_filter( 'meta_content', 'shortcode_unautop'  );
add_filter( 'meta_content', 'prepend_attachment' );
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php if ( $mobilecontent ) { ?>
							<?php echo apply_filters('meta_content',$mobilecontent); ?>
						<?php } else { ?>
							<?php the_content(); ?>
						<?php } ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'quotient-mobile' ), 'after' => '</div>' ) ); ?>
                        
                        <div id="application-form">
                        <script type="text/javascript">
							// options for first instance 
							var options12 = { 
								classNamePrefix: 'bvalidator_gray2_' }; 
							// options for second instance (for warning messages) 
							var optionsWarning12 = { 
								errorMessageAttr: 'data-bvalidator-warning-msg', 
								validateActionsAttr: 'data-bvalidator-warning', 
								classNamePrefix: 'bvalidator_gray2_', 
								position: {x:'right', y:'center'}, 
								offset: {x:15, y:0}, 
								template: '<div class="{errMsgClass}"><div class="bvalidator_gray2_arrow"></div><div class="bvalidator_gray2_cont1">{message}</div></div>', 
								hideMsgIfExistsForInstance: ['first'], 
								validateOn: 'keyup', 
								validateOnSubmit: false }; 
								
								$(document).ready(function () { 


$('select[name=hear]').focus();
$('input[type=radio]').css('visibility','visible');
$('input[type=radio]').blur(function() {  $('span',$(this).parent()).css('border','');  });
$('input[type=radio]').focus(function() {  $('span',$(this).parent()).css('border','solid 1px orange');  });

$('input[type=checkbox]').css('visibility','visible');
$('input[type=checkbox]').blur(function() {  $('span',$(this).parent()).css('border','');  });
$('input[type=checkbox]').focus(function() {  $('span',$(this).parent()).css('border','solid 1px orange');  });

									// note that order of these lines is important 
									$('#quickapp').bValidator(options12); // first instance 
									$('#quickapp').bValidator(optionsWarning12, 'secondInstance'); // second instance 
									});
						</script>
						<div class="clear"> </div>
                        	<form id="quickapp" method="post" action="http://www.weneedyou.co.uk/form-email-script/qform-to-email.php" novalidate>
                           	<ul>
                            
                                <?php $congratseli = $_POST['congratseli']; ?>
                                <?php if ( $congratseli ) { ?>
                                Congratulations! You're eligible to apply to join our Quotient volunteer panel. If you haven't got time to complete our full application now, tell us a few details about yourself to get the ball rolling; there's no need to repeat information you've already told us – just fill in the gaps. 
If it's easier, we can get someone to contact you by phone to complete your application. Just leave your contact details below. 
                                <?php } ?>
                                                            
                                <label>
                                <?php $trialname = $_POST['trialname']; ?>
                                <?php if ( $trialname ) { ?>
                                Clinical Trial: <?php echo $_POST['trialname']; ?>
                                <?php } ?>
                                </label><br/>
			    	
							<br />
                                <select name="hear" value="" class="styled" id="select-hear">
                                	<option value="">Where did you hear about us?</option>
									<option value="television">Television</option>
                                    <option value="radio">Radio</option>
                                    <option value="online">Online</option>
                                    <option value="washroom">Washroom</option>
                                    <option value="directmail">Direct mail</option>
                                    <option value="buses">Buses</option>
                                    <option value="email">Email</option>
                                    <option value="newspaper">Newspaper</option>
                                    <option value="recommendation">Recommendation</option>
                                    <option value="other">Other</option>
                                </select>
                               
								<br /><br />
								<div id="hear1" style="display:none;" >
                                <label class="blue">Please specify</label>
                                <input name="hearother"  type="text" placeholder="" value=""/>
                                
                                </div><!-- /hear-other-input -->
                                
                                
								<div id="hear2" style="display:none;">
                                <label class="blue">Please tell us who recommended you</label>
                                <input name="hearrec" type="text" placeholder="" value=""/>
                                
                                </div><!-- /hear-other-input -->
                                <li>
				<div>
                <label>Gender*</label><br />
				<?php $gender = $_POST["gender"];?>
				<p id="gender-male"><input name="gender" value="Male" type="radio" class="styled" <?php if ($gender == Male) echo 'checked'; ?> /> <label for="male">Male</label></p>
				<?php $gender = $_POST["gender"];?>
				<p id="gender-female"> <input name="gender" value="Female" type="radio" class="styled" <?php if ($gender == Female) echo 'checked'; ?> data-bvalidator="required" data-bvalidator-msg="Please select either<br />male or female." /> <label for="female">Female</label></p>
				</div><!-- /gender -->
                <div style="clear: both; display:none;" id="pregnant">
				<label>Are you pregnant or breastfeeding?*</label><span id="inlinepregerror" style="display:none;margin-left: 5px;color:red;">We only accept women who are not pregnant and are not breastfeeding.</span><br />
				<?php $pregnant = $_POST["pregnant"];?>
                <p id="preg-yes"><input name="pregnant" id="qpregyes" value="Yes" type="radio" class="styled" <?php if ($pregnant == Yes) echo 'checked'; ?>> <label for="yes">Yes</label></p>
				<?php $pregnant = $_POST["pregnant"];?>
                <p id="preg-no"><input name="pregnant" id="qpregno" value="No" type="radio" class="styled" <?php if ($pregnant == No) echo 'checked'; ?>> <label for="no">No</label></p>
                </div><!-- /pregnant -->
				<div class="clear"> </div>
                                </li>
                                
                                <li id="dob">
                                <label class="blue">Date of birth*</label>
                                <input name="dob" class="date-pick" placeholder="dd/mm/yyyy" type="text" data-bvalidator="required" data-bvalidator-msg="Please enter your date of birth." />
                                </li>
                                 
                                <li>       
								<div class="column">
                                <select name="title" value="" class="styled" id="title" data-bvalidator="required" data-bvalidator-msg="Please select<br>your title.">
                                	<option value="">Salutation (Mr/Ms)*</option>
                                    <option value="mr">Mr</option>
                                    <option value="mrs">Mrs</option>
                                    <option value="ms">Ms</option>
                                </select>
                                <input name="firstname" value="" placeholder="First name*" class="" type="text" data-bvalidator="required" data-bvalidator-msg="Please provide your first name." /><br />
                                <input name="middlename" value="" placeholder="Middle name" type="text"> 
                                <input name="lastname" value="" placeholder="Last name*" class="" type="text" data-bvalidator="required" data-bvalidator-msg="Please provide your last name."><br />
                                <input name="email" value="" type="email" placeholder="Email address" class="lrg" /><br />
                                <input name="contactnumber" value="" placeholder="Preferred contact number*" type="text" class="lrg" data-bvalidator="digit,required" data-bvalidator-warning="digit" data-bvalidator-warning-msg="Please provide your contact number as numbers only." ><br />
                                </div><!-- left -->
                                <div class="column">
                                <input name="address1" value="" placeholder="Address line 1*" type="text" class="lrg" data-bvalidator="required" data-bvalidator-msg="Please enter the first<br>line of your address."><br />
                                <input name="address2" value="" placeholder="Address line 2" type="text" class="lrg"><br />
                                <input name="town" value="" placeholder="Address line 3" type="text" class="lrg"><br />
                                <input name="city" value="" placeholder="City" type="text" class="lrg"><br />
                                <input name="postcode" value="" placeholder="Postcode*" type="text" class="lrg" data-bvalidator="required" data-bvalidator-msg="Please enter your postcode."><br />
                                </div><!-- /right -->
								<div class="clear"> </div>
                                <br />
                                <div>
                           		<label style="float: left; width: 150px;">Would you like to sign up to our study alerts?</label> <p style="float: right; width: auto"><input name="newsletter" value="Yes" type="checkbox" class="styled" /></p>
                
               				<div class="clear"> </div>
                            
                           		<label style="float: left; width: 150px;">Would you like someone to ring you back and complete a full application form over the phone?</label> <p style="float: right; width: auto;"><input name="callback" value="Yes" type="checkbox" class="styled" /></p>
                
               				<div class="clear"> </div>
<br />
</div>

<script>
function checkCaptcha(answer) {

	$('input[name=submit]').attr('disabled','disabled');
	$.ajaxSetup({ cache: false });
	var question='<?php echo urlencode($_SESSION['num1']." ".$_SESSION['operand']." ".$_SESSION['num2']);?>';
	$.get('/form-email-script/scaptcha-check.php?question='+question+'&answer='+answer,function(html) {		
 		if (html != 'SUCCESS') {
		  alert('Answer Incorrect, please try again');
		} else {
		  $('input[name=submit]').removeAttr('disabled');
		}
	});
}
</script>                            
<?php  
  echo "Please complete the following question to proceed. This helps us prevent spam.<br><br>";
  echo $_SESSION['sentence']." ".$_SESSION['num1']." ".$_SESSION['operand']." ".$_SESSION['num2']." ? ";
  echo "<input data-bvalidator=\"required\" data-bvalidator-msg=\"This field is required\" type='text' name='answer' id='answer' size='5' onChange=\"checkCaptcha(this.value);\"/><br>";
?>


<input type="submit" value="Submit Quick Application Form " style="cursor:hand;" onClick="_gaq.push(['_trackEvent', 'Quick Application Form Submit', 'Click', 'Submit button']);"><br />
&nbsp;or you can progress to&nbsp;<br />
<input type="button" value="Continue to Full Application Form" onClick="this.form.action='/apply-now/application-form/';this.form.submit();_gaq.push(['_trackEvent', 'Quick Application Form Continue to Full Application', 'Click', 'Submit button']);">  
                                </li>
                            </ul>    
                            </form> 
                        </div><!-- /application-form -->
                        
						<?php edit_post_link( __( 'Edit', 'quotient-mobile' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->
				<?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>