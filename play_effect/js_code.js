function play_effect(effect_name_arg){
    let xhr = new XMLHttpRequest();
    let data = "effect_name=" + effect_name_arg;
    xhr.open("POST", "play_effect.php", true);
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
}

$(document).ready(function(){
    //load the buttons
    $(function(){
        console.log("loading button");
        $("#button_code").load("html_code.html");
        console.log("end of  :loading button");
    });

    //add action to the button
    var checkExist = setInterval(function() {
        if ($('#warning_light').length) { //the last effect id is ready
            console.log("Exists!");
            clearInterval(checkExist);
            $("#dead_pixel_test").click(function(){play_effect("dead_pixel_test");});
            $("#demo").click(function(){play_effect("demo");});
            $("#disco").click(function(){play_effect("disco");});
            $("#killer_support").click(function(){play_effect("killer_support");});
            $("#loading_bar").click(function(){play_effect("loading_bar");});
            $("#ping_pong").click(function(){play_effect("ping_pong");});
            $("#rainbow_turning").click(function(){play_effect("rainbow_turning");});
            $("#rainbow_turning_smooth").click(function(){play_effect("rainbow_turning_smooth");});
            $("#sundive_30min").click(function(){play_effect("sundive_30min");});
            $("#sundive_3min").click(function(){play_effect("sundive_3min");});
            $("#sunrise_30min").click(function(){play_effect("sunrise_30min");});
            $("#sunrise").click(function(){play_effect("sunrise");});
            $("#warning_light").click(function(){play_effect("warning_light");});
        }
    }, 100); // check every 100ms
});
