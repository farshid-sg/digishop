<?php /* Template Name:  صفخه اصلی */;?>

<?php 
get_header();
while(have_posts()):
    the_post();
?>
<main class="main-wrapper" >
<?php the_content();?>
</main>
<?php 
endwhile;
get_footer();
?>