<?php
	class my_usr_name{
	include_once('C:\wamp64\www\Tchat\tchat\pages\register.php');
	function get_user_name($name){
		global $db
		$e -> array('my_user' => $user_name);
		$sql = 'SELECT name FROM users WHERE  name =:my_user';
		return $sql
	}}