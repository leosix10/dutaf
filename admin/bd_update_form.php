<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUTAF | Modifier une BD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.23/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.23/datatables.min.js"></script>

    <link rel="stylesheet" href="../css/templatemo.css">
    <link rel="stylesheet" href="../css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
</head>
<body>
<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="../index.html">
            DUTAF (admin)
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../listing.php">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../form_recherche.php">Recherche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.html">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Close Header -->
<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">

        <h1 class="h1">Modifier l'album</h1>

        <?php
        require('../config.inc.php');
        $bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);

        //récupérer les infos de la BD à modifier
        $numbd = $_GET['num_bd'];
        $req = 'SELECT * FROM album WHERE album_id='.$numbd;
        $resultat = $bdd->query($req);
        $maBd = $resultat->fetch();
        ?>
        <form method="POST" action="bd_update_valide.php">
            <input type="hidden" name="num_bd" value="<?php echo $numbd; ?>" />
            <div>
                Titre : <input type="text" name="titre" value="<?php echo $maBd['album_titre']; ?>">
            </div>
            <div>
                Prix : <input type="text" name="prix" value="<?php echo $maBd['album_prix']; ?>">
            </div>
            <div>
                ISBN : <input type="text" name="isbn" value="<?php echo $maBd['album_isbn']; ?>">
            </div>
            <div>
                Série : <input type="text" name="serie" value="<?php echo $maBd['album_serie']; ?>">
            </div>
            <div>
                Editeur :
                <select name="editeur">
                    <?php

                    $req = 'SELECT * FROM editeur';
                    $resultat = $bdd->query($req);

                    while($un_editeur = $resultat->fetch() )
                    {
                        if ($un_editeur['editeur_id'] == $maBd['editeur_id_']) {
                            echo '<option value="'.$un_editeur['editeur_id'].'" selected>'.$un_editeur['editeur_nom'].'</option>';
                        } else {
                            echo '<option value="'.$un_editeur['editeur_id'].'">'.$un_editeur['editeur_nom'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div>
                Auteur :
                <select name="auteur">
                    <?php

                    $req='SELECT * FROM auteur';
                    $resultat = $bdd->query($req);

                    while($un_auteur = $resultat->fetch() )
                    {
                        if ($un_auteur['auteur_id'] == $maBd['auteur_id_']) {
                            echo '<option value="'.$un_auteur['auteur_id'].'" selected>'.$un_auteur['auteur_prenom'].' '.$un_auteur['auteur_nom'].'</option>';
                        } else {
                            echo '<option value="'.$un_auteur['auteur_id'].'">'.$un_auteur['auteur_prenom'].' '.$un_auteur['auteur_nom'].'</option>';
                        }            }
                    ?>
                </select>
            </div>

            <div>
                <input type="submit" value="Enregistrer">
            </div>
        </form>
    </div>

</section>
<!-- End Categories of The Month -->



</body>
</html>