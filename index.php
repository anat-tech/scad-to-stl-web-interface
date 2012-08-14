<?php require_once("header.php"); 
	//load config file
	if($conf = parse_ini_file("config.ini")) {
		if(!$conf['stldir']) $conf['stldir'] = "out";
		if(!$conf['scaddir']) $conf['scaddir'] = "scads";
	}
	else { $conf['stldir'] = "out"; $conf['scaddir'] = "scads"; }
?>
<body>
  <header>
	<h1>Bead STL Generator</h1>
  </header>
  <article>
	<?php require_once('feedback.php'); ?>
	<form method="get" action="variables.php">
	<h2>Beads/Object Selection</h2>
	<fieldset>
		<?php
		$scads = scandir($conf['scaddir']);
		foreach($scads as $obj) {
			if(substr($obj,-4) == "scad") {
				$tmp = substr($obj,0,-5);
				echo "<p><input type='radio' name='scad' value='".$obj."' checked='true'>".$tmp."</p>";
			}
		}
		?>
		<p><input type="submit" value="Configure"></p>
	</fieldset>
	</form>
	<a href="list.php">list exisiting bead files</a>
  </article>
</body>
</html>
