size = 9;
holesize = 1.1;
//eoc

module bead(size, holesize) {
//detail level
$fn=50;
	render(covexity = 1)
		//render hole
		difference() {
			//rounded cube
			minkowski() {
				minkowski() {		
					minkowski() {
						cube(size * 0.75, true);
						rotate([90,0,0]) cylinder(r=size*0.25);
					}
					rotate([0,90,0]) cylinder(r=size*0.25);
				}
				cylinder(r=size*0.25);
			}

			//height, radius, radius, center
			cylinder(size*5.25, holesize,holesize, true);
		}
}

bead();
