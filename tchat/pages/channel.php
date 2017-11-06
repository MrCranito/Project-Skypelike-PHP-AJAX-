<?php 
    if(isLogged() == 0){
        header("Location:index.php?page=signin");
    }
?>
<a class="button_channel" type="button" href="index.php?page=createGroup">Créé un nouveau groupe privé</a>
<a class="button_channel" type="button" href="index.php?page=createChannel">Créé une nouvelle Channel</a > 
<h2 class="header">Tous les channels</h2>


<?php
    foreach(get_channel() as $membre){  
        if($membre->id_createur != $_SESSION['tchat']){
            ?>
                <div class="membre">
                    <strong><?= $membre->nameChannel ?></strong><br/>
                    <span><?= $membre->details ?></span><br/>
                    <a class="select_add_friend" id="button_friend" href="index.php?page=channel&Namechannel=<?=$membre->nameChannel?>&add=true"><span class="i-user"></span></a>
                    <a class="select" href="index.php?page=tchat_group&channel=<?= $membre->nameChannel?>&name_user=<?=$_SESSION['tchat']?>"><span><img src="images/message.png" width="40" height="40"/></span></a>

                </div>
                <?php
            
        }
        else{
            ?>
                <div class="membre" style="background-color:#81F79F">
                    <strong><?= $membre->nameChannel ?></strong><br/>
                    <span><?= $membre->details ?></span><br/>
                    <a class="delete_channel_admin" href="index.php?page=channel&Namechannel=<?=$membre->nameChannel?>&delete_admin=true"><span><img src="images/delete.svg" width="40" height="40"></span></a>
                    <a class="select_add_friend" id="button_friend" href="index.php?page=channel&Namechannel=<?=$membre->nameChannel?>&add=true"><span class="i-user"></span></a>
                    <a class="select" href="index.php?page=tchat_group&channel=<?= $membre->nameChannel?>&name_user=<?=$_SESSION['tchat']?>"><span><img src="images/message.png" width="40" height="40"/></span></a>

                </div>
                <?php
            
        }

    }
?>

<?php
 if(isset($_GET['delete_admin'])){
    delete_channel_admin();
}
?>

<?php 
if(isset($_GET['add'])){
    $my_use_channel = $_GET['Namechannel'];
    $use_name = $_SESSION['tchat'];
    if (channel_already_add($use_name,$my_use_channel)==1){
            $error_add_friend = "Cet channel a déjà été ajouté";


    }
    else{
             add_channel($my_use_channel);
             
        }
}
?>
<h2 class="header">Vos Channels</h2>
<span><a><?php echo (isset($error_add_friend))? $error_add_friend:''; ?></a></span>
<?php include './functions/get_friend.func.php' ?>
<?php
    foreach(get_channel_friend() as $membre){
        if($membre->Name_user = $_SESSION['tchat']){
            ?>
                <div class="membre">
                    <strong><?= $membre->Name_user ?></strong><br/>
                    <span><?= $membre->Name_channel ?></span><br/>
                    <a class="delete_channel" href="index.php?page=channel&user=<?=$membre->Name_user?>&channel=<?=$membre->Name_channel?>&delete=true"><span><img src="images/delete.svg" width="40" height="40"/></span></a>
                    <a class="select" href="index.php?page=tchat_group&channel=<?= $membre->Name_channel?>&name_user=<?=$_SESSION['tchat']?>"><span><img src="images/message.png" width="40" height="40"/></span></a>
                </div>

            <?php
        }

    }
?>
<h2 class="header">Vos Groups </h2>
<?php
    foreach(get_group() as $membre){
        if($membre->id_createur != $_SESSION['tchat']){
            ?>
                <div class="membre">
                    <strong><?= $membre->nameChannel ?></strong><br/>
                    <span><?= $membre->details ?></span><br/>
                    <a class="video_tchat_grp_noamdin" href="index.php?page=tchat_video_group&user=<?=$membre->nameChannel?>"><span><img src="images/tchat_video.svg" width="40" height="40"></span></a>
                    <a class="delete_channel" href="index.php?page=channel&user=<?=$membre->id_createur?>&channel=<?=$membre->nameChannel?>&delete=true"><span><img src="images/delete.svg" width="40" height="40"/></span></a>
                    <a class="select" href="index.php?page=tchat_group&channel=<?= $membre->nameChannel?>&name_user=<?=$_SESSION['tchat']?>"><span><img src="images/message.png" width="40" height="40"/></span></a>
                </div>

            <?php
        }
        elseif($membre->id_createur = $_SESSION['tchat']){
            ?>
                <div class="membre" style="background-color:#81F79F">
                    <strong><?= $membre->nameChannel ?></strong><br/>
                    <span><?= $membre->details ?></span><br/>
                    <a class="add_friend" href="index.php?page=add_friend_group&channel=<?=$membre->nameChannel?>"><span><img src="images/plus.svg" width="40" height="40"></span></a>
                    <a class="video_tchat_grp" href="index.php?page=tchat_video_group&user=<?=$membre->nameChannel?>"><span><img src="images/tchat_video.svg" width="42" height="42"></span></a>
                    <a class="delete_channel" href="index.php?page=channel&user=<?=$membre->id_createur?>&channel=<?=$membre->nameChannel?>&delete=true"><span><img src="images/delete.svg" width="40" height="40"/></span></a>
                    <a class="select" href="index.php?page=tchat_group&channel=<?= $membre->nameChannel?>&name_user=<?=$_SESSION['tchat']?>"><span><img src="images/message.png" width="40" height="40"/></span></a>
                </div>

            <?php
        }

    }
?>

<?php
 if(isset($_GET['delete'])){
    delete_channel_friend();    
}