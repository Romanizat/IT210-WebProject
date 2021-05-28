<?php
require_once("connect.php");
session_start();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="resources/favicon.png" />
    <title>Umami | Login</title>
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
            <li><a href="">filler</a></li>
            <li><a href="">filler</a></li>
            <li><a href="">filler</a></li>
            <li><a href="">filler</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
            <li><a href="">filler</a></li>
        </ul>
    </nav>

    
    <?php if(empty($_SESSION['username'])){?>
        <div class="centriranje">
            <form method="POST" action="login.php" style="text-align: center;">
                <h2>Login</h2>
                <input type="text" name="username" placeholder="Username">
                <br> <br>
                <input type="password" name="password" placeholder="Password">
                <br> <br>
                <button type="submit" name="login">Login</button>
                <br> <br> <br>
                <a href="registerPg.php" class="sideA" style="text-align: center; font-size: 30px;" >Nemate nalog? Registrujte se!</a>
            </form>
        </div>
    <?php }?>

    <!-- Vidljivo samo ako logged in -->
    <?php if(!empty($_SESSION['username'])){?>
        <div class="centriranje">
            <h3 style="font-size: 25px;">Hello <?php echo $_SESSION['username'];?></h3>
            <form method="POST" action="logout.php">
                <input type="submit" value="Log Out" class="sideA" style="font-size: 20px;" name="logout">
            </form>
        </div>
    <?php }?>


    <footer>
        <p class="fade-in3">© Marko Josifović 4494</p>
    </footer>
    <script src=script.js></script>
</body>

</html>