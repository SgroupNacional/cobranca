# Dockerfile

FROM php:8.2-fpm

RUN echo "memory_limit=1024M" > /usr/local/etc/php/conf.d/memory-limit.ini
# Instala dependências básicas e utilitários
RUN apt-get update && apt-get install -y \
    curl zip unzip git ca-certificates build-essential libzip-dev libpng-dev libonig-dev gnupg2 bash

# Instala extensões do PHP
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala o NVM, Node.js 20.x e npm compatível
ENV NVM_DIR=/root/.nvm
ENV NODE_VERSION=20.17.0

RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash && \
    . "$NVM_DIR/nvm.sh" && \
    nvm install $NODE_VERSION && \
    nvm use $NODE_VERSION && \
    nvm alias default $NODE_VERSION && \
    npm install -g npm@latest

# Adiciona nvm ao PATH do bash
ENV PATH="$NVM_DIR/versions/node/v$NODE_VERSION/bin/:$PATH"

# Define diretório de trabalho
WORKDIR /var/www/html

# Copia projeto
COPY . .

# Configura permissões
RUN git config --global --add safe.directory /var/www/html
RUN composer install --no-interaction --optimize-autoloader --no-dev
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8000
CMD ["php-fpm"]
