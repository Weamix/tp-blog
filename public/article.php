<?php
require_once '../includes/config.php';
if(!isset($_SESSION)){
    session_start();
}

//$posts = delete_article();

$pt = new PostTable();

$getid = intval($_GET['id']);

if (isset($_POST['to_delete'])) {
    $id = $_POST['id'];
    $pt->delete($id);
    header('location:index.php');
}

$post = get_article($getid);
$posts = $pt->all();

?>

<!DOCTYPE html>
<html>

    <head lang="fr">
        <meta charset="utf-8">
        <title>Home</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
        <link rel="stylesheet" href="../css/article.css">
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

        <div id="article">
            <h1><a><?php echo htmlspecialchars($post['title']); ?></a></h1>
            <h3><em>publié le <?php echo $post['created_at']; ?></em> dans la catégorie <?php echo $post['category']; ?></h3>
            <img src="<?= $post['image'] ?>">
            <p><?php echo nl2br(htmlspecialchars($post[ 'content'])); ?></p>



                <?php
                if (empty($_SESSION['id']))
                {
                    ?>
                    <?php
                }
                else
                {
                    ?>
                    <form method="post" action="article.php">
                        <input type="hidden" name="id" id="id" value="<?= $post['id']; ?>">
                        <button class="btn btn-primary btn-lg" type="submit" name="to_delete" id="to_delete">Supprimer</button>
                        <a class="btn btn-primary btn-lg" href="edit_article.php?id=<?= $post['id']?>">Editer</a>
                    </form>
                    <?php
                }
                ?>
            <br>
        </div>
    </body>
</html>