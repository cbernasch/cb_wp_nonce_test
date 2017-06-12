<?php

namespace cb_wp_nonce_test\config;

/**
 * CB WP Nonces Config Class
 *
 * @package cbernach/cb_wp_nonce_test
 * @author cbernasch
 * @link https://github.com/cbernasch/cb_wp_nonce_test
 */

class CB_WP_Nonces_Config {

    /**
     * @var $lifetime_nonce <-- lifetime of the nonce 86400 seconds (1 day) is Wordpress default
     */
    private $lifetime_nonce;

    /**
     * Constructor
     *
     * @param int $lifetime_nonce
     */
    public function __construct( $lifetime_nonce = 86400 ) {
        $this->lifetime_nonce = $lifetime_nonce;
    }


    /**
     * Get the lifetime of the nonce
     *
     * @return int <-- return the lifetime of the nonce in seconds
     */
    public function get_lifetime_nonce() {

        return $this->lifetime_nonce;
    }

    /**
     * Set the lifetime of a nonce
     *
     * @param int $lifetime_nonce (in seconds)
     */
    public function set_lifetime_nonce( $lifetime_nonce ) {
        $this->lifetime_nonce = $lifetime_nonce;
    }

    /**
     * Add nonce_life filter to WP to set the new lifetime
     */
    public function set_lifetime_filter() {
        add_filter( 'nonce_life', $this->lifetime_nonce );
    }
}