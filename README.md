# DiEz - DevItEasy

Welcome to ***DiEz web Site***
This project aims to pass our diploma in Web and Mobile Web Developer.

It will also be used for our business creation project.

We are 3 developers driven by the same idea of creation.

We aim to create tools for our clients ranging from a script to a full website.

We are specialized in php / symfony development but also use the JS language (Vanilla / React / ...)

## Configuration & Dependencies:

### 1) Configuration:
1) [x] PHP >= 8.0
2) [x] mysql >= 8.0
3) [x] Symfony >= 5.3
4) [x] Node >= 12.21


### 2) FrontEnd:
1) [x] Webpack
2) [x] ReactJs
3) [x] Sass
4) [x] Bootstrap 5 React
5) [x] Font Awesome React


### 3) BackEnd:
1) [x] VichUpload
2) [x] EasyAdmin 3
3) [x] Doctrine Fixtures

## For Dev:
```
   - Run composer install
   - Run npm install
   - Configure your .env and your DSN
   - Create your database with :
         A) symfony console d:d:c 
         or 
         B) php bin/console d:d:c
   - Generate Fixtures with :
         A) symfony console d:f:l 
         or 
         B) php bin/console d:f:l 
   - Launch your server php with symfony serve
   - Compile your css with npm run watch or dev-server 
```