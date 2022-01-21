#!/bin/bash
CURRENT=$(basename $PWD)
MYSQL_CONTAINER_NAME=mysql-test-$CURRENT # el nombre del contenedor con el mysql para las pruebas
MYSQL_DATABASE=test                      # usamos la base de datos con nombre test
MYSQL_ROOT_PASSWORD=toor                 # el password de root para conectarse mysql
function stopMysql(){
    # se asegura que no hayan contenedores corriendo con el nombre
    # en la variable MYSQL_CONTAINER_NAME
    running=$(docker ps -aq -f name=$MYSQL_CONTAINER_NAME)
    if [[ ! -z "$running" ]]; then
        docker rm -f $running
    fi
}
echo "**** start mysql docker"
stopMysql
docker run --rm --name $MYSQL_CONTAINER_NAME -e MYSQL_ROOT_PASSWORD=$MYSQL_ROOT_PASSWORD -e MYSQL_DATABASE=$MYSQL_DATABASE -d mysql:5.7
# cache para el php composer y vendor solo para el pipeline
mkdir -p vendor
LOCAL_DIR="$HOME/.local-pipeline/php"
COMPOSER_CACHE_DIR="$LOCAL_DIR/composer/cache"
VENDOR_DIR="$LOCAL_DIR/$CURRENT/vendor"
BOOTSTRAP_CACHE_DIR="$LOCAL_DIR/$CURRENT/bootstrap/cache"
mkdir -p $COMPOSER_CACHE_DIR
mkdir -p $VENDOR_DIR
mkdir -p $BOOTSTRAP_CACHE_DIR
echo "**** update builder image"
TESTER_VERSION=latest
docker pull buildersmerqueo/builder-php:73
echo "**** running CI"
docker run --rm -it \
    --name tester-$CURRENT \
    --link $MYSQL_CONTAINER_NAME \
    -v $PWD:/home/ubuntu/project \
    -v $COMPOSER_CACHE_DIR:/home/ubuntu/.composer/cache \
    -v $VENDOR_DIR:/home/ubuntu/project/vendor \
    -v $BOOTSTRAP_CACHE_DIR:/home/ubuntu/project/bootstrap/cache \
    -v $HOME/.ssh:/home/ubuntu/.ssh \
    -e CI_COVERAGE_MIN=17 \
    -e CI_STATIC_CHECK_ERRORS_MAX=4200 \
    -e CI_FORMAT_ERRORS_MAX=380 \
    -e DB_HOST=$MYSQL_CONTAINER_NAME \
    -e DB_READ_HOST=$MYSQL_CONTAINER_NAME \
    -e DB_PORT=3306 \
    -e DB_DATABASE=$MYSQL_DATABASE \
    -e DB_USERNAME=root \
    -e DB_PASSWORD=$MYSQL_ROOT_PASSWORD \
    -e URL_ADMIN=administrator \
    -e APP_ENV=testing \
    -e APP_DEBUG=true \
    -e SETTINGS_HELP_CENTER_PARAMETER_STORE= \
    -e PICKING_API_GENERATE_STICKERS=https://api.test/endpoint \
    -e PICKING_API_CREATE_SECTOR=https://api.test/endpoint \
    -e LEANPLUM_SMS_URL=https://test.com/dev/v1 \
    -e LEANPLUM_PRESHARED_KEY=prueba \
    -w /home/ubuntu/project \
    buildersmerqueo/builder-php:73 tester-php.sh
stopMysql