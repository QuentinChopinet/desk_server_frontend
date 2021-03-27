<?php
        $line_nb = (int)$_POST['line']; //1 -> 3
        $state = (int)$_POST['state']; //0 ou 1

	$text = "";
	$line_i = 0;

	//Lecture du fichier et transformation
        $file = fopen("/var/www/html/admin_page/page_state.txt","r");
        while (!feof($file)) {
		$line_i += 1;
                $line = fgets($file);
                if(feof($file)){break;}
                if($line_i == $line_nb){
			$text .= $state."\n";
		}else{
			$text .= $line;
        	}
	}
        fclose($file);

	//Ecriture
	$file = fopen("/var/www/html/admin_page/page_state.txt","w");
	fwrite($file, $text);
	fclose($file);

?>

