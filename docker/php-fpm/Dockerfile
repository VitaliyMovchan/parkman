FROM php:fpm-alpine

# Arguments defined in docker-compose.yml
ARG USER_ID
ARG GROUP_ID

# Get latest Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/parkman

EXPOSE 9000

USER "${USER_ID}:${GROUP_ID}"