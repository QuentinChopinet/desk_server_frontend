
<?php
	//Récupère l'id = numéro de l'alarme
	$file_id = fopen("/var/www/html/alarm_file/alarm_id.txt","r");
	$id = (int) fread($file_id, filesize($file_id));
	while (($line = fgets($file_id)) !== false) {
        	$id = (int) $line;
    	}
	fclose($file_id);

	$id += 1;

	//Enregistre le nombre d'alarme dans la liste
	$file_id = fopen("/var/www/html/alarm_file/alarm_id.txt","w");
        fwrite($file_id, $id);
        fclose($file_id);

	$separator = "/";

	//Ecrit la nouvelle alarme dans la liste
	$file = fopen("/var/www/html/alarm_file/alarm_list.txt","a");
	fwrite($file,$id . $separator);
	fwrite($file,$_POST['alarm_name'] . $separator);
	fwrite($file,$_POST['time_alarm'] . $separator);
	fwrite($file,$_POST['action_1'] . $separator);
	fwrite($file,$_POST['action_2'] . $separator);
	fwrite($file,$_POST['action_3'] . $separator);
	fwrite($file,$_POST['action_4'] . $separator);

	$tempo_day = $_POST['day'];
	if((int)$_POST['repetition']){ //prend en compte les jours cochés
		fwrite($file,sizeof($tempo_day) . $separator);
		foreach ($tempo_day as $valeur){
			fwrite($file,$valeur . $separator);
        	}
	}else{
		fwrite($file,"0" . $separator);
	}

	fwrite($file,"\n");
	fclose($file);


	//ajoute wake up pour python dans crontab
	system("crontab -l >> /var/www/html/alarm_file/cron_wake_up_table.txt"); //load current wake up table
	$file_id = fopen("/var/www/html/alarm_file/cron_wake_up_table.txt","a");
        //fwrite($file_id, $id);
        fclose($file_id);

	system("crontab /var/www/html/alarm_file/cron_wake_up_table.txt"); //save new wake up table

	$success = 1;
	$msg = "Alarme réglée à ". $_POST['time_alarm'];
	$res = ["success" => $success, "msg" => $msg];
	echo json_encode($res);​
?>
