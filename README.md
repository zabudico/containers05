# IWNO5: Запуск сайта в контейнере

## Цель работы

Выполнив данную работу студент сможет подготовить образ контейнера для запуска веб-сайта на базе Apache HTTP Server + PHP (mod_php) + MariaDB.

## Задание

Создать Dockerfile для сборки образа контейнера, который будет содержать веб-сайт на базе Apache HTTP Server + PHP (mod_php) + MariaDB. База данных MariaDB должна храниться в монтируемом томе. Сервер должен быть доступен по порту 8000.

Установить сайт WordPress. Проверить работоспособность сайта.

## Подготовка

Для выполнения данной работы необходимо иметь установленный на компьютере Docker.

Для выполнения работы необходимо иметь опыт выполнения лабораторной работы №3.

## Выполнение

Создайте репозиторий `containers05` и скопируйте его себе на компьютер.

PS C:\Users\User\Desktop> git clone https://github.com/zabudicCloning into 'containers05'...
remote: Counting objects: 100% (3/3), done.
remote: Compressing objects: 100% (2/2), done.
remote: Total 3 (delta 0), reused 0 (delta 0), pack-reused 0 (from 0)

![alt text](img\Screenshot_1.jpg)

извлечение конфигурационных файлов apache2, php, mariadb из контейнера

Создайте в папке containers05 папку files, а также

папку files/apache2 - для файлов конфигурации apache2;
папку files/php - для файлов конфигурации php;
папку files/mariadb - для файлов конфигурации mariadb.

![alt text](img\Screenshot_files_.jpg)

Создайте в папке containers05 файл Dockerfile со следующим содержимым:

# create from debian image

FROM debian:latest

# install apache2, php, mod_php for apache2, php-mysql and mariadb

RUN apt-get update && \
 apt-get install -y apache2 php libapache2-mod-php php-mysql mariadb-server && \
 apt-get clean

![alt text](img\Screenshot_docker_file.jpg)

Постройте образ контейнера с именем apache2-php-mariadb.

```bash
docker build -t apache2-php-mariadb .
```

![alt text](img\Screenshot_build.jpg)

```bash
docker images
```

![alt text](img\Screenshot_images.jpg)

Создайте контейнер apache2-php-mariadb из образа apache2-php-mariadb и запустите его в фоновом режиме с командой запуска bash.

![alt text](img\Screenshot_run_-d.jpg)

```bash
docker ps -a
```

![alt text](img\Screenshot_docker_ps_-a.jpg)

Скопируйте из контейнера файлы конфигурации apache2, php, mariadb в папку files/ на компьютере. Для этого, в контексте проекта, выполните команды:

```bash
docker cp apache2-php-mariadb:/etc/apache2/sites-available/000-default.conf files/apache2/
docker cp apache2-php-mariadb:/etc/apache2/apache2.conf files/apache2/
docker cp apache2-php-mariadb:/etc/php/8.2/apache2/php.ini files/php/
docker cp apache2-php-mariadb:/etc/mysql/mariadb.conf.d/50-server.cnf files/mariadb/
```

![alt text](img\Screenshot_cp.jpg)

После выполнения команд в папке files/ должны появиться файлы конфигурации apache2, php, mariadb. Проверьте их наличие. Остановите и удалите контейнер apache2-php-mariadb.

![alt text](img\Screenshot_structure.jpg)

```bash
docker stop apache2-php-mariadb
docker rm apache2-php-mariadb
docker ps -a
```

![alt text](img\Screenshot_stop_rm_ps-a.jpg)

## Настройка конфигурационных файлов

### Конфигурационный файл apache2

Откройте файл files/apache2/000-default.conf, найдите строку #ServerName www.example.com и замените её на ServerName localhost.

Найдите строку ServerAdmin webmaster@localhost и замените в ней почтовый адрес на свой.

После строки DocumentRoot /var/www/html добавьте следующие строки:

DirectoryIndex index.php index.html

Сохраните файл и закройте.

В конце файла files/apache2/apache2.conf добавьте следующую строку:

ServerName localhost

![alt text](img\img\Screenshot_20.jpg)

### Конфигурационный файл php

Создание Dockerfile

для функционирования mariadb создайте папку /var/run/mysqld и установите права на неё:

Соберите образ контейнера с именем apache2-php-mariadb и запустите контейнер apache2-php-mariadb из образа apache2-php-mariadb. Проверьте наличие сайта WordPress в папке /var/www/html/. Проверьте изменения конфигурационного файла apache2.

Создание базы данных и пользователя

Создание файла конфигурации WordPress

Ответы на вопросы
Какие файлы конфигурации были изменены?
000-default.conf
apache2.conf
``php.ini`
50-server.cnf
Так же мы добавили supervisor.conf и написали Dockerfile

За что отвечает инструкция DirectoryIndex в файле конфигурации apache2?
Инструкция DirectoryIndex указывает что будети загруженно по умолчанию, при условии что мы не укажем другого файла в запросе

Зачем нужен файл wp-config.php?
В wp-config.php содержатся настройки WordPress. Например там находятся имя хоста, пароль от базы данных и.т.д

За что отвечает параметр post_max_size в файле конфигурации php?
post_max_size указывает максимальный размер body для POST запросов

Укажите, на ваш взгляд, какие недостатки есть в созданном образе контейнера?
База данных и веб-сервер запускаются в одном и том же контейнере. Их следовало бы разделить и запустить в двух разных для безопасности, удобства и расширяемости.

Выводы

1. Мы запустили сайт wordpress внутри контейнера, настроив веб-сервер (Apache) и базу данных (MariaDB)
2. Мы добавили supervisor для управления несколькими сервисами
3. Мы установили Wordpress и сконфигурировали его
