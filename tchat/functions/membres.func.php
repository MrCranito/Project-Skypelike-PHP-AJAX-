<?php

    function get_membres(){
        global $db;
        $req = $db->query("SELECT * FROM users");
        $results = array();
        while($rows = $req->fetchObject()){
            $results[] = $rows;
        }
        return $results;
    }
    

    function delete_friend(){
    $my_email_friend = $_GET['user'];
    $my_user_name = $_SESSION['tchat'];
    global $db;
    $req=$db->query("DELETE FROM friend_list WHERE email_friend='$my_email_friend' AND name_users='$my_user_name'");
    
    }




