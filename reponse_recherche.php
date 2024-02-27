<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUTAF | Réponse recherche</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.23/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.23/datatables.min.js"></script>
    <link rel="stylesheet" href="css/templatemo.css">
    <link rel="stylesheet" href="css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="css/fontawesome.min.css">
</head>
<body>
<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
            DUTAF
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listing.php">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form_recherche.php">Recherche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/admin.html">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Close Header -->

<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row pt-3">
        <h1 class="h1">Résultats de votre recherche</h1>
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
            </tr>
            </thead>

            <?php
            require('config.inc.php');

            $bdd = new PDO('mysql:host='.BDD_SERVER.';dbname='.BDD_DATABASE.';charset=utf8', BDD_LOGIN, BDD_PASSWORD);

            $texte = $_GET['texte'];

            $requete = 'SELECT * FROM album 
            INNER JOIN editeur ON album.editeur_id_ = editeur.editeur_id
            INNER JOIN auteur ON album.auteur_id_ = auteur.auteur_id 
            WHERE auteur.auteur_nom LIKE "%'.$texte.'%" OR auteur.auteur_prenom LIKE "%'.$texte.'%"';
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
            </tr>';
            }
            ?>
        </table>

    </div>
</section>
<!-- End Categories of The Month -->



<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">DUTAF Shop</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        9 Rue Québec, 10430 Rosières-prés-Troyes
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="tel:03 25 00 00 00">03 25 00 00 00</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="mailto:contact@dutaf.fr">contact@dutaf.fr</a>
                    </li>
                </ul>
            </div>



            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Plus d'infos</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Accueil</a></li>
                    <li><a class="text-decoration-none" href="#">A propos</a></li>
                    <li><a class="text-decoration-none" href="#">Catalogue</a></li>
                    <li><a class="text-decoration-none" href="#">FAQs</a></li>
                    <li><a class="text-decoration-none" href="#">Contact</a></li>
                </ul>
            </div>

        </div>


    </div>

    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-left text-light">
                        Copyright &copy; 2021 DUTAF shop, la librairie
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

<!-- Start Script -->
<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/templatemo.js"></script>
<script src="assets/js/custom.js"></script>
<!-- End Script -->

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