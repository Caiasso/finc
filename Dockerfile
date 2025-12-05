# Stage 1 - Build Frontend (Vite)
FROM node:18 AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .
RUN npm run build

# se o build gerou "dist" (padrão Vite), movemos para public/dist para o backend copiar
RUN if [ -d /app/dist ]; then mkdir -p /app/public && mv /app/dist /app/public/dist; \
    elif [ -d /app/build ]; then mkdir -p /app/public && mv /app/build /app/public/dist; fi

# Stage 2 - Backend (Laravel + PHP + Composer)
FROM php:8.2-fpm AS backend

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip libpq-dev libonig-dev libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy app files
COPY . .

# Copy built frontend from Stage 1 (agora sempre disponível em /app/public/dist quando existiu build)
COPY --from=frontend /app/public/dist ./public/dist

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# cria diretório e arquivo sqlite dentro do container (opcional durante build)
RUN mkdir -p /var/www/database \
    && touch /var/www/database/database.sqlite \
    && chmod 0664 /var/www/database/database.sqlite || true

# Laravel setup
RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan view:clear

# copiar entrypoint e torná-lo executável
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# usar entrypoint e iniciar php-fpm
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["php-fpm"]