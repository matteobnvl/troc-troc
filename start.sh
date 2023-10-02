#!/bin/sh

cd api_troc_troc
git pull
php bin/console d:m:m
echo "Démarrage du serveur API..."
symfony server:start &

cd ../front_troc_troc
git pull
echo "Démarrage du serveur Front..."
npm run dev &

# Attendez que toutes les tâches en arrière-plan soient terminées (optionnel)
wait
