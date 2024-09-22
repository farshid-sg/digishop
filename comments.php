<?php

if (post_password_required())
    return;
?>
<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h4 class="comments-title">
            <?php
            printf(_nx('یک دیدگاه برای "%2$s"', '%1$s  دیدگاه برای "%2$s"', get_comments_number(), 'comments title'),
                number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>');
            ?>
        </h4>
        <ul class="comment-list comments list-none mt-4">
            <?php
            wp_list_comments(array(
                'style' => 'ul',
                'short_ping' => true,
                'callback' => 'better_comments'
            ));
            ?>
        </ul><!-- .comment-list -->
        <?php
        // Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e('صفحه بندی دیدگاه ها'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; دیدگاه های قدیمی تر')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('دیدگاه های جدیدتر &rarr;')); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>
        <?php if (!comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'twentythirteen'); ?></p>
        <?php endif; ?>
    <?php endif; // have_comments() ?>
    <?php
    $commenter = wp_get_current_commenter();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';
    $args = [];

    $args = wp_parse_args($args);
    if (!isset($args['format'])) {
        $args['format'] = current_theme_supports('html5', 'comment-form') ? 'html5' : 'xhtml';
    }
    $req = get_option('require_name_email');
    $html5 = 'html5' === $args['format'];

    // Define attributes in HTML5 or XHTML syntax.
    $required_attribute = ($html5 ? ' required' : ' required="required"');
    $checked_attribute = ($html5 ? ' checked' : ' checked="checked"');

    // Identify required fields visually.
    $required_indicator = ' <span class="required" aria-hidden="true">*</span>';

    $fields = array(
        'author' => sprintf(
            '<div class="row p-0"><div class="col-lg-6 col-md-6 col-12 pe-0"><div class="form-group ">%s</div></div>',
            sprintf(
                '<label>نام <span>*</span> </label><input id="author" name="author" type="text" class="form-control" placeholder="نام خود را وارد کنید" value="%s" size="30" maxlength="245"%s />',
                esc_attr($commenter['comment_author']),
                ($req ? $required_attribute : '')
            )
        ),
        'email' => sprintf(
            '<div class="col-lg-6 col-md-6 col-12 pe-0"><div class="form-group">%s</div></div></div>',

            sprintf(
                '<label>ایمیل <span>*</span> </label><input id="email" name="email" %s value="%s" class="form-control" size="30" maxlength="100" aria-describedby="email-notes"%s />',
                ($html5 ? 'type="email"' : 'type="text"'),
                esc_attr($commenter['comment_author_email']),
                ($req ? $required_attribute : '')
            )
        )
    );
    $comment_form = [
        'title_reply' => 'شما هم می‌توانید در مورد این مقاله نظر بدهید',
        'fields' => $fields,
        'class_form' => 'row mt-3',
        'comment_field' => '<div class="col-12 ps-0"><div class="form-group "><label>نظر شما</label>
                    <textarea placeholder="بنویسید" name="comment" id="comment" class="form-control" rows="8"></textarea>
                </div></div>',
        'submit_button' => '<div class="col-lg-12"><div class="form-submit text-end">
                    <button id="%2$s" type="submit" value="%4$s" class="axil-btn btn-bg-primary w-auto ms-auto">ارسال نظر</button>
               </div></div>'
    ];
    comment_form($comment_form); ?>
</div><!-- #comments -->
