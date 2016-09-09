FROM codenvy/php56_apache2

RUN sudo apt-get update
RUN sudo apt-get -y install php5-mysql

COPY php.ini /usr/local/etc/php/
COPY src/ /var/www/html/
