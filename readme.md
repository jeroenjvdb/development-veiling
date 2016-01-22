## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

##deploy
download files
-(https:) `git clonehttps://github.com/jeroenjvdb/development-veiling.git     `     
-(ssh: ) `git clonegit@github.com:jeroenjvdb/development-veiling.git     `   


`sudo composer install  `   
`sudo composer self-update  `

set root directory to public map  
(c9:)   
`sudo nano /etc/apache2/sites-enabled/001-cloud9.conf`  
change:  
`documentRoot /home/ubuntu/workspace`  
to:  
`documentRoot /home/ubuntu/workspace/public`  

`sudo composer update `   
`php artisan key:generate `    
`install mysql  `  

add database  
check DB host  
(mysql)  
`use [database_name]  `  
`select @@hostname  `   
`exit`  

in .env (root directory)  
`DB_HOST=[database_hostname]`     
`DB_DATABASE=[database_name]`  
`DB_USERNAME=[datebase_username]`    
`DB_PASSWORD=[database_password]`  


add tables to database   
`php artisan migrate --seed  `  


instellen mail:  
(https://laravel.com/docs/5.1/mail)  
in .env  

`MAIL_DRIVER=smtp `   
`MAIL_HOST=smtp.gmail.com`    
`MAIL_ENCRYPTION=tls  `  
`MAIL_PORT=587  `  
`MAIL_USERNAME=[email_adress] `   
`MAIL_PASSWORD=[email_password]  `  
`MAIL_FROM=[email_adress]  `  
`MAIL_NAME=[application_name]  `  

cron instellen:  
`crontab -e`  
onderaan de file toevoegen:  
`* * * * * php path/to/root/artisan schedule:run >> /dev/null 2>&1]`




