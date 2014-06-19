# Environment Color for Laravel 4

Adds an environment indicator color bar to either top or bottom of all pages to indicate 
if you are working in 'local' or 'production' environment. 
 
Use config.php to change position, and colors for default or 'local' environment. 

The color bar is set to be enabled when debug mode is on by default.

### Installation

Add package to the `composer.json` file

	"require": {
        "qplot/environment-color": "dev-master"
        
Then run composer update,
        
    composer update

Add provider `app/config/app.php` file

	'providers' => array(
        'QPlot\EnvironmentColor\ColorServiceProvider'
        
To change settings `app/config/packages/qplot/environment-color/config.php`, you need to first publish config file, 

    php artisan config:publish qplot/environment-color 
        
### Todo

* Make bar height adjustable

### Changelog

#### 0.1.0

- Add service provider
