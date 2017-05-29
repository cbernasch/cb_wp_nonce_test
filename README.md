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
and add the repository, too

 ```json
   "repositories": [
          {
              "type": "vcs",
              "url": "https://github.com/cbernasch/cb_wp_nonce_test"
          }
      ]
 ```

 update with your composer afterwards.

 2. Simply add files to your plugin (require and "use") / for generation use Cb_nonces_creator.class.php, for validating use Cb_nonce_validator.class.php
 3. To generate a simple nonce, just get a new generator with
 ```php
 $creator = new CB_WP_Nonces_Creator(<your url>, <your action>, <your nonce name>);
 ```
 4. and generate a simple nonce with
 ```
 $your_nonce = $creator->get_simple_nonce()
 ```
 5. Et viola, u got your simple nonce.

 6. For validating this nonce, u just get a new validator
  ```php
  $validator = new CB_WP_Nonces_Validator(<your url to validate>,
  <your nonce to validate>, <your action>, <your nonce name>);
  ```
 7. You just need "your url to validate" or "your nonce to validate". For this example set NULL to "your url to validate" and the nonce u created earlier to "your nonce to validate"
 8. Now add
  ```php
        $validator->validate()
   ```
   to validate the nonce. The result should be an int value, to show you, in which tick phase you are. For this example int(1). If the return is false, the nonce was not valid.


Requirements
------------

* PHP 5.4.0 or greater
* Wordpress 2.0.3 or greater

Languages
------------

* english

License
-------

Changelog
---------
