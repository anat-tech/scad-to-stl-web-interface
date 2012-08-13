size = 9;
holesize=1.1;
//eoc
if(size < 1) {
echo("'size' not set or too small");
}

if(holesize < 0.2) {
echo("'holesize' not set or too small");
}

if(holesize > size) {
echo("Logic error: holesize larger than size");
}

include <lib/shapes.scad>;
$fn=50;

module bead() {
//detail level
	render(covexity = 1) {
		//render hole
		difference() {
		hexagon(size*2,size*2);

		//height, radius, radius, center
		cylinder(size*2.25, holesize,holesize, true);
		}	
	}
}

//if passes all checks, make bead
if(size >= 1 && holesize >= 0.2 && size > holesize) {
	bead();
}
