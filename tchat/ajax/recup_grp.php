<?php

    include '../functions/main-functions.php';
    $channel = $_SESSION['channel'];
    $membre = $_SESSION['tchat'];

    $req = $db->query("SELECT * FROM conversation_messages WHERE (nomChannel='$channel')");
    $results = array();

    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }   

    foreach($results as $message){ 
        ?>
            <div name="message" class="message <?php echo ($message->nomUser == $membre) ? 'message-membre' : 'message-user' ?>">
                <?= $message->message ?>
            </div>
             <label class="label_tchat" for="message">   
                <?= $message->nomUser ?>
            </label>


            
            <br/><br/>

        <?php
    }