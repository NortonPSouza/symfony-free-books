FROM php:8.2-cli
# install composer
RUN apt update && apt install -y unzip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# install mysql
RUN docker-php-ext-install pdo &&  \
    docker-php-ext-install pdo_mysql &&  \
    docker-php-ext-enable pdo_mysql
# configure the project
WORKDIR /var/www/code
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader
COPY . .
EXPOSE 8003
# run the aplication
CMD ["php", "-S", "0.0.0.0:8003", "-t", "public"]