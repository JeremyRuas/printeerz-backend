web: vendor/bin/heroku-php-apache2 -i custom_php.ini public/
if (env('APP_ENV') === 'prod') {
    \URL::forceScheme('https');
}