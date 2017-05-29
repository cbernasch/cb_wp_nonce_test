<?php
require_once 'wordpress-tests-lib/includes/functions.php';

function load_required_files() {
    require 'src/Cb-nonces-creator.class.php';
    require 'src/Cb-nonces-validator.class.php';
}
tests_add_filter( 'muplugins_loaded', 'load_required_files' );

require_once 'wordpress-tests-lib/includes/bootstrap.php';
?>