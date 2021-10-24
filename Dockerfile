FROM php:7.4.25-zts-buster

COPY . /var/www/html

CMD php -S 0.0.0.0:80 -t /var/www/html /var/www/html/build_in_router.php