<?php
namespace Elementor;
class Main_Slider2 extends Widget_Base {

	public function get_name() {
        return 'slider-2';
    }

	public function get_title() {
        return ' 2اسلایدر';
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
				'label' => esc_html__( ' 2اسلایدر' ),
			
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
			'slider2',
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
			'bg_color',
			[
				'label' => esc_html__( 'رنگ پس زمینه  ', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom-slider-box-wrap' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .axil-slick-dots .slick-dots li button' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .axil-slick-dots .slick-dots li.slick-active button' => 'background-color: {{VALUE}}',
				],
				'default'=>'#292930'
			]
		);
        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display()
		?>
          <div class="axil-main-slider-area main-slider-style-5">
            <div class="container">
                <div class="slider-box-wrap custom-slider-box-wrap">
                    <div class="slider-activation-two axil-slick-dots">
                        <?php foreach($settings['slider2'] as $slider2): ?>
                        <div class="single-slide slick-slide">
                            <div class="main-slider-content">
                                <span class="subtitle">
                                <?php \Elementor\Icons_Manager::render_icon( $slider2['small_title_icon'], [ 'aria-hidden' => 'true' ] ); 
                                    echo $slider2['small_title'];
                                    ?> 

                                </span>
                                <h3 class="title"><?php echo $slider2['big_title'];?></h3>
                                <div class="shop-btn">
                                     <a href="<?php echo $slider2['btn_link']['url'];?>" class="axil-btn btn-bg-white">
                                    <?php
                                        echo $slider2['btn_title'];
										\Elementor\Icons_Manager::render_icon( $slider2['btn_icon'], [ 'aria-hidden' => 'true' ] ); 
                                    ?>
                                    </a>
                                </div>
                            </div>
                            <div class="main-slider-thumb">
                                <?php echo wp_get_attachment_image($slider2['image']['id'], 'orginal')  ?>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function($){
                $('.slider-activation-two').slick({
                infinite: true,
                autoplay: <?php if ($settings['slider_autoplay']) {echo "true"; } else {echo "false"; }?>,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: <?php if ($settings['slider_dots']) {echo "true"; } else {echo "false"; }?>,
                fade: true,
                adaptiveHeight: true,
                cssEase: 'linear',
                speed: 400,
            });
            })
        </script>
    <?php
    }
}