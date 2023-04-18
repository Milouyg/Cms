<?php
require_once "../classes/db.php";

if(isset($_POST["submit"])){
    $validationTitle = validationCMS("title");
    $validationTaal = validationCMS("taal");
    $validationCatergorie = validationCMS("categorie");
    $validationDatum = validationCMS("datum");
    $validationBeschrijving = validationCMS("beschrijving");
    $connectionDB = new database("localhost", "cms", "root", "root");
    $connectionDB->connect();
    $cms = new CMS($connectionDB->instance);
    $cms->uploadPHP($validationTitle, $validationTaal, $validationCatergorie, $validationDatum, $validationBeschrijving);
};

function validationCMS($formValue){
    if(isset($_POST[$formValue]) && !empty($_POST[$formValue])){
        $filter = trim($_POST[$formValue]);
        $filter = htmlspecialchars($filter);
        $filter = stripslashes($filter);
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
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/main.js" defer></script>
    <title>CMS</title>
</head>
<body>
    <nav class="navCms">
        <section class="navCms__container">
            <img src="img/logo.png" alt="" class="navCms__img">
        </section>
        <section class="navCms__title">
            <h2 class="navCms__h2">CMS</h2>
        </section>
        <section class="navCms__container"></section>
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
                <input type="submit" value="submit" class="cms__submit" name="submit">
            </section>
    </form>
</body>
</html>