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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="resources/favicon.png" />
    <title>Admin</title>
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

    <h2 style="text-align: center;">Admin Panel</h2>

    <!-- <video autoplay muted loop id="bgVideo" src="resources/Pexels Videos 2759484.mp4" type="video/mp4">
    </video> -->




    <?php
    if (empty($_SESSION['username'])) {
        echo ("
      <div id=\"mySidenavA\" class=\"sidenav\">
          <a class=\"sideA\" href=\"loginPg.php\">Login</a>
          <hr>
          <a class=\"sideA\" href=\"registerPg.php\" >Register</a>
      </div>
      ");
    }
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
    <!-- nalozi -->
    <h2 id="korisnici">Korisnici</p>
        <?php
        $sql = "SELECT * FROM korisnik";
        $result = $con->query($sql);
        echo "<hr>";
        echo "<table border=1>
            <th>Username</th>
            <th>Ime</th>
            <th>Prezime</th>";

        while ($row = $result->fetch()) {
            echo "<tr><td>" . "$row[username]" . "</td>
            <td>". $row["ime"] . "</td>
            <td>". $row["prezime"] . "</td>
            <td>". "<a class=\"sideA\" href=\"deleteAccAdmin.php?id=" . $row["id"] . "\">Obriši</a>" . "</td></tr>";
        }
        echo "</table>";
        ?>

        <!-- rezervacije -->
        <h2 id="rezervacije">Rezervacije</h2>
        <?php
        $sql = "SELECT * FROM rezervacije r, event e, korisnik k WHERE (e.id=r.idEvent AND k.id=r.idKorisnik)";
        $result = $con->query($sql);
        echo "<hr>";
        echo "<table border=1>
        <th>Naziv</th>
        <th>Lokacija</th>
        <th>Br. Karata</th>
        <th>Username</th>";

        while ($row = $result->fetch()) {
        echo "<tr><td>" . "$row[naziv]" . "</td>
        <td>". $row["lokacija"] . "</td>
        <td>". $row["kolicina"] . "</td>
        <td>". $row["username"] . "</td>
        <td>". "<a class=\"sideA\" href=\"deleteResAdmin.php?id=" . $row["idR"] . "\">Obriši</a>" . "</td></tr>";
        }
        echo "</table>";
        ?>
        


        <!-- predlozi -->
        <h2 id="predlozi">Predlozi</h2>
        <?php
        $sql = "SELECT * FROM locationsuggest l, korisnik k WHERE k.id=l.idKorisnik;";
        $result = $con->query($sql);
        echo "<hr>";
        echo "<table border=1>
        <th>Mesto</th>
        <th>Zašto</th>
        <th>Username</th>";

        while ($row = $result->fetch()) {
        echo "<tr><td>" . "$row[mesto]" . "</td>
        <td>". $row["zasto"] . "</td>
        <td>". $row["username"] . "</td>
        <td>". "<a class=\"sideA\" href=\"deleteSugAdmin.php?id=" . $row["idL"] . "\">Obriši</a>" . "</td></tr>";
        }
        echo "</table>";
        ?>

</div>
    <footer>
        <p class="fade-in3">© Marko Josifović 4494</p>
    </footer>
    <script src=script.js></script>
</body>

</html>