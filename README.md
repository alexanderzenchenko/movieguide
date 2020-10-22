# MovieGuide
***Portal for film viewers, where movie buffs can discuss films***

## Requirements

- Composer
- PHP 7.3 or higher
- Apache 2.4.7 or higher
- Supported databases: MySQL 5.5.3 or higher
- Drush

## How to install
- fork your own copy of repository to your account
- `clone` to your PC 
- `cd` into cloned repository folder
- execute `composer install`
- open phpmyadmin (or another app) with Apache and MySQL running
- click on the `import` tab
- choose the `movieguide.sql` file from your cloned repository folder and click on the `go` button (wait until db creating is done)
- `cd` into cloned repository folder and execute `drush cim`, then type `yes`
- Drupal site - installed, credentials for administration  on your local web server (login: admin, password: admin)
