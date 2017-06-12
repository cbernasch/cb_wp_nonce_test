<?

namespace cb_wp_nonce_test\nonce_model;

require 'src/libs/class-cb-nonces-db-pdo.php';

use cb_wp_nonce_test\database\CB_WP_Nonce_DB_PDO as CBWPDatabasePDO;

/**
 * Class CB WP Nonces Model
 *
 * @package cbernach/cb_wp_nonce_test
 * @author cbernasch
 * @link https://github.com/cbernasch/cb_wp_nonce_test
 *
 * data access
 */
class CB_WP_Nonces_Model {

    /**
     * @var $db <-- DB Conntector
     */
    private $db;

    /**
     * Constructor
     */
    public function __construct() {
        $this->db = new CBWPDatabasePDO();
    }

    /**
     * Demo for getting all user from "users"-table
     *
     * @return mixed <-- all users
     */
    public function demo_get_all_user() {
        $this->db->query( 'SELECT * FROM users' );

        return $this->db->getAll();
    }

    /**
     * Demo for getting a specific user from the "users"-table with the associated userid
     *
     * @param $uid <-- userid
     *
     * @return mixed <-- the user associated with the userid
     */
    public function demo_get_user_by_uid($uid) {
        $this->db->query( 'SELECT * FROM users WHERE uid = :uid' );
        $this->db->bind( ':uid', $uid );

        return $this->db->getSingle();
    }
}
