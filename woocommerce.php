<?php
if(is_singular('product')):
get_header();
while(have_posts()):the_post();
global $product;
?>
<main>
    <?php get_template_part('template/breadcrumb/breadcrumb');?>
    <!-- Start Shop Area  -->
    <div class="axil-single-product-area bg-color-white">
            <div class="single-product-thumb axil-section-gap pb--30 pb_sm--20">
                <div class="container">
                <div class="row">
                        <div class="col-lg-5 mb--40">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php 
                                     $thumbs=[];
                                     $gallery=$product->get_gallery_image_ids(); 
                                    ?>
                                    <div class="axil-single-post post-formate post-gallery">
                                    <div class="container">
                                        <div class="content-block">
                                            <div class="inner">
                                                <div class="blog-gallery-activation axil-slick-arrow arrow-between-side">
                                                <?php foreach($gallery as $galleryId): ?>
                                                    <div class="post-thumbnail">
                                                    <?php echo wp_get_attachment_image($galleryId, 'orginal');?>
                                                    </div>
                                                <?php endforeach;?>
                                                </div>
                                                <!-- End .thumbnail -->
                                            </div>
                                        </div>
                                        <!-- End .content-blog -->
                                        </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h2 class="product-title"><?php the_title(); ?></h2>
                                    <div class="price-amount price-offer-amount">
                                    <?php echo $product->get_price_html();?>
                                    </div>
                                    <div class="product-content">
                                    <div class="inner">
                                     <?php $rate=($product->get_average_rating() * 20).'%';?>
                                         <div class="product-rating">
                                                <div class="star_rating">
                                                    <div class="product_rate" style="width:<?= $rate;?>"></div>
                                                </div>
                                                <span class="rating-number float-left">(<?php echo $product->get_rating_count() ;?>)</span>
                                        </div>
                                    </div>
                                    </div>
                                    <ul class="product-meta">
                                    <?php if ($product->get_sku()): ?>
                                        <li class="mb-3">
                                        <span class="fw-normal me-3">کد محصول : </span>
                                        <span class="float-end"><?= $product->get_sku(); ?></span>
                                        </li>
                                        <?php endif; ?>
                                        <li class="mb-3"> 
                                        <span class="fw-normal me-3">دسته&zwnj;بندی : </span>
                                        <span class="float-end"><?php the_terms(get_the_ID(), 'product_cat', '', ','); ?></span>
                                        </li>
                                        <li>
                                        <span class="fw-normal me-3">برچسب&zwnj;ها : </span>
                                    <span class="float-end pro_tags">
                                   <?php the_terms(get_the_ID(), 'product_tag', '', ''); ?>
                                        </li>
                                    </ul>
                                    <p class="description"><?php the_excerpt();?></p>

                                    <div class="product-variations-wrapper">
                                    </div>

                                    <!-- Start Product Action Wrapper  -->
                                    <div class="product-action-wrapper d-flex-center">                                   
                                        <!-- Start Product Action  -->
                                        <div class="product-action  mb--0">
                                        <?php woocommerce_template_single_add_to_cart() ;?>
                                        </div>
                                        <!-- End Product Action  -->

                                    </div>
                                    <!-- End Product Action Wrapper  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .single-product-thumb -->
            <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
                <div class="container">
                    <div class="product-desc-wrapper mb--30 mb_sm--10">
                        <h4 class="mb-5 desc-heading">توضیحات</h4>
                        <div class="row mb--15">
                            <?php the_content();?>
                        </div>
                        <!-- End .row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="pro-des-features">
                                    <li class="single-features">
                                        <div class="icon">
                                            <img src="<?= DIGI_TDU?>assets/images/product/product-thumb/icon-3.png" alt="icon">
                                        </div>
                                        مهلت تست
                                    </li>
                                    <li class="single-features">
                                        <div class="icon">
                                            <img src="<?= DIGI_TDU?>assets/images/product/product-thumb/icon-2.png" alt="icon">
                                        </div>
                                        تضمین کیفیت
                                    </li>
                                    <li class="single-features">
                                        <div class="icon">
                                            <img src="<?= DIGI_TDU?>assets/images/product/product-thumb/icon-1.png" alt="icon">
                                        </div>
                                        محصول اورجینال
                                    </li>
                                </ul>
                                <!-- End .pro-des-features -->
                            </div>
                        </div>
                        <!-- End .row -->
                    </div>
                    <!-- End .product-desc-wrapper -->
                    <?php  if($product->has_attributes()):?>
                    <div class="additional-info pb--40 pb_sm--20">
                        <h4 class="mb--60">اطلاعات فنی</h4>
                        <div class="product-additional-info">
                            <div class="table-responsive">
                                <?php do_action('woocommerce_product_additional_information', $product);?>
                            </div>
                        </div>
                        <!-- End .product-additional-info -->
                    </div>
                    <?php endif;?>
                    <div class="reviews-wrapper woocommerce">
                        <?php
                        if(comments_open()){
                            comments_template();
                        }
                        ?>
                    </div>
                    <!-- End .reviews-wrapper -->
                </div>
            </div>
            <!-- woocommerce-tabs -->
    </div>
    <!-- End Shop Area  -->
    <!-- Start Recently Viewed Product Area  -->
    <div class="axil-product-area bg-color-white axil-section-gap pb--50 pb_sm--30 related">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>
                        مرتبط</span>
                </div>
               <?php echo do_shortcode('[related_products per_page=8 column=3]');?>
            </div>
        </div>
        <!-- End Recently Viewed Product Area  -->
</main>
<?php
endwhile;
get_footer();
else:
woocommerce_get_template('archive-product.php');
endif;
?>