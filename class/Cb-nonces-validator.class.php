<?php
namespace cbernasch\cb_wp_nonce_test\validator;

/**
 * CB WP Nonces Validator Class
 */

class CB_WP_Nonces_Validator{

    /**
     * Validates a nonce
     *
     * @param $nonce
     * @param $action
     *
     * @return mixed
     */
    public function validate($nonce, $action = -1 ){

        return wp_verify_nonce($nonce, $action);
    }

    /**
     * Validates a nonce in an url
     *
     * @param $url
     * @param $action
     * @param $nonce_name
     *
     * @return mixed
     */
    public function validate_url($url, $action = -1, $nonce_name){
        //get query from url
        $query = parse_url($url, PHP_URL_QUERY);
        //string to array
        parse_str($query, $url_params);

        return $this->validate($url_params[$nonce_name], $action);
    }

}



