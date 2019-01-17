# Docker image for Magento 1 (Ngnx, PHP 7.2 fpm, Mysql, Alpine)

## How to use

You can use `docker-compose up -d` to run this image directly.

```bash
docker-compose up -d
```
Magento is installed into `/var/www/html/code` folder.

## Magento installation script

A Magento installation script is also provided as `/usr/local/bin/install-magento`. This script can install Magento without using web UI. This script requires certain environment variables to run:

Environment variable      | Description | Default value (used by Docker Compose - `env` file)
--------------------      | ----------- | ---------------------------
MYSQL_HOST                | MySQL host  | db
MYSQL_DATABASE            | MySQL db name for Magento | magento
MYSQL_USER                | MySQL username | magento
MYSQL_PASSWORD            | MySQL password | myrootpassword
MAGENTO_LOCALE            | Magento locale | en_US
MAGENTO_TIMEZONE          | Magento timezone |America/New_York
MAGENTO_DEFAULT_CURRENCY  | Magento default currency | USD
MAGENTO_URL               | Magento base url | http://localhost:8080
MAGENTO_ADMIN_FIRSTNAME   | Magento admin firstname | Admin
MAGENTO_ADMIN_LASTNAME    | Magento admin lastname | MyStore
MAGENTO_ADMIN_EMAIL       | Magento admin email | admin@example.com
MAGENTO_ADMIN_USERNAME    | Magento admin username | admin
MAGENTO_ADMIN_PASSWORD    | Magento admin password | admin1234

Update these values in the .env file in the root directory of this repo.

[*More Info*](https://magento2.atlassian.net/wiki/spaces/m1wiki/pages/14024845/Magento+1.x+Command+Line+Installation+Wizard)

After Docker container started, use `docker ps` to find container id or name of the then app container use `docker exec` to call `install-magento` script.

```bash
docker exec -it <container id> install-magento
```
ex:
```bash
docker exec -it docker-magento-php7_app_1 install-magento
```

After calling `install-magento`, Magento is installed and ready to use. Use provided admin username and password to log into Magento backend.

The store is available from http://localhost:8080/


## Modman
Modman is a [Magento module manager](https://github.com/colinmollenhour/modman) that allows you to leave your work siloed from the actual Magento codebase via symlinks. With modman, you can sync plugin or theme work without keeping a persistent volume (or using a hidden volume).

```bash
# from htdocs
modman init
modman link /path/to/plugin
```
And to update symlinks:
```bash
modman deploy
```
