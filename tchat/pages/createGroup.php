<h2 class="header header-form"> Créé un nouveau Group</h2>
<form action="" method="POST" id="regForm" >
    <div class="field has-label">
        <label id="Channel" class="field-label" for="name">Nom de votre futur Groupe</label>
        <input class="field-input" type="text" name="name" id="name" value=""/>
    </div>
    <div class="field has-label">
        <label id="Channel" class="field-label" for="details">Details du Groupe</label>
        <input class="field-input" type="text" name="details" id="details" value=""/>
    </div>
    <button type="submit" name="submit">Créez votre Groupe</button>


</form>
<?php 
    if (isset($_POST['submit'])){
        $name_channel = $_POST['name'];
        $details_channel = $_POST['details'];
        if(checkGroup($name_channel)==1){
            echo "Nom du Groupe déjà pris !";}
        else{
        createGroup($name_channel,$details_channel);
        header("Location:index.php?page=channel");
    }
}
?>