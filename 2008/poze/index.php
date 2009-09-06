<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>FLOSSCamp 2008 / Poze</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="shortcut icon" href="http://camp.softwareliber.ro/favicon.ico" />
	<link rel="stylesheet" type="text/css" media="all" href="/css/style.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="/css/jquery.fancybox.css" />
	<script type="text/javascript" src="/js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="/js/jquery.fancybox-1.2.1.pack.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(".poze a").fancybox({
				'hideOnContentClick': true,
				'zoomSpeedIn': 300,
				'zoomSpeedOut': 300,
				'overlayShow': true 
			});
		});
	</script>
</head>
<body>
	<div id="continut">
		<div id="cap">
			<h1><a href="/" title="Un alt mod de promova software liber :)">flossCamp 2008 <br>Păltiniș, 29-30-31 august</a></h1>
			<h3>Un eveniment organizat de Grupul pentru software liber</h3>
		</div>
		<div id="gat">
			<ul>
				<li><a href="/2008/" title="Acasă">Despre</a></li>
				<li><a href="/2008/participa" title="Participă">Participă / Agenda</a></li>
				<li><a href="/2008/membri" title="Pe cine vei întâlni">Cine vine</a></li>
				<li><a href="/2008/calea" title="Hai și tu!">Cum ajungi?</a></li>
				<li><a href="/2008/poze" title="Cine a fost">Poze</a></li>
				<li><a href="/2008/contact" title="Scrie-ne">Contact</a></li>
			</ul>
		</div>
		<div id="corp">
			<p class="poze">
			<?php	
				$cols = 4;
				$rows = 4;

				if(!file_exists("thumbnails"))
				  mkdir("thumbnails", 0755);
				
				chmod("thumbnails", 0755);
				
				$directory = getcwd();
				
				$photos = array();
				
				$directory2 = $directory . "/$dir/";
				if ($hand = opendir("$directory2")) {
				  while (false !== ($file2 = readdir($hand))) {
				    if($file2 != "index.php" && $file2 != "." && $file2 != ".." && !is_dir("$file2")) {
				      $file_count = $file_count++;
				      array_push($photos,"$file2");
				    }
				  }
				}
				
				function makeThumbnail($o_file, $t_ht = 200) {
				   $image_info = getImageSize($o_file) ; // see EXIF for faster way
				  
				   switch ($image_info['mime']) {
				       case 'image/gif':
				           if (imagetypes() & IMG_GIF)  { // not the same as IMAGETYPE
				               $o_im = imageCreateFromGIF($o_file) ;
				           } else {
				               $ermsg = 'GIF images are not supported<br />';
				           }
				           break;
				       case 'image/jpeg':
				           if (imagetypes() & IMG_JPG)  {
				               $o_im = imageCreateFromJPEG($o_file) ;
				           } else {
				               $ermsg = 'JPEG images are not supported<br />';
				           }
				           break;
				       case 'image/png':
				           if (imagetypes() & IMG_PNG)  {
				               $o_im = imageCreateFromPNG($o_file) ;
				           } else {
				               $ermsg = 'PNG images are not supported<br />';
				           }
				           break;
				       case 'image/wbmp':
				           if (imagetypes() & IMG_WBMP)  {
				               $o_im = imageCreateFromWBMP($o_file) ;
				           } else {
				               $ermsg = 'WBMP images are not supported<br />';
				           }
				           break;
				       default:
				           $ermsg = $image_info['mime'].' images are not supported<br />';
				           break;
				   }
				  
				   if (!isset($ermsg)) {
				       $o_wd = imagesx($o_im) ;
				       $o_ht = imagesy($o_im) ;
				       // thumbnail width = target * original width / original height
				       //$t_wd = round($o_wd * $t_ht / $o_ht) ;
				
				       if($o_wd > $o_ht){
				        $t_wd = $t_ht;
				        $o_wd = $o_ht;
				       }else{
				        $t_wd = $t_ht;
				        $o_ht = $o_wd;
				       }
				       $t_im = imageCreateTrueColor($t_wd,$t_ht);
				      
				       
				       imageCopyResampled($t_im, $o_im, 0, 0, 0, 0, $t_wd, $t_ht, $o_wd, $o_ht);
				       imageJPEG($t_im, "thumbnails/thumb_".$o_file);
				      
				       imageDestroy($o_im);
				       imageDestroy($t_im);
				   }
				   return isset($ermsg)?$ermsg:NULL;
				}
				
				
				foreach($photos as $ind => $photo){
				
				  list($width, $height, $type, $attr) = getimagesize($photo);
				  $fsize = filesize($photo);
				  $fsize = round($fsize/1024);
				  $width2 = $width;
				  $height2 = $height;
				  if(!file_exists("thumbnails/thumb_$photo"))
				    makeThumbnail($photo, 100);
				
				  echo "\n<a href=\"$photo\" class=\"fb\" rel=\"flossCamp2008\"><img src=\"thumbnails/thumb_$photo\" alt=\"poza\" /></a>\n";
				}		
				?>
			</p>
		</div>
		<div id="coada">
			<p style="float: right">
				Folosim <a href="http://michelf.com/projects/php-markdown/">Markdown</a>,
				vezi <a href="/syntax">sintaxa</a>.
			</p>
			<p>
				Un proiect <a href="http://www.softwareliber.ro/" title="Pagina grupului">Grupul pentru software liber</a>.
			</p>
			<p>
				Majoritatea conținutului poate fi folosit conform 
				<a href="http://softwareliber.ro/despre/licenta/" title="BSD license" >licenței BSD</a>
			</p>
		</div>
	</div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-557998-6");
pageTracker._initData();
pageTracker._trackPageview();
</script>

</body>
</html>
