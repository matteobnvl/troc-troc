#!/bin/bash

cd api_troc_troc
echo "Installation du projet Symfony..."
composer install

echo "Création base de données..."

#php bin/console doctrine:database:create
#   php bin/console doctrine:migrations:migrate

cd ../front_troc_troc
echo "Installation du projet Vue.js..."
npm install

echo "Installation terminée avec succès !"

