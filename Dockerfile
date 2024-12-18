# Utiliser l'image officielle avec PHP Apache
FROM php:8.1-apache

#Installer l'extension PDO MYSQL
RUN docker-php-ext-install pdo pdo_mysql

# Copier les fichiers de ton application dans le conteneur
COPY . /var/www/html

#on précise que l'on souhaite exposer notre port 80
EXPOSE 80