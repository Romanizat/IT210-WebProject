<?php
    require_once("connect.php");
    session_start();
    $naziv = $_POST["naziv"];
    $kolicina = $_POST["kolicina"];
    $username = $_SESSION["username"];
    if(!isset($_SESSION['username'])){
		header("Location: index.php");
	}
?>
    
<?php

    $stmt1 = ("SELECT id from korisnik WHERE username='".$username."'");
        $result = $con->query($stmt1);    
        $row = $result->fetch();
        $idKorisnik = $row["id"];
?>

<?php
    $stmt2 = ("SELECT id from event WHERE naziv='".$naziv."'");
    $result2 = $con->query($stmt2);    
    $row2 = $result2->fetch();
    $idEvent = $row2["id"];
    echo "Event u odovjenu". $idEvent;
?>
          
<?php
    if(($naziv !="") && ($kolicina>0)){
        try{
        echo "Korisnik ".$idKorisnik;
        echo "Event ".$idEvent;
        echo "Kolicina ".$kolicina;
        
        $stmt = $con->prepare("INSERT INTO rezervacije (kolicina, idKorisnik, idEvent) 
                                VALUES (:kolicina, :idKorisnik, :idEvent)");
        $stmt->bindParam(":kolicina", $kolicina);
        $stmt->bindParam(":idKorisnik", $idKorisnik);
        $stmt->bindParam(":idEvent", $idEvent);
        $stmt->execute();
        header('Location: profil.php');
        }catch(PDOException $ex){
           echo "Handle-ovanje kada isti korisnik pokusa da rezervise za isti event";
           header('Location: rezervacijaPg.php');
        }

    }else {
        header('Location: rezervacijaPg.php');
    }
?>