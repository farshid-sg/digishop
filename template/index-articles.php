<?php 
$posts_options=[
    'post_type'=>'post',
    'posts_per_page'=>3
];
$posts=new WP_Query($posts_options);
if($posts->have_posts()):
?>

<div class="axil-section-gap">
            <div class="container">
                <div class="section-title-wrapper section-title-center">
                    <span class="title-highlighter highlighter-primary"><i class="fas fa-fire"></i> اخبار</span>
                    <h3 class="title">آخرین اخبار دنیای NFT</h3>
                </div>
                <div class="row g-5">
                    <?php while($posts->have_posts()):$posts->the_post()?>
                    <div class="col-lg-4">
                        <div class="content-blog blog-grid">
                            <?php get_template_part('template/post/inner');?>
                        </div>
                    </div>
                    <?php endwhile;wp_reset_postdata();?>
                </div>
            </div>
</div>
<?php endif ;?>