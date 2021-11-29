@if (count($tasks) > 0)
    <ul class="list-unstyled">
        @foreach ($tasks as $task)
            <li class="media mb-3">
                {{-- タスクの所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($task->user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                        {{-- タスクの所有者のユーザ詳細ページへのリンク --}}
                        {!! Form::label('name', 'name:') !!}
                        {!! link_to_route('users.show', $task->user->name, ['user' => $task->user->id]) !!}
                        <span class="text-muted">posted at {{ $task->created_at }}</span>
                    </div>
                    <div>
                        {{-- ステータス内容 --}}
                        <p class="mb-0">{!! Form::label('status', 'status:') !!}{!! nl2br(e($task->status)) !!}</p>
                        {{-- タスク内容 --}}
                        <p class="mb-0">{!! Form::label('task', 'task:') !!}{!! nl2br(e($task->content)) !!}</p>
                    </div>
                    <div>
                        @if (Auth::id() == $task->user_id)
                            {{-- タスク削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $tasks->links() }}

@endif