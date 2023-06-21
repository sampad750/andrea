<?php

namespace Andrea\WpWidgets;

use WP_Widget;

// Newsletter
class Andrea_Newsletter extends WP_Widget
{

    public function __construct()
    { // 'Newsletter' Widget Defined
        parent::__construct('andrea_newsletter', esc_html__('(Andrea) Newsletter', 'andrea'), array(
            'description' => esc_html__('Newsletter with social links.', 'andrea'),
            'classname'   => 'andrea_newsletter'
        ));
    }

    // Front End
    public function widget($args, $instance)
    {

        $title        = (!empty($instance['title'])) ? $instance['title'] : esc_html__('Newsletter', 'andrea');
        $desc        = (!empty($instance['desc'])) ? $instance['desc'] : esc_html__('Far far away, behind the word mountains, far from the countries Vokalia', 'andrea');
        
        $action_url   = (!empty($instance['action_url'])) ? $instance['action_url'] : '';
        $theme_btn    = (!empty($instance['theme_btn'])) ? $instance['theme_btn'] : esc_html__('Subscribe', 'andrea');
        $memail       = (!empty($instance['memail'])) ? $instance['memail'] : esc_html__('Email address', 'andrea');


        echo $args['before_widget'];
?>

        <div class="sidebar-box subs-wrap img py-4" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/bg_1.jpg);">
            <div class="overlay"></div>
            <?php if ($title) {
                echo $args['before_title'] . $title . $args['after_title'];
            } ?>
            <p class="mb-4"><?php echo $desc; ?></p>
            <form  class="mailchimp subscribe-form" method="post">
                <div class="form-group">
                    <input type="email" name="email" id="email" class="memail form-control" placeholder="<?php echo esc_attr__($memail, 'andrea'); ?>">
                    <button class="theme_btn mt-2 btn btn-white submit" type="submit">
                        <?php echo esc_html__($theme_btn, 'sefu-core'); ?>
                    </button>
                </div>
            </form>
            <p class="mchimp-errmessage" style="display: none;"></p>
            <p class="mchimp-sucmessage" style="display: none;"></p>
        </div>

        <script>
            (function($) {

                $(document).ready(function() {

                    $(".mailchimp").ajaxChimp({
                        callback: mailchimpCallback,
                        url: "<?php echo esc_js($action_url) ?>", //Replace this with your own mailchimp post URL. Don't remove the "". Just paste the url inside "".
                    });
                    $(".memail").on("focus", function() {
                        $(".mchimp-errmessage").fadeOut();
                        $(".mchimp-sucmessage").fadeOut();
                    });
                    $(".memail").on("keydown", function() {
                        $(".mchimp-errmessage").fadeOut();
                        $(".mchimp-sucmessage").fadeOut();
                    });
                    $(".memail").on("click", function() {
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

    public function form($instance)
    {
        $title        = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $desc        = isset($instance['desc']) ? esc_attr($instance['desc']) : '';
        $action_url   = isset($instance['action_url']) ? esc_attr($instance['action_url']) : '';
        $theme_btn    = isset($instance['theme_btn']) ? esc_attr($instance['theme_btn']) : '';
        $memail      = isset($instance['$memail']) ? esc_attr($instance['$memail']) : '';

    ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'andrea'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('desc')); ?>"><?php esc_html_e('Description:', 'andrea'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('desc')); ?>" name="<?php echo esc_attr($this->get_field_name('desc')); ?>" type="text" value="<?php echo esc_attr($desc); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('action_url')); ?>"><?php echo esc_html__('Enter the Action URL here:', 'andrea'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('action_url')); ?>" name="<?php echo esc_attr($this->get_field_name('action_url')); ?>" type="text" value="<?php echo esc_attr($action_url); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('memail')); ?>"><?php echo esc_html__('Enter the Email address here:', 'andrea'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('memail')); ?>" name="<?php echo esc_attr($this->get_field_name('memail')); ?>" type="text" value="<?php echo esc_attr($action_url); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('theme_btn')); ?>"><?php echo esc_html__('Enter the Button text here:', 'andrea'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('theme_btn')); ?>" name="<?php echo esc_attr($this->get_field_name('theme_btn')); ?>" type="text" value="<?php echo esc_attr($theme_btn); ?>" />
        </p>


<?php
    }

    // Update Data
    public function update($new_instance, $old_instance)
    {
        $instance                 = $old_instance;
        $instance['title']        = sanitize_text_field($new_instance['title']);
        $instance['desc']        = sanitize_text_field($new_instance['desc']);
        $instance['action_url']   = sanitize_text_field($new_instance['action_url']);
        $instance['theme_btn']    = sanitize_text_field($new_instance['theme_btn']);
        $instance['memail']       = sanitize_text_field($new_instance['memail']);
        return $instance;
    }
}
