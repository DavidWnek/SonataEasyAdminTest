#!/bin/sh

bower install
bower install ./vendor/sonata-project/admin-bundle/bower.json
./app/console assets:install --symlink
./app/console cache:clear --env=dev

