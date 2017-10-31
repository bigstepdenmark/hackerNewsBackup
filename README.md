# Hacker News Back-End

### ER-Diagram
![Hacker News ER-Diagram](https://www.dropbox.com/s/4lwgykdo54smopu/ER.png?raw=1)

### Travis
```yml
language: php

php:
  - 7.1

before_script:
  - cp .env.travis .env
  - mysql -e 'create database db_testing';
  - composer self-update
  - composer install --no-interaction
  ## - php artisan migrate
  - php artisan key:generate

script:
  - vendor/bin/phpunit

after_success:
  - chmod +x ./tests.sh; ./tests.sh
```

### Forge Deployment Service