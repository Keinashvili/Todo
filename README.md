# Blog Laravel website
##  Used Dependencies


```
Laravel Framework v8.75

Tailwindcss/ui v1.8

MySQL v5.7.33
```

## Project setup
### Go to cloned directory
```
cd <directory_name>
```
### Run composer install
```
composer install
```

### Copy .env.example file
```
cp .env.example .env
```

### Generate key
```
php artisan key:generate
```
### Before migrateing, turn on database/MySQL server
### If your database connection is different edit these fields in .env file
```
DB_HOST
DB_USERNAME
```
### Migrate Database

```
php artisan migrate
```
### Run server
```
php artisan serve

or

php artisan serve --port 8080
```
