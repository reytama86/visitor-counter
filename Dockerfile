# Gunakan image PHP yang sesuai
FROM php:7.4-fpm

# Instal dependensi PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev

# Aktifkan ekstensi PostgreSQL
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_pgsql pgsql

# Salin kode aplikasi PHP ke dalam kontainer
COPY . /var/www/html

# Konfigurasi lainnya sesuai kebutuhan Anda
 