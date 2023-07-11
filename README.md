# laravel_docker
## Docker + php-fpm + Nginx + MySQL 環境構築
構築の流れ
- 以下Dockerイメージ作成
  - Nginx
  - php-fpm
  - MySQL
- laravelインストール
- envファイル設定配置および設定
- DBマイグレーション

## 構築手順
・GithubからソースをcloneもしくはzipでDLする

※laravelフォルダに存在する「.gitkeep」を削除する

・コマンドラインツール（PowerShell,CMD, Terminal）にて
「docker-compose.yml 」が存在するフォルダへ移動し、以下コマンド実行
```
# dockerイメージ作成（キャッシュ無し）
docker-compose build --no-cache

# dockerコンテナ起動
docker-compose up -d

# php-fpmコンテナにログイン
docker-compose exec php-fpm /bin/bash
```
・php-fpmコンテナ内にて"/var/www/html"にいる状態で下記Laravelインストールコマンド実行
```
composer create-project --prefer-dist laravel/laravel=7.*.* .
```
laravelフォルダ直下の「.env」に以下の情報を記述
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=★ここは任意 ＆ docker-compose.ymlの値と合わせる★
DB_USERNAME=★ここは任意 ＆ docker-compose.ymlの値と合わせる★
DB_PASSWORD=★ここは任意 ＆ docker-compose.ymlの値と合わせる★
BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
LOG_CHANNEL=daily
```
### /laravel/config/app.phpの設定
```
'timezone' => 'Asia/Tokyo',
'locale' => 'ja',
'fallback_locale' => 'ja',
'faker_locale' => 'ja_JP',
```
■ キャッシュ作成とAPP_KEY作成
```
php artisan config:cache && php artisan key:generate && php artisan config:cache
```

■ マイグレーション
```
php artisan migrate
```
■ laravel/ui インストール

※ログイン機能を実装する場合、一旦bootstrapを入れる
```
composer require laravel/ui:~2.0
php artisan ui bootstrap --auth
```
※JS(React, Vueなど)は後からでもOK

■LaravelMIXインストール（後からでもOK）
```
apt update -y && apt install nodejs npm && npm install && npm run dev
```
■ブラウザ確認
ブラウザアドレスバーにlocalhostを入力し、ページ表示を確認

以上
