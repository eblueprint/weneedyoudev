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

 //session_start();
 require_once "scaptcha.php";
 

 // THIS IS THE FOLLOW THROUGH FORM FROM THE ELIGIBILITY PAGE

 
?>
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
/*       if (form.weight.value==null||form.weight.value.length==0 || form.height.value==null||form.height.value.length==0){
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
function checkMyInputs(value, field){	
  if (value == '') {
      return false;
  } else {
      return true;
  }
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
<script>
      $(document).ready(function() {     
        $('#privacy').bind('click', function() {
          Messi.load('/wp-content/themes/quotient/privacy.html', {title: 'Privacy Policy', modal: true});
        });  
      });
</script>
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
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'quotient' ), 'after' => '</div>' ) ); ?>
                        <div id="application-form">                        
                        <script type="text/javascript">
function toggleDiv(divId) {							
								   
								   if (divId != 'stepone') {
									$("#stepone").css('display','none');
								   }
								   if (divId != 'steptwo') {
									$("#steptwo").css('display','none');
								   }
								   if (divId != 'stepthree') {
									$("#stepthree").css('display','none');
								   }
								   if (divId != 'stepfour') {
									$("#stepfour").css('display','none');
								   }
								   if (divId != 'stepfive') {
									$("#stepfive").css('display','none');
								   }
								   
								   $("#"+divId).toggle(200,function( ){ $(window).scrollTop($("#"+divId).position().top);});

								   
								}
$(document).ready(function(){

$('select').each(function() {  $(this).focus(  function() {  $("#select"+this.name).css('border','1px solid orange'); } );});
$('select').each(function() {  $(this).blur(  function() {  $("#select"+this.name).css('border',''); } );});

$('input[type=radio]').css('visibility','visible');
$('input[type=radio]').blur(function() {  $('span',$(this).parent()).css('border','');  });
$('input[type=radio]').focus(function() {  $('span',$(this).parent()).css('border','solid 1px orange');  });

$('input[type=checkbox]').css('visibility','visible');
$('input[type=checkbox]').blur(function() {  $('span',$(this).parent()).css('border','');  });
$('input[type=checkbox]').focus(function() {  $('span',$(this).parent()).css('border','solid 1px orange');  });

$(window).load(function(){
  $('select').first().focus();
});

 $('#togglestep1 h2').css('backgroundImage','url(/wp-content/themes/quotient/images/form-selected.png)');
 $('.step-heading h2').click(function(){
 if ($(this).css('backgroundImage').substr(-15,2) == 'un') {
   $('.step-heading h2').css('backgroundImage','url(/wp-content/themes/quotient/images/form-unselected.png)');
   $(this).css('backgroundImage','url(/wp-content/themes/quotient/images/form-selected.png)');
  } else {
   $('.step-heading h2').css('backgroundImage','url(/wp-content/themes/quotient/images/form-unselected.png)');
  }
  });
});
						</script>
                       
						<script type="text/javascript" charset="utf-8">
                            $(function()
                            {
                                $('.date-pick').datePicker({autoFocusNextInput: true});
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
							$(function() { 
								$('.date-pick').datePicker( { 
									startDate: (new Date().addYears(-80)).asString(),
									endDate: (new Date().addYears(-18)).asString()} 
									); 
							});
                        </script>
                        
                        <script type="text/javascript">
							// options for first instance 
							var options12 = { 
								classNamePrefix: 'bvalidator_gray2_' ,
								validateOnSubmit: false};
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
									// note that order of these lines is important 
									$('#fullapp').bValidator(options12); // first instance 
									$('#fullapp').bValidator(optionsWarning12, 'secondInstance'); // second instance 
									$('input[name=submit]').click( function() {

if ($('#bmi-select').val() == "metreskg") {
  $('input[name=bmi]').removeAttr('readonly');
}
if ($('#bmi-select').val() == "feetlbs") {
  $('input[name=calcval]').removeAttr('readonly');
}

if (  $('#metreskg').css('display') == 'none' && $('#feetlbs').css('display') == 'none') { $('#metreskg').css('display','block');
}


                                                                               $("#stepone").css('display','block');
                                                                               $("#steptwo").css('display','block');
                                                                               $("#stepthree").css('display','block');
                                                                               $("#stepfour").css('display','block');
                                                                               $("#stepfive").css('display','block');

   $('#fullapp').data("bValidators").first.validate();
   if ($('#fullapp').data('bValidator').isValid()) {

    // honeycombing

    // if ['canyouhearthis'] has a value then just exit the script completely 

     if ($("#canyouhearthis").val() == "") {
                 return true;
         } else {
          console.log('got you!');
          return false;
         }

    
                  } else { 
if ($('#bmi-select').val() == "metreskg") {
  $('input[name=bmi]').attr('readonly','readonly');
}
if ($('#bmi-select').val() == "feetlbs") {
  $('input[name=calcval]').attr('readonly','readonly');
}

                     return false;
                  }

                  });
                  });
						</script>
                        	<form class="live garry" id="fullapp" method="post" action="http://weneedyou.seoblueprint.co.uk/form-email-script/fullform-to-email.php" novalidate> <!-- add class="jNice" for jquery styles -->
                            <a href="javascript:toggleDiv('stepone');" id="togglestep1" class="step-heading"><h2>Step One: Introduction*</h2></a>
                            <div id="stepone" name="step" class="step" style="display: block;">

                 <div style="position:absolute;right:-1000000px;" <label class="blue">Can You Hear This?</label> 
                                <input name="canyouhearthis" id="canyouhearthis" type="text"  placeholder="" value="" /></div>

        

                            
<?php if($_GET['hidetrial'] !== 'yes/') { ?>
        <label>Clinical Trial: <?php echo $_POST['trialname']; ?></label><br/>
<?php } ?>
			    	<input type="hidden" name="clinicaltrial" value="<?php echo $_POST['trialname']; ?>">
				<input type="hidden" name="newsletter" value="<?php echo $_POST['newsletter']; ?>">
				<input type="hidden" name="callback" value="<?php echo $_POST['callback']; ?>">
							<br />


                    
                    

                                <select name="hear" value="<?php echo $_POST['hear']; ?>" data-bvalidator="required" class="styled" id="select-hear">
				<?php $hear = $_POST["hear"];?>
            

                  <option disabled selected>Where did you hear about us?*</option>
    <!---

                  <option <?php //if ($hear == buses) echo 'selected'; ?> value="buses">Buses</option>
                  <option <?php //if ($hear == catchuptv) echo 'selected'; ?> value="catchuptv">Catch up TV</option>
                  <option <?php //if ($hear == facebook) echo 'selected'; ?> value="facebook">Facebook</option>
                  <option <?php //if ($hear == familyfriend) echo 'selected'; ?> value="familyfriend">Family/Friend</option>
                  <option <?php //if ($hear == othersocialmedia) echo 'selected'; ?> value="othersocialmedia">Other Social Media</option>
                  <option <?php //if ($hear == isearchedonline) echo 'selected'; ?> value="isearchedonline">I Searched Online</option>
                  <option <?php //if ($hear == MVF) echo 'selected'; ?> value="MVF">MVF</option>
                  <option <?php //if ($hear == newspapermagazine) echo 'selected'; ?> value="newspapermagazine">Newspaper/Magazine</option>
                  <option <?php //if ($hear == onlineadvert) echo 'selected'; ?> value="onlineadvert">Online Advert</option>
                  <option <?php //if ($hear == television) echo 'selected'; ?> value="television">Television</option>
                  <option <?php //if ($hear == radio) echo 'selected'; ?> value="radio">Radio</option>
                  <option <?php //if ($hear == other) echo 'selected'; ?> value="other">Other</option>

-->

                  <option <?php if ($hear == asianexpresspaper) echo 'selected'; ?> value="asianexpresspaper">Asian express paper</option>
                  <option <?php if ($hear == asianexpresswebsite) echo 'selected'; ?>value="asianexpresswebsite">Asian express web site</option>
                  <option <?php if ($hear == capitalarenawashroomposter) echo 'selected'; ?> value="capitalarenawashroomposter">Capital Arena Washroom Poster</option>
                  <option <?php if ($hear == capitalarenaledboard) echo 'selected'; ?>value="capitalarenaledboard">Capital Arena LED Board</option>
                  <option <?php if ($hear == buses) echo 'selected'; ?> value="buses">Buses</option>
                  <option <?php if ($hear == catchuptv) echo 'selected'; ?> value="catchuptv">Catch up TV</option>
                  <option <?php if ($hear == facebook) echo 'selected'; ?> value="facebook">Facebook</option>
                  <option <?php if ($hear == familyfriend) echo 'selected'; ?> value="familyfriend">Family/Friend</option>
                  <option <?php if ($hear == othersocialmedia) echo 'selected'; ?> value="othersocialmedia">Other Social Media</option>
                  <option <?php if ($hear == isearchedonline) echo 'selected'; ?> value="isearchedonline">I Searched Online</option>
                  <!--<option <?php // if ($hear == MVF) echo 'selected'; ?> value="MVF">MVF</option>-->
                  <option <?php if ($hear == newspapermagazine) echo 'selected'; ?> value="newspapermagazine">Newspaper/Magazine</option>
                  <option <?php if ($hear == onlineadvert) echo 'selected'; ?> value="onlineadvert">Online Advert</option>
                  <option <?php if ($hear == television) echo 'selected'; ?> value="television">Television</option>
                  <option <?php if ($hear == tram) echo 'selected'; ?> value="tram">Tram</option>
                  <option <?php if ($hear == radio) echo 'selected'; ?> value="radio">Radio</option>
                  <option <?php if ($hear == other) echo 'selected'; ?> value="other">Other</option>
                                </select>
								<br /><br />
								<div id="hear1" style="display:none;" >
                                <label class="blue">Please specify</label> 
<script type="text/javascript">
$(document).ready(function(){
if ( $("#hearother").val().length > 0 )
{
  $("#hear1").css("display", "block");
}
});
</script>
                                <input name="hearother" id="hearother" type="text"  placeholder="" value="<?php echo $_POST['hearother']; ?>"/>

                               
                                </div><!-- /hear-other-input -->
                                
                                
								<div id="hear2" style="display:none;">
                                <label class="blue">Please tell us who recommended you</label> 
                                <input name="hearrec" type="text" placeholder="" value="<?php echo $_POST['hearrec']; ?>"/>
                                
                                </div><!-- /hear-other-input -->
                                <li>
				<div style="float: left; width: 225px;">
                <label>Gender*</label><br />
				<?php $gender = $_POST["gender"];?>
                                <p id="gender-male"><input name="gender" value="Male" type="radio" class="styled" <?php if ($gender == Male) echo 'checked'; ?> /> <label for="male">Male</label></p>
				<?php $gender = $_POST["gender"];?>
                               <p id="gender-female"> <input name="gender" value="Female" type="radio" class="styled" <?php if ($gender == Female) echo 'checked'; ?> data-bvalidator="required" data-bvalidator-msg="Please select either male or female." /> <label for="female">Female</label></P>
				</div><!-- /gender -->

        <?php if ($gender == Female) { ?>
                <div style="float: left; width: 410px; display:none;" id="pregnant">
				<label>Are you pregnant or lactating?*</label><br />
				<?php $pregnant = $_POST["pregnant"];?>
                                <p><input name="pregnant" id="pregnantyes" value="Yes" type="radio" class="styled" <?php if ($pregnant == Yes) echo 'checked'; ?> /> <label for="yes">Yes</label></p>
				<?php $pregnant = $_POST["pregnant"];?>
                                <p><input name="pregnant" value="No" id="fullpregno" type="radio" class="styled" <?php if ($pregnant == No) echo 'checked'; ?>  /> <label for="no">No</label></p>
<script type="text/javascript">
$(document).ready(function(){
var qpreg = document.getElementById("fullpregno").value
if (qpreg == 'No')
{
  $("#pregnant").css("display", "block");
}
});
</script>
                </div><!-- /pregnant --> <?php } ?>

        

                                </li>
                                                              <li id="dob">
                                <label class="blue">Date of birth*</label> 
                             <!--   <input name="dob" class="date-pick" type="text" placeholder="dd/mm/yyyy" value="" data-bvalidator="required" data-bvalidator-msg="Please enter your date of birth." /> -->
                                

<!--  

New Dates Implemented Here


 -->

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
</li>
                                <li>       
								<div class="column">
                                <select name="title" class="styled" value="<?php echo $_POST['title']; ?>" data-bvalidator="required" data-bvalidator-msg="Please select<br>your title.">
				<?php $hear = $_POST["title"];?>
                                	<option value="">Title (Mr/Ms)*</option>
                                    <option value="mr" <?php if ($hear == mr) echo 'selected'; ?>>Mr</option>
                                    <option value="mrs" <?php if ($hear == mrs) echo 'selected'; ?>>Mrs</option>
                                    <option value="ms" <?php if ($hear == ms) echo 'selected'; ?>>Ms</option>
                                    <option value="miss" <?php if ($hear == miss) echo 'selected'; ?>>Miss</option>
                                </select>
                                <input name="firstname" value="<?php echo $_POST['firstname']; ?>" type="text" placeholder="First name*" class="" data-bvalidator="required" data-bvalidator-msg="Please provide your first name." /><br />
                                <input name="middlename" value="<?php echo $_POST['middlename']; ?>" type="text" placeholder="Middle name" />
                                <input name="lastname" value="<?php echo $_POST['lastname']; ?>" type="text" placeholder="Last name*" class="" data-bvalidator="required" data-bvalidator-msg="Please provide your last name." /><br />
                                <input name="email" value="<?php echo $_POST['email']; ?>" type="email" placeholder="Email address*" class="lrg" data-bvalidator="required" data-bvalidator-msg="Please provide a valid email address." /><br />
                                <input name="contactnumber" value="<?php echo $_POST['contactnumber']; ?>" type="text" placeholder="Preferred contact number*" class="lrg" data-bvalidator="digit,required" data-bvalidator-warning-msg="Please provide your contact number as numbers only." /><br />
                                <select name="ethnicorigin" value="<?php echo $_POST['ethnicorigin']; ?>" class="styled" id="ethnic-origin" data-bvalidator="required" data-bvalidator-msg="Please select your ethnicity.">
				<?php $ethnic = $_POST["ethnicorigin"];?>
                                	<option value="">Ethnic Origin*</option>
                                    <option value="Asian" <?php if ($ethnic == Asian) echo 'selected'; ?>>Asian</option>
                                    <option value="Black" <?php if ($ethnic == Black) echo 'selected'; ?>>Black</option>
                                    
                                        <option value="White" <?php if ($ethnic == White) echo 'selected'; ?>>White</option>
      
                                    
                                    <option value="Hispanic" <?php if ($ethnic == Hispanic) echo 'selected'; ?>>Hispanic</option>
                                    
                                    <option value="Other" <?php if ($ethnic == Other) echo 'selected'; ?>>Other</option>                       
                                    <option value="Oriental" <?php if ($ethnic == Oriental) echo 'selected'; ?>>Oriental</option> 
                     
                           
                                </select><br /><br />
<script type="text/javascript">
$(document).ready(function(){
if ( $("#ethnicother").val().length > 0 )
{
  $("#ethnic-other").css("display", "block");
}
});
</script>                                
                                <div id="ethnic-other" style="display: none;">
                                
                                <label class="blue">Other</label>
                                <input name="ethnicother" id="ethnicother"  type="text" placeholder="" value="<?php echo $_POST['ethnicother']; ?>"/>
								
                                </div><!-- /ethinic-other -->
                                <input name="ni" value="<?php echo $_POST['ni']; ?>"  type="text" placeholder="National Insurance Number" class="lrg" /><br />
                                <input name="passport" value="<?php echo $_POST['passport']; ?>"  type="text" placeholder="or Passport Number and country of origin" class="lrg" /><br />
                                <select name="jobstatus" value="<?php echo $_POST['jobstatus']; ?>"  class="styled" id="job-status" data-bvalidator="required"  data-bvalidator-msg="Please select your job status.">
				<?php $jobstatus = $_POST["jobstatus"];?>
                                	<option value="">Your job status*</option>
                                    <option value="employedfull" <?php if ($jobstatus == employedfull) echo 'selected'; ?>>Employed - full time</option>
                                    
                                    <option value="selfemployed" <?php if ($jobstatus == selfemployed) echo 'selected'; ?>>Self employed</option>
                                    
                                    <option value="employedpart" <?php if ($jobstatus == employedpart) echo 'selected'; ?>>Employed - part time</option>
                                    
                                    <option value="student" <?php if ($jobstatus == student) echo 'selected'; ?>>Student</option>
                                    <option value="unemployed" <?php if ($obstatus == unemployed) echo 'selected'; ?>>Unemployed</option>
                                    
                                    <option value="retired" <?php if ($jobstatus == retired) echo 'selected'; ?>>Retired</option>
                                </select>
                                
                                <br /><br />
<script type="text/javascript">
$(document).ready(function(){
if ( $("#occupation").val().length > 0 )
{
  $("#occupation-input").css("display", "block");
}
});
</script>                                
                                <div id="occupation-input" style="display:none;">
                                <label class="blue">Occupation</label>
                                <input name="occupation" id="occupation" type="text" placeholder="" value="<?php echo $_POST['occupation']; ?>"/>
                                
                                </div><!-- /occupation-input -->
                                </div><!-- left -->
                                <div class="column">
                                <input name="address1" value="<?php echo $_POST['address1']; ?>" type="text" placeholder="Address line 1*" class="lrg" data-bvalidator="required" data-bvalidator-msg="Please enter the first<br>line of your address." /><br />
                                <input name="address2" value="<?php echo $_POST['address2']; ?>" type="text" placeholder="Address line 2" class="lrg" /><br />
                                <input name="town" value="<?php echo $_POST['town']; ?>" type="text" placeholder="Address line 3" class="lrg" /><br />
                                <input name="city" value="<?php echo $_POST['city']; ?>"type="text" placeholder="Town/City*" data-bvalidator="required" data-bvalidator-msg="Please enter your town/city"  class="lrg" /><br />
                                <input name="postcode" value="<?php echo $_POST['postcode']; ?>" type="text" placeholder="Postcode*" class="lrg" data-bvalidator="required" data-bvalidator-msg="Please enter your postcode." /><br />
                                
                                </div><!-- /right -->
								<div class="clear"> </div>
                                </li>
                            </ul>    
                            <div class="prevnext">
                            	<a href="javascript:showonlyone('steptwo');"><img src="/wp-content/themes/quotient/images/form-next.png" alt="next" /></a>
                            </div><!-- /prevnext -->
                            </div><!-- /stepone -->
                            
                            <a href="javascript:toggleDiv('steptwo');" id="togglestep2" class="step-heading" onClick="_gaq.push(['_trackEvent', 'Application Form Steps', 'Click', 'Step Two']);"><h2>Step Two: Personal Details*</h2></a>
                            <div id="steptwo" name="step" class="step" style="display: none;">
                            <ul>
                            	<li>
                                <div class="column">
                            	<label>Body Mass (BMI) Calculator*</label><br /><br />
								<select name="bmi-metric" id="bmi-select" class="styled">
								<option value=""  >Please select</option>
                                <option value="metreskg">Metres/kg</option>
                                <option value="feetlbs">Feet/lbs</option>
                                </select>
                                
                                <br /><br />
<script type="text/javascript">
$(document).ready(function(){
if ( $("#calcval").val().length > 0 )
{
  $("#feetlbs").css("display", "block");
}
});
</script>                                 
                                <div id="feetlbs" style="display: none;">
                                <label class="blue">Height in ft:</label> <INPUT TYPE="TEXT" data-bvalidator="digit" NAME="feet" size="5" value="<?php echo $_POST["feet"];?>" class="sml"><br />
                
                
                                <label class="blue">and inches:</label> <INPUT TYPE="TEXT" data-bvalidator="digit" NAME="inches" size="5" value="<?php echo $_POST["inches"];?>" class="sml"><br />
                
                






                                <label class="blue">Weight in stones:</label> 
<INPUT TYPE="TEXT" NAME="stones" data-bvalidator="digit" size="5" value="<?php echo $_POST["stones"];?>" class="sml"><br/>
<label class="blue">and pounds:</label> 

<INPUT TYPE="TEXT" NAME="pounds" data-bvalidator="digit" size="5" value="<?php echo $_POST["pounds"];?>" class="sml"><br />
                                <INPUT TYPE="BUTTON" name="calc" value="Calculate" onClick="FigureBMI(this.form,this.form.feet.value,this.form.inches.value,(this.form.stones.value*14)+parseInt(this.form.pounds.value))"><br/>

                                <label>Your result:</label> <INPUT TYPE="TEXT" name="calcval" id="calcval" data-bvalidator="digit,required" data-bvalidator-msg="Please complete your BMI" value="<?php echo $_POST["calcval"];?>" readonly="readonly"><br/>
                
                				</div><!-- /feetlbs -->
<script type="text/javascript">
$(document).ready(function(){
if ( $("#bmi").val().length > 0 )
{
  $("#metreskg").css("display", "block");
}
});
</script>                                  
                                <div id="metreskg" style="display: none;">
                                <label class="blue">Height in cm:</label> <INPUT TYPE=TEXT NAME=height  data-bvalidator="digit" SIZE=10 onFocus="this.form.height.value=''" value="<?php echo $_POST["height"];?>"><br />
                                <label class="blue">Weight in kg:</label> <INPUT TYPE=TEXT NAME=weight  data-bvalidator="digit" SIZE=10 onFocus="this.form.weight.value=''" value="<?php echo $_POST["weight"];?>"><br />
                                <INPUT TYPE="button" VALUE="Calculate" onClick="computeform(this.form)"><br />
                                Your result: <INPUT TYPE=TEXT NAME=bmi id="bmi"    data-bvalidator="required,digit" data-bvalidator-msg="Please tell us your BMI" SIZE=8 value="<?php echo $_POST["bmi"];?>" readonly="readonly" ><br />
                                </div><!-- /metreskg -->
                                    <p class="msg">If your BMI is under 18 or over 35, typically you will be ineligible to become a volunteer on our panel.</p>

    <label style="display: none;">Know your BMI? </label> <INPUT style="display: none;" TYPE="TEXT" name="bmiknown" value="<?php // echo $_POST["bmiknown"];?>" id="bmiknown"><br/>


								</div><!-- /column -->
                                <div class="column">
                                <label>Do you smoke?*</label><br />
				<?php 
				$smokeamount = $_POST["smokeamount"];?>
<div id="smokes">
<p id="smokeamount-11"><input name="smokeamount" value="11" type="radio" class="styled" <?php if($smokeamount == 11) { echo 'checked';}?>/><label for="11">Heavy Smoker<br>(10+ per day)</label></p>
<p id="smokeamount-10"><input name="smokeamount" value="10" type="radio" class="styled" <?php if($smokeamount == 10) { echo 'checked';}?> /><label for="10">Light Smoker<br>(1-10 per day)</label></p><br clear="both">
<p id="smokeamount-quit"><input name="smokeamount" value="6" type="radio" class="styled"  <?php if($smokeamount == 6) { echo 'checked';}?>/><label for="quit">Quit<br>(less than six months ago)</label></p>
<p id="smokeamount-never"><input name="smokeamount" value="0" type="radio" class="styled"  <?php if($smokeamount == 0) { echo 'checked';}?>/> <label for="neversmoke">Never smoked<br>(or quit more than 6 months ago)</label></p>
</div>
			

                                <div class="clear"> </div>
<br /><br />
                                <p class="msg">If you are a heavy smoker typically you will be ineligible to become a volunteer on our panel.</p>
	
                                <div class="clear"> </div>

        <?php
        $nicotineyes = $_POST["nicotine"];
        $nicotineno = $_POST["nicotine"];
        ?>

                 <label>Do you use any other nicotine products? (e.g. patches, e-cigarettes, gum)</label><br />

                <p id="nicotine-yes"><input name="nicotine" value="Yes" type="radio" class="styled" <?php if ($nicotineyes == Yes) echo 'checked'; ?> /> <label for="yes">Yes</label></p>
                <p id="nicotine-no"><input name="nicotine" value="No" type="radio" class="styled" <?php if ($nicotineno == No) echo 'checked'; ?> data-bvalidator="required" data-bvalidator-msg="Please tell us if you use any other nicotine products." /> <label for="no">No</label></p>
                
                                <div class="clear"> </div><br />


                                <label>Do you drink alcohol?*</label><br />
				<?php 
				$drinkyes = $_POST["alcohol"];
				$drinkno = $_POST["alcohol"];
				?>
								<p id="alcohol-yes"><input name="alcohol" value="Yes" type="radio" class="styled" <?php if ($drinkyes == Yes) echo 'checked'; ?> /> <label for="yes">Yes</label></p>
                                <p id="alcohol-no"><input name="alcohol" value="No" type="radio" class="styled" <?php if ($drinkno == No) echo 'checked'; ?> data-bvalidator="required" data-bvalidator-msg="Please tell us if you drink alcohol." /> <label for="no">No</label></p>
                                <div class="clear"> </div>
<script type="text/javascript">
$(document).ready(function(){
var unitsperweek = document.getElementById("units").value
if (unitsperweek != 'units')
{
  $("#alcohol-amount").css("display", "block");
}
});
</script>
								<div id="alcohol-amount" style="display: none;">
                                <select name="units" id="units" class="styled">
				<?php 
				$units = $_POST["units"];
				?>
                                <option value="units">How many units do you drink per week?</option>
                                <option value="Less than 10 units per week" <?php if ($units== 10) echo 'selected'; ?>>Less than 10 units per week</option>
                                <option value="Between 10 and 20 units a week" <?php if ($units> 10 && $units <=20) echo 'selected'; ?>>Between 10 and 20 units a week</option>
                                <option value="More than 21 units per week" <?php if ($units > 20) echo 'selected'; ?>>More than 21 units per week</option>
                                </select><br /><br />
                                
                                <p class="msg">1 pint of beer = 2 units, 1 small glass of wine (125ml) = 1 unit</p>
                                
                                <p class="msg">If you have a high weekly intake of alcohol typically you will be ineligible to become a volunteer on our panel.</p>
                                
								</div><!-- /alchol-amount -->
                                </div><!-- /column -->
                                <div class="clear"> </div>
                                
                                <label>Have you any specific dietary requirements?</label><br /><br />
                                <p id="diet-yes"><label for="yes">Yes</label> <input name="diet" value="Yes" type="radio" class="styled" /></p>
                                <p id="diet-no"><label for="no">No</label> <input name="diet" value="No" type="radio" class="styled" /></p>
                                
                                <div id="diet-error" style="display: none;">
                                <p class="msg red">We can only provide vegetarian options.</p>
                                </div><!-- /diet-error -->
                                
                                <div class="clear"> </div>
                                </li>
                                <li style="display: none;">
                                <label>Have you participated in any studies at any other research clinics?*</label><br /><br />
				<?php 
				$partiyes = $_POST["studies"];
				$partino = $_POST["studies"];
				?>
			       				<p id="clinics-yes"><input name="studies" value="Yes" type="radio" class="styled" <?php if ($partiyes == Yes) echo 'checked'; ?> /> <label for="yes">Yes</label></p>
                                <p id="clinics-no"><input name="studies" value="No" type="radio" class="styled" <?php if ($partino == No) echo 'checked'; ?> data-bvalidator="required" data-bvalidator-msg="Please select yes or no." /> <label for="no">No</label></p><br />
<script type="text/javascript">
$(document).ready(function(){
if ( $("#otherclinics").val().length > 0 )
{
  $("#other-clinics").css("display", "block");
}
});
</script>
					<div id="other-clinics" style="display: none;">
                        <div class="clear"> </div>
                        
                        <label class="blue">Please tell us which other clinics</label>
                        <input name="other-clinics" id="otherclinics" type="text" placeholder="" class="lrg" value="<?php echo $_POST['other-clinics']; ?>"/>
                    
                    </div><!-- /other-clinics -->
							<br /><br />
                            </li>
                                <li>
                                <p class="msg" style="color: #000!important; font-style: italic;">In the interests of the safety of our volunteers, we cannot accept anyone on our volunteer panel that has  previously used or currently uses Class A drugs, such as ecstasy / cocaine etc. Occasional users of cannabis may be eligible.</p>
                                <div style="float: left; width: 260px;">
                                <label>Are you happy to undergo a urine test to check for non-medical drugs?*</label><br /><br />
				<?php 
				$urinetest = $_POST["urinetest"];
				?>
                                <p id="urine-yes"><input name="urinetest" value="Yes" type="radio" class="styled" <?php if ($urinetest == Yes) echo 'checked'; ?> > <label for="yes">Yes</label></p>
                                <p id="urine-no"><input name="urinetest" value="No" type="radio" class="styled" <?php if ($urinetest == No) echo 'checked'; ?> data-bvalidator="required" data-bvalidator-msg="Please select yes or no."> <label for="no">No</label></p>
                                </div><!-- /urine -->
								<div style="float: left; width: 380px;">
                                <p class="msg red" id="urine-error" style="display: none;">Our trials require us to test urine for non-medical drugs and as you do not wish this test to be done you would not be eligible to participate in our studies. Thank your for your interest in Quotient Clinical and for starting the application process. If your situation changes then please do re-apply.</p>
                                </div><!-- /msg -->
								<div class="clear"> </div>
                                </li>
                                </ul>
                            <div class="prevnext">
                            	<a href="javascript:showonlyone('stepone');"><img src="/wp-content/themes/quotient/images/form-previous.png" alt="Previous" /></a> <a href="javascript:showonlyone('stepthree');"><img src="/wp-content/themes/quotient/images/form-next.png" alt="next" /></a>
                            </div><!-- /prevnext -->
                            
                            </div><!-- /steptwo -->
                            <a href="javascript:toggleDiv('stepthree');" id="togglestep3" class="step-heading" onClick="_gaq.push(['_trackEvent', 'Application Form Steps', 'Click', 'Step Three']);"><h2>Step Three: Medical Assessment*</h2></a>
                            <div id="stepthree" name="step" class="step" style="display: none;">
                            <ul>
								<li id="female-only" style="display: none;">
                                
                                
                                <label>Are you able to have have children?*</label><br /><br />
                                
                                <p id="children-yes"><label for="yes">Yes</label> <input name="children" value="Yes" type="radio" class="styled" /></p>
                                
                                <p id="children-no"><label for="no">No</label> <input name="children" value="No" type="radio" class="styled" /></p>
                                
                                
                                <div class="clear"> </div>
                                
                                
                                <div id="why-children" style="display: none;">
                                
                                <label>Can you tell us the reason you cannot have children:</label><br /><br />
                                
                                <select name="why-children" class="styled">
                                
                                	<option value="">Please select</option>
                                    <option value="Post menopausal">Post menopausal</option>
                                    
                                    <option value="Hysterectomy">Hysterectomy</option>
                                    
                                    <option value="Sterilised">Sterilised</option>
                                    
                                    <option value="Vasectomy of partner">Vasectomy of partner</option>
                                </select> 
                                
                                
                                
                                <label class="blue">Other</label>
                                <input name="why-children-other" type="text" placeholder="" value=""/><br /><br />
                                
                                
                                </div><!-- /why-children -->
                                
                                
                                
                                <label>Do you currently use contraception?*</label><br /><br />
                                
                                <p id="contraception-yes"><label for="yes">Yes</label> <input name="contraception" value="Yes" type="radio" class="styled" /></p>
                                
                                <p id="contraception-no"><label for="no">No</label> <input name="contraception" value="No" type="radio" class="styled" /></p>
                                
                                <div class="clear"> </div>
                                
                                
                                <div id="which-contraception" style="display: none;">
                                
                                
                                <label>Can you tell us which form of contraception you use?</label><br /><br />
                                
                                <select name="which-contraception" class="styled">
                                
                                	<option value="">Please select</option>
                                    <option value="Oral contraceptive pill">Oral contraceptive pill</option>
                                    
                                    <option value="Barrier (Cap or condom +/- spermicide)">Barrier (Cap or condom +/- spermicide)</option>
                                    
                                    <option value="Contraceptive injection">Contraceptive injection</option>
                                    
                                    <option value="Coil / intra-uterine contraceptive">Coil / intra-uterine contraceptive</option>
                                    
                                    <option value="Abstinence">Abstinence</option>
                                </select> 
                                
                                
                                
                                <label class="blue">Other</label>
                                <input name="which-contraception-other" type="text" placeholder="" value=""/>
                                
                                
                                </div><!-- /which-contraception -->
                                
                                
                                </li><!-- /female-only -->
                                <li>
                                <label>Have you been registered with a GP in the UK for over 12 months?*</label><br /><br />
								<p id="surgery-yes"><label for="yes">Yes</label> <input name="surgery" value="Yes" type="radio" class="styled" /></p>
                                <p id="surgery-no"><label for="no">No</label> <input name="surgery" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." /></p>
								<p id="surgery-error" class="msg red" style="display: none;">You are ineligible at the moment but if your situation changes please feel free to apply once you have been registered for 12 months with a GP surgery.</p>
                                <div class="clear"> </div>
                                </li>
                                <li>
                                <label>Are you taking any prescribed or over the counter medication?*</label><br /><br />
								<p id="medication-yes"><label for="yes">Yes</label> <input name="medication" value="Yes" type="radio" class="styled" /></p>
                                <p id="medication-no"><label for="no">No</label> <input name="medication" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." /></p>
								<div id="medication-details" style="float: right; display: none;">
                                <label>Name of medication</label> <input name="namemedication" placeholder="" type="text" class="lrg" data-bvalidator="checkMyInputs[1],valempty" data-bvalidator-msg="Please complete this input"/><br />
								
                                <label for="occasional">How often?</label> <input name="usemedication" value="" type="text" class="lrg" data-bvalidator="checkMyInputs[1],valempty" data-bvalidator-msg="Please complete this input"/>
                                
								</div><!-- /right -->
                                <div class="clear"> </div>
                                </li>
                                <li>
                                <label>Are you suffering from any allergies?*</label><br /><br />
								<p id="allergies-yes"><label for="yes">Yes</label> <input name="allergies" value="Yes" type="radio" class="styled" /></p>
                                <p id="allergies-no"><label for="no">No</label> <input name="allergies" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." /></p>
                                
                                
								<div id="allergies-details" style="display: none;">
                                
                                <div style="float: left;">
                                <label>Please tell us which<br />allergies you have</label>
                                </div><!-- /left -->
								<div style="float: right;">
                                <input name="whichallergies" type="text" placeholder="" class="lrg" data-bvalidator="checkMyInputs[1],valempty" data-bvalidator-msg="Please complete this input"/>
                                </div><!-- /right -->
                                
                                
                                <div class="clear"> </div>
								
                                <br /><br />
                                <label>Do you take medication to alleviate allergic symptoms?</label><br /><br />
								<p id="allergies-med-yes"><label for="yes">Yes</label> <input name="allergies-med" value="Yes" type="radio" class="styled" /></p>
                                <p id="allergies-med-no"><label for="no">No</label> <input name="allergies-med" value="No" type="radio" class="styled" /></p>
                                
                                
                                <div id="allergies-med-details" style="display: none;">
                                
                                <div style="float: left;">
                                <label>Please specify</label>
                                </div><!-- /left -->
								<div style="float: right;">
                                <input name="allergies-med-details" type="text" placeholder="" class="lrg" data-bvalidator="checkMyInputs[1],valempty" data-bvalidator-msg="Please complete this input"/>
                                </div><!-- /right -->
                                
                                </div><!-- /allergies-med-details -->
                                </div><!-- /allergies-details -->
                                
                                <br /><br />
                                </li>
                                <li>
                                <label>Have you had any operations?*</label><br /><br />
								<p id="operations-yes"><label for="yes">Yes</label> <input name="anyoperations" value="Yes" type="radio" class="styled" /></p>
                                <p id="operations-no"><label for="no">No</label> <input name="anyoperations" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." /></p>
								<div id="operations-details" style="display: none;">
                                <div style="float: left;">
                                <label>Please specify</label> 
                                </div>
                                <div style="float: right;">
                                <input name="operation" type="text" placeholder="" class="lrg" data-bvalidator="checkMyInputs[1],valempty" data-bvalidator-msg="Please complete this input">
                                </div><br />
								<div style="float: left;">
                                <label><br />Date (month/year<br />if known)</label>
                                </div>
                                <div style="float: right;">
                                <input name="operationdate" type="text" placeholder="" class="lrg" data-bvalidator="checkMyInputs[1],valempty" data-bvalidator-msg="Please complete this input">
                                </div>
								</div><!-- /operations-details-->
                                <div class="clear"> </div>
                                </li>
                                <li>
                                <label>Have you had / are you suffering from asthma problems?*</label><br /><br />
                                <p id="asthma-yes"><label for="yes">Yes</label> <input name="asthma" value="Yes" type="radio" class="styled" /></p>
                                <p id="asthma-no"><label for="no">No</label> <input name="asthma" value="No" type="radio"class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." /></p>
								<div id="asthma-error" style="display: none;">
                                <p class="msg">The vast majority of studies exclude volunteers with asthma, however we are occasionally asked to recruit asthmatics, so if you would like to continue with your application we would be more than happy to keep your details on file, should a suitable study arise.</p>
								<div style="float: right;">
                                <label>How long have you suffered with Asthma?</label> <input name="howlongasthma" placeholder="" type="text" class="sml" data-bvalidator="checkMyInputs[1],valempty" data-bvalidator-msg="Please complete this input"/>
                                <label>Age of diagnosis</label> <input name="ageasthma" type="text" placeholder="" type="text" class="sml" data-bvalidator="checkMyInputs[1],valempty" data-bvalidator-msg="Please complete this input"/>
                                </div><!-- /right -->
                                
                                <div class="clear"> </div>
                                <label>Are you currently taking asthma medication?</label><br /><br />
								<p id="asthma-med-yes"><label for="yes">Yes</label> <input name="asthma-medication" value="Yes" type="radio" class="styled" /></p>
                                <p id="asthma-med-no"><label for="no">No</label> <input name="asthma-medication" value="No" type="radio" class="styled" /></p>
								<div id="asthma-med-details" style="display:none;">
                                <label>Name of asthma medication</label> <input name="asthma-medication-details" type="text" placeholder="" class="lrg" data-bvalidator="checkMyInputs[1],valempty" data-bvalidator-msg="Please complete this input"/>
								</div><!-- /asthma-med-details -->
                                
                                
                                <div class="clear"> </div>
                                
                                <label>Do you attend an asthma clinic at your GP surgery?</label><br /><br />
                                
                                <p id="asthma-clinic-yes"><label for="yes">Yes</label> <input name="asthma-clinic" value="Yes" type="radio" class="styled" /></p>
                                <p id="asthma-clinic-no"><label for="no">No</label> <input name="asthma-clinic" value="No" type="radio" class="styled" /></p>
                                
                                <div id="asthma-clinic-details" style="display:none;">
                                <label>How often do you attend?</label> <input name="asthma-clinic-details" type="text" placeholder="" class="lrg" data-bvalidator="checkMyInputs[1],valempty" data-bvalidator-msg="Please complete this input"/>
								</div><!-- /asthma-med-details -->
                                
								</div><!-- /asthma-error -->
                                
                                
                                <br /><br />
                                </li>
                                <li>
								<div class="column">
                                <label>Have you been diagnosed with diabetes?*</label><br /><br />
								<p id="diabetes-yes"><label for="yes">Yes</label> <input name="diabetes" value="Yes" type="radio" class="styled" /></p>
                                <p id="diabetes-no"><label for="no">No</label> <input name="diabetes" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." /></p>
								
                                </div><!-- /column -->
							
                            
                            <div id="diabetes-error" style="display:none;">
                                
                                <div class="column">
                                <p class="msg red">The vast majority of studies exclude volunteers with diabetes, however we are occasionally asked to recruit diabetics, so if you would like to continue with your application we would be more than happy to keep your details on file, should a suitable study arise.</p>
								
                                </div><!-- /column -->
                                
								<div class="clear"> </div>
                                <select name="diabetestype" class="styled" id="diabetes-type" data-bvalidator="checkMyInputs[1],valempty" data-bvalidator-msg="Please complete this input">
                                	<option value="">Which type?</option>
                                	<option value="type1">Type I (insulin dependent)</option>
                                    <option value="type2">Type II</option>
                                </select> 
								<span id="diabetes-input" style="display: none;">
                                <label>How is your diabetes controlled?</label> <input name="diabeteshow" type="text" placeholder="" class="lrg" />
                                </span><!-- /diabetes-input -->
                                
                                
                                </div><!-- /diabetes-error -->
								<div class="clear"> </div>
                                </li>
                                <li>
                                <label>Have you had / are you suffering from liver problems?*</label><br /><br />
								<p id="liver-yes"><label for="yes">Yes</label> <input name="liver" value="Yes" type="radio" class="styled" /></p>
                                <p id="liver-no"><label for="no">No</label> <input name="liver" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." /></p>
                                <p class="msg red" id="liver-error" style="display: none;">Unfortunately, due to this medical condition you will not be eligible to take part in the type of clinical trials that we conduct. Thank you for your interest in Quotient Clinical and for starting the application process.</p>
								<div class="clear"> </div>
                                </li>
                                <li>
                                <label>Have you had / are you suffering from skin problems?*</label><br /><br />
								<p id="skin-yes"><label for="yes">Yes</label> <input name="skin" value="Yes" type="radio" class="styled" /></p>
                                <p id="skin-no"><label for="no">No</label> <input name="skin" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." /></p>
								<div id="skin-details" style="display: none;">
                                <label>Details: </label> 
                                <select name="skindetails" class="styled" id="skindetails" data-bvalidator="checkMyInputs[1],valempty" data-bvalidator-msg="Please complete this input">
                                	<option value="">Please select</option>
                                	<option value="psoriasis">Psoriasis</option>
                                    <option value="eczema">Eczema</option>
                                    <option value="other">Other</option>
                                </select>
                                <div id="skinother" style="display: none; float: right; margin: 0 80px 0 0;">
                                <label class="blue">Other</label>
                                <input name="skinother" type="text" placeholder="" value=""/> <br />
                                </div><!-- /skinother -->
                                <div class="clear"> </div>
                                <label>Is it: </label> 
                                <select name="skindetails2" class="styled">
                                	<option value="mild">Mild</option>
                                    <option value="moderate">Moderate</option>
                                    <option value"severe">Severe</option>
                                </select>
								</div><!-- /skin-details -->
								<div class="clear"> </div>
                                </li>
                            </ul>
                            <div class="prevnext">
                            	<a href="javascript:showonlyone('steptwo');"><img src="/wp-content/themes/quotient/images/form-previous.png" alt="Previous" /></a> <a href="javascript:showonlyone('stepfour');"><img src="/wp-content/themes/quotient/images/form-next.png" alt="next" /></a>
                            </div><!-- /prevnext -->
                            </div><!-- /stepthree -->
                            <a href="javascript:toggleDiv('stepfour');" id="togglestep4" class="step-heading" onClick="_gaq.push(['_trackEvent', 'Application Form Steps', 'Click', 'Step Four']);"><h2>Step Four: Medical Assessment*</h2></a>
                            <div id="stepfour" name="step" class="step" style="display: none;">
                            <ul>
                            	<li>
                                <p class="long"><label>Have you had / are you suffering from heart problems?*</label></p>
								<p><label for="yes">Yes</label> <input name="heart" value="Yes" type="radio" class="styled" /></p>
                                <p><label for="no">No</label> <input name="heart" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." checked /></p>
                                <div class="clear"> </div>
                                <p class="long"><label>Have you had / are you suffering from stomach / bowel problems?*</label></p>
								<p><label for="yes">Yes</label> <input name="stomach" value="Yes" type="radio" class="styled" /></p>
                                <p><label for="no">No</label> <input name="stomach" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." checked /></p>
                                <div class="clear"> </div>
                                <p class="long"><label>Have you had / are you suffering from migraines?*</label></p>
								<p><label for="yes">Yes</label> <input name="migraines" value="Yes" type="radio" class="styled" /></p>
                                <p><label for="no">No</label> <input name="migraines" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." checked /></p>
                                <div class="clear"> </div>
                                <p class="long"><label>Have you had/ are you suffering from urinary (including kidney) problems?*</label></p>
                                <p><label for="yes">Yes</label> <input name="urinary" value="Yes" type="radio" class="styled" /></p>
                                <p><label for="no">No</label> <input name="urinary" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." checked /></p>
                                <div class="clear"> </div>
                                <p class="long"><label>Have you had / are you suffering from nervous system problems?*</label></p>
								<p><label for="yes">Yes</label> <input name="nervous" value="Yes" type="radio" class="styled" /></p>
                                <p><label for="no">No</label> <input name="nervous" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." checked /></p>
                                <div class="clear"> </div>
                                <p class="long"><label>Have you had / are you suffering from muscle / bone / joint problems?*</label></p>
								<p><label for="yes">Yes</label> <input name="muscle" value="Yes" type="radio" class="styled" /></p>
                                <p><label for="no">No</label> <input name="muscle" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." checked /></p>
                                <div class="clear"> </div>
                                <p class="long"><label>Have you had / are you suffering from eye problems? e.g. glaucoma, retinal detachment etc*</label></p>
								<p><label for="yes">Yes</label> <input name="eye" value="Yes" type="radio" class="styled" /></p>
                                <p><label for="no">No</label> <input name="eye" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." checked /></p>
                                <div class="clear"> </div>
                                <p class="long"><label>Have you had / are you suffering from ear / throat / nose problems?*</label></p>
								<p><label for="yes">Yes</label> <input name="ear" value="Yes" type="radio" class="styled" /></p>
                                <p><label for="no">No</label> <input name="ear" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." checked /></p>
                                <div class="clear"> </div>
                                <p class="long"><label>Have you ever had a tropical disease? e.g. malaria*</label></p>
								<p><label for="yes">Yes</label> <input name="tropical" value="Yes" type="radio" class="styled" /></p>
                                <p><label for="no">No</label> <input name="tropical" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." checked /></p>
                                <div class="clear"> </div>
                                <p class="long"><label>Have you had / are you suffering from any other problems not included above?*</label></p>
								<p><label for="yes">Yes</label> <input name="otherproblems" value="Yes" type="radio" class="styled" /></p>
                                <p><label for="no">No</label> <input name="otherproblems" value="No" type="radio" class="styled" data-bvalidator="required" data-bvalidator-msg="Please select yes or no." checked /></p>
                                <div class="clear"> </div>
                                <textarea name="extraInfoArea" rows="4" cols="50" onFocus="if (this.value == this.defaultValue) { this.value = ''; }">If you answered 'Yes' to any of the above questions, please give details here.</textarea>
                                </li>
                            </ul>
                            <div class="prevnext">
                            	<a href="javascript:showonlyone('stepthree');"><img src="/wp-content/themes/quotient/images/form-previous.png" alt="Previous" /></a> <a href="javascript:showonlyone('stepfive');"><img src="/wp-content/themes/quotient/images/form-next.png" alt="next" /></a>
                            </div><!-- /prevnext -->
                            </div><!-- /stepfour -->
                            
                            <ul>
                            	<li>
                                I have read and agreed to the Quotient Clinical <a id="privacy">Privacy Policy</a>* - <p style="float: right;"><input name="privacypol" value="Yes" type="checkbox" class="styled" data-bvalidator="required" /></p><br />
                                <div id="privacy-details" style="display: none;">
                                	<p class="msg">QUOTIENT CLINICAL LIMITED ("We") are committed to protecting and respecting your privacy.</p>

<p class="msg">This policy (together with our Terms of Use and any other documents referred to on it) sets out the basis on which any personal data we collect from you, or that you provide to us, will be processed by us. Please read the following carefully to understand our views and practices regarding your personal data and how we will treat it.</p>

<p class="msg">For the purpose of the Data Protection Act 1998 (the Act), the data controller is QUOTIENT BIORESEARCH GROUP LIMITED of Newmarket Road, Fordham, Cambridgeshire CB7 5WW.</p>
                                </div><!-- /privacy-details -->
                                <p class="msg bottom">By applying for admission to our volunteer panel, you are not making a commitment to go on a clinical trial, but simply expressing an interest to find out more. I also understand that Quotient Clinical does not guarantee that I will be asked to participate in any study.</p>
                                
                                </li>
                            </ul>

<script>
function checkCaptcha(answer) {
	$('input[name=submit]').attr('disabled','disabled');
	$.ajaxSetup({ cache: false });
	var question='<?php echo urlencode($_SESSION['num1']." ".$_SESSION['operand']." ".$_SESSION['num2']);?>';
	$.get('/form-email-script/scaptcha-check.php?question='+question+'&answer='+answer,function(html) {		
 		if (html != 'SUCCESS') {
		  alert('Answer Incorrect, please try again');
		} else {
		
		// correct answer and enable submit button by removing disabled attribute - gb changes on line 946 change on onChange to onkeyup
		
		  $('input[name=submit]').removeAttr('disabled');
		}
	});
}
</script>                            
                  
<?php  
 echo "Please complete the following question to proceed. This helps us prevent spam.<br><br>";
  echo $_SESSION['sentence']." ".$_SESSION['num1']." ".$_SESSION['operand']." ".$_SESSION['num2']." ? ";
  echo "<input type='text' data-bvalidator=\"required\" data-bvalidator-msg=\"This field is required\" name='answer' id='answer' size='5' onkeyup=\"checkCaptcha(this.value);\"/><br>";
?>

			<input type="submit" name="submit" value="Submit" class="step" onClick="_gaq.push(['_trackEvent', 'Application Form Steps', 'Click', 'Submit button']);">
                            </form>
                        </div><!-- /application-form -->
						<?php edit_post_link( __( 'Edit', 'quotient' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->
				<?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>