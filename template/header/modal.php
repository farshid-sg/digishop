<div class="header-search-modal" id="header-search-modal">
        <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
        <div class="header-search-wrap">
            <div class="card-header">
                <form action="<?php echo home_url();?>" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control main-search" name="s" id="s" value="<?php esc_attr(apply_filters('the_search_query', get_search_query())); ?>"
                            placeholder="بنویسید ...">
                        <button type="submit" class="axil-btn btn-bg-primary border-0"><i class="fal fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="search-result-header">
                    <h6 class="title search-result"> نتایج جستجو</h6>
                    <div class="img-loader d-none">
                        <img src="<?= DIGI_TDU?>assets/images/Spinning arrows.gif" width="30" alt="">
                    </div>
                </div>
                <div class="psearch-results">
                </div>
            </div>
        </div>
    </div>