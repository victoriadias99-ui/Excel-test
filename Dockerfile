FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install \
        mysqli \
        pdo \
        pdo_mysql \
        zip \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && a2enmod rewrite \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY public_html/ /var/www/html/

RUN sed -i 's|Listen 80|Listen ${PORT}|' /etc/apache2/ports.conf \
 && sed -i 's|:80|:${PORT}|' /etc/apache2/sites-available/000-default.conf

ENV PORT=8080
EXPOSE 8080

CMD ["apache2-foreground"]
