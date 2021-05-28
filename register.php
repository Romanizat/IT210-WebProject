<?php
    require_once("connect.php");
    session_start();

    if(!empty($_POST['ime']) && !empty($_POST['prezime']) && !empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];

        $stmt = $con->prepare("INSERT INTO korisnik (username, password, ime, prezime, admin) VALUES (:username, :password, :ime, :prezime, 0)");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":ime", $ime);
        $stmt->bindParam(":prezime", $prezime);

        $stmt->execute();
        header('Location: loginPg.php');
    }else {
        header('Location: registerPg.php');
    }
?>