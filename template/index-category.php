<?php
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
<!-- Start Categorie Area  -->
<div class="axil-categorie-area bg-color-white axil-section-gapcommon">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-secondary"> <i class="far fa-tags"></i> دسته بندی
                        ها</span>
                    <h2 class="title">محصولات بر اساس دسته بندی</h2>
                </div>
                <div class="categrie-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    <?php
                    foreach($all_categories as $category):
                        $permalink=get_term_link($category->slug, 'product_cat');
                        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                        $image = wp_get_attachment_url( $thumbnail_id ); 
                        if($category->count > 0):
                    ?>
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500">
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
        <!-- End Categorie Area  -->
     <!-- Start Flash Sale Area  -->
<?php endif;?>