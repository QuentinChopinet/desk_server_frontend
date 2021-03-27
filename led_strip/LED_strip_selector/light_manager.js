            function  actualiser(){reload_led();}
            function reload_led(){
                var b = new XMLHttpRequest();
                b.open("GET","../../led_file/send_cmd_led.php");
                b.onreadystatechange=function(){
                    if(b.readyState==4){
                        if(b.status == 200){
                        }else{
                            alert("HTTP ERROR");
                        }
                    }
                }
                b.send();
            }

            function set_light(light_nb=1, state=0){ //à tester
                let xhr = new XMLHttpRequest();

                let data = "light_id=" + light_nb + "&state=" + state;


                xhr.open("POST", "../../pinONOFFn.php", true);

                xhr.onreadystatechange=function(){
                    if(xhr.readyState==4){
                        if(xhr.status == 200){
                        }else{
                            alert("HTTP ERROR");
                        }
                    }
                }
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                console.log(data);

                xhr.send(data);

                if(light_nb==2){
                    reload_led();
                }
            }


            $(document).ready(function(){

                $('#buttonON1').click(function(){
                    set_light(1,1);
                });
                $('#buttonOFF1').click(function(){
                    set_light(1,0);
                });
                $('#buttonON2').click(function(){
                    set_light(2,1);
                });
                $('#buttonOFF2').click(function(){
                    set_light(2,0);
                });
                $('#buttonON3').click(function(){
                    set_light(3,1);
                });
                $('#buttonOFF3').click(function(){
                    set_light(3,0);
                });
                $('#buttonON4').click(function(){
                    set_light(4,1);
                });
                $('#buttonOFF4').click(function(){
                    set_light(4,0);
                });
            });
