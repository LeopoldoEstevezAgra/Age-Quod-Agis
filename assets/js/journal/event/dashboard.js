$('.edit-task-done').click(function (e) {
    e.preventDefault();

    $('#editTaskDoneModal').remove();

    $.get($(this).attr('href'), function (response) {
        $('#editTaskDoneLoad').html(response);
        $('body').append(response);
        var $modal =  $('#editTaskDoneModal');
        $modal.modal('show');

        var $form = $modal.find('form');

        $form.submit(function (e) {
            e.preventDefault();

            $.post($form.attr('action'), $form.serialize(), function (response) {
                if (response.result) {
                    location.reload();
                } else {
                    $modal.find('alert-danger').show();
                }
            })
        })
    })
});