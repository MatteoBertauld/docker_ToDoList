#!/bin/bash

# Exécuter les migrations et les seeders
php /app/artisan migrate --force
php /app/artisan db:seed --force

# Démarrer Apache
exec apache2-foreground

