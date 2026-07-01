FROM php:8.2-apache

# Installa MariaDB e l'estensione PHP mysqli
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
        default-mysql-server \
    && docker-php-ext-install mysqli \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Assicura che MariaDB ascolti su TCP (non solo socket unix)
RUN printf '[mysqld]\nbind-address=127.0.0.1\nskip-networking=OFF\nskip-name-resolve\n' \
    > /etc/mysql/conf.d/lab.cnf

# Abilita mod_rewrite e permetti .htaccess (necessario per il blocco sqlmap)
RUN a2enmod rewrite && \
    printf '<Directory /var/www/html>\n    AllowOverride All\n</Directory>\n' \
    > /etc/apache2/conf-available/htaccess.conf && \
    a2enconf htaccess

COPY www/      /var/www/html/
COPY init.sql  /init.sql
COPY start.sh  /start.sh
RUN chmod +x /start.sh

EXPOSE 80
CMD ["/start.sh"]
