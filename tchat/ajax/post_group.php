<?php

    include '../functions/main-functions.php';
    $channel = $_SESSION['channel'];
    $membre = $_SESSION['tchat'];
    $message = htmlspecialchars(trim($_POST['message']));

    $i = array(
        'channel' => $channel,
        'membre' =>$membre,
        'message'=>$message
    );

    $sql = "INSERT INTO conversation_messages(nomChannel,nomUser,message) VALUES(:channel,:membre,:message)";
    $req = $db->prepare($sql);
    $req->execute($i);