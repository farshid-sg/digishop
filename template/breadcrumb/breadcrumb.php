 <!-- Start Breadcrumb Area  -->
 <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                        <?php 
                            if(class_exists('wooCommerce')):
                                if(is_product() || is_product_taxonomy() || is_cart() || is_checkout() || is_shop() || is_account_page()){
                                    woocommerce_breadcrumb();
                                }else{
                        ?>
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="<?php home_url();?>">خانه</a></li>
                                <li class="separator"></li>
                                <?php if(!is_archive() && !is_search() && !is_page()){ ?>
                                <li class="axil-breadcrumb-item" aria-current="page"><?php the_category(' / '); ?></li>
                                <li class="separator"></li>
                                <?php }?>
                                <?php
                                if(is_archive()){
                                    echo get_the_archive_title() ;
                                }elseif(is_search()){?>
                                <?php   the_search_query(); ?>                                  
                                <?php }
                                else{
                                    the_title();
                                }
                            ?>
                            </ul>
                            <?php 
                            }
                        else:?>
                        <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="<?php home_url();?>">خانه</a></li>
                                <li class="separator"></li>
                                <?php if(!is_archive() && !is_search() && !is_page()){ ?>
                                <li class="axil-breadcrumb-item" aria-current="page"><?php the_category(' / '); ?></li>
                                <li class="separator"></li>
                                <?php }?>
                                <?php
                                if(is_archive()){
                                    echo get_the_archive_title() ;
                                }elseif(is_search()){?>
                                <?php  the_search_query(); ?>                                  
                                <?php }
                                else{
                                    the_title();
                                }
                            ?>
                            </ul>
                        <?php
                        endif;?>
                            <h1 class="title">
                            <?php
                                if(is_archive()){
                                    echo get_the_archive_title() ;
                                }elseif(is_search()){?>
                                <p>نتیجه جستجو برای : <span><?php the_search_query(); ?></span></p>
                                    
                                <?php }
                                else{
                                    the_title( );
                                }
                            ?>
                            </h1>
                        </div>
                    </div>
                    <?php 
                    global $digi_data;
                    $img='';
                    if(is_shop() || is_product_category()){
                        $img=$digi_data['shop']['url'];
                    }elseif(is_cart() || is_checkout() || is_order_received_page()){
                        $img=$digi_data['payment']['url'];
                    }elseif(is_account_page()){
                        $img=$digi_data['profile']['url'];
                    }elseif(is_archive() || is_search()){
                        $img=$digi_data['archive']['url'];
                    }else{
                        $img=$digi_data['other']['url'];
                    }
                    ?>
                    <div class="col-lg-6 col-md-4">
                        <div class="inner">
                            <div class="bradcrumb-thumb">
                                <img src="<?= $img;?>" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->