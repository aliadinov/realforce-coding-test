#### Live:
- http://realforce.gravex.ru/

#### How to build:

- git clone https://github.com/aliadinov/realforce-coding-test.git
- composer install
- create DATABASE called realforce (user='root', password='')
- php bin/console doctrine:migrations:migrate


#### How to test:
- ./bin/phpunit

#### How to run locally:
- php -S 127.0.0.1:8000 -t public/
- symfony serve (if you have symfony CLI installed)


#### How to setup VM and deploy (using ansible):
- see devops folder with devops/README.md instructions inside (not very accurate, sorry for that, just copy-paste from another project with minor changes)
- after that do steps from 'how to build' section 
- see http://realforce.gravex.ru/ It was setup with current ansible script