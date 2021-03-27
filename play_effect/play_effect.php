<?php
        //$effect_name = "bulle";
        $effect_name = $_POST['effect_name']; //name of the effect (same on the button)

        //write the name of the effect in selected_effet.txt
	$file_effect = fopen("/var/www/html/play_effect/selected_effect.txt","w");
        fwrite($file_effect, $effect_name);
        fclose($file_effect);

        //Récupère l'id =
        $path_file = "/var/www/html/play_effect/selected_effect_flag.txt";
        $file_id = fopen($path_file,"r");
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
        $file_id = fopen($path_file,"w");
        fwrite($file_id, $id);
        fclose($file_id);


?>

