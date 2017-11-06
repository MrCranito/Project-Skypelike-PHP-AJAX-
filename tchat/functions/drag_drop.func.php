<?php
function upload($file){
	$file=$_FILES['file']['tpm_name'];
	$directory ='images/';
	move_uploaded_file($file, "$directory/$file");
}




?>