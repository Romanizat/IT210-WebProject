<?php
require_once("connect.php");
session_start();
$username=$_SESSION['username'];
if (empty($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="resources/favicon.png" />
    <title>Umami | Profil</title>
</head>

<body>
    <audio id="myAudio" loop>
        <source src="resources/Hot Since 82 - Mr. Drive.mp3" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>
    <nav>
        <h1 onclick="playAudio()" ondblclick="pauseAudio()">Umami 🌴</h1>
        <ul class="nav-links">
            <li><a href="index.php">Početna</a></li>
            <li><a href="events.php">Events</a></li>
            <li><a href="umetnici.php">Umetnici</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
        </ul>
    </nav>

    <video autoplay muted loop id="bgVideo" src="resources/Pexels Videos 2759484.mp4" type="video/mp4">
    </video>

    <?php
    if (!empty($_SESSION['username'])) {
        $ime = $_SESSION['ime'];
        $string = "
      <div id=\"mySidenavB\" class=\"sidenav\">
          <p>$ime</p>
          <hr>
          <a class=\"sideA\" href=\"rezervacijaPg.php\"><img src=\"resources/12-120181_png-file-ticket-icon-svg.png\" class=\"svg\" alt=\"tickets\"></a>
          <hr>
          <a class=\"sideA\" href=\"profil.php\"><img src=\"resources/person-icon-1682.png\" class=\"svg\" alt=\"person\"></a>
          <hr>
          <a class=\"sideA\" href=\"location.php\"><img src=\"resources/Simpleicons_Places_map-marker-1.svg\" class=\"svg\" alt=\"person\"></a>";

        $admin = $_SESSION['admin'];
        if ($admin == 1) {
            $string = $string . "<hr>
          <a class=\"sideA\" href=\"adminPanel.php\">Admin Panel</a>";
        }
        $string = $string . "   
      <hr>
      <a class=\"sideA\" href=\"logout.php\">Logout</a>
    </div>";
        echo $string;
    }
    ?>

    
    <div class="centriranje">
        <!-- lični podaci -->
        <h2 id="podaci">Lični podaci</p>
        <?php
        $sql = "SELECT * FROM korisnik WHERE username='".$username."'";
        $result = $con->query($sql);
        echo "<hr>";
        $row = $result->fetch();
        $idKorisnik = $row["id"];
            echo "<div>
                    <div class='grid-item'>
                    <h2 class='li-head'>" . $row["username"] ."</h2>
                    <p class='li-sub'>" . $row["ime"] ." ". $row["prezime"] ."</p>
                    </div>
                </div>";
        ?>
        <a href="updateAcc.php" class="sideA" style="text-align: center; font-size: 20px; color: black; text-shadow: white 0px 0px 10px;">IZMENI PODATKE</a> 
        <a href="deleteAcc.php" class="sideA" style="text-align: center; font-size: 20px; color: black; text-shadow: white 0px 0px 10px;">OBRIŠI NALOG</a> 
    <!-- <a href="deleteAcc.php" class="sideA" style="text-align: center; font-size: 10px;">OBRIŠI</a> -->
    
    <!-- rezervacije -->
        <h2 id="rezervacije">Rezervacije</h2>
        <?php
        $sql = "SELECT * FROM rezervacije r, event e WHERE r.idKorisnik='".$idKorisnik."' AND e.id=r.idEvent";
        $result = $con->query($sql);
        echo "<hr>";
        while ($row = $result->fetch()) {
            echo "<div>
                    <div class='grid-item'>
                    <p class='li-sub'>" . $row["naziv"] .", ". $row["lokacija"] ."</p>
                    <p class='li-sub'> x" . $row["kolicina"]  ."</p>
                    </div>
                </div>";
        }
        ?>
    <a href="updateRes.php" class="sideA" style="font-weight: bold; text-align: center; font-size: 20px; color: black; text-shadow: white 0px 0px 10px;">IZMENI REZERVACIJU</a> 
    <a href="deleteRes.php" class="sideA" style="font-weight: bold; text-align: center; font-size: 20px; color: black; text-shadow: white 0px 0px 10px;">OBRIŠI REZERVACIJU</a> 

        
    <!-- predlozi -->
    <h2 id="predlozi">Predlozi</h2>
        <?php
        $sql = "SELECT * FROM locationsuggest l WHERE idKorisnik='".$idKorisnik."'";
        $result = $con->query($sql);
        echo "<hr>";
        while ($row = $result->fetch()) {
            echo "<div>
                    <div class='grid-item'>
                    <p class='li-sub'>\"" . $row["mesto"] ."\"</p>
                    <p class='li-sub'>\"" . $row["zasto"]  ."\"</p>
                    </div>
                </div>";
        }
        ?>
    <a href="updateSug.php" class="sideA" style="font-weight: bold; text-align: center; font-size: 20px; color: black; text-shadow: white 0px 0px 10px;">IZMENI PREDLOG</a> 
    <a href="deleteSug.php" class="sideA" style="font-weight: bold; text-align: center; font-size: 20px; color: black; text-shadow: white 0px 0px 10px;">OBRIŠI PREDLOG</a> 

    </div>


    <footer>
        <p class="fade-in3">© Marko Josifović 4494</p>
    </footer>
    <script src=script.js></script>
</body>

</html>