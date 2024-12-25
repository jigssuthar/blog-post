<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About  Laravel Version 11 and Php 8.2
	
        Composer install.
	  npm install.
        php artisan key:genrate
        php artisan migrate;
	php artisan db:seed --class=UserSeeder
        php artisan db:seed --class=PermissionSeeder
        php artisan db:seed --class=RoleSeeder
        php artisan storage:link

	Login details:- 
	Admin- email => admin@example.com,
	       password => password
	Author- email => author@example.com,
	       password => password
	       
	Web Route :-http://127.0.0.1:8000/posts
		http://127.0.0.1:8000/posts/create
	        http://127.0.0.1:8000/posts/create
	 Api Route - Get all posts: http://127.0.0.1:8000/api/posts
		Get a single post: http://127.0.0.1:8000/api/posts/{id}
		Create a new post (authenticated): http://127.0.0.1:8000/api/posts
		Update a post (authenticated): http://127.0.0.1:8000/api/posts/{id} 
		Delete a post (authenticated): http://127.0.0.1:8000/api/posts/{id}
