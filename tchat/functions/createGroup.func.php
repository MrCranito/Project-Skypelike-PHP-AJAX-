<?php 
	function createGroup($my_channel_name, $details_channel){
        global $db;
        $r = array(
            'name'=>$my_channel_name,
            'details'=>$details_channel,
            'createur'=>$_SESSION['tchat'],
            'status'=>2
        );
        $sql = "INSERT INTO conversation(nameChannel,details,id_createur,abonne) VALUES(:name,:details,:createur,:status)";
        $req = $db->prepare($sql);
        $req->execute($r);
    }
    function checkGroup($email){
        global $db;
        $e = array('email' => $email);
        $sql = 'SELECT * FROM conversation WHERE nameChannel = :email AND abonne=2';
        $req = $db->prepare($sql);
        $req->execute($e);
        $free = $req->rowCount($sql);
        return $free;
    }
    
?>