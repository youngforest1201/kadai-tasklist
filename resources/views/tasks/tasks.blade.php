@if (count($tasks) > 0)
    <ul class="list-unstyled">
        @foreach ($tasks as $task)
            <li class="media mb-3">
                <div class="media-body">
                    <div>
                        {{-- タスク詳細ページへのリンク --}}
                        ID : {!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}
                        <span class="text-muted">created at {{ $task->created_at }}</span>
                    </div>
                    <div>
                        {{-- ステータス内容 --}}
                        <p class="mb-0">{!! Form::label('status', 'status:') !!}{!! nl2br(e($task->status)) !!}</p>
                        {{-- タスク内容 --}}
                        <p class="mb-0">{!! Form::label('task', 'task:') !!}{!! nl2br(e($task->content)) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $tasks->links() }}

@endif