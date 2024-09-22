<?php
$products_options=[
    'post_type'=>'product',
    'posts_per_page'=>12,
];
$products=new WP_Query($products_options);
if($products->have_posts()):
?>
 <!-- Start Expolre Product Area  -->
 <div class="axil-product-area bg-color-white axil-section-gap">
        <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i>
                        محصولات</span>
                    <h2 class="title">محصولات ما را کاوش کنید</h2>
                </div>
                <div
                    class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="row row--15">
                            <?php  while($products->have_posts()):$products->the_post();?>
                             <?php get_template_part('template/product/main');?>
                            <?php endwhile; wp_reset_postdata(); ?>
                            <!-- End Single Product  -->
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center mt--20 mt_sm--0">
                        <a href="shop.html" class="axil-btn btn-bg-lighter btn-load-more">نمایش تمام محصولات</a>
                    </div>
                </div>

        </div>
</div>
    <!-- End Expolre Product Area  -->
<?php endif;?>