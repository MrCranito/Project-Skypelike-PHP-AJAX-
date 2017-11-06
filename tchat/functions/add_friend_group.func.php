<?php 

    function user_exists($name_add){
        global $db;
        $u = array(
            'name'=>$name_add,
        );
        $sql = "SELECT * FROM users WHERE name=:name";
        $req = $db->prepare($sql);
        $req->execute($u);
        $exist = $req->rowCount($sql);
        return $exist;

    }


	function add_friend($name_channel, $name_friend){
        global $db;
        $r = array(
            'channel'=>$name_channel,
            'name'=>$name_friend,
        );
        $sql = "INSERT INTO abonnements(nomChannel, Name_utilisateur) VALUES(:channel,:name)";
        $req = $db->prepare($sql);
        $req->execute($r);
    }
    function checkfriend($name_friend){
        global $db;
        $e = array('email' => $name_friend);
        $sql = 'SELECT * FROM abonnements WHERE Name_utilisateur = :email';
        $req = $db->prepare($sql);
        $req->execute($e);
        $free = $req->rowCount($sql);
        return $free;
    }
    
?>