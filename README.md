# LaReponseD

Projet de développement web réalisé avec Laravel, par Pierre S. et Théo V. .

## Prérequis

Afin d'utiliser ce projet, il faut bien veiller à avoir installé au préalable une version de `php` (à noter que la version de développement est la `7.4.1`, des bugs peuvent se présenter avec des versions antérieurs) que vous pouvez télécharger [ici](https://www.php.net/downloads.php). Attention à correctement ajouter ce dernier au `PATH` afin d'utiliser les commandes (vérifier avec `php -v` dans une console).
Veillez ensuite à disposer de `composer`, téléchargable [ici](https://getcomposer.org/download/) et de l'ajouter au `PATH` afin de pouvoir l'utiliser via la ligne de commande.
Dernièrement, nous aurons besoin d'une base de données, que vous pouvez héberger via `UwAmp`, `Wamp`, `PhpMyAdmin`,...

## Récupération du projet

Le projet peut être récupéré par diverses méthodes :

> Télécharger le zip sur le répertoire GitHub officiel [ici](https://github.com/pierreSALMI/LaReponseD)
> Fork le projet depuis le site de Github [ici](https://github.com/pierreSALMI/LaReponseD)
> Utiliser la ligne de commande et `git` pour directement télécharger le projet
> Utiliser une interface graphique type Github Desktop disponible [ici](https://desktop.github.com/)

## Installation

Une fois le projet téléchargé sous la forme d'un dossier compressé, il vous suffira de le décompresser dans le dossier que vous souhaitez être récepteur du projet. Rendez-vous dans le dossier LaReponseD et ouvrez une interface en ligne de commande (si ce n'est pas déjà fait). Il faudra, afin d'utiliser le projet, exécuter la commande `composer install` afin d'installer les paquets utilisés pour le bon fonctionnement du site. Pour que celui-ci fonctionne, nous tapons les commandes `npm install`, `run dev`, `php artisan migrate`, `php artisan db:seed`, il faut aussi adapter les informations de connexion à la base de données dans le fichier `.env` du projet.

## Utilisation

Le site propose à tout les membres inscrit de pouvoir jouer à n'importe qu'elle Quiz fait par la communauté.

### Utilisateur

En t'en qu'utilisateur, vous pouvez Créer, Supprimer, et Modifier vos Quiz.
Votre profile est aussi modifiable.

### Administrateur

Les administrateurs ont les mêmes fonctionnalités que les utilisateurs mais peuvent en plus Supprimer, ou Modifier un Quiz et accéder à tous les profils utilisateurs.
