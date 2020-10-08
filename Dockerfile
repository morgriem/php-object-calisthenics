FROM composer:1 AS build
WORKDIR /app
RUN composer global require hirak/prestissimo
COPY composer.json composer.lock* ./
RUN composer install -o --no-scripts --ignore-platform-reqs

FROM php:7.4-alpine
WORKDIR /app
COPY --from=build /app/vendor ./vendor
COPY composer.json phpunit.xml* ./
COPY src ./src
COPY tests ./tests