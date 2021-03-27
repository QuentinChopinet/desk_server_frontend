<?php
	$log_message = "";

	$color_tab = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

	//+++ Test
	$keywords = preg_split("/[\s,]+/", "langage hypertexte, programmation");

	foreach($keywords as $word){
		$log_message .= "(". $word .")";
	}
	//+++


	$tempo_string = $_POST['var_tankin'];
	$log_message .= "ZZZ";
	$log_message .= $tempo_string;
	$log_message .= "ZZZ\n";
	$line_list = preg_split("/[\s,]+/", $tempo_string);

	$log_message .= "Nb of lines : " . count($line_list);
        $log_message .= "\n";

	$log_message .= "Contenue : " . $line_list;
	$log_message .= "\n";

	foreach($line_list as $word){
                $log_message .= "(". $word .")";
        }


	foreach($line_list as $line){
		$log_message .= "\n\nadding line : $line";
		$element_list = explode("/", $line);
		$log_message .= "\n Nb of elements : " . count($element_list);
		$log_message .= "\ncolor : ".$element_list[0];
		$log_message .= "\n".$element_list[0];

		if(count($element_list)>=3){
			$log_message .= "\nOUI";
			for ($i = 2; $i < (int)$element_list[1]+2; $i++) {
    				$log_message .= ".";
				$log_message .= $element_list[$i];
				$color_tab[(int)$element_list[$i]] = $element_list[0]; //cast ???????
			}
		}
	}

	//reverse color tab
	$i = count($color_tab)-1;
	$reverse_color_tab = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	foreach($color_tab as $color){
                $reverse_color_tab[$i] = $color;
        	$i-=1;
	}

	$file_id = fopen("/var/www/html/led_strip/LED_strip_selector/led_data_for_python.txt","w");
	//fwrite($file_id, "LE TEXTE : ***");
	//fwrite($file_id, $_POST['var_tankin']);
	//fwrite($file_id, $_POST);
	//fwrite($file_id, "***\n");
	//fwrite($file_id, $log_message);
	//fwrite($file_id, "***\n");

	foreach($reverse_color_tab as $color){
	        fwrite($file_id, $color);
		fwrite($file_id, "\n");
	}

        //fwrite($file_id, "***\n");
	fclose($file_id);

	include '/var/www/html/led_file/send_cmd_led.php';

	$res = ["success" => $success, "msg" => $msg];
	echo json_encode($res);​


	//include '/var/www/html/led_file/send_cmd_led.php';
	//exec('php ../../led_file/send_cmd_led.php');
?>
