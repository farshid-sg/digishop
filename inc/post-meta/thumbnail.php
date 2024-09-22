<?php
add_action('add_meta_boxes','add_thumbnail_box',10,2);

function add_thumbnail_box($post_type,$post){
    add_meta_box(
        'news_source',
        ' تصویر دوم',
        'thumbnail_content',
        ['product'],
        'normal',
        'default'
    );
}
function thumbnail_content($post){
    $get_thumbnail=get_post_meta($post->ID,'product_second_thumb',true);
    ?>
     <form action="" method="post">
       <label for="thumbnail">تصویر شاخص دوم :</label>
       <input type="hidden" class="custom_media_url " name='thumbnail' id="thumbnail" value="<?php echo $get_thumbnail ;?>">
       <input type='button'  class="button custom_media_upload" id="custom_image_uploader" value="انتخاب تصویر">
       <img class="custom_media_image" src="<?php echo isset($get_thumbnail)?$get_thumbnail:'';?>" style="max-width:90%;display:table;margin:10px auto" />
     </form>
    <?php
    
}
add_action('save_post','thumbnail_save');
function thumbnail_save($post_id){
    if(isset($_POST['thumbnail'])){
        $thumbnail=$_POST['thumbnail'];
        update_post_meta($post_id,'product_second_thumb',$thumbnail);
    }
}