<?php
require_once 'tests/wordpress-tests-lib/includes/functions.php';

function load_required_files() {
    require 'src/class/class-cb-nonces-creator.php';
    require 'src/class/class-cb-nonces-validator.php';
}
tests_add_filter( 'muplugins_loaded', 'load_required_files' );

require_once 'tests/wordpress-tests-lib/includes/bootstrap.php';
?>