FROM php:8.2-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    nginx \
    supervisor \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar archivos del proyecto
COPY . /var/www

# Establecer directorio de trabajo
WORKDIR /var/www

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Dar permisos
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www/storage

# Generar APP_KEY automáticamente (si no lo has generado antes)
# RUN php artisan key:generate

# Enlazar storage
RUN php artisan storage:link || true

# Cache de configuración
RUN php artisan config:cache

# Copiar archivo de configuración de Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Copiar archivo Supervisor
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Exponer el puerto
EXPOSE 80

CMD ["/usr/bin/supervisord"]