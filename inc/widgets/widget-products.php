<?php
class widget_products extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'widget_products',

            // Widget name will appear in UI
            __(' محصولات دی جی شاپ ', 'widget_products_domain'),

            // Widget description
            array('description' => __('نمایش محصولات سایت', 'widget_products_domain'),)
        );
    }

    // Creating widget front-end
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $product_num = $instance['product_num'];
        $product_cat = $instance['product_cat'];
        $product_sort = $instance['product_sort'];
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];


        $post_data = [
            'post_type'=>'product',
            'orderby' => $product_sort,
            'order' => 'desc',
            'posts_per_page' => $product_num,
            'post_status' => 'publish',
        ];
        if($product_cat != 0){
            $post_data['tax_query'] = [[
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $product_cat,
            ]];
        }
        $products = new WP_Query($post_data);
        if ($products->have_posts()) :
?>
            <ul class="product_list_widget recent-viewed-product">
                <?php while ($products->have_posts()) : $products->the_post(); ?>
                <?php global $product;?>
                <li>
                    <?php if(has_post_thumbnail()){?>
                    <div class="thumbnail">
                        <a href="<?php the_permalink();?>">
                        <?php the_post_thumbnail('sidebar');?>
                        </a>
                    </div>
                    <?php }?>
                    <div class="content">
                        <h6 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                        <div class="product-meta-content">
                            <div class="custom-woocommerce-Price-amount">
                                 <?php echo $product->get_price_html();?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </ul>
        <?php
        endif;
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $product_num = !empty($instance['product_num']) ? $instance['product_num'] : '';
        $product_cat = !empty($instance['product_cat']) ? $instance['product_cat'] : '';
        $product_sort = !empty($instance['product_sort']) ? $instance['product_sort'] : '';
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('عنوان:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('product_num'); ?>"><?php _e('تعداد محصولات:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('product_num'); ?>" name="<?php echo $this->get_field_name('product_num'); ?>" type="number" value="<?php echo esc_attr($product_num); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('product_cat'); ?>"><?php _e(' انتخاب دسته:'); ?></label>

            <?php
            $cats = $this->categories();
            ?>
            <select class="widefat" name="<?php echo $this->get_field_name('product_cat'); ?>" id="<?php echo $this->get_field_id('product_cat'); ?>">
               <option value="0" <?php if ('0' == $product_cat) echo ' selected'; ?>>همه محصولات</option>
                <?php foreach ($cats as $index => $cat) : ?>
                    <option value="<?= $index; ?>" <?php if ($index == $product_cat) echo ' selected'; ?>><?= $cat; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('product_sort'); ?>"><?php _e(' مرتب سازی بر اساس :'); ?></label>
            <select class="widefat" name="<?php echo $this->get_field_name('product_sort'); ?>" id="<?php echo $this->get_field_id('product_sort'); ?>">
                <option value="publish_date" <?php if ("publish_date" == $product_sort) echo ' selected'; ?>>محصولات اخیر</option>
                <option value="rand" <?php if ("rand" == $product_sort) echo ' selected'; ?>>محصولات تصادفی</option>
                <option value="modified" <?php if ("modified" == $product_sort) echo ' selected'; ?>>محصولات بروز شده</option>
            </select>
        </p>
<?php
        // var_dump($this->categories);
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['product_num'] = (!empty($new_instance['product_num'])) ? strip_tags($new_instance['product_num']) : '';
        $instance['product_cat'] = (!empty($new_instance['product_cat'])) ? strip_tags($new_instance['product_cat']) : '';
        $instance['product_sort'] = (!empty($new_instance['product_sort'])) ? strip_tags($new_instance['product_sort']) : '';
        return $instance;
    }

    //get cats

    public function categories()
    {
        $products_cats = [];
        $cats = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => true]);
        if (!is_wp_error($cats) && !empty($cats)) {
            foreach ($cats as $category) {
                $products_cats[$category->term_id] = $category->name;
            }
        }
        return $products_cats;
    }

    // Class widget_products ends here
}

// Register and load the widget
function wpb_load_product_widget()
{
    register_widget('widget_products');
}
add_action('widgets_init', 'wpb_load_product_widget');
