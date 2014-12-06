<script src="//code.jquery.com/jquery-1.9.1.min.js"></script>

<script language="JavaScript" type="text/JavaScript">

$(document).ready(function(){

   $('.box').hide();
  // First Way :

   $('#HiddenInput').empty();
   $('#HiddenInput').val($('#registration_type').val());
   var value =  $('#HiddenInput').val();
   $('#registration_type').val(value);
   $('#div' + value).show();
   
   if (value == 'f'){
		var hotel_value = $('#fac_hotel').val();
		//alert(hotel_value);
		if (hotel_value == 'y'){
			$('#div' + value + '_h').show();
		}
		else{
			$('#div' + value + '_h').hide();
		}
   }
   else if (value == 's'){
		var hotel_value = $('#stu_hotel').val();
		//alert(hotel_value);
		if (hotel_value == 'y'){
			$('#div' + value + '_h').show();
		}
		else{
			$('#div' + value + '_h').hide();
		}
   }
   
   


   $('#registration_type').change(function() {
      $('.box').hide();
      $('#HiddenInput').val($(this).val());
      $('#div' + $(this).val()).show();
	  var value = $(this).val();
	  if (value == 'f'){
		var hotel_value = $('#fac_hotel').val();
		
		if (hotel_value == 'y'){
			$('#div' + value + '_h').show();
		}
		else{
			$('#div' + value + '_h').hide();
		}
   	} 
	
	else if (value == 'f'){
		var hotel_value = $('#stu_hotel').val();
		
		if (hotel_value == 'y'){
			$('#div' + value + '_h').show();
		}
		else{
			$('#div' + value + '_h').hide();
		}
   	} 
	  
  }); 
   
   
   $('#fac_hotel').change(function() {
      if ($(this).val() == 'y'){
		  $('#divf_h').show();
	  }
	  else{
	  	  $('#divf_h').hide();
	  }
	  
  }); 
   
   $('#stu_hotel').change(function() {
      if ($(this).val() == 'y'){
		  $('#divs_h').show();
	  }
	  else{
	  	  $('#divs_h').hide();
	  }
	  
  }); 
   
});

</script>




           
            {header_tabs}
<div style="clear:both;"></div>

<h2>Registration Form</h2>

<form method="post" action="" name="registration_form" id="registration_form">
	<table width="100%" class="default">
        <tr>
			<td width="150" align="left" valign="middle">Select Registration Type:</td>
		    <td width="400" align="left" valign="middle">{registration_type_menu}</td>
	     </tr>
	</table>
    <div id="divf" class="box">
     <h3>Enter your information.</h3>
     <table width="100%" class="default">
    	<tr>
			<td width="150" align="left" valign="middle">Enter School Name:</td>
		    <td width="400" align="left" valign="middle"><input type="text" name="fac[0][college]" id="fac[0][college]" value="{fac_0_college}" size="50"/></td>
	    </tr>
      </table>
     
    <table width="100%" class="default2">
    
       	<tr>
                        <td width="28%">First Name</td>
                        <td width="72%"><input type="text" name="fac[0][fname]" id="fac[0][fname]" value="{fac_0_fname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="fac[0][lname]" id="fac[0][lname]" value="{fac_0_lname}" size="30"/></td>
                    </tr>
                     <tr>
                        <td>Gender</td>
                        <td>{faculty_gender_menu}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td><input type="text" name="fac[0][email]" id="fac[0][email]" value="{fac_0_email}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Re-enter Email Address</td>
                        <td><input type="text" name="fac[0][email2]" id="fac[0][email2]" value="{fac_0_email2}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Phone Contact</td>
                        <td><input type="text" name="fac[0][phone]" id="fac[0][phone]" value="{fac_0_phone}" size="30"/></td>
                  </tr>
                  <tr>
                        <td>Special Accommodations</td>
                        <td><textarea name="fac[0][accom]" id="fac[0][accom]" rows="5" cols="30">{fac_0_accom}</textarea></td>
                  </tr>
                  <tr>
                        <td>Meal Restrictions</td>
                        <td><textarea name="fac[0][meal]" id="fac[0][meal]" rows="5" cols="30">{fac_0_meal}</textarea></td>
                  </tr>
                  
                 <tr>
             <td colspan="2">NOTE: Due to Keenland running during the dates of April 10-11 hotel room availability is limited and will fe first come first serve as part of the conference fees. In order to accommodate as many attendees as possible, please answer the following:</td>

           </tr>
                   <tr>
             <td>Will you be needing hotel accommodations?</td>
             <td>{faculty_accommodations_menu}</td>
           </tr>                  
     </table>
     <div id="divf_h" class="box">
     <h3>Hotel accommodations.</h3>
     <table width="100%" class="default">
    	<tr>
			<td width="150" align="left" valign="middle">Are you requesting sholarship to cover hotel costs?</td>
		    <td width="400" align="left" valign="middle">{fac_schol_cost_menu}</td>
	    </tr>
        <tr>
			<td width="150" align="left" valign="middle">Do you require a single room or would you share a room (2 beds) with another faculty member?</td>
		    <td width="400" align="left" valign="middle">{fac_room_menu}</td>
	    </tr>
        <tr>
        <td>If you are willing to share, do you have a requested roommate?</td>
        <td><input type="text" name="fac[0][roomate]" id="fac[0][roomate]" value="{fac_0_roomate}" size="30"/></td>
                  </tr>
      </table>
     </div>
    </div>
        <div id="divs" class="box">
     <h3>Enter your information.</h3>
     <table width="100%" class="default">
    	<tr>
			<td width="150" align="left" valign="middle">Enter School Name:</td>
		    <td width="400" align="left" valign="middle"><input type="text" name="stu[0][college]" id="stu[0][college]" value="{stu_0_college}" size="50"/></td>
	    </tr>
      </table>
     
    <table width="100%" class="default2">
    
       	<tr>
                        <td width="28%">First Name</td>
                        <td width="72%"><input type="text" name="stu[0][fname]" id="stu[0][fname]" value="{stu_0_fname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="stu[0][lname]" id="stu[0][lname]" value="{stu_0_lname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{student_gender_menu}</td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td><input type="text" name="stu[0][email]" id="stu[0][email]" value="{stu_0_email}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Re-enter Email Address</td>
                        <td><input type="text" name="stu[0][email2]" id="stu[0][email2]" value="{stu_0_email2}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Phone Contact</td>
                        <td><input type="text" name="stu[0][phone]" id="stu[0][phone]" value="{stu_0_phone}" size="30"/></td>
                  </tr>
                  <tr>
                        <td>Special Accommodations</td>
                        <td><textarea name="stu[0][accom]" id="stu[0][accom]" rows="5" cols="30">{stu_0_accom}</textarea></td>
                  </tr>
                  <tr>
                        <td>Meal Restrictions</td>
                        <td><textarea name="stu[0][meal]" id="stu[0][meal]" rows="5" cols="30">{stu_0_meal}</textarea></td>
                  </tr>
                        <tr>
             <td colspan="2">NOTE: Due to Keenland running during the dates of April 10-11 hotel room availability is limited and will fe first come first serve as part of the conference fees. In order to accommodate as many attendees as possible, please answer the following:</td>

           </tr>
                  <tr>
             <td>Will you be needing hotel accommodations?</td>
             <td>{student_accommodations_menu}</td>
           </tr>
      </table>
     <div id="divs_h" class="box">
     <h3>Hotel accommodations.</h3>
     <table width="100%" class="default">
     
      <tr>
             <td colspan="2">The hotel will be covered as part of your registration.  In order to keep costs as low as possible we will require students to share rooms (separate beds).  We will make every effort to have 2 students to a 2 bed room, but should there be a need we may need to be 3 students (separate beds) in a suite.</td>

           </tr>
    	<tr>
			<td width="150" align="left" valign="middle">Would you like someone to contact you with details about reserving a single room at your own cost?</td>
		    <td width="400" align="left" valign="middle">{stu_room_menu}</td>
	    </tr>
        
        <tr>
        <td>Do you have a requested roommate?</td>
        <td><input type="text" name="stu[0][roomate]" id="stu[0][roomate]" value="{stu_0_roomate}" size="30"/></td>
                  </tr>
      </table>
     </div>                
                
       
    </div>
         <div id="divb" class="box">
          <h3>Enter your information.</h3>
         <table width="100%" class="default2">
        <tr>
			<td width="150" align="left" valign="middle">Enter Business Name:</td>
		    <td width="400" align="left" valign="middle"><input type="text" name="business_name" id="business_name" value="{business_name}" size="30"/></td>
	    </tr>
           <tr>
             <td width="28%">First Name</td>
             <td width="72%"><input type="text" name="business[0][fname]" id="business[0][fname]" value="{business_0_fname}" size="30"/></td>
           </tr>
           <tr>
             <td>Last Name</td>
             <td><input type="text" name="business[0][lname]" id="business[0][lname]" value="{business_0_lname}" size="30"/></td>
           </tr>
           <tr>
                        <td>Gender</td>
                        <td>{business_gender_menu}</td>
                    </tr>
           <tr>
             <td>Email Address</td>
             <td><input type="text" name="business[0][email]" id="business[0][email]" value="{business_0_email}" size="30"/></td>
           </tr>
           <tr>
             <td>Re-enter Email Address</td>
             <td><input type="text" name="business[0][email2]" id="business[0][email2]" value="{business_0_email2}" size="30"/></td>
           </tr>
           <tr>
             <td>Phone Contact</td>
             <td><input type="text" name="business[0][phone]" id="business[0][phone]" value="{business_0_phone}" size="30"/></td>
           </tr>
           <tr>
             <td>Special Accommodations</td>
             <td><textarea name="business[0][accom]" id="business[0][accom]" rows="5" cols="30">{business_0_accom}</textarea></td>
           </tr>
           <tr>
             <td>Meal Restrictions</td>
             <td><textarea name="business[0][meal]" id="business[0][meal]" rows="5" cols="30">{business_0_meal}</textarea></td>
           </tr>
                 <tr>
             <td colspan="2">NOTE: Due to Keenland running during the dates of April 10-11 hotel room availability is limited and will fe first come first serve as part of the conference fees. In order to accommodate as many attendees as possible, please answer the following:</td>

           </tr>
           <tr>
             <td>Would you like someone to contact you regarding overnight accommodations?</td>
             <td>{business_accommodations_menu}</td>
           </tr>
         </table>
     </div>
                    
      <table>
      	<tr>
			<td colspan="2"><input name="submit" type="submit" class="formbutton" id="submit" value="Register" /></td>

	     </tr>
	   </table>          
     <input type='hidden' value='testing' id='HiddenInput' enableviewstate="true"/>               
                    
  </form>
              
              
		          
                
                
