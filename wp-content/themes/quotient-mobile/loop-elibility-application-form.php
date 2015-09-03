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
<script type="text/javascript">

var pregnant = false;
var urine = '';
var sex = '';
var bmi1 = 0;
var bmi0 = 0; 
var bmi2 = 0;
var unitspw = 0;
var checked = false;
$(document).ready(function(){

  $('input[type=radio]').css('visibility','visible');
  $('input[type=radio]').blur(function() {  $('span',$(this).parent()).css('border','');  });
  $('input[type=radio]').focus(function() {  $('span',$(this).parent()).css('border','solid 1px orange');  });

$('input[type=checkbox]').css('visibility','visible');
$('input[type=checkbox]').blur(function() {  $('span',$(this).parent()).css('border','');  });
$('input[type=checkbox]').focus(function() {  $('span',$(this).parent()).css('border','solid 1px orange');  });

  $("#continuebuttons1").hide();
  $("#continuebuttons2").hide();
  $("#continuebuttons3").hide();
  $("#status").hide();
  $("#submit").hide();
  $("#noteligible").hide();  
  
  $("#checkbutton").click(function() {
      checked = true;
      $(this).hide();
      validateForm();
  });

  $("#gender-male").click(function(event){
    sex='m';
    $("#unit14").hide();
    $("#unit20f").hide();
    $("#unit20").show();
    validateForm();
  });

  $("#gender-female").click(function(event){
    sex='f';
    $("#unit14").show();
    $("#unit20f").show();
    $("#unit20").hide();
    validateForm();
  });

  $("#pregyes").click(function(event){ 
    pregnant = true;
    validateForm();
  });

  $("#pregno").click(function(event){
    pregnant = false;
    validateForm();
  });

  $('#alcohol-no,#alcohol-yes,#units').click( function(event){
    validateForm();
  });

  $("#smokeamount-10,#smokeamount-11,#smokeamount-quit,#smokeamount-never").click(function(event){
    validateForm();
  });


  $("#bmipress").click(function(event){
    validateForm();
  });

  $("#metpress").click(function(event){
    validateForm();
  });

  $("#urineno").click(function(event){
    urine = false;
    validateForm();
  });

  $("#urineyes").click(function(event){
    urine = true;
    validateForm();
  });

});


function validateForm() {

eligible = true;

bmi1 = document.getElementById("bmiresult").value
bmi0 = document.getElementById("metresult").value
bmi2 = document.getElementById("bmiknown").value
alcohol = $('input[name=alcohol]:checked').val();
unitspw = 0;
if (alcohol == 'Yes') {
  unitspw = $('#units').val();
}

smokepd = $('input[name=smokeamount]:checked').val();
if (smokepd > 10 ){
  eligible = false;
  $("#noteligiblesmoke").css('color','red');
  $("#noteligiblesmoke").show();
} else {
  $("#noteligiblesmoke").css('color','');
  $("#noteligiblesmoke").hide();
}


//console.log(bmi2);

if(bmi2) {

  $("#noteligiblebmi").css('color','');
  $("#noteligiblebmi").hide();



} else {

// if BMI2 doesnt have value then use this :

if ( (bmi1 ==0 || bmi1 == 'NaN') && (bmi0 == 0 || bmi0 == 'NaN') || bmi1 > 33 || bmi0 > 33 || (bmi1> 0 && bmi1 < 18) || (bmi0> 0 && bmi0 < 18)) {
  eligible = false;  
  $("#noteligiblebmi").css('color','red');
  $("#noteligiblebmi").show();
} else {
  $("#noteligiblebmi").css('color','');
  $("#noteligiblebmi").hide();
}


}


// end of use this BMI

if (sex == 'm' && unitspw > 20 || sex=='f' && unitspw >14 ){
  eligible = false;
  $("#noteligibleunits").css('color','red');
  $("#noteligibleunits").show();
} else {
  $("#noteligibleunits").css('color','');
  $("#noteligibleunits").hide();
}

if (sex=='f' && pregnant == true ) {
  eligible = false;
  $("#noteligiblepreg").css('color','red');
  $("#noteligiblepreg").show();
  $("#inlinepregerror").css('color','red');
  $("#inlinepregerror").show();
} else {
  $("#noteligiblepreg").css('color','');
  $("#noteligiblepreg").hide();
  $("#inlinepregerror").css('color','');
  $("#inlinepregerror").hide();
}

if (urine == false ) {
  $("#noteligibleurine").css('color','red');
  $("#noteligibleurine").show();
  eligible = false;
} else {
  $("#noteligibleurine").css('color','');
  $("#noteligibleurine").hide();
}

if ( sex == '') {
  eligible = false;
  $("#noteligiblesex").css('color','red');
  $("#noteligiblesex").show();
} else {
//  $("#noteligiblesex").css('color','red');
  $("#noteligiblesex").hide();
}


  if (checked) {
    if (eligible == false) {

      $("#continuebuttons2").attr('disabled','disabled');

      $("#continuebuttons1").hide();
      $("#continuebuttons2").hide(); 
      $("#continuebuttons3").hide(); 
      $("#status").hide();
      $("#submit").hide();
      $("#noteligible").show();
     } else {

      $("#continuebuttons2").removeAttr('disabled');

      $("#continuebuttons1").show();
      $("#continuebuttons2").show();
      $("#continuebuttons3").show();
      $("#status").show();
      $("#submit").show();
      $("#noteligible").hide();
    }
  }
}
</script>


<SCRIPT LANGUAGE="JavaScript">
<!--
function FigureBMI(form, feet, inches, pounds) {

 TotalInches = eval(feet*12) + eval(inches)
 Meters      = TotalInches/39.36
 Kilos       = pounds/2.2
 Square      = Meters * Meters

 form.calcval.value = Math.round(Kilos/Square)
}
// -->
</SCRIPT>

<SCRIPT LANGUAGE="JAVASCRIPT">

<!--
//Body Mass calculator- by John Scott (johnscott03@yahoo.com)
//Visit JavaScript Kit (http://javascriptkit.com) for script
//Credit must stay intact for use
function ClearForm(form){
    form.weight.value = "";
    form.height.value = "";
    form.bmi.value = "";
    form.my_comment.value = "";
}
function bmi(weight, height) {
          bmindx=weight/eval(height*height);
          return bmindx;
}
function checkform(form) {
/*
       if ( (!document.getElementById("bmiresult").value > 0  && !document.getElementById("metresult").value > 0 ) || form.weight.value==null||form.weight.value.length==0 || form.height.value==null||form.height.value.length==0){
            alert("\nPlease complete the form first");
            return false;
       }
       else if (parseFloat(form.height.value) <= 0||
                parseFloat(form.height.value) >=500||
                parseFloat(form.weight.value) <= 0||
                parseFloat(form.weight.value) >=500){
                alert("\nReally know what you're doing? \nPlease enter values again. \nWeight in kilos and \nheight in cm");
                ClearForm(form);
                return false;
       }
*/
       return true;
}
function computeform(form) {
       if (checkform(form)) {
       yourbmi=Math.round(bmi(form.weight.value, form.height.value/100));
       form.bmi.value=yourbmi;
       }
       return;
}
 // -->
</SCRIPT>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

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

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<div class="entry-content">

						<?php if ( $mobilecontent ) { ?>
							<?php echo apply_filters('meta_content',$mobilecontent); ?>
						<?php } else { ?>
							<?php the_content(); ?>
						<?php } ?>

						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'quotient' ), 'after' => '</div>' ) ); ?>

                        <div id="application-form">
                        	<form id="elibilityapp" method="post" action="">
                           	<ul>
							<li>
							<div style="display: block;">

		        <label>Gender*</label><br />

				<p id="gender-male"><input name="gender" id="immale" value="Male" type="radio" class="styled" > <label for="male">Male</label></p>

				<p id="gender-female"><input name="gender" value="Female" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Required"> <label for="female">Female</label></p>

				</div><!-- /gender -->

                <div style="display:none; clear: both;" id="pregnant">

				<label>Are you pregnant or lactating?*</label><span id="inlinepregerror" style="display:none;margin-left: 5px;">If you are pregnant or lactating then you would not be eligible to participate in our studies.</span><br />

                <p id="pregyes"><input name="pregnant" id="pregyes2" value="Yes" type="radio" class="styled"><label for="yes">Yes</label></p>

                <p id="pregno"><input name="pregnant" id="pregno2" value="No" type="radio"  class="styled"><label for="no">No</label></p>
				<div class="clear"> </div>
                </div><!-- /pregnant -->

				</li>

				<li>

				 <div class="column">

                            	<label>Body Mass (BMI) Calculator*</label><br /><br />

								<select name="bmi-metric" id="bmi-select" class="styled">

								<option value=""  >Please select</option>

                                <option value="metreskg">Metres/kg</option>

                                <option value="feetlbs">Feet/lbs</option>

                                </select>

                                <br /><br />

                                <div id="feetlbs" style="display: none;">

                                <label class="blue">Height in ft:</label> <INPUT TYPE="TEXT" NAME="feet" size="5" value="<?php echo $_POST["feet"];?>" class="sml"><br />

                                <label class="blue">and inches:</label> <INPUT TYPE="TEXT" NAME="inches" size="5" value="<?php echo $_POST["inches"];?>" class="sml"><br />

                                <label class="blue">Weight in stones:</label> 
<INPUT TYPE="TEXT" NAME="stones" size="5" value="<?php echo $_POST["stones"];?>" class="sml"><br/>
<label class="blue">and pounds:</label> 

<INPUT TYPE="TEXT" NAME="pounds" size="5" value="<?php echo $_POST["pounds"];?>" class="sml"><br />


                                <INPUT TYPE="BUTTON" id="bmipress" name="calc" value="Calculate" onClick="FigureBMI(this.form,this.form.feet.value,this.form.inches.value,(this.form.stones.value*14)+parseInt(this.form.pounds.value));validateForm();"><br/>



                                <label>Your result:</label> <INPUT TYPE="TEXT" id="bmiresult" name="calcval" value="<?php echo $_POST["calcval"];?>" readonly="readonly"><br/>
                                

                				</div><!-- /feetlbs -->


                                 <div id="metreskg" style="display: none;">

                                <label class="blue">Height in cm:</label> <INPUT TYPE=TEXT NAME=height  SIZE=10 onFocus="this.form.height.value=''"><br />

                                <label class="blue">Weight in kg:</label> <INPUT TYPE=TEXT NAME=weight  SIZE=10 onFocus="this.form.weight.value=''"><br />

                                <INPUT TYPE="button" id="metpress" VALUE="Calculate" onClick="computeform(this.form)"><br />

                                Your result: <INPUT TYPE=TEXT NAME=bmi id="metresult" SIZE=8 readonly="readonly"><br />

                                </div><!-- /metreskg -->

                                    <p class="msg">If your BMI is under 18 or over 33, typically you will be ineligible to become a volunteer on our panel.</p>

 <label style="display: none;">Know your BMI? </label> <INPUT style="display: none;" TYPE="TEXT" name="bmiknown" value="" id="bmiknown"><br/>
								</div><!-- /column -->

<div class="column">

<label>Do you smoke?*</label><br /><br />

<div id="smokes">
<p id="smokeamount-11"><input name="smokeamount" value="11" type="radio" class="styled" /><label for="11">Heavy Smoker<br>(10+ per day)</label></p>
<p id="smokeamount-10"><input name="smokeamount" value="10" type="radio" class="styled" /><label for="10">Light Smoker<br>(1-10 per day)</label></p><br clear="both">
<p id="smokeamount-quit"><input name="smokeamount" value="6" type="radio" class="styled" /><label for="quit">Quit<br>(less than six months ago)</label></p>
<p id="smokeamount-never"><input name="smokeamount" value="0" type="radio" class="styled"/> <label for="neversmoke">Never smoked<br>(or quit more than 6 months ago)</label></p>
</div>

<div class="clear"> </div>

<p class="msg">If you are a heavy smoker typically you will be ineligible to become a volunteer on our panel.</p>


<div class="clear"> </div><br />

<label>Do you drink alcohol?*</label><br />

<p id="alcohol-yes"><input name="alcohol" value="Yes" type="radio" class="styled" /> <label for="yes">Yes</label></p>

<p id="alcohol-no"><input name="alcohol" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Select at least 1 checkbox" /> <label for="no">No</label></p>

<div class="clear"> </div>

<div id="alcohol-amount" style="display: none;">

<select name="units" id="units" class="styled">

<option value="0">How many units do you drink per week?</option>

<option id="unit10" value="10">Less than 10 units per week</option>

<option id="unit14" value="14">Between 10 and 14 units a week</option>

<option id="unit20f" value="20">Between 14 and 20 units a week</option>

<option id="unit20" value="20">Between 10 and 20 units a week</option>

<option id="unit21" value="21">More than 21 units per week</option>

</select><br /><br />



<p class="msg">1 pint of beer = 2 units, 1 small glass of wine (125ml) = 1 unit</p>

<p class="msg">If you have a high weekly intake of alcohol typically you will be ineligible to become a volunteer on our panel.</p>



</div><!-- /alchol-amount -->

</div><!-- /column -->

<div class="clear"> </div>

 </li>

<li>

<p class="msg" style="font-style: italic;">In the interests of the safety of our volunteers, we cannot accept anyone on our volunteer panel that has  previously used or currently uses Class A drugs, such as ecstasy / cocaine etc. Occasional users of cannabis may be eligible.</p>

<div style="float: left; width: 260px;">

<label>Are you happy to undergo a urine test to check for non-medical drugs?*</label><br /><br />

<p id="urineyes"><input name="urinetest" id="urineyes2" value="Yes" type="radio" class="styled"> <label for="yes">Yes</label></p>

<p id="urineno"><input name="urinetest" id="urineno2" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Select at least 1 checkbox"> <label for="no">No</label></p>

</div><!-- /urine -->

<div style="float: left; width: 380px;">

<p class="msg red" id="error" style="display: none;">Our trials require us to test urine for non-medical drugs and as you do not wish this test to be done you would not be eligible to participate in our studies. Thank your for your interest in Quotient Clinical and for starting the application process. If your situation changes then please do re-apply.</p>

</div><!-- /msg -->

<div class="clear"> </div>

</li>

<p>
<input type="button" id="checkbutton" value="Check Eligibilty" />
</p>

<div class="clear"> </div>

<p id="status" style="float: none; clear: both; width: auto;">
<span class="eligibility-heading"><strong>Status:</strong>&nbsp;&nbsp;You're eligible to register for our volunteer panel</span><br /><br />

</p>

<br/>

<p id="continuebuttons1" style="float: none; clear: both; width: auto; font-size: 14px;">Complete a full application form now and fast track your application – we'll pre-populate all of the information you've already given us, so you just need to fill in the gaps.
</p>

<br/>

<p class="msg">
<?php $congrats = "Congratulations" ?>
<input type="hidden" name="congrats" value="<?php echo $congratseli;?>">

<input type="button"  id="continuebuttons3" value="Continue to Full Application Form" onClick="this.form.action='/apply-now/application-form/';this.form.submit();_gaq.push(['_trackEvent', 'Eligility Form Continue to Full Application', 'Click', 'Submit button']);">

<!--<input type="submit" disabled id="continuebuttons2" value="Continue to Quick Application Form " style="cursor:hand; display: none;" onClick="this.form.action='/apply-now/quick-application-form/';this.form.submit();_gaq.push(['_trackEvent', 'Eligility Form Continue to Quick Application', 'Click', 'Submit button']);">-->

</p>

</ul>

</form>

<script type="text/javascript">
// options for first instance
var options1 = {
	classNamePrefix: 'bvalidator_red_'
};
// options for second instance (for warning messages)
var optionsWarning1 = {
	errorMessageAttr: 'data-bvalidator-warning-msg',
	validateActionsAttr: 'data-bvalidator-warning',
	classNamePrefix: 'bvalidator_gray2_',
	position: {x:'right', y:'center'},
	offset: {x:15, y:0},
	template: '<div class="{errMsgClass}"><div class="bvalidator_gray2_arrow"></div><div class="bvalidator_gray2_cont1">{message}</div></div>',
	hideMsgIfExistsForInstance: ['first'],
	validateOn: 'keyup',
	validateOnSubmit: false
};
//$(document).ready(function () {
	// note that order of these lines is important
	//$('#elibilityapp').bValidator(options1); // first instance
	 //$('#elibilityapp').bValidator(optionsWarning1, 'secondInstance'); // second instance
	 //});
</script>

</div><!-- /application-form -->

<div class="clear"> </div>

<div id="noteligible" style="display:none; clear: both; width: auto; float: none; font-size: 14px;">
<p><span class="eligibility-heading red"><b>Status:</b> You are not eligible</span><br/><br/>

<span class="black">Unfortunately, it looks like you're not eligible to join our volunteer panel at the moment. To be eligible to become a clinical trial volunteer:</span>
<ul>
<li id="noteligiblesex">You are required to disclose your sex</li>  
<li id="noteligiblebmi">Your BMI has to be above 18 and below 33</li>
<li id="noteligibleurine">You are required to take a urine test</li>
<li id="noteligiblepreg">You must not be pregnant or breastfeeding</li>
<li id="noteligiblesmoke">You cannot be a heavy smoker</li>
<li id="noteligibleunits">You cannot have a high intake of alcohol (over 21 units per week for males and over 14 units per week for females)</li>
</ul>

If your situation does change, please feel free to reapply.  In the meantime if you'd like  to be kept informed about our upcoming clinical studies please complete the register for updates form, or contact us on:</span><br/><br/>

Tel: 0115 974 9000<br />
Email: <a href="mailto:nottingham@quotientclinical.com">nottingham@quotientclinical.com</a>
</p>
</div>
<?php edit_post_link( __( 'Edit', 'quotient' ), '<span class="edit-link">', '</span>' ); ?>
</div><!-- .entry-content -->
</div><!-- #post-## -->

<?php endwhile; // end of the loop. ?>