<?php
function rootURL() {
    $pgurl = "http";
    if(!empty($_SERVER['HTTPS'])) $pgurl .= "s";
    $pgurl .= "://".$_SERVER["SERVER_NAME"];
    if ($_SERVER["SERVER_PORT"] != "80") $pgurl .= ":".$_SERVER["SERVER_PORT"]; 
    return $pgurl; 
	//($pgurl .= $_SERVER["SCRIPT_NAME"]);
}

/*/ check if values are correct
$stop = false;

if(empty($_GET['size'])) {
	$stop = true;
	$error = "Error: Size not set.";
}

if(empty($_GET['holesize'])) {
	if($stop) $error .= "<br>";
	$stop = true;
	$error .= "Error: Hole size not specified.";
}
if(($_GET['holesize'] >= $_GET['size'])) {
	if($stop);
	else {
		$stop = true;
		$error .= "Error: Hole size larger or same size as bead.";
	}
}

// varaibles not set or incorrect
if($stop) {
	//go home
	header("Location: ".rootURL()."/beads/?feedback=yes&error=".urlencode($error));
	echo $error;
	return;
}*/


// file name 
$fname = $_GET['size']."mm_".substr($_GET['scad'], 0, -5)."-".$_GET['holesize']."mm_holesize.stl";

// check if file exists, if it exists don't re-render 
if(!is_file(getcwd()."/out/".$fname)) {
	// do render
	exec("/usr/bin/openscad -D size=".$_GET['size']." -D holesize=".$_GET['holesize']." -o ".$fname." ./scads/".$_GET['scad']);
	rename(getcwd()."/".$fname, getcwd()."/out/".$fname);
}

//feedback.
//header("Location: ".rootURL()."/beads/?feedback=yes&file=".$fname);

?>
<p>eof</p>
