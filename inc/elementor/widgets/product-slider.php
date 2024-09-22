<?php
namespace Elementor;
class Product_Slider extends Widget_Base {

    public function get_name() {
        return 'product_slider';
    }

    public function get_title() {
        return 'اسلایدر محصولات';
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
                'label' => esc_html__( 'اسلایدر محصولات' ),
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
        //settings
        $this->start_controls_section(
            'setting',
            [
                'label' => esc_html__( 'تنظیمات' ),
               // 'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'slider_arrows',
            [
                'label' => __( 'نمایش پیکان های اسلایدر', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'نمایش', 'your-plugin' ),
                'label_off' => __( 'مخفی', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
		$this->add_control(
            'slider_autoplay',
            [
                'label' => __( 'حرکت خودکار', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'روشن', 'your-plugin' ),
                'label_off' => __( 'خاموش', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
			'arrows_bg_color',
			[
				'label' => esc_html__( 'رنگ پس زمینه پیکان ها  ', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom-axil-new-arrivals .axil-slick-arrow .slide-arrow:before' => 'background-color: {{VALUE}}',
				],
				'default'=>'#e6e6e6'
			]
		);
        $this->add_control(
			'arrows_bg_color_icon',
			[
				'label' => esc_html__( 'رنگ آیکن پیکان ها  ', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom-axil-new-arrivals .axil-slick-arrow .slide-arrow' => 'color: {{VALUE}}',
				],
				'default'=>'#292930'
			]
		);
        $this->add_control(
            'slider_dots',
            [
                'label' => __( 'نمایش نقطه های زیر اسلایدر', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'نمایش', 'your-plugin' ),
                'label_off' => __( 'مخفی', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
			'dots_bg_color',
			[
				'label' => esc_html__( 'رنگ  نقطه ها  ', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom-axil-new-arrivals .slick-dots li button:before' => 'color: {{VALUE}}',
				],
				'default'=>'#e6e6e6'
			]
		);
        $this->add_control(
			'dots_bg_color_active',
			[
				'label' => esc_html__( 'رنگ  نقطه فعال  ', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom-axil-new-arrivals .slick-dots li.slick-active button:before' => 'color: {{VALUE}}',
				],
				'default'=>'#292930'
			]
		);
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $rand=rand(100,10000);
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
        <div class="axil-new-arrivals-product-area custom-axil-new-arrivals bg-color-white axil-section-gap pb--0">
            <div class="container">
                <div class="product-area pb--50">
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
                        class="new-arrivals-product-activation slick-layout-wrapper--30 axil-slick-arrow  arrow-top-slide custom-new-arrivals-product-<?= $rand;?>">
                        <?php while($products->have_posts()): $products->the_post();?>
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-two">
                                <div class="thumbnail">
                                <?php if(has_post_thumbnail()): ?>
                                    <a href="<?php the_permalink();?>">
                                    <?php
                                        the_post_thumbnail('product',[
                                            'class'=>'sal-animate',
                                        ]);?>
                                    </a>
                                <?php endif;?>
                                    <?php get_template_part('template/product/sale');?>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <?php get_template_part('template/product/content');?>
                                    <?php get_template_part('template/product/action');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile;wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function($){
                $('.custom-new-arrivals-product-<?= $rand;?>').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: <?php if ($settings['slider_arrows']) {echo "true"; } else {echo "false"; }?>,
                dots:  <?php if ($settings['slider_dots']) {echo "true"; } else {echo "false"; }?>,
                autoplay: <?php if ($settings['slider_autoplay']) {echo "true"; } else {echo "false"; }?>,
                rtl: true,
                nextArrow: '<button class="slide-arrow prev-arrow"><i class="fal fa-long-arrow-right"></i></button>',
                prevArrow: '<button class="slide-arrow next-arrow"><i class="fal fa-long-arrow-left"></i></button>',
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
            })
        </script>
         <!-- End Expolre Product Area  -->
        <?php endif;?>
        <?php

    }

}