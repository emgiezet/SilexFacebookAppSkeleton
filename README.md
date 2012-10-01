Idea
----------------
This repo will be good start to make any kind of facebook app based on Silex, Faceboo, Twig, Doctrine.

All the good things that Symfony2 give us. But we don't really want to use entire Symfony2 but only some components that rocks hard as hell.

The main target is that we can deploy the app on the budget VPS servers.

But scalability is still available for developers.


Installation
-----------------
Using composer:

1. Checkout the repository
  
    git clone ... ./

2. Run the composer:
  
    php composer.phar update

3. Configure your FacebookSDK params:

    ``#web/index.php
        
    ``

4. Configure VHost:
    
    <VirtualHost *:80>
        DocumentRoot "/home/YourName/Workspace/Project/web"
        ServerName yourSuperbFbApp.local
        RewriteEngine On
        <directory "/home/YourName/Workspace/Project/web">
            AllowOverride All
        </directory>
    </VirtualHost>

5. Reload Apache config

    ``
        sudo service apache2 restart
    ``




Requirements
-----------------
* PHP 5.3
* Doctrine supported db engine

Documentation
------------------
* [DoctrineServiceProvider]( http://silex.sensiolabs.org/doc/providers/doctrine.html)
* [MonologServiceProvider](http://silex.sensiolabs.org/doc/providers/monolog.html)
* [TwigServiceProvider](http://silex.sensiolabs.org/doc/providers/twig.html)
* [FormServiceProvider](http://silex.sensiolabs.org/doc/providers/form.html)
* [DoctrineServiceProvider](http://silex.sensiolabs.org/doc/providers/doctrine.html)

Licence
-----------------

This code is released under GPL licence. Free for use.

Contributors
-----------------
* @emgiezet
[![endorse](http://api.coderwall.com/emgiezet/endorsecount.png)](http://coderwall.com/emgiezet)
