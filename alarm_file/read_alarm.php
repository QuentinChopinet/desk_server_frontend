
<?php
	$text = "";

	$file = fopen("/var/www/html/alarm_file/alarm_list.txt","r");
	while (!feof($file)) {
		$line = fgets($file);
		if(feof($file)){break;}
        	$list_param = explode("/",$line); $text .= $list_param[0] . ") "; //id
		$text .= $list_param[1]; //nom
		$text .= " à " . $list_param[2]; //heure
		$text .= " : Lampe Bureau->".$list_param[3];
                $text .= " , LEDs Bureau->".$list_param[4];
                $text .= " , Lampe Chevet->".$list_param[5];
                $text .= " , Halogène->".$list_param[6];

		if(((int)$list_param[7]) == 0){
			$text .= " ; Suppression après alarme";
		}else{
			$text .= " ; Répétition les ";
			for($i=8; $i<((int)$list_param[7])+8; $i++){
				$text .= $list_param[$i] . " ";
			}
		}
		 //$text .= "\n";
		$text .= "<br/><br/>";
    	}
	fclose($file);

	if(strlen($text) == 0){
		$text = "Pas d'alarme programmée";
	}

	$msg = "Succès du chargement des données";

	$success = 1;
	$res = ["success" => $success, "msg" => $msg, "text" => $text];
	echo json_encode($res);​
?>
