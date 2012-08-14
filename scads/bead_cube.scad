diameter = 9;
holesize = 1.1;
//eoc

module bead(size, holesize) {
//detail level
$fn=25;
	//render hole
	render(covexity = 1)
		difference() {
			//rounded cube
			minkowski() {
				minkowski() {
					minkowski() {
						cube(size=(diameter * 0.75), center=true);
						rotate([90,0,0]) cylinder(r=diameter*0.25);
					}
					rotate([0,90,0]) cylinder(r=diameter*0.25);
				}
				cylinder(r=diameter*0.25);
			}

			//height, radius, center
			cylinder(h=(diameter*5.25), r=holesize, center=true);
		}
}
bead();
