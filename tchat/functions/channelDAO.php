<?php


function getChannel($idUser)
{
	global $bd;

	$stmt = $bd->prepare('SELECT * 
							FROM conversation
							WHERE private = 0
							AND id NOT IN (
							  SELECT id_channel 
							  FROM conversation, abonnements
							  WHERE conversation.id = abonnements.id_channel
							  AND abonnements.id_user = ?)');
	$stmt->execute(array($idUser)) || die(var_dump($stmt->errorInfo()));
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$stmt->closeCursor();

	return $result;
}

function getChannelByName($nameChannel)
{
    global $bd;

    $stmt = $bd->prepare('SELECT id
							FROM conversation
							WHERE nameChannel = ?');
    $stmt->execute(array($nameChannel)) || die(var_dump($stmt->errorInfo()));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $result;
}


function getMyChannel($idUser)
{
	global $bd;		
	$stmt = $bd->prepare('SELECT * 
							FROM abonnements, conversation
							WHERE abonnements.id_channel = conversation.id
							AND abonnements.id_user = ?');
	$stmt->execute(array($idUser)) || die(var_dump($stmt->errorInfo()));
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$stmt->closeCursor();

	return $result;
}

function addChannel($id_channel, $id_user)
{
    global $bdd;
    $stmt = $bdd->prepare('INSERT INTO abonnements (id_channel, id_user) VALUES (?, ?)');
    $stmt->execute(array($id_channel, $id_user));
    $stmt->closeCursor();
}


function createChannel($nameChannel, $private, $details, $idCreateur)
{
    global $bdd;
    $stmt = $bdd->prepare('INSERT INTO conversation (nameChannel, private, details, id_createur) VALUES (?, ?, ?, ?)');
    $stmt->execute(array($nameChannel, $private, $details, $idCreateur));
    $stmt->closeCursor();
}


/*function getNbMessage($idChannel)
{
	global $bdd;

	$stmt = $bdd->prepare('SELECT COUNT(*) 
							FROM conversation
							WHERE  id = ?');
	$stmt->execute(array($idChannel)) || die(var_dump($stmt->errorInfo()));
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$stmt->closeCursor();

	return $result;
}*/