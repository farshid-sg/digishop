<?php /* Template Name:  سایدبار دار */;?>
<?php 
get_header();
while(have_posts()):
    the_post();
?>
<main class="main-wrapper">
<?php get_template_part('template/breadcrumb/breadcrumb');?>
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <?php the_content();?>
            </div>
        </div>
    </div>
</main>
<?php 
endwhile;
get_footer();
?>