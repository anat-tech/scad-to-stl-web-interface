<?php require_once("header.php"); ?>
<body>
  <header>
	<h1>Bead STL Generator</h1>
  </header>
  <article>
	<?php require_once('feedback.php'); ?>
	<!--form method="get" action="render.php">
	<fieldset>
		<p>Set your size</p>
		<p>Size (diameter) <input type="text" name="size"></p>
		<p>Hole-size <input type="text" name="holesize"></p>
		<p><input type="hidden" name="go" value="y"></p>
		<p><input type="submit" value="openscad render"></p>
	</fieldset>
	</form-->
	<form method="get" action="variables.php">
	<h2>Beads/Object Selection</h2>
	<fieldset>
		<?php
		$scads = scandir("scads");
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
