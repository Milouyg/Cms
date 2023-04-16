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
    $connectionDB->uploadPHP($validationTitle, $validationTaal, $validationCatergorie, $validationDatum, $validationBeschrijving);
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

<<<<<<< HEAD
=======

$destination = 'assets/' . basename($_FILES['image']['name']);
$file = $_FILES['image']['tmp_name'];
$err = $_FILES['image']['error'];
$size = filesize('assets/' . basename($_FILES['image']['name'])) / 1000000;

function fileExists($destination) {
return file_exists($destination);
}

if (!fileExists($destination)) {
if ($err == 0 && move_uploaded_file($file, $destination))
echo "Bestand succesvol geupload en verplaatst naar {$destination} <br>";
echo "grootte bestand:  " . $size . "MB";
} 
else if($size > 3) {
    echo "Error: dit bestand is te groot";
}
else {
    echo "Error: dit bestand bestaat al.";
}


>>>>>>> 7c07144cd2906a158768d35877502c531ce15db0
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
        <form action="cms.php" class="cms" method="post" enctype="multipart/form-data">
            <h2>Upload and move Image</h2>
            <input class="cms__submit" type="file" name="image">
            <input class="cms__submit" type="submit" value="Upload">
        </form>
    </section>

    <?php 
        ?>
            <article class="dashboard">
        <section class="dashboard__container">
            <h2 class="dashboard__h2">Dashboard</h2>
        </section>
        <ul class="dashboard__list">
            <li class="dashboard__listItem">
                <article class="dashboard__header">
                    <h3 class="dashboard__h3">Title</h3>
                    <label for="" class="dashboard__label">Taal</label>
                    <label for="" class="dashboard__label">Categorie</label>
                </article>
                <p class="dashboard__datum">Datum</p>
                <p class="dashboard__text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Reprehenderit enim repudiandae perferendis fugiat, obcaecati eaque voluptatibus sed,
                    distinctio soluta laudantium fugit voluptatum ratione. Odit modi exercitationem qui illum
                    sunt quas!</p>
            </li>
            <li class="dashboard__listItem">
                <article class="dashboard__header">
                    <h3 class="dashboard__h3">Title</h3>
                    <label for="" class="dashboard__label">Taal</label>
                    <label for="" class="dashboard__label">Categorie</label>
                </article>
                <p class="dashboard__datum">Datum</p>
                <p class="dashboard__text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Reprehenderit enim repudiandae perferendis fugiat, obcaecati eaque voluptatibus sed,
                    distinctio soluta laudantium fugit voluptatum ratione. Odit modi exercitationem qui illum
                    sunt quas!</p>
            </li>
        </ul>
    </article>
    

</body>
</html>