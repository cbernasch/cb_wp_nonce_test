<?php
require_once 'tests/wordpress-tests-lib/includes/functions.php';

function load_required_files() {
    require 'src/classes/class-cb-nonces-creator.php';
    require 'src/classes/class-cb-nonces-validator.php';
}
tests_add_filter( 'muplugins_loaded', 'load_required_files' );

require_once 'tests/wordpress-tests-lib/includes/bootstrap.php';
?>