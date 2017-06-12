<?

namespace cb_wp_nonce_test\nonce_controller;

require '../model/model-cb-nonce.php';
require '../class/class-cb-nonces-creator.php';
require '../class/class-cb-nonces-validator.php';
require '../interfaces/interface-cb-nonces.php';
require '../models/model-cb-nonce.php';

use cb_wp_nonce_test\nonce_interface\CB_WP_Nonces_Interface;
use cb_wp_nonce_test\nonce_model\CB_WP_Nonces_Model as CBWPModel;
use cb_wp_nonce_test\creator\CB_WP_Nonces_Creator as CBWPCreator;
use cb_wp_nonce_test\validator\CB_WP_Nonces_Validator as CBWPValidator;
use cb_wp_nonce_test\nonce_interface\CB_WP_Nonces_Interface as CBWPInterface;

/**
 * Class CB_WP_Nonces_Controller
 *
 * @package cbernach/cb_wp_nonce_test
 * @author cbernasch
 * @link https://github.com/cbernasch/cb_wp_nonce_test
 *
 * handle request, process data or return views
 */
class CB_WP_Nonces_Controller{

    /**
     * @var $cb_wp_nonce_model <-- Model of the package / demo purpose
     */
    private $cb_wp_nonce_model;
    private $cb_wp_interface;

    /**
     * Constructor for CP WP Nonces Controller
     */
    public function __construct() {
        $this->cb_wp_nonce_model = new CBWPModel();
    }

    /**
     * Demo for getting a nonce
     *
     * @return string
     */
    public function demo_create_simple() {
        $creator = new CBWPCreator( null, -1, 'testNonce' );

        return $creator->get_simple_nonce();
    }

    /**
     * Demo for validating a simple nonce
     *
     * @param $nonce
     * @param $action <-- wordpress default -1
     *
     * @return bool
     */
    public function demo_is_nonce_valid( $nonce = null, $action = -1 ) {
        if( $nonce != null ) {
            $validator = new CBWPValidator( null, $nonce, $action);

            return is_int($validator->validate());
        }
        else {

            return false;
        }
    }

    /**
     * Demo for getting all Users from the "users"-table
     *
     * @return mixed <-- all users as an array
     */
    public function demo_get_all_users() {

        return $this->cb_wp_nonce_model->demo_get_all_user();
    }

    /**
     * Demo for getting a specific user from the "users"-table with the associated userid
     *
     * @param $uid <-- userid
     * @return mixed <-- specific user as an array
     */
    public function demo_get_user_by_uid($uid) {

        return $this->cb_wp_nonce_model->demo_get_user_by_uid( $uid );
    }

    public function demo_get_and_set_nonce_name(CB_WP_Nonces_Interface $nonces_interface) {
        $creator = new CBWPCreator( null, -1, 'testNonce' );
        $nonces_interface->get_nonce_name();

    }
}