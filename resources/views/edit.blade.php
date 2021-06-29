<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="/css/main.css" rel="stylesheet">

<div class="center-column">
<h3 class="text-center mb-4">Edit Task</h3>
    @include('includes.messages')
    {!! Form::open(['action' => ['App\Http\Controllers\TasksController@update', $task->id], 'method' => 'POST']) !!}
        <div class="form-group">
            <h5>{{Form::label('title', 'Task')}}</h5>
            {{Form::text('title', $task->title, ['class' => 'form-control', 'placeholder'=>'Add new task...'])}}
        </div>
        <div class="form-group">
            <span id="form_heading">{{Form::label('completed', 'Completed')}}</span>
            {{Form::checkbox('completed', 1, $task->completed, ['class' => 'checkbox-btn'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update', ['class' => 'btn btn-info'])}}
    {!! Form::close() !!}
</div>
