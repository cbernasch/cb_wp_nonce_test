<?php

namespace cb_wp_nonce_test\creator;

require 'src/Cb-nonces-config.class.php';

use cb_wp_nonce_test\config\CB_WP_Nonces_Config as CBConfig;

/**
 * CB WP Nonces Creator Class
 */
class CB_WP_Nonces_Creator extends CBConfig{

    private $url;
    private $action;
    private $nonce_name;
    private $ref;
    private $echo_state;

    /**
     * Constructor
     *
     * @param null $url
     * @param string $nonce_name
     * @param $action
     * @param $ref
     * @param $echo_state
     */
    public function __construct($url = null, $action = -1, $nonce_name = '_wpnonce', $ref = "ref", $echo_state = true){
        $this->url = $url;
        $this->action = $action;
        $this->nonce_name = $nonce_name;
        $this->ref = $ref;
        $this->echo_state = $echo_state;
    }

    /**
     * Setter for $echo_state
     *
     * @param $echo_state
     */
    public function set_echo_state($echo_state){
        $this->echo_state = $echo_state;
    }

    /**
     * getter for $echo_state
     *
     * @return bool
     */
    public function get_echo_state(){

        return $this->echo_state;
    }

    /**
     * Setter for $ref
     *
     * @param $ref
     */
    public function set_ref($ref){
        $this->ref = $ref;
    }

    /**
     * Getter for $ref
     *
     * @return string
     */
    public function get_ref(){

        return $this->ref;
    }

    /**
     * Setter for $nonce_name
     *
     * @param $nonce_name
     */
    public function set_nonce_name($nonce_name){
        $this->nonce_name = $nonce_name;
    }

    /**
     * Getter for $nonce_name
     *
     * @return string
     */
    public function get_nonce_name(){

        return $this->nonce_name;
    }

    /**
     * Getter for $url
     *
     * @return mixed
     */
    public function get_url(){

        return $this->url;
    }

    /**
     * Setter for $url
     *
     * @param $url
     */
    public function set_url($url){
        $this->url = $url;
    }

    /**
     * Getter for $action
     *
     * @return mixed
     */
    public function get_action(){

        return $this->action;
    }

    /**
     * Setter for $action
     *
     * @param $action
     */
    public function set_action($action){
        $this->action = $action;
    }

    /**
     * Get the url with a nonce
     *
     * @return mixed
     */
    public function get_nonce_url(){
        //TODO cb validation url
        if(!$this->url){

            return false;
        }

        return wp_nonce_url($this->url, $this->action, $this->nonce_name);
    }

    /**
     * Get an hidden nonce_field for a form. And, if set, a referer field
     *
     * @return mixed
     */
    public function get_nonce_field(){

        return wp_nonce_field($this->action, $this->nonce_name, $this->ref, $this->echo_state);
    }

    /**
     * Get a one time nonce
     *
     * @return string
     */
    public function get_simple_nonce(){

        return wp_create_nonce($this->action);
    }
}



