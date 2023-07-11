FROM debian:buster-slim

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        ca-certificates \
        apt-transport-https \
        curl \
        # vim add
        vim \
        unzip \
        zlib1g-dev \
        php7.3 \
        php7.3-fpm \
            php7.3-mysql \
            php7.3-xml \
            php7.3-mbstring \
            php-oauth \
            php7.3-zip \
            # stripe/stripe-php v7.56.0 requires ext-curl * -> the requested PHP extension curl is missing from your system.
            php7.3-curl \
            # xdebug add
            php7.3-xdebug \
    && rm -rf /var/lib/apt/lists/* \
    # php-fpmのListenをソケットから9000/tcpに変更します。
    && sed -iE '/^listen/s/\/run\/php\/php7\.3-fpm\.sock/9000/g' /etc/php/7.3/fpm/pool.d/www.conf \
    && mkdir -p /var/www/html \
    && mkdir -p /run/php \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# 33: tape 問題解決策
# RUN usermod -u 1000 www-data && \
#  groupmod -g 1000 www-data

# （注意）buildcontext からの相対パスでホスト側のパスを指定します
ADD ./laravel /var/www/html

# Xdebug
# 参考： https://blog.logicky.com/2019/05/03/194758
#RUN apt-get install -y --no-install-recommends php7.3-pear
#RUN pecl install xdebug \
# && docker-php-ext-enable xdebug

# composerをrootで実行できるようにします。
ENV COMPOSER_ALLOW_SUPERUSER 1

# (customize)php.iniをホストから、コンテナへ送ってあげます
COPY ./php-fpm/conf/php.ini /etc/php/7.3/fpm/php.ini
# COPY ./php-fpm/conf/php-fpm.conf /etc/php/7.3/fpm/php-fpm.conf

# Laravelのソースコードのフォルダを作業ディレクトリにします。
WORKDIR /var/www/html
EXPOSE 9000

# buid時に、storageを777に
# RUN chmod -R 777 ./storage/

# `docker-compose up`実行時、`/usr/sbin/php-fpm7.3 -F`で起動するようにします。
CMD [ "/usr/sbin/php-fpm7.3", "-F" ]

