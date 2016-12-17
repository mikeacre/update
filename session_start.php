<?
session_start();
if (isset($_GET['id'])) {$_SESSION['facebook_id'] = $_GET['id'];}
if (isset($_GET['token'])) {$_SESSION['facebook_token'] = $_GET['token'];}
?>