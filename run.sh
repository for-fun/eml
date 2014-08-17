#!/bin/bash

export SYMFONY_ENV=prod

git pull --rebase

function symfony {
    echo "run symfony"
    composer install --no-dev
    php app/console doctrine:schema:update --force
    php app/console doctrine:ensure-production-settings
    php app/console cache:clear --env=prod --no-debug
}

function node {
    echo "run node"
    npm install
}

if [ "$1" == "up" ]; then
    symfony
    gulp prod
elif [ "$1" == "inst" ]; then
    symfony
    node
    gulp prod
fi