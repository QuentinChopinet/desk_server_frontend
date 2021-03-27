<?php
        $line_nb = (int)$_POST['line']; //1 -> 5


	//load json from txt file
	$content = "";
	$file = fopen("/var/www/html/admin_page/fichier_config.json","r");
	while (!feof($file)){
	    $line = fgets($file);
	    if(feof($file)){break;}
	    $content .= $line;
	}
	fclose($file);
	$json_texte = $content;

	//convert json to array
	$my_array = json_decode($json_texte);

        //modifie parameter array
        if ($line_nb == 1){
                if($my_array->physical_switch == 0){
                    $my_array->physical_switch = 1;
                }else{
                    $my_array->physical_switch = 0;
                }
        }else if($line_nb == 2){
                if($my_array->web_switch == 0){
                    $my_array->web_switch = 1;
                }else{
                    $my_array->web_switch = 0;
                }
        }else if($line_nb == 3){
            if($my_array->simple_alarm == 0){
                    $my_array->simple_alarm = 1;
                }else{
                    $my_array->simple_alarm = 0;
                }
        }else if($line_nb == 4){
            if($my_array->advanced_alarm == 0){
                    $my_array->advanced_alarm = 1;
                }else{
                    $my_array->advanced_alarm = 0;
                }
        }else if($line_nb == 5){
            if($my_array->winter_mode == 0){
                    $my_array->winter_mode = 1;
                }else{
                    $my_array->winter_mode = 0;
                }
        }else if($line_nb == 6){
            if($my_array->musical_entrance == 0){
                    $my_array->musical_entrance = 1;
                }else{
                    $my_array->musical_entrance = 0;
                }
        }else if($line_nb == 7){
            if($my_array->baby_driver == 0){
                    $my_array->baby_driver = 1;
                }else{
                    $my_array->baby_driver = 0;
                }
        }else if($line_nb == 8){
            if($my_array->disco == 0){
                    $my_array->disco = 1;
                }else{
                    $my_array->disco = 0;
                }
        }

	//write json file
	$file = fopen("/var/www/html/admin_page/fichier_config.json","w");
	fwrite($file, json_encode($my_array, JSON_PRETTY_PRINT));
        fwrite($file, "\n");
	fclose($file);

?>

