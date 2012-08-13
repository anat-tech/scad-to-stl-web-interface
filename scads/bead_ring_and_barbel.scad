size = 6;
//eoc
$fn = 50;

module ring() {
rotate_extrude(convexity = 1)
translate([size,0,0])
circle(r=size * 0.2);
}

module barbel() {
	union() {
		//barbel
		translate([size * 1.5, 0, (size * 2.75 / 2) - (size * 0.2)])
		cylinder(h=size*2.75, r1=size * 0.25, r2 = size * 0.25, center=true);
	
		//loop on barbel
		translate([(size * 1.5/2) + (size * 0.5 /2) ,0, (size * 2.75 / 2) - (size * 0.2)])
		rotate([90,0,0])
		rotate_extrude(convexity = 1)
		translate([size* 0.5,0,0])
		circle(r=size * 0.22);
	}
}

//ring();

barbel();
