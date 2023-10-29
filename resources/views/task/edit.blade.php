<x-app-layout>
    <x-slot name="scripts">
        <script type="text/javascript">
            $(document).ready(function() {
                $('.summernote').summernote({
                    placeholder: "{{__('diz.description')}}",
                    heigt: 100,
                });

                $('.summernote').summernote('code', `{!! old('description', $task->description) !!}`);
            })
        </script>
    </x-slot>
    <x-slot name="header">
        <div class="row">
            <div class="col">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    @if ($task->id)
                        {{ __('diz.edit_task') }}
                    @else
                        {{ __('diz.create_task') }}
                    @endif
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('task.post')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{old('id', $task->id)}}">

                        <div class="row form-group mb-2">
                            <label for="title" class="form-label col-md-2">{{__('diz.title')}}</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control @if($errors->has('title'))is-invalid @endif" id="title" name="title" placeholder="{{__('diz.title')}}" value="{{old('title', $task->title)}}">
                                @foreach ($errors->get('title') as $err)
                                    <small class="text-danger">{{$err}}</small>
                                @endforeach
                            </div>
                        </div>

                        <div class="row form-group mb-2">
                            <label for="description" class="form-label col-md-2">{{__('diz.description')}}</label>
                            <div class="col-md-10">
                                <textarea class="form-control summernote" id="description" name="description" placeholder="{{__('diz.description')}}"></textarea>
                                @foreach ($errors->get('description') as $err)
                                    <small class="text-danger">{{$err}}</small>
                                @endforeach
                            </div>
                        </div>

                        <div class="row form-group mb-4">
                            <label for="due_date" class="form-label col-md-2">{{__('diz.due_date')}}</label>
                            <div class="col-md-10">
                                <input type="datetime-local" class="form-control @if($errors->has('due_date'))is-invalid @endif" id="due_date" name="due_date" value="{{old('due_date', $task->due_date)}}">
                                @foreach ($errors->get('due_date') as $err)
                                    <small class="text-danger">{{$err}}</small>
                                @endforeach
                            </div>
                        </div>

                        <div class="row form-group mb-4">
                            <label for="due_date" class="form-label col-md-2">{{__('diz.completed')}}</label>

                            <div class="col-md-9 form-check ms-2">
                                <input class="form-check-input" type="checkbox" value="true" id="completed" name="completed" @if (old('completed', $task->completed))checked @endif>
                            </div>
                        </div>

                        <hr>

                        <div class="col text-end">
                            <button type="submit" class="btn btn-success"><i class="bi-save me-2"></i>{{__('diz.save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
