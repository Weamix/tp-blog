<!DOCTYPE html>
<html>
    <head lang="fr">
        <meta charset="utf-8">
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
                            <a class="nav-link" href="/progweb/new_article.php">Ajouter un article</a>
                        </li>
                        
                        
                    </ul>

                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Chercher</button>
                    </form>
                </div>
        </nav>

<?php

$bdd = new PDO('mysql:host=localhost;dbname=blog2;charset=utf8', 'root', ''); // connexion à la BDD


// fonction qui récupère tous les articles
function getArticles(){

    $req = $bdd->prepare('SELECT id,title FROM articles ORDER by id DESC');
    $req->execute();
    $data=$req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
?>

<?php
$articles = getArticles();
foreach($articles as $article): ?>
<h2><?= $article->title ?></h2>
<a href="article.php?id="<?= $article->id ?>">Lire la suite</a>
<?php endforeach; ?>



    
    </body>
</html>




    

