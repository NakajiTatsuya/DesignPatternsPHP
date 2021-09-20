FROM php:8.0.0alpha1-fpm

RUN set -ex \
	&& apt-get update \
	&& apt-get install -y \
	libzip-dev mariadb-client vim wget \
	&& docker-php-ext-install -j$(nproc) zip \
	# && wget https://github.com/FriendsOfPHP/pickle/releases/download/v0.6.0/pickle.phar && mv pickle.phar /usr/local/bin/pickle \
	# && chmod +x /usr/local/bin/pickle \
    # && pickle install xdebug \
    # && docker-php-ext-enable xdebug \
    && docker-php-ext-install pdo_mysql \
    && apt-get clean
# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html