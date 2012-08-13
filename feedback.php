<?php
if($_GET['feedback']) {
	if($_GET['error']) {
		echo "<p style=\"font-weight:bold; color:#990000;\">".$_GET['error']."</p>";
	}
	if($_GET['file']) {
		echo "<p style=\"font-weight:bold;\"><a href=\"out/".$_GET['file']."\">".$_GET['file']."</a></p>";
	}
}
?>
