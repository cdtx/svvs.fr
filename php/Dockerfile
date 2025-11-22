FROM php:5.6-apache
# FROM plutonianbe/php54-apache:latest
# FROM debian:jessie

#  RUN sed -i 's/deb.debian.org/archive.debian.org/g' /etc/apt/sources.list \
#    && sed -i '/security.debian.org/d' /etc/apt/sources.list \
#    && echo 'Acquire::Check-Valid-Until "false";' > /etc/apt/apt.conf.d/99no-check-valid 
# RUN cat /etc/apt/sources.list
# RUN rm /etc/apt/sources.list
# # 
# RUN echo "deb http://archive.debian.org/debian-security jessie/updates main" >> /etc/apt/sources.list.d/jessie.list
RUN echo "deb http://archive.debian.org/debian stretch main contrib non-free" > /etc/apt/sources.list
# 
# RUN echo 'Acquire::Check-Valid-Until "false";' > /etc/apt/apt.conf.d/99no-check-valid 

RUN apt-get update
RUN apt-get install -y --force-yes \
    zlib1g-dev libjpeg62-turbo-dev libpng-dev libfreetype6-dev

RUN docker-php-ext-configure gd --with-jpeg-dir=/usr/include --with-freetype-dir=/usr/include \
    && docker-php-ext-install gd mysql mysqli pdo_mysql

RUN a2enmod rewrite \
    && echo '<Directory /var/www/html>\n\
    AllowOverride All\n\
    </Directory>' >> /etc/apache2/apache2.conf
#RUN docker-php-ext-configure gd --with-freetype --with-jpeg
# RUN docker-php-ext-install mbstring
# RUN docker-php-ext-install zip
#RUN docker-php-ext-install gd

# RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache/apache2.conf
#RUN apt-get install -y --force-yes libapache2-mod-php5 php5-gd php5-mysql
#RUN a2enmod rewrite

WORKDIR /var/www/html
EXPOSE 80
CMD ["apache2-foreground"]
