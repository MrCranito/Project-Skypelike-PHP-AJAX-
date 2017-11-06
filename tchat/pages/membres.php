 <?php 
    if(isLogged() == 0){
        header("Location:index.php?page=signin");
    }
?>

<h2 class="header">Tous les membres</h2>
<?php
    foreach(get_membres() as $membre){
        $_SESSION['my_friend_name']=$membre->name;

        $_SESSION['my_friend_email']=$membre->email;
        if($membre->email != $_SESSION['tchat']){
            ?>
                <div class="membre">
                    <strong><?= $membre->name ?></strong><br/>
                    <span><?= $membre->email ?></span><br/>
                    <a style="visibility:hidden" class="friend_already_add" ><span><a><?php echo (isset($error_add_friend)) ? $error_add_friend:''; ?></a></span></a>
                    <a class="tchat_video" href="index.php?page=tchat_video&user=<?= $membre->email ?>"><span><img src="images/tchat_video.svg" width="40" height="40"/></span></a>
                    <a class="call" href="index.php?page=tchat_audio&user=<?= $membre->email ?>"><span><img src="images/call.png" width="40" height="40"/></span></a>
                    <a class="select_add_friend" id="button_friend" href="index.php?page=membres&user=<?=$membre->email?>&user_email=<?=$membre->name?>&use_name=<?=$_SESSION['tchat']?>&add=true"><span class="i-user"></span></a>
                    <a class="select" href="index.php?page=tchat&user=<?= $membre->email ?>"><span><img src="images/message.png" width="40" height="40"/></span></a>

                </div>
                <?php
            
        }

    }
?>

<?php 
include './functions/add_user.func.php';
if(isset($_GET['add'])){
    $my_use_name = $_GET['user'];
    $my_use_email =$_GET['user_email'];
    $use_name = $_SESSION['tchat'];
    if (friend_already_add($use_name,$my_use_email)==1){
            $error_add_friend = "Cet amis à déjà été ajouté";
            header("Location:index.php?page=membre&my_user_add=1");


    }
    else{
             add_friend($my_use_name,$my_use_email,$use_name);
             
        }
}
?>
<h2 class="header">Vos amis</h2>
<span><a><?php echo (isset($error_add_friend))? $error_add_friend:''; ?></a></span>
<?php include './functions/get_friend.func.php' ?>
<?php
    foreach(get_friend() as $membre){
        if($membre->email_friend != $_SESSION['tchat']){
            ?>
                <div class="membre">
                    <strong><?= $membre->email_friend ?></strong><br/>
                    <span><?= $membre->friend_name ?></span><br/>
                    <a></a>
                    <a class="delete" id="btn" href="index.php?page=membres&user=<?= $membre ->email_friend?>&delete=true"><span><img src="images/delete.svg" width="40" height="40"/></span></a>
                    <a class="tchat_video_friend" href="index.php?page=tchat_video&user=<?=$membre->email_friend?>"><span><img src="images/tchat_video.svg" width="40" height="40"/></span></a>
                    <a class="call_friend" ><span><img src="images/call.png" width="40" height="40"/></span></a>
                    <a class="select" href="index.php?page=tchat&user=<?= $membre->email_friend ?>"><span><img src="images/message.png" width="40" height="40"/></span></a>
                </div>

            <?php
        }

    }
?>

<?php if(isset($_GET['delete'])){
    delete_friend();
}