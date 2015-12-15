$(document).ready(function(){
   $("span.delete-image").click(function(e){
        if(confirm('Bạn có muốn xóa ảnh này không?')){
            var obj = $(this);
            var id = $(this).attr('itemid');
            var url = $(this).attr('itemref');
            $.ajax({
                url: url,
                type: 'DELETE',
                data:{
                    _method: 'DELETE'
                }, success: function(result){
                    if(result == 'true'){
                        obj.closest('.item').remove();
                        var ul_flex_images = obj.closest('.flex-images');
                        ul_flex_images.flexImages({rowHeight: ul_flex_images.attr('itemprop')}); 
                    }else if(result == 'error'){
                        alert('Đây là ảnh cuối cùng của album. Hãy đến trang chỉnh sửa album để xóa.');
                    }else{
                        console.log('There was a unexpected error');
                    }
                }
            })
        }
   });
});