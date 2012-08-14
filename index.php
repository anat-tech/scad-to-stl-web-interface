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
				echo "<p><input type='radio' name='scad' value='".$obj."' checked='true'>";

				//check if jpg or png exists
				if(is_file($conf['scaddir']."/".$tmp.".png")) {
					?>
					<img src="<?php echo $conf['scaddir'].'/'.$tmp.".png"; ?>" alt="<?php echo $obj; ?>">
					<?php

				}
				else if(is_file($conf['scaddir']."/".$tmp.".jpg")) {
					?>
					<img src="<?php echo $conf['scaddir'].'/'.$tmp.".jpg"; ?>" alt="<?php echo $obj; ?>">
					<?php
				}
				else echo $tmp;

				echo "</p>";
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
