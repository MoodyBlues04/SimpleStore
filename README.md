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

## Project Structure
- Basic yii2 project structure you can find [here](https://www.yiiframework.com/doc/guide/2.0/en/structure-overview)
- ```commands``` directory contains console controllers. In that project, used for seeding database (generation default database values)
- ```config``` directory contains project settings. Here in ```dp.php``` you can specify your DB connection settings
- ```schemas``` directory contains db schemas (you can see it on the picture in the bottom) open it with workbench app
- other directories are using like yii2 specifies in its documentation (link below)

## Database Structure
![Database structure](https://i.ibb.co/z7TZXND/db-structure.png "Database structure")
- ```users``` table contains users information
- ```roles``` and others - part of standard RBAC for yii2 library. See docs [here](https://www.yiiframework.com/doc/guide/2.0/ru/security-authorization)
- ```products``` contains products information, it linked many to one with ```vendors``` and ```categories```
- ```product images``` stores paths to products images and linked with product many to one.

*Learn about database tables relations you can [here](https://experienceleague.adobe.com/docs/commerce-business-intelligence/mbi/analyze/warehouse-manager/table-relationships.html?lang=en)
