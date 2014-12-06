                                <?
include ('./classes/db.class_qx.php');
include ('./classes/template.class.php');
include ('./wic_config.inc.php');
include ('./common.php');


$template = new Template('./templates');



	$title = "Kentucky Community College - Women in Computing";
	//$breadcrumb = '<a href="' . $module[$stump_file]['basename'] . '.php">' . $module[$stump_file]['displayname'] . '</a>' . $language['layout']['breadcrumb_sep'] . 'Submit ITS Assistance Request';
	$breadcrumb = 'Register';
	
	$hideform = false;
	/*$student_record = new students();
	$student_record->db = new db();
	$program_list = $student_record->get_program_list();
	$credential_level_list = $student_record->get_credential_level_list();
	*/
	//foreach($_SERVER as $k => $v)
	//	echo "$k => $v <br/>";
	
	if (isset($_POST['submit']) )
	{
		
		//echo $_POST['pid'];
		//exit;
		
		//foreach($_POST['fac'][0] as $k => $v)
		//	echo "$k => $v <br/>";
	//exit;
		
		
		$registration_type = $_POST['registration_type'];
		//$error[] = 'Test error';
		if ($registration_type == 'f'){
			$fac_college = trim(stripslashes($_POST['fac'][0]['college']));
			//$role = $_POST['role'];
			//echo $fac_college;
			//exit;
			if ($fac_college == '' ) $error[] = "Please enter your school name.";
			//if ($role == '') $error[] = "Please indicat if you are faculty or student";
			$fac[0]['fname']=trim(stripslashes($_POST['fac'][0]['fname']));
			$fac[0]['lname']=trim(stripslashes($_POST['fac'][0]['lname']));
			$fac[0]['gender']=trim(stripslashes($_POST['fac'][0]['gender']));
			$fac[0]['email']=trim(stripslashes($_POST['fac'][0]['email']));
			$fac[0]['email2']=trim(stripslashes($_POST['fac'][0]['email2']));
			$fac[0]['phone']=trim(stripslashes($_POST['fac'][0]['phone']));
			$fac[0]['accom']=trim(stripslashes($_POST['fac'][0]['accom']));
			$fac[0]['meal']=trim(stripslashes($_POST['fac'][0]['meal']));
			
			$fac_hotel = trim(stripslashes($_POST['fac_hotel']));
			$fac[0]['schol_cost'] = trim(stripslashes($_POST['fac'][0]['schol_cost']));
			
			$fac[0]['room'] = trim(stripslashes($_POST['fac'][0]['room']));
			
			$fac[0]['roomate'] = trim(stripslashes($_POST['fac'][0]['roomate']));
																	   
																		
			if ($fac[0]['fname'] == '') $error[] = 'Please enter your first name.';
			if ($fac[0]['lname'] == '') $error[] = 'Please enter your last name.';
			if ($fac[0]['gender'] != 'f' && $fac[0]['gender'] != 'm' ) $error[] = 'Please enter your gender.';
			if ($fac_hotel == '' ) $error[] = 'Please specify if you will be needing hotel accommodations.';
			
			if (!validEmail($fac[0]['email'])) $error[] = 'Please enter a valid email address.';
			if ($fac[0]['email'] != $fac[0]['email2']) $error[] = 'Email addresses do not match';
			if (!validPhone($fac[0]['phone'])) $error[] = 'Please enter a valid phone number e.g. 888-888-8888.';
			
			
			if ($fac_hotel == 'y'){
				if ($fac[0]['schol_cost'] == '' ) $error[] = 'Please specify if you are requesting scholarship to cover hotel costs.';
				if ($fac[0]['room'] == '' ) $error[] = 'Please specify if you require a single room or share.';
			}
			else{
				$fac[0]['schol_cost'] = '';
				$fac[0]['room'] = '';
				$fac[0]['roomate'] = '';
				
			}
			
			
			
			
			if (count($error) < 1 ){
				//Lets build the query to insert the records in the database
				$insert_query = "INSERT INTO wic_participants(type, col_bus, fname, lname, gender, email, phone, accom, meal, hotel, schol_cost, room, roomate, submitted_date_time) VALUES ('Faculty', '$fac_college', '{$fac[0]['fname']}', '{$fac[0]['lname']}',  '{$fac[0]['gender']}', '{$fac[0]['email']}', '{$fac[0]['phone']}', '{$fac[0]['accom']}', '{$fac[0]['meal']}',  '$fac_hotel', '{$fac[0]['schol_cost']}', '{$fac[0]['room']}', '{$fac[0]['roomate']}', NOW())";
				
				
				//echo $insert_query;
				//exit;
			}
			
		}
		
		elseif ($registration_type == 's'){
			$stu_college = trim(stripslashes($_POST['stu'][0]['college']));
			//$role = $_POST['role'];
			if ($stu_college == '' ) $error[] = "Please enter your school name.";
			//if ($role == '') $error[] = "Please indicat if you are faculty or student";
			$stu[0]['fname']=trim(stripslashes($_POST['stu'][0]['fname']));
			$stu[0]['lname']=trim(stripslashes($_POST['stu'][0]['lname']));
			$stu[0]['gender']=trim(stripslashes($_POST['stu'][0]['gender']));
			$stu[0]['email']=trim(stripslashes($_POST['stu'][0]['email']));
			$stu[0]['email2']=trim(stripslashes($_POST['stu'][0]['email2']));
			$stu[0]['phone']=trim(stripslashes($_POST['stu'][0]['phone']));
			$stu[0]['accom']=trim(stripslashes($_POST['stu'][0]['accom']));
			$stu[0]['meal']=trim(stripslashes($_POST['stu'][0]['meal']));
			$stu_hotel=trim(stripslashes($_POST['stu_hotel']));
			
			$stu[0]['room']=trim(stripslashes($_POST['stu'][0]['room']));
			$stu[0]['roomate']=trim(stripslashes($_POST['stu'][0]['roomate']));
																		
			if ($stu[0]['fname'] == '') $error[] = 'Please enter your first name.';
			if ($stu[0]['lname'] == '') $error[] = 'Please enter your last name.';
			if ($stu[0]['gender'] != 'f' && $stu[0]['gender'] != 'm') $error[] = 'Please enter your gender.';
			if ($stu_hotel == '' ) $error[] = 'Please specify if you will be needing hotel accommodations.';
			if (!validEmail($stu[0]['email'])) $error[] = 'Please enter a valid email address.';
			if ($stu[0]['email'] != $stu[0]['email2']) $error[] = 'Email addresses do not match';
			if (!validPhone($stu[0]['phone'])) $error[] = 'Please enter a valid phone number e.g. 888-888-8888.';
			
			if ($stu_hotel == 'y'){
				if ($stu[0]['room'] == '' ) $error[] = 'Please specify if you would like someone to contact you with details about reserving a single room.';
			}
			else{
				$stu[0]['room'] = '';
				$stu[0]['roomate'] = '';
				
			}
			
			if (count($error) < 1 ){
				//Lets build the query to insert the records in the database
				$insert_query = "INSERT INTO wic_participants(type, col_bus, fname, lname, gender, email, phone, accom, meal, hotel, room, roomate, submitted_date_time) VALUES ('Student', '$stu_college', '{$stu[0]['fname']}', '{$stu[0]['lname']}',  '{$stu[0]['gender']}', '{$stu[0]['email']}', '{$stu[0]['phone']}', '{$stu[0]['accom']}', '{$stu[0]['meal']}',  '$stu_hotel', '{$stu[0]['room']}', '{$stu[0]['roomate']}', NOW())";
				
				
				//echo $insert_query;
				//exit;
			}
			
		}
		
		
		elseif ($registration_type == 'b'){
			$business_name = trim(stripslashes($_POST['business_name']));
			//if ($college == '' ){
			//	$error[] = "Please select your Communtiy College";
			//}
			$business[0]['fname']=trim(stripslashes($_POST['business'][0]['fname']));
			$business[0]['lname']=trim(stripslashes($_POST['business'][0]['lname']));
			$business[0]['gender']=trim(stripslashes($_POST['business'][0]['gender']));
			$business[0]['email']=trim(stripslashes($_POST['business'][0]['email']));
			$business[0]['email2']=trim(stripslashes($_POST['business'][0]['email2']));
			$business[0]['phone']=trim(stripslashes($_POST['business'][0]['phone']));
			$business[0]['accom']=trim(stripslashes($_POST['business'][0]['accom']));
			$business[0]['meal']=trim(stripslashes($_POST['business'][0]['meal']));
			$business_hotel=trim(stripslashes($_POST['business_hotel']));
			
			if ($business_name == '') $error[] = 'Please enter your business name.';
			if ($business[0]['fname'] == '') $error[] = 'Please enter your first name.';
			if ($business[0]['lname'] == '') $error[] = 'Please enter your last name.';
			if ($business[0]['gender'] != 'f' && $business[0]['gender'] != 'm' ) $error[] = 'Please enter your gender.';
			
			if ($business_hotel == '') $error[] = 'Please specify if you like someone to contact you regarding overnight accommodations.';
			
			if (!validEmail($business[0]['email'])) $error[] = 'Please enter a valid email address.';
			if ($business[0]['email'] != $business[0]['email2']) $error[] = 'Email addresses do not match.';
			if (!validPhone($business[0]['phone'])) $error[] = 'Please enter a valid phone number e.g. 888-888-8888.';
			
			if (count($error) < 1 ){
				//Lets build the query to insert the records in the database
				$insert_query = "INSERT INTO wic_participants(type, col_bus, fname, lname, gender, email, phone, accom, meal, hotel, submitted_date_time) VALUES ('Business', '$business_name', '{$business[0]['fname']}', '{$business[0]['lname']}',  '{$business[0]['gender']}', '{$business[0]['email']}', '{$business[0]['phone']}', '{$business[0]['accom']}', '{$business[0]['meal']}',  '$business_hotel', NOW())";
				
				
				//echo $insert_query;
				//exit;
			}
		
			
		}
		else{
			$error[] = "Please select Registration Type";
		}
		
		if ($insert_query != '' && count($error) < 1){
			//conncet to the database and apply the query
			$db = new db('kyccwic_misc');
			//$db = new db('misc');
			//$insert_results = $db->db_query($insert_query);
			
			//echo mysql_insert_id() . '<br />';
			//print_r($insert_results);
			//exit;
			if ($db->db_query($insert_query)){
				//Get the id of the first record created
				$first_id = mysql_insert_id();
				$confirmation = $first_id + 1100;
				if ($registration_type == 'f'){
					$template->set_file('EmailMessage', 'email_faculty.tpl');
					$template->set_block('EmailMessage', 'Display', 'Display_finished');
		
					if ($fac_hotel == 'y'){
						$template->parse('Display_finished','Display', true);	
					}
			
					$template->set_var('col_bus_name', $fac_college);
					$template->set_var('fname', $fac[0]['fname']);
					$template->set_var('lname', $fac[0]['lname']);
					$template->set_var('email', $fac[0]['email']);
					$template->set_var('phone', $fac[0]['phone']);
					$template->set_var('accom', $fac[0]['accom']);
					$template->set_var('meal', $fac[0]['meal']);
					
					$template->set_var('hotel', $fac_hotel);
					$template->set_var('schol_cost', $fac[0]['schol_cost']);
					$template->set_var('room', $fac[0]['room']);
					$template->set_var('roomate', $fac[0]['roomate']);
					
					$to_email = $fac[0]['email'];
					$template->set_var('confirmation', $confirmation);
			
					
				}
				elseif ($registration_type == 's'){
					$template->set_file('EmailMessage', 'email_student.tpl');
					$template->set_block('EmailMessage', 'Display', 'Display_finished');
		
					if ($stu_hotel == 'y'){
						$template->parse('Display_finished','Display', true);	
					}
			
					$template->set_var('col_bus_name', $stu_college);
					$template->set_var('fname', $stu[0]['fname']);
					$template->set_var('lname', $stu[0]['lname']);
					$template->set_var('email', $stu[0]['email']);
					$template->set_var('phone', $stu[0]['phone']);
					$template->set_var('accom', $stu[0]['accom']);
					$template->set_var('meal', $stu[0]['meal']);
					
					$template->set_var('hotel', $stu_hotel);
					$room = ($fac[0]['room'] == 'single')? 'Yes' : 'No';
					$template->set_var('room', $room);
					$template->set_var('roomate', $stu[0]['roomate']);
					
					$to_email = $stu[0]['email'];
					$template->set_var('confirmation', $confirmation);
			
					
				}
				elseif ($registration_type == 'b'){
					$template->set_file('EmailMessage', 'email_business.tpl');
					$template->set_block('EmailMessage', 'Display', 'Display_finished');
		
					if ($business_hotel == 'y'){
						$template->parse('Display_finished','Display', true);	
					}
					$template->set_var('col_bus_name', $business_name);
					$template->set_var('fname', $business[0]['fname']);
					$template->set_var('lname', $business[0]['lname']);
					$template->set_var('email', $business[0]['email']);
					$template->set_var('phone', $business[0]['phone']);
					$template->set_var('accom', $business[0]['accom']);
					$template->set_var('meal', $business[0]['meal']);
					$template->set_var('hotel', $business_hotel);
					$to_email = $business[0]['email'];
					$template->set_var('confirmation', $confirmation);
					
					
				}
				$message = $template->parse('EmailMessage', 'EmailMessage');
				$template->set_file('PageBuild', 'confirmation.tpl');
				$template->set_var('email_message', $message);
				$body = $template->parse('PageBuild', 'PageBuild');
				
				$to  = $to_email; //??
				$subject = "Women in Computing Conference - Confirmation Email";
				$headers  = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
				
				$headers .= "From: Melanie Williamson <melanie.williamson@kctcs.edu>\r\n";
				$headers .= "BCC: thomas.papa@gmail.com\r\n";
				//$headers .= "From: Melanie Williamson <melanie.williamson@kctcs.edu>\r\n";
				//$headers .= "BCC: melanie.williamson@kctcs.edu, thomas.papa@kctcs.edu, cindy.tucker@kctcs.edu\r\n";
				//$headers .= "BCC: thomas.papa@gmail.com\r\n";

				
				//$message = $template->parse('Student_Email', 'Student_Email');
				$message = wordwrap($message, 70);
				
				if (send_email($to, $headers, $subject, $message)){
					$_POST = array();
				}
				else{
					$error[] = "There was a problem sending the email";
				}
				
				
				$hideform = true;
				
				
				
				//header("Location: ./confirmation.php");
				//exit;
			}
			else{
				$error[] = "There was a problem inserting the records in the database.";
			}
		}
		
	
	}
	
	
	

	if (!$hideform)
	{
		
		$template->set_file('REGISTERForm','registration_form.tpl');
		$template->set_var('phpself',$_SERVER['PHP_SELF']);
		$template->set_var('webroot',$config['webroot']);
		
		//$template->set_var('header_tabs',get_header_tabs($user->is_auth($module[$stump_file]['basename'],1)));
		
		$template->set_var('registration_type_menu',optionlist_array('registration_type', $config['wic']['registration_type'], $registration_type));
		
		//if ($registration_type == 'c'){
			//$template->set_var('college_menu',optionlist_array('college', $config['wic']['college'], $college));
			$template->set_var('fac_0_college',$fac_college);
			//$template->set_var('role_menu',optionlist_array('role', $config['wic']['role'], $role));
				$template->set_var('fac_0_fname', $fac[0]['fname']);
				$template->set_var('fac_0_lname', $fac[0]['lname']);
				$template->set_var('fac_0_phone', $fac[0]['phone']);
				$template->set_var('fac_0_email', $fac[0]['email']);
				$template->set_var('fac_0_email2', $fac[0]['email2']);
				$template->set_var('fac_0_accom', $fac[0]['accom']);
				$template->set_var('fac_0_meal', $fac[0]['meal']);
				$template->set_var('fac_0_roomate', $fac[0]['roomate']);
								
				$template->set_var('faculty_gender_menu',optionlist_array('fac[0][gender]', $config['wic']['gender'], $fac[0]['gender']));
				$template->set_var('faculty_accommodations_menu',optionlist_array('fac_hotel', $config['wic']['yes_no'], $fac_hotel));
				
				$template->set_var('fac_schol_cost_menu',optionlist_array('fac[0][schol_cost]', $config['wic']['yes_no'], $fac[0]['schol_cost']));
				
				$template->set_var('fac_room_menu',optionlist_array('fac[0][room]', $config['wic']['room'], $fac[0]['room']));
				
				
				$template->set_var('stu_0_college',$stu_college);
				$template->set_var('stu_0_fname', $stu[0]['fname']);
				$template->set_var('stu_0_lname', $stu[0]['lname']);
				$template->set_var('stu_0_phone', $stu[0]['phone']);
				$template->set_var('stu_0_email', $stu[0]['email']);
				$template->set_var('stu_0_email2', $stu[0]['email2']);
				$template->set_var('stu_0_accom', $stu[0]['accom']);
				$template->set_var('stu_0_meal', $stu[0]['meal']);
				
				$template->set_var('stu_0_roomate', $stu[0]['roomate']);
				
				$template->set_var('student_gender_menu',optionlist_array('stu[0][gender]', $config['wic']['gender'], $stu[0]['gender']));
				$template->set_var('student_accommodations_menu',optionlist_array('stu_hotel', $config['wic']['yes_no'], $stu_hotel));
				
				$template->set_var('stu_room_menu',optionlist_array('stu[0][room]', $config['wic']['room_yes_no'], $stu[0]['room']));
			
		//}
		//elseif ($registration_type == 'c'){
			$template->set_var('business_name', $business_name);
				$template->set_var('business_0_fname', $business[0]['fname']);
				$template->set_var('business_0_lname', $business[0]['lname']);
				$template->set_var('business_0_phone', $business[0]['phone']);
				$template->set_var('business_0_email', $business[0]['email']);
				$template->set_var('business_0_email2', $business[0]['email2']);
				$template->set_var('business_0_accom', $business[0]['accom']);
				$template->set_var('business_0_meal', $business[0]['meal']);
				
			$template->set_var('business_accommodations_menu',optionlist_array('business_hotel', $config['wic']['yes_no'], $business_hotel));
			$template->set_var('business_gender_menu',optionlist_array('business[0][gender]', $config['wic']['gender'], $business[0]['gender']));
			
			
		//}
		
		
		
		
		
		//$template->set_var('high_distinction_' . $student_record->high_distinction . '_sel', 'selected="selected"');
		
		
		
		
		
		
		
		
		$body .= $template->parse('REGISTERForm','REGISTERForm');
	}


/********************************* Stuff that is normally file-specific ends here  *********************************/

/* Include this so that the page is output */

require ('./page_framework.php');

?>
                            