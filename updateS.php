<?php
    require_once("connect.php");
    session_start();
    $id = $_POST["predlog"];
    $mesto = $_POST["mesto"];
    $zasto = $_POST["zasto"];
    $username = $_SESSION["username"];
    if(!isset($_SESSION['username'])){
		header("Location: index.php");
	}
?>

<?php
    if(($id!=0) && ($mesto !="") && ($zasto !="")){
        $stmt = $con->prepare("UPDATE locationsuggest SET mesto=:mesto, zasto=:zasto WHERE idL=:id");
        $stmt->bindParam(':mesto', $mesto);
        $stmt->bindParam(':zasto',$zasto);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        header('Location: profil.php');
    }else {
        header('Location: updateSug.php');
    }
?>