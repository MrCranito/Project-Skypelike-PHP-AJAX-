<?php

    include '../functions/main-functions.php';
    $user = $_SESSION['user'];
    $membre = $_SESSION['tchat'];

    $req = $db->query("SELECT * FROM messages WHERE (sender='$membre' AND receiver='$user') OR (receiver='$membre' AND sender='$user')");
    $results = array();

    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    foreach($results as $message){
        ?>
            <div id="message_recup" class="message <?php echo ($message->sender == $membre) ? 'message-membre' : 'message-user' ?>">
                <?= $message->message ?>
            <?php $textcode=array(':<',':O',':|',':s',';(',':D','3)',':p');
                 $imagecode=array('<img src="images/emoticone/png/angry.png">',
                        '<img src="images/emoticone/png/angry.png">',
                        '<img src="images/emoticone/png/angry.png">',
                        '<img src="images/emoticone/png/angry.png">',
                        '<img src="images/emoticone/png/angry.png">',
                        '<img src="images/emoticone/png/angry.png">',
                        '<img src="images/emoticone/png/angry.png">',
                        '<img src="images/emoticone/png/angry.png">',
                        '<img src="images/emoticone/png/angry.png">');

                if(('$(#message_recup)')===$textcode){
                  str_replace($textcode, $imagecode,'$(#message_recup)');} ?>
                </div>
            <br/><br/>

        <?php
    }
    
     

        
       