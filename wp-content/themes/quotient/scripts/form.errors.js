// form validation before submit
$(document).ready(function() {

	//where did you hear about us input boxes
	$("#select-hear").change(function(){
        if ($(this).val() == "other" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "othersocialmedia" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect 
		} else if ($(this).val() == "television" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "newspapermagazine" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "onlineadvert" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "radio" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "isearchedonline" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "facebook" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect	
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "online" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "website" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "facebook" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "twitter" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "washroom" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "directmail" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "buses" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "email" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "newspaper" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "iplayer" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "youtube" ) {
            $("#hear1").slideDown("fast"); //Slide Down Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "recommendation" ) {
            $("#hear2").slideDown("fast"); //Slide Down Effect
			$("#hear1").slideUp("fast");    //Slide Up Effect
		} else {
            $("#hear1").slideUp("fast");    //Slide Up Effect
			$("#hear2").slideUp("fast");    //Slide Up Effect
        }
    });
	
	//gender
	$("#gender-female").click(function() {
	  $("#pregnant,#female-only").show();

	});
	$("#gender-male").click(function() {
	  $("#pregnant,#female-only").hide();
	});
	
	//pregnent
	$("#preg-yes").click(function() {
		console.log('hello');
	  $("#inlinepregerror").show();
	});
	$("#preg-no").click(function() {
	  $("#inlinepregerror").hide();
	});
	
	//ethnic
	$("#ethnic-origin").change(function(){
        if ($(this).val() == "Other" ) {
            $("#ethnic-other").slideDown("fast"); //Slide Down Effect
		} else if ($(this).val() == "Blackother" ) {
            $("#ethnic-other").slideDown("fast"); //Slide Down Effect	
		} else {
            $("#ethnic-other").slideUp("fast");    //Slide Up Effect
        }
    });
	
	//job status input boxes
	$("#job-status").change(function(){
        if ($(this).val() == "employedfull" ) {
            $("#occupation-input").slideDown("fast"); //Slide Down Effect
		} else if ($(this).val() == "selfemployed" ) {
            $("#occupation-input").slideDown("fast"); //Slide Down Effect
		} else if ($(this).val() == "employedpart" ) {
            $("#occupation-input").slideDown("fast"); //Slide Down Effect	
		} else {
            $("#occupation-input").slideUp("fast");    //Slide Up Effect
        }
    });
	
	//BMI input box
		$("#bmi-select").change(function(){
        if ($(this).val() == "metreskg" ) {
            $("#metreskg").slideDown("fast"); //Slide Down Effect
			$("#feetlbs").slideUp("fast");    //Slide Up Effect
		} else if ($(this).val() == "feetlbs" ) {
            $("#feetlbs").slideDown("fast"); //Slide Down Effect
			$("#metreskg").slideUp("fast");    //Slide Up Effect
		} else {
            $("#metreskg").slideUp("fast");    //Slide Up Effect
			$("#feetlbs").slideUp("fast");    //Slide Up Effect
        }
    });
	
	//smoke - yes
	$("#smoke-yes").click(function() {
	  $("#smoke-amount").show();
	});
	$("#smoke-quit,#smoke-never").click(function() {
	  $("#smoke-amount").hide();
	});
	
	//smoke - quit
	$("#smoke-quit").click(function() {
	  $("#smoke-last").show();
	});
	$("#smoke-yes,#smoke-never").click(function() {
	  $("#smoke-last").hide();
	});
	
	//alcohol
	$("#alcohol-yes").click(function() {
	  $("#alcohol-amount").show();
	});
	$("#alcohol-no").click(function() {
	  $("#alcohol-amount").hide();
	});
	
	//other clinics
	$("#clinics-yes").click(function() {
	  $("#other-clinics").show();
	});
	$("#clinics-no").click(function() {
	  $("#other-clinics").hide();
	});

	//urine test
	$("#urine-no").click(function() {
	  $("#urine-error").show();
	});
	$("#urine-yes").click(function() {
	  $("#urine-error").hide();
	});
	
	//children
	$("#children-no").click(function() {
	  $("#why-children").show();
	});
	$("#children-yes").click(function() {
	  $("#why-children").hide();
	});
	
	//contraception
	$("#contraception-yes").click(function() {
	  $("#which-contraception").show();
	});
	$("#contraception-no").click(function() {
	  $("#which-contraception").hide();
	});
	
	//surgery
	$("#surgery-no").click(function() {
	  $("#surgery-error").show();
	});
	$("#surgery-yes").click(function() {
	  $("#surgery-error").hide();
	});
	
	//medication
	$("#medication-yes").click(function() {
	  $("#medication-details").show();
	});
	$("#medication-no").click(function() {
	  $("#medication-details").hide();
	});
	
	//allergies
	$("#allergies-yes").click(function() {
	  $("#allergies-details").show();
	});
	$("#allergies-no").click(function() {
	  $("#allergies-details").hide();
	});
	
	//allergies medication
	$("#allergies-med-yes").click(function() {
	  $("#allergies-med-details").show();
	});
	$("#allergies-med-no").click(function() {
	  $("#allergies-med-details").hide();
	});
	
	//operations
	$("#operations-yes").click(function() {
	  $("#operations-details").show();
	});
	$("#operations-no").click(function() {
	  $("#operations-details").hide();
	});

	//asthma
	$("#asthma-yes").click(function() {
	  $("#asthma-error").show();
	});
	$("#asthma-no").click(function() {
	  $("#asthma-error").hide();
	});
	
	//asthma medication
	$("#asthma-med-yes").click(function() {
	  $("#asthma-med-details").show();
	});
	$("#asthma-med-no").click(function() {
	  $("#asthma-med-details").hide();
	});
	
	//asthma clinic
	$("#asthma-clinic-yes").click(function() {
	  $("#asthma-clinic-details").show();
	});
	$("#asthma-clinic-no").click(function() {
	  $("#asthma-clinic-details").hide();
	});
	
	//diabetes
	$("#diabetes-yes").click(function() {
	  $("#diabetes-error").show();
	});
	$("#diabetes-no").click(function() {
	  $("#diabetes-error").hide();
	});
	
	//diabetes input box
	$("#diabetes-type").change(function(){
        if ($(this).val() == "type2" ) {
            $("#diabetes-input").slideDown("fast"); //Slide Down Effect	
		} else {
            $("#diabetes-input").slideUp("fast");    //Slide Up Effect
        }
    });
	
	//liver
	$("#liver-yes").click(function() {
	  $("#liver-error").show();
	});
	$("#liver-no").click(function() {
	  $("#liver-error").hide();
	});
	
	//skin
	$("#skin-yes").click(function() {
	  $("#skin-details").show();
	});
	$("#skin-no").click(function() {
	  $("#skin-details").hide();
	});
	
	//skin other
	$("#skindetails").change(function(){
        if ($(this).val() == "other" ) {
            $("#skinother").show();
		} else {
            $("#skinother").hide();
        }
    });
	
	//diet errors
	$("#diet-yes").click(function() {
	  $("#diet-error").show();
	});
	$("#diet-no").click(function() {
	  $("#diet-error").hide();
	});
	
	//privacy policy
	$("#privacy-link").click(function() {
	  $("#privacy-details").toggle();
	});
	
})