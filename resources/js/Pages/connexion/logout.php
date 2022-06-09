<?php
require_once '../includes/functions.php';
user_connecte();

session_start();
unset($_SESSION['auth']);
header('Location: ../index.html');
?>