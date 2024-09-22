<?php

class My_Elementor_Widgets {

    protected static $instance = null;

    public static function get_instance() {
        if ( ! isset( static::$instance ) ) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    protected function __construct() {
        require_once('widgets/services.php');
        require_once('widgets/main-slider1.php');
        require_once('widgets/main-slider2.php');
        require_once('widgets/category.php');
        require_once('widgets/special-offer.php');
        require_once('widgets/slider-special-offer.php');
        require_once('widgets/product.php');
        require_once('widgets/article.php');
        require_once('widgets/best-products.php');
        require_once('widgets/product-slider.php');
        require_once('widgets/best-comments.php');
        require_once('widgets/newsletter.php');
        require_once('widgets/contact-us.php');
        require_once('widgets/menu.php');
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
    }

    public function register_widgets() {
       \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Service_Box() );
       \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Main_Slider1() );
       \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Main_Slider2() );
       \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Category() );
       \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\special_offer() );
       \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Slider_Special_Offer() );
       \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Product() );
       \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Article() );
       \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Best_Products() );
       \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Product_Slider() );
       \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Best_Comments() );
       \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Newsletter() );
       \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Contact_Us() );
       \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Menu() );
    }

}

add_action( 'init', 'my_elementor_init' );
function my_elementor_init() {
    My_Elementor_Widgets::get_instance();
}

function add_elementor_widget_categories( $elements_manager ) {

    $elements_manager->add_category(
        'digishop',
        [
            'title' => __( 'دی جی شاپ' ),
            'icon' => 'fa fa-plug',
        ]
    );

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );

//Disable Elementor Google Fonts
add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );

//Register Elementor Panel styles
add_action('elementor/editor/before_enqueue_scripts', function() {
    wp_register_style('digi-awe', DIGI_TDU . 'assets/css/vendor/font-awesome.css', array() , 1);
    wp_enqueue_style('digi-awe');
});