<?php 
global $digi_data;
if($digi_data['show-top-header']):
?>
<div class="header-top-campaign" style="background-image:url(<?= $digi_data['header-banner-bg']['url'];?>)">
            <?php if($digi_data['show-top-header-banner']):?>
            <div class="container position-relative">
                <div class="campaign-content">
                    <?= $digi_data['header-banner-text']; ?>
                </div>
            </div>
            <button class="remove-campaign border-0"><i class="fal fa-times"></i></button>
            <?php endif; ?>
        </div>
        <div class="axil-header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="header-top-list">
                            <ul class="justify-content-center justify-content-lg-start">
                                <li>
                                    <i class="<?= $digi_data['mobile-icon'] ?>"></i>
                                    <?= $digi_data['mobile-text'] ?>
                                </li>
                                <li>
                                    <i class="<?= $digi_data['email-icon'] ?>"></i>
                                    <?= $digi_data['email-text'] ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end align-items-md-baseline align-items-center flex-column flex-md-row">
                        <div class="header-top-link">
                            <?php 
                             wp_nav_menu([
                                'theme_location'=>'topbar_menu','depth'=>1,'container'=>''
                             ]);
                            ?>
                        </div>
                        <ul class="ms-5 header-account">
                            <li class="my-account">
                            <?php if(is_user_logged_in()):?>
                                <a href="<?= home_url();?>/my-account" class="d-flex align-items-baseline">
                                    <i class="fas fa-user"></i>
                                    <span>حساب کاربری</span>
                                </a>
                            <?php else:?>
                                <a href="<?= home_url();?>/my-account" class="d-flex align-items-baseline">
                                    <i class="fas fa-user-lock"></i>
                                    <span>ورود/ثبت نام</span>
                                </a>
                            <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<?php endif;?>