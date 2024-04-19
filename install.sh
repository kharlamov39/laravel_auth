#!/bin/sh
set -e
if sudo docker ps -a --format '{{.Names}}' | grep -q "^phpmyadmin$"; then
    sudo docker stop phpmyadmin
    echo 'Контейнер phpmyadmin остановлен'
fi
cp -f .env.example .env
echo 'Файл .env готов'
sudo docker compose up -d
echo 'Контейнеры запустились'
sudo docker compose exec php-cli composer update
echo 'Папка vendor установлена'
sudo chmod 777 -R .
# nohup sh -c "xdg-open http://localhost:8080/ > /dev/null" &&
sudo docker compose exec node npm install && echo 'Зависимости npm установлены успешно' && sudo docker compose exec node npm run dev
