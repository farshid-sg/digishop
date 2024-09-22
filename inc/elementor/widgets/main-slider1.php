<?php
namespace Elementor;
class Main_Slider1 extends Widget_Base {

	public function get_name() {
        return 'slider-1';
    }

	public function get_title() {
        return ' 1اسلایدر';
    }

	public function get_icon() {
        return 'fal fa-sliders-h';
    }

	public function get_categories() {
        return ['digishop'];
    }

	protected function register_controls() {
        $this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( ' 1اسلایدر' ),
			
			]
		);
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'تصویر اسلاید' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
			'small_title',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'عنوان کوچک' ),
                'label_block'=>true
			]
		);
        $repeater->add_control(
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
        $repeater->add_control(
			'big_title',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'عنوان بزرگ' ),
                'label_block'=>true
			]
		);
        $repeater->add_control(
			'price',
			[
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label' => esc_html__( ' قیمت محصول' ),
                'label_block'=>true
			]
		);
        $repeater->add_control(
			'btn_title',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'عنوان دکمه' ),
                'label_block'=>true
			]
		);
        $repeater->add_control(
			'btn_icon',
			[
				'label' => esc_html__( 'آیکون  دکمه', 'plugin-name' ),
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
        $repeater->add_control(
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
        $this->add_control(
			'slider1',
			[
				'label' => esc_html__( 'اسلایدر1' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ big_title }}}',
			]
		);
        $this->end_controls_section();
        $this->start_controls_section(
			'settings',
			[
				'label' => esc_html__( ' تنظیمات' ),
			
			]
		);
        $this->add_control(
			'bg_image1',
			[
				'label' => esc_html__( 'تصویر پس زمینه 1' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'bg_image2',
			[
				'label' => esc_html__( 'تصویر پس زمینه 2' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'رنگ پس زمینه  ', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider1' => 'background-color: {{VALUE}}',
				],
				'default'=>'#f9f3f0'
			]
		);
		$this->add_control(
            'slider_dots',
            [
                'label' => __( 'نقطه های زیر اسلایدر', 'plugin-domain' ),
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
			'dots_bg_color',
			[
				'label' => esc_html__( 'رنگ  نقطه ها  ', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .main-slider-large-thumb .axil-slick-dots .slick-dots li button' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .main-slider-large-thumb .axil-slick-dots .slick-dots li.slick-active button' => 'background-color: {{VALUE}}',
				],
				'default'=>'#292930'
			]
		);
        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display()
		?>
        <div class="axil-main-slider-area main-slider-style-1 slider1" >
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-sm-6">
                        <div class="main-slider-content">
                            <div class="slider-content-activation-one">
                                <?php $i=0;?>
                                <?php foreach($settings['slider1'] as $slider): ?>
                                <div class="single-slide slick-slide"
                                <?php if($i == 0): ?>
                                 data-sal="slide-up" data-sal-delay="400"
                                    data-sal-duration="800"
                                    <?php endif;?>
                                    >
                                    <span class="subtitle">
                                    <?php \Elementor\Icons_Manager::render_icon( $slider['small_title_icon'], [ 'aria-hidden' => 'true' ] ); 
                                    echo $slider['small_title'];
                                    ?> 
                                   </span>
                                    <h3 class="title"><?php echo $slider['big_title'];?></h3>
                                    <div class="slide-action">
                                        <div class="shop-btn">
                                            <a href="<?php echo $slider['big_link'];?>" class="axil-btn btn-bg-white">
                                                <?php
                                                  echo $slider['btn_title'];
												  \Elementor\Icons_Manager::render_icon( $slider['btn_icon'], [ 'aria-hidden' => 'true' ] ); 
                                                ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-6">
                        <div class="main-slider-large-thumb">
                            <div class="slider-thumb-activation-one axil-slick-dots">
                            <?php $i=0; foreach($settings['slider1'] as $slider): ?>
                                <div class="single-slide slick-slide"
                                <?php if($i == 0): ?>
                                 data-sal="slide-up" data-sal-delay="600"
                                    data-sal-duration="1500"
                                    <?php endif;?>>
                                    <?php echo wp_get_attachment_image($slider['image']['id'], 'orginal')  ?>
                                    <?php if(!empty($slider['price'])):?>
                                    <div class="product-price">
                                        <span class="text">شروع از</span>
                                        <span class="price-amount"><?php echo number_format($slider['price']);?> تومان </span>
                                    </div>
                                    <?php endif;?>
                                </div>
                                <?php $i++; endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(!empty($settings['bg_image1']['url']) || !empty($settings['bg_image2']['url'])):?>
            <ul class="shape-group">
                <?php if(!empty($settings['bg_image1']['url'])): ?>
                <li class="shape-1"><img src="<?php echo $settings['bg_image1']['url'];?>" alt="Shape"></li>
                <?php endif;?>
                <?php if(!empty($settings['bg_image2']['url'])): ?>
                <li class="shape-2"><img src="<?php echo $settings['bg_image2']['url'];?>" alt="Shape"></li>
               <?php endif;?>
            </ul>
            <?php endif;?>
</div>
<script>
    jQuery(document).ready(function($){
        $('.slider-thumb-activation-one').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                arrows: false,
                dots: <?php if ($settings['slider_dots']) {echo "true"; } else {echo "false"; }?>,
                focusOnSelect: true,
                speed: 1000,
                autoplay: <?php if ($settings['slider_autoplay']) {echo "true"; } else {echo "false"; }?>,
                rtl: true,
                asNavFor: '.slider-content-activation-one',
                prevArrow: '<button class="slide-arrow prev-arrow"><i class="fal fa-long-arrow-left"></i></button>',
                nextArrow: '<button class="slide-arrow next-arrow"><i class="fal fa-long-arrow-right"></i></button>',
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]

            });
        $('.slider-content-activation-one').slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: false,
                    focusOnSelect: false,
                    speed: 500,
                    fade: true,
                    autoplay: false,
                    asNavFor: '.slider-thumb-activation-one',
                });
    })
</script>
    <?php
    }


}