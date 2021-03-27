<?php
	$file = fopen("/var/www/html/php_file/alarm_time.txt","w");
	fwrite($file,"99:99");
	fwrite($file,"\n");
	fclose($file);

	$success = 1;
	$msg = "Alarme desactivée";
	$res = ["success" => $success, "msg" => $msg];
	echo json_encode($res);​
?>
