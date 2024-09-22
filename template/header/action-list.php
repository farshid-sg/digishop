<ul class="action-list">
                            <li class="axil-search">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <i class="fas fa-search"></i>
                                </a>
                            </li>
                            <?php
                            if(class_exists('JVM_WooCommerce_Wishlist')){
                                if(function_exists('jvm_get_wishlist_url') && function_exists('jvm_woocommerce_wishlist_get_count')){
                                    $wish_url=jvm_get_wishlist_url();
                                    $wish_count=jvm_woocommerce_wishlist_get_count();
                                }else{
                                    $wish_url='#';
                                    $wish_count='0';
                                }
                                ?>
                            <li class="wishlist">
                                <a href="<?php echo $wish_url;?>">
                                    <i class="far fa-heart"></i>
                                </a>
                                <span class="heart-count count"><?php echo $wish_count;?></span>
                            </li>
                            <?php } ?>
                            <?php
                               if(defined('WCCM_VERISON')){
                                   $compare_url=wccm_get_compare_page_link(wccm_get_compare_list());
                                   $compare_count=count(wccm_get_compare_list());
                                   ?>
                                <li class="compare">
                                    <a href="<?= $compare_url ?>" class="compare-link">
                                        <i class="fal fa-repeat"></i>
                                    </a>
                                    <span class="compare-count count"><?= $compare_count ?></span>
                                </li>
                            <?php }?>
                            <li class="shopping-cart">
                                <a href="#" class="cart-dropdown-btn">
                                    <i class="fal fa-shopping-cart"></i>
                                </a>
                                <span class="count custom-cart-count">
                                    <?php echo WC()->cart->get_cart_contents_count(); ?>
                                </span>
                            </li>
                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul>