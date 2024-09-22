<?php
namespace Elementor;
class Best_Products extends Widget_Base {

    public function get_name() {
        return 'best_products';
    }

    public function get_title() {
        return 'برترین محصولات';
    }

    public function get_icon() {
        return 'far fa-star';
    }


    public function get_categories() {
        return ['digishop'];
    }
    public function post_cats()
    {
        $post_cat = [];
        $categories = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => true]);
        if (!is_wp_error($categories) && !empty($categories)) {
            foreach ($categories as $category) {
                $post_cat[$category->term_id] = $category->name;
            }
        }
        return $post_cat;
    }
    protected function register_controls() {
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__( 'برترین محصولات' ),
               // 'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'small_title',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'عنوان کوچک' ),
                'label_block'=>true
			]
		);
        $this->add_control(
			'small_title_icon',
			[
				'label' => esc_html__( 'آیکون عنوان کوچک', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);
        $this->add_control(
			'big_title',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'عنوان بزرگ' ),
                'label_block'=>true
			]
		);
        $this->add_control(
            'products_count',
            [
                'label' => esc_html__('تعداد  محصولات', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '3'
            ]
        );
        $this->add_control(
            'product_sort',
            [
                'label' => __('نمایش محصولات بر اساس:'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'publish_date',
                'options' => [
                    'publish_date' => __(' محصولات اخیر'),
                    'rand' => __(' محصولات تصادفی'),
                    'modified' => __(' محصولات بروز شده'),
                ]
            ]
        );
        $this->add_control(
            'product_cat',
            [
                'label' => __('دسته‌بندی محصولات'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'description' => ' خالی در این بخش نمایش داده نمی‌شوند',
                'multiple' => true,
                'options' => $this->post_cats()
            ]
        );
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $post_sort = $settings['product_sort'];
        $post_count = $settings['products_count'];
        $post_cat = $settings['product_cat'];
        $query_options = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'meta_key' => 'total_sales',
            'orderby' => 'meta_value_num',
            'orderby' => $post_sort,
            'order' => 'DESC',
            'posts_per_page' => $post_count,
        );
        if($post_cat){
            $query_options['tax_query'] = [[
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $post_cat,
            ]];
        }
        $products=new \WP_Query($query_options);
        if($products->have_posts()):
        ?>
        <!-- Start Expolre Product Area  -->
        <div class="axil-most-sold-product axil-section-gap">
            <div class="container">
                <div class="product-area pb--50">
                    <div class="section-title-wrapper section-title-center">
                    <span class="title-highlighter highlighter-secondary"> 
                            <?php
                                \Elementor\Icons_Manager::render_icon( $settings['small_title_icon'], [ 'aria-hidden' => 'true' ] ); 
                                echo $settings['small_title'];
                            ?>
                        </span>
                        <h3 class="title"><?php echo $settings['big_title'];?></h3>
                    </div>
                    <div class="row">
                    <?php while($products->have_posts()): $products->the_post();?>
                    <?php global $product; ?>
                        <div class="col-12 col-md-6">
                            <div class="axil-product-list">
                            <?php if(has_post_thumbnail()): ?>
                                <div class="thumbnail">
                                    <a href="<?php the_permalink();?>">
                                    <?php
                                        the_post_thumbnail('small-product');?>
                                    </a>
                                </div>
                                <?php endif;?>
                                <div class="product-content ">
                                <?php get_template_part('template/product/content');?>
                                    <div class="product-cart">
                                        <ul class="d-flex flex-sm-column justify-content-center">
                                        <?php if (defined('WCCM_VERISON')){
                                                $productID=$product->get_id();
                                                if(in_array($productID,wccm_get_compare_list())){
                                                    $compare_class='in-comapre';
                                                }else{
                                                    $compare_class='';
                                                }   
                                            ?>
                                            <li class="compare-ajax mx-1 mx-sm-0">
                                                <a  class="compare-ajax-btn  <?= $compare_class ?>" data-compare-id="<?= $productID ?>">
                                                    <i class="fal fa-repeat"></i>
                                                </a>
                                            </li>
                                        <?php } ?>
                                            <?php if (class_exists( 'JVM_WooCommerce_Wishlist') ){?>
                                                <li class="mx-1 mx-sm-0">
                                                <?php echo do_shortcode("[jvm_woocommerce_add_to_wishlist]");?>
                                                </li>
                                            <?php } ?> 
                                        </ul>                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile;wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
                <!-- End Expolre Product Area  -->
        <?php endif;?>
        <?php

    }

}