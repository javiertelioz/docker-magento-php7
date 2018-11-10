# Docker image for Magento 1.x

This repo creates a Docker image for [Magento 1.x](http://magento.com/).

## How to use

### Use as standalone container

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

After Docker container started, use `docker ps` to find container id of image `alexcheng/magento`, then use `docker exec` to call `install-magento` script.

```bash
docker exec -it <container id> install-magento
```

If Docker Compose is used, you can just modify `env` file in the same directory of `docker-compose.yml` file to update those environment variables.

After calling `install-magento`, Magento is installed and ready to use. Use provided admin username and password to log into Magento backend.

If you use default base url (http://local.magento) or other test url, you need to [modify your host file](http://www.howtogeek.com/howto/27350/beginner-geek-how-to-edit-your-hosts-file/) to map the host name to docker container. For Boot2Docker, use `boot2docker ip` to find the IP address.

**Important**: If you do not use the default `MAGENTO_URL` you must use a hostname that contains a dot within it (e.g `foo.bar`), otherwise the [Magento admin panel login won't work](http://magento.stackexchange.com/a/7773).

## Redis Cache

If you want to use Redis as Cache backend see comments in Dockerfile and bin/install-magento

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
