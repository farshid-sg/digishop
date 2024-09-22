<?php
if( ! function_exists( 'better_comments' ) ):
    function better_comments($comment, $args, $depth) {
        ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

            <div class="comment_img me-2">
                <?php echo get_avatar($comment,$size='80',$default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g' ); ?>
            </div>
            <div class="comment_block">
                <p class="customer_meta m-0">
                    <h6 class="review_author"><?php echo get_comment_author() ?></h6>
                    <span class="comment-date"><span class="date float-right"><?php printf(esc_html__('%1$s at %2$s' , '5balloons_theme'), get_comment_date(),  get_comment_time()) ?></span></span>
                    <span class="reply">
                         <span class="float-right">
                           <span> <a href="#"><i class="fa fa-reply"></i> <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a></span>
                        </span>
                    </span>
                </p>
               <div class="description">
                   <p>
                       <?php comment_text() ?>
                   </p>
               </div>

                <div class="comment-arrow"></div>
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php esc_html_e('دیدگاه شما در حال بررسی می باسد') ?></em>
                    <br />
                <?php endif; ?>

            </div>
        <?php
    }
endif;
