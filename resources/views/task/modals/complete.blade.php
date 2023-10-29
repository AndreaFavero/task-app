<div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="completeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="completeModalLabel">{{__('diz.complete')}} <span id="title_"></span></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('task.complete')}}" method="POST" id="form-complete">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="task_id" id="task_id" value="">

                    <p id="description_"></p>

                    <hr class="my-3">

                    <p class="mb-0">{{__('diz.complete_modal_text')}}?</p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('diz.close')}}</button>
                <button type="submit" form="form-complete" class="btn btn-success"><i class="bi bi-check me-2"></i>{{__('diz.complete_task')}}</button>
            </div>
        </div>
    </div>
</div>
