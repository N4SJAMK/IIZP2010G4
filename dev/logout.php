<?php
@session_start();
$_SESSION['logged'] = false;
header("Location: login.php");
//tied� jos t�nne tulee viel� jtn
?>