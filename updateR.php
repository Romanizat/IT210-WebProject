<?php
    require_once("connect.php");
    session_start();
    $idRes = $_POST["rezervacija"];
    $kolicina = $_POST["kolicina"];
    $username = $_SESSION["username"];
    if(!isset($_SESSION['username'])){
		header("Location: index.php");
	}
?>
          
<?php
    if(($idRes!="") && ($kolicina>0)){
        $stmt = $con->prepare("UPDATE rezervacije SET kolicina=:kolicina WHERE idR=:id");
        $stmt->bindParam(':kolicina', $kolicina);
        $stmt->bindParam(':id',$idRes);
        $stmt->execute();
        header('Location: profil.php');
    }else {
        header('Location: updateRes.php');
    }
?>