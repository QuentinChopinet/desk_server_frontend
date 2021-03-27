<?php
	//system("gpio -g mode 23 out");
        //system("gpio -g write 23 1");
	//system("python /var/www/html/toggle_halo.py");

	system("gpio -g mode 22 out");
	$state = system('gpio -g read 22');
	//print("***".!$state."***");
	if($state==1){
		system("gpio -g write 22 0");
	}else{
		system("gpio -g write 22 1");
	}
?>
