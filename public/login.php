<?php
require_once '../includes/config.php';
if(!isset($_SESSION)){
    session_start();
}
$articles = get_all_articles();
?>

<!DOCTYPE html>
<?php

  if(isset($_POST['formconnexion'])) {

     $emailconnect = htmlspecialchars($_POST['emailconnect']);
     $passwordconnect = sha1($_POST['passwordconnect']);

     if(!empty( $emailconnect) AND !empty($passwordconnect)) {

        $requser = $db->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $requser->execute(array( $emailconnect, $passwordconnect));
        $userexist = $requser->rowCount();

        if($userexist == 1) {

           $userinfo = $requser->fetch();
           $_SESSION['id'] = $userinfo['id'];
           $_SESSION['username'] = $userinfo['pseudo'];
           $_SESSION['mail'] = $userinfo['mail'];
           /*header("Location: profil.php?id=".$_SESSION['id']);*/
            header("Location: index.php");
        }
        else {
           $error = "L'adresse email et le mot de passe ne correspondent pas !";
        }
     }
     else {
        $error = "Tous les champs doivent être complétés !";
     }
  }

?>

<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="../css/home.css"
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

    <div class="container_form_connexion">

    <h2>Connexion</h2>

    <hr>

    <form class="" action="" method="post">

      <label for="emailconnect"> Email : test@test.com & mot de passe : 123 </label><br>
      <label for="emailconnect"> Email : </label> <input type="email" name="emailconnect" value="" id="emailconnect" placeholder="Votre email">
      <label for="passwordconnect"> Mot de passe :</label> <input type="password" name="passwordconnect" value="" id="passwordconnect" placeholder="Votre mot de passe">
      <br>
      <br><input type="submit" class="btn btn-secondary my-2 my-sm-0" name="formconnexion" value="Je me connecte"><br><br>

      <span>Vous avez déjà un compte? <a href="register.php">Inscription</a></span><br>
      <span>Mot de passe oublié? <a href="forgottenpassword.php">Rénitialisez votre mot de passe</a></span>

    </form>

    <?php
      if (isset($error) OR isset($_SESSION['error'])) {
        echo '<span class="errorMessage">'.$error.$_SESSION['error'].'</span>';
        $_SESSION["error"] = null;
      }

      if (isset($_SESSION['valid'])) {
        echo '<span class="accountCreatedMessage">'.$_SESSION['valid'].'</span>';
        $_SESSION['valid'] = null;
      }
    ?>

     </div>

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
