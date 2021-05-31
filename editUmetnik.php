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

    $id = $_POST["idIzvodjac"];
    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $scensko_ime = $_POST["scensko_ime"];
    $zemlja = $_POST["zemlja"];
    $slika = $_POST["slika"];

    if(isset($_POST['idIzvodjac']) &&
    isset($_POST['ime']) &&
    isset($_POST['prezime']) &&
    isset($_POST['scensko_ime']) &&
    isset($_POST['zemlja']) &&
    isset($_POST['slika'])){
        $stmt = $con->prepare("UPDATE izvodjac SET 
        ime=:ime,
        prezime=:prezime,
        scensko_ime=:scensko_ime,
        zemlja=:zemlja,
        slika=:slika 
        WHERE id=:id");
        $stmt->bindParam(":ime", $ime);
        $stmt->bindParam(":prezime", $prezime);
        $stmt->bindParam(":scensko_ime", $scensko_ime);
        $stmt->bindParam(":zemlja", $zemlja);   
        $stmt->bindParam(":slika", $slika);
        $stmt->bindParam(":id", $id);   
        $stmt->execute();
        header('Location: umetnici.php');
    } else{
        header('Location: adminEditUmetnik.php');
    }
    
?>


