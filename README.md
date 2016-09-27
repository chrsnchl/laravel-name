# laravel-name

##Set up database with these files:
To create .env, just rename .env.example   

.env  

/config/database.php  

##Run migrations
php artisan migrate

## Files of interest:
routes/web.php -> URL routing

database/migrations -> contains database structure

resources/views ->contains html templates


##Database notes
When working with data, Laravel assumes the database is the plural form of the model


In this case, the model is:


App\Name.php
