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

# Asegurar permisos correctos para Laravel
RUN chmod -R 775 storage bootstrap/cache && chown -R www-data:www-data storage bootstrap/cache

# Forzar instalación limpia de dependencias Laravel
RUN rm -rf vendor/ && composer install --no-dev --optimize-autoloader || { echo "Composer install failed"; exit 1; }

# Enlazar storage (si falla no detiene build)
RUN php artisan storage:link || true

# Generar cache de configuración
RUN php artisan config:cache

# Copiar archivo de configuración de Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Copiar archivo Supervisor
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Exponer el puerto
EXPOSE 80

# Ejecutar supervisord al iniciar
CMD ["/usr/bin/supervisord"]
