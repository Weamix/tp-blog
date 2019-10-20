<?php
require_once '../includes/config.php';

if(!isset($_SESSION)){
    session_start();
}

// $articles = all();
$pt = new PostTable();
$posts = $pt->all();

$c = new CategoryTable();

if (isset($_POST['title'])) {
    $category = new Category();
    $category->setCat($_POST['title']);
    $c->create($category);
    header("Location: categories.php");
}
$categories = $c->all();
?>

    <!DOCTYPE html>
    <html>
    <head lang="fr">
        <meta charset="utf-8">
        <title>Home</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
        <link rel="stylesheet" href="../css/home.css">
    </head>

    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../public/index.php">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../public/index.php">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../public/categories.php">Catégories</a>
                </li>

                <?php
                if (empty($_SESSION['id']))
                {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../public/register.php">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../public/login.php">Connexion</a>
                    </li>
                    <?php
                }
                else
                {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../public/new_article.php">Ajouter un article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../public/deconnexion.php">Déconnexion</a>
                    </li>
                    <?php
                }
                ?>

            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Chercher</button>
            </form>
        </div>
    </nav>

    <div class="news">
        <h2 class="title">Catégories</h2>
        <div class="row">
            <?php foreach($categories as $c): ?>
                <a class="dropdown-item" href="index.php?cat=<?= $c['id'] ?>"><?= $c['title'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>

    <?php
    if (empty($_SESSION['id']))
    {
        ?>
        <?php
    }
    else
    {
        ?>
        <form action="" method="POST">
            <div id="formulaire">
                <h1>Ajouter une catégorie</h1>
                <div class="form-group">
                    <label for="title">Nom de votre catégorie</label>
                    <input class="form-control" type="text" id="title" name="title";>
                </div>
                <br>
                <input type="submit" class="btn btn-primary" id="submit" name="submit">
            </div>
        </form>
        <?php
    }
    ?>

    </body>
    </html>

<style>
    body{
        text-align:center;
    }

    #formulaire{
        width:80%;
        margin-left:10%;
    }
</style>