<?
/* This is the dir right above the system should also have the shared lib directory */


/* Various functions follow */

/* Handy function to check that an entered email address is valid */

/**
Validate an email address.
Provide email address (raw input)
Returns true if the email address has the email 
address format and the domain exists.
*/
function validEmail($email)
{
   $isValid = true;
   $atIndex = strrpos($email, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($email, $atIndex+1);
      $local = substr($email, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // local part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // character not valid in domain part
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // domain part has two consecutive dots
         $isValid = false;
      }
      else if
(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',
                 str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless 
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/',
             str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
      if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
      {
         // domain not found in DNS
         $isValid = false;
      }
   }
   return $isValid;
}

function validPhone($number){
	$formats = array('###-###-####', '####-###-###', '(###) ###-###', '####-####-####', '##-###-####-####', '####-####', '###-###-###', '#####-###-###', '##########');
	$format = trim(ereg_replace("[0-9]", "#", $number));
	return (in_array($format, $formats)) ? true : false;
}

function is_email($email) {
    return preg_match('|^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]{2,})+$|i', $email);
}

/*

function is_email($email) {
	if (eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-z]{2,3}$", $email, $check)) {
		if ( getmxrr(substr(strstr($check[0], '@'), 1), $validate_email_temp) ) {
			return true;
		}
	} else {
	 return false;
	}
}
*/


/* Allows me to make a list of options for a select from an array */
function optionlist_array($sel_name, $items, $selected="", $sel_javascript="") {

	$return = '<select name="' . $sel_name . '" id="' . $sel_name . '"';
	
	if ($sel_javascript)
	{
		$return .= ' ' . $sel_javascript;
	}
	
	$return .= '>';
	
	$return .= '<option value="">&nbsp;</option>';
	foreach ($items as $key=>$value)
	{
		$return .= '<option value="' . $key . '"';
		if ($key == $selected)
		{
			$return .= ' selected="selected"';
		}
		$return .= '>' . $value . '</option>';
	}
	$return .= '</select>';
	return $return;
}

/* Allows me to make a list of options for a select from an array with no blank first choice*/
function optionlist_array_no_empty($sel_name, $items, $selected="", $sel_javascript="") {

	$return = '<select name="' . $sel_name . '" id="' . $sel_name . '"';
	
	if ($sel_javascript)
	{
		$return .= ' ' . $sel_javascript;
	}
	
	$return .= '>';
	
	foreach ($items as $key=>$value)
	{
		$return .= '<option value="' . $key . '"';
		if ($key == $selected)
		{
			$return .= ' selected="selected"';
		}
		$return .= '>' . $value . '</option>';
	}
	$return .= '</select>';
	return $return;
}

/* Allows me to make menu from an array */
function menulist_array($sel_name, $items, $selected='', $size='6') {

	$return = '<select name="' . $sel_name . '[]" id="' . $sel_name . '" size="'  .$size . '" multiple="multiple">';
	
	foreach ($items as $key=>$value)
	{
		$return .= '<option value="' . $key . '"';
		if (in_array($key,$selected))
		{
			$return .= ' selected="selected"';
		}
		$return .= '>' . $value . '</option>';
	}
	$return .= '</select>';
	return $return;
}

/* Allows me to make a list of checkboxes from an array */
function checklist_array($sel_name, $items,$checked='', $sep='<br />') {

	$total = count($items);
	$count = 0;

	foreach ($items as $key=>$value)
	{
		$return .= '<input type="checkbox" name="' . $sel_name . '[' . $count . ']" id="' . $sel_name . '[' . $count . ']" value="' . $key . '"';
		if (in_array($key,$checked))
		{
			$return .= ' checked="checked"';
		}
		$return .= ' /> ' . $value;
		
		if ($count < $total)
		{
			$return .= $sep;
		}
		
		$count++;
	}

	return $return;
}

/* Allows me to make a list of radio buttons from an array */
function radiolist_array($sel_name, $items,$checked='', $sep='<br />') {
	$total = count($items);
	$count = 0;
	
	foreach ($items as $key=>$value)
	{
		$return .= '<input type="radio" name="' . $sel_name . '" id="' . $sel_name . '" value="' . $key . '"';
		if ($key==$checked)
		{
			$return .= ' checked="checked"';
		}
		$return .= ' /> ' . $value;
		
		if ($count < $total)
		{
			$return .= $sep;
		}
		
		$count++;
	}
	return $return;
}

function check_status($value)
{
	if ($value)
	{
		return ' checked="checked"';
	}
}


function ethnicity_list($sel='')
{
  $return = "<option value=''" . ($sel==''?' selected':'').">&nbsp;</option>";
  $return .= "<option value='ai'".($sel=='ai'?' selected':'').">American Indian/Alaskan Native</option>";
  $return .= "<option value='as'".($sel=='as'?' selected':'').">Asian</option>";
  $return .= "<option value='ba'".($sel=='ba'?' selected':'').">Black/African-American</option>";
  $return .= "<option value='hl'".($sel=='hl'?' selected':'').">Hispanic/Latino</option>";
  $return .= "<option value='hp'".($sel=='hp'?' selected':'').">Native Hawaiian/Pacific Islander</option>";
  $return .= "<option value='wh'".($sel=='wh'?' selected':'').">White</option>";
  return $return;
}


function state_list($sel='')
{
  $return = "<option value=''" . ($sel==''?' selected':'').">&nbsp;</option>";
  $return .= "<option value='AL'".($sel=='AL'?' selected':'').">Alabama</option>";
  $return .= "<option value='AK'".($sel=='AK'?' selected':'').">Alaska</option>";
  $return .= "<option value='AZ'".($sel=='AZ'?' selected':'').">Arizona</option>";
  $return .= "<option value='AR'".($sel=='AR'?' selected':'').">Arkansas</option>";
  $return .= "<option value='CA'".($sel=='CA'?' selected':'').">California</option>";
  $return .= "<option value='CO'".($sel=='CO'?' selected':'').">Colorado</option>";
  $return .= "<option value='CT'".($sel=='CT'?' selected':'').">Connecticut</option>";
  $return .= "<option value='DE'".($sel=='DE'?' selected':'').">Delaware</option>";
  $return .= "<option value='DC'".($sel=='DC'?' selected':'').">District of Columbia</option>";
  $return .= "<option value='FL'".($sel=='FL'?' selected':'').">Florida</option>";
  $return .= "<option value='GA'".($sel=='GA'?' selected':'').">Georgia</option>";
  $return .= "<option value='HI'".($sel=='HI'?' selected':'').">Hawaii</option>";
  $return .= "<option value='ID'".($sel=='ID'?' selected':'').">Idaho</option>";
  $return .= "<option value='IL'".($sel=='IL'?' selected':'').">Illinois</option>";
  $return .= "<option value='IN'".($sel=='IN'?' selected':'').">Indiana</option>";
  $return .= "<option value='IA'".($sel=='IA'?' selected':'').">Iowa</option>";
  $return .= "<option value='KS'".($sel=='KS'?' selected':'').">Kansas</option>";
  $return .= "<option value='KY'".($sel=='KY'?' selected':'').">Kentucky</option>";
  $return .= "<option value='LA'".($sel=='LA'?' selected':'').">Louisiana</option>";
  $return .= "<option value='ME'".($sel=='ME'?' selected':'').">Maine</option>";
  $return .= "<option value='MD'".($sel=='MD'?' selected':'').">Maryland</option>";
  $return .= "<option value='MA'".($sel=='MA'?' selected':'').">Massachusetts</option>";
  $return .= "<option value='MI'".($sel=='MI'?' selected':'').">Michigan</option>";
  $return .= "<option value='MN'".($sel=='MN'?' selected':'').">Minnesota</option>";
  $return .= "<option value='MS'".($sel=='MS'?' selected':'').">Mississippi</option>";
  $return .= "<option value='MO'".($sel=='MO'?' selected':'').">Missouri</option>";
  $return .= "<option value='MT'".($sel=='MT'?' selected':'').">Montana</option>";
  $return .= "<option value='NE'".($sel=='NE'?' selected':'').">Nebraska</option>";
  $return .= "<option value='NV'".($sel=='NV'?' selected':'').">Nevada</option>";
  $return .= "<option value='NH'".($sel=='NH'?' selected':'').">New Hampshire</option>";
  $return .= "<option value='NJ'".($sel=='NJ'?' selected':'').">New Jersey</option>";
  $return .= "<option value='NM'".($sel=='NM'?' selected':'').">New Mexico</option>";
  $return .= "<option value='NY'".($sel=='NY'?' selected':'').">New York</option>";
  $return .= "<option value='NC'".($sel=='NC'?' selected':'').">North Carolina</option>";
  $return .= "<option value='ND'".($sel=='ND'?' selected':'').">North Dakota</option>";
  $return .= "<option value='OH'".($sel=='OH'?' selected':'').">Ohio</option>";
  $return .= "<option value='OK'".($sel=='OK'?' selected':'').">Oklahoma</option>";
  $return .= "<option value='OR'".($sel=='OR'?' selected':'').">Oregon</option>";
  $return .= "<option value='PA'".($sel=='PA'?' selected':'').">Pennsylvania</option>";
  $return .= "<option value='RI'".($sel=='RI'?' selected':'').">Rhode Island</option>";
  $return .= "<option value='SC'".($sel=='SC'?' selected':'').">South Carolina</option>";
  $return .= "<option value='SD'".($sel=='SD'?' selected':'').">South Dakota</option>";
  $return .= "<option value='TN'".($sel=='TN'?' selected':'').">Tennessee</option>";
  $return .= "<option value='TX'".($sel=='TX'?' selected':'').">Texas</option>";
  $return .= "<option value='UT'".($sel=='UT'?' selected':'').">Utah</option>";
  $return .= "<option value='VT'".($sel=='VT'?' selected':'').">Vermont</option>";
  $return .= "<option value='VA'".($sel=='VA'?' selected':'').">Virginia</option>";
  $return .= "<option value='WA'".($sel=='WA'?' selected':'').">Washington</option>";
  $return .= "<option value='WV'".($sel=='WV'?' selected':'').">West Virginia</option>";
  $return .= "<option value='WI'".($sel=='WI'?' selected':'').">Wisconsin</option>";
  $return .= "<option value='WY'".($sel=='WY'?' selected':'').">Wyoming</option>";
  
  return $return;
}


function state_list_short($sel='')
{
  $return = "<option value=''" . ($sel==''?' selected':'').">&nbsp;</option>";
  $return .= "<option value='AL'".($sel=='AL'?' selected':'').">AL</option>";
  $return .= "<option value='AK'".($sel=='AK'?' selected':'').">AK</option>";
  $return .= "<option value='AZ'".($sel=='AZ'?' selected':'').">AZ</option>";
  $return .= "<option value='AR'".($sel=='AR'?' selected':'').">AR</option>";
  $return .= "<option value='CA'".($sel=='CA'?' selected':'').">CA</option>";
  $return .= "<option value='CO'".($sel=='CO'?' selected':'').">CO</option>";
  $return .= "<option value='CT'".($sel=='CT'?' selected':'').">CT</option>";
  $return .= "<option value='DE'".($sel=='DE'?' selected':'').">DE</option>";
  $return .= "<option value='DC'".($sel=='DC'?' selected':'').">DC</option>";
  $return .= "<option value='FL'".($sel=='FL'?' selected':'').">FL</option>";
  $return .= "<option value='GA'".($sel=='GA'?' selected':'').">GA</option>";
  $return .= "<option value='HI'".($sel=='HI'?' selected':'').">HI</option>";
  $return .= "<option value='ID'".($sel=='ID'?' selected':'').">ID</option>";
  $return .= "<option value='IL'".($sel=='IL'?' selected':'').">IL</option>";
  $return .= "<option value='IN'".($sel=='IN'?' selected':'').">IN</option>";
  $return .= "<option value='IA'".($sel=='IA'?' selected':'').">IA</option>";
  $return .= "<option value='KS'".($sel=='KS'?' selected':'').">KS</option>";
  $return .= "<option value='KY'".($sel=='KY'?' selected':'').">KY</option>";
  $return .= "<option value='LA'".($sel=='LA'?' selected':'').">LA</option>";
  $return .= "<option value='ME'".($sel=='ME'?' selected':'').">ME</option>";
  $return .= "<option value='MD'".($sel=='MD'?' selected':'').">MD</option>";
  $return .= "<option value='MA'".($sel=='MA'?' selected':'').">MA</option>";
  $return .= "<option value='MI'".($sel=='MI'?' selected':'').">MI</option>";
  $return .= "<option value='MN'".($sel=='MN'?' selected':'').">MN</option>";
  $return .= "<option value='MS'".($sel=='MS'?' selected':'').">MS</option>";
  $return .= "<option value='MO'".($sel=='MO'?' selected':'').">MO</option>";
  $return .= "<option value='MT'".($sel=='MT'?' selected':'').">MT</option>";
  $return .= "<option value='NE'".($sel=='NE'?' selected':'').">NE</option>";
  $return .= "<option value='NV'".($sel=='NV'?' selected':'').">NV</option>";
  $return .= "<option value='NH'".($sel=='NH'?' selected':'').">NH</option>";
  $return .= "<option value='NJ'".($sel=='NJ'?' selected':'').">NJ</option>";
  $return .= "<option value='NM'".($sel=='NM'?' selected':'').">NM</option>";
  $return .= "<option value='NY'".($sel=='NY'?' selected':'').">NY</option>";
  $return .= "<option value='NC'".($sel=='NC'?' selected':'').">NC</option>";
  $return .= "<option value='ND'".($sel=='ND'?' selected':'').">ND</option>";
  $return .= "<option value='OH'".($sel=='OH'?' selected':'').">OH</option>";
  $return .= "<option value='OK'".($sel=='OK'?' selected':'').">OK</option>";
  $return .= "<option value='OR'".($sel=='OR'?' selected':'').">OR</option>";
  $return .= "<option value='PA'".($sel=='PA'?' selected':'').">PA</option>";
  $return .= "<option value='RI'".($sel=='RI'?' selected':'').">RI</option>";
  $return .= "<option value='SC'".($sel=='SC'?' selected':'').">SC</option>";
  $return .= "<option value='SD'".($sel=='SD'?' selected':'').">SD</option>";
  $return .= "<option value='TN'".($sel=='TN'?' selected':'').">TN</option>";
  $return .= "<option value='TX'".($sel=='TX'?' selected':'').">TX</option>";
  $return .= "<option value='UT'".($sel=='UT'?' selected':'').">UT</option>";
  $return .= "<option value='VT'".($sel=='VT'?' selected':'').">VT</option>";
  $return .= "<option value='VA'".($sel=='VA'?' selected':'').">VA</option>";
  $return .= "<option value='WA'".($sel=='WA'?' selected':'').">WA</option>";
  $return .= "<option value='WV'".($sel=='WV'?' selected':'').">WV</option>";
  $return .= "<option value='WI'".($sel=='WI'?' selected':'').">WI</option>";
  $return .= "<option value='WY'".($sel=='WY'?' selected':'').">WY</option>";
  
  return $return;
}






/* Generate a random string of numbers */
function random_string($length) {

	$template = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

       for ($a = 0; $a <= $length; $a++) {
               $b = rand(0, strlen($template) - 1);
               $rndstring .= $template[$b];
       }
      
       return $rndstring;
      
}

function include_stump_files() {
	global $user, $config, $system_root;
	/* Open the modules directory and read in all the proper files */
	$dir = @opendir($system_root . 'modules');

	while( $file = @readdir($dir) )
	{
		$sub_dir = @opendir($system_root . 'modules/' . $file . '/module_lib');
		while( $sub_file = @readdir($sub_dir) )
		{
			if( preg_match("/^module_.*?\.php$/", $sub_file) )
			{
				include($system_root . 'modules/' . $file . '/module_lib/' . $sub_file);
			}
		}
	}

	@closedir($dir);
	
	$module = array_key_multi_sort($module, 'displayname');
		
	return $module;
}


function array_key_multi_sort($arr, $l , $f='strnatcasecmp')
{
   usort($arr, create_function('$a, $b', "return $f(\$a['$l'], \$b['$l']);"));
   return($arr);
}

/* Sorts a multidimensional array by a sub key */
function msort($array, $id="id") {
        $temp_array = array();
        while(count($array)>0) {
            $lowest_id = 0;
            $index=0;
            foreach ($array as $item) {
                if (isset($item[$id]) && $array[$lowest_id][$id]) {
                    if ($item[$id]<$array[$lowest_id][$id]) {
                        $lowest_id = $index;
                    }
                }
                $index++;
            }
            $temp_array[] = $array[$lowest_id];
            $array = array_merge(array_slice($array, 0,$lowest_id), array_slice($array, $lowest_id+1));
        }
        return $temp_array;
}

// Another way of sorting using multiple colums
function array_sort_func($a,$b=NULL) {
   static $keys;
   if($b===NULL) return $keys=$a;
   foreach($keys as $k) {
      if(@$k[0]=='!') {
         $k=substr($k,1);
         if(@$a[$k]!=@$b[$k]) {
            return (@$b[$k]> @$a[$k]);
         }
      }
      else if(@$a[$k]!=@$b[$k]) {
         return (@$a[$k]>@$b[$k]);
      }
   }
   return 0;
}

function array_sort(&$array) {
   if(!$array) return $keys;
   $keys=func_get_args();
   array_shift($keys);
   array_sort_func($keys);
   usort($array,"array_sort_func");       
} 
/*
function array_sort_func($a,$b=NULL) {
   static $keys;
   if($b===NULL) return $keys=$a;
   foreach($keys as $k) {
      if(@$k[0]=='!') {
         $k=substr($k,1);
         if(@$a[$k]!==@$b[$k]) {
            return strcmp(@$b[$k],@$a[$k]);
         }
      }
      else if(@$a[$k]!==@$b[$k]) {
         return strcmp(@$a[$k],@$b[$k]);
      }
   }
   return 0;
}

function array_sort(&$array) {
   if(!$array) return $keys;
   $keys=func_get_args();
   array_shift($keys);
   array_sort_func($keys);
   usort($array,"array_sort_func");       
} 
 */
/* end a new arry sort

/* Strips out redundant numeric keys.  Useful for prepping csv output */
function remove_numeric_keys($array)
{
	foreach ($array as $key=>$value)
	{
		if(is_numeric($key))
		{
			unset($array[$key]);	
		}	
	}
	return $array;
}

function jumpmenu() {
	/* Make sure the user object is available to me */
	global $user, $system_root, $config;

	/* Open the modules directory and read in all the proper files */
	$module = include_stump_files();

	/* Start the template */
	$template = new Template($system_root . 'root_templates');
	
	$template->set_file('JumpMenuPlaceholder', 'jumpmenu_placeholder.tpl');
	$template->set_file('JumpMenu', 'jumpmenu.tpl');
	$template->set_var('webroot',$config['webroot']);
	$template->set_block('JumpMenu', 'jumplist', 'jumplist_finished');

	/* Assume the user doesn't have access to anything just now */
	$no_modules = true;
	
	while (list($mod_list, $mod_info_array) = each($module))
	{
		if ($mod_info_array['basename']=='switchboard')
		{
			include_once($system_root . '/modules/switchboard/module_lib/switchboard_common.php');
		}
		/* So, either it's a restricted module that need authorized to see, or else it's wide-open for all to see */
		if ($user->logged_in() AND ( ($user->is_auth($mod_info_array['basename']) OR !$mod_info_array['restricted']) OR ($mod_info_array['basename']=='switchboard' AND $user->is_auth($mod_info_array['basename'],'',switchboard_groups()) ) ))
		{
			/* If we get here, there's something that the user has access to */
			$no_modules = false;
			$template->set_var('webroot',$config['webroot']);
			$template->set_var('displayname',$mod_info_array['displayname']);
			$template->set_var('basename',$mod_info_array['basename']);
			$template->parse('jumplist_finished','jumplist', true);
		}
	}
	
	 if (!$no_modules)
	 {
	 	return $template->parse('JumpMenuFinished', 'JumpMenu');
	 } else {
	 	return $template->parse('JumpMenuFinished', 'JumpMenuPlaceholder');
	 }

}

/* This is used for the wysiwyg editor (and maybe other stuff once I really look at it :shifty:) */
function RTESafe($strText) {
	//returns safe code for preloading in the RTE
	$tmpString = trim($strText);

	//convert all types of single quotes
	$tmpString = str_replace(chr(145), chr(39), $tmpString);
	$tmpString = str_replace(chr(146), chr(39), $tmpString);
	$tmpString = str_replace("'", "&#39;", $tmpString);

	//convert all types of double quotes
	$tmpString = str_replace(chr(147), chr(34), $tmpString);
	$tmpString = str_replace(chr(148), chr(34), $tmpString);
//	$tmpString = str_replace("\"", "\"", $tmpString);

	//replace carriage returns & line feeds
	$tmpString = str_replace(chr(10), " ", $tmpString);
	$tmpString = str_replace(chr(13), " ", $tmpString);

	return $tmpString;
}

/* Cleans up POST values */
function cleanup($stuff) {
	foreach ($stuff as $key=>$value) {
		$stuff[$key]=stripslashes(trim($value));
	}
	
	return $stuff;
}

/* Gets the stump file for a directory */
function stump_file ($cwd) {
	global $config;
	$base = substr($cwd, strlen($config['pathroot'] . 'modules/'));

	if (strpos($base, "/"))
	{
		$name = substr($base, 0, strpos($base, "/"));
	}
	else
	{
		$name = $base;
	}

	$stump_file = 'module_' . $name . '.php';

	return $stump_file;
}

/* Sync password for external systems */
function sync_pass($new_password, $uid) {
	global $user;

	$db = new db();
	$query = "UPDATE phpbb_users SET user_password='$new_password' WHERE user_id='$uid' LIMIT 1";
	$db->db_query($query);
	$db->db_close();

	$db = new db('room_reservations');
	$query = "UPDATE login SET password='$new_password' WHERE memberid ='$uid' LIMIT 1";
	$db->db_query($query);
	$db->db_close();

	//if ($user->is_auth('project_management'))
	//{
	//	$db = new db('phpcollab');
	//	$query = "UPDATE phpcollab_members SET password='$new_password' WHERE id='$uid' LIMIT 1";
	//	$db->db_query($query);
	//	$db->db_close();
	//}
}

/* Sync username for external systems */
function sync_username($new_username, $uid) {
	global $user;

	$db = new db();
	$query = "UPDATE phpbb_users SET username='$new_username' WHERE user_id='$uid' LIMIT 1";
	$db->db_query($query);
	$db->db_close();

	$db = new db('room_reservations');
	$query = "UPDATE login SET logon_name='$new_username' WHERE memberid ='$uid' LIMIT 1";
	$db->db_query($query);
	$db->db_close();

	//if ($user->is_auth('project_management'))
	//{
	//	$db = new db('phpcollab');
	//	$query = "UPDATE phpcollab_members SET login='$new_username' WHERE id='$uid' LIMIT 1";
	//	$db->db_query($query);
	//	$db->db_close();
	//}
}

/* Sync email for external systems */
function sync_email($new_email, $uid) {
	global $user;

	$db = new db();
	$query = "UPDATE phpbb_users SET user_email='$new_email' WHERE user_id='$uid' LIMIT 1";
	$db->db_query($query);
	$db->db_close();

	$db = new db('room_reservations');
	$query = "UPDATE login SET email='$new_email' WHERE memberid ='$uid' LIMIT 1";
	$db->db_query($query);
	$db->db_close();

	//if ($user->is_auth('project_management'))
	//{
	//	$db = new db('phpcollab');
	//	$query = "UPDATE phpcollab_members SET email_work='$new_email' WHERE id='$uid' LIMIT 1";
	//	$db->db_query($query);
	//	$db->db_close();
	//}
}

function create_integrated_accounts($id, $username, $password, $firstname, $lastname, $email) {
	global $language;
	
	$db = new db();
	$new_ug_id = $db->db_next_id('phpbb_groups', 'group_id');
	
	$user_realname = $firstname . ' ' . $lastname;
	
	$query_phpbb = "INSERT INTO phpbb_users (user_id, user_active, username, user_realname, user_password, user_regdate, user_timezone, user_lang, user_viewemail, user_email) VALUES  ('$id', '1', '$username', '$user_realname', '$password', 'time()', '-4.00', 'English', '1', '$email')";
	$query_phpbb_groups = "INSERT INTO phpbb_groups (group_id, group_name, group_description) VALUES ('$new_ug_id', '', 'Personal User')";
	$query_phpbb_ug = "INSERT INTO phpbb_user_group (group_id, user_id, user_pending) VALUES ('$new_ug_id', '$id', '0')";
	$query_room_res = "INSERT INTO login (memberid, email, password, fname, lname, logon_name) VALUES ('$id', '$email', '$password', '$firstname', '$lastname', '$username')";


	if (!$db->db_query($query_phpbb))
	{
		$error .= $language['admin']['error_phpbb_account_failed'] . $language['layout']['inform_web_services'];
	}
	
	if (!$db->db_query($query_phpbb_groups) OR !$db->db_query($query_phpbb_ug))
	{
		$error .= $language['admin']['error_phpbb_account_groups_failed'] . $language['layout']['inform_web_services'];
	}

	$room_res_db = new db('room_reservations');

	if (!$room_res_db->db_query($query_room_res))
	{
		$error .= $language['admin']['error_room_res_account_failed'] . $language['layout']['inform_web_services'];
	}
	
	return $error;
}

function send_email($to, $headers='', $subject, $message) {
	global $config;
	if ($headers == '')
	{
		$headers = 'From: ' . $config['admin_email_name'] . ' <' . $config['admin_email'] . '>';
	}

	if (mail($to, $subject, $message, $headers))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function get_extension($imagetype)
   {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/cis-cod': return '.cod';
           case 'image/gif': return '.gif';
           case 'image/ief': return '.ief';
           case 'image/jpeg': return '.jpg';
           case 'image/pipeg': return '.jfif';
           case 'image/tiff': return '.tif';
           case 'image/x-cmu-raster': return '.ras';
           case 'image/x-cmx': return '.cmx';
           case 'image/x-icon': return '.ico';
           case 'image/x-portable-anymap': return '.pnm';
           case 'image/x-portable-bitmap': return '.pbm';
           case 'image/x-portable-graymap': return '.pgm';
           case 'image/x-portable-pixmap': return '.ppm';
           case 'image/x-rgb': return '.rgb';
           case 'image/x-xbitmap': return '.xbm';
           case 'image/x-xpixmap': return '.xpm';
           case 'image/x-xwindowdump': return '.xwd';
           case 'image/png': return '.png';
           case 'image/x-jps': return '.jps';
           case 'image/x-freehand': return '.fh';
           default: return false;
       }
   }
   
function resize_image($image_file_path, $new_image_file_path, $extension, $max_width, $max_height)
{

	$return_val = 1;

	if ($extension == '.jpg')
	{
		$return_val = ( ($img = ImageCreateFromJPEG ( $image_file_path )) && $return_val == 1 ) ? "1" : "0";
	}
	else if ($extension == '.gif')
	{
		$return_val = ( ($img = ImageCreateFromGIF ( $image_file_path )) && $return_val == 1 ) ? "1" : "0";
	}
	else if ($extension == '.png')
	{
		$return_val = ( ($img = ImageCreateFromPNG ( $image_file_path )) && $return_val == 1 ) ? "1" : "0";
	}


	$FullImage_width = imagesx ($img);    // Original image width
	$FullImage_height = imagesy ($img);    // Original image height

	   // now we check for over-sized images and pare them down
	   // to the dimensions we need for display purposes
	$ratio =  ( $FullImage_width > $max_width ) ? (real)($max_width /$FullImage_width) : 1 ;
	$new_width = ((int)($FullImage_width * $ratio));    //full-size width
	$new_height = ((int)($FullImage_height * $ratio));    //full-size height
	   //check for images that are still too high
	$ratio =  ( $new_height > $max_height ) ? (real)($max_height /$new_height) : 1 ;
	$new_width = ((int)($new_width * $ratio));    //mid-size width
	$new_height = ((int)($new_height * $ratio));    //mid-size height

	   // --Start Full Creation, Copying--
	// now, before we get silly and 'resize' an image that doesn't need it...
	if ( $new_width == $FullImage_width && $new_height == $FullImage_height )
	copy ( $image_file_path, $new_image_file_path );

	$full_id = ImageCreateTrueColor( $new_width , $new_height );
	//create an image

	$white = ImageColorAllocate($full_id,255,255,255);

	imagefilledrectangle ($full_id, 0, 0, $new_width, $new_height,$white);  //Put a white background in just to play it safe


	ImageCopyResized( $full_id, $img,
		   0,0,  0,0, //starting points
		   $new_width, $new_height,
		   $FullImage_width, $FullImage_height );
	if ($extension == '.jpg')
	{
		$return_val = ( $full = ImageJPEG( $full_id, $new_image_file_path, 80 )	&& $return_val == 1 ) ? "1" : "0";
	}
	else if ($extension == '.gif')
	{
		$return_val = ( $full = ImageGIF( $full_id, $new_image_file_path, 80 )	&& $return_val == 1 ) ? "1" : "0";
	}
	else if ($extension == '.png')
	{
		$return_val = ( $full = ImagePNG( $full_id, $new_image_file_path, 80 )	&& $return_val == 1 ) ? "1" : "0";
	}
	
	ImageDestroy( $full_id );
	   // --End Creation, Copying--

	return ($return_val) ? TRUE : FALSE ;

}

function encrypt($text) 
{ 
define('SALT', 'thomaspapa');
    return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SALT, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)))); 
} 

function decrypt($text) 
{ 
    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, SALT, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))); 
} 


?>