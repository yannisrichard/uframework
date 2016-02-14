Instructions (Racine du projets):

    php -S localhost:8080 -t web/

Instructions:
-Dans le navigateur, saisir: localhost:8080/statuses pour obtenir la page d'accueil.

Note : Si il y a une erreur pdo, vérifier que la bdd a le bon port dans connection avec docker ps

Créer la base de données:
-$ docker run -d \
    --volume /var/lib/mysql \
    --name data_mysql \
    --entrypoint /bin/echo \
    busybox \
    "mysql data-only container"
-$ docker run -d -p 3306 \
    --name mysql \
    --volumes-from data_mysql \
    -e MYSQL_USER=uframework \
    -e MYSQL_PASS=p4ssw0rd \
    -e ON_CREATE_DB=uframework \
    tutum/mysql

Créer les tables:
-Se placer à la racine du projet
-$ mysql uframework -h127.0.0.1 -P<port> -uuframework -pp4ssw0rd < app/config/schema.sql

Tests:
-Se placer à la racine du projet
-$ phpunit

Routes:
LES GET :
    / : redirection sur /statuses.
    /﻿statusNotFound : redirection sur une page d'erreur.
    /statuses  : liste tous les status.
        Sur /statuses il est possible de passer différents arguments :
        /statuses?orderBy=status_date$desc : - Tri les tweets (Le $desc est optionnel).
        /statuses?orderBy=status_message : idem.
        /statuses?limit=0$5 : Limite l'affichage du nombre de tweets (Ici les tweets 0 à 5).
        /statuses?user=1 : Liste des tweets spécifique à un utilisateur (Ici l'utilisateur d'id 1).
    /statuses/1 : retourne le tweet d'id 1
    /register : redirection sur la page d'enregistrement
    /login : redirection sur la page de connection
    /logout : Déconnexion (session_destroy)

Les POST :
    /statuses : Post un tweet
    /register : Post des données pour l'enregistrement d'un utilisateur.
    /login : Post des données pour la connexion d'un utilisateur.

Le DELETE :
    /statuses/1 : supprime le status d'id 1