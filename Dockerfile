FROM wordpress:latest

WORKDIR /var/www/html

COPY wordpress ./

RUN chown -R www-data:www-data /var/www/
RUN chmod -R 755 /var/www/

EXPOSE 80