<?php
    require_once "../classes/db.php";

    session_start();
    $connectionDB = new database("localhost", "cms", "root", "root");
    if(isset($_POST["submit"])){
        $connectionDB->connect();
        $login = new Login($connectionDB->instance);
        $userData = $login->login($_POST["email"], $_POST["password"]);
        if($userData != FALSE){
            $_SESSION["name"] = $userData["name"];
            $_SESSION["role"] = $userData["role"];
            $_SESSION["logged"] = TRUE;
            header('Location: cms.php');
            exit;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/b1a8b29774.js" crossorigin="anonymous"></script> 
</head>
<body class="login__body">
    <form action="" class="form" method="post">
        <header class="form__header">
            <h2 class="form__h2">Inlog form</h2>
        </header>
        <ul>
        <?php 
        foreach ($connectionDB->errors as $error){
            echo "<li> $error </li>";
        }
        ?>
        </ul>
        <section class="form__section">
            <div class="form__div">
                <figure class="form__figure">
                    <i class="fa-solid fa-envelope icon"></i>
                </figure>
                <input type="text" name="email" class="form__input form__input--email" placeholder="Email"></div>
            <div class="form__div">
                <figure class="form__figure">
                    <i class="fa-solid fa-lock icon"></i>
                </figure>
                <input type="password" name="password" class="form__input form__input--password" placeholder="Wachtwoord">
            </div>
            <a href="wwVergeten.php" class="form__a form__a--password">Wachtwoord vergeten?</a>
            <input type="submit" value="submit" name="submit" class="form__input form__input--submit">
        </section>
        <footer class="form__footer">
            <p class="form__p">Nog geen lid?</p>
            <a href="aanmelden.php" class="form__a form__a--newLid">Meld je nu aan</a>
        </footer>
    </form>

</body>
</html>