<?php
require_once '../includes/config.php';
?>

<!DOCTYPE html>
<?php

  session_start();

  if (isset($_POST['forminscription'])) {

    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $confirmemail = htmlspecialchars($_POST['confirmemail']);
    $password = hash( 'sha256', $_POST['password']);
    $confirmpassword = hash( 'sha256', $_POST['confirmpassword']);

    if (!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['confirmemail']) AND !empty($_POST['password']) AND !empty($_POST['confirmpassword'])) {

      $pseudolength = strlen($username);

      if ($pseudolength <= 255) {

        if ($email == $confirmemail) {

          if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            $reqemail = $db->prepare("SELECT * FROM users WHERE email = ?");
            $reqemail->execute(array($email));
            $emailexist = $reqemail->rowCount();

            $reqpseudo = $db->prepare("SELECT * FROM users WHERE username = ?");
            $reqpseudo->execute(array($username));
            $pseudoexist = $reqpseudo->rowCount();

            if($pseudoexist == 0){

              if($emailexist == 0){

                if ($password == $confirmpassword) {

                    $insertmembre = $db->prepare("INSERT INTO users(username, email, password) VALUES(?, ?, ?)");
                    $insertmembre->execute(array($username, $email, $password));

                    $_SESSION['valid'] = "Votre compte a été créé";
                    header("Location: login.php");

                }

                else {
                  $error = "Les mots de passes sont diffèrents !";
                }

              }else {
              $error = "Cet email est déjà utilisé ! ";
              }

            }else {
              $error = "Le pseudo est déjà utilisé !";
            }

          }

          else {
            $error = "L'email est invalide !";
          }

        }

        else {
          $error = "Les emails ne correspondent pas !";
        }

      }

      else {

        $error = "Votre pseudo est trop long!";

      }

    }

    else {

      $error = "Veuillez-remplir le formulaire entièrement!";

    }

  }

 ?>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://bootswatch.com/4/cosmo/bootstrap.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <title>Inscription</title>
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

      <div class="container_form_inscription">

          <h2>Inscription</h2>

          <hr>

          <div id="formulaire">

              <form class="" action="" method="post">
                    <label for="username"> Pseudo :
                        <input class="form-control" type="text" name="username" value="<?php if(isset($username)) {echo $username;} ?>" id="username" placeholder="Votre pseudo">
                    </label>

                    <label for="email"> Email :
                        <input class="form-control" type="email" name="email" value="<?php if(isset($email)) {echo $email;} ?>" id="email" placeholder="Votre email">
                    </label>

                    <label for="confirmemail"> Confirmer email :
                        <input class="form-control" type="email" name="confirmemail" value="<?php if(isset($confirmemail)) {echo $confirmemail;} ?>" id="confirmemail" placeholder="Confirmez votre email">
                    </label>

                    <label for="password"> Mot de passe :
                        <input class="form-control" type="password" name="password" value="" id="password" placeholder="Mot de passe">
                    </label>

                    <label for="confirmpassword"> Confirmer mot de passe :
                        <input class="form-control" type="password" name="confirmpassword" value="" id="confirmpassword" placeholder="Confirmez votre mot de passe">
                    </label>

                    <br><br>
                    <input type="submit" class="btn btn-secondary my-2 my-sm-0" name="forminscription" value="Je m'inscris">
                    <br><br>
                    <span>Vous avez déjà un compte? <a href="login.php">Connectez-vous</a> !</span>

                </form>
          </div>

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

      input{
          width:50%;
      }

      #container_form_inscription{
          width:80%;
          margin-left:10%;
      }
  </style>


  </body>
</html>
