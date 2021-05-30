<?php
require_once("connect.php");
session_start();
$admin = $_SESSION['admin'];
if (empty($_SESSION['username'])) {
    header('Location: index.php');
}
if ($admin != 1) {
    header('Location: index.php');
}
$id = $_GET["id"];
?>


<?php  
    $stmt = $con->prepare("DELETE FROM kontakt WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    header('Location: adminPanel.php#poruke');
?>