FROM php:7.4-cli
COPY . /srv/app
WORKDIR /srv/app

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git zip unzip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
 && php composer-setup.php -- --filename=composer --install-dir=/usr/local/bin  \
 && rm composer-setup.php

RUN docker-php-ext-install pdo pdo_mysql

CMD ["./wait-for-it.sh", "mysql:3306", "--quiet ", "--timeout=300" , "--" , "echo", "mysql is reachable"]
