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

    $id = $_POST["idUmetnik"];

    if(isset($_POST['idUmetnik'])){
        $stmt = $con->prepare("DELETE FROM izvodjac WHERE id=:id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();  
        header('Location: umetnici.php');
    } else{
        header('Location: adminDeleteUmetnik.php');
    }
    
?>

