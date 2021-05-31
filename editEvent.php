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
    $naziv = $_POST["naziv"];
    $lokacija = $_POST["lokacija"];
    $slikaEvent = $_POST["slikaEvent"];
    $idIzvodjac = $_POST["idIzvodjac"];

    if(isset($_POST['idEvent']) && isset($_POST['naziv']) && isset($_POST['lokacija']) && isset($_POST['slikaEvent']) && isset($_POST['idIzvodjac'])){
        $stmt = $con->prepare("UPDATE event SET naziv=:naziv, lokacija=:lokacija, slikaEvent=:slikaEvent, idIzvodjac=:idIzvodjac WHERE id=:id");
        $stmt->bindParam(":naziv", $naziv);
        $stmt->bindParam(":lokacija", $lokacija);
        $stmt->bindParam(":slikaEvent", $slikaEvent);
        $stmt->bindParam(":idIzvodjac", $idIzvodjac);   
        $stmt->bindParam(":id", $id);   
        $stmt->execute();
        header('Location: events.php');
    } else{
        header('Location: adminEditEvent.php');
    }
    
?>

