#!/bin/sh
set -e
cp -f .env.example .env
echo 'Файл .env готов'
sudo docker compose up -d
echo 'Контейнеры запустились'
sudo docker compose exec php-cli composer update
echo 'Папка vendor установлена'
sudo chmod 777 -R .
echo 'Установили права на проект'
docker compose exec node npm install && echo 'Зависимости npm установлены успешно'

