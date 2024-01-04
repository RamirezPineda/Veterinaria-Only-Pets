

FROM php:8.2-fpm

WORKDIR /app
# WORKDIR /var/www/html


RUN apt-get update && apt-get install -y \
		libfreetype-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd pdo_mysql

RUN apt-get install -y zip unzip

# COPY composer.json composer.lock ./

# instala composer en el contenedor
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# COPY --from=composer:2.6 /usr/bin/composer /usrc/bin/composer

# Configura Node.js y npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - && apt-get install -y nodejs

COPY . .

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install --ignore-platform-reqs --no-scripts --no-autoloader --no-dev \
    && composer dump-autoload --optimize --no-dev --classmap-authoritative \
    && npm install \
    && npm run build


RUN php artisan key:generate

# ENV DB_CONNECTION=mysql
# ENV DB_HOST=mysql
# ENV DB_PORT=3307
# ENV DB_DATABASE=db_veterinaria
# ENV DB_USERNAME=root
# ENV DB_PASSWORD=roypassword

# ENV DB_CONNECTION=${DB_CONNECTION}
# ENV DB_HOST=${DB_HOST}
# ENV DB_PORT=${DB_PORT}
# ENV DB_DATABASE=${DB_DATABASE}
# ENV DB_USERNAME=${DB_USERNAME}
# ENV DB_PASSWORD=${DB_PASSWORD}


# RUN chown -R www-data:www-data /var/www \
#     && chmod -R 755 /var/www

# RUN php artisan migrate:fresh --seed

EXPOSE 80

# CMD ["sh", "-c", "php artisan migrate:fresh --seed && php artisan serve --host=0.0.0.0 --port=80"]

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]




