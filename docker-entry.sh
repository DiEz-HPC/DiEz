#!/bin/sh

## Symfony configuration
chmod -R 777 /var/www/var
chmod -R 777 /var/www/public

php bin/console doctrine:database:create --if-not-exists --quiet --no-interaction
php bin/console doctrine:migrations:migrate --verbose --no-interaction --allow-no-migration

echo 'Setup finished, now run deploy.sh'

cd /var/www/

bash /var/www/deploy.sh

echo 'Deploy finished'