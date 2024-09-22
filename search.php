<?php 
get_header();
?>
<main>
    <?php get_template_part('template/breadcrumb/breadcrumb');?>
<section class="axil-blog-area axil-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php
                if(have_posts()):
                ?>
                <div class="row g-5">
                    <?php while(have_posts()):the_post();?>
                    <div class="col-md-6">
                        <div class="content-blog blog-grid">
                            <?php get_template_part('template/post/inner');?>
                        </div>
                    </div>
                    <?php endwhile;?>
                </div>
                <?php else:?>
                    <div class="alert alert-warning">مطلبی یافت نشد</div>
                <?php endif;?>
                <?php 
                get_template_part('template/pagination/pagination');
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
</main>
<?php get_footer();?>