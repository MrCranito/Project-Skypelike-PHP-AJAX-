
<h2 class="header header-form"> Votre profil </h2>

<div class="my_profil">
  <?php $my_link='images_utilisateurs/'.$_SESSION['tchat'].'/'.$_SESSION['tchat'].'.'.'jpeg';
  echo '<img class="my_pic" src="'.$my_link.'">';
     ?>
<form enctype="multipart/form-data" action="" method="post" id="picForm">
<input  type="file" name="picture_profil" id="monInputFile"></input>

<input class="button_add_pic" type="submit" name="send_pic"/>
</form>
</div>
<?php foreach (get_id() as $id) {?>
<form method="post" id="regForm" >
<div class="container_select" id="selected">
<select id="my_select" name="selecteur">
  <option><?php echo $id->status?></option>
  <option value="Online"><label  class="status_button_on" type="status" name="status" id="button_status">Online</label></option>
  <option value="Offline"><label class="status_button_off" type="status" name="status" id="button_status">Offline</label></option>
  <option value="Go_away"><label class="status_button_afk" type="status" name="status" id="button_status">Go away</label></option>
</select>
</div>

    <div class="field has-label" style="float:right;width:80%">
        <label class="field-label" for="name">Votre nom</label>
        <input class="field-input" type="text" name="name" id="name" value="<?php echo $id->name;?>"/>
    </div> 

    <div class="field has-label" style="float:right;width:80%">
        <label class="field-label" for="email">Votre adresse email</label>
        <input class="field-input" type="email" name="email" id="email" value="<?php echo $id->email?>"/>
    </div>

    <div class="field has-label" style="float:right;width:80%">
        <label class="field-label" for="password">Votre mot de passe</label>
        <input class="field-input" type="password" name="password" id="password" value="<?php echo $id->password?>"/>
    </div>
    
      
    <div class="field has-label" style="float:right;width:100%">
        <label class="field-label" for="id">Votre id</label>
        <input class="field-input" type="int" name="id" id="id" value="<?php echo $id->id?>"/>

    </div> <?php }?>
    <p class="error"><?php echo (isset($error_email)) ? $error_email : ''; ?></p>
    <button type="submit" name="submit">Modifier vos informations</button>


</form>  
<?php
if (isset($_POST['submit']))
{
  if(!empty($_POST['name']) || !empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['id']))
  {

    try
    {
     $new_email = $_SESSION['tchat'];
     global $db;
     $pdo = $db;
     $status=$_POST['selecteur'];
     $name=$_POST['name']; 
    $email=$_POST['email']; 
     $password=$_POST['password'];
     $req=$db->query("UPDATE users SET name ='$name', email ='$email', password ='$password', status='$status' WHERE email='$new_email'");
      
    }
    catch(Exception $e)
    {
      die('Erreur : '.$e->getMessage());
    }
    
    echo '<br/><br/> Informations modifiées avec succès <br/>';
  }
  else
  {
    echo 'Vous devez remplir tous les champs !';
  }}
  ?>