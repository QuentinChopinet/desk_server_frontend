
<?php
	$file = fopen("/var/www/html/php_file/alarm_time.txt","r");
	$contenue = fread($file,5);
	fclose($file);

	if($contenue[0] == '9'){
		$msg = "Pas d'alarme programmée";
	}else{
		$msg = "Alarme réglée à ". $contenue;
	}

	$success = 1;
	$res = ["success" => $success, "msg" => $msg];
	echo json_encode($res);​

?>
