<?php
require_once("connect.php");
session_start();
$username=$_SESSION['username'];
if (empty($_SESSION['username'])) {
    header("Location: index.php");
}
$stmt = $con->prepare("DELETE FROM korisnik WHERE username=:username");
$stmt->bindParam(":username", $username);
$stmt->execute();
session_destroy();
header('Location: index.php');

?>