function sendComment(){
  var comment=$('#comment').val();
  var post=$('#post_id').val();
  if(comment !=''){
    $('#comment_error').hide();

   $.ajax({url: 'user/comment/save',
    type: 'GET',

    data: { 'comment': comment, 'post_id': post },
    dataType: 'json',
    success: function(data) {
      if(data.status==false){
        $('#comment_error').html('');
        $('#comment_error').append('<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> '+data.message+'</div>');
        $('#comment_error').show();
      }else{
        $('#new_Comments').append(data.newComment);

        alert(data.message);

      }

    }
  });
   return false
 }else{
  $('#comment_error').html('');
  $('#comment_error').append('<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Please write comment.</div>');
  $('#comment_error').show();
}


}

function likes(elm){
  var comId=$(elm).attr('data-commentId');
  $.ajax({url: 'user/comment/likes',
    type: 'GET',
    data: { 'comment_id': comId },
    dataType: 'json',
    success: function(data) {
      if(data.status==false){
        $('#comment_error').html('');
        $('#comment_error').append('<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> '+data.message+'</div>');
        $('#comment_error').show();
      }else{
       
        alert(data.message);

      }

    }
  });
  return false
}
function Dislikes(elm){
  var comId=$(elm).attr('data-commentId');
  $.ajax({url: 'user/comment/dislikes',
    type: 'GET',
    data: { 'comment_id': comId },
    dataType: 'json',
    success: function(data) {
      if(data.status==false){
        $('#comment_error').html('');
        $('#comment_error').append('<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> '+data.message+'</div>');
        $('#comment_error').show();
      }else{
       
        alert(data.message);

      }

    }
  });
  return false
}