<?php 
    function get_channel(){
        global $db;
        $req = $db->query("SELECT * FROM conversation WHERE abonne=1");
        $results = array();
        while($rows = $req->fetchObject()){
            $results[] = $rows;
        }
        return $results;
    }
    function add_channel($my_use_channel){
        global $db;
        $user_name = $_SESSION['tchat'];
        $ds = array('Name'=> $user_name,
                    'Name_channel'=> $my_use_channel);
        $puty = "INSERT INTO conversation_list(Name_user,Name_channel) VALUES(:Name,:Name_channel)";
        $req_friend = $db->prepare($puty);
        $req_friend->execute($ds);
        return $ds; 
    }
    function channel_already_add($user_channel,$friend_channel){
        global $db;
        $e = array('channel' => $user_channel,
                    'friend_channel'=>$friend_channel);
        $sql = 'SELECT * FROM conversation_list WHERE Name_user = :channel AND Name_channel=:friend_channel';
        $req = $db->prepare($sql);
        $req->execute($e);
        $free = $req->rowCount($sql);

        return $free;
    }
    function get_channel_friend(){
        $get_user=$_SESSION['tchat'];
        global $db;
        $req = $db->query("SELECT * FROM conversation_list WHERE Name_user='$get_user'");
        $results = array();
        while($rows = $req->fetchObject()){
            $results[] = $rows;
        }
        return $results;
    }
    function delete_channel_admin(){
        $get_channel=$_GET['Namechannel'];
        $get_user=$_SESSION['tchat'];
        global $db;
        $req=$db->query("DELETE FROM conversation WHERE nameChannel='$get_channel' AND id_createur='$get_user'");
    }

    function delete_channel_friend(){
        $get_channel=$_GET['channel'];
        $get_user=$_SESSION['tchat'];
        global $db;
        $req=$db->query("DELETE FROM conversation_list WHERE Name_user='$get_user' AND Name_channel='$get_channel'");
    }
    function get_group(){
        global $db;
        $req = $db->query("SELECT * FROM conversation WHERE abonne=2");
        $results = array();
        while($rows = $req->fetchObject()){
            $results[] = $rows;
        }
        return $results;
    }
?>
