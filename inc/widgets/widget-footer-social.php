<?php
class widget_social extends WP_Widget {

    function __construct() {
        parent::__construct(

// Base ID of your widget
            'widget_social',

// Widget name will appear in UI
            __('شبکه های اجتماعی فوتر', 'widget_social_domain'),

// Widget description
            array( 'description' => __( 'شبکه های اجتماعی فوتر', 'widget_social_domain' ), )
        );
    }

// Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $facebook=$instance['facebook'];
        $instagram=$instance['instagram'];
        $telegram=$instance['telegram'];
        $twitter=$instance['twitter'];
        $pinterest=$instance['pinterest'];
        $linkedin=$instance['linkedin'];


// before and after widget arguments are defined by themes
        echo $args['before_widget'];

        ?>
        <div class="social-share">
            <?php if($facebook): ?>
                <a href="<?php echo $facebook;?>"><i class="fab fa-facebook-f"></i></a>
            <?php
            endif;
            if($instagram):
            ?>
                <a href="<?php echo $instagram;?>">
                 <i class="fab fa-instagram"></i></a>
            <?php
            endif;
            if($telegram):
            ?>
                <a href="<?php echo $telegram;?>">
                    <i class="fab fa-telegram"></i>
                </a>
            <?php
            endif;
            if($twitter):
            ?>
                <a href="<?php echo $twitter;?>">
                    <i class="fab fa-twitter"></i>
                </a>
            <?php
            endif;
            if($pinterest):
            ?>
                <a href="<?php echo $pinterest;?>">
                    <i class="fab fa-pinterest"></i>
                </a>
            <?php 
            endif;
            if($linkedin):
            ?>
                <a href="<?php echo $linkedin;?>">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            <?php endif;?>
            </div>
        <?php
        echo $args['after_widget'];
    }

// Widget Backend
    public function form( $instance ) {
        $title=!empty($instance[ 'title' ]) ?$instance[ 'title' ]:'یک عنوان وارد نمایید';
        $facebook=!empty($instance[ 'facebook' ]) ?$instance[ 'facebook' ]:'';
        $instagram=!empty($instance[ 'instagram' ]) ?$instance[ 'instagram' ]:'';
        $telegram=!empty($instance[ 'telegram' ]) ?$instance[ 'telegram' ]:'';
        $twitter=!empty($instance[ 'twitter' ]) ?$instance[ 'twitter' ]:'';
        $pinterest=!empty($instance[ 'pinterest' ]) ?$instance[ 'pinterest' ]:'';
        $linkedin=!empty($instance[ 'linkedin' ]) ?$instance[ 'linkedin' ]:'';
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'عنوان:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'فیسبوک :' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'اینستاگرام :' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'telegram' ); ?>"><?php _e( ' تلگرام :' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'telegram' ); ?>" name="<?php echo $this->get_field_name( 'telegram' ); ?>" type="text" value="<?php echo esc_attr( $telegram ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( ' تویتر :' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( ' پینترست :' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( ' لینکدین :' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
        </p>
        <?php
    }
// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
        $instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
        $instance['telegram'] = ( ! empty( $new_instance['telegram'] ) ) ? strip_tags( $new_instance['telegram'] ) : '';
        $instance['twitter'] = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
        $instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? strip_tags( $new_instance['pinterest'] ) : '';
        $instance['linkedin'] = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';
        return $instance;
    }

// Class widget_social ends here
}

// Register and load the widget
function social() {
    register_widget( 'widget_social' );
}
add_action( 'widgets_init', 'social' );
