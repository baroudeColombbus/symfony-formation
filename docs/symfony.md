

## SYMFONY


* Cest un FRAMEWORK PHP (cadriciel), une boîtte à outils logicielle. CRUD (Create / Read / Update / Delete )
-> SYMFONY va nous permettre de faciliter le développement d'applis en PHP.
    * logiciel libre créé par Fabien Potencier
    * Version 5.2 
    * Ensemble de composants ( components ) dont le coeur s'appelle le Kernel en anglais (noyau). On peut installer uniquement le Kernel mais sont fonctionnemenyt sera limité. Il faudra installer d'autres composants.

  ## LES COMPOSANTS

    - doctrine : gère la BDD / ORM (  Object Relation Manager ) -> dans l'appli symfony on ne connaît que l'ORM
    - twig : va servir à faire des templates (gabarit ) html
    -  monolog : outil pour gérer les journaux de logiciels (historique, journaux d'utilisation )
    - API : sert à créer une architecture pour que le dev front puisse accéder à ses données


  ## COMPOSEUR

    Ces composants sont installé avec un outil PHP -> composer
    Composer s'utilise dans un terminal (il faut au préable installer un terminal et composer)
    Example :   pour installer doctrine :
                           -composer require doctrine



************************************
## SYMFONY INSTALLATION

### pour créer une application web
 -  composer create-project symfony/website-skeleton nom_de_mon_projet
###  pour créer un microservice, console application ou API
-   composer create-project symfony/skeleton nom_de_mon_projet


************************************
  ## LES REPERTOIRES:
    -   bin : binary fichiers exécutables, des outils pour nous simplifier la vie (console, phpunit, etc.)
    -   config : contient les fichiers de configuration de symfony et de ses composants
    -   migrations : doctrine va versionner l'évolution de la structure de la BDD (fichier PHP)
    -   public :  c'est le dossier qu'il faudra rendre accessible par le server HTTP
    -   scr : c'est le code de l'application 
    -   template : c'est le dossier qui contiendra les gabarits html
    -   tests : la ou on écrira nos tests
    -   translations : (traduction)
    -   var : c'est un dossier contenant de fichier temporaire de symfony : le cache et les journaux
    -   vendor : il n'est pas lié à symfony mais à composer qui stocke à cet endroit tous les fichiers

****************************
  ## LES FICHIERS:
****************************
        * .env : c'est un fichier de configuration pour notre environnement (connexion à la BDD)
        * composer.json : c'est le fichier utile à composer pour paramétrer ce paquet


**************************
  ## FLEX:

        -   /!\ aucun rapport savec flex de CSS /!\
        -   flex dans le sens de symfony flex est un logiciel qui sert l'installation des composants
        -   les développeurs écrivent des recettes qui expliquent comme s'installent les composants de symfony

*************************  
  ## MVC:

        -   façon d'écrire du code ou schéma de conception ( Patron de conception, ou Pattern ) en séparant trois (3) éléments : 
            *   Modèle(model) : L'Ensemble du code qui va intéragir avec la BDD
            *   Vue(view)  : tout ce qui va concerner le rendu visuel 
            *   Contrôleur(controller) : il fera le lien entre le modèle et la vue (au moyen d'une route). gère aussi l'authentification.
## DEBUG 

POur debuger on va utiliser essentiellement deux fonctions :
        * dd()          -> dump and die : formater et avec des outils qui tuent la mort 
        * dump()        -> s'affiche dans le profiler (petite cible) avec des outils de recherche
Quelques outils :
 - la couleur (coloration syntaxique)
 - outil de repli des propriétés
 - recherche avec `cntrl + f`` -> chercher des propriétés 
Ce composant s'installe grâce à `composer req symfony/var-dumper`


***********************
   ## INTERET : 

        1/ façon d'organiser le code à plusieurs : (ex. pour les intégrateur ou pouvoir organisé les equipe de codeurs)
        2/  façon d'optimiser les performance : en séparant le code qui requête la BDD du code qui fqit le rendu visuel.


************************
### ROUTE : 

        -   une route est légèrement différent d'ue URL
        -   c'est morceua d'URL à laquelle va correspondre une action dans notre application
            ex : 
            - /articles/: récupération de tous les articles
            - /articles/new : créer un article 
             - /articles/1/ : afficher l'article 1
            - /articles/1/edit : modifier l'article 1
            - /articles/1/delete : supprimer l'article 1

2/ utiliser un commentaire miltiligne pour donner une @Route
3/debug avec php bin/console debug:router 
4/voir ArticlesController.php


Troisfaçons de créer une table :
1/ Version compliquée, on se prend la tête   
        * Créer une nouvelle classe dans entity et l'annoter avec @ORM\ENtity
        * Dans cette classe on créera nos intitulés de colonnes que l'on définiera grâce aux annotations
        * On fait un getter pour l'id et un getter et un setter pour les autres intitulés de colonnes 
        * Aller dans la console et taper `php bin/console doctrine:schema:update --force`

2/ version moins compliquée mais pas propre quand même
        * dans la console on met : ` php bin/console make:entity`
        * la console nous propose de créer les colonnes et de leur donner une valeur (pas besoin de l'index / ajouter automatiquement)
        * on vérifie ce qu'il y a dans notre page qui a été créée 
        * Aller dans la console et taper `php bin/console doctrine:schema:update --force`

3/ version moins compliquée et propre
        * dans la console on met : ` php bin/console make:entity`
        * la console nous propose de créer les colonnes et de leur donner une valeur (pas besoin de l'index / ajouter automatiquement)
        * on vérifie ce qu'il y a dans notre page qui a été créée 
        * Aller dans la console et taper `php bin/console make:migration`
        * Vérifier la classe créée
        * Lancer dans la console : `php bin/console doctrine:migrations:migrate` ou pour les geek : `php bin/console d:m:m`

        alt+0192 accent gràve
        alt+0201 accent aigu

## REPOSITORY
    À côté de l'entité est créé un REPOSITORY qui servira à contenir les fonctions de recherche dans la base de données (BDD)

## INJECTION DE DÉPENDANCE (DEPENDENCY INJECTION)

Lorsque l'on travail dans le contrôlleur on aura de nombreux outils externes :
    - L'outil de recherche en BDD (REPOSITORY)
    - L'outil d'envoi de mails (MAILER)
    - L'outil pour chiffrer un mot de pass, etc. ()
Dans SYMFONY on accède assez facilement à ces instances grâce à l'INJECTION DE DÉPENDANCE;
Il suffit d'écrire dans la méthode le type et nom de variable. Si SYMFONY connait ce tyle il l'instanciera et le fournera.
Type - int 

Quand SYMFONYmet en relation nos fonctions et ses dépendances on parle de autowiring.


La liste complète des dépendances utilisables :
`php bin/console debug:autowiring --all`