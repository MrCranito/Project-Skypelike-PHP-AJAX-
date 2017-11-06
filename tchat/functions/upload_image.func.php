<?php header('Content-Type:appplication/json');

$uploaded = array()

if(!empty($_FILES['file']['name'][0])) {
	foreach ($_FILES['file']['name'] as $postion => $name) {
		if(move_uploaded_file($_FILES['file']['tmp_name'][$position], 'images/' .$name)){
			$uploaded[]=$array('name'=> $name,
								'file'=>'images/'.$name);
		}
}
}

echo json_encode($uploaded);