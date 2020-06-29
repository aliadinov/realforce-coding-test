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

#### expandable system of bonuses or deductions:
    $rules = [
        function() { $this->tax  += 0.2; },
        function() { $this->coef += $this->age > 50       ?  0.07 : 0; },
        function() { $this->tax  += $this->kids_count > 2 ? -0.02 : 0; },
        function() { $this->fee  += $this->uses_car       ?  500  : 0; },
        // etc...
    ];