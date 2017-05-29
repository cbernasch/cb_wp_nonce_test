<?php
namespace cb_wp_nonce_test\validator;

/**
 * CB WP Nonces Validator Class
 *
 * @package cbernach/cb_wp_nonce_test
 * @author cbernasch
 * @link https://github.com/cbernasch/cb_wp_nonce_test
 */

class CB_WP_Nonces_Validator{

    private $nonce_name;
    private $action;
    private $nonce;
    private $url;
    private $die_param;

    /**
     * Constructor
     *
     * @param null $url
     * @param string $nonce_name
     * @param $action
     * @param string $nonce
     * @param bool $die_param
     */
    public function __construct($url = null, $nonce = null, $action = -1, $nonce_name = '', $die_param = false){
        $this->url = $url;
        $this->action = $action;
        $this->nonce_name = $nonce_name;
        $this->nonce = $nonce;
        $this->die_param = false;
    }

    /**
     * setter for $die_param
     *
     * @param $die_param
     */
    function set_die($die_param){
        $this->die_param = $die_param;
    }

    /**
     * Getter for $die_param
     *
     * @return bool
     */
    function get_die(){

        return $this->die_param;
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

        return wp_verify_nonce($url_params[$this->nonce_name], $this->action);
    }

    /**
     * Check if nonce is valid or request comes from admin-content
     *
     * @return false|int
     */
    public function validate_admin_referer(){

        return check_admin_referer($this->action, $this->nonce_name);
    }

    /**
     * Validates AJAX requests, script will not stop if $die_param is false (default here = false)
     *
     * @return false|int
     */
    public function validate_ajax_referer(){

        return check_ajax_referer($this->action, $this->nonce_name, $this->die_param);
    }

}



