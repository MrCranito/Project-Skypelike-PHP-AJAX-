<?php 
	function createChannel($my_channel_name, $details_channel){
        global $db;
        $r = array(
            'name'=>$my_channel_name,
            'details'=>$details_channel,
            'createur'=>$_SESSION['tchat']
        );
        $sql = "INSERT INTO conversation(nameChannel,details,id_createur) VALUES(:name,:details,:createur)";
        $req = $db->prepare($sql);
        $req->execute($r);
    }
    function checkChannel($email){
        global $db;
        $e = array('email' => $email);
        $sql = 'SELECT * FROM conversation WHERE nameChannel = :email';
        $req = $db->prepare($sql);
        $req->execute($e);
        $free = $req->rowCount($sql);
        return $free;
    }
    
?>