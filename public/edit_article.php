<?php

require_once '../includes/config.php';

$articles = get_all_articles();

?>

<!DOCTYPE html>
<html>
<head lang="fr">
    <meta charset="utf-8">
    <title>Publier un article</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">


</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../public/">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../public/">Articles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../public/new_article.php">Ajouter un article</a>
            </li>


        </ul>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<?php $bdd=new PDO( 'mysql:host=localhost;dbname=blog2;charset=utf8', 'root', ''); // connexion à la BDD

if (isset($_GET['id'])) {
    $getid=intval($_GET['id']);
} else {
    //header( 'location:index.php');
}
$req=$bdd->prepare('SELECT * FROM articles WHERE id = ?');
$req->execute(array($getid));
$data = $req->fetch(); ?>

<form action="" method="POST">
    <div id="formulaire">
        <h1>Modifier votre article</h1>
        <div class="form-group">
            <label for="title">Titre de votre article</label>
            <input class="form-control" type="text" id="40" name="title"; value="<?php echo $article->title; ?>">
            <?php
            var_dump($articles);
            ?>
        </div>
        <br>
        <label>Catégorie de votre article</label>
        <input  class="form-control" id="category" name="category" value="<?php echo $data['category'];?>"></textarea>
        <br>
        <label>Url de l'illustration</label>
        <input  class="form-control"id="image" name="image"></textarea>
        <br>
        <label>Contenu de votre article</label>
        <textarea  class="form-control"id="content" name="content"rows="10"></textarea>
        <br>
        <input type="submit" class="btn btn-primary" id="submit" name="submit">
    </div>
</form>

<?php



?>


<style>
    body{
        text-align:center;
    }

    #formulaire{
        width:80%;
        margin-left:10%;
    }
</style>

</body>
</html>
