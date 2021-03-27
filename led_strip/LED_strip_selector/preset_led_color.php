<?php
	//color liste :
	// 1- rainbow
	// 2- orange
	// 3- cian
	// 4- vert
	// 5- violet

	$log ="";

	//récupére le numéro du style à afficher
	$nb = $_POST['style_nb'];
	$log.="var recu par POST : ".$nb."\n";

	//convertie le num en nom de fichier
	if($nb == "1"){
		$file_name = "preset_rainbow.txt";
		$log.="=1\n";
 	}else if($nb == "2"){
		$file_name = "preset_orange.txt";
		$log.="=2\n";
	}else if($nb == "3"){
        $file_name = "preset_cian.txt";
		$log.="=3\n";
	}else if($nb == "4"){
		$file_name = "preset_green.txt";
		$log.="=4\n";
	}else if($nb == "5"){
		$file_name = "preset_purpul.txt";
		$log.="=5\n";
	}else{
		$log.="exit";
		$file = fopen("/var/www/html/led_strip/LED_strip_selector/log_tankin.txt" , "w");
        	fwrite($file, $log);
        	fclose($file);
		exit(0);
	}

	//Récupere le contenue du fichier
	$file = fopen("/var/www/html/led_strip/LED_strip_selector/preset_color/".$file_name , "r");
	$content =""; // fread($file, filesize($file));
	while (!feof($file)) {
		$content.=fread($file,1);
		if(feof($file)){break;}
	}
	fclose($file);

	//copie le contenue du fichier dans led_data_for_python.txt
	$file = fopen("/var/www/html/led_strip/LED_strip_selector/led_data_for_python.txt" , "w");
	fwrite($file, $content);
	fclose($file);

	//fichier de log
	$log.=$content;
	$file = fopen("/var/www/html/led_strip/LED_strip_selector/log_tankin.txt" , "w");
        fwrite($file, $log);
        fclose($file);

?>
