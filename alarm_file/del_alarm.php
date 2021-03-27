<?php
	$flag_call_html=0;
	if(isset($_POST['alarm_number'])){
		$num=(int)$_POST['alarm_number'];
		$flag_call_html=1;
	}else if(isset($argc)){
		if($argc==2){
			$num=$argv[1];
		}
	}else{
		$num=0;
	}

	$flag_after = 0;
	$contenue="";

	$file = fopen("/var/www/html/alarm_file/alarm_list.txt","r");
	while (!feof($file)) {
		$line = fgets($file);
                if(feof($file)){break;}

		$list_param = explode("/",$line,2);
		if(((int)$list_param[0]) == $num){
			$flag_after = 1;
		}else if($flag_after){
			$contenue .= ((int)$list_param[0]) - 1;
			$contenue .= "/";
			$contenue .= $list_param[1];
		}else{
			$contenue .= $line;
		}
	}
	fclose($file);

	$file = fopen("/var/www/html/alarm_file/alarm_list.txt","w");
	fwrite($file,$contenue);
	fclose($file);

	//Décremente le nombre d'éléments dans la liste

	$file_id = fopen("/var/www/html/alarm_file/alarm_id.txt","r");
        //$id = (int) fread($file_id, filesize($file_id));
        while (($line = fgets($file_id)) !== false) {
                $id = (int) $line;
        }
        fclose($file_id);

        $id -= $flag_after;

        //Enregistre le nombre d'alarme dans la liste
        $file_id = fopen("/var/www/html/alarm_file/alarm_id.txt","w");
        fwrite($file_id, $id);
        fclose($file_id);



	if($flag_call_html==0){
		exit();
	}

	$success = 1;
	$msg = "Alarme " . $num . " desactivée";
	if($flag_after==0){
		$msg = "Alarme " . $num . " inconnue";
	}
	$res = ["success" => $success, "msg" => $msg];
	echo json_encode($res);​

?>
