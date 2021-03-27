<?php


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

        //Build respond
        $text = "";
	$text .= strval($my_array->physical_switch);
	$text .= "/";
        $text .= strval($my_array->web_switch);
        $text .= "/";
        $text .= strval($my_array->simple_alarm);
        $text .= "/";
        $text .= strval($my_array->advanced_alarm);
        $text .= "/";
        $text .= strval($my_array->winter_mode);
        $text .= "/";
        $text .= strval($my_array->musical_entrance);
        $text .= "/";
        $text .= strval($my_array->baby_driver);
        $text .= "/";
        $text .= strval($my_array->disco);

	$msg = "Succès du chargement des données";

	$success = 1;
	$res = ["success" => $success, "msg" => $msg, "text" => $text];
	echo json_encode($res);​
?>
