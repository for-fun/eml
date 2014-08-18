#!/bin/sh

export SYMFONY_ENV=prod

git pull --rebase

symfony () {
    echo "run symfony"
    composer install --no-dev --env=prod
    php app/console doctrine:schema:update --force
    php app/console doctrine:ensure-production-settings
    php app/console cache:clear --env=prod --no-debug
}
node () {
    echo "run node"
    npm install
    bower install
}

if [ "$1" = "up" ]; then
    symfony
    gulp prod
    bower install
elif [ "$1" = "inst" ]; then
    symfony
    node
    gulp prod
elif [ "$1" = "fixt" ]; then
    php app/console doctrine:fixtures:load
    php app/console cache:clear --env=prod --no-debug
fi