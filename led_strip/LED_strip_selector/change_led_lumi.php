<?php
	$log_message = "";

	//Traite l'argument pour savoir s'il faut augmenter ou diminuer la luminosité
	$nb = $_POST['increase']; //0 pour diminuer ; 1 pour augmenter
	$modifier=0.7;
	if($nb){
		$modifier=1.3;
	}

	//Récupère les couleurs actuelles
	$file = fopen("/var/www/html/led_strip/LED_strip_selector/led_data_for_python.txt", "r");
        $content = "";
	while (!feof($file)) {
                $line = fgets($file);
                if(feof($file)){break;}
                if($line[0]=="0"){
			$content .= "0\n";
		}else{
			//Convertie les couleurs
			$rouge = hexdec($line[1].$line[2]) * $modifier;
			$rouge_str = dechex($rouge);
			if($rouge<16){
				$rouge_str = "0".$rouge_str;
			}

			$vert = hexdec($line[3].$line[4]) * $modifier;
                        $vert_str = dechex($vert);
                        if($vert<16){
                                $vert_str = "0".$vert_str;
                        }

			$bleu = hexdec($line[5].$line[6]) * $modifier;
                        $bleu_str = dechex($bleu);
                        if($bleu<16){
                                $bleu_str = "0".$bleu_str;
                   	}

			$content .="#" . $rouge_str . $vert_str . $bleu_str . "\n";
		}
	}


	//Enregistre les nouvelles couleurs
	$file_id = fopen("/var/www/html/led_strip/LED_strip_selector/led_data_for_python.txt","w");
        fwrite($file_id, $content);
	fclose($file_id);

	include '/var/www/html/led_file/send_cmd_led.php';

	$res = ["success" => $success, "msg" => $msg];
	echo json_encode($res);​

?>
