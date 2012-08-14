<?php require_once("header.php"); ?>
<body>
  <header>
	<h1>Bead STL List</h1>
  </header>
  <article>
	<h2><a href="index.php">STL Generator</a></h2>
	<?php
		//check config file
		if($conf = parse_ini_file("config.ini")) {
			if(!$conf['stldir']) $conf['stldir'] = "out";
		}
		else { $conf['stldir'] = "out"; }
		$files = scandir("./".$conf['stldir']);
		//finished checking for stl directory

		if(count($files) >= 2) {
			echo "<ul>".PHP_EOL;
			foreach($files as $file) {
				if($file !== "." && $file !== "..") {
					echo "<li><a href=\"".$conf['stldir']."/".$file."\">".$file."</a></li>".PHP_EOL;
				}
			}
			echo "</ul>".PHP_EOL;
		} 
	?>
  </article>
</body>
</html>
