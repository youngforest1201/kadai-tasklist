{!! Form::open(['route' => 'tasks.store']) !!}
    <div class="form-group">
        {!! Form::label('status', 'ステータス:') !!}
        {!! Form::textarea('status', null, ['class' => 'form-control', 'rows' => '1']) !!}
        {!! Form::label('content', 'タスク:') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '2']) !!}
        {!! Form::submit('タスク', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
{!! Form::close() !!}
