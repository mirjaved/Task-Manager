<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="/css/main.css" rel="stylesheet">

    <title>TODO List</title>
  </head>
  <body>

<div class="center-column">
  <h1 class="text-center mb-4">TODO List</h1>
    @include('includes.messages')
    {!! Form::open(['action' => 'App\Http\Controllers\TasksController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder'=>'Add new task...'])}}
        </div>
        {{Form::submit('Add Task', ['class' => 'btn btn-info'])}}
    {!! Form::close() !!}

    @foreach ($tasks as $task)

        <div class="item-row">
           @if ($task->completed == True)
                <strike>{{$task->title}}</strike>
            @else
                {{$task->title}}
            @endif
          <a data-item="{{ $task->id }}" class="btn btn-danger btn-sm deleteBtn float-right" data-toggle="modal" data-target="#deleteLineItemModal">Delete</a>
          <a class="btn btn-info btn-sm float-right mr-3" href="/tasks/{{$task->id}}/edit">Update</a>          
        </div>

        @endforeach

 @foreach($tasks as $task)

{{--bootstrap modal--}}
  <div class="modal fade" id="deleteLineItemModal" tabindex="-1" role="dialog" aria-labelledby="deleteLineItemModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="exampleModalLabel">Delete Confirmation</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body edit-content">
            <h5 class="text-center">Are you sure you want to delete this task item?</h5>
        </div>
        <div class="modal-footer">
        
        <div>
            {!! Form::open(['action' => ['App\Http\Controllers\TasksController@destroy', $task->id], 'method' => 'POST', 'class' => 'pull-right', 'id'=> 'lineitem']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::hidden('app_id', 'app_id')}}
            {{Form::submit('Yes, I am sure', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        </div>

          <!--
            +++++ This is properly working code to perfom delete task with raw form +++++
            <form action="/tasks/{{ $task->id }}" method="POST" id="lineitem">
              @method('DELETE')
              @csrf              
              <button class="btn btn-danger" input="submit">Yes, I am sure2</button>             
          </form>-->
            <button type="button" class="btn btn-primary" data-dismiss="modal">No, not today</button>
        </div>
    </div>
</div>

@endforeach

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
 $(document).on("click", ".deleteBtn", function () {
    var itemid = $(this).attr('data-item');
    $("#lineitem").attr("action","/tasks/"+itemid)
 });
 </script>


  </body>
</html>
