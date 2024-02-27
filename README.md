# Dutaf

Projet pour un cours de base de données en première année de DUT MMI (avril 2021).
C'est un site fictif de vente en ligne de livres, utilisant une base de données mysql et Bootstrap comme framework CSS.
Il contient une partie back-office.

## Mise en place de la base de données

- Importer la base de données `dutaf.sql` dans vote phpMyAdmin
- Modifier les identifiants de la base de données dans `config.inc.php`

## Identifiants pour la partie back-office

- Dans `admin/.htaccess`, remplacer `url_path` par votre chemin d'accès (par exemple, si vous avez mis votre projet dutaf dans le dossier `/www/public_html/` alors ça devrait ressembler à ça : `AuthUserFile /www/public_html/dutaf/admin/htpasswd`)
- Dans le fichier `admin/htpasswd`, ajouter votre identifiant et votre mot de passe hashé en MD5 que vous avez généré sur ce site : http://aspirine.org/htpasswd.html Il doit ressembler à peu près à ça : `votreIdentifiant:$apr1$lUxSTSpa$zqjAlCl5CRiCGaiOCPlJD0`