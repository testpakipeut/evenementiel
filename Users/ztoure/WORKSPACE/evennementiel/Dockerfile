# Utiliser l'image PHP officielle avec Apache
FROM php:8.1-apache

# Installer les dépendances système minimales
RUN apt-get update && apt-get install -y \
    git \
    && rm -rf /var/lib/apt/lists/*

# Activer les modules Apache nécessaires
RUN a2enmod rewrite headers

# Configurer PHP pour afficher les erreurs
RUN echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers de l'application
COPY . /var/www/html/

# Configurer les permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exposer le port (Railway définira le port)
EXPOSE 8080

# Créer un script de démarrage simple
RUN echo '#!/bin/bash' > /start.sh && \
    echo 'PORT=${PORT:-8080}' >> /start.sh && \
    echo 'echo "🌐 Apache écoute sur le port $PORT..."' >> /start.sh && \
    echo 'sed -i "s/Listen 80/Listen $PORT/g" /etc/apache2/ports.conf' >> /start.sh && \
    echo 'sed -i "s/:80/:$PORT/g" /etc/apache2/sites-enabled/000-default.conf' >> /start.sh && \
    echo 'apache2-foreground' >> /start.sh && \
    chmod +x /start.sh

# Démarrer avec le script personnalisé
CMD ["/start.sh"] 