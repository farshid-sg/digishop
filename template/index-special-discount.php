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
        <!-- Start New Arrivals Product Area  -->
        <div class="axil-new-arrivals-product-area bg-color-white axil-section-gap pb--0">
            <div class="container">
                <div class="product-area pb--50">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>این
                            هفته</span>
                        <h2 class="title">تخفیف های ویژه</h2>
                    </div>
                    <div
                        class="new-arrivals-product-activation slick-layout-wrapper--30 axil-slick-arrow  arrow-top-slide">
                        <?php while($products->have_posts()): $products->the_post();?>
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-two">
                                <div class="thumbnail">
                                <?php if(has_post_thumbnail()): ?>
                                    <a href="<?php the_permalink();?>">
                                    <?php
                                        the_post_thumbnail('product',[
                                            'class'=>'sal-animate',
                                            'data-sal'=>'zoom-out',
                                            'data-sal-delay'=>"200",
                                            'data-sal-duration'=>'500',
                                        ]);?>
                                    </a>
                                <?php endif;?>
                                    <?php get_template_part('template/product/sale');?>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <?php get_template_part('template/product/content');?>
                                    <?php get_template_part('template/product/action');?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile;wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End New Arrivals Product Area  -->
<?php 
endif;?>
