<?php 

// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur

if (isset($_FILES['picture_profil']) AND $_FILES['picture_profil']['error'] == 0)

{

        // Testons si le fichier n'est pas trop gros

        if ($_FILES['picture_profil']['size'] <= 1000000)

        {

                // Testons si l'extension est autorisée

                $infosfichier = pathinfo($_FILES['picture_profil']['name']);

                $extension_upload = $infosfichier['extension'];

                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

                if (in_array($extension_upload, $extensions_autorisees))

                {

                        // On peut valider le fichier et le stocker définitivement
                        
                        if(file_exists('images_utilisateurs/'.$_SESSION['tchat'])){
                                echo "un erreur est survenue";
                        }
                        else{
                                $my_user_file= mkdir('images_utilisateurs/'.$_SESSION['tchat']);

                        }
                        chmod('images_utilisateurs/'.$_SESSION['tchat'], 0777);
                        $my_user_save='images_utilisateurs/'.$_SESSION['tchat'];
                        move_uploaded_file($_FILES['picture_profil']['tmp_name'], 'images_utilisateurs/'.$_SESSION['tchat'].'/'.basename($_FILES['picture_profil']['name']));
                        rename('images_utilisateurs/'.$_SESSION['tchat'].'/'.basename($_FILES['picture_profil']['name']),'images_utilisateurs/'.$_SESSION['tchat'].'/'.$_SESSION['tchat'].'.'.'jpeg'); 
                        $my_link= 'images_utilisateurs/' .basename($_FILES['picture_profil']['name']);

                        function insert_link_dbb($my_link){
                        global $db;
                        $r = array(
                       'name'=>$_SESSION['tchat'],
                       'lien'=>$my_link
                                 );
                         $sql = "INSERT INTO lienimage(name,lien) VALUES(:name,:lien)";
                         $req = $db->prepare($sql);
                         $req->execute($r);
                 }

                        if(isset($_FILES['picture_profil'])){
                                insert_link_dbb($my_link);
                        }
                        echo "L'envoi a bien été effectué !";

                }

        }

}
		


?> 

<?php 
function change_status($my_status){
        $get_user=$_SESSION['tchat'];
        global $db;
        $req=$db->query("UPDATE users SET status='$my_status' WHERE email='$get_user'");
}