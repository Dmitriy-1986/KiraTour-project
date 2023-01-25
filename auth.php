<?php
session_start();

if(isset($_SESSION['admin'])){
	header("Location: admin.php");
	exit;
}

$login = 'admin';
$password = 'd9a3df0f4820bf93a77b1f1e0540fd85';
//echo md5('kiratour-admin');

if(isset($_POST['submit'])){
	if($login == $_POST['login'] AND $password == md5($_POST['password'])) {
		$_SESSION['admin'] = $login;
		header("Location: admin.php");
		exit;
	} else {
        echo '<div style=" width: 100%;"><p style="border: 1px solid red; color: #842029; background-color: #f8d7da;
        border-color: #f5c2c7; padding: 10px; text-align: center; "><b>Логін або пароль невірні!</b></p></div>';
    }
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/auth.css">
</head>
<body>

    <div class="auth">
        <div class="form-auth">
            <div class="title">
                <img class="title-img" src="./assets/img/LOGIN.png" alt="Login">
            </div>
            <form id="form_auth" method="POST">
                    <input type="text" name="login" class="login-input" placeholder="Username">
                    <input type="password" name="password" class="pasword-input" placeholder="Password">
                    <input type="submit" name="submit" value="login" class="btn-submit">
            </form>
        </div>
    </div>

</body>
</html>