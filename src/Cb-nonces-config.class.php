<?php
namespace cbernasch\cb_wp_nonce_test\config;

/**
 * CB WP Nonces Config Class
 *
 * @package cbernasch\cb_wp_nonce_test
 * @author cbernasch
 * @link https://github.com/cbernasch/cb_wp_nonce_test
 */

class CB_WP_Nonces_Config{

    private $lifetime_nonce;

    /**
     * Constructor
     *
     * @param int $lifetime_nonce
     */
    public function __construct($lifetime_nonce = 86400){
        $this->lifetime_nonce = $lifetime_nonce;
    }

    /**
     * Get the lifetime of the nonce
     *
     * @return int
     */
    public function get_lifetime(){

        return $this->lifetime_nonce;
    }

    //86400 seconds (1day default)
    /**
     * Set the lifetime of a nonce
     *
     * @param int $lifetime_nonce (in seconds)
     */
    public function set_lifetime($lifetime_nonce){
        $this->lifetime_nonce = $lifetime_nonce;
    }

    /**
     * Add nonce_life filter to WP
     */
    public function set_lifetime_filter(){
        add_filter('nonce_life', $this->lifetime_nonce);
    }
}