<?php

	echo "FAIL : par mesure de Securite";
	quit("viens modifier le code");

	$var_bin = file_get_contents('php://input');

	#echo file_get_contents('php://input');

	//binary writing
	$file = fopen("/var/www/html/test/binary_file/image_pour_binaire.png","wb");
        fwrite($file, $var_bin);
        fclose($file);
	echo "************ Writing image_pour_binaire.png *********\n". $var_bin ."\n********************************";

	//log
	$text = "The file has been called";
	$file = fopen("/var/www/html/test/binary_file/fake_log.txt","w");
        fwrite($file, $text);
	fclose($file);
	echo "\nWriting fake_log.txt\n";

	echo "Succes";
?>
