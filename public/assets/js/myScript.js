$(document).ready(function(){
    $.each($('textarea[data-autoresize]'), function() {
        var offset = this.offsetHeight - this.clientHeight;

        var resizeTextarea = function(el) {
            $(el).css('height', 'auto').css('height', el.scrollHeight + offset);
        };
        $(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
    });
    
    $("div.comment").click(function(){
       console.log($(this).closest('div.like-comment-div').next("blockquote"));
       $(this).closest('div.like-comment-div').next("blockquote").toggle(100); 
    });
})