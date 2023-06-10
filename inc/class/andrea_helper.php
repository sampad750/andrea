<?php
/**
 * Docy theme helper functions and resources
 */

class Docy_Helper_Class {
    /**
	 * Hold an instance of Docy_Helper_Class class.
	 * @var Docy_Helper_Class
	 */
	protected static $instance = null;

	/**
	 * Main Docy_Helper_Class instance.
	 * @return Docy_Helper_Class - Main instance.
	 */
	public static function instance() {

		if (null == self::$instance) {
			self::$instance = new Docy_Helper_Class();
		}

		return self::$instance;
	}

    /**
     * Limit latter
    * @param $string
    * @param $limit_length
    * @param string $suffix
     */
    function limit_latter($string, $limit_length, $suffix = '...' ) {
        if (strlen($string) > $limit_length) {
            echo strip_shortcodes(substr($string, 0, $limit_length) . $suffix);
        }
        else {
            echo strip_shortcodes(esc_html($string));
        }
    }


}


/**
 * Instance of Docy_Helper_Class class
 */
function Docy_helper() {
    return Docy_Helper_Class::instance();
}