<?php
namespace Elementor;
class Slider_Special_Offer extends Widget_Base {

    public function get_name() {
        return 'slider_special_offer';
    }

    public function get_title() {
        return 'اسلایدر پیشنهاد ویژه';
    }

    public function get_icon() {
        return 'fal fa-calendar-times';
    }


    public function get_categories() {
        return ['digishop'];
    }
    protected function register_controls() {
        $this->start_controls_section(
            'slider_special_offer_section',
            [
                'label' => esc_html__( 'اسلایدر پیشنهاد ویژه' ),
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
            'time',
            [
                'label' => __('تاریخ پایان'),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
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
					'{{WRAPPER}} .flash-sale-area .axil-slick-arrow .slide-arrow:before' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .flash-sale-area .axil-slick-arrow .slide-arrow' => 'color: {{VALUE}}',
				],
				'default'=>'#292930'
			]
		);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $rand=rand(100,1000);
        $specialOfferTime=$settings['time'] ?? '00-00-00';
        $products_options = array(
            'post_type'      => 'product',
            'posts_per_page'=>'10',
            'meta_query'     => array(
                'relation' => 'OR',
                array( // Simple products type
                    'key'           => '_sale_price',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                ),
                array( // Variable products type
                    'key'           => '_min_variation_sale_price',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                )
            )
        );
        $products=new \WP_Query($products_options);
        if($products->have_posts()):
        ?>
        <!-- start Flash Sale Area  -->
          <div
            class="axil-new-arrivals-product-area fullwidth-container flash-sale-area bg-color-white axil-section-gap pb--0">
            <div class="container ml--xxl-0">
                <div class="product-area pb--50">
                    <div class="d-md-flex align-items-end flash-sale-section">
                        <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-secondary"> 
                            <?php
                                \Elementor\Icons_Manager::render_icon( $settings['small_title_icon'], [ 'aria-hidden' => 'true' ] ); 
                                echo $settings['small_title'];
                            ?>
                        </span>
                        <h3 class="title"><?php echo $settings['big_title'];?></h3>
                        </div>
                        <div class="sale-countdown-<?= $rand;?> countdown"></div>
                    </div>
                    <div
                        class="new-arrivals-product-activation-<?= $rand ?> slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                        <?php while($products->have_posts()): $products->the_post();?>
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                <?php if(has_post_thumbnail()): ?>
                                    <a href="<?php the_permalink();?>">
                                    <?php
                                        the_post_thumbnail('product',[
                                            'class'=>'sal-animate',
                                            'data-sal'=>'zoom-out',
                                            'data-sal-delay'=>"100",
                                            'data-sal-duration'=>'1500',
                                        ]);?>
                                    </a>
                                    <?php endif;?>
                                    <?php get_template_part('template/product/sale');?>
                                    <?php get_template_part('template/product/action');?>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <?php get_template_part('template/product/content');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .slick-single-layout -->
                        <?php endwhile;wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
         </div>
    <script>
            jQuery(document).ready(function($){
                $('.new-arrivals-product-activation-<?= $rand;?>').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: <?php if ($settings['slider_arrows']) {echo "true"; } else {echo "false"; }?>,
                dots: false,
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
                function   posterCountdown (countdownSelector, countdownTime) {
                    let eventCounter = $(countdownSelector);
                    if (eventCounter.length) {
                        eventCounter.countdown(countdownTime, function(e) {
                            $(this).html(
                                e.strftime(
                                    "<div class='countdown-section'><div><div class='countdown-number'>%-D</div> <div class='countdown-unit'>روز</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%H</div> <div class='countdown-unit'>ساعت</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%M</div> <div class='countdown-unit'>دقیقه</div> </div></div><div class='countdown-section'><div><div class='countdown-number'>%S</div> <div class='countdown-unit'>ثانیه</div> </div></div>"
                                )
                            );
                        });
                    }
                }
                let specialOfferTime='<?php echo $specialOfferTime;?>';
                posterCountdown('.sale-countdown-<?= $rand;?>',specialOfferTime);
            })
        </script>
    <!-- End Flash Sale Area  -->
<?php endif ;?>
        <?php

    }

}