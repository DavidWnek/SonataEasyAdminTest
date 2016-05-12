easy-sonata_admin
=================

###Getting Started

1) Clone Repo

2) Update your vendors via Composer

```bash
composer install
```

3) Copy your parameters.yml.dist file to parameters.yml and customize it

```bash
cp app/config/parameters.yml.dist app/config/parameters.yml
```

4) Fix your permissions

 See [Setting up Permissions](http://symfony.com/doc/2.3/book/installation.html#checking-symfony-application-configuration-and-setup) in the Symfony book.

```bash
$ HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
$ sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs
$ sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs
```

5) Build your database and load fixtures

```bash
app/console doctrine:database:create
app/console doctrine:schema:create
app/console doctrine:fixtures:load
```

6) Install front-end dependencies

See [Installing Bower](http://bower.io/#install-bower)

```bash
bower install ./vendor/sonata-project/admin-bundle/bower.json
```

7) Install & dump assetic files

```bash
app/console assets:install --symlink
app/console cache:clear --env=dev
```

8) Configure Web server and fire up application

```bash
app/console server:run
```

 Username: admin
 Password: 1234
