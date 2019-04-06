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

    //laravel file manager
    $('#lfm').filemanager('image');

    $('#lfm').on('click', function(){
      $('#delete-image').removeClass('hidden');
    });
    //Delete uploaded image in form
    $('#delete-image').on('click', function(){
      $('#thumbnail').val(null);
      $('#holder').attr('src', '');
      $(this).removeClass('hidden');
      $(this).addClass('hidden');
    });

});