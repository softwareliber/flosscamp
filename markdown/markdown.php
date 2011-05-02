<?php

require_once('markdown_filter.php');
require_once('gallery.php');

define('MARKDOWN_EXTENSION', '.md');
// Filename for template file.
define('TEMPLATE_NAME', 'template.php');
define('CONSTANTS_NAME', 'constants.php');
// Show the gallery only on page containing GALLERY_PAGE_NAME in the name.
define('GALLERY_PAGE_NAME', 'poze');
define('PHOTOS_FOLDER_NAME', 'foto');
define('THUMBNAILS_FOLDER_NAME', 'thumbnails');

$path = $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'];

$file = $path . MARKDOWN_EXTENSION;
$index_path = $path . '/index' . MARKDOWN_EXTENSION;
$not_found_path = realpath('../' . '404' . MARKDOWN_EXTENSION);
if (is_readable($file)) {
	$files_path = dirname($path);
} else {
	if(is_readable($index_path)){
		$file = $index_path;
		$files_path = $path;
	}
	else
	{
		header(' ', true, 404); // 404 on them
		if(is_readable($not_found_path))
		{
			$file = $not_found_path;
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
$template_file = realpath('../' . TEMPLATE_NAME);
if(!$template_file)
{
	die(
	    'Could not find a suitable template file. It\'s probably not worth '.
	    'trying again, but if you really want to...'
	    );
}

// Get the page constants to include
// There is a contstants file for each each.
$constants_file = $files_path . '/' . CONSTANTS_NAME;
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
