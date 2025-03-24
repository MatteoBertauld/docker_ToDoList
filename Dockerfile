#https://laravel-france.com/posts/conteneuriser-son-application-laravel-avec-docker

FROM php:8.3-apache

ARG WWW_USER=1000

WORKDIR /app

# Mise à jour des paquets et installation des dépendances
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    libzip-dev \
    libcurl4-openssl-dev \
    zip \
    unzip \
    apt-transport-https \
    && rm -rf /var/lib/apt/lists/*

# Installation et configuration des extensions PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd zip curl intl

COPY entrypoint.sh ./

# Copy vhost config
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# Enable Apache mods
RUN a2enmod rewrite

# Create user
# Pour éviter des pb on créé un utilisateur dédié qui aura le même id que celui que l'on utilise sur notre hôte
RUN groupadd --force -g $WWW_USER webapp
RUN useradd -ms /bin/bash --no-user-group -g $WWW_USER -u $WWW_USER webapp


# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Clean cache
RUN apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

USER ${WWW_USER}
