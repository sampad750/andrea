<?php

namespace Andrea\WpWidgets;

use WP_Widget;

// Newsletter
class Andrea_Newsletter extends WP_Widget {
    
	public function __construct() { // 'Newsletter' Widget Defined
		parent::__construct( 'andrea_newsletter', esc_html__( '(Andrea) Newsletter', 'andrea' ), array(
			'description' => esc_html__( 'Newsletter with social links.', 'andrea' ),
			'classname'   => 'andrea_newsletter'
		) );
	}

	// Front End
	public function widget( $args, $instance ) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title        = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Newsletter', 'sefu-core' );
		$action_url   = ( ! empty( $instance['action_url'] ) ) ? $instance['action_url'] : '';
		$social_links = ( ! empty( $instance['social_links'] ) ) ? $instance['social_links'] : '';
        $theme_btn    = ( ! empty( $instance['theme_btn'] ) ) ? $instance['theme_btn'] : esc_html__( 'Subscribe', 'sefu-core' );
        $memail       = ( ! empty( $instance['memail'] ) ) ? $instance['memail'] : esc_html__( 'Email address', 'sefu-core' );


		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		?>

        <div class="foter-subscribe">
            <form action="#" class=" mailchimp subscribe-form" method="post">
                <input type="email" name="email" id="email" class="memail" placeholder="<?php echo esc_attr__($memail,'sefu-core'); ?>">
                <button class="theme_btn" type="submit">
                    <?php echo esc_html__($theme_btn, 'sefu-core'); ?>
                </button>
            </form>
            <p class="mchimp-errmessage" style="display: none;"></p>
            <p class="mchimp-sucmessage" style="display: none;"></p>
        </div>

		<?php
		if ( $social_links == 'show' ) : ?>

            <div class="footer-social mt-30 mb-30">
				<?php //Sefu_helper()->social_links(); ?>
            </div>

		<?php endif; ?>

        <script>
            (function ($) {

                $(document).ready(function () {

                    $(".mailchimp").ajaxChimp({
                        callback: mailchimpCallback,
                        url:
                            "<?php echo esc_js( $action_url ) ?>", //Replace this with your own mailchimp post URL. Don't remove the "". Just paste the url inside "".
                    });
                    $(".memail").on("focus", function () {
                        $(".mchimp-errmessage").fadeOut();
                        $(".mchimp-sucmessage").fadeOut();
                    });
                    $(".memail").on("keydown", function () {
                        $(".mchimp-errmessage").fadeOut();
                        $(".mchimp-sucmessage").fadeOut();
                    });
                    $(".memail").on("click", function () {
                        $(".memail").val("");
                    });

                    function mailchimpCallback(resp) {
                        if (resp.result === "success") {
                            $(".mchimp-errmessage").html(resp.msg).fadeIn(1000);
                            $(".mchimp-sucmessage").fadeOut(500);
                        } else if (resp.result === "error") {
                            $(".mchimp-errmessage").html(resp.msg).fadeIn(1000);
                        }
                    }
                });
            })(jQuery)
        </script>

		<?php
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title        = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$action_url   = isset( $instance['action_url'] ) ? esc_attr( $instance['action_url'] ) : '';
		$social_links = isset( $instance['social_links'] ) ? esc_attr( $instance['social_links'] ) : '';
        $theme_btn    = isset( $instance['theme_btn'] ) ? esc_attr( $instance['theme_btn'] ) : '';
        $memail      = isset( $instance['$memail'] ) ? esc_attr( $instance['$memail'] ) : '';

		?>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'sefu-core' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"/>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'action_url' ) ); ?>"><?php echo esc_html__( 'Enter the Action URL here:', 'sefu-core' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'action_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'action_url' ) ); ?>" type="text" value="<?php echo esc_attr( $action_url ); ?>"/>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'memail' ) ); ?>"><?php echo esc_html__( 'Enter the Email address here:', 'sefu-core' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'memail' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'memail' ) ); ?>" type="text" value="<?php echo esc_attr( $action_url ); ?>"/>
        </p>

        <p> 
            <label for="<?php echo esc_attr( $this->get_field_id( 'theme_btn' ) ); ?>"><?php echo esc_html__( 'Enter the Button text here:', 'sefu-core' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'theme_btn' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'theme_btn' ) ); ?>" type="text" value="<?php echo esc_attr( $theme_btn ); ?>"/>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'social_links' ) ); ?>"><?php echo esc_html__( 'Social Links:', 'sefu-core' ); ?></label>
            <select class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'social_links' ) ); ?>">
                <option value="show" <?php selected( $social_links, 'show' ); ?> >
                    <?php echo esc_html__('Show', 'sefu-core'); ?>
                </option>
                <option value="hide" <?php selected( $social_links, 'hide' ); ?> >
                    <?php echo esc_html__('Hide', 'sefu-core'); ?>
                </option>
            </select>
        </p>

		<?php
	}

	// Update Data
	public function update( $new_instance, $old_instance ) {
		$instance                 = $old_instance;
		$instance['title']        = sanitize_text_field( $new_instance['title'] );
		$instance['action_url']   = sanitize_text_field( $new_instance['action_url'] );
		$instance['social_links'] = sanitize_text_field( $new_instance['social_links'] );
		$instance['theme_btn']    = sanitize_text_field( $new_instance['theme_btn'] );
        $instance['memail']       = sanitize_text_field( $new_instance['memail'] );
        return $instance;
	}
}