<?php
// Set post view meta
andrea_set_post_view(); 

$total_loved        = get_user_meta( get_current_user_id(), 'love_btn_id', true );
$comments_array     = explode(', ', $total_loved)[0];
$firstExplode       = explode(',', $comments_array);

$loved              = '';
if ( in_array( get_the_ID(), $firstExplode ) ) {
    $loved          = 'already-loved';
}

?>

<div class="col-md-12">
    <div class="blog-entry-2 ftco-animate">
        <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('full', array('class' => 'img')) ?>
        </a>
        <div class="text pt-4">
            <h3 class="mb-4"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
            <p class="mb-4">
                <?php
                $post_content = get_the_content(get_the_ID());
                echo wp_trim_words($post_content, 30, false);
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
                        <span class="love-button <?php echo esc_attr($loved); ?>" data_post_id="<?php echo esc_attr(get_the_ID()); ?>">
                            <i class="icon-heart"></i>
                        </span>
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



<script>
    ;(function($){

        $(document).ready(function(){

            $('.love-button').click(function(){
              
                    // Get the post ID from the data attribute
                    var postID = $(this).attr('data_post_id');

                    var ajaxurl = andrea_script.ajaxurl;
 
                    $.ajax({
                        url: ajaxurl,
                        type: 'POST',
                        data: {
                            action: 'andrea_love_btn',
                            post_id: postID
                        },
                        success: function(data) {
                            $('.blog-entry-2 .text .meta-wrap .meta span[data_post_id='+postID+']').addClass('already-loved');
                        },
                        error: function(xhr, status, error) {
                            
                        }
                    });
                });


        });
        
    })(jQuery);
</script>