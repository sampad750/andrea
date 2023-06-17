<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-8 px-md-5 py-5">
                    <div class="row pt-md-4">
                        <?php
                        // Start the loop.
                        while (have_posts()) : the_post();
                        ?>
                            <h1 class="mb-3"><?php the_title(); ?></h1>
                            <?php
                            the_content();

                            ?>
                            <div class="tag-widget post-tag-container mb-5 mt-5">
                                <div class="tagcloud">
                                    <?php
                                    if (has_tag()) {
                                        the_tags('', '');
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="about-author d-flex p-4 bg-light">
                                <div class="bio mr-5">
                                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 128 ); ?>
                                </div>
                                <div class="desc">
                                    <h3><?php echo ucfirst(get_the_author_meta( 'nicename', get_the_author_meta( 'ID' ) )); ?></h3>
                                    <p><?php echo get_the_author_meta( 'description', get_the_author_meta( 'ID' ) ); ?></p>
                                </div>
                            </div>
                        <?php

                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;

                        // End the loop.
                        endwhile;
                        ?>
                    </div><!-- END-->
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->

<?php get_footer(); ?>