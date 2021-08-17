## About Weather Humidity Consultant

Weather Humidity Consultant is a web application using a Weather API to consulting weather info from differentes Cities, the API used is [OpenWeatherAPI](https://home.openweathermap.org/)

##Start app
1. We assume you have a MariaDB installation (or MySQL). First copy `.env` file and paste it into `.env.local`
2. Then Configure your `DATABASE_URL` `(e.g: DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"` or `DATABASE_URL="mysql://root:weather_consultant@127.0.0.1:3306/weather_humidity_consultant?charset=utf8")`
3. Go to root app directory and using the cli execute`composer install`.
4. Go to root app directory and using the cli execute`php bin/console doctrine:database:create`. (It will create the database).
5. Now you need to Seed the database. Go to cli again and use:
    1. If is the first time, run:
       `php bin/console doctrine:fixtures:load`
6. Configure your server to start the App using `symfony server:start` if you have [Symfony](https://symfony.com/download) installed, otherwise configure your app server. 
7. Go to the browser and start using the [App](http://localhost:8000)

###Notes:
1. The App use three defaults Cities:
   1. Miami
   2. Orlando
   3. New York
2. The [API](https://developer.yahoo.com/weather/) is deprecated.