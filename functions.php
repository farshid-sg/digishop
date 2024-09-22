<?php
define('DIGI_TDU',get_template_directory_uri().'/');
define('DIGI_TD',get_template_directory().'/');
//Theme Script

function digi_script(){
    //css
    wp_enqueue_style('bootstrap-rtl',DIGI_TDU.'assets/css/vendor/bootstrap.rtl.min.css');
    wp_enqueue_style('digi-font-awesome',DIGI_TDU.'assets/css/vendor/font-awesome.css');
    wp_enqueue_style('flaticon',DIGI_TDU.'assets/css/vendor/flaticon/flaticon.css');
    wp_enqueue_style('slick',DIGI_TDU.'assets/css/vendor/slick.css');
    wp_enqueue_style('slick-theme',DIGI_TDU.'assets/css/vendor/slick-theme.css');
	// wp_enqueue_style('jquery-ui',DIGI_TDU.'assets/css/vendor/jquery-ui.min.css');
   // wp_enqueue_style('sal',DIGI_TDU.'assets/css/vendor/sal.css');
   // wp_enqueue_style('magnific',DIGI_TDU.'assets/css/vendor/magnific-popup.css');
   // wp_enqueue_style('base',DIGI_TDU.'assets/css/vendor/base.css');
   wp_enqueue_style('style',DIGI_TDU.'assets/css/style.css');
    //js
    // wp_enqueue_script('modernizr',DIGI_TDU.'assets/js/vendor/modernizr.min.js',['jquery'],'1.0.0',true);
    wp_enqueue_script('popper',DIGI_TDU.'assets/js/vendor/popper.min.js',['jquery'],'1.0.0',true);
    wp_enqueue_script('bootstrap',DIGI_TDU.'assets/js/vendor/bootstrap.min.js',[],'5.1.0',true);
    wp_enqueue_script('slick',DIGI_TDU.'assets/js/vendor/slick.min.js',['jquery'],'1.0.0',true);
    // wp_enqueue_script('jquery-ui',DIGI_TDU.'assets/js/vendor/jquery-ui.min.js',['jquery'],'1.0.0',true);
    wp_enqueue_script('countdown',DIGI_TDU.'assets/js/vendor/jquery.countdown.min.js',['jquery'],'1.0.0',true);
    // wp_enqueue_script('sal',DIGI_TDU.'assets/js/vendor/sal.js',['jquery'],'1.0.0',true);
    // wp_enqueue_script('magnific',DIGI_TDU.'assets/js/vendor/jquery.magnific-popup.min.js',['jquery'],'1.0.0',true);
    wp_enqueue_script('imagesloaded',DIGI_TDU.'assets/js/vendor/imagesloaded.pkgd.min.js',[],'1.0.0',true);
    // wp_enqueue_script('isotope.pkgd',DIGI_TDU.'assets/js/vendor/isotope.pkgd.min.js',[],'1.0.0',true);
    // wp_enqueue_script('counterup',DIGI_TDU.'assets/js/vendor/counterup.js',['jquery'],'1.0.0',true);
    // wp_enqueue_script('waypoints',DIGI_TDU.'assets/js/vendor/waypoints.min.js',['jquery'],'1.0.0',true);
    wp_enqueue_script('rtl-main',DIGI_TDU.'assets/js/rtl-main.js',['jquery'],'1.0.0',true);
}
add_action('wp_enqueue_scripts','digi_script');

function img_uploader(){
    wp_enqueue_media();
    wp_enqueue_script('adsScript', DIGI_TDU . 'assets/js/uploader.js');
}
add_action('admin_enqueue_scripts', 'img_uploader');


//wishlist ajax script
function digishop_ajax_script(){
    wp_register_script('digi-ajax',DIGI_TDU.'assets/js/digi-ajax.js',['jquery'],'1.0.0',true);
    $script_data_array=['ajaxurl'=>admin_url('admin-ajax.php')];
    wp_localize_script('digi-ajax','digiproduct',$script_data_array);
    wp_enqueue_script('digi-ajax');
}
add_action('wp_enqueue_scripts','digishop_ajax_script');
if(class_exists('JVM_WooCommerce_Wishlist')){
    add_action('wp_ajax_digi_ajax_wishlist_number','digi_ajax_wishlist_number_callback');
    add_action('wp_ajax_nopriv_digi_ajax_wishlist_number','digi_ajax_wishlist_number_callback');
}
function digi_ajax_wishlist_number_callback(){
    $wish_count=jvm_woocommerce_wishlist_get_count();
    $response=['count'=>$wish_count];
    echo json_encode($response);
    wp_die();
}
//setup
function digi_setup(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('widgets');
    add_image_size('post',308,173,true);
    add_image_size('product',255,255,true);
    add_image_size('small-product',120,120,true);
    add_image_size('sidebar',120,77,true);
     //woocommerce
     add_theme_support('woocommerce');
     add_theme_support('wc_product_gallery_zoom');
     add_theme_support('wc_product_gallery_lightbox');
     add_theme_support('wc_product_gallery_slider');
    //menus
    register_nav_menus([
        'main_menu'=>'منوی اصلی',
        'topbar_menu'=>'منوی بالای سایت',
    ]);
    //widgets
    register_sidebar([
        'name'=>'تماس با ما فوتر',
        'id'=>'footer_contact',
        'before_widget'=>'<div class="col-lg-3 col-sm-6"><div class="axil-footer-widget">',
        'after_widget'=>'</div></div>',
        'before_title'=>'<h5 class="widget-title">',
        'after_title'=>'</h5>'
    ]);
    register_sidebar([
        'name'=>'منوی فوتر 2',
        'id'=>'footer_menu2',
        'before_widget'=>'<div class="col-lg-3 col-sm-6"><div class="axil-footer-widget">',
        'after_widget'=>'</div></div>',
        'before_title'=>'<h5 class="widget-title">',
        'after_title'=>'</h5>'
    ]);
    register_sidebar([
        'name'=>'منوی فوتر 3',
        'id'=>'footer_menu3',
        'before_widget'=>'<div class="col-lg-3 col-sm-6"><div class="axil-footer-widget">',
        'after_widget'=>'</div></div>',
        'before_title'=>'<h5 class="widget-title">',
        'after_title'=>'</h5>'
    ]);
    register_sidebar([
        'name'=>'منوی فوتر 4',
        'id'=>'footer_menu4',
        'before_widget'=>'<div class="col-lg-3 col-sm-6"><div class="axil-footer-widget">',
        'after_widget'=>'</div></div>',
        'before_title'=>'<h5 class="widget-title">',
        'after_title'=>'</h5>'
    ]);
    register_sidebar([
        'name'=>'شبکه های اجتماعی فوتر',
        'id'=>'footer-social',
        'before_widget'=>'<div class="col-xl-4">',
        'after_widget'=>'</div>',
        'before_title'=>'',
        'after_title'=>''
    ]);
    register_sidebar([
        'name'=>'نمادهای فوتر',
        'id'=>'symbols',
        'before_widget'=>'',
        'after_widget'=>'',
        'before_title'=>'',
        'after_title'=>''
    ]);
    register_sidebar([
        'name'=>'سایدبار صفحه سینگل',
        'id'=>'sidebar',
        'before_widget'=>'<div  class="axil-single-widget mt--40">',
        'after_widget'=>'</div>',
        'before_title'=>'<h6 class="widget-title">',
        'after_title'=>'</h6>'
    ]);
    register_sidebar([
        'name'=>'سایدبار فروشگاه',
        'id'=>'shop',
        'before_widget'=>'<div  id="%1$s" class="%2$s ">',
        'after_widget'=>'</div>',
        'before_title'=>'<h6 class="title mb-5">',
        'after_title'=>'</h6>',
    ]);
}
//get menu id
function get_menu_id($menu_location){
    $location=get_nav_menu_locations();
    $menu_id=$location[$menu_location];
    return $menu_id;
}
//get child menu
function get_child_menu_items($menu_array,$parent_id){
    $child_menus=[];
    if(!empty($menu_array) && is_array($menu_array)){
        foreach($menu_array  as $item){
            if(intval($item->menu_item_parent) === $parent_id){
                array_push($child_menus,$item);
            }
        }
    }
    return $child_menus;
}
add_action('after_setup_theme','digi_setup');

//get product percentage
// function product_percentage($product){
//     var_dump($product);
//     $price=intval($product->regular_price);
//     $sale=intval($product->sale_price);
//     $saving=$price - $sale;
//     $percentage=round(($saving / $price) * 100);
//     return $percentage.'%';
// }


//woocommerce mini cart add item with ajax
add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {
    ob_start();
    ?>
    <span class="count custom-cart-count">
        <?php echo WC()->cart->get_cart_contents_count();?>
    </span>
    <?php $fragments['span.custom-cart-count'] = ob_get_clean();
    return $fragments;
} );
add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {
    ob_start();
    ?>
    <div class="cart-body custom-cart-body">
        <?php woocommerce_mini_cart(); ?>
    </div>
    <?php $fragments['div.custom-cart-body'] = ob_get_clean();
    return $fragments;
} );
//check product is in cart
function product_in_cart($product_id){
    include_once WC_ABSPATH.'includes/wc-cart-functions.php';
	include_once WC_ABSPATH.'includes/class-wc-cart.php';
    if(is_null(WC()->cart)){
        wc_load_cart();
    };
   return WC()->cart->find_product_in_cart(WC()->cart->generate_cart_id($product_id)) != null ;
}

//includes
if(!class_exists('ReduxFramework') && file_exists(dirname(__FILE__).'/inc/redux/ReduxCore/framework.php')){
    require_once dirname(__FILE__).'/inc/redux/ReduxCore/framework.php';
}
if(!isset($redux_demo) && file_exists(dirname(__FILE__).'/inc/redux/sample/sample-config.php')){
   require_once dirname(__FILE__).'/inc/redux/sample/sample-config.php';
}

include DIGI_TD.'inc/custom-style.php';
include DIGI_TD.'inc/widgets/widget-footer-social.php';
include DIGI_TD.'inc/widgets/widget-posts.php';
include DIGI_TD.'inc/widgets/widget-products.php';
include DIGI_TD.'inc/functions/comment-template.php';
include DIGI_TD.'inc/post-meta/thumbnail.php';
include DIGI_TD.'inc/functions/live-search.php';
if(did_action('elementor/loaded')){
    require_once DIGI_TD.'inc/elementor/elementor.php';
}

//woocommerce

add_action( 'woocommerce_before_add_to_cart_quantity','start_add_to_cart_quantity' );

add_action('woocommerce_after_add_to_cart_quantity','end_add_to_cart_quantity');

function start_add_to_cart_quantity(){
    echo '<div  class="pro-qty d-flex justify-content-between">';
}
function end_add_to_cart_quantity(){
    echo '</div>';
}
//my-account
add_action( 'woocommerce_before_account_navigation','digi_before_account_nav');
function digi_before_account_nav(){
    $user=wp_get_current_user();
    $userImg=get_avatar(get_current_user_id(),120,'','');?>
    <div class="axil-dashboard-warp">
    <div class="axil-dashboard-author">
        <div class="media">
            <div class="thumbnail">
                <?php echo $userImg;//user_email user_registered?>
            </div>
            <div class="media-body">
                <h5 class="title mb-0"><?php echo $user->display_name;?></h5>
                <?php if(function_exists('parsidate')): ?>
                <span class="joining-date">
                    عضو <?php bloginfo('name') ?> از   <?php echo parsidate('j F, Y',$user->user_registered,'per'); ?>
                </span>
                <?php else: ?>
                <span class="joining-date">
                    عضو <?php bloginfo('name') ?> از  <?php echo $user->user_registered;?>
                </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
    <?php
}


//compare

//Remove Compare button product archive pages
if (defined('WCCM_VERISON')) {
    remove_action('woocommerce_before_shop_loop', 'wccm_register_add_compare_button_hook');
    remove_action('woocommerce_single_product_summary', 'wccm_add_single_product_compare_buttton', 35);
    remove_action('woocommerce_before_shop_loop', 'wccm_render_catalog_compare_info');
    remove_action('wp_enqueue_scripts', 'wccm_enqueue_catalog_scripts');
    remove_action('widgets_init', 'wccm_widgets_init');
}

//Product Compare on product archive pages
if (defined('WCCM_VERISON')) {
    add_action('wp_ajax_digi_ajax_compare', 'digi_ajax_compare_callback');
    add_action('wp_ajax_nopriv_digi_ajax_compare', 'digi_ajax_compare_callback');
}
function digi_ajax_compare_callback()
{

    $product_id = $_POST['id'];
    if (in_array($product_id, wccm_get_compare_list())) {
        digi_remove_product_from_compare_list($product_id);
        $compare_title = __('Compare Product');
        //$compare_class = " out-compare";
    } else {
        digi_add_product_to_compare_list($product_id);
        $compare_title = __('Remove From Compare');
        //$compare_class = " in-compare";
    }

    $compare_count = count(wccm_get_compare_list());
    $compare_url = wccm_get_compare_page_link(wccm_get_compare_list());


    $arr_response = array();

    $arr_response = array(
        'title' => $compare_title,
        'conut' => $compare_count,
        'compare_url' => $compare_url,
        //'compare_class' => $compare_class,
    );

    echo json_encode($arr_response);

    wp_die();
}

//Add Product to compare list function
function digi_add_product_to_compare_list($product_id)
{
    $product = wc_get_product($product_id);
    if (!$product) {
        return;
    }

    $list = wccm_get_compare_list();
    $list[] = $product_id;

    wccm_set_compare_list($list);
}

//Remove Product from compare list function
function digi_remove_product_from_compare_list($product_id)
{
    $list = wccm_get_compare_list();
    foreach (wp_parse_id_list($product_id) as $product_id) {
        $key = array_search($product_id, $list);
        if ($key !== false) {
            unset($list[$key]);
        }
    }
    wccm_set_compare_list($list);
}
//Product Compare url and number
if (defined('WCCM_VERISON')) {
    add_action('wp_ajax_digi_ajax_compare_number', 'digi_ajax_compare_number_callback');
    add_action('wp_ajax_nopriv_digi_ajax_compare_number', 'digi_ajax_compare_number_callback');
}
function digi_ajax_compare_number_callback()
{
    $compare_count = count(wccm_get_compare_list());
    $compare_url = wccm_get_compare_page_link(wccm_get_compare_list());
    $response = array();
    $response = array(
        'conut' => $compare_count,
        'compare_url' => $compare_url,
    );
    echo json_encode($response);
    wp_die();
}

//auto redirect after logout
add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
    wp_redirect(home_url());
    exit;
}

