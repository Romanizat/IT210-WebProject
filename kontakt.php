<?php
  require_once("connect.php");
  session_start();
  /*if(!isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $ime = $_SESSION['ime'];
	}*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="resources/favicon.png" />
    <link rel="stylesheet" href="style.css">
    <title>Kontakt</title>
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
            <li><a class="active" href="kontakt.php">Kontakt</a></li>
        </ul>
    </nav>

    <video autoplay muted loop id="bgVideo" src="resources/bokeh.mp4" type="video/mp4">
    </video>

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
      $string=$string."<hr>
          <a class=\"sideA\" href=\"adminPanel.php\">Admin Panel</a>";
    }
    $string=$string."   
      <hr>
      <a class=\"sideA\" href=\"logout.php\">Logout</a>
    </div>";
    echo $string;
  }

  ?>

    <hr>
    
    <div class="container">
        <div class="block">
            <form action="sendMsg.php" onsubmit="return proveraContact()" method="POST">
                <label for="ime">Unesite Vaše ime</label> <br><br>
                <input type="text" name="ime" placeholder="Unesite ime"> <br><br>
                <label for="prezime">Unesite Vaše prezime</label> <br><br>
                <input type="text" name="prezime" placeholder="Unesite prezime"><br><br>
                <label for="msgSubject">Unesite naslov poruke</label><br><br>
                <input type="text" name="msgSubject" placeholder="Unesite naslov"><br><br>
                <label for="msg">Unesite poruku</label><br><br>
                <textarea style="resize: none;" name="msg" cols="50" rows="5" placeholder="Napišite poruku..."></textarea><br><br>
                <label for="fon">Unesite broj telefona</label><br><br>
                <input type="text" name="fon" placeholder="npr. +381651234567"><br><br>
                <label for="pozicija">Kome biste uputili poruku?</label><br><br>
                <select name="opcije">
                    <option value="null">Izaberite</option>
                    <option value="Marketing">Marketing</option>
                    <option value="HR">Ljudski resursi</option>
                    <option value="Predsednik">Predsednik kompanije</option>
                </select>
                <br><br>
                <input type="submit" value="Pošalji">
            </form>
            
        </div>

        <div class="block">
            <p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7443211.221913146!2d-80.46171889900646!3d24.368064137673187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d69a3bb2480f3d%3A0x133eb4836ac779e5!2sThe%20Bahamas!5e0!3m2!1sen!2srs!4v1622142047201!5m2!1sen!2srs" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </p>

            <p><u>Kontaktirajte nas putem elektronske pošte</u></p>
            <p>contact@umami.com</p>

            <p><u>Kontaktirajte nas putem telefona</u></p>
            <p>(+381) 65 7654321</p>

        </div>

    </div>


    <footer>
        <p class="fade-in3">© Marko Josifović 4494</p>
    </footer>
    <script src=script.js></script>
</body>

</html>