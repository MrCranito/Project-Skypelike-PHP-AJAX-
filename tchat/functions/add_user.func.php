<?php
    function add_friend($my_use_name,$my_use_email,$user_name){
        global $db;
        $user_name = $_SESSION['tchat'];
        $ds = array('email_f'=> $my_use_name,
        			'friend_n'=> $my_use_email,
                    'user_n'=> $user_name);
        $puty = "INSERT INTO friend_list(email_friend,friend_name,name_users) VALUES(:email_f,:friend_n,:user_n)";
		$req_friend = $db->prepare($puty);
        $req_friend->execute($ds);
        return $ds; 
    }
    function friend_already_add($user_name,$friend_name){
        global $db;
        $e = array('email' => $user_name,
                    'friend_mail'=>$friend_name);
        $sql = 'SELECT * FROM friend_list WHERE name_users = :email AND friend_name=:friend_mail';
        $req = $db->prepare($sql);
        $req->execute($e);
        $free = $req->rowCount($sql);

        return $free;
    }