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
                                    <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
                                </div>
                                <div class="desc">
                                    <h3>George Washington</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
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























<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        // Start the loop.
        while (have_posts()) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
            get_template_part('template-parts/post/content');

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;

            // Previous/next post navigation.
            the_post_navigation(array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'twentyfifteen') . '</span> ' .
                    '<span class="screen-reader-text">' . __('Next post:', 'twentyfifteen') . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'twentyfifteen') . '</span> ' .
                    '<span class="screen-reader-text">' . __('Previous post:', 'twentyfifteen') . '</span> ' .
                    '<span class="post-title">%title</span>',
            ));

        // End the loop.
        endwhile;
        ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>