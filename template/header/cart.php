
    <div class="cart-dropdown" id="cart-dropdown">
        <div class="cart-content-wrap">
            <div class="cart-header">
                <h2 class="header-title">سبد خرید شما</h2>
                <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
            </div>
            <div class="cart-body custom-cart-body">
                <?php 
                if(class_exists('Woocommerce')){
                    woocommerce_mini_cart();
                }
                ?>
            </div>
        </div>
    </div>