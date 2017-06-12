<?php

use \cb_wp_nonce_test\creator\CB_WP_Nonces_Creator as CBCreator;

class CB_WP_Creator_Test extends WP_UnitTestCase {

    /**
     * @var $def_url <-- default test url
     */
    private $def_url = 'http://google.de';

    /**
     * @var $def_action <-- default action
     */
    private $def_action = 'dev_action';

    /**
     * @var $def_nonce_name <-- default nonce_name
     */
    private $def_nonce_name = 'nonce';

    /**
     * @var $def_ref <-- default referer
     */
    private $def_ref = 'reference';

    /**
     * @var $def_echo_state <-- default echt state
     */
    private $def_echo_state = true;

    /**
     * test for get_nonce_url
     */
    function test_get_nonce_url() {
        $creator = new CBCreator( $this->def_url, $this->def_action, $this->def_nonce_name );
        $parsed_url = parse_url( $creator->get_nonce_url(), PHP_URL_QUERY );
        parse_str( $parsed_url, $url_params );
        $this->assertTrue( array_key_exists( $this->def_nonce_name, $url_params ) );
    }

    /**
     * test for get_nonce_field
     */
    function test_get_nonce_field(){
        $creator = new CBCreator( $this->def_url, $this->def_action, $this->def_nonce_name );
        $this->assertNotNull( $creator->get_nonce_field($this->def_ref, $this->def_echo_state ) );
    }

    /**
     * test for get_simple_nonce
     */
    function test_get_simple_nonce() {
        $creator = new CBCreator( $this->def_url, $this->def_action, $this->def_nonce_name );
        $this->assertNotNull( $creator->get_simple_nonce() );
    }
}