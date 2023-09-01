# Server Administration

- [Install lamp](https://www.linode.com/docs/web-servers/lamp/install-lamp-stack-on-ubuntu-18-04/)
- [Install PHPmyadmin](https://www.digitalocean.com/community/tutorials/how-to-install-and-secure-phpmyadmin-on-ubuntu-18-04)
- [Manually upgrade phpmyadmin](https://devanswers.co/manually-upgrade-phpmyadmin/)

Commands:

### When first installing laravel

```
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache

chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### When running `npm update` or `npm install` 

You may encounter the following error:

`Error: pngquant failed to build, make sure that libpng-dev is installed`

You can fix this using this article [Install libpng-dev](https://github.com/imagemin/imagemin-pngquant/issues/46#issuecomment-379604951) by running this command:

`sudo apt-get install libpng-dev`

### Allowing multiple cors sites

```
# ----------------------------------------------------------------------
# Allow loading of external fonts
# ----------------------------------------------------------------------
<FilesMatch "\.(ttf|otf|eot|woff|woff2)$">
    <IfModule mod_headers.c>
        SetEnvIf Origin "http(s)?://(www\.)?(google.com|staging.google.com|development.google.com|otherdomain.example|dev02.otherdomain.example)$" AccessControlAllowOrigin=$0
        Header add Access-Control-Allow-Origin %{AccessControlAllowOrigin}e env=AccessControlAllowOrigin
        Header merge Vary Origin
    </IfModule>
</FilesMatch>
```

or via php: (This is untested and may not work)

```
$http_origin = $_SERVER['HTTP_ORIGIN'];

if ($http_origin == "http://www.domain1.com" || $http_origin == "http://www.domain2.com" || $http_origin == "http://www.domain3.com")
{  
    header("Access-Control-Allow-Origin: $http_origin");
}
```

## Creating Virtual Hosts
- Start by `cd` into your `/etc/apache2/sites-available` and running the following command:
- `sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/<YOUR_DOMAIN>.conf`
- This will create a copy of the conf file to setup your virtual host
- `vim` your file new conf file and add the updated details
- It may look something like this:
    ```
    <VirtualHost *:80>
  ...
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/html
    ServerName your_domain_1
    ServerAlias www.your_domain_1
    DocumentRoot /var/www/your_domain_1/public_html
   ...
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>```

- Then run the following command to enable the site:
- `sudo a2ensite YOUR_DOMAIN.conf`
- Then restart the server by running `systemctl restart apache2`