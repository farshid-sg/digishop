<?php
class widget_posts extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'widget_posts',

// Widget name will appear in UI
            __(' مقالات دی جی شاپ', 'widget_posts_domain'),

// Widget description
            array( 'description' => __( 'نمایش مقالات سایت', 'widget_posts_domain' ), )
        );
    }

// Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $blog_num=$instance['blog_num'];
        $show_date=$instance['show_date'];
        $show_views=$instance['show_views'];
        $blog_sort = $instance['blog_sort'];

// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];


        $posts_options = [
            'orderby'=>$blog_sort,
            'order' => 'desc',
            'posts_per_page' => $blog_num,
            'post_status' => 'publish'
        ];
        $posts = new WP_Query($posts_options);
        if ($posts->have_posts()):
    ?>
            <div>
                <?php
                while ($posts->have_posts()):$posts->the_post();
                ?>
                <div class="content-blog post-list-view mb--20">
                <?php if(has_post_thumbnail()){?>
                <div class="thumbnail">
                    <a href="<?php the_permalink();?>">
                     <?php the_post_thumbnail('sidebar');?>
                    </a>
                </div>
                <?php }?>
                <div class="content">
                    <h6 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                    <div class="axil-post-meta">
                       <?php
                        if($show_date || $show_date):
                        ?>
                        <div class="post-meta-content">
                            <ul class="post-meta-list">
                                <?php
                                if($show_date):
                                ?>
                                <li><?php echo get_the_date() ?></li>
                                <?php 
                                endif;
                                if($show_views):
                                ?>
                                <li>
                                <?php  if(function_exists('the_views')) { the_views(); } ?>
                                            <span>  بازدید  </span>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

    <?php
           endif;
        echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {
        $title=!empty($instance[ 'title' ]) ?$instance[ 'title' ]:'';
        $blog_num=!empty($instance[ 'blog_num' ]) ?$instance[ 'blog_num' ]:'';
        $blog_sort = !empty($instance['blog_sort']) ? $instance['blog_sort'] : '';
        $show_date=!empty($instance[ 'show_date' ]) ?$instance[ 'show_date' ]:'0';
        $show_views=!empty($instance[ 'show_views' ]) ?$instance[ 'show_views' ]:'0';
		
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'عنوان:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'blog_num' ); ?>"><?php _e( 'تعداد مقالات:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'blog_num' ); ?>" name="<?php echo $this->get_field_name( 'blog_num' ); ?>" type="number" value="<?php echo esc_attr( $blog_num ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('blog_sort'); ?>"><?php _e(' مرتب سازی بر اساس :'); ?></label>
            <select class="widefat" name="<?php echo $this->get_field_name('blog_sort'); ?>" id="<?php echo $this->get_field_id('blog_sort'); ?>">
                <option value="publish_date" <?php if ("publish_date" == $blog_sort) echo ' selected'; ?>>پست‌های اخیر</option>
                <option value="rand" <?php if ("rand" == $blog_sort) echo ' selected'; ?>>پست‌های تصادفی</option>
                <option value="modified" <?php if ("modified" == $blog_sort) echo ' selected'; ?>>پست‌های بروز شده</option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( ' نمایش تاریخ:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" type="checkbox" value="1" <?php if($show_date ) echo ' checked'?> />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'show_views' ); ?>"><?php _e( ' نمایش تعداد بازدید:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'show_views' ); ?>" name="<?php echo $this->get_field_name( 'show_views' ); ?>" type="checkbox" value="1" <?php if($show_views ) echo ' checked'?> />
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['blog_num'] = ( ! empty( $new_instance['blog_num'] ) ) ? strip_tags( $new_instance['blog_num'] ) : '';
        $instance['blog_sort'] = (!empty($new_instance['blog_sort'])) ? strip_tags($new_instance['blog_sort']) : '';
        $instance['show_date'] = ( ! empty( $new_instance['show_date'] ) ) ? strip_tags( $new_instance['show_date'] ) : '';
        $instance['show_views'] = ( ! empty( $new_instance['show_views'] ) ) ? strip_tags( $new_instance['show_views'] ) : '';
        return $instance;
    }

// Class widget_posts ends here
}

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'widget_posts' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
