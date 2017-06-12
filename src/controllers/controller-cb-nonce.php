<?

namespace cb_wp_nonce_test\nonce_controller;

require '../config/config-cb-nonce-global.php';
require '../classes/class-cb-nonces-creator.php';
require '../classes/class-cb-nonces-validator.php';
require '../models/model-cb-nonce.php';
require '../classes/class-cb-nonces-template-view.php';
require '../interfaces/interface-cb-nonces.php';


use cb_wp_nonce_test\creator\CB_WP_Nonces_Creator;
use cb_wp_nonce_test\nonce_interface\CB_WP_Nonces_Interface as CBWPInterface;
use cb_wp_nonce_test\nonce_model\CB_WP_Nonces_Model as CBWPModel;
use cb_wp_nonce_test\creator\CB_WP_Nonces_Creator as CBWPCreator;
use cb_wp_nonce_test\validator\CB_WP_Nonces_Validator as CBWPValidator;
use cb_wp_nonce_test\nonce_template_view\CB_WP_Nonce_Template_View as CBWPTemplateView;

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

    /**
     * @var $cb_wp_nonce_view <-- some view, default views/404.phtml
     */
    private $cb_wp_nonce_view;

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

            return is_int( $validator->validate() );
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

    /**
     * Demo for getting the nonce name from validator or creator
     *
     * @param CBWPInterface $interface <-- creator or validator
     *
     * @return mixed <-- returns the nonce name
     */
    private function demo_get_nonce_name( CBWPInterface $interface ) {

        return $interface->get_nonce_name();
    }

    /**
     * Demo for setting the nonce name from validator or creator
     *
     * @param CBWPInterface $interface <-- creator or validator
     * @param $nonce_name <-- the nonce name
     */
    private function demo_set_nonce_name( CBWPInterface $interface, $nonce_name ) {
        $interface->set_nonce_name($nonce_name);
    }

    /**
     * Demo: example for getting the nonce_name from the creator
     *
     * @return mixed <-- returns the nonce name
     */
    public function demo_use_get_nonce_name() {

        return $this->demo_get_nonce_name( new CB_WP_Nonces_Creator() );
    }

    /**
     * Demo: example for setting the nonce_name for the creator
     *
     * @param $nonce_name <-- the nonce name
     */
    public function demo_use_set_nonce_name( $nonce_name) {
        $this->demo_set_nonce_name( new CB_WP_Nonces_Creator() , $nonce_name );
    }

    /**
     * Demo: example for render and output the default view (404 page) with 1 parameter (testmessage)
     *
     * @return string <-- rendered 404 Page
     */
    public function demo_get_error_page(){
        $this->cb_wp_nonce_view = new CBWPTemplateView();
        $this->cb_wp_nonce_view->assign( 'testmessage', 'This is a test message for the 404 page' );

        return $this->cb_wp_nonce_view->render();
    }
}