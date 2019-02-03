<?php
 if(!isset($_SESSION)){
	session_start();
 }

	if (!isset($_SESSION['lang']))
		$_SESSION['lang'] = "me";
	else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
		if ($_GET['lang'] == "en")
			$_SESSION['lang'] = "en";
		else if ($_GET['lang'] == "me")
			$_SESSION['lang'] = "me";
	}

	require_once "languages/". $stranica.$_SESSION['lang'] . ".php";
?>