
<h2 class="header header-form"><?php echo 'Profil de ' .$_GET['tchat']?></h2>

<div class="my_profil_friend">
  <?php $my_link='images_utilisateurs/'.$_GET['tchat'].'/'.$_GET['tchat'].'.'.'jpeg';
  echo '<img class="my_pic" src="'.$my_link.'">';
     ?>
</div>
<?php foreach (get_friend_id() as $id) {?>
<form method="post" id="regForm" style="float:top">
<div class="container_select_friend">
<select>
  <option><?php echo $id->status?><option>
</select>
</div>

    <div class="field has-label is-focused" style="float:left;margin-left:510px;width:20%">
        <label class="field-label" for="id">ID de votre ami</label>
        <input class="field-input" type="int" name="id" id="id" value="<?php echo $id->id;?>"/>

    </div>
    <div class="field has-label is-focused" style="float:left;margin-left:510px;width:20%">
        <label class="field-label" for="name">Nom de votre ami</label>
        <input class="field-input" type="text" name="name" id="name" value="<?php echo $id->name;?>"/>
    </div> 

    <div class="field has-label is-focused" style="float:left;margin-left:510px;width:20%">
        <label class="field-label" for="email">Adresse mail de votre ami</label>
        <input class="field-input" type="email" name="email" id="email" value="<?php echo $id->email?>"/>
    </div>
    
      
     <?php }?>
    
</form>
 <div class="button_friend">
     <a class="call_home_friend" href="index.php?page=call&user=<?=$_GET['tchat']?>"><span><img src="images/call.png" width="80" height="80"></span></a>      
      <a class="call_video_friend" href="index.php?page=tchat_video&user=<?=$_GET['tchat']?>" ><span><img src="images/tchat_video.svg" width="80" height="80"></span></a>
      <a class="tchat_with_friend" href="index.php?page=tchat&user=<?=$_GET['tchat']?>"><span><img src="images/message.png" width="80" height="80"></span></a>
</div>

<?php if(isset($_GET['page'])){
    get_id();
  }?>
<?php 
function get_friend_id(){
    $my_email=$_GET['tchat'];
    global $db;
    $req =$db->query("SELECT * FROM users WHERE email ='$my_email'");
    while($rows = $req->fetchObject()){
            $results[] = $rows;
        }
    return $results;
}?>

