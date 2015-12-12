$(document).ready(function(){
    $.each($('textarea[data-autoresize]'), function() {
        var offset = this.offsetHeight - this.clientHeight;

        var resizeTextarea = function(el) {
            $(el).css('height', 'auto').css('height', el.scrollHeight + offset);
        };
        $(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
    });
    
    $("div.comment").click(function(){
//       console.log($(this).closest('div.like-comment-div').next("blockquote"));
       $(this).closest('div.like-comment-div').next("blockquote").toggle(100); 
    });
    $(document).ready(function(){
            $('.click img').click(function(){
                    $(this).closest('div.click').next().css('display','block');
            });
            $('.x-close').click(function(){
                    $('.popup').css('display','none');
            });
    });
    
    
    //preview image
    $('.images-preview').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Đang load ảnh #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function (item) {
                return "<a href='"+item.el.attr('itemref')+"'>Tới album của ảnh này.</a>";
            }
        }
    });
});