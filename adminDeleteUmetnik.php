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

    <hr>

    <h2 style="text-align: center;">Admin Panel | Obriši umetnika</h2>

    <img src="resources/pexels-pixabay-159220.jpg" alt="admin_background" class="bgImg">


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

<?php
    $sql = "SELECT * FROM izvodjac";
    $query = $con->query($sql);
    $results = array();
    while ($results[] = $query->fetch());
    array_pop($results);
?>

<div class="centriranjeBody2">
    <form method="POST" action="deleteUmetnik.php" style="text-align: center;">
        <h2>Obriši umetnika:</h2>
        <select name="idUmetnik" required>
            <option value="">Izaberite umetnika za brisanje</option>
            <?php foreach ($results as $option) { ?>
                <option value="<?php echo $option["id"]; ?>">
                    <?php echo $option["scensko_ime"]; ?>
                </option>
            <?php } ?>
        </select>
        <button type="submit" name="creatEvent">Obriši</button>
        <br><br>
    </form>

</div>
    <footer>
        <p class="fade-in3">© Marko Josifović 4494</p>
    </footer>
    <button onclick="topFunction()" id="myBtn">Povratak na vrh</button>
    <script src=script.js></script>
</body>

</html>