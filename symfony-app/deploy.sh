composer install
apt update && apt upgrade && apt install npm && npm install
npm run build
php bin/console assets:install public
php bin/console cache:clear
php bin/console cache:warmup