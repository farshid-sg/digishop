<?php
namespace Elementor;
class Contact_Us extends Widget_Base {

    public function get_name() {
        return 'contact_us';
    }

    public function get_title() {
        return 'تماس با ما';
    }

    public function get_icon() {
        return 'fas fa-box-open';
    }


    public function get_categories() {
        return ['digishop'];
    }
    protected function register_controls() {
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__( 'تماس با ما' ),
               // 'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'title',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'عنوان ' ),
                'label_block'=>true
			]
		);
        $this->add_control(
			'subtitle',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'زیر عنوان' ),
                'label_block'=>true
			]
		);
        $this->add_control(
            'shortcode',
            [
                'label' => esc_html__('شورت کد فرم تماس 7', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="contact-form">
            <h3 class="title mb--10"><?php echo $settings['title'];?></h3>
            <p><?php echo $settings['subtitle'];?></p>
            <div id="contact-form" class="axil-contact-form">
                <?php echo do_shortcode($settings['shortcode']);?>
            </div>
        </div>

        <?php
    }
}