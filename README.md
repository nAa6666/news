
```
npm install laravel-mix --save-dev 
```
```
composer require barryvdh/laravel-debugbar --dev 
```
## Database MSQL 
```
php artisan migrate 
```
## Create user login admin panel. 
```
php artisan tinker 
```
```
DB::table('users')->insert(['name'=>'admin','email'=>'admin@admin.com','password'=>Hash::make('123456')]) 
```
## Collect styles and scripts (laravel-mix) 
```
npm run prod 
```
