FROM ubuntu:14.04

RUN echo "deb http://repos.zend.com/zend-server/early-access/php7/repos ubuntu/" >> /etc/apt/sources.list.d/php7.list

# install packages for Apache and for compiling PHP
RUN apt-get update && apt-get install -y --force-yes php7-nightly apache2 git

RUN cp /usr/local/php7/libphp7.so /usr/lib/apache2/modules/
RUN cp /usr/local/php7/php7.load /etc/apache2/mods-available/
RUN ln -s /usr/local/php7/bin/php /usr/local/bin/

RUN echo "<FilesMatch \\.php$>\r\nSetHandler application/x-httpd-php\r\n</FilesMatch>" >> /etc/apache2/apache2.conf

RUN a2dismod mpm_event && a2enmod mpm_prefork && a2enmod php7

RUN rm -rf /var/www/html/index.html

EXPOSE 80

#CMD /usr/sbin/apache2ctl -D FOREGROUND