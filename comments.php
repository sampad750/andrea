<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package andrea
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
$is_comments = have_comments() ? 'have_comments' : 'no_comments';
?>

<div class="pt-5 mt-5">

    <?php if (have_comments()) : ?>
        <div class="comment_inner <?php echo esc_attr($is_comments); ?>" id="comments">
            <h3 class="mb-5 font-weight-bold"><?php andrea_helper()->comment_count(get_the_ID()) ?></h3>
            <ul class="comment-list">
                <?php
                wp_list_comments(
                    array(
                        'style'         => 'ul',
                        'short_ping'    => true,
                        'walker'        => new Andrea_Walker_Comment,
                    )
                );
                the_comments_navigation();
                ?>
            </ul>
        </div>
    <?php
    endif;
    ?>

    <div class="comment-form-wrap pt-5 <?php echo esc_attr($is_comments) ?>">

        <?php
        if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'landpagy'); ?></p>
        <?php
        endif;

        $commenter      = wp_get_current_commenter();
        $req            = get_option('require_name_email');
        $aria_req       = ($req ? " aria-required='true'" : '');
        $fields =  array(
            'author' => '<div class="form-group">
		                    <label for="name">' . esc_html__('Name*', 'andrea') . ' </label>
		                    <input type="text" class="form-control" name="author" id="name" ' . $aria_req . '>
		                </div>',
            'email'    => '<div class="form-group">
                            <label for="email">' . esc_html__('Email*', 'andrea') . '</label>
                            <input type="email" class="form-control" name="email" id="email" value="' . esc_attr($commenter['comment_author_email']) . '" ' . $aria_req . '>
                        </div>',
            'url'    => '<div class="form-group">
		                    <label for="website">' . esc_html__('Website (Optional)', 'andrea') . '</label>
		                    <input type="url" class="form-control" name="url" id="website" value="' . esc_attr($commenter['comment_author_url']) . '">
		                  </div>',
        );
        $comments_args = array(
            'fields'                => apply_filters('comment_form_default_fields', $fields),
            'class_form'            => 'p-3 p-md-5 bg-light',
            'class_submit'          => 'btn py-3 px-4 btn-primary',
            'title_reply_before'    => '<h3 class="mb-5">',
            'title_reply'           => esc_html__('Leave a Comment', 'andrea'),
            'title_reply_after'     => '</h3>',
            'comment_notes_before'  => '',
            'comment_field'         => '<div class="form-group"><textarea name="comment" id="comment" class="form-control message"></textarea><label class="floating-label">' . esc_html__('Comment type...', 'landpagy') . '</label></div>',
            'comment_notes_after'   => '',
            'submit_button'         => '<button type="submit" name="%1$s" id="%2$s" class="%3$s" value="%4$s">' . esc_html__('Post Comment', 'andrea') . '</button>',

        );
        comment_form($comments_args);
        ?>
    </div>
</div>