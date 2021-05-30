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
    <title>Umami | Profil izmena</title>
</head>
<body>
    <audio id="myAudio" loop>
        <source src="resources/Hot Since 82 - Mr. Drive.mp3" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>
    <video autoplay muted loop id="bgVideo" src="resources/Pexels Videos 2759484.mp4" type="video/mp4">
    </video>
    <nav>
    <h1 onclick="playAudio()" ondblclick="pauseAudio()">Umami 🌴</h1>
    <ul class="nav-links">
      <li><a href="index.php">Početna</a></li>
      <li><a href="events.php">Events</a></li>
      <li><a href="umetnici.php">Umetnici</a></li>
      <li><a href="kontakt.php">Kontakt</a></li>
    </ul>
  </nav>

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

    
<?php
    $stmt = $con->prepare("SELECT * FROM korisnik WHERE username='".$username."'");
    $stmt->execute();    
    $row = $stmt->fetch();  
?>


  
        <div class="centriranje">
            <form method="POST" action="updateA.php" style="text-align: center;">
                <h2>Izmena podataka</h2>
                <input style="visibility: hidden;" type="number" name="id" readonly value="<?php echo $row["id"]; ?>">
                <br> <br>
                <input type="text" name="username" value="<?php echo $row["username"]; ?>" placeholder="Username" required>
                <br> <br>
                <input type="password" name="password" placeholder="Password" value="<?php echo $row["password"]; ?>" required>
                <br> <br>
                <input type="text" name="ime" placeholder="Ime" value="<?php echo $row["ime"]; ?>" required>
                <br> <br>
                <input type="text" name="prezime" placeholder="Prezime" value="<?php echo $row["prezime"]; ?>" required>
                <br> <br>
                <button type="submit" name="register">Izmeni</button>
                <br> <br>
            </form>
        </div>




    <footer>
        <p class="fade-in3">© Marko Josifović 4494</p>
    </footer>
    <script src=script.js></script>
</body>

</html>