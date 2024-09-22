<?php
get_header();
while(have_posts()):the_post();
?>
<main class="main-wrapper">
    <?php get_template_part('template/breadcrumb/breadcrumb'); ?>
        <!-- Start Blog Area  -->
        <div class="axil-blog-area axil-section-gap">
            <?php if(has_post_thumbnail()):?>
            <div class="axil-single-post post-formate post-standard">
                <div class="container">
                    <div class="content-block">
                        <div class="inner">
                            <div class="post-thumbnail text-center">
                               <?php the_post_thumbnail();?>
                            </div>
                            <!-- End .thumbnail -->
                        </div>
                    </div>
                    <!-- End .content-blog -->
                </div>
            </div>
            <?php endif;?>
            <!-- End .single-post -->
            <div class="post-single-wrapper position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 axil-post-wrapper">
                            <div class="post-heading">
                                <h2 class="title"><?php the_title();?></h2>
                                <div class="axil-post-meta">
                                    <div class="post-author-avatar">
                                        <?php 
                                        echo get_avatar(get_the_author_meta('ID'));
                                        ?>
                                    </div>
                                    <div class="post-meta-content">
                                        <h6 class="author-title">
                                            <a href="#"><?php the_author();?></a>
                                        </h6>
                                        <ul class="post-meta-list">
                                            <li><?php the_date();?></li>
                                            <li>
                                            <?php  if(function_exists('the_views')) { the_views(); } ?>
                                            <span>  بازدید  </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="single-content mb-5 " ><?php the_content();?></div>
                            <div class="mb-5">
                                <div>
                                <span class="fw-normal me-3">دسته&zwnj;بندی : </span>
                                <?php the_category(',');?>
                                </div>
                                <div>
                                <span class="fw-normal me-3">بر&zwnj;چسب ها : </span>
                                <?php the_tags('',',','') ?>
                                </div>
                            </div>
                            <div class="single-comment ps-3 px-lg-0 ">
                            <?php 
                            if(comments_open() || get_comments_number()){
                                comments_template();
                            }
                            ?>
                            </div>
                            <!-- End .axil-commnet-area -->
                        </div>
                        <?php get_sidebar();?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog Area  -->
        <?php
        $related_post_options=[
            'category__in'=>wp_get_post_categories(get_the_ID()),
            'posts_per_page'=>'6',
            'post__not_in'=>[get_the_ID()]
        ];

        $related_posts=new WP_Query($related_post_options);
        if($related_posts->have_posts()):
        ?>
        <!-- Start Related Blog Area  -->
        <div class="related-blog-area bg-color-white pb--60 pb_sm--40">
            <div class="container">
                <div class="section-title-wrapper mb--70 mb_sm--40 pr--110">
                    <span class="title-highlighter highlighter-primary mb--10"> <i class="fal fa-bell"></i>اخبار</span>
                    <h3 class="mb--25">پست های مرتبط</h3>
                </div>
                <div class="related-blog-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    <?php while($related_posts->have_posts()):$related_posts->the_post();?>
                    <div class="slick-single-layout">
                        <div class="content-blog blog-grid">
                        <?php get_template_part('template/post/inner');?>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <?php endwhile;wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
        <!-- End Related Blog Area  -->
        <?php endif;?>
    </main>

<?php 
endwhile;
get_footer();
?>