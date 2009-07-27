<?php

require_once('markdown_filter.php');

$extension = '.md'; // File extension for files to process as Markdown
$template_name = 'template.php'; // Filename of templates

$path = $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'];

if(is_readable($path . $extension))
{
	$file = $path . $extension;
	$template_path = dirname($path);
}
else
{
	if(is_readable($path . '/index' . $extension))
	{
		$file = $path . '/index' . $extension;
		$template_path = $path;
	}
	else
	{
		header(' ', true, 404); // 404 on them
		if(is_readable(dirname($path) . '/404' . $extension))
		{
			$file = dirname($path) . '/404' . $extension;
			$template_path = dirname($path);
		}
		else
		{
			die('Could not find _any_ Markdown files. Oops.'); // And give a not-very-helpful error
		}
	}
}

// Get the template to include

$template_file = $template_path . '/' . $template_name;
$i = 0; // Just in case everything goes really wrong
while(!is_readable($template_file) && realpath($template_path) != '/' && $i < 50)
{
	$template_file = $template_path . '/' . $template_name;
	$template_path .= '/../';
	$i++;
}
$template_file = realpath($template_file);
if(!$template_file)
{
	die('Could not find a suitable template file. It\'s probably not worth trying again, but if you really want to...');
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

require($template_file);

?>
