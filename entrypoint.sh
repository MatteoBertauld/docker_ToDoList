#!/bin/bash

# S'assurer que le script s'arrête en cas d'erreur
set -e

# Exécuter les migrations et les seeders
echo "Exécution des migrations..."
php artisan migrate:fresh --force

if [ $? -ne 0 ]; then
    echo "Le script de génération des données s'est mal instancié."
    echo "Dans un terminal, exécutez la commande suivante :"
    echo ""
    echo "    docker ps"
    echo ""
    echo "Vous devriez obtenir une ligne similaire à celle-ci dans la console :"
    echo "    355de552ed27   docker_todolist-master-app   \"docker-php-entrypoi…\"   2 minutes ago   Up 2 minutes   0.0.0.0:8080->80/tcp     docker_todolist-master-app-1"
    echo ""
    echo "Ensuite, exécutez la commande suivante pour relancer les migrations :"
    echo "    docker exec -t 355de552ed27 php artisan migrate:fresh"
    echo ""
    echo "Si vous avez besoin de remplir la base de données avec les données par défaut, utilisez cette commande :"
    echo "    docker exec -t 355de552ed27 php artisan db:seed"
    echo ""
    exit 1
fi

echo "Exécution des seeders..."
php artisan db:seed --force

if [ $? -ne 0 ]; then
    echo "Échec des seeders, arrêt du script."
    exit 1
fi

# Démarrer Apache
echo "Démarrage d'Apache..."
exec apache2-foreground
