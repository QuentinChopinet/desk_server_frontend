
<?php
	$file = fopen("/var/www/html/php_file/alarm_time.txt","w");
	fwrite($file,$_POST['time_alarm']);
	fwrite($file,"\n");
	fclose($file);

	$success = 1;
	$msg = "Alarme réglée à ". $_POST['time_alarm'];
	$res = ["success" => $success, "msg" => $msg];
	echo json_encode($res);​
?>
