$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //Delete record
    $('.delete-item').on('click', function (e) {
        if (!confirm('Are you sure you want to delete?')) return false;
        e.preventDefault();
        console.log($(this).attr('href'));
        // return;

        $.ajax({
            type: 'DELETE',  // destroy Method
            url: $(this).attr('href')
        }).done(function (data) {
            console.log(data);
            location.reload(true);
        });
    });

});