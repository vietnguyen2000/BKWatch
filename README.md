# Assignment Web - 211
Make sure you have installed php:
https://www.php.net/manual/en/install.php

Install database with your selected schema: ```database/export.sql```

You can add `config.development.php` and `config.production.php` for config in running two mode development and production.

Config your database in `config.development.php` or `config.production.php`:
```
<?php
$database_server = "localhost";
$database_port = "3306";
$database_username = "YOUR_USERNAME";
$database_password = "YOUR_PASSWORD";
$database_name = "YOUR_SCHEMA";
```



To start development:
```
php -S localhost:5501
```
To start production: (running on your server not on localhost, example is 0.0.0.0) 
```
php -S 0.0.0.0:80
```