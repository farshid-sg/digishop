<?php
namespace Elementor;
class Newsletter extends Widget_Base {

    public function get_name() {
        return 'newsletter';
    }

    public function get_title() {
        return 'خبرنامه';
    }

    public function get_icon() {
        return 'fal fa-envelope';
    }


    public function get_categories() {
        return ['digishop'];
    }
    protected function register_controls() {
        $this->start_controls_section(
            'service_section_1',
            [
                'label' => esc_html__(  'خبرنامه'),
               // 'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'image',
			[
				'label' => esc_html__( 'تصویر پس زمینه ' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => DIGI_TDU.'assets/images/bg/bg-image-5.jpg'
				],
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
            'newsletter_shortcode',
            [
                'label' => esc_html__('کد کوتاه فرم تماس 7', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => ''
            ]
        );
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
         <!-- Start Axil Newsletter Area  -->
        <div class="axil-newsletter-area axil-section-gap pt--0">
                    <div class="container">
                        <div class="etrade-newsletter-wrapper bg_image bg_image--5" style="background-image:url(<?= $settings['image']['url'];?>)">
                            <div class="newsletter-content">
                            <span class="title-highlighter highlighter-secondary"> 
                            <?php
                                \Elementor\Icons_Manager::render_icon( $settings['small_title_icon'], [ 'aria-hidden' => 'true' ] ); 
                                echo $settings['small_title'];
                            ?>
                             </span>
                             <h3 class="title"><?php echo $settings['big_title'];?></h3>
                                <?php echo do_shortcode($settings['newsletter_shortcode']);?>
                            </div>
                        </div>
                    </div>
                    <!-- End .container -->
        </div>
        <!-- End Axil Newsletter Area  -->

        <?php

    }

}