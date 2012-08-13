<!DOCTYPE HTML>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html;utf-8">
<title>bead generator 2001</title>
<link href="main.css" type="text/css" rel="StyleSheet">
</head>
<body>
  <header>
	<h1>Bead STL List</h1>
  </header>
  <article>
	<a href="index.php">home</a>
	<?php
		$files = scandir("./out");
		if(count($files) >= 2) {
			echo "<ul>";
			foreach($files as $file) {
				if($file !== "." && $file !== "..") {
					echo "<li><a href='out/".$file."'>".$file."</a></li>";
				}
			}
			echo "</ul>";
		} 
	?>
  </article>
</body>
</html>
