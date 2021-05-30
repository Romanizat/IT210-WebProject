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

    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $scensko_ime = $_POST["scensko_ime"];
    $zemlja = $_POST["zemlja"];
    $slika = $_POST["slika"];
    

    if(isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['scensko_ime']) && isset($_POST['zemlja']) && isset($_POST['slika'])){
        $stmt = $con->prepare("INSERT INTO izvodjac (ime, prezime, scensko_ime, zemlja, slika) VALUES (:ime, :prezime, :scensko_ime, :zemlja, :slika)");
        $stmt->bindParam(":ime", $ime);
        $stmt->bindParam(":prezime", $prezime);
        $stmt->bindParam(":scensko_ime", $scensko_ime);
        $stmt->bindParam(":zemlja", $zemlja);        
        $stmt->bindParam(":slika", $slika);
        $stmt->execute();
    }
    header('Location: umetnici.php');
?>

