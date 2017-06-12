<?

namespace cb_wp_nonce_test\nonce_template_view;

/**
 * Class CB WP Nonce Template View
 *
 * @package cbernach/cb_wp_nonce_test
 * @author cbernasch
 * @link https://github.com/cbernasch/cb_wp_nonce_test
 *
 * simple template engine
 */

class CB_WP_Nonce_Template_View {

    /**
     * @var $path <-- path to template / default: views/404
     */
    private $path = 'views/404';

    /**
     * @var $_params <-- array of variables that should be inserted into the template
     */
    private $_params = array();

    public function __construct($path = 'views/404') {
        $this->path = $path;
    }
    /**
     * assigns values to keys
     *
     * @param $key
     * @param $value
     */
    public function assign( $key, $value ) {
        $this->_params[$key] = $value;
    }


    /**
     * getter for the path of the template
     *
     * @return string <-- path of the template
     */
    public function get_path() {

        return $this->path;
    }

    /**
     * @param $path <-- new path for the template / default: views/404
     */
    public function set_path( $path = 'view/404' ) {
        $this->path = $path;
    }

    /**
     * Checks if Template exists, if it exists, returns rendered view
     *
     * @return string <-- the rendered template
     */
    public function render() {
        $file = $this->path . '.phtml';
        if( file_exists( $file ) ) {
            ob_start();
            include $file;
            $output = ob_get_contents();
            ob_end_clean();

            return $output;
        }
        else {

            return 'no template file found';
        }
    }
}