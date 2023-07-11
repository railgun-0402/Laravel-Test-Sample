FROM nginx:mainline-alpine

# （注意）buildcontext からの相対パスでホスト側のパスを指定します
# ADD ./nginx/conf/laravel.conf /etc/nginx/conf.d/default.conf
# ↑ConfigMap化
# RUN apk add openssl
# RUN mkdir /ssl
# RUN chmod 777 -R /ssl

# ADD ./laravel /var/www/html
RUN chmod -R 777 /var/log/nginx
