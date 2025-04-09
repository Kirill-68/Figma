<?php session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $token = "";
        $t = "";
        $bd = new PDO('mysql:host=localhost;dbname=module;charest=utf8', 'root',  null);
        // function get_token(){
        //         $bd = new PDO('mysql:host=localhost;dbname=module;charest=utf8', 'root',  null);
        //         $token = openssl_random_pseudo_bytes(20, $cstrong);
        //         $id = "";
        //         $tokenn = bin2hex($token);
        //         return $tokenn;
        // }
        // echo get_token();
        // $t = get_token();
        // $_SESSION['token'] = $t;
        $select = "SELECT id, token, `password`, `login`, `type` FROM users WHERE token='$_SESSION[token]'";
        echo json_encode($select);
        $result = $bd->query($select);
                if($row = $result->fetch()){
                        echo $row['login'];
                        if($login === $row['login']){
                        if(!empty($password)){
                                if(isset($_SESSION['token']) && $password === $row['password']){
                                header("Location: admin.php");
                        }
                }
        }
}
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="passwor1">
    <div class="llp">
    <div class="l">
        <form action="login.php" method="POST" class="method">
        <label for="login" class="loginn">Введите логин
            <span class="error">Необходимо заполнить</span>
</label>
</div>
<div class="ll">
<label for="password" class="passwordd">Введите пароль
            <span class="error">Необходимо заполнить</span>
            </label>
</div>
<div class="p">
        <input type="text" name="password" class="password">
</div>
<div class="log">
        <input type="text" name="login" placeholder="ivan@mail.ru" class="login">
</div>
</div>
<input type="submit" value="Войти" class="submit">
</form>
</div>
</body>
</html>