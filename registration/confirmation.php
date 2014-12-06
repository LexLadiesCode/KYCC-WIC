<?
include ('./classes/db.class.php');
include ('./classes/template.class.php');
include ('./wic_config.inc.php');
include ('./common.php');


$template = new Template('./templates');



	$title = "Kentucky Community College - Women in Computing";
	//$breadcrumb = '<a href="' . $module[$stump_file]['basename'] . '.php">' . $module[$stump_file]['displayname'] . '</a>' . $language['layout']['breadcrumb_sep'] . 'Submit ITS Assistance Request';
	$breadcrumb = 'Confirmation';
	
	$hideform = false;
	
	
	//foreach($_SERVER as $k => $v)
	//	echo "$k => $v <br/>";
	
	
	

	if (!$hideform)
	{
		
		$template->set_file('CONFIRMATION','confirmation.tpl');
				
		$body .= $template->parse('CONFIRMATION','CONFIRMATION');
	}


/********************************* Stuff that is normally file-specific ends here  *********************************/

/* Include this so that the page is output */

require ('./page_framework.php');

?>