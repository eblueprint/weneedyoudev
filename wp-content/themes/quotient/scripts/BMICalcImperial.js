//BMICalcImperial.js

//Calculate BMI using stones/pounds and feet/inches

//Below are the declarations for the global variables, used in checkImpEntriesValidity()
//and in oneByOneCharCheck()                           
  var strStones; var no_of_Stones_chars; var decStones;
  var strPounds; var no_of_Pounds_chars; var decPounds;
  var strFeet; var no_of_Feet_chars; var decFeet;
  var strInches; var no_of_Inches_chars; var decInches;
  
//Below are the declarations for the global variables, used in enableBMIfields()
  var BMI; var BMIfinal; var strClass;
  checkImpEntriesValidity()
                          
 function checkImpEntriesValidity()                         
                          {
                           strStones = document.formBMIimp.Stonesfield.value;
                           no_of_Stones_chars = document.formBMIimp.Stonesfield.value.length;
                           decStones = parseInt(strStones);
                           
                           if (no_of_Stones_chars > 2)
                             {
                             	alert("Error: Too many digits or characters have been entered"
                             	      + " in the Stones box");
                             	//So reset the form
                              window.location.href=BMICalcImperial.html;
                             }
                             
                           strPounds = document.formBMIimp.Poundsfield.value;
                           no_of_Pounds_chars = document.formBMIimp.Poundsfield.value.length;
                           decPounds = parseInt(strPounds);
                           
                           if (no_of_Pounds_chars > 2)
                             {
                             	alert("Error: Too many digits or characters have been entered"
                             	      + " in the Pounds box");
                             	//So reset the form
                              window.location.href=BMICalcImperial.html;
                             }  
                             
                           strFeet = document.formBMIimp.Feetfield.value;
                           no_of_Feet_chars = document.formBMIimp.Feetfield.value.length;
                           decFeet = parseInt(strFeet);
                           
                           if (no_of_Feet_chars > 2)
                             {
                             	alert("Error: Too many digits or characters have been entered"
                             	      + " in the Feet box");
                             	//So reset the form
                              window.location.href=BMICalcImperial.html;
                             }
                             
                           strInches = document.formBMIimp.Inchesfield.value;
                           no_of_Inches_chars = document.formBMIimp.Inchesfield.value.length;
                           decInches = parseInt(strInches);
                           
                           if (no_of_Inches_chars > 2)
                             {
                             	alert("Error: Too many digits or characters have been entered"
                             	      + " in the Inches box");
                             	//So reset the form
                              window.location.href=BMICalcImperial.html;      
                             }
                                
                           oneByOneCharCheck();
                                                
                          }
                              
 function oneByOneCharCheck()
                             
                          {
                           //alert("Just inside oneByOneCharCheck function");
                           var intCount = 0;
                           
                           //charAt(n); at position n in the string, represents e.g. "1"
                           // whereas charCodeAt(n) represents 49 (the dec no for "1")
                           
                           for (n=0; n < no_of_Stones_chars; n++)
                              {
                               //check that each char. is a number from 0 to 9 inc. 	
                               if (strStones.charCodeAt(n) >=  48 && strStones.charCodeAt(n) <= 58)
                                 {
                                 	intCount = intCount + 1;
                                 }
                               else
                               	   {
                               	    alert("Error: One or more of the characters you entered in the Stones box was invalid");
                               	    //So reset the form
                               	   	window.location.href=BMICalcImperial.html;
                               	   }	   
                              }
                              
                           for (n=0; n < no_of_Pounds_chars; n++)
                              {
                               //check that each char. is a number from 0 to 9 inc. 	
                               if (strPounds.charCodeAt(n) >=  48 && strPounds.charCodeAt(n) <= 58)
                                 {
                                 	intCount = intCount + 1;
                                 }
                               else
                               	   {
                               	    alert("Error: One or more of the characters you entered in the Pounds box was invalid");
                               	    //So reset the form
                               	   	window.location.href=BMICalcImperial.html;
                               	   }	   
                              }
                              
                           for (n=0; n < no_of_Feet_chars; n++)
                              {
                               //check that each char. is a number from 0 to 9 inc. 	
                               if (strFeet.charCodeAt(n) >=  48 && strFeet.charCodeAt(n) <= 58)
                                 {
                                 	intCount = intCount + 1;
                                 }
                               else
                               	   {
                               	    alert("Error: One or more of the characters you entered in the Feet box was invalid");
                               	    //So reset the form
                               	   	window.location.href=BMICalcImperial.html;
                               	   }	   
                              }
                              
                           for (n=0; n < no_of_Inches_chars; n++)
                              {
                               //check that each char. is a number from 0 to 9 inc. 	
                               if (strInches.charCodeAt(n) >=  48 && strInches.charCodeAt(n) <= 58)
                                 {
                                 	intCount = intCount + 1;
                                 }
                               else
                               	   {
                               	    alert("Error: One or more of the characters you entered in the Inches box was invalid");
                               	    //So reset the form
                               	   	window.location.href=BMICalcImperial.html;
                               	   }	   
                              }             
                               
                           //If Stones entry > 60 then reset the form
                               if (decStones > 60)
                                 {
                                 	alert("Error: The number of Stones you entered was greater than 60");
                                 	//So reset the form
                               	   	window.location.href=BMICalcImperial.html;
                               	 }
                               	 
                           //If Pounds entry > 13 then reset the form
                               if (decPounds > 13)
                                 {
                                 	alert("Error: The number of Pounds you entered was greater than 13");
                                 	//So reset the form
                               	   	window.location.href=BMICalcImperial.html;
                               	 }
                               	 
                           //If Feet entry > 10 then reset the form
                               if (decFeet > 10)
                                 {
                                 	alert("Error: The number of Feet you entered was greater than 10");
                                 	//So reset the form
                               	   	window.location.href=BMICalcImperial.html;
                               	 }
                               	 
                           //If Inches entry > 11 then reset the form
                               if (decInches > 11)
                                 {
                                 	alert("Error: The number of Inches you entered was greater than 11");
                                 	//So reset the form
                               	   	window.location.href=BMICalcImperial.html;
                               	 }    	     	     	 
                               	 	 	   
                           enableBMIfields();
     
                          }
                          
 function enableBMIfields()
           {
            //alert("Just inside enableBMIfield");	
            BMI = (((decStones * 14) + decPounds) * 703)/(((decFeet * 12) + decInches) * ((decFeet * 12) + decInches));
            BMIfinal = BMI.toFixed(2); //Allows 2 decimal places
            //alert("BMI = " + BMI);
            document.formBMIimp.BMIfield.disabled="true";
            document.formBMIimp.BMIfield.style.backgroundColor="Yellow";
            document.formBMIimp.BMIfield.style.color="Black" 
            document.formBMIimp.BMIfield.value = BMIfinal;
            document.formBMIimp.BMIclassfield.disabled="true";
            document.formBMIimp.BMIclassfield.style.backgroundColor="Yellow";
            document.formBMIimp.BMIclassfield.style.color="Black";
            if (BMIfinal <= 18.50) { strClass = "Underweight"; }
            if (BMIfinal > 18.50 && BMIfinal <= 24.99) { strClass = "Ideal weight"; }
            if (BMIfinal > 24.99 && BMIfinal <= 29.99) { strClass = "Overweight"; }
            if (BMIfinal > 29.99 && BMIfinal <= 34.99) { strClass = "Obese"; }
            if (BMIfinal > 34.99 && BMIfinal <= 39.99) { strClass = "Severely obese"; }
            if (BMIfinal > 39.99 && BMIfinal <= 49.99) { strClass = "Morbidly obese"; }
            if (BMIfinal > 49.99) { strClass = "Super obese"; }
            document.formBMIimp.BMIclassfield.value = strClass;	
           }                         
  