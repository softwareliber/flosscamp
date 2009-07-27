<?php
$wikiname = "FLOSSCamp 2009";
$wikitagline = "Întâlnirea comunităților FLOSS din România";
$camplocation = "14 - 16 August<br />Curmătura Ștezii, județul Sibiu";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?php echo $wikiname." / ".$title ?></title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen" />
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
				<li><a href="/2009/" title="Acasă">Despre</a></li>
				<li><a href="/2009/inscriere" title="Înscriere">Înscriere</a></li>
				<!--li><a href="/2009/participa" title="Participă">Participă / Agenda</a></li-->
				<li><a href="/2009/membri" title="Pe cine vei întâlni">Participanți</a></li>
				<li><a href="/2009/poze/index.php" title="Poze cu locul unde se va desfășura FLOSSCamp 2009">Poze cu locul de campare</a></li>				
				<li><a href="/2009/calea" title="Hai și tu!">Cum ajungi?</a></li>
				<li><a href="/2009/contact" title="Scrie-ne">Contact</a></li>
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
				Folosim <a href="http://michelf.com/projects/php-markdown/">Markdown</a>,
				vezi <a href="/2009/syntax">sintaxa</a>.
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
</body>
</html>
