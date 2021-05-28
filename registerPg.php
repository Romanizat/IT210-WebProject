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
            <form method="POST" action="register.php" style="text-align: center;">
                <h2>Registracija</h2>
                <input type="text" name="username" placeholder="Username" required>
                <br> <br>
                <input type="password" name="password" placeholder="Password" required>
                <br> <br>
                <input type="text" name="ime" placeholder="Ime" required>
                <br> <br>
                <input type="text" name="prezime" placeholder="Prezime" required>
                <br> <br>
                <button type="submit" name="register">Register</button>
                <br> <br> <br>
                <a href="loginPg.php" class="sideA" style="text-align: center; font-size: 30px;" >Imate nalog? Prijavite se!</a>
            </form>
        </div>
    <?php }?>

    <!-- Vidljivo samo ako logged in -->
    <?php if(!empty($_SESSION['username'])){?>
        <div class="centriranje">
            <h3 style="font-size: 25px; text-align: center;">Hello <?php echo $_SESSION['username'];?> <br> Već ste ulogovani!</h3>
            <a href="index.php" class="sideA" style="text-align: center; font-size: 30px;" >Povratak na početak</a>
        </div>
    <?php }?>


    <footer>
        <p class="fade-in3">© Marko Josifović 4494</p>
    </footer>
    <script src=script.js></script>
</body>

</html>