<?php
require_once '../includes/config.php';
if(!isset($_SESSION)){
    session_start();
}
$articles = get_all_articles();
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
            <a class="navbar-brand" href="">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="">Articles</a>
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
            <h2 class="title">Dernières actus</h2>
            <div class="row">
                <?php foreach($articles as $article): ?>
                        <img src="<?= $article['image'] ?>">
                        <div id="content" class="col-md-8">
                        <?= '<a href="article.php?id=' . $article['id'] . '"><h3>'.$article['title'].'</h3></a>';?>
                        <p><?= get_description($article['content']); ?>
                        <h2><a href="article.php?id=<?= $article['id'] ?>"></a></h2>
                        <?= '<a href="article.php?id=' . $article['id'] . '">Lire cet article</a>';?>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>

    </body>
</html>





