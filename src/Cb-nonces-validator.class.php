<?php
namespace cb_wp_nonce_test\validator;

/**
 * CB WP Nonces Validator Class
 */

class CB_WP_Nonces_Validator{

    private $nonce_name;
    private $action;
    private $nonce;
    private $url;


    /**
     * Constructor
     *
     * @param null $url
     * @param string $nonce_name
     * @param $action
     * @param string $nonce
     */
    public function __construct($url = null, $nonce = null, $action = -1, $nonce_name = ''){
        $this->url = $url;
        $this->action = $action;
        $this->nonce_name = $nonce_name;
        $this->nonce = $nonce;
    }

    /**
     * Setter for $nonce
     *
     * @param $nonce
     */
    public function set_nonce($nonce){
        $this->nonce = $nonce;
    }

    /**
     * Getter for $nonce
     *
     * @return null|string
     */
    public function get_nonce(){

        return $this->nonce;
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
     * Validates a nonce
     *
     * @return mixed
     */
    public function validate(){

        return wp_verify_nonce($this->nonce, $this->action);
    }

    /**
     * Validates a nonce in an url
     *
     * @return mixed
     */
    public function validate_url(){
        //todo cb validate nonce_name
        //get query from url
        $parsed_url = parse_url($this->url, PHP_URL_QUERY);
        //string to array
        parse_str($parsed_url, $url_params);

        return $this->validate($url_params[$this->nonce_name], $this->action);
    }

}



