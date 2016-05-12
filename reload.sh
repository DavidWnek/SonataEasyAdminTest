#!/usr/bin/env bash
app/console doctrine:database:drop --force
app/console doctrine:database:create
app/console doctrine:schema:create -n

app/console fos:user:create admin admin@dev.com 1234
app/console fos:user:promote admin ROLE_SUPER_ADMIN
app/console fos:user:promote admin ROLE_SONATA_ADMIN

app/console fos:user:create user user@dev.com 1234