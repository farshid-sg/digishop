<?php
namespace Elementor;
class Service_Box extends Widget_Base {

    public function get_name() {
        return 'service-box';
    }

    public function get_title() {
        return 'باکس سرویس';
    }

    public function get_icon() {
        return 'fal fa-th-large';
    }


    public function get_categories() {
        return ['digishop'];
    }
    protected function register_controls() {
        $this->start_controls_section(
            'service_section_1',
            [
                'label' => esc_html__( 'باکس سرویس' ),
               // 'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'image',
			[
				'label' => esc_html__( 'تصویر ' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
        );
        $repeater->add_control(
            'title',
            [
                'label' => __( 'عنوان باکس' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default'=>__(' ارسال رایگان'),
                'placeholder'=>__(' متن عنوان'),
            ]
        );
        $repeater->add_control(
            'subtitle',
            [
                'label' => __( 'زیر عنوان باکس' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default'=>__('در سراسر کشور'),
                'placeholder'=>__('  متن زیر عنوان'),
            ]
        ); 
        $this->add_control(
			'servicesItem',
			[
				'label' => esc_html__( 'سرویس ها' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ title }}}',
			]
		);
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="service-area">
                <div class="container">
                    <div class="row justify-content-center row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
                        <?php foreach($settings['servicesItem'] as $service): ?>
                        <div class="col">
                            <div class="service-box service-style-2">
                                <div class="icon">
                                    <?php echo wp_get_attachment_image($service['image']['id'], 'orginal');?>
                                </div>
                                <div class="content">
                                    <h6 class="title"><?php echo $service['title']?></h6>
                                    <p><?php echo $service['subtitle'];?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <?php

    }

}