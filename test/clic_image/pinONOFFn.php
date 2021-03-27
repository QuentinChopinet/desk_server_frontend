<?php
        $light_id = (int)$_POST['light_id']; //1 -> 4
        $pin_nb = 0; //numéro sur la Rpi
        $state = (int)$_POST['state']; //0 ou 1

        //contvert pin
        if($light_id==1){
            $pin_nb = 17;
        }else if($light_id==2){
            $pin_nb = 23;
        }else if($light_id==3){
            $pin_nb = 27;
        }else if($light_id==4){
            $pin_nb = 22;
        }

        if($pin_nb!=0){
            system("gpio -g mode " . $pin_nb . " out");
            system("gpio -g write " . $pin_nb . " " . $state);
        }

?>
