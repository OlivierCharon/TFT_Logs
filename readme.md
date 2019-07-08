# Readme before anything else!


## PHP

> Le fait de ne pas travailler en POO était assez frustrant mais nous a poussé à revoir nos fondamentaux. Nous aurons bien le temps de nous intéresser à l'objet lors des prochaines sessions de PHP d'un autre coté.

---

## Javascript

> J'eu recours à quelques fonctions javascript telles que "l'alert", la "confirm box" ou encore le retour à la page précédente. L'enjeu était de ne pas simplement renvoyer à la page des formulaires en cas d'erreur, mais de garder les données précédemment renseignées. En effet, au niveau UX, il n'y a rien de pire qu'un même formulaire à renseigner plusieurs fois.
J'ai opté pour une implémentation de mes scripts directement au milieu du php, à l'aide de balises <script> par facilité vu le temps que nous avions pour achever le projet. De plus, je n'utilise le javascript qu'occasionnellement.

---

## Bootswatch

> Version de bootstrap retravaillée. Le fichier bootstrap.css provient du site www.bootswatch.com et me permet d'avoir un thème couleur déjà paramétrer, sans avoir à perdre trop de temps sur le CSS. Il ne me restait ensuite qu'à organiser mon layout via des "col" et des "row".

---

## SQL

* >J'ai renseigné, dans le code, un accès avec "root" comme identifiant et "0000" comme mot de passe par question de facilité, comme demandé.
* >Ce projet m'a permis d'apprendre à stocker et manipuler des images directement en BDD, sous forme de données "blob" (Binary Large OBject). C'est pour celà que les requêtes encodent les données des images à sauvegarder en base 64.
* >Aussi, par question de sécurité, j'ai "ashé" les mots de passe en SHA256, le MD5 étant devenu assez facile à décrypter.
* >Enfin, j'ai souhaité instancier une fonction dans le fichier "/functions/functions.php" car celà m'évite de répéter le code d'ouverture de connexion à la DB. Surtout que je l'utilise de nombreuses fois.
* >Cependant, je pense que fermer les connexions de temps en temps ne ferait pas de mal à mon code.

---

## Fonctionnalités

> Sur ce site, il est possible de créer un compte pour poster des articles comprenants: titre, description, illustration, propriétaure de l'article, date et heure.
Seuls les utilisateurs propriétaires de l'article ou administrateurs ont les droits pour modifier ou supprimer un article.
Un compte admin de test a été créé dans la base de donnée: "admin", mdp: "admin".

---

## Configuration

* >PHP 7.0 (serveur LAMP, Apache 2.4.38)
* >Javascript 1.8.5
* >Bootswatch: Bootstrap 4.3.1
* >MySQL 5.7.26

