<?php

require_once('markdown_filter.php');
$extension = '.md'; // File extension for files to process as Markdown
$template_name = 'template.php'; // Filename of templates
$contants_name = 'constants.php';

$path = $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'];
if(is_readable($path . $extension))
{
	$file = $path . $extension;
	$files_path = dirname($path);
}
else
{
	if(is_readable($path . '/index' . $extension))
	{
		$file = $path . '/index' . $extension;
		$files_path = $path;
	}
	else
	{
		header(' ', true, 404); // 404 on them
		if(is_readable(dirname($path) . '/404' . $extension))
		{
			$file = dirname($path) . '/404' . $extension;
			$files_path = dirname($path);
		}
		else
		{
		    // And give a not-very-helpful error
			die('Could not find _any_ Markdown files. Oops.');
		}
	}
}
// Get the template to include
// A single template for all years.
$template_file = realpath('../' . $template_name);
if(!$template_file)
{
	die(
	    'Could not find a suitable template file. It\'s probably not worth '.
	    'trying again, but if you really want to...'
	    );
}

// Get the page constants to include
// There is a contstants file for each each.
$constants_file = $files_path . '/' . $contants_name;
$constants_file = realpath($constants_file);
if(!$constants_file)
{
	die(
	    'Could not find a suitable constants file. It\'s probably not worth '.
	    'trying again, but if you really want to...'
	    );
}

$markdown = file_get_contents($file);
$source = basename($file);
$modified = filemtime($file);
$html = Markdown($markdown);

// Really messy way of getting a <title> for the page, but it works
if(preg_match('/<h1>(.*?)<\/h1>/mis', $html, $matches))
{
	$title = $matches[1];
}
else
{
	$title = basename($file);
}

require($constants_file);
require($template_file);

?>
