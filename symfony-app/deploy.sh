composer install -y
apt update && apt upgrade && apt install npm && npm install -y
npm run build -y
php bin/console assets:install public
php bin/console cache:clear
php bin/console cache:warmup