<?php
require_once "../classes/db.php";

    if(isset($_POST["submit"])){
        $connectionDB = new database("localhost", "cms", "root", "");
        $connectionDB->connect();
        if($_POST["password"] === $_POST["confirmPassword"]){
            $result = $connectionDB->updatePassword($_POST["email"], $_POST["password"]);
            if($result == TRUE){
                echo "Je wachtwoord is succesvol aangepast! :D";
            }
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wachtwoord vergeten</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/b1a8b29774.js" crossorigin="anonymous"></script> 
</head>
<body class="login__body">
    <form action="" class="formForgotPsw" method="post">
        <header class="formForgotPsw__header">
            <h2 class="formForgotPsw__h2">Wachtwoord vergeten</h2>
        </header>
        <section class="formForgotPsw__section">
            <div class="formForgotPsw__div">
                <figure class="formForgotPsw__figure">
                    <i class="fa-solid fa-envelope icon"></i>
                </figure>
                <input type="text" name="email" class="formForgotPsw__input formForgotPsw__input--email" placeholder="Email"></div>
            <div class="formForgotPsw__div">
                <figure class="formForgotPsw__figure">
                    <i class="fa-solid fa-lock icon"></i>
                </figure>
                <input type="password" name="password" class="formForgotPsw__input formForgotPsw__input--password" placeholder="Wachtwoord">
            </div>
            <div class="formForgotPsw__div">
                <figure class="formForgotPsw__figure">
                    <i class="fa-solid fa-lock icon"></i>
                </figure>
                <input type="password" name="confirmPassword" class="formForgotPsw__input formForgotPsw__input--password" placeholder="Bevestig wachtwoord">
            </div>
            <input type="submit" value="submit" name="submit" class="formForgotPsw__input formForgotPsw__input--submit">
        </section>
        <footer class="formForgotPsw__footer">
            <a href="login.php" class="formForgotPsw__a formForgotPsw__a--login">Login</a>
            <a href="aanmelden.php" class="formForgotPsw__a formForgotPsw__a--aanmelden">Aanmelden</a>
        </footer>
    </form>

</body>
</html>