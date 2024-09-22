<div class="col-xl-4 col-lg-4 col-sm-6 col-12 mb--30">
                            <?php
                            global $product;
                            ?>
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <?php if(has_post_thumbnail()): ?>
                                        <a href="<?php the_permalink();?>">
                                        <?php
                                        the_post_thumbnail('product',[
                                            'class'=>'main-img',
                                            'loading'=>'lazy'
                                        ]);
                                        $second_thumb=get_post_meta(get_the_ID(),'product_second_thumb',true);
                                        if(!empty($second_thumb)):
                                        ?>
                                        <img class="hover-img" src="<?= $second_thumb;?>"
                                            alt="<?php the_title();?>">
                                        <?php endif; ?>
                                        </a>
                                        <?php endif; ?>
                                        <?php get_template_part('template/product/sale');?>
                                        <?php get_template_part('template/product/action');?>
                                    </div>
                                    <div class="product-content">
                                    <div class="inner">
                                   <?php get_template_part('template/product/content');?>
                                    </div>
                                    </div>
                                </div>
                            </div>