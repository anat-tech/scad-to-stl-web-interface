<!DOCTYPE HTML>
<html>
<head>
<?php
function rootURL() {
    $pgurl = "http";
    if(!empty($_SERVER['HTTPS'])) $pgurl .= "s";
    $pgurl .= "://".$_SERVER["SERVER_NAME"];
    if ($_SERVER["SERVER_PORT"] != "80") $pgurl .= ":".$_SERVER["SERVER_PORT"]; 
    return $pgurl; 
	//($pgurl .= $_SERVER["SCRIPT_NAME"]);
}

//check scad file 

function render() {
	//check scad file exists
	if(!is_file(getcwd()."/scads/".$_GET['scad'])) {
		//header("Location: ".rootURL()."/beads/?feedback=yes&error=Error: ".$_GET['scad']." does not exist");
		echo "<meta http-equiv=\"refresh\" content=\"2;url=".rootURL()."/beads/?feedback=yes&error=Error: ".$_GET['scad']." does not exist"."\">";
		return false;
	}
	
	//filename (substr strips .scad)
	$fname = substr($_GET['scad'],0,-5);
	//command
	$cmd = "/usr/bin/openscad";

	foreach($_GET as $key => $value) {
		if($key != "scad") {
			//generate part of the command to execute
			$cmd .= " -D ".$key.'='.$value;
			//generate part of the file name to save to
			$fname .= '-'.$key.'_'.$value."mm";
		}
	}
	//add extension to filename
	$fname .= ".stl";
	//add input & output file to $cmd
	$cmd .= " -o ".$fname." ./scads/".$_GET['scad'];

	// check if file exists, if it exists don't re-render 
	if(!is_file(getcwd()."/out/".$fname)) {
		// do render
		exec($cmd);
		rename(getcwd()."/".$fname, getcwd()."/out/".$fname);
	}

	//feedback.
	//header("Location: ".rootURL()."/beads/?feedback=yes&file=".$fname);
	echo "<meta http-equiv=\"refresh\" content=\"2;url=".rootURL()."/beads/?feedback=yes&file=".$fname."\">";
}
render();

?>
<head>
<body>
	<p>Process completed, redirection in progress.</p>
</body>
</html>

