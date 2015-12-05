$(document).ready(function(){
    $("a.like").click(function(){
       var entry_id = $(this).attr('itemid');
       var url = $(this).attr('itemref');
       var obj = $(this);
       $.ajax({
          url: url,
          type: 'POST',
          dataType: 'JSON',
          data: {
              entry_id: entry_id
          },
          success: function(result){
              if(result.status == 'success'){
                  var unlike_block = obj.next('a');
                  unlike_block.removeClass('hidden');
                  var count = parseInt(unlike_block.closest('div').find('.count-like').text());
                  unlike_block.closest('div').find('.count-like').text(count + 1);
                  var url = unlike_block.attr('itemprop');
                  unlike_block.attr('itemref',url+'/'+result.id);
                  obj.addClass('hidden');
                  
              }
          }
       });
    });
    $("a.unlike").click(function(){
       var entry_id = $(this).attr('itemid');
       var url = $(this).attr('itemref');
       var obj = $(this);
       $.ajax({
          url: url,
          type: 'POST',
          dataType: 'text',
          data: {
              entry_id: entry_id,
              _method: 'DELETE'
          },
          success: function(result){
              if(result == 'success'){
                  var like_block = obj.prev('a');
                  like_block.removeClass('hidden');
                  var count = parseInt(like_block.closest('div').find('.count-like').text());
                  like_block.closest('div').find('.count-like').text(count - 1);
                  obj.addClass('hidden');
              }
          }
       });
    });
});