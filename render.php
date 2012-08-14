<!DOCTYPE HTML>
<html>
<head>
<title>rendering stl...</title>
<?php
function rootURL() {
    $pgurl = "http";
    if(!empty($_SERVER['HTTPS'])) $pgurl .= "s";
    $pgurl .= "://".$_SERVER["SERVER_NAME"];
    if ($_SERVER["SERVER_PORT"] != "80") $pgurl .= ":".$_SERVER["SERVER_PORT"]; 
    return $pgurl; 
	//($pgurl .= $_SERVER["SCRIPT_NAME"]);

}
function render() {
	//check for ini file
	if($conf = parse_ini_file("config.ini")) {
		//check settings are set
		if(!$conf['stldir']) $conf['stldir'] = "out";
		if(!$conf['scaddir']) $conf['scaddir'] = "scads";
	
		//check directories exist, if not; make them.
		if(!is_dir($conf['stldir'])) mkdir($conf['stldir']);
		//if(!is_dir($conf['scaddir'])) mkdir($conf['scaddir']);
		if(!is_dir($conf['scaddir'])) {
			echo "<meta http-equiv=\"refresh\" content=\"2;url=".rootURL()."/beads/?feedback=yes&error=Error: Scad directory ".$conf['scaddir']." does not exist.\">";
			return false;
		}
	}
	else { $conf['stldir'] = "out"; $conf['scaddir'] = "scads"; }

	//set full path
	$conf['stldir'] = getcwd()."/".$conf['stldir'];	
	$conf['scaddir'] = getcwd()."/".$conf['scaddir'];	

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
	if(!is_file($conf['stldir']."/".$fname)) {
		// do render
		exec($cmd);
		rename(getcwd()."/".$fname, $conf['stldir']."/".$fname);
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

