<?php

    if(!isset($_GET['user']) || isLogged() == 0 || user_exist() != 1){
        //header("Location:index.php?page=home");
    }
    $_SESSION['user'] = $_GET['user'];

    foreach(get_user() as $user){
        ?>
            <h2 class="header"><?= $user->name; ?> <a class="button_profil" href="index.php?page=user_friend&tchat=<?=$user->email?>">Voir le profil</a><a class="button_profil"><?= $user->status;?></a></h2>

            <div id="message-box" class="messages-box"><div id="uploads"></div><div class="dropzone" id="dropzone" ondrop="upload_img()"></div></div>

            <div class="bottom">
                <div class="field field-area">
                    <label for="message" class="field-label">Votre message</label>
                    <textarea name="message" id="message" rows="2" class="field-input field-textarea"></textarea>
                </div>
                <button type="submit" id="send" class="send">
                    <span class="i-send"></span>
                </button>

            </div>
        <?php
    }


