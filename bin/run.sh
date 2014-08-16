#!/bin/bash

export SYMFONY_ENV=prod

git pull --rebase

function symfony {
    echo "run symfony"
    composer install --no-dev
    php app/console doctrine:schema:update --force
    php app/console doctrine:ensure-production-settings
    php app/console cache:clear
}

function node {
    echo "run node"
    npm install
}

if [ "$1" == "p" ]; then
    symfony
    gulp prod
elif [ "$1" == "i" ]; then
    symfony
    node
    gulp prod
fi