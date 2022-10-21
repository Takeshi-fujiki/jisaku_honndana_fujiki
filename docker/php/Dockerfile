# 使用イメージの指定
FROM php:7.4-fpm

# composer イメージ内から特定のファイルをコピー
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# コマンドの実行
# apt-getコマンドのアップデートと必要なライブラリやドライバのインストール
RUN apt-get update && apt-get install -y \
git \
&& apt-get install -y zip unzip \
&& docker-php-ext-install pdo_mysql
RUN apt-get install -y git zip unzip libzip-dev libpq-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
 && docekr-php-ext-install zip pdo_mysql \
 && docekr-php-ext-configure gd --with-freetype --with-jpeg \
 && docekr-php-ext-install -j$(nproc) gd
