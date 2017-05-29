<?php

use cb_wp_nonce_test\creator\CB_WP_Nonces_Creator as CBCreator;
use cb_wp_nonce_test\validator\CB_WP_Nonces_Validator as CBValidator;

class CB_WP_Vaidator_Test extends WP_UnitTestCase {

    private $def_url = 'http://google.de';
    private $def_action = 'dev_action';
    private $def_nonce_name = 'nonce';
    private $def_ref = 'reference';

    /**
     * test for validate_url
     */
    function test_validate_url(){
        $creator = new CBCreator( $this->def_url, $this->def_action, $this->def_nonce_name );
        $validator = new CBValidator( $creator->get_nonce_url(), null, $this->def_action, $this->def_nonce_name );
        $this->assertInternalType( 'int', $validator->validate_url() );
    }

    /**
     * test_validate
     */
    function test_validate(){
        $creator = new CBCreator( $this->def_url, $this->def_action, $this->def_nonce_name );
        $validator = new CBValidator( null, $creator->get_simple_nonce(), $this->def_action, $this->def_nonce_name );
        $this->assertInternalType( 'int', $validator->validate() );
    }

    /**
     * test validate_form
     */
    function test_validate_form(){
        $document = new DOMDocument();
        $creator = new CBCreator( $this->def_url, $this->def_action, $this->def_nonce_name, $this->def_ref, false );
        $document->loadHTML( $creator->get_nonce_field() );
        $field = $document->getElementById( $this->def_nonce_name );
        $nonce = $field->getAttribute( 'value' );
        $validator = new CBValidator( null, $nonce, $this->def_action, $this->def_nonce_name );
        $this->assertInternalType( 'int', $validator->validate() );
    }

    /**
     * test validate_admin_referer
     */
    function test_validate_admin_referer(){
        $creator = new CBCreator( $this->def_url, $this->def_action, $this->def_nonce_name );
        $_REQUEST[$this->def_nonce_name] = $creator->get_simple_nonce();
        $validator = new CBValidator( null, null, $this->def_action, $this->def_nonce_name );
        $this->assertInternalType( 'int', $validator->validate_admin_referer() );
    }

    /**
     * validate_ajax_referer
     */
    function test_validate_ajax_referer(){
        $creator = new CBCreator( $this->def_url, $this->def_action, $this->def_nonce_name );
        $_REQUEST[$this->def_nonce_name] = $creator->get_simple_nonce();
        $validator = new CBValidator( null, null, $this->def_action, $this->def_nonce_name );
        $this->assertInternalType( 'int', $validator->validate_ajax_referer() );
    }
}