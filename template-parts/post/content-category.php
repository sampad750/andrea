<?php
// Set post view meta
andrea_set_post_view(); ?>

<div class="col-md-12">
    <div class="blog-entry-2 ftco-animate">
        <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('full', array('class' => 'img')) ?>
        </a>
        <div class="text pt-4">
            <h3 class="mb-4"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
            <p class="mb-4">
                <?php
                    $post_content = get_the_content();
                    echo substr($post_content, 0, 250);
                ?>
            </p>
            <div class="author mb-4 d-flex align-items-center">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 128, '', '', array('class' => 'img')  ); ?>
                <div class="ml-3 info">
                    <span><?php _e('Written by', 'andrea') ?></span>
                    <h3><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author_meta( 'nicename', get_the_author_meta( 'ID' ) );?></a>, <span><?php the_time('M j, Y'); ?></span></h3>
                </div>
            </div>
            <div class="meta-wrap d-md-flex align-items-center">
                <div class="half order-md-last text-md-right">
                    <p class="meta">
                        <span><i class="icon-heart"></i>3</span>
                        <span><i class="icon-eye"></i><?php echo andrea_get_post_view(); ?></span>
                        <span><i class="icon-comment"></i><?php echo get_comments_number(); ?></span>
                    </p>
                </div>
                <div class="half">
                    <p><a href="<?php the_permalink() ?>" class="btn btn-primary p-3 px-xl-4 py-xl-3"><?php _e('Continue Reading', 'andrea'); ?></a></p>
                </div>
            </div>
        </div>
    </div>
</div>