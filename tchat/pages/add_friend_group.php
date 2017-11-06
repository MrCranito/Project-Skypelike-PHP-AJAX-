<h2 class="header header-form">Add friend to Group</h2>
<form action="" method="POST" id="regForm" >
    <div class="field has-label">
        <label id="Channel" class="field-label" for="name">Nom de votre amis à ajouté</label>
        <input class="field-input" type="text" name="name" id="name" value=""/>
    </div>
    <button type="submit" name="submit">Inviter</button>	


   <?php 
    if (isset($_POST['submit'])){
        $name_friend = $_POST['name'];
        $name_channel = $_GET['channel'];

        if(user_exists($name_friend)==1){
        	add_friend($name_channel,$name_friend);
        	header("Location:index.php?page=channel");
        	if(checkfriend($name_friend)==1){
            echo "Amis déjà ajouté";}
        }
        
        else{
        	echo "Aucun amis de correspond à ce nom";
        
    }
}
?>