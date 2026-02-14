FROM php:8.1-apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
WORKDIR /var/www/html
RUN docker-php-ext-install mysqli pdo_mysql
COPY . .
#EXPOSE 8000
#CMD ["php", "-S", "0.0.0.0:8000", "-t", "."]

