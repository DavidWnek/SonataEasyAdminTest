#!/bin/sh
# production enviroment setup

bower install
bower install ./vendor/sonata-project/admin-bundle/bower.json
./app/console assets:install
./app/console cache:clear --env=prod --no-debug
