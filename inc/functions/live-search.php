<?php
//live search
function digi_live_search_callback(){
    $txt_search=sanitize_text_field($_POST['txt_search']);
    if(empty($txt_search)){
        wp_send_json([
            'success'=>false,
            'msg'=>'محصول یا مقاله ای یافت نشد'
        ],403);
    }
    $posts=new WP_Query(['post_type'=>['post','product'],'s'=>$txt_search]);
    $result=[];
    if($posts->have_posts()){
        while($posts->have_posts()){
            $posts->the_post();
            $result[]=['title'=>get_the_title(),'permalink'=>get_the_permalink(),'thumbnail'=>get_the_post_thumbnail(get_the_ID(),'small-product'),'excerpt'=>mb_substr(get_the_excerpt(),0,80,'utf-8').'...'];
        }
    }else{
        wp_send_json([
            'success'=>false,
            'msg'=>'محصول یا مقاله ای یافت نشد'
        ],403); 
    }
    wp_send_json([
        'success'=>true,
        'result'=>$result
    ],200);
}
add_action('wp_ajax_digi_live_search','digi_live_search_callback');
add_action('wp_ajax_nopriv_digi_live_search','digi_live_search_callback');
?>