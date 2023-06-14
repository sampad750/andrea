<?php
/**
 * Andrea theme helper functions and resources
 */

class Andrea_Helper_Class {
    /**
	 * Hold an instance of Andrea_Helper_Class class.
	 * @var Andrea_Helper_Class
	 */
	protected static $instance = null;

	/**
	 * Main Andrea_Helper_Class instance.
	 * @return Andrea_Helper_Class - Main instance.
	 */
	public static function instance() {

		if (null == self::$instance) {
			self::$instance = new Andrea_Helper_Class();
		}

		return self::$instance;
	}

    // Get comment count text
    function comment_count( $post_id ) {
        $comments_number = get_comments_number($post_id);
        if ( $comments_number == 0) {
            $comment_text = esc_html__( 'No Comment', 'andrea' );
        } elseif( $comments_number == 1) {
            $comment_text = esc_html__( '1 Comment', 'andrea' );
        } elseif( $comments_number > 1) {
            $comment_text = $comments_number.esc_html__( ' Comments', 'andrea' );
        }
        echo esc_html($comment_text);
    }


}


/**
 * Instance of Andrea_Helper_Class class
 */
function Andrea_helper() {
    return Andrea_Helper_Class::instance();
}