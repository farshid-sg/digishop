<div class="inner">
                                <div class="thumbnail">
                                    <?php if(has_post_thumbnail()): ?>
                                    <a href="<?php the_permalink();?>">
                                        <?php the_post_thumbnail('post');?>
                                    </a>
                                    <?php endif;?>
                                    <div class="blog-category">
                                        <?php the_category('','',get_the_ID()); ?>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5 class="title">
                                        <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                        </h5>
                                        <?php if(!is_home() && !is_search()): ?>
                                            <div class="axil-post-meta">
                                    <div class="post-author-avatar">
                                        <?php 
                                        echo get_avatar(get_the_author_meta('ID'));
                                        ?>
                                    </div>
                                    <div class="post-meta-content">
                                            <h6 class="author-title">
                                                <a href="#"><?php the_author();?></a>
                                            </h6>
                                            <ul class="post-meta-list">
                                                <li><?php the_date();?></li>
                                                <li>
                                                <?php  if(function_exists('the_views')) { the_views(); } ?>
                                                <span>  بازدید  </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                         <?php endif;?>
                                    <div class="read-more-btn">
                                        <a class="axil-btn right-icon" href="<?php the_permalink();?>">بیشتر بخوانید <i class="fal fa-long-arrow-left"></i></a>
                                    </div>
                                </div>
</div>