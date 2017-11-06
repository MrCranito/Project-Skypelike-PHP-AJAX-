<?
include 'functions/main-functions.php'
$my_file_pic = $_POST['pic']; 
$requete_img= "INSERT INTO lienimage FROM users WHERE email = $_SESSION['tchat']";
$requete_execute = exec($requete_img);
 ?>