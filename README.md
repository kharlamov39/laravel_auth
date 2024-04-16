# docker-laravel

Создаем Docker-контейнеры:
```
docker compose up --build -d
```
После установки контейнеров, переходим в контейнер php-cli: 
```
docker compose exec php-cli bash
```
Внутри контейнера устанвливаем Laravel:
```
composer create-project laravel/laravel name_project
```
При возникновении ошибок, связанных с правами запускаем команду из этого контейнера: 
```
chmod 777 -R /var/www
```
После успешной установки Laravel переносим все файлы и папки из директории <имя_проекта> в корневую директорию.
Во избежание проблем с правами прописываем команду для папки проекта: 
```
sudo chmod 777 -R
```
В файле .env Laravel-проекта указываем пароль от базы данных из файла docker-compose.yml


