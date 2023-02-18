$(document).ready(function() {
    //adding comment
    $('#post-footer-commentbtn').click(function(event) {
        event.preventDefault();

        //check whether comment input is empty or not
        if(!($('#post-comment').val() == 0)){
                $.ajax({
                    url: URLROOT + "/Comments/comment/" + CURRENT_POST,
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "text",
                    success: function(comment) {
                        //for te$sting
                        $('#msg').text(comment);
                    }
                })

            //refrsh the entire comments thread
            $.ajax({
                url: URLROOT + "/Comments/showComments/" + CURRENT_POST,
                dataType: "html",
                success: function(results) {
                    //for te$sting
                    $('#results').html(results);
                }
            })

            $('#post-comment').val('');

        }
    })

    //onload show existing comments
    $.ajax({
        url: URLROOT + "/Comments/showComments/" + CURRENT_POST,
        dataType: "html",
        success: function(results) {
            //for te$sting
            $('#results').html(results);
        }
    })

})