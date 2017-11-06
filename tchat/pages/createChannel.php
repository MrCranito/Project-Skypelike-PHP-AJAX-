<h2 class="header header-form"> Créé une nouvelle channel</h2>
<form action="" method="POST" id="regForm" >
    <div class="field has-label">
        <label id="Channel" class="field-label" for="name">Nom de votre futur Channel</label>
        <input class="field-input" type="text" name="name" id="name" value=""/>
    </div>
    <div class="field has-label">
        <label id="Channel" class="field-label" for="details">Details de la channel</label>
        <input class="field-input" type="text" name="details" id="details" value=""/>
    </div>
    <p class="error"><?php echo (isset($error_email)) ? $error_email : ''; ?></p>
    <button type="submit" name="submit">Créez votre channel</button>


</form>
<?php 
    if (isset($_POST['submit'])){
        $name_channel = $_POST['name'];
        $details_channel = $_POST['details'];
        if(checkChannel($name_channel)==1){
            echo "Nom du channel déjà pris !";}
        else{
        createChannel($name_channel,$details_channel);
        header("Location:index.php?page=channel");
    }
}
?>