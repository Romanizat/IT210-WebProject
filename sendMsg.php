<?php
	require_once("connect.php");
	
	$ime = $_POST['ime'];
	$prezime = $_POST['prezime'];
	$naslov = $_POST['msgSubject'];
    $poruka = $_POST['msg'];
    $telefon = $_POST['fon'];
    $kome = $_POST['opcije'];
	
	$sql = $con->prepare("INSERT INTO kontakt 
    (ime, prezime, naslov, poruka, telefon, kome) VALUES 
    (:ime, :prezime, :naslov, :poruka, :telefon, :kome)");
	$sql->bindParam(":ime", $ime);
	$sql->bindParam(":prezime", $prezime);
	$sql->bindParam(":naslov", $naslov);
    $sql->bindParam(":poruka", $poruka);
    $sql->bindParam(":telefon", $telefon);
    $sql->bindParam(":kome", $kome);

	$data = $sql->execute();
	
	if($data){
		header("Location: kontakt.html");
	}
	else{
		echo "Greška prilikom slanja!";
	}
?>