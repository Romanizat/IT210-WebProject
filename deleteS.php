<?php
require_once("connect.php");
session_start();
$username=$_SESSION['username'];
$idPredloga=$_POST['predlog'];
if (empty($_SESSION['username'])) {
    header("Location: index.php");
}
$stmt = $con->prepare("DELETE FROM locationsuggest WHERE id=:id");
$stmt->bindParam(":id", $idPredloga);
$stmt->execute();

header('Location: profil.php');

?>