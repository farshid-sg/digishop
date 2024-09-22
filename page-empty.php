<?php /* Template Name:  صفخه خالی */;?>

<?php 
get_template_part('header2');
while(have_posts()):
    the_post();
?>
<main class="main-wrapper">
<?php the_content();?>
</main>
<?php 
endwhile;
get_template_part('footer2');

?>