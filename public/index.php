<?php

require_once '../includes/config.php';
$articles = get_all_articles();

?>


<!DOCTYPE html>
<html>
<head lang="fr">
    <meta charset="utf8">
    <title>Home</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="">Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../public/new_article.php">Ajouter un article</a>
            </li>


        </ul>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Chercher</button>
        </form>
    </div>
</nav>

<div class="news">
    <h1>L'Actu:</h1>
    <div class="row">
        <?php foreach($articles as $article): ?>
            <div class="col-md-4">
                <h3><?= $article['title']; ?></h3>
                <br>
                <h2><a href="article.php?id=<?= $article['id'] ?>"></a></h2>
                <img src="<?= $article['image'] ?>" width="350px" height="200px">
                <br>
                <?php
                $text = '<a href="article.php?id=' . $article['id'] . '">Lire cet article</a>';
                echo $text;
                ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    body{
        text-align:center;
    }
</style>

</body>
</html>





