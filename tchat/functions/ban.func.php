<?php 


function ban_user($try_to_connect){
            if($try_to_connect==3){
                $error_user_not_found="Vous avez été banni 10min";
            }
            elseif($try_to_connect==6){
                $error_user_not_found="Vous avez été banni pour 30min";
            }
            elseif ($try_to_connect==10){
                $error_user_not_found="Votre Compte à été Banni, veuillez vous addresez à Qwirk@supinfo.com";
            }


 }?>