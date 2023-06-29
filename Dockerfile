FROM wordpress:latest

COPY ./apache/php/php.ini /usr/local/etc/php/

CMD ["php", "-S", "0.0.0.0:8000", "-c", "/usr/local/etc/php/php.ini"]