<?php
    require_once("connect.php");
    session_start();
    $mesto = $_POST["mesto"];
    $zasto = $_POST["zasto"];
    $username = $_SESSION["username"];
    if(!isset($_SESSION['username'])){
		header("Location: index.php");
	}

    $stmt1 = ("SELECT id from korisnik WHERE username='".$username."'");
    $result = $con->query($stmt1);    
    $row = $result->fetch();
    $idKorisnik = $row["id"];

    if(($mesto !="") && ($zasto !="")){
        $stmt = $con->prepare("INSERT INTO locationsuggest (idKorisnik, mesto, zasto) 
                                VALUES (:idKorisnik, :mesto, :zasto)");
        $stmt->bindParam(":idKorisnik", $idKorisnik);
        $stmt->bindParam(":mesto", $mesto);
        $stmt->bindParam(":zasto", $zasto);
        $stmt->execute();
        header('Location: profil.php');

    }else {
        header('Location: location.php');
    }

?>