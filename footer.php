<?php global $digi_data; ?>
<footer class="axil-footer-area footer-style-2">
        <!-- Start Footer Top Area  -->
        <div class="footer-top separator-top">
            <div class="container">
                <div class="row">
                    <!-- Start Single Widget  -->
                    <?php
                    if(is_active_sidebar('footer_contact')){
                        dynamic_sidebar('footer_contact');
                    }
                    ?>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <?php
                    if(is_active_sidebar('footer_menu2')){
                        dynamic_sidebar('footer_menu2');
                    }
                    ?>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <?php
                    if(is_active_sidebar('footer_menu3')){
                        dynamic_sidebar('footer_menu3');
                    }
                    ?>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <?php
                    if(is_active_sidebar('footer_menu4')){
                        dynamic_sidebar('footer_menu4');
                    }
                    ?>
                    <!-- End Single Widget  -->
                </div>
            </div>
        </div>
        <!-- End Footer Top Area  -->
        <!-- Start Copyright Area  -->
        <div class="copyright-area copyright-default separator-top">
            <div class="container">
                <div class="row align-items-center">
                    <?php if(is_active_sidebar('footer-social')){
                        dynamic_sidebar('footer-social');
                    } ?>
                    <div class="col-xl-4 col-lg-12">
                        <div class="copyright-left d-flex flex-wrap justify-content-center">
                            <ul class="quick-link">
                                <li class="text-center">
                                    <?php echo $digi_data['copyright-text'] ;?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                           <?php 
                           if(is_active_sidebar('symbols')){
                            dynamic_sidebar('symbols');
                           }
                           ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->
    </footer>
    <!-- Header Search Modal End -->
    <?php get_template_part('template/header/modal');?>
    <!-- Header Search Modal End -->
    <?php get_template_part('template/header/cart'); ?>
    <!-- Offer Modal Start -->
    <div class="offer-popup-modal" id="offer-popup-modal">
        <div class="offer-popup-wrap">
            <div class="card-body">
                <button class="popup-close"><i class="fas fa-times"></i></button>
                <div class="content">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i>
                            از دست ندهید !!!</span>
                        <h3 class="title">بهترین پیشنهاد فروش<br> مال شماست</h3>
                    </div>
                    <div class="poster-countdown countdown"></div>
                    <a href="shop.html" class="axil-btn btn-bg-primary">خرید کنید <i
                            class="fal fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="closeMask"></div>
    <!-- Offer Modal End -->
    <!-- JS
============================================ -->
<!-- Modernizer JS -->
<?php wp_footer(); ?>
</body>
</html>