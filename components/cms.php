<?php
require_once "../classes/db.php";

if(isset($_POST["submit"])){
    $validationTitle = validationCMS("title");
    $validationTaal = validationCMS("taal");
    $validationCatergorie = validationCMS("categorie");
    $validationDatum = validationCMS("datum");
    $validationBeschrijving = validationCMS("beschrijving");
    $connectionDB = new database("localhost", "cms", "root", "");
    $connectionDB->connect();
    $connectionDB->uploadPHP($validationTitle, $validationTaal, $validationCatergorie, $validationDatum, $validationBeschrijving);
};

function validationCMS($formValue){
    if(isset($_POST[$formValue]) && !empty($_POST[$formValue])){
        if($formValue == "title"){
            $filter = trim($_POST[$formValue]);
            $filter = htmlspecialchars($filter);
            $filter = stripslashes($filter);
        }
        if($formValue == "taal"){
            $filter = trim($_POST[$formValue]);
            $filter = htmlspecialchars($filter);
            $filter = stripslashes($filter);
        }
        if($formValue == "categorie"){
            $filter = trim($_POST[$formValue]);
            $filter = htmlspecialchars($filter);
            $filter = stripslashes($filter);
        }
        if($formValue == "datum"){
            $filter = trim($_POST[$formValue]);
            $filter = htmlspecialchars($filter);
            $filter = stripslashes($filter);
        }
        if($formValue == "beschrijving"){
            $filter = trim($_POST[$formValue]);
            $filter = htmlspecialchars($filter);
            $filter = stripslashes($filter);
        }
        return $filter;
    }
    else{
        echo "Error";
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js" defer></script>
    <title>CMS</title>
</head>
<body>
    <nav class="nav">
        <section class="nav__container">
            <img src="img/logo.png" alt="" class="nav__img">
        </section>
        <section class="nav__title">
            <h2 class="nav__h2">CMS</h2>
        </section>
        <section class="nav__container"></section>
    </nav>
    <section class="cms__section">
        <form method="POST" action="" class="cms">
            <section class="cms__container">
                <input type="text" class="cms__title" placeholder="Title" id="title" name="title">
                <input type="text" class="cms__taal" placeholder="Taal" id="taal" name="taal">
                <input type="text" class="cms__categorie" placeholder="Categorie" id="categorie" name="categorie">
            </section>
            <input type="date" class="cms__date" placeholder="Datum" id="datum" name="datum">
            <textarea name="beschrijving" id="beschrijving" maxlength="300" cols="30" rows="10" class="cms__beschrijving" placeholder="Beschrijving"></textarea>
            <div id="counter" class="cms__counter"></div>
            <section class="cms__container--1">
                <input type="submit" value="submit" class="cms__submit">
            </section>
        </form>
    </section>
    <article class="aanbevolen">
        <section class="aanbevolen__container">
            <h2 class="aanbevolen__h2">Dashboard</h2>
        </section>
        <ul class="aanbevolen__list">
            <li class="aanbevolen__listItem">
                <article class="aanbevolen__header">
                    <h3 class="aanbevolen__h3">Title</h3>
                    <label for="" class="aanbevolen__label">Taal</label>
                    <label for="" class="aanbevolen__label">Categorie</label>
                </article>
                <p class="aanbevolen__datum">Datum</p>
                <p class="aanbevolen__text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Reprehenderit enim repudiandae perferendis fugiat, obcaecati eaque voluptatibus sed,
                    distinctio soluta laudantium fugit voluptatum ratione. Odit modi exercitationem qui illum
                    sunt quas!</p>
            </li>
            <li class="aanbevolen__listItem">
                <article class="aanbevolen__header">
                    <h3 class="aanbevolen__h3">Title</h3>
                    <label for="" class="aanbevolen__label">Taal</label>
                    <label for="" class="aanbevolen__label">Categorie</label>
                </article>
                <p class="aanbevolen__datum">Datum</p>
                <p class="aanbevolen__text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Reprehenderit enim repudiandae perferendis fugiat, obcaecati eaque voluptatibus sed,
                    distinctio soluta laudantium fugit voluptatum ratione. Odit modi exercitationem qui illum
                    sunt quas!</p>
            </li>
        </ul>
    </article>
</body>
</html>