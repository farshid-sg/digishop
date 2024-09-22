<?php
namespace Elementor;
class Best_Comments extends Widget_Base {

    public function get_name() {
        return 'best_comments';
    }

    public function get_title() {
        return 'اسلایدر نظرات';
    }

    public function get_icon() {
        return 'far fa-comment';
    }


    public function get_categories() {
        return ['digishop'];
    }
    protected function register_controls() {
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__( 'اسلایدر نظرات' ),
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
        $repeater=new \Elementor\Repeater();
        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'عکس کاربر ' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'name',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( ' نام کاربر' ),
                'label_block'=>true
			]
		);
        $repeater->add_control(
			'job',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( ' شغل کاربر' ),
                'label_block'=>true
			]
		);
        $repeater->add_control(
			'text',
			[
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label' => esc_html__( ' دیدگاه کاربر' ),
                'label_block'=>true
			]
		);
        $this->add_control(
			'comments',
			[
				'label' => esc_html__( 'دیدگاه' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => 'دیدگاه',
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
					'{{WRAPPER}} .axil-testimoial-area .axil-slick-arrow .slide-arrow:before' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .axil-testimoial-area .axil-slick-arrow .slide-arrow' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .axil-testimoial-area .slick-dots li button:before' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .axil-testimoial-area .slick-dots li.slick-active button:before' => 'color: {{VALUE}}',
				],
				'default'=>'#292930'
			]
		);
        $this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'رنگ پس زمینه  ', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .axil-testimoial-area' => 'background-color: {{VALUE}}',
				],
				'default'=>'#f9f3f0'
			]
		);
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
         <!-- Start Testimonila Area  -->
  <div class="axil-testimoial-area axil-section-gap bg-vista-white">
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
                <!-- End .section-title -->
                <div
                    class="testimonial-slick-activation testimonial-style-one-wrapper slick-layout-wrapper--20 axil-slick-arrow arrow-top-slide">
                    <?php foreach($settings['comments'] as $comment): ?>
                    <div class="slick-single-layout testimonial-style-one">
                        <div class="review-speech">
                            <p><?php echo $comment['text'];?></p>
                        </div>
                        <div class="media">
                            <div class="thumbnail">
                                <img src="<?php echo $comment['image']['url'];?>" alt="<?php echo $comment['name'];?>">
                            </div>
                            <div class="media-body">
                                <span class="designation"><?php echo $comment['job'];?></span>
                                <h6 class="title"><?php echo $comment['name'];?></h6>
                            </div>
                        </div>
                        <!-- End .thumbnail -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <?php endforeach ;?>
                </div>
            </div>
    </div>
        <!-- End Testimonila Area  -->
       
        <script>
            jQuery(document).ready(function($){
                $('.testimonial-slick-activation').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 2,
                arrows: <?php if ($settings['slider_arrows']) {echo "true"; } else {echo "false"; }?>,
                dots:  <?php if ($settings['slider_dots']) {echo "true"; } else {echo "false"; }?>,
                autoplay: <?php if ($settings['slider_autoplay']) {echo "true"; } else {echo "false"; }?>,
                speed: 500,
                draggable: true,
                rtl: true,
                nextArrow: '<button class="slide-arrow prev-arrow"><i class="fal fa-long-arrow-right"></i></button>',
                prevArrow: '<button class="slide-arrow next-arrow"><i class="fal fa-long-arrow-left"></i></button>',
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }
                ]
            });
            })
        </script>
        <?php

    }

}