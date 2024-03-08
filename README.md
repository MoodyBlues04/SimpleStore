# SimpleStore

## Motivation
That project made for those who want to learn more about yii2 framework.

## Requirements
- ```php>=8.2.0```
- ```composer```

## Installation
1. Run ```git clone git@github.com:MoodyBlues04/SimpleStore.git``` to clone repository to your local machine
2. Run ```composer install ``` to install all project dependencies
3. Specify your DB config in config/dp.php
4. Run ```php yii migrate/up``` to set up all project migrations
5. Run ```php yii migrate --migrationPath=@yii/rbac/migrations``` to set up rbac migrations
6. Run ```php yii rbac-seeder/seed``` and ```php yii user-seeder/seed``` to seed database with default roles and users