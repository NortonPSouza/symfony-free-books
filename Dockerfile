FROM php:8.2-cli
# configure the project
WORKDIR /var/www/code
COPY . .
# install composer
RUN apt update && apt install -y unzip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# install dependencies
RUN composer install --no-scripts --no-autoloader
# install mysql
RUN docker-php-ext-install pdo &&  \
    docker-php-ext-install pdo_mysql &&  \
    docker-php-ext-enable pdo_mysql

EXPOSE 8003
# run the aplication
CMD ["php", "-S", "0.0.0.0:8003", "-t", "public"]