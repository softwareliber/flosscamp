<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php echo $wikiname." / ".$title ?></title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link
	    rel="stylesheet" href="../css/blueprint/screen.css"
	    type="text/css" media="screen, projection" />
	<link
	    rel="stylesheet" href="../css/blueprint/print.css"
	    type="text/css" media="print" />
	<!--[if lt IE 8]>
	<link
	    rel="stylesheet" href="../css/blueprint/ie.css"
	    type="text/css" media="screen, projection" />
	<![endif]-->
	<link
	    rel="stylesheet" href="../css/style.css?v=<?php echo $year ?>"
	    type="text/css" media="screen, projection" />	
	<link
	    rel="stylesheet" href="../css/jquery.fancybox.css"
	    type="text/css" media="screen" />
	<link
	    rel="shortcut icon" href="http://camp.softwareliber.ro/favicon.ico" />

    <?php if (is_gallery_page($file)) { ?>
	<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="../js/jquery.fancybox-1.2.1.pack.js"></script>
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
    <?php } ?>
</head>
<body>
	<div id="continut">
		<div id="cap">
		<h1>
		  <a href="/" alt="<?php echo $wikitagline ?>">
		        <?php echo $wikiname ?><br /><?php echo $camplocation ?>
		  </a>
		</h1>
			<h3><?php echo $wikitagline ?></h3>
		</div>
		<div id="gat">
			<ul>
			    <?php echo $menu ?>
			</ul>
		</div>
		<div id="corp">
			<?php
			    echo $html;
			    if (is_gallery_page($file)) {
			        echo '<p class="poze">';
			        show_gallery($year);
			        echo '</p>';
			    }
			?>
			
			<p style="text-align: right; font-size: 9px; color: #999;">
				Ultima modificare în: <?php echo date("d M, Y",$modified); ?>,
				<?php echo date("H:i:s",$modified); ?>.
			</p>
		</div>

	    <div id="coada">
		    <p style="float: right">
			    Folosim <a href="http://michelf.com/projects/php-markdown/">
			    Markdown</a> și <a href="http://git-scm.com/">Git</a>,
			    vezi <a href="../2011/syntax">sintaxa</a>.
                <br/>
                <iframe src="http://www.facebook.com/plugins/like.php?app_id=136114323140890&amp;href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FFLOSSCamp%2F136082179809799&amp;send=false&amp;layout=button_count&amp;width=200&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
		    </p>
		    <p>
			    Un proiect al
			        <a
			          href="http://www.softwareliber.ro/"
			          title="Pagina grupului">
			          Grupului pentru software liber</a>.
                Vezi și edițiile din <a href="../2008">2008</a>,
                <a href="../2009">2009</a>, <a href="../2010">2010</a>,
                <a href="../2011">2011</a>.
		    </p>
		    <p>
			    Majoritatea conținutului poate fi folosit conform
			    <a
			      href="http://softwareliber.ro/despre/licenta/"
			      title="BSD license" >licenței BSD</a>.
		    </p>
	    </div>
    </div>
    <script type="text/javascript">
	    var gaJsHost = (("https:" == document.location.protocol) ?
	        "https://ssl." : "http://www.");
	    document.write(unescape(
	        "%3Cscript src='" + gaJsHost +
	        "google-analytics.com/ga.js' " +
	        "type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script type="text/javascript">
	    try {
	    var pageTracker = _gat._getTracker("UA-557998-6");
	    pageTracker._trackPageview();
	    } catch(err) {}
    </script>
</body>
</html>
