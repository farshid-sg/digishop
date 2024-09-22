<?php global $product; ?>                                     
<?php $rate=($product->get_average_rating() * 20).'%';?>
                                            <div class="product-rating">
                                                <div class="star_rating">
                                                    <div class="product_rate" style="width:<?= $rate;?>"></div>
                                                </div>
                                                <span class="rating-number float-left">(<?php echo $product->get_rating_count() ;?>)</span>
                                            </div>
                                            <h5 class="title">
                                                <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                            </h5>
                                            <div class="product-price-variant">
                                            <?php echo $product->get_price_html();?>
                                            </div>
                                          