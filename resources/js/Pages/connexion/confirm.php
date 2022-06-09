<?php
require_once '../includes/bdd.php';


$user_id = $_GET['id'];
$token = $_GET['token'];

$request_sql = "SELECT * FROM clients WHERE id = $user_id";

$result = mysqli_query($conn, $request_sql);
$row = mysqli_fetch_row($result);
session_start();

if ($token == $row[10]) {
    $remove_token = "UPDATE clients SET confirm_token = NULL WHERE id = $user_id";
    mysqli_query($conn, $remove_token);
    $_SESSION['flash']['green'] = "Votre compte a bien été validé !";
    header('Location: login.php');
} else {
    $_SESSION['flash']['red'] = "Le lien de confirmation est invalide ou a expiré !";
    header('Location: login.php');
}
mysqli_close($conn);
?>