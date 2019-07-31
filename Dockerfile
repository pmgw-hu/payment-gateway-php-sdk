FROM ubuntu:18.04

# install packages for Apache and for compiling PHP
RUN apt-get update && apt-get install -y --force-yes php apache2 git php-mbstring php-bcmath

RUN ln -s /usr/local/php7/bin/php /usr/local/bin/

RUN echo "<FilesMatch \\.php$>\r\nSetHandler application/x-httpd-php\r\n</FilesMatch>" >> /etc/apache2/apache2.conf

RUN rm -rf /var/www/html/index.html

EXPOSE 80
