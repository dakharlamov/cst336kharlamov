<?php

session_start();
$_SESSION['loggedin'] = 'n';

header('Location: ../index.php');

?>