<?php
namespace cbernasch\cb_wp_nonce_test\creator;

/**
 * CB WP Nonces Creator Class
 */

class CB_WP_Nonces_Creator{

    private $url;
    private $action;

    /**
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
     * @return mixed
     */
    public function get_url(){

        return $this->url;
    }

    /**
     * @param $url
     */
    public function set_url($url){
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function get_action(){

        return $this->action;
    }

    /**
     * @param $action
     */
    public function set_action($action){
        $this->action = $action;
    }

    public function get_nonce_url(){
        //TODO cb validation url
        if(!$this->url){

            return false;
        }

        return wp_nonce_url($this->url, $this->action, $this->nonce_name);
    }
}



