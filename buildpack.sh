#!/usr/bin/env bash

# Instale as dependências do PHP
echo "-----> Installing PHP dependencies"
composer install --no-dev --prefer-dist --no-interaction

# Execute os comandos de build do seu aplicativo PHP, se necessário
# Por exemplo:
# echo "-----> Running PHP build commands"
# php artisan migrate
# php artisan cache:clear

# Defina o comando de inicialização do aplicativo PHP
echo "web: vendor/bin/heroku-php-apache2 public/" > Procfile
