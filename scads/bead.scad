size = 9;
holesize = 1.1;
//eoc
module bead() {
	
	color([0.3,0,0.6]) 
	render(covexity = 1) 
		difference() {
			sphere(size);
			//height, radius, radius, center
			cylinder(size*2.25, r=holesize, true);
		}
}

bead();
