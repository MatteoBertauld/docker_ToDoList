TooDoList - Application Laravel

Développé par :
- Esteban DROUET
- Amir BEKHOUCHE Mohamed
- Mattéo BERTAULD-BECOURT

---

Description

TooDoList est une application web de gestion de tâches développée avec Laravel. Ce projet utilise Docker pour simplifier le déploiement et le développement de l'application.

---

Prérequis

Avant de commencer, assurez-vous d'avoir Docker et Docker Compose installés sur votre machine. 
- Docker
- Docker Compose 

---

Installation

1. Ajouter un .env pour la BD

Copié le fichier .env.exemples et supprimer l'extension .exemple

2. Construire les images Docker

Utilisez la commande suivante pour construire les images Docker nécessaires au projet :

docker compose build

3. Démarrer l'application

Lancez les conteneurs Docker en mode détaché avec la commande suivante :

docker compose up -d

Cette commande va démarrer tous les services nécessaires, y compris l'application Laravel et la base de données.

---

Accéder à l'application

Une fois les conteneurs lancés, l'application sera accessible en local à l'adresse suivante :

http://localhost:8080

Le port 8080 est mappé au port 80 du conteneur, donc vous pourrez accéder à l'application depuis votre navigateur.

---

Base de données

La base de données PostgreSQL est gérée au sein du conteneur Docker. Elle est configurée par défaut, et aucune configuration manuelle n'est nécessaire pour le bon fonctionnement de l'application.

---

Configuration

Aucune configuration supplémentaire n'est nécessaire pour faire fonctionner le site Laravel avec Docker. Une fois les conteneurs en cours d'exécution, l'application devrait être prête à l'emploi sans étapes supplémentaires.


--

Erreur de configuration


- Si la commande de docker ne fonctionne pas.
    Vérifier que l'outil est bien installé sur votre machine, si ce n'est pas le cas installer le, ou utiliser docker Desktop.


- Si vous optenez l'erreur suivante sur le site
"Fatal error: Uncaught Error: Failed opening required '/app/public/../vendor/autoload.php' (include_path='.:/usr/local/lib/php') in /app/public/index.php:34 Stack trace: #0 {main} thrown in /app/public/index.php on line 34"
    
    Le projet docker s'est mal générer refaite la commande 
    
    docker compose up



- SI vous optenez l'erreur suivante
SQLSTATE[42P01]: Undefined table: 7 ERROR: relation "liste" does not exist LINE 1: select * from "liste" ^

    Le script de génération des données s'est mal instancié. Dans un terminal faite la commande suivante
    
    docker ps
    
    vous devriez optenir la ligne suivante dans la console :
    "355de552ed27   docker_todolist-master-app   "docker-php-entrypoi…"   2 minutes ago   Up 2 minutes   0.0.0.0:8080->80/tcp     docker_todolist-master-app-1"
    
    Faite ensuite :
    
    docker exec -t 355de552ed27 php artisan migrate:fresh
    
    Cela va regénérer la base.
    Si après cela vous avez besoin des données par default faites la commande suivante
    
    docker exec -t 355de552ed27 php artisan db:seed


- Si le site ne fonctionne toujours pas
    Vérifier que vous avez bien renommer le fichier .env.exemple en .env

    Refaite les deux commandes build et up, vérifier les logs sur docker.



