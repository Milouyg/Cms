<?php
require_once "functions/db.php";

    if(isset($_POST["submit"])){
        $validationName = validation("naam");
        $validationEmail = validation("email");
        $validationPassword = validation("wachtwoord");
        $connectionDB = new database("localhost", "cms", "root", "");
        $connectionDB->connect();
        $connectionDB->register($validationName, $validationEmail, $validationPassword, "user");
    };

    function validation($formValue){
        if(isset($_POST[$formValue]) && !empty($_POST[$formValue])){
            if($formValue == "naam"){
                $filter = trim($_POST[$formValue]);
                $filter = htmlspecialchars($filter);
                $filter = stripslashes($filter);
            }
            if($formValue == "email"){
                $filter = filter_var($_POST[$formValue], FILTER_VALIDATE_EMAIL);
            }
            if($formValue == "wachtwoord" && strlen($_POST[$formValue]) > 3){
                $filter = $_POST[$formValue];
            }
            return $filter;
        }
        else{
            echo "Error";
        }
    };
    
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aanmelden</title>
    <link rel="stylesheet" href="css/aanmelden.css">
    <script src="https://kit.fontawesome.com/b1a8b29774.js" crossorigin="anonymous"></script> 
</head>
<body>
    <form class="form" method="post">
        <header class="form__header">
            <h2 class="form__h2">aanmelden</h2>
        </header>
        <section class="form__section">
            <div class="form__div">
                <figure class="form__figure">
                    <i class="fa-solid fa-user icon"></i>
                </figure>
                <input type="text" name="naam" class="form__input form__input--naam" placeholder="Naam">
            </div>
            <div class="form__div">
                <figure class="form__figure">
                    <i class="fa-solid fa-envelope icon"></i>
                </figure>
                <input type="text" name="email" class="form__input form__input--email" placeholder="Voorbeeld@email.com"></div>
            <div class="form__div">
                <figure class="form__figure">
                    <i class="fa-solid fa-lock icon"></i>
                </figure>
                <input type="password" name="wachtwoord" class="form__input form__input--password" placeholder="Wachtwoord" title="Moet minimaal 4 letters bevatten">
            </div>
            <input type="submit" value="submit" name="submit" class="form__input form__input--submit">
        </section>
        <footer class="form__footer">
            <p class="form__p">Al een account?</p>
            <a href="inlog.php" class="form__a form__a">Log nu in</a>
        </footer>
    </form>
</body>
</html>