<?php
function get_friend(){
    	global $db;
    	$my_us= $_SESSION['tchat'];
    	$new_req = $db -> query("SELECT * FROM friend_list WHERE name_users='{$my_us}'");
     	$my_results=array();
     	$my_row=0;
       	while($my_row=$new_req->fetchObject()){
    		$my_results[] = $my_row;

    	}
    	return $my_results;
    }
    ?>