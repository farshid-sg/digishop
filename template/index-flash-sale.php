<?php
$products_options = array(
    'post_type'      => 'product',
    'meta_query'     => array(
        'relation' => 'OR',
        array( // Simple products type
            'key'           => '_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
        ),
        array( // Variable products type
            'key'           => '_min_variation_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
        )
    )
);

$products=new WP_Query($products_options);
if($products->have_posts()):
?>
 <!-- start Flash Sale Area  -->
 <div
            class="axil-new-arrivals-product-area fullwidth-container flash-sale-area bg-color-white axil-section-gap pb--0">
            <div class="container ml--xxl-0">
                <div class="product-area pb--50">
                    <div class="d-md-flex align-items-end flash-sale-section">
                        <div class="section-title-wrapper">
                            <span class="title-highlighter highlighter-primary"><i class="fas fa-fire"></i> امروز</span>
                            <h2 class="title">پیشنهاد های ویژه</h2>
                        </div>
                        <div class="sale-countdown countdown"></div>
                    </div>
                    <div
                        class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                        <?php while($products->have_posts()): $products->the_post();?>
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                <?php if(has_post_thumbnail()): ?>
                                    <a href="<?php the_permalink();?>">
                                    <?php
                                        the_post_thumbnail('product',[
                                            'class'=>'sal-animate',
                                            'data-sal'=>'zoom-out',
                                            'data-sal-delay'=>"100",
                                            'data-sal-duration'=>'1500',
                                        ]);?>
                                    </a>
                                    <?php endif;?>
                                    <?php get_template_part('template/product/sale');?>
                                    <?php get_template_part('template/product/action');?>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <?php get_template_part('template/product/content');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .slick-single-layout -->
                        <?php endwhile;wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
    </div>
    <!-- End Flash Sale Area  -->
<?php endif ;?>