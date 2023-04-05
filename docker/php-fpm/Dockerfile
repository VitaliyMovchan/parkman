FROM php:fpm-alpine

# Arguments defined in docker-compose.yml
ARG USER_ID
ARG GROUP_ID

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql

# Get latest Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/parkman

EXPOSE 9000

USER "${USER_ID}:${GROUP_ID}"