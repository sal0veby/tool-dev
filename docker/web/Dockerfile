FROM krutpong/apache-php7.2-fpm

WORKDIR /var/www

RUN echo "Asia/Bangkok" > /etc/timezone \
    rm /etc/localtime && \
    dpkg-reconfigure -f noninteractive tzdata

ADD sites-enabled/vhost.conf /etc/apache2/sites-enabled/

RUN a2enmod ssl
