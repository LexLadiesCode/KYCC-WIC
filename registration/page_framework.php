<?

/*------------------------------------------Header---------------------------------*/
/* If this is set we do an immediate redirect */
if (isset($redirect_header))
{
	header("Location:" . $redirect_header);
}

/* Start the template */
$template = new Template('./templates');

/* Pull in the main framework */
$template->set_file('PreHeader','page_framework_pre_header.tpl');
$template->set_var('webroot',$config['webroot']);
$template->set_var('title',$title);

/* If this is set, we're doing a slow redirect */
if (isset($redirect_meta))
{
	if ($redirect_meta_delay == '')
	{
		$redirect_meta_delay = $config['redirect_meta_delay'];
	}
	$template->set_var('redirect','<meta http-equiv="refresh" content="' . $redirect_meta_delay . ';url=' . $redirect_meta . '" />');
}

/* This is just used on the module listing page (or anywhere else we may need swap image javascript code) */
if (isset($swap_image))
{
	$template->set_var('swap_image', $swap_image);
}

/* If there's any onload commands for javascript */
if (isset($onload))
{
	$template->set_var('onload', $onload);
}

/* Output the pre-header stuff */
$template->pparse('PreHeaderOutput','PreHeader');

/* Bring in the global header */
require('./header.php');


/*-----------------------------------------Logbar----------------------------------*/ 




/*------------------------------------------Middle---------------------------------*/
/* Pull in the main framework */
$template->set_file('Middle','page_framework_middle.tpl');
$template->set_var('webroot',$config['webroot']);

/* Figure out the jumpmenu and logout line that we need */
//$template->set_var('jumpmenu', jumpmenu());
//$template->set_var('logout', logout_line());

/* Include the pretty page title thing if they're logged in */

	$template->set_var('breadcrumb',$module[$stump_file]['displayname']);

	$template->set_file('TitleBarBuild','title_bar.tpl');	
	$template->set_var('breadcrumb_home_term', $language['layout']['breadcrumb_home_term']);	
	$template->set_var('basename','Women in computing');
	$template->set_var('breadcrumb', $breadcrumb);
	$template->set_var('displayname', 'Kentucky Community College - Women in Computing');
	
	//the use_name_only_dir is for editing the directory profile only. It gets its value from the demo_info.php file
	$template->parse('TitleBar','TitleBarBuild');


/* Show error messages */
if (count($error) > 0)
{
	$template->set_file('ErrorMessageBuild', 'error.tpl');
	$template->set_block('ErrorMessageBuild', 'errors_listing', 'errors_listing_finished');
	foreach ($error as $key=>$value)
	{
		$template->set_var('error_message', $value);
		$template->parse('errors_listing_finished','errors_listing', true);
	}
	$template->parse('ErrorMessage','ErrorMessageBuild');
}



/* If there's nothing set in our body variable, put something in there */
if (!isset($body))
{
	$body = '<p>&nbsp;</p>';
}
$template->set_var('body', $body);

/* Output the middle */
$template->pparse('MiddleOutput','Middle');


/*------------------------------------------Footer---------------------------------*/
require('./footer.php');

?>
