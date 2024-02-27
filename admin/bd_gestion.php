<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUTAF | Gestion Album</title>
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
        <h1 class="h1">Gestion des albums</h1>
        <p>
            <a href="bd_new_form.php">Ajouter une BD</a>
        </p>
        <table class="table table-bordered table-striped" id="catalogue">
            <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Série</th>
                <th>ISBN</th>
                <th>Editeur</th>
                <th>Auteur</th>
                <th>Prix</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            </thead>

            <?php
            require('../config.inc.php');

            $bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);

            $requete = 'SELECT * FROM album 
    INNER JOIN editeur ON album.editeur_id_ = editeur.editeur_id
    INNER JOIN auteur ON album.auteur_id_ = auteur.auteur_id';
            $exe = $bdd->query($requete);

            $nbreponses = $exe->rowCount();

            for($i=0; $i<$nbreponses; $i++)
            {
                $ligne = $exe->fetch();

                echo '<tr>
                <th>'.$ligne['album_id'].'</th>
                <th>'.$ligne['album_titre'].'</th>
                <th>'.$ligne['album_serie'].'</th>
                <th>'.$ligne['album_isbn'].'</th>
                <th>'.$ligne['editeur_nom'].'</th>
                <th>'.$ligne['auteur_prenom'].' '.$ligne['auteur_nom'].'</th>
                <th>'.$ligne['album_prix'].' €</th>
                <th><a href="bd_update_form.php?num_bd='.$ligne['album_id'].'">Modifier</a></th>
                <th><a href="bd_delete.php?num_bd='.$ligne['album_id'].'">Supprimer</a></th>
            </tr>';
            }
            ?>
        </table>

    </div>

</section>
<!-- End Categories of The Month -->

<script>
    $('#catalogue').DataTable( {
        "language": {
            "lengthMenu": "Afficher _MENU_ résultats par page",
            "zeroRecords": "Désolé, nous avons rien trouvé :(",
            "info": "Affichage de la page _PAGE_ sur _PAGES_",
            "infoEmpty": "Aucun résultat disponible",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    } );
</script>
</body>
</html>