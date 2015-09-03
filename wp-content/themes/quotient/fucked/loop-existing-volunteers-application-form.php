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

// This is found on https://www.weneedyou.co.uk/our-current-clinical-trials/

 session_start();
 require_once "scaptcha.php";

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
                    	<div class="col register">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'quotient' ), 'after' => '</div>' ) ); ?>
                        </div><!-- /register -->
                        <div id="application-form" class="register-form">
						<script type="text/javascript" charset="utf-8">
                            $(function()
                            {
                                $('.date-pick').datePicker({
								autoFocusNextInput: true,
								startDate: (new Date().addYears(-80)).asString(),
								endDate: (new Date().addYears(-18)).asString()
								});
$('.dp-choose-date').click(function() {
  $('input[name=dob]').removeAttr('placeholder');
  bver = $.browser;
  if (bver.msie && bver.version >= 8) {
    $('[for='+$('input[name=dob]').attr('id')+']').detach();
  }
});


                            });
                        </script>
                        
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

$('input[type=radio]').css('visibility','visible');
$('input[type=radio]').blur(function() {  $('span',$(this).parent()).css('border','');  });
$('input[type=radio]').focus(function() {  $('span',$(this).parent()).css('border','solid 1px orange');  });

									// note that order of these lines is important 
									$('#existingappform').bValidator(options12); // first instance 
									$('#existingappform').bValidator(optionsWarning12, 'secondInstance'); // second instance 
									});
						</script>
                        
                        <div id="existingapp">
                        	<form id="existingappform" method="post" action="http://weneedyou.co.uk/form-email-script/existform-to-email.php" novalidate>
				<label><strong>Clinical Trial: <?php echo $_POST['trialname']; ?></strong></label><br/>
			    	<input type="hidden" name="clinicaltrial" value="<?php echo $_POST['trialname']; ?>">
<br /><br />
                                <select name="title" class="styled" data-bvalidator="required" data-bvalidator-msg="Please provide your<br>title.">
                                	<option value="">Title (Mr/Ms)*</option>
                                    <option value="mr">Mr</option>
                                    <option value="mrs">Mrs</option>
                                    <option value="ms">Ms</option>
                                    <option value="miss">Miss</option>
                                </select>
                                <input name="firstname" value="" placeholder="First name*" class="" type="text" data-bvalidator="required" data-bvalidator-msg="Please provide your<br>first name."><br />
                                <input name="middlename" value="" placeholder="Middle name" type="text"> 
                                <input name="lastname" value="" placeholder="Last name*" class="" type="text" data-bvalidator="required" data-bvalidator-msg="Please provide your<br>last name."><br />
								<label class="blue" style="float: left;">Date of birth*</label>
								<!--<input name="dob" class="date-pick" placeholder="dd/mm/yyyy" type="text" data-bvalidator="required" data-bvalidator-msg="Please provide your date of birth."><br />-->


								<!--  

New Dates Implemented Here


 -->

 <div id="date_fields" style="clear: left; width: 100%; position: relative; top: 5px;">

 <select name="dob_day" data-bvalidator="number,required" data-bvalidator-msg="Please select your day of birth">
  <option value="">Day</option>
  <?for($day=1; $day <= 31; ++$day):?>
    <?
                //this code is adding a 0 before all values less than 10
                //you don't need this code, but I prefer to have 2 digit values
    if($day < 10)
    {
      $day = "0".$day;
    }
    ?>
    <option value="<?=$day?>"><?=$day?></option>
  <?endfor;?>
</select>
<select name="dob_month" data-bvalidator="number,required" data-bvalidator-msg="Please select your month of birth">
    <option value="">Month</option>
  <?for($month=1; $month <= 12; ++$month):?>
    <?
                //this code is adding a 0 before all values less than 10
                //you don't need this code, but I prefer to have 2 digit values
    if($month < 10)
    {
      $month = "0".$month;
    }
    ?>
    <option value="<?=$month?>"><?=$month?></option>
  <?endfor;?>
</select>
<select name="dob_year" data-bvalidator="number,required" data-bvalidator-msg="Please select your year of birth">
    <option value="">Year</option>
  <?
  $year = date("Y") - 80; // take initial back 80 years
  for ($i = 0; $i <= 80 - 18; ++$i) // take 18 off so current age is always going to 18 or above
  {
    echo "<option>$year</option>"; ++$year;
  }
  ?>
</select>

</div> <!-- end of date_fields -->

								<input style="padding-left: 2px;" name="email" value="" type="email" placeholder="Email address*" class="lrg" data-bvalidator="required" data-bvalidator-msg="Please provide a valid email address."><br />
                                <input type="text" name="volnumber" value="" placeholder="Volunteer Number" class="lrg"><br />

<script>
function checkCaptcha(answer) {

	$('input[name=Submit]').attr('disabled','disabled');
	$.get('/form-email-script/scaptcha-check.php?answer='+answer,function(html) {
 		if (html != 'SUCCESS') {
		  alert('Answer Incorrect, please try again');
		} else {
		  $('input[name=Submit]').removeAttr('disabled');
		}
	});
}
</script>                            
<?php  
  echo "Please complete the following question to proceed. This helps us prevent spam.<br><br>";
  echo $_SESSION['sentence']." ".$_SESSION['num1']." ".$_SESSION['operand']." ".$_SESSION['num2']." ? ";
  echo "<input data-bvalidator=\"required\" data-bvalidator-msg=\"This field is required\" type='text' name='answer' id='answer' size='5' onkeyup=\"checkCaptcha(this.value);\"/><br>";
?>


                                <input type="submit" name="Submit" disabled="disabled" value="Submit" onClick="_gaq.push(['_trackEvent', 'Existing Volunteers Form', 'Click', 'Submit button']);" />
                            </form>
						</div><!-- /existingapp -->
                        </div><!-- /application-form -->
                        
                        <div class="clear"></div>
                        
						<?php edit_post_link( __( 'Edit', 'quotient' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->
				<?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>