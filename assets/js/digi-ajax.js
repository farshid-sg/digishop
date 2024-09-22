jQuery(function ($) {
    //wishlist
    $(document).on("beforeupdate.JVMWooCommerceWishlist", function (e) {
        $(".heart-count").html(e.wishlist.length)
    });
    //search
    $('.main-search').keyup(function(){
        let txt=$(this).val();
        txt=txt.trim();
        $('.img-loader').removeClass('d-none');
        if(txt.length > 3){
        let site_name=window.location.pathname.split('/');
        let site_href=window.location.origin+'/'+site_name[1];
        $.ajax({
            url:`${site_href}/wp-admin/admin-ajax.php`,
            type:'post',
            dataType:'json',
            data:{
                action:'digi_live_search',
                txt_search:txt
            },
            success:function(response){
                if(response.success){
                    $('.img-loader').addClass('d-none');
                    $('.psearch-results').html('');
                    let count=0;
                    response.result.forEach(element => {
                        let elm=`<div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="single-product.html">
                              ${element.thumbnail}
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="product-title">
                            <a href="${element.permalink}">${element.title}</a>
                            </h6>
                            <div class="product-excerpt">
                            <p>${element.excerpt}</p>
                            </div>
                            <div class="product-cart">
                            </div>
                        </div>
                    </div>
                        `;
                        $('.psearch-results').append(elm);
                        count++;
                    });
                    $('.search-result').html(`${count} نتیجه برای عنوان ${txt} یافت شد`);
                }
            },
            error:function(error){
                if(!error.responseJSON.success){
                    $('.img-loader').addClass('d-none');
                    $('.psearch-results').html(`<p>${error.responseJSON.msg}</p>`);
                    $('.search-result').html('نتیجه ای یافت نشد !');
                }
            }
        })
    }
    })
    $('.main-search').blur(function(){
        $('.img-loader').addClass('d-none');  
    })
    //compare
    $("body").on("click", ".compare-ajax-btn", function () {
        $(".fal", this).removeClass("fa-random").addClass("fa-spinner-third fa-spin");
        var a = $(this).data("compare-id"),
            t = {
                action: "digi_ajax_compare",
                id: a
            };
        prod_con = ".product-" + a;
            $.post(digiproduct.ajaxurl,t, function (a) {
                a = JSON.parse(a),
                $(".compare-link").length && ($(".compare-count").html(a.conut),
                    $(".compare-link").attr("href", a.compare_url)),
                    $(prod_con + " .compare-ajax-btn").attr("data-original-title", a.title),
                    $(prod_con + " .compare-ajax-btn").toggleClass("in-compare"),
                    $(".prod-opts .compare-ajax-btn").attr("data-original-title", a.title),
                    $(".prod-opts .compare-ajax-btn").toggleClass("in-compare"),
                    $(".compare-ajax-btn .fal").removeClass("fa-spinner-third fa-spin").addClass("fa-random")
            })
    })
});