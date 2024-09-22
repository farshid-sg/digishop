<?php
global $product;
 if($product->is_on_sale()): ?>
    <div class="label-block label-right">
        <div class="product-badget"> تخفیف ویژه</div>
    </div>
<?php endif; ?>