<?php
require_once 'wordpress-tests-lib/includes/functions.php';

function load_required_files() {
    require 'src/class-cb-nonces-creator.php';
    require 'src/class-cb-nonces-validator.php';
}
tests_add_filter( 'muplugins_loaded', 'load_required_files' );

require_once 'wordpress-tests-lib/includes/bootstrap.php';
?>