<?php
if (session_id() == '')
	session_start();

include '../functions/channelDAO.php';

$reponse = getMyChannel($_SESSION['user']['id']);

$channels = getChannel($_SESSION['user']['id']);

if (isset($_GET['addChannel'])) {
    addChannel($_GET['id'], $_SESSION['user']['id']);
    header('Location: index.php?page=channel&addChannelSuccess=1');
}

if (isset($_GET['createChannel'])) {
    $channel = getChannelByName($_POST['nameChannel']);
    if (empty($channel))
    {
        createChannel($_POST['nameChannel'], $_POST['private'], $_POST['detailsChannel'], $_SESSION['user']['id']);
        $idChannel = getChannelByName($_POST['nameChannel']);
        addChannel($idChannel['id'], $_SESSION['user']['id']);
        header('Location: index.php?page=channel&createChannelSuccess=1');
    }
    else
    {
        header('Location: index.php?page=channel&createChannel.php?invalid=1');
    }

}

/*$nbMessage = getNbMessage();*/