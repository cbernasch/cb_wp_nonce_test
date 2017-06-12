<?php

namespace cb_wp_nonce_test\database;

/**
 * CB WP Nonces Database PDO Class
 *
 * @package cbernach/cb_wp_nonce_test
 * @author cbernasch
 * @link https://github.com/cbernasch/cb_wp_nonce_test
 */

class CB_WP_Nonce_DB_PDO {

    /**
     * @var $host <-- database host
     */
    private $host = 'dbhost';

    /**
     * @var $user <-- database user
     */
    private $user = 'dbuser';

    /**
     * @var $pass <-- database password
     */
    private $pass = 'dbpass';

    /**
     * @var $dbname <-- database name
     */
    private $dbname = 'dbname';

    /**
     * @var $dbh <-- pdo
     */
    private $dbh;

    /**
     * @var $error <-- error vaiable
     */
    private $error;

    /**
     * @var $stmt <-- Statement
     */
    private $stmt;

    /**
     * Constructor
     */
    public function __construct() {
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->dbh = new PDO( 'mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user,
                $this->pass, $options );
        }
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    /**
     * outputs a quoted string
     *
     * @param $str <-- Input string
     *
     * @return string <-- Output quoted string
     */
    public function quote( $str ) {

        return $this->dbh->quote( $str );
    }

    /**
     * Prepared the query
     *
     * @param $query
     */
    public function query( $query ) {
        $this->stmt = $this->dbh->prepare( $query );
    }

    /**
     * Execute the query
     *
     * @return mixed
     */
    public function execute() {

        return $this->stmt->execute();
    }

    /**
     * Execute the query and return all results as an array
     *
     * @return mixed
     */
    public function getAll() {
        $this->execute();

        return $this->stmt->fetchAll( PDO::FETCH_ASSOC );
    }

    /**
     * Execute the query and return first result as an array
     *
     * @return mixed
     */
    public function getSingle() {
        $this->execute();

        return $this->stmt->fetch( PDO::FETCH_ASSOC );
    }

    /**
     * Bind parameters/values to the query
     *
     * @param $param <-- parameter
     * @param $value <-- value of the parameter
     * @param null $type
     */
    public function bind( $param, $value, $type = null ) {
        if( is_null( $type ) ) {
            switch( true ) {
                case is_int( $type ):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool( $type ):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null( $type ):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue( $param, $value, $type );
    }

    /**
     * return the last inserted ID or the last value
     * @return mixed
     */
    public function lastInsertID() {

        return $this->dbh->lastInsertId();
    }

    /**
     * returns the number of the affected rows
     *
     * @return mixed
     */
    public function rowCount() {

        return $this->stmt->rowCount();
    }
}