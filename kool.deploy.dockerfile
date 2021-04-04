FROM kooldev/php:7.4 AS composer

COPY . /app
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --quiet

FROM kooldev/node:14 AS node

COPY --from=composer /app /app
RUN cp kool.deploy.env .env && yarn install && yarn production && rm .env

FROM kooldev/php:7.4-nginx-prod

ENV PHP_MEMORY_LIMIT=256M

COPY --from=node --chown=kool:kool /app /app
