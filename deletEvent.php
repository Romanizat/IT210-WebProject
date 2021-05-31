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

    $id = $_POST["idEvent"];

    if(isset($_POST['idEvent'])){
        $stmt = $con->prepare("DELETE FROM event WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();  
        header('Location: events.php');
    } else{
        header('Location: adminDeleteEvent.php');
    }
    
?>

