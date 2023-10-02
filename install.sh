#!/bin/bash

cd api_troc_troc

if [ ! -f ".env" ]; then
    echo "Initialisation du fichier .env à partir de .env.dist..."
    cp .env.dist .env
else
    echo "Le fichier .env existe déjà."
fi

read -p "Veuillez entrer le nom d'utilisateur de votre base de données : " db_user
read -s -p "Veuillez entrer le mot de passe de votre base de données : " db_pass
echo ""

current_value="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8.0.32&charset=utf8mb4"
new_value="mysql://$db_user:$db_pass@127.0.0.1:3306/app?serverVersion=8.0.32&charset=utf8mb4"

sed -i "s|$current_value|$new_value|" .env

echo "Configuration de la base de données mise à jour."

echo "Installation du projet Symfony..."
composer install

echo "Création base de données..."

#php bin/console doctrine:database:create
#   php bin/console doctrine:migrations:migrate

cd ../front_troc_troc
echo "Installation du projet Vue.js..."
npm install

echo "Installation terminée avec succès !"

