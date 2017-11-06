
function change_status(){
	var status = document.getElementByID("button_status");

	<?php if ($_SESSION['status']==1){
		status.style.background.color='green';}
	    $_SESSION['status']=2;

		if($_SESSIOn['status']==2){
		status.style.background.color ='orange';
		$_SESSION['status']=3;
		}
		else {

		status.style.background.color = 'red';
		$_SESSION['status']=1;
		}?>
};
