<?php
$wikiname = "FLOSSCamp 2010";
$wikitagline = "Întâlnirea comunităților FLOSS din România";
$camplocation = "(6)7-8 August 2010<br />Predeal, Brașov, România";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?php echo $wikiname." / ".$title ?></title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" href="/css/blueprint/screen.css" type="text/css" media="screen, projection" />
	<link rel="stylesheet" href="/css/blueprint/print.css" type="text/css" media="print" />    
	<!--[if lt IE 8]><link rel="stylesheet" href="/css/blueprint/ie.css" type="text/css" media="screen, projection" /><![endif]-->
	<link rel="stylesheet" href="/css/style.css?v=2010" type="text/css" media="screen, projection" />	
	<link rel="shortcut icon" href="http://camp.softwareliber.ro/favicon.ico" />
</head>
<body>
	<div id="continut">
		<div id="cap">
		<h1><a href="/" alt="<?php echo $wiktagline ?>"><?php echo $wikiname ?><br /><?php echo $camplocation ?></a></h1>
			<h3><?php echo $wikitagline ?></h3>
		</div>
		<div id="gat">
			<ul>
				<li><a href="/2010/" title="Acasă">Despre</a></li>
				<!--li><a href="/2010/propuneri" title="Propuneri">Propuneri</a></li-->
				<!--li><a href="/2010/inscriere" title="Înscriere">Înscriere</a></li-->
				<li><a href="/2010/membri" title="Pe cine vei întâlni">Participanți</a></li>
				<li><a href="/2010/poze/index.php" title="Poze de la FLOSSCamp 2010">Poze</a></li>				
				<li><a href="/2010/calea" title="Hai și tu!">Cum ajungi?</a></li>
                <li><a href="/2010/promo" title="Susține-ne!">Promovează</a></li>
                <li><a href="/2010/contact" title="Scrie-ne">Contact</a></li>
			</ul>
		</div>
		<div id="corp">
			<?php echo $html ?>
			<p style="text-align: right; font-size: 9px; color: #999;">
				Ultima modificare în: <?php echo date("d M, Y",$modified); ?>, <?php echo date("H:i:s",$modified); ?>.
			</p>
		</div>
		<div id="coada">
			<p style="float: right">
				Folosim <a href="http://michelf.com/projects/php-markdown/">Markdown</a>
				și <a href="http://git-scm.com/">Git</a>,
				vezi <a href="/2010/syntax">sintaxa</a>.
			</p>
			<p>
				Un proiect al <a href="http://www.softwareliber.ro/" title="Pagina grupului">Grupului pentru software liber</a>.
			</p>
			<p>
				Majoritatea conținutului poate fi folosit conform 
				<a href="http://softwareliber.ro/despre/licenta/" title="BSD license" >licenței BSD</a>.
			</p>
		</div>
	</div>
	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
		try {
		var pageTracker = _gat._getTracker("UA-557998-6");
		pageTracker._trackPageview();
		} catch(err) {}
	</script>
</body>
</html>
