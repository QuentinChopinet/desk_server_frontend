<?php
	//system("echo bouge >> /home/pi/test");


	system("gpio -g mode 23 out");
        system("gpio -g write 23 1");
	system("sleep 1");
 	system("gpio -g mode 23 out");
        system("gpio -g write 23 0");
	system("sleep 1");

	system("./test.sh");

	//system("rainbowled");


	//system("sudo python3 /var/www/html/toggle_halo.py");

//Ne fonctionne pas à cause du fichier crontab qui n'est pas init pour l'utilisateur www-data
/*	$path = "/var/www/html/php_file/test_cronos.txt";

	$file = fopen($path, "w");
	fclose($file);
	system("crontab -l >> " . $path);

	$file = fopen($path, "a");
        fwrite($file,"\n50 18 * * * python /home/pi/toggle.py");
        fclose($file);
	system("crontab " . $path);
*/

?>
