<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">{{__('diz.delete')}} <span id="title_"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-delete">
                    @method('delete')
                    @csrf

                    <p id="description_"></p>

                    <hr class="my-3">

                    <p class="mb-0">{{__('diz.delete_modal_text')}}?</p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('diz.close')}}</button>
                <button type="submit" form="form-delete" class="btn btn-danger"><i class="bi bi-trash"></i>{{__('diz.delete_task')}}</button>
            </div>
        </div>
    </div>
</div>
