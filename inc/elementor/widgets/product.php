<?php
namespace Elementor;
class Product extends Widget_Base {

    public function get_name() {
        return 'product';
    }

    public function get_title() {
        return 'محصولات';
    }

    public function get_icon() {
        return 'fas fa-box-open';
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
                'label' => esc_html__( 'محصولات' ),
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
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('متن دکمه', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
			'btn_link',
			[
				'label' => esc_html__( 'لینک دکمه' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
					'custom_attributes' => '',
				],
				'label_block' => true,
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
        <div class="axil-product-area bg-color-white axil-section-gap">
                <div class="container">
                        <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-secondary"> 
                            <?php
                                \Elementor\Icons_Manager::render_icon( $settings['small_title_icon'], [ 'aria-hidden' => 'true' ] ); 
                                echo $settings['small_title'];
                            ?>
                        </span>
                        <h3 class="title"><?php echo $settings['big_title'];?></h3>
                        </div>
                        <div
                            class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                            <div class="slick-single-layout">
                                <div class="row row--15 justify-content-center">
                                <?php  while($products->have_posts()):$products->the_post();?>
                                <?php get_template_part('template/product/main');?>
                                <?php endwhile; wp_reset_postdata(); ?>
                                <!-- End Single Product  -->
                                </div>
                            </div>
                            <!-- End .slick-single-layout -->
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center mt--20 mt_sm--0">
                                <a href="<?php echo $settings['btn_link']['url'];?>" class="axil-btn btn-bg-lighter btn-load-more">
                                    <?php echo $settings['btn_text'];?>
                                </a>
                            </div>
                        </div>

                </div>
        </div>
                <!-- End Expolre Product Area  -->
        <?php endif;?>
        <?php

    }

}