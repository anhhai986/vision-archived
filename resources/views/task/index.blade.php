@extends('layouts.app')
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            {!! $tasks->links() !!}
        </div>
        <div class="col-12">
            @foreach($tasks as $task)
                <div class="card mb-3">
                    <task-card-header :task="{{ $task->toJson() }}"></task-card-header>
                    <div class="card-body text-center tab-content" id="task-{{ $task->id }}">
                        <div class="tab-pane fade show active" id="task-{{ $task->id }}-overview" role="tabpanel" aria-labelledby="task-{{ $task->id }}-overview-tab">
                            <task-overview :task="{{ $task->toJson() }}"></task-overview>
                        </div>
                        <div class="tab-pane fade" id="task-{{ $task->id }}-edit" role="tabpanel" aria-labelledby="task-{{ $task->id }}-edit-tab">
                            <task-tab-edit :task="{{ $task->toJson() }}"></task-tab-edit>
                        </div>
                        <div class="tab-pane fade" id="task-{{ $task->id }}-assign" role="tabpanel" aria-labelledby="task-{{ $task->id }}-assign-tab">
                            <task-assignees-component :assignees="{{ $task->assignees }}">
                            </task-assignees-component>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col col-xs-12">
                                <task-manager-component
                                    :model="{{ $task->toJson() }}"
                                    :current="{{ $task->status()->toJson() }}"
                                    :statuses="{{ json_encode($task->availableStatuses()) }}">
                                </task-manager-component>
                            </div>
                            <div class="col col-xs-12 text-right">
                                @component('components.date', ['date' => $task->created_at])
                                @endcomponent
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-12">
            {!! $tasks->links() !!}
        </div>
    </div>
</div>
@endsection
