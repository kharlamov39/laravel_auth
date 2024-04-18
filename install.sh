#!/bin/sh
set -e
sudo chmod 775 -R .
echo 'Установили права на проект'
cp -f .env.example .env
echo 'Файл .env готов'
sudo docker compose up -d
echo 'Контейнеры запустились'
sudo docker compose exec php-cli composer update
echo 'Папка vendor установлена'
