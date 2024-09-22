<?php
$products_options=[
    'post_type' => 'product',
    'meta_key' => 'total_sales',
    'orderby' => 'meta_value_num',
    'posts_per_page' => 12,
];
$products=new WP_Query($products_options);
if($products->have_posts()):
?>
 <!-- Start Most Sold Product Area  -->
 <div class="axil-most-sold-product axil-section-gap">
            <div class="container">
                <div class="product-area pb--50">
                    <div class="section-title-wrapper section-title-center">
                        <span class="title-highlighter highlighter-primary"><i class="fas fa-star"></i> پرفروش ها</span>
                        <h2 class="title">پرفروش های فروشگاه eTrade</h2>
                    </div>
                    <div class="row row-cols-xl-2 row-cols-1 row--15">
                    <?php while($products->have_posts()): $products->the_post();?>
                    <?php global $product; ?>
                        <div class="col">
                            <div class="axil-product-list">
                            <?php if(has_post_thumbnail()): ?>
                                <div class="thumbnail">
                                    <a href="<?php the_permalink();?>">
                                    <?php
                                        the_post_thumbnail('small-product',[
                                            'data-sal'=>'zoom-in',
                                            'data-sal-delay'=>"100",
                                            'data-sal-duration'=>'1000',
                                        ]);?>
                                    </a>
                                </div>
                                <?php endif;?>
                                <div class="product-content ">
                                <?php get_template_part('template/product/content');?>
                                    <div class="product-cart">
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
                                        <?php if (class_exists( 'JVM_WooCommerce_Wishlist') ){?>
                                            <?php echo do_shortcode("[jvm_woocommerce_add_to_wishlist]");?>
                                        <?php } ?>                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile;wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Most Sold Product Area  -->
<?php 
endif;
?>