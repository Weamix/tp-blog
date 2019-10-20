<?php
if(!isset($_SESSION)){
    session_start();
}
require_once '../includes/config.php';
error_reporting(0);

$pt = new PostTable();
if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['category'])) {
    $post = new Post();
    $post->setTitle($_POST['title']);
    $post->setContent($_POST['content']);
    $post->setCategory($_POST['category']);
    $post->setImage($_POST['image']);
    $post->setID($_GET['id']);
    $pt->update($post);

}
$posts = $pt->all();
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
            <a class="navbar-brand" href="../public/index.php">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor03">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../public/index.php">Articles</a>
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

        <?php

        if (isset($_GET['id'])) {
            $getid=intval($_GET['id']);
        } else {
            header( 'location:index.php');
        }

        /*if (isset($_POST['title'])&&isset($_POST['category.php'])&&isset($_POST['content'])){
            $title=$_POST['title'];
            $category.php=$_POST['category.php'];
            $content=$_POST['content'];
            $image=$_POST['image'];

            update_article($title, $category.php, $content, $image, $getid);
        }*/

        $data = get_article($getid);

        ?>

        <form action="" method="POST">
            <div id="formulaire">
                <h1>
                    Modifier votre article</h1>
                <div class="form-group">
                    <label for="title">Titre de votre article</label>
                    <input class="form-control" type="text" id="40" name="title"; value="<?php echo $data['title']; ?>">
                    <?php

                    ?>
                </div>
                <br>
                <label>Catégorie de votre article</label>
                <input  class="form-control" id="category" name="category" value="<?php echo $data['category'];?>"></textarea>
                <br>
                <label>Url de l'illustration</label>
                <input  class="form-control"id="image" name="image" value="<?php echo $data['image'];?>"></textarea>
                <br>
                <label>Contenu de votre article</label>
                <textarea  class="form-control" id="content" name="content" rows="10"><?php echo $data['content'];?></textarea>
                <br>
                <input type="submit" class="btn btn-primary" id="submit" name="submit">
            </div>
        </form>
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


