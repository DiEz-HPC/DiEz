@@ -1,16 +1,16 @@
#!/bin/sh
#!/bin/sh


composer install
apt update -y && apt upgrade -y && apt install npm -y && npm install -y
npm run build

## Symfony configuration
## Symfony configuration
chmod -R 777 /var/www/var
chmod -R 777 /var/www/var
chmod -R 777 /var/www/public
chmod -R 777 /var/www/public


php bin/console doctrine:database:create --if-not-exists --quiet --no-interaction
php bin/console doctrine:database:create --if-not-exists --quiet --no-interaction
php bin/console doctrine:migrations:migrate --verbose --no-interaction --allow-no-migration
php bin/console doctrine:migrations:migrate --verbose --no-interaction --allow-no-migration


php bin/console assets:install public
echo 'Setup finished, now run deploy.sh'
php bin/console cache:clear

php bin/console cache:warmup
cd /var/www/

bash /var/www/deploy.sh
