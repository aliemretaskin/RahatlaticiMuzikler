FROM php:7.2.2-fpm
RUN apt-get update && apt-get install -y mysql-client --no-install-recommends \
 && docker-php-ext-install pdo_mysql
 
RUN curl -sL https://deb.nodesource.com/setup_11.x  | bash -
RUN apt-get -y install nodejs
RUN npm install