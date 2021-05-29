<?php
require_once("connect.php");
session_start();
$username=$_SESSION['username'];
if (empty($_SESSION['username'])) {
    header("Location: index.php");
}
?>