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

  <div class="form-group">
    <label for="registration_type">Select Registration Type</label>
    {registration_type_menu}
  </div>

  <div id="divf" class="box">
    <h3>Enter your information</h3>
    
    <div class="form-group">
      <label for="fac[0][college]">Enter School Name</label>
      <input type="text" class="form-control" name="fac[0][college]" id="fac[0][college]" value="{fac_0_college}" size="50"/>
    </div>
  
    <div class="form-group">
      <label for="fac[0][fname]">First Name</label>
      <input type="text" class="form-control" name="fac[0][fname]" id="fac[0][fname]" value="{fac_0_fname}" size="30"/>
    </div>
    
    <div class="form-group">
      <label for="fac[0][lname]">Last Name</label>
      <input type="text" class="form-control" name="fac[0][lname]" id="fac[0][lname]" value="{fac_0_lname}" size="30"/>
    </div>
    
    <div class="form-group">
      <label>Gender</label>
      {faculty_gender_menu}
    </div>
    
    <div class="form-group">
      <label for="fac[0][email]">Email Address</label>
      <input type="text" class="form-control" name="fac[0][email]" id="fac[0][email]" value="{fac_0_email}" size="30"/>
    </div>
    
    <div class="form-group">
      <label for="fac[0][email2]">Re-enter Email Address</label>
      <input type="text" class="form-control" name="fac[0][email2]" id="fac[0][email2]" value="{fac_0_email2}" size="30"/>
    </div>
    
    <div class="form-group">
      <label for="fac[0][phone]">Phone Contact</label>
      <input type="text" class="form-control" name="fac[0][phone]" id="fac[0][phone]" value="{fac_0_phone}" size="30"/>
    </div>
    
    <div class="form-group">
      <label for="fac[0][accom]">Special Accommodations</label>
      <textarea name="fac[0][accom]" class="form-control" id="fac[0][accom]" rows="5" cols="30">{fac_0_accom}</textarea>
    </div>
    
    <div class="form-group">
      <label for="fac[0][meal]">Meal Restrictions</label>
      <textarea name="fac[0][meal]" class="form-control" id="fac[0][meal]" rows="5" cols="30">{fac_0_meal}</textarea>
    </div>
    
    <p>
    NOTE: Due to Keeneland running during the dates of April 10-11 hotel room availability is limited and will be first come first serve as part of the conference fees. In order to accommodate as many attendees as possible, please answer the following:
    </p>
    
    <div class="form-group">
      <label>Will you be needing hotel accommodations?</label>
      {faculty_accommodations_menu} 
    </div>
   
    <div id="divf_h">
       <h3>Hotel accommodations</h3>
       <div class="form-group">
        <label>Are you requesting scholarship to cover hotel costs?</label>
        {fac_schol_cost_menu}
       </div>
       
       <div class="form-group">
        <label>Do you require a single room or would you share a room (2 beds) with another faculty member?</label>
        {fac_room_menu}
       </div>
       
       <div class="form-group">
        <label for="fac[0][roomate]">If you are willing to share, do you have a requested roommate?</label>
        <input type="text" class="form-control" name="fac[0][roomate]" id="fac[0][roomate]" value="{fac_0_roomate}" size="30"/>
       </div>

     </div> <!-- divf_h //-->
  </div> <!-- divf //-->
  
  <div id="divs" class="box">
    <h3>Enter your information</h3>
     
    <div class="form-group">
      <label>Enter School Name</label>
      <input type="text" class="form-control" name="stu[0][college]" id="stu[0][college]" value="{stu_0_college}" size="50"/>
    </div>

    <div class="form-group">
      <label>First Name</label>
      <input type="text" class="form-control" name="stu[0][fname]" id="stu[0][fname]" value="{stu_0_fname}" size="30"/>
    </div>

    <div class="form-group">
      <label>Last Name</label>
      <input type="text" class="form-control" name="stu[0][lname]" id="stu[0][lname]" value="{stu_0_lname}" size="30"/>
    </div>     

    <div class="form-group">
      <label>Gender</label>
      {student_gender_menu}
    </div>

    <div class="form-group">
      <label>Email Address</label>
      <input type="text" class="form-control" name="stu[0][email]" id="stu[0][email]" value="{stu_0_email}" size="30"/>
    </div>
    
    <div class="form-group">
      <label>Re-enter Email Address</label>
      <input type="text" class="form-control" name="stu[0][email2]" id="stu[0][email2]" value="{stu_0_email2}" size="30"/>
    </div>

    <div class="form-group">
      <label>Phone Contact</label>
      <input type="text" class="form-control" name="stu[0][phone]" id="stu[0][phone]" value="{stu_0_phone}" size="30"/>
    </div>
    
    <div class="form-group">
      <label>Special Accommodations</label>
      <textarea name="stu[0][accom]" class="form-control" id="stu[0][accom]" rows="5" cols="30">{stu_0_accom}</textarea>
    </div>

    <div class="form-group">
      <label>Meal Restrictions</label>
      <textarea name="stu[0][meal]" class="form-control" id="stu[0][meal]" rows="5" cols="30">{stu_0_meal}</textarea>
    </div>
    
    <p>
    NOTE: Due to Keeneland running during the dates of April 10-11 hotel room availability is limited and will be first come first serve as part of the conference fees. In order to accommodate as many attendees as possible, please answer the following:
    </p>
    
    <div class="form-group">
      <label>Will you be needing hotel accommodations?</label>
      {student_accommodations_menu}
    </div>


    <div id="divs_h">
     <h3>Hotel accommodations</h3>
     <p>
     The hotel will be covered as part of your registration.  In order to keep costs as low as possible we will require students to share rooms (separate beds).  We will make every effort to have 2 students to a 2 bed room, but should there be a need we may need to be 3 students (separate beds) in a suite.
     </p>

     <div class="form-group">
      <label>Would you like someone to contact you with details about reserving a single room at your own cost?</label>
      {stu_room_menu}
     </div>
     
     <div class="form-group">
      <label>Do you have a requested roommate?</label>
      <input type="text" class="form-control" name="stu[0][roomate]" id="stu[0][roomate]" value="{stu_0_roomate}" size="30"/>
     </div>
     
     </div>  <!-- divs_h //-->              
                   
  </div> <!-- divs //-->
    
  <div id="divb" class="box">
      <h3>Enter your information</h3>
      
      <div class="form-group">
        <label>Enter Business Name</label>
        <input type="text" class="form-control" name="business_name" id="business_name" value="{business_name}" size="30"/>
      </div>
      
      <div class="form-group">
        <label>First Name</label>
        <input type="text" class="form-control" name="business[0][fname]" id="business[0][fname]" value="{business_0_fname}" size="30"/>
      </div>
      
      <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" name="business[0][lname]" id="business[0][lname]" value="{business_0_lname}" size="30"/>
      </div>
      
      <div class="form-group">
        <label>Gender</label>
        {business_gender_menu}
      </div>

      <div class="form-group">
        <label>Email Address</label>
        <input type="text" class="form-control" name="business[0][email]" id="business[0][email]" value="{business_0_email}" size="30"/>
      </div>

      <div class="form-group">
        <label>Re-enter Email Address</label>
        <input type="text" class="form-control" name="business[0][email2]" id="business[0][email2]" value="{business_0_email2}" size="30"/>
      </div>
      
      <div class="form-group">
        <label>Phone Contact</label>
        <input type="text" class="form-control" name="business[0][phone]" id="business[0][phone]" value="{business_0_phone}" size="30"/>
      </div>
      
      <div class="form-group">
        <label>Special Accommodations</label>
        <textarea name="business[0][accom]" class="form-control" id="business[0][accom]" rows="5" cols="30">{business_0_accom}</textarea>
      </div>      
      
      <div class="form-group">
        <label>Meal Restrictions</label>
        <textarea name="business[0][meal]" class="form-control" id="business[0][meal]" rows="5" cols="30">{business_0_meal}</textarea>
      </div>
      
      <p>NOTE: Due to Keeneland running during the dates of April 10-11 hotel room availability is limited and will be first come first serve as part of the conference fees. In order to accommodate as many attendees as possible, please answer the following:
      </p>
      
      <div class="form-group">
        <label>Would you like someone to contact you regarding overnight accommodations?</label>
        {business_accommodations_menu}
      </div>
     </div> <!-- divb //-->
                    
    <input name="submit" type="submit" class="btn btn-default" id="submit" value="Register" />

        
     <input type='hidden' value='testing' id='HiddenInput' enableviewstate="true"/>               
                    
  </form>
              
              
		          
                
                
