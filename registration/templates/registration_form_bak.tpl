<script type="text/javascript" src="./js/jquery-1.5.1.min.js"></script>


<script type="text/JavaScript">

$(document).ready(function(){

   $('.box').hide();
  // First Way :

   $('#HiddenInput').empty();
   $('#HiddenInput').val($('#registration_type').val());
   var value =  $('#HiddenInput').val();
   $('#registration_type').val(value);
   $('#div' + value).show();


   $('#registration_type').change(function() {
      $('.box').hide();
      $('#HiddenInput').val($(this).val());
      $('#div' + $(this).val()).show();
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
    <div id="divc" class="box">
     <table width="100%" class="default">
    	<tr>
			<td width="150" align="left" valign="middle">Select Community College:</td>
		    <td width="400" align="left" valign="middle">{college_menu}</td>
	    </tr>
      </table>
      <h3>You can register up to two (2) faculty members.</h3>
    <table width="100%" class="default2">
    
<tr>
       		<td align="left" valign="middle">
            	<table width="100%" id="faculty_table_0" border="0">
                	<tr>
        				<th colspan="2">First Faculty Member</th>
   				  </tr>
            		<tr>
                        <td>First Name</td>
                        <td><input type="text" name="faculty[0][fname]" id="faculty[0][fname]" value="{faculty_0_fname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="faculty[0][lname]" id="faculty[0][lname]" value="{faculty_0_lname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td><input type="text" name="faculty[0][email]" id="faculty[0][email]" value="{faculty_0_email}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Phone Contact</td>
                        <td><input type="text" name="faculty[0][phone]" id="faculty[0][phone]" value="{faculty_0_phone}" size="30"/></td>
                  </tr>
                  <tr>
                        <td>Special Accommodations</td>
                        <td><textarea name="faculty[0][accom]" id="faculty[0][accom]" rows="5" cols="30">{faculty_0_accom}</textarea></td>
                  </tr>
                  <tr>
                        <td>Meal Restrictions</td>
                        <td><textarea name="faculty[0][meal]" id="faculty[0][meal]" rows="5" cols="30">{faculty_0_meal}</textarea></td>
                  </tr>
                      
                </table>
                 
            </td>
            <td align="left" valign="middle">
            	<table width="100%" id="faculty_table_1" border="0">
                	<tr>
        				<th colspan="2">Second Faculty Member</th>
   				  </tr>
            		<tr>
                        <td>First Name</td>
                        <td><input type="text" name="faculty[1][fname]" id="faculty[1][fname]" value="{faculty_1_fname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="faculty[1][lname]" id="faculty[1][lname]" value="{faculty_1_lname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td><input type="text" name="faculty[1][email]" id="faculty[1][email]" value="{faculty_1_email}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Phone Contact</td>
                        <td><input type="text" name="faculty[1][phone]" id="faculty[1][phone]" value="{faculty_1_phone}" size="30"/></td>
                  </tr>
                  <tr>
                        <td>Special Accommodations</td>
                        <td><textarea name="faculty[1][accom]" id="faculty[1][accom]" rows="5" cols="30">{faculty_1_accom}</textarea></td>
                  </tr>
                  <tr>
                        <td>Meal Restrictions</td>
                        <td><textarea name="faculty[1][meal]" id="faculty[1][meal]" rows="5" cols="30">{faculty_1_meal}</textarea></td>
                  </tr>
                      
                </table>
                 
            </td>
      </tr>
        
                      
      </table>
                
                <h3>You can register up to two (2) students.</h3>
                
      <table width="100%" class="default2">
               
<tr>
       		<td align="left" valign="middle">
            	<table width="100%" id="student_table_0" border="0">
                <tr>
        				<th colspan="2">First Student</th>
       				 </tr>
            		<tr>
                        <td>First Name</td>
                        <td><input type="text" name="student[0][fname]" id="student[0][fname]" value="{student_0_fname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="student[0][lname]" id="student[0][lname]" value="{student_0_lname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td><input type="text" name="student[0][email]" id="student[0][email]" value="{student_0_email}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Phone Contact</td>
                        <td><input type="text" name="student[0][phone]" id="student[0][phone]" value="{student_0_phone}" size="30"/></td>
                  </tr>
                   <tr>
                        <td>Special Accommodations</td>
                        <td><textarea name="student[0][accom]" id="student[0][accom]" rows="5" cols="30">{student_0_accom}</textarea></td>
                  </tr>
                  <tr>
                        <td>Meal Restrictions</td>
                        <td><textarea name="student[0][meal]" id="student[0][meal]" rows="5" cols="30">{student_0_meal}</textarea></td>
                  </tr>
                </table>
                 
            </td>
            <td align="left" valign="middle">
            	<table width="100%" id="student_table_1" border="0">
                <tr>
        				<th colspan="2">Second Student</th>
       				 </tr>
            		<tr>
                        <td>First Name</td>
                        <td><input type="text" name="student[1][fname]" id="student[1][fname]" value="{student_1_fname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="student[1][lname]" id="student[1][lname]" value="{student_1_lname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td><input type="text" name="student[1][email]" id="student[1][email]" value="{student_1_email}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Phone Contact</td>
                        <td><input type="text" name="student[1][phone]" id="student[1][phone]" value="{student_1_phone}" size="30"/></td>
                  </tr>
                  <tr>
                        <td>Special Accommodations</td>
                        <td><textarea name="student[1][accom]" id="student[1][accom]" rows="5" cols="30">{student_1_accom}</textarea></td>
                  </tr>
                  <tr>
                        <td>Meal Restrictions</td>
                        <td><textarea name="student[1][meal]" id="student[1][meal]" rows="5" cols="30">{student_1_meal}</textarea></td>
                  </tr>
                      
                </table>
                 
            </td>
        </tr>
     </table>
    </div>
         <div id="divb" class="box">
         
         <h3>You can register up to six (6) members</h3>
    
    <table width="100%" class="default2">
    	<tr>
       		<td align="left" valign="middle">
            	<table width="100%" id="business_table_0" border="0">
                	<tr>
        				<th colspan="2">First Member</th>
       				 </tr>
            		<tr>
                        <td>First Name</td>
                        <td><input type="text" name="business[0][fname]" id="business[0][fname]" value="{business_0_fname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="business[0][lname]" id="business[0][lname]" value="{business_0_lname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td><input type="text" name="business[0][email]" id="business[0][email]" value="{business_0_email}" size="30"/></td>
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
                      
                </table>
                 
            </td>
            <td align="left" valign="middle">
            	<table width="100%" id="business_table_1" border="0">
                	<tr>
        				<th colspan="2">Second Member</th>
       				 </tr>
            		<tr>
                        <td>First Name</td>
                        <td><input type="text" name="business[1][fname]" id="business[1][fname]" value="{business_1_fname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="business[1][lname]" id="business[1][lname]" value="{business_1_lname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td><input type="text" name="business[1][email]" id="business[1][email]" value="{business_1_email}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Phone Contact</td>
                        <td><input type="text" name="business[1][phone]" id="business[1][phone]" value="{business_1_phone}" size="30"/></td>
                  </tr>
                  <tr>
                        <td>Special Accommodations</td>
                        <td><textarea name="business[1][accom]" id="business[1][accom]" rows="5" cols="30">{business_1_accom}</textarea></td>
                  </tr>
                  <tr>
                        <td>Meal Restrictions</td>
                        <td><textarea name="business[1][meal]" id="business[1][meal]" rows="5" cols="30">{business_1_meal}</textarea></td>
                  </tr>
                      
                </table>
                 
            </td>
        </tr>
        <tr>
       		<td align="left" valign="middle">
            	<table width="100%" id="business_table_2" border="0">
                <tr>
        				<th colspan="2">Third Member</th>
       				 </tr>
            		<tr>
                        <td>First Name</td>
                        <td><input type="text" name="business[2][fname]" id="business[2][fname]" value="{business_2_fname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="business[2][lname]" id="business[2][lname]" value="{business_2_lname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td><input type="text" name="business[2][email]" id="business[2][email]" value="{business_2_email}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Phone Contact</td>
                        <td><input type="text" name="business[2][phone]" id="business[2][phone]" value="{business_2_phone}" size="30"/></td>
                  </tr>
                  <tr>
                        <td>Special Accommodations</td>
                        <td><textarea name="business[2][accom]" id="business[2][accom]" rows="5" cols="30">{business_2_accom}</textarea></td>
                  </tr>
                  <tr>
                        <td>Meal Restrictions</td>
                        <td><textarea name="business[2][meal]" id="business[2][meal]" rows="5" cols="30">{business_2_meal}</textarea></td>
                  </tr>
                      
                </table>
                 
            </td>
            <td align="left" valign="middle">
            	<table width="100%" id="business_table_3" border="0">
                <tr>
        				<th colspan="2">Fourth Member</th>
       				 </tr>
            		<tr>
                        <td>First Name</td>
                        <td><input type="text" name="business[3][fname]" id="business[3][fname]" value="{business_3_fname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="business[3][lname]" id="business[3][lname]" value="{business_3_lname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td><input type="text" name="business[3][email]" id="business[3][email]" value="{business_3_email}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Phone Contact</td>
                        <td><input type="text" name="business[3][phone]" id="business[3][phone]" value="{business_3_phone}" size="30"/></td>
                  </tr>
                  <tr>
                        <td>Special Accommodations</td>
                        <td><textarea name="business[3][accom]" id="business[3][accom]" rows="5" cols="30">{business_3_accom}</textarea></td>
                  </tr>
                  <tr>
                        <td>Meal Restrictions</td>
                        <td><textarea name="business[3][meal]" id="business[3][meal]" rows="5" cols="30">{business_3_meal}</textarea></td>
                  </tr>
                      
                </table>
                 
            </td>
        </tr>
        <tr>
       		<td align="left" valign="middle">
            	<table width="100%" id="business_table_4" border="0">
                <tr>
        				<th colspan="2">Fifth Member</th>
       				 </tr>
            		<tr>
                        <td>First Name</td>
                        <td><input type="text" name="business[4][fname]" id="business[4][fname]" value="{business_4_fname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="business[4][lname]" id="business[4][lname]" value="{business_4_lname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td><input type="text" name="business[4][email]" id="business[4][email]" value="{business_4_email}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Phone Contact</td>
                        <td><input type="text" name="business[4][phone]" id="business[4][phone]" value="{business_4_phone}" size="30"/></td>
                  </tr>
                  <tr>
                        <td>Special Accommodations</td>
                        <td><textarea name="business[4][accom]" id="business[4][accom]" rows="5" cols="30">{business_4_accom}</textarea></td>
                  </tr>
                  <tr>
                        <td>Meal Restrictions</td>
                        <td><textarea name="business[4][meal]" id="business[4][meal]" rows="5" cols="30">{business_4_meal}</textarea></td>
                  </tr>
                      
                </table>
                 
            </td>
            <td align="left" valign="middle">
            	<table width="100%" id="business_table_5" border="0">
                <tr>
        				<th colspan="2">Sixth Member</th>
       				 </tr>
            		<tr>
                        <td>First Name</td>
                        <td><input type="text" name="business[5][fname]" id="business[5][fname]" value="{business_5_fname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="business[5][lname]" id="business[5][lname]" value="{business_5_lname}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Email Address</td>
                        <td><input type="text" name="business[5][email]" id="business[5][email]" value="{business_5_email}" size="30"/></td>
                    </tr>
                    <tr>
                        <td>Phone Contact</td>
                        <td><input type="text" name="business[5][phone]" id="business[5][phone]" value="{business_5_phone}" size="30"/></td>
                  </tr>
                  <tr>
                        <td>Special Accommodations</td>
                        <td><textarea name="business[5][accom]" id="business[5][accom]" rows="5" cols="30">{business_5_accom}</textarea></td>
                  </tr>
                  <tr>
                        <td>Meal Restrictions</td>
                        <td><textarea name="business[5][meal]" id="business[5][meal]" rows="5" cols="30">{business_5_meal}</textarea></td>
                  </tr>
                      
                </table>
                 
            </td>
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
              
              
		          
                
                
