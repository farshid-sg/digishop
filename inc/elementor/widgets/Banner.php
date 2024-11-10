<?php
class Banner extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return "Banner";
    }

    public function get_title()
    {
        return ' بنر';
    }

    public function get_icon()
    {
        return "far fa-id-card";
    }

    public function get_categories()
    {
        return ['weblearning'];
    }

    public function get_keywords()
    {
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_banner',
            [
                'label' => esc_html__(' بنر انیمیشنی', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'section_banner_title',
            [
                'label' => esc_html__('عنوان', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'section_banner_text',
            [
                'label' => esc_html__('متن', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );
        $this->add_control(
            'section_banner_btn',
            [
                'label' => esc_html__('متن دکمه', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'section_banner_link',
            [
                'label' => esc_html__('لینک دکمه', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::TEXT,

            ]
        );
        $this->add_control(
            'section_banner_img',
            [
                'label' => esc_html__(' تصویر اصلی', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'section_banner_img_animation',
            [
                'label' => esc_html__(' تصویر انیمیشنی', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                //'default' => [
                  //  'url' => \Elementor\Utils::get_placeholder_image_src(),
               // ],
            ]
        );
        $this->end_controls_section();
		//STYLE
		$this->start_controls_section(
        'section_banner_style',
        [
        'label'  => __( 'استایل', 'demo-elementor-widget' ),
        'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ]
        ); 
		$this->add_control(
			'section_banner_bgcolor',
			[
				'label' => esc_html__( 'رنگ پس زمینه بنر ', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .banner' => 'background-color: {{VALUE}}',
				],
				'default'=>'#d3f4f2'
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .banner__text',
			]
		);
		$this->add_control(
			'section_banner_title_size',
			[
				'label' => esc_html__( 'سایز فونت عنوان', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '4.5rem', 'plugin-name' ),
			]
		);
		$this->add_control(
			'section_banner_btn_bgcolor',
			[
				'label' => esc_html__( 'رنگ پس زمینه دکمه', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom-btn-banner' => 'background-color: {{VALUE}}',
				],
				'default'=>'#d3f4f2'
			]
		);
		$this->add_control(
			'section_banner_btn_hover_bgcolor',
			[
				'label' => esc_html__( 'رنگ پس زمینه هاور دکمه', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom-btn-banner::after' => 'background-color: {{VALUE}}',
				],
				'default'=>'#d3f4f2'
			]
		);
		$this->add_control(
			'section_banner_btn_color',
			[
				'label' => esc_html__( 'رنگ متن دکمه', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom-btn-banner' => 'color: {{VALUE}}',
				],
				'default'=>'#d3f4f2'
			]
		);
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
?>
        <!--       start banner-->
		<!-- <style>
			.banner__cta .btn{
				background-color:<?= $settings['section_banner_btn_bgcolor'];?>;
				color:<?= $settings['section_banner_btn_color'];?>
			}
			.banner__cta .btn::after{
				background-color:<?= $settings['section_banner_btn_hover_bgcolor'];?>;
			}
			.banner__cta .banner__intro{
				font-size:<?= $settings['section_banner_title_size'];?>
			}
		</style> -->
        <section class="banner">
            <div class="container flex">
                <div class="banner__cta">
                    <div class="banner__intro-container">
                        <h2 class="banner__intro"><?= $settings['section_banner_title'];?></h2>
                    </div>

                    <h3 class="banner__text">
                        <?= $settings['section_banner_text']; ?>
                    </h3>
					<?php if(!empty($settings['section_banner_btn'])):?>
                    <a href="<?= $settings['section_banner_link'];?>" class="btn btn__swipe custom-btn-banner">
                        <span><?= $settings['section_banner_btn'];?></span>
                    </a>
					<?php endif;?>
                </div>
                <div class="banner__rocket-bg"  <?php if(!empty($settings['section_banner_img'])){
                    ?>
                    style="background-image:url(<?= $settings['section_banner_img']['url']; ?>)"
                    <?php
                };?>>
				<?php if(!empty($settings['section_banner_img_animation'])):?>
                    <div class="banner__rocket" <?php if(!empty($settings['section_banner_img_animation'])){
                    ?>
                    style="background-image:url(<?= $settings['section_banner_img_animation']['url']; ?>)"
                    <?php
                };?>
					></div>
					<?php endif;?>
                </div>
            </div>
        </section>
        <!--        end banner-->





<?php
    }
    protected function content_template()
    {
    }
}
