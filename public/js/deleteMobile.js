/**
 * Created by twinkledj on 3/6/16.
 */

(function($){

    $(".delete-btn").on('click', function (event) {
        event.preventDefault();
        console.log("delte ID:", $(this).data('id'));

        var id = $(this).data('id');

        $.ajax({
            url: '/mobiles/' + id,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).done(function(resp){
            console.log(resp);
            window.location.reload();
        }).fail(function () {
            alert('Fail');
        }).always(function () {
            console.log('Ajax request sent!');
        });
        
    });

})(jQuery);