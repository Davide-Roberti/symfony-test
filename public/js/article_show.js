$(document).ready(function() {
    $('.js-article-like').on('click', function(e){
        e.preventDefault();


        $(this).toggleClass('fa-heart-o').toggleClass('fa-heart');

        $.ajax({
            method: 'POST',
            url: $(this).attr('href')
        }).done(function(data){
            $('.js-article-like-count').html(data.hearts);
        });
    });

});
