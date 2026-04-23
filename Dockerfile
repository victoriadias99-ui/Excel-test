FROM php:8.3-cli

# Install system dependencies and PHP extensions
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
        redis \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY . .

RUN chmod +x entrypoint.sh

EXPOSE ${PORT:-8080}

CMD ["./entrypoint.sh"]
