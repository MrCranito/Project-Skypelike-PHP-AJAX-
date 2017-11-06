<?php 
    function get_user_channel(){
        global $db;
        $req = $db->query("SELECT * FROM conversation_messages WHERE nomChannel = '{$_SESSION['channel']}'");
        $user = array();
        while($row = $req->fetchObject()){
            $user[] = $row;
        }
        return $user;

    }