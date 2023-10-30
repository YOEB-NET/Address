# YOEB ADDRESS

This readme explains how to install `yoeb/address`.

 1. `composer require yoeb/address`
 2. `php artisan migrate`
 3. CSV Permision Settings (postgreSQL and others)
 4. `php artisan yoeb:address-seed`

## CSV permision settings:
#### WİNDOWS:
> icacls "vendor\yoeb\address\src\Database\data\csv\cities.csv" /grant
> Everyone:F icacls
> "vendor\yoeb\address\src\Database\data\csv\countries.csv" /grant
> Everyone:F icacls
> "vendor\yoeb\address\src\Database\data\csv\states.csv" /grant
> Everyone:F


[YOEB.NET](https://yoeb.net/) X [BERKAY.ME](https://berkay.me/)