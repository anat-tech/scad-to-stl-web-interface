height = 30;
width=6;
holesize = 4.5;

$fn = 50;
module spacer() {
//detail level
	render(covexity = 1) {
		//render hole
		difference() {
			cylinder(h=height, r=width, center=true);

			//height, radius, radius, center
			cylinder(height*2.25, r=holesize, true);
		}	
	}
}

spacer();