<?php
namespace Elementor;
class Special_Offer extends Widget_Base {

    public function get_name() {
        return 'special_offer';
    }

    public function get_title() {
        return 'پیشنهاد ویژه';
    }

    public function get_icon() {
        return 'fal fa-calendar-times';
    }


    public function get_categories() {
        return ['digishop'];
    }
    protected function register_controls() {
        $this->start_controls_section(
            'special_offer_section',
            [
                'label' => esc_html__(  'پیشنهاد ویژه' ),
            ]
        );
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'تصویر' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'image_alt',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( ' متن جایگزین تصویر' ),
                'label_block'=>true
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
			'button_text',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'عنوان دکمه' ),
                'label_block'=>true
			]
		);
        $this->add_control(
			'button_link',
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
            'time',
            [
                'label' => __('تاریخ پایان'),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'setting',
            [
                'label' => esc_html__( 'تنظیمات' ),
            ]
        );
        $this->add_control(
			'countdown_bg',
			[
				'label' => esc_html__( 'رنگ پس زمینه  ', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .custom-axil-poster-countdown' => 'background-color: {{VALUE}}',
				],
				'default'=>'#e6e6e6'
			]
		);
        $this->add_control(
            'countdown_signal',
            [
                'label' => __( ' نمایش انیمیشن سیگنال', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'روشن', 'your-plugin' ),
                'label_off' => __( 'خاموش', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $rand=rand(100,1000);
        $specialOfferTime=$settings['time'] ?? '00-00-00';
        ?>
        <div class="axil-poster-countdown custom-axil-poster-countdown">
            <div class="container">
                <div class="poster-countdown-wrap bg-lighter custom-axil-poster-countdown">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6">
                            <div class="poster-countdown-content">
                                <div class="section-title-wrapper">
                                <span class="title-highlighter highlighter-secondary">
                                <?php
                                    \Elementor\Icons_Manager::render_icon( $settings['small_title_icon'], [ 'aria-hidden' => 'true' ] ); 
                                    echo $settings['small_title'];
                                ?>
                                </span>
                                <h3 class="title"><?php echo $settings['big_title'];?></h3>
                                </div>
                                <div class="poster-countdown-<?= $rand;?> countdown mb--40">
                                    <div class="countdown-section">
                                        <div><div class="countdown-number">00</div>
                                            <div class="countdown-unit">روز</div>
                                         </div>
                                        </div><div class="countdown-section"><div><div class="countdown-number">00</div> <div class="countdown-unit">ساعت</div> </div></div><div class="countdown-section"><div><div class="countdown-number">00</div> <div class="countdown-unit">دقیقه</div> </div></div><div class="countdown-section"><div><div class="countdown-number">00</div> <div class="countdown-unit">ثانیه</div> </div></div>
                                    </div>
                                <a href="<?php echo $settings['button_link'] ?>" class="axil-btn btn-bg-primary"><?php echo $settings['button_text'] ?></a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="poster-countdown-thumbnail">
                             <img src="<?php echo $settings['image']['url'] ;?>" alt="<?php echo $settings['image_alt'] ;?>">
                            <?php if($settings['countdown_signal']):?>
                                <div class="music-singnal">
                                    <div class="item-circle circle-1"></div>
                                    <div class="item-circle circle-2"></div>
                                    <div class="item-circle circle-3"></div>
                                    <div class="item-circle circle-4"></div>
                                    <div class="item-circle circle-5"></div>
                                </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function($){
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
                posterCountdown('.poster-countdown-<?= $rand;?>',specialOfferTime);
            })
        </script>
        <?php

    }

}