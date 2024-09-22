<?php
namespace Elementor;
class Category extends Widget_Base {

	public function get_name() {
        return 'category-1';
    }

	public function get_title() {
        return ' دسته بندی محصولات';
    }

	public function get_icon() {
        return 'far fa-list-alt';
    }

	public function get_categories() {
        return ['digishop'];
    }

	protected function register_controls() {
        $this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( ' دسته بندی محصولات' ),
			
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
            'slider_arrows',
            [
                'label' => __( 'پیکان های اسلایدر', 'plugin-domain' ),
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
					'{{WRAPPER}} .custom-category .axil-slick-arrow .slide-arrow:before' => 'background-color: {{VALUE}}',
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
					'{{WRAPPER}} .custom-category .axil-slick-arrow .slide-arrow' => 'color: {{VALUE}}',
				],
				'default'=>'#292930'
			]
		);
       
        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();
        $rand=rand(100,10000);
        $taxonomy     = 'product_cat';
        $orderby      = 'name';  
        $show_count   = 0;      // 1 for yes, 0 for no
        $pad_counts   = 0;      // 1 for yes, 0 for no
        $hierarchical = 1;      // 1 for yes, 0 for no  
        $title        = '';  
        $empty        = 0;
        $args = array(
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty
        );
        $all_categories = get_categories( $args );
        if(!empty($all_categories)):
                ?>
                <div class="axil-categorie-area bg-color-white axil-section-gapcommon custom-category">
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
                <div class="categrie-product-activation-<?= $rand;?> slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    <?php
                    foreach($all_categories as $category):
                        $permalink=get_term_link($category->slug, 'product_cat');
                        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                        $image = wp_get_attachment_url( $thumbnail_id ); 
                        if($category->count > 0):
                    ?>
                    <div class="slick-single-layout">
                        <div class="categrie-product">
                            <a href="<?php echo $permalink;?>">
                                <img class="img-fluid" src="<?php echo $image;?>"
                                    alt="<?php echo $category->name;?>">
                                <h6 class="cat-title"><?php echo $category->name;?></h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <?php endif; endforeach;?>
                </div>
            </div>
          </div>
          <script>
                jQuery(document).ready(function($){
                    $('.categrie-product-activation-<?= $rand;?>').slick({
                    infinite: true,
                    slidesToShow: 7,
                    slidesToScroll: 3,
                    arrows: <?php if ($settings['slider_arrows']) {echo "true"; } else {echo "false"; }?>,
                    dots: false,
                    autoplay: <?php if ($settings['slider_autoplay']) {echo "true"; } else {echo "false"; }?>,
                    speed: 1000,
                    rtl: true,
                    nextArrow: '<button class="slide-arrow prev-arrow"><i class="fal fa-long-arrow-right"></i></button>',
                    prevArrow: '<button class="slide-arrow next-arrow"><i class="fal fa-long-arrow-left"></i></button>',
                    responsive: [
                        {
                            breakpoint: 1199,
                            settings: {
                                slidesToShow: 6,
                                slidesToScroll: 6
                            }
                        },
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 4
                            }
                        },
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3
                            }
                        },
                        {
                            breakpoint: 479,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 280,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },

                    ]
                });
                })
          </script>
    <?php
    endif;
    }


}