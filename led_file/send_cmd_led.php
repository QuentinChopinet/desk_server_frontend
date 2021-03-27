<?php
	//Récupère l'id = 
	$file_id = fopen("/var/www/html/led_file/led_color_id.txt","r");
	$id = (int) fread($file_id, 1);
	while (($line = fgets($file_id)) !== false) {
        	$id = (int) $line;
    	}
	fclose($file_id);

	//incrémente
	$id += 1;
	if($id>3){
		$id = 0;
	}

	//Enregistre le nombre d'alarme dans la liste
	$file_id = fopen("/var/www/html/led_file/led_color_id.txt","w");
        fwrite($file_id, $id);
        fclose($file_id);

?>
