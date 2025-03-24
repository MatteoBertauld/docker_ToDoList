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

1. Construire les images Docker

Utilisez la commande suivante pour construire les images Docker nécessaires au projet :

docker compose build

2. Démarrer l'application

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

