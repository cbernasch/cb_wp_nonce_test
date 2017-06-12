<?php

namespace cb_wp_nonce_test\nonce_interface;

/**
 * CB WP Nonces Interface
 *
 * @package cbernach/cb_wp_nonce_test
 * @author cbernasch
 * @link https://github.com/cbernasch/cb_wp_nonce_test
 */

interface CB_WP_Nonces_Interface {

    /**
     * Get the name of the nonce
     *
     * @return mixed
     */
    public function get_nonce_name();

    /**
     * Sets the name of the nonce
     *
     * @param $nonce <-- the name of the nonce
     */
    public function set_nonce_name( $nonce );

    /**
     * get the action
     *
     * @return mixed
     */
    public function get_action();

    /**
     * Sets the action of the nonce
     *
     * @param $action <-- action of the nonce
     */
    public function set_action( $action );

    /**
     * Get the url
     *
     * @return mixed
     */
    public function get_url();

    /**
     * set the url
     *
     * @param $url <-- url with nonce (validator) or url to add nonce (creator)
     */
    public function set_url( $url );
}