<?php
    require_once("connect.php");
    session_start();
    $id = $_POST["id"];
    $usernameNew = $_POST["username"];
    $password = $_POST["password"];
    $password = md5($password);
    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    if(!isset($_SESSION['username'])){
		header("Location: index.php");
	}
?>
          
<?php
    if(($id!=0) && ($usernameNew !="") && ($password !="") && ($ime !="") && ($prezime !="")){
        $stmt = $con->prepare("UPDATE korisnik SET 
        username=:username, password=:password, ime=:ime, prezime=:prezime
        WHERE id=:id");
        $stmt->bindParam(':username', $usernameNew);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':ime', $ime);
        $stmt->bindParam(':prezime', $prezime);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        session_destroy();
        header('Location: login.php');
    }else {
        header('Location: updateAcc.php');
    }
?>