<?php
get_header(); ?>

<div id="colorlib-main">
    <section class="ftco-section">
        <div class="container">
            <div class="row px-md-4">
                <?php
                if (have_posts()) { ?>
                    <div class="col-md-12">
                        <?php
                        while (have_posts()) {
                            the_post();
                            get_template_part('template-parts/post/content');
                        }
                        ?>
                    </div>
                <?php
                } else {
                    get_template_part('template-parts/post/content-none');
                } ?>

            </div>
            <div class="row">
                <div class="col text-center text-md-left">
                    <div class="block-27">

                        <?php
                        the_posts_pagination(array(
                            'mid_size'  => -1,
                            'prev_text' => __('&lt;', 'andrea'),
                            'next_text' => __('&gt;', 'andrea'),
                        ));
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();

?>