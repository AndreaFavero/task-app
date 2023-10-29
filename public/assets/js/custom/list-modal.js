$(document).ready(function(){
    //complete modal
    $('.btn-outline-success').on('click', function(e){
        let button = $(this);

        let modal = $('#completeModal');

        modal.find('#title_').text(button.data('title'));
        modal.find('#description_').html(button.data('description'));
        modal.find('#task_id').val(button.data('task_id'));
    });

    //delete modal
    $('.btn-danger').on('click', function(e){
        let button = $(this);

        let modal = $('#deleteModal');

        modal.find('#title_').text(button.data('title'));
        modal.find('#description_').html(button.data('description'));
        modal.find('form').attr('action', button.data('delte_action'));
    });
})
