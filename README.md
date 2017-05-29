cb_wp_nonce_test
================

* Contributors: cbernasch

Description
-----------

* package for making the nonces Wordpress functionality available in an oop-based way

How to use
------------
 1. add this package to your composer.json

 ```json
 "cbernasch/cb_wp_nonce_test": "1.0.*"
 ```

 and update with your composer

 2. Simply add files to your plugin (require and "use")
 3. To generate a simple nonce, just get a new generator with
 ```php
 $creator = new CB_WP_Nonces_Creator(<your url>, <your action>, <your nonce name>);
 ```
 4. and generate a simple nonce with
 ```
 $your_nonce = $creator->get_simple_nonce()
 ```

Requirements
------------

* PHP 5.4.0 or greater
* Wordpress 2.0.3 or greater

Languages
------------

* english

Changelog
---------
