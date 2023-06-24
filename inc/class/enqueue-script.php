<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * @class        Andrea_Enqueue_Script
 * @version      1.0
 * @category     Class
 * @author       Sampad Debnath
 */
class Andrea_Enqueue_Script {

    public $settings;
    protected static $instance = null;
    private $gtdu;
    private $use_minify;

    public static function instance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    /**
     * Register Google fonts.
     *
     * @return string Google fonts URL for the theme.
     */
    public function andrea_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = '';
    
        /* Body font */
        if ( 'off' !== 'on' ) {
            $fonts[] = "Roboto:300,400,500,600,700";
        }
    
        $is_ssl = is_ssl() ? 'https' : 'http';
    
        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), "$is_ssl://fonts.googleapis.com/css" );
        }
    
        return $fonts_url;
    }

    /**
     * Return the Google font stylesheet URL if available.
     *
     * The use of Libre Franklin by default is localized. For languages that use
     * characters not supported by the font, the font can be disabled.
     *
     * @return string Font stylesheet or empty string if disabled.
     * @since hostim 1.2
     *
     */

    public function register_script() {
        $this->gtdu = get_template_directory_uri();
        
        
        // Register action
        add_action('wp_enqueue_scripts', array($this, 'css_reg'));
        add_action('wp_enqueue_scripts', array($this, 'js_reg'));
    }

    /* Register CSS */
    public function css_reg() {

        wp_enqueue_style('open-iconic', $this->gtdu . '/assets/css/open-iconic-bootstrap.min.css');
        wp_enqueue_style('animate', $this->gtdu . '/assets/css/animate.css');
        wp_enqueue_style('owl-carousel', $this->gtdu . '/assets/css/owl.carousel.min.css');
        wp_enqueue_style('owl-theme', $this->gtdu . '/assets/css/owl.theme.default.min.css');
        wp_enqueue_style('magnific-popup', $this->gtdu . '/assets/css/magnific-popup.css');
        wp_enqueue_style('aos', $this->gtdu . '/assets/css/aos.css');
        wp_enqueue_style('ionicons', $this->gtdu . '/assets/css/ionicons.min.css');
        wp_enqueue_style('datepicker', $this->gtdu . '/assets/css/bootstrap-datepicker.css');
        wp_enqueue_style('timepicker', $this->gtdu . '/assets/css/jquery.timepicker.css');
        wp_enqueue_style('flaticon', $this->gtdu . '/assets/css/flaticon.css');
        wp_enqueue_style('icomoon', $this->gtdu . '/assets/css/icomoon.css');
        wp_enqueue_style('wpd-style', $this->gtdu . '/assets/css/wpd-style.css');
        wp_enqueue_style('theme-style', $this->gtdu . '/assets/css/style.css');

        wp_enqueue_style('andrea-root', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

    }

    /* Register JS */
    public function js_reg() {

        

        wp_enqueue_script( 'popper', $this->gtdu . '/assets/js/popper.min.js', array( 'jquery' ), '3.0.1', true );
        wp_enqueue_script( 'bootstrap', $this->gtdu . '/assets/js/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );
        // wp_enqueue_script( 'jquery-easing', $this->gtdu . '/assets/js/jquery.easing.1.3.js', array( 'jquery' ), '4.3.1', true );
        wp_enqueue_script( 'jquery-waypoints', $this->gtdu . '/assets/js/jquery.waypoints.min.js', array( 'jquery' ), '4.3.1', true );
        // wp_enqueue_script( 'jquery-stellar', $this->gtdu . '/assets/js/jquery.stellar.min.js', array( 'jquery' ), '4.3.1', true );
       
        // wp_enqueue_script( 'owl-carousel', $this->gtdu . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '4.3.1', true );

        // wp_enqueue_script( 'magnific-popup', $this->gtdu . '/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), '4.3.1', true );

        // wp_enqueue_script( 'aos', $this->gtdu . '/assets/js/aos.js', array( 'jquery' ), '4.3.1', true );

        // wp_enqueue_script( 'animateNumber', $this->gtdu . '/assets/js/jquery.animateNumber.min.js', array( 'jquery' ), '4.3.1', true );

        // wp_enqueue_script( 'scrollax', $this->gtdu . '/assets/js/scrollax.min.js', array( 'jquery' ), '4.3.1', true );
        
        // wp_enqueue_script( 'googleapis', "https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false", array( 'jquery' ), '4.3.1', true );
        // wp_enqueue_script( 'google-map', $this->gtdu . '/assets/js/google-map.js', array( 'jquery' ), '4.3.1', true );

        wp_enqueue_script( 'ajax-chimp', $this->gtdu . '/assets/js/ajax-chimp.js', array( 'jquery' ), '1.0', true );
        wp_enqueue_script( 'theme-js', $this->gtdu . '/assets/js/main.js', array( 'jquery' ), '4.3.1', true );


        //Comment Reply
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
 


        wp_enqueue_script('jquery');

        // Localize the script with custom data
        wp_localize_script( 'theme-js', 'andrea_script', array(
            'ajaxurl'       => admin_url('admin-ajax.php'),
            'current_user'  => get_current_user_id(),
        ) );
    }



}

if (!function_exists('andrea_enqueue_script')) {
    function andrea_enqueue_script() {
        return Andrea_Enqueue_Script::instance();
    }
}

andrea_enqueue_script()->register_script();