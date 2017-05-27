<?php

namespace cbernasch\cb_wp_nonce_test\creator;
use cbernasch\cb_wp_nonce_test\config\CB_WP_Nonces_Config;

/**
 * CB WP Nonces Creator Class
 */
class CB_WP_Nonces_Creator extends CB_WP_Nonces_Config{

    private $url;
    private $action;

    /**
     * Constructor
     *
     * @param null $url
     * @param string $nonce_name
     * @param $action
     */
    public function __construct($url = null, $action = -1, $nonce_name = '_wpnonce'){
        $this->url = $url;
        $this->action = $action;
        $this->nonce_name = $nonce_name;
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
     * @param string $ref
     * @param bool $echo
     *
     * @return mixed
     */
    public function get_nonce_field($ref = "ref", $echo = true){

        return wp_nonce_field($this->action, $this->nonce_name, $ref, $echo);
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



