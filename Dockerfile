# Dockerfile

# 1. Partimos da imagem oficial PHP-FPM
FROM php:8.2-fpm

# 2. Aumenta o memory_limit para 1 GiB
RUN echo "memory_limit=1024M" > /usr/local/etc/php/conf.d/memory-limit.ini

# 3. Instala extensões necessárias para Laravel / MySQL
RUN apt-get update \
 && apt-get install -y \
    libzip-dev zip unzip libpng-dev libonig-dev git \
 && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# 4. Instala o Composer (copy from official composer image)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Define diretório de trabalho
WORKDIR /var/www/html

# 6. Copia arquivos do host para o container
COPY . .

# Adiciona esta linha para que o Git nunca reclame de “dubious ownership” ao rodar composer
# Observe que isso será feito em build time, e garantirá que todos os contêineres derivados já
# tenham esse “safe.directory” configurado.
RUN git config --global --add safe.directory /var/www/html

# 7. Instala dependências PHP
RUN composer install --no-interaction --optimize-autoloader --no-dev

# 8. Dá permissão de escrita para storage e cache
RUN chown -R www-data:www-data storage bootstrap/cache

# 9. Expõe a porta (caso queira usar artisan serve)
EXPOSE 8000

# 10. Comando default (pode ser sobrescrito no compose)
CMD ["php-fpm"]
