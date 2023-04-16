<?php
require_once "../classes/db.php";

    // When the submit button is pressed, the "if statement" is executed
    if(isset($_POST["submit"])){
        $validationName = validation("naam");
        $validationEmail = validation("email");
        $validationPassword = validation("wachtwoord");
        $connectionDB = new database("localhost", "cms", "root", "root");
        $connectionDB->connect();
        $register = new Register($connectionDB->instance);
        $register->register($validationName, $validationEmail, $validationPassword, 0);
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
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/b1a8b29774.js" crossorigin="anonymous"></script> 
</head>
<body class="login__body">
    <form class="form" method="post">
        <header class="formAanmelden__header">
            <h2 class="formAanmelden__h2">aanmelden</h2>
        </header>
        <section class="formAanmelden__section">
            <div class="formAanmelden__div">
                <figure class="formAanmelden__figure">
                    <i class="fa-solid fa-user icon"></i>
                </figure>
                <input type="text" name="naam" class="formAanmelden__input formAanmelden__input--naam" placeholder="Naam">
            </div>
            <div class="formAanmelden__div">
                <figure class="formAanmelden__figure">
                    <i class="fa-solid fa-envelope icon"></i>
                </figure>
                <input type="text" name="email" class="formAanmelden__input formAanmelden__input--email" placeholder="Voorbeeld@email.com"></div>
            <div class="formAanmelden__div">
                <figure class="formAanmelden__figure">
                    <i class="fa-solid fa-lock icon"></i>
                </figure>
                <input type="password" name="wachtwoord" class="formAanmelden__input formAanmelden__input--password" placeholder="Wachtwoord" title="Moet minimaal 4 letters bevatten">
            </div>
            <input type="submit" value="submit" name="submit" class="formAanmelden__input formAanmelden__input--submit">
        </section>
        <footer class="formAanmelden__footer">
            <p class="formAanmelden__p">Al een account?</p>
            <a href="login.php" class="formAanmelden__a">Log nu in</a>
        </footer>
    </form>
</body>
</html>