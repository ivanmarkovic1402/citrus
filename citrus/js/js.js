
 $(document).ready(function() {  

    $('[class*=postComment]').hide();

    $('[id*=postCommentBtn]').each(function(){

        var getId = $(this).attr('data-id');

        $(this).click(function(){
            $(".postComment"+getId).toggle();
        });
    });
}); 

$(document).ready(function(){
    $('[id^=btnApprove]').click(function(){

        var comment_id = $(this).attr("data-comment");
        var action     = "approve";

        var result = confirm("Are you sure you want to approve this comment?");
        if (result) {
                $.ajax({
                    method: 'POST',
                    url: 'processing/processingComment.php',
                    data: { comment_id:comment_id, action:action},

                }).done(function(response) {
                    window.location.reload(true);
                }).fail(function(response) {
                    console.log({"no":response});
                }).always(function() {
                    location.reload();
                });
        }
    });
});

$(document).ready(function(){
    $('[id^=btnDelete]').click(function(){

        var comment_id = $(this).attr("data-comment");
        var action     = "delete";

        var result = confirm("Are you sure you want to delete this comment?");
        if (result) {
                $.ajax({
                    method: 'POST',
                    url: 'processing/processingComment.php',
                    data: { comment_id:comment_id, action:action},

                }).done(function(response) {
                    window.location.reload(true);
                }).fail(function(response) {
                    console.log({"no":response});
                }).always(function() {
                    location.reload();
                });
        }
    });
});

