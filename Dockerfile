FROM debian:latest

VOLUME /var/lib/mysql

VOLUME /var/log

RUN apt-get update && \
    apt-get install -y apache2 php libapache2-mod-php php-mysql mariadb-server supervisor tar && \
    apt-get clean

ADD https://wordpress.org/latest.tar.gz /tmp/wordpress.tar.gz  

RUN tar -xzf /tmp/wordpress.tar.gz -C /var/www/html/ && \
    mv /var/www/html/wordpress/* /var/www/html/ && \
    rm -rf /var/www/html/wordpress /tmp/wordpress.tar.gz

COPY files/apache2/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY files/apache2/apache2.conf /etc/apache2/apache2.conf

COPY files/php/php.ini /etc/php/8.2/apache2/php.ini

COPY files/mariadb/50-server.cnf /etc/mysql/mariadb.conf.d/50-server.cnf

COPY files/supervisor/supervisord.conf /etc/supervisor/supervisord.conf

COPY files/wp-config.php /var/www/html/wordpress/wp-config.php

# create mysql socket directory
RUN mkdir /var/run/mysqld && chown mysql:mysql /var/run/mysqld

EXPOSE 80

CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]


