<?php require_once('header.php');?>
<body>
  <header>
	<h1>Bead STL Generator</h1>
  </header>
  <article>

<?php

function getSettings($file) {
	if( ! (is_file("scads/".$file)) )return false; //file does not exist
	?>
	<form action="render.php" method="post">
	<fieldset>
	<h2>Configure <?php echo substr($file, 0, -5); ?></h2>
	<?php	
	//open stream, read through file, one line at a time.
	$handle = @fopen("scads/".$_GET['scad'], "r");
	if($handle) {
		while(($line = fgets($handle)) !== false) {
			$line = trim($line, " \t"); //remove white spaces
			//break on reaching line //eoc
			if(substr($line,0,5) == "//eoc") break;
			$lineout = explode("=", $line);
			//trim string
			$lineout[0] = trim($lineout[0], " \t");
			$lineout[1] = trim($lineout[1], " \t");
			
			//strip any following ;
			if(strrchr($lineout[0], ";")) $lineout[0] = substr($lineout[0],0,-2);
			if(strrchr($lineout[1], ";")) $lineout[1] = substr($lineout[1],0,-2);
			
			echo "<p>".$lineout[0]." <input type='text' name='".$lineout[0]."' value='".$lineout[1]."'></p>".PHP_EOL;
		}
	fclose($handle);
	}
	?>
	<input type="hidden" name="scad" value="<?php echo $file; ?>">
	<input type="submit" value="Render STL">
	</fieldset>
	</form>
	<?php
	return true;
}

getSettings($_GET['scad']);

?>
  </article>
</body>
</html>
