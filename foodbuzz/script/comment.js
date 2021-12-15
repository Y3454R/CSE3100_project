function listComments()
{
    $.ajax({
        url:'full_review.php',
        success:function(res){
            $('.comment_listing').html(res);
        }
    })
}

$(function(){
    listComments();
    setInterval(function(){
        listComments();
    },5000);
    $('.submit').click(function(){
        var comment = $('.comment').val();
        alert(comment);
        $.ajax({
            url:'handlers/save_comment.php',
            type: 'post',
            data:'comment'+comment,
            success:function()
            {
                alert("Your comment has been posted");
                listComments();
            }
        })
    })
})