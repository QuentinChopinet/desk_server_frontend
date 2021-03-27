<?php
	//system("echo bouge >> /home/pi/test");

	//$file = fopen("/home/pi/le_test.txt","w");
	$file = fopen("/var/www/html/php_file/test.txt","w");
	fwrite($file,"GOOOOOO");
	fclose($file);

	system("gpio -g mode 23 out");
        system("gpio -g write 23 1");
	system("sleep 1");
 	system("gpio -g mode 23 out");
        system("gpio -g write 23 0");
	system("sleep 1");

	if (isset($argc)) {
		if($argc>=2){
			if($argv[1]<10){
				system("gpio -g mode 23 out");
                		system("gpio -g write 23 1");
                		system("sleep 1");
                		system("gpio -g mode 23 out");
                		system("gpio -g write 23 0");
                		system("sleep 1");
			}
		}
	}

	if(isset($variable1)){
		system("gpio -g mode 23 out");
        	system("gpio -g write 23 1");
        	system("sleep 10");
        	system("gpio -g mode 23 out");
        	system("gpio -g write 23 0");
		system("sleep 1");
	}

	if(isset($_POST["variable1"])){
		//echo $_POST;
		echo $_POST["variable1"];
		if( $_POST["variable1"]=="4" ){
			system("gpio -g mode 23 out");
                	system("gpio -g write 23 1");
                	system("sleep 3");
                	system("gpio -g mode 23 out");
                	system("gpio -g write 23 0");
                	system("sleep 1");
		}
	}
?>
