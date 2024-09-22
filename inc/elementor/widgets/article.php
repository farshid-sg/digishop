<?php
namespace Elementor;
class Article extends Widget_Base
{

    public function get_name()
    {
        return "articles";
    }

    public function get_title()
    {
        return ' مقالات';
    }

    public function get_icon()
    {
        return "fas fa-book";
    }

    public function get_categories()
    {
        return ['digishop'];
    }

    public function get_keywords()
    {
    }

    public function post_cats()
    {
        $post_cat = [];
        $categories = get_terms(['taxonomy' => 'category', 'hide_empty' => true]);
        if (!is_wp_error($categories) && !empty($categories)) {
            foreach ($categories as $category) {
                $post_cat[$category->term_id] = $category->name;
            }
        }
        return $post_cat;
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__(' مقالات', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
            'articles_count',
            [
                'label' => esc_html__('تعداد مقالات', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => '3'
            ]
        );
        $this->add_control(
            'articles_sort',
            [
                'label' => __('نمایش پست‌ها بر اساس:'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'publish_date',
                'options' => [
                    'publish_date' => __('پست‌های اخیر'),
                    'rand' => __('پست‌های تصادفی'),
                    'modified' => __('پست‌های بروز شده'),
                ]
            ]
        );
        $this->add_control(
            'articles_cat',
            [
                'label' => __('دسته‌بندی پست‌ها'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'description' => 'دسته‌بندی‌های خالی در این بخش نمایش داده نمی‌شوند',
                'multiple' => true,
                'options' => $this->post_cats()
            ]
        );
        $this->add_control(
            'show_article_cat',
            [
                'label' => __( ' نمایش  دسته بندی خبر', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'روشن', 'your-plugin' ),
                'label_off' => __( 'خاموش', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $post_sort = $settings['articles_sort'];
        $post_count = $settings['articles_count'];
        $post_cat = $settings['articles_cat'];
        $query_options = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => $post_sort,
            'order' => 'DESC',
            'posts_per_page' => $post_count,
            'cat' => $post_cat
        );
        $articles = new \WP_Query($query_options);

        if ($articles->have_posts()) :

?>
            <!--   start articles-->
            <div class="axil-section-gap">
            <div class="container">
                <div class="section-title-wrapper section-title-center">
                <span class="title-highlighter highlighter-secondary"> 
                        <?php
                            \Elementor\Icons_Manager::render_icon( $settings['small_title_icon'], [ 'aria-hidden' => 'true' ] ); 
                             echo $settings['small_title'];
                        ?>
                </span>
                 <h3 class="title"><?php echo $settings['big_title'];?></h3>
                </div>
                <div class="row g-5 justify-content-center">
                    <?php while($articles->have_posts()):$articles->the_post()?>
                    <div class="col-lg-4">
                        <div class="content-blog blog-grid">
                            <div class="inner">
                                <div class="thumbnail">
                                    <?php if(has_post_thumbnail()): ?>
                                    <a href="<?php the_permalink();?>">
                                        <?php the_post_thumbnail('post');?>
                                    </a>
                                    <?php endif;?>
                                    <?php if($settings['show_article_cat']): ?>
                                    <div class="blog-category">
                                        <?php the_category('','',get_the_ID()); ?>
                                    </div>
                                    <?php endif;?>
                                </div>
                                <div class="content">
                                    <h5 class="title">
                                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                        </h5>
                                    <div class="read-more-btn">
                                        <a class="axil-btn right-icon" href="<?php the_permalink();?>">بیشتر بخوانید <i class="fal fa-long-arrow-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;wp_reset_postdata();?>
                </div>
            </div>
           </div>
            <!--   end articles-->

<?php endif;
    }
}
