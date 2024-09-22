<?php
    global $product;
    $is_product_in_cart='';
    if(product_in_cart($product->id)){
        $is_product_in_cart='added';
    }
?>
<div class="product-hover-action">
    <ul class="cart-action">
        <?php if (defined('WCCM_VERISON')){
                $productID=$product->get_id();
                if(in_array($productID,wccm_get_compare_list())){
                    $compare_class='in-comapre';
                }else{
                    $compare_class='';
                }   
            ?>
        <li class="compare-ajax">
            <a  class="compare-ajax-btn  <?= $compare_class ?>" data-compare-id="<?= $productID ?>">
                <i class="fal fa-repeat"></i>
            </a>
        </li>
        <?php } ?>
        <li class="select-option">
            <div class="add-to-cart w-100">
                <?php 
                if($is_product_in_cart == ''){
                echo sprintf('<a href="%s" data-quantity="1" class="%s btn  rounded-pill fw-light'.$is_product_in_cart.'" %s><i class="fal fa-shopping-basket pe-2"></i>%s</a>',
                    esc_url($product->add_to_cart_url()),
                    esc_attr(implode(' ', array_filter(array(
                        'button', 'product_type_' . $product->get_type(),
                        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                        $product->supports('ajax_add_to_cart') ? 'ajax_add_to_cart' : '',
                    )))),
                    wc_implode_html_attributes(array(
                        'data-product_id' => $product->get_id(),
                        'data-product_sku' => $product->get_sku(),
                        'aria-label' => $product->add_to_cart_description(),
                        'rel' => 'nofollow',
                    )),
                    esc_html($product->add_to_cart_text())
                );
            }else{
                ?>
                <a href="<?php echo home_url('cart/'); ?>" class="added_to_cart wc-forward" title="مشاهده سبد خرید">مشاهده سبد خرید</a>
                <?php }?>
            </div>
        </li>
        <?php if (class_exists( 'JVM_WooCommerce_Wishlist') ){?>
        <li class="wishlist">
            <?php echo do_shortcode("[jvm_woocommerce_add_to_wishlist]");?>
        </li>
        <?php } ?>
    </ul>
</div>