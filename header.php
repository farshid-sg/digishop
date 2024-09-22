<!doctype html>
<html class="no-js" >
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon --><?php  global $digi_data; ?>
    <link rel="shortcut icon" type="image/x-icon" href="<?= $digi_data['site-favicon']['url'];?>">
    <?php wp_head(); ?>
</head>
<body class="sticky-header newsletter-popup-modal" <?php if(!is_user_logged_in() && is_account_page()):?> style="background-image: url(<?= DIGI_TDU?>assets/images/bg-1.png);" <?php endif;?>>

    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
<a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <header class="header axil-header header-style-1">
        <?php get_template_part('template/header/top-bar');?>
        <!-- Start Mainmenu Area  -->
        <div id="axil-sticky-placeholder"></div>
        <div class="axil-mainmenu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-brand">
                        <?php
                        if(!isset($digi_data['site-logo'])){
                        ?>
                        <a href="<?= bloginfo('url');?>" class="logo logo-dark">
                            <img src="<?= $digi_data['site-logo']['url'];?>" alt="<?php bloginfo('name');?>">
                        </a>
                        <a href="<?= bloginfo('url');?>" class="logo logo-light">
                            <img src="<?= $digi_data['site-logo']['url'];?>" alt="<?php bloginfo('name');?>">
                        </a>
                        <?php }else{?>
                            <a href="<?= bloginfo('url');?>" class="logo logo-dark">
                            <img src="<?= $digi_data['site-logo']['url'];?>" alt="<?php bloginfo('name');?>">
                            </a>
                            <a href="<?= bloginfo('url');?>" class="logo logo-light">
                                <img src="<?= $digi_data['site-logo']['url'];?>" alt="<?php bloginfo('name');?>">
                            </a>
                        <?php } ?>
                    </div>
                    <div class="header-main-nav">
                       <?php get_template_part('template/header/main-menu');?>
                    </div>
                    <div class="header-action">
                    <?php get_template_part('template/header/action-list');?>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>
