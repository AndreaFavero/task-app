<x-app-layout>
    <x-slot name="scripts">
        <script src="{{asset('assets/js/custom/list-modal.js')}}"></script>
    </x-slot>

    <x-slot name="header">
        <div class="row">
            <div class="col-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('diz.tasks_available') }}
                </h2>
            </div>

            <div class="col-6 text-end">
                <a href="{{route('task.edit')}}" class="btn btn-outline-primary"><i class="bi-plus-circle me-2"></i>{{__('diz.task_add')}}</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{__('diz.title')}}</th>
                                <th>{{__('diz.description')}}</th>
                                @if (Auth::user()->isAdmin())
                                    <th>{{__('diz.user')}}</th>
                                @endif
                                <th>{{__('diz.due_date')}}</th>
                                <th class="text-center">{{__('diz.completed')}}</th>
                                <th class="text-end">{{__('diz.actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr class="align-baseline">
                                    <td>{{$task->title}}</td>
                                    <td>{!! strip_tags($task->description) !!}</td>
                                    @if (Auth::user()->isAdmin())
                                        <td>{{$task->user->name}}</td>
                                    @endif
                                    <td class="@if ($task->completed)text-success @elseif ($task->due_date && $task->due_date->isPast())text-danger @endif">{{ $task->due_date ? $task->due_date->format('d/m/Y H:i') : '-'}}</td>
                                    <td class="text-center">
                                        @if ($task->completed)
                                            <i class="bi bi-check-circle text-success"></i>
                                        @else
                                            <i class="bi bi-x-circle text-danger"></i>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic checkbox toggle button group">

                                            @if (!$task->completed)
                                                {{-- trigger modal to complete --}}
                                                <button
                                                    type="button"
                                                    title="{{__('diz.complete')}}"
                                                    class="btn btn-outline-success"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#completeModal"
                                                    data-title="{{$task->title}}"
                                                    data-description="{{$task->description}}"
                                                    data-task_id="{{$task->id}}">
                                                    <i class="bi bi-check"></i>
                                                </button>
                                            @endif
                                            <a title="{{__('diz.edit')}}" class="btn btn-outline-primary" href="{{route('task.edit', $task->id)}}"><i class="bi bi-pencil"></i></a>
                                            {{-- trigger modal to delete --}}
                                            <button
                                                type="button"
                                                title="{{__('diz.delete')}}"
                                                class="btn btn-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                data-title="{{$task->title}}"
                                                data-description="{{$task->description}}"
                                                data-delte_action="{{route('task.delete', $task->id)}}">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@include('task.modals.complete')
@include('task.modals.delete')
