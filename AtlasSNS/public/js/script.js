
//アコーディオンメニュー
    $(function() {
        $(".accordion-container").click (function() {
        $(".accordion-content").slideToggle();
        });
    });


//編集モーダル
    $(function(){
        $('.js-modal-open').on('click',function(){
            var post=$(this).attr('post');
            var post_id=$(this).attr('post_id');

            console.log(post);
            $('.post').val(post);
            $('.post_id').val(post_id);

            $('.js-modal').fadeIn();
            return false;
        });
        $('.js-modal-close').on('click',function(){
            $('.js-modal').fadeOut();
            return false;
        });
    });
