<?php

/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Andrea
 * @since Andrea 1.0
 */

get_header();

?>
<div id="colorlib-main">
    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="col-sm-10 col-sm-offset-1 text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center "><?php _e('404', 'andrea'); ?></h1>
                        </div>
                        <div class="contant_box_404">
                            <h3 class="h2">
                                <?php _e('Look like you are lost', 'andrea'); ?>
                            </h3>

                            <p><?php _e('The page you are looking for not avaible!', 'andrea'); ?></p>

                            <a href="<?php echo esc_url(home_url()); ?>" class="link_404"><?php _e('Go to Home', 'andrea'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php

get_footer();
