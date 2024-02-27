<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUTAF | Ajouter un éditeur</title>
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

        <h1 class="h1">Confirmation éditeur ajouté</h1>

        <?php
        //se connecter à la base de données
        require('../config.inc.php');
        $bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);

        //ecrire une requete pour l'insertion
        $requete = 'INSERT INTO editeur (editeur_nom, editeur_pays, editeur_tel) VALUES ("'.$_POST['nom'].'", "'.$_POST['pays'].'", "'.$_POST['telephone'].'")';

        //echo $requete;
        //executer la requete
        $exe = $bdd->query($requete);

        //confirmer l'enregistrement à l'utilisateur

        ?>
        L'éditeur <?php echo $_POST['nom']; ?> a été ajouté avec succès.
        <p><a href="editeur_gestion.php">Revenir à la liste des éditeurs</a></p>
    </div>

</section>
<!-- End Categories of The Month -->

</body>
</html>