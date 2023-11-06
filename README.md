CRUD de documentos con Laravel y Vuejs

Usuario: innclod@innclod.com
Contraseña: !ivsBywN6d!fTXR

Para el desarrollo de la aplicación se utilizo composer y nodejs

Versiones de librerias de PHP en el archivo composer.json, versiones de librerias de nodejs en el archivo package.json

Para el backend se utilizo una base de datos postgresql desplegada en linea en www.fl0.com que es un servicio gratiuto que permite desplegar bases de datos y algunas aplicaciones backend por lo cual las peticiones a dicha base de datos pueden tardar un poco, en la base de datos se dejaron 5 tipos de documento y 5 procesos, en una base de datos local los tiempos de respuesta son mucho más rapidos.

El desarrollo de la aplicación se hizo en linux para lo cual se explicaran los pasos para el uso de la misma en este sistema operativo

Primero se debe instalar Composer en el sistema, para este ejercicio se utilizó la ultima versión disponible:

Dentro del directorio raiz del proyecto y desde la consola ejecutamos el comando

    sudo apt install software-properties-common

Lo cual instalara dependencias faltantes en caso de que estas no estén el nuestro sistema Ubuntu

Se agrega el repositorio de php 

    sudo apt install software-properties-common

Lo que permite tener todas las versiones de php disponibles para instalación

Se actualiza la lista de repositorios actuales

    sudo apt update && sudo apt upgrade

Se instala la ultima versión de php 

    sudo apt update && sudo apt upgrade

Instalamos composer como se explica en la documentación oficial
https://getcomposer.org/download/
para lo cual se copian los siguientes comandos en la consola

    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"

la documentación nos recomienda mover el archivo de instalación al directorio /usr/local/bin

    sudo mv composer.phar /usr/local/bin/composer

con lo anterior ya tendriamos composer en nuestro sistema operativo

Instalación de nodejs

Para instalar nodejs en el sistema operativo se corre el comando

    sudo apt install nodejs

Se comprueba que se haya instalado tambien npm y si no es asi 

    sudo apt install npm

Se crea archivo .env basandose en el .env.example

    cp .env.example .env

Se crea llave de encriptación de la aplicación

    php artisan key:generate

para correr el proyecto digitamos desde el directorio raiz del proyecto el comando

    composer install

y tambien instalamos las dependencias de node

    npm install

una vez instaladas todas las dependencias iniciamos el servidor de desarrollo digitando en una consola

    php artisan serve

y en otra consola

    npm run dev

con esto el proyecto estará corriendo en http://127.0.0.1:8000/

Para conectar a base de datos local se deben reemplazar los parametros de conexion en el archivo .env

    DB_CONNECTION= #controlador de base de datos utilizada, de preferencia MySQL
    DB_HOST=direccion ip de la base de datos #en nuestro caso localhost
    DB_PORT= #puerto 3336 en servidores mysql
    DB_DATABASE= #nombre de base de datos
    DB_USERNAME= #usuario de base de datos
    DB_PASSWORD= #contraseña de base de datos

Para creacion de tablas y datos de prueba

correr las migraciones con el comando

    php artisan migrate

correr los seeders con el comando

    php artisan db:seed

para conectar a la base de datos en linea reemplazar lo siguiente en el archivo .env

    DB_CONNECTION=pgsql
    DB_HOST=ep-divine-mud-25635527.us-east-2.aws.neon.fl0.io
    DB_PORT=5432
    DB_DATABASE=prueba-innclod
    DB_USERNAME=fl0user
    DB_PASSWORD=LpvyXoE7x0la

Para despliegue en windows

Instalar composer desde la pagina oficial https://getcomposer.org/download/
Instalar nodejs desde la pagina oficial https://nodejs.org/en

Seguir los comandos en la linea de comandos de windows.




