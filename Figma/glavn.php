<?php
include_once 'bd.php';
session_start();
$login = $_POST['login'];
$token=$_SESSION['token'];
    $select = $bd->prepare("SELECT `login`, `password`, `token` FROM users WHERE token='$token', `login`='$login'");
    $loggin = [
        'login' => $login,
    ];
$password = $_POST['password'];
$password2 = $_POST['password2'];
echo "2314567";
$proverka_l = $loggin['login'];
if($login === $proverka_l){

}
?>