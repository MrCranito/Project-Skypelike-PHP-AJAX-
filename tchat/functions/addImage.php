<?php
if (isset($_FILES['picture']['name'])){
	
	$image =$_FILES['picture']['name'];
	$r= array('lien'=>$image);
	global $db;
	$sql = "INSERT INTO lienimage(image) VALUES ($image)";
	$req=$db->prepare($sql);
	$req->execute($r);


}
 ?>