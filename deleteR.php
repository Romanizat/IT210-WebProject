<?php
require_once("connect.php");
session_start();
$username=$_SESSION['username'];
$idRes=$_POST['rezervacija'];
if (empty($_SESSION['username'])) {
    header("Location: index.php");
}
$stmt = $con->prepare("DELETE FROM rezervacije WHERE idR=:idR");
$stmt->bindParam(":idR", $idRes);
$stmt->execute();

header('Location: profil.php');

?>