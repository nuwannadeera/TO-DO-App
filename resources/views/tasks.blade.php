<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task App</title>
    <!-- Bootstrap CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
<div class="container">
    <div class="text-center">
        <div style="font-size: 30px">
            Daily Tasks
        </div>
        <div class="row">
            <div class="col-md-12">

                @foreach($errors->all() as $error)
                <div role="alert" class="alert alert-danger">{{$error}}</div>
                @endforeach

                <form method="post" action="/saveTask">
                    {{csrf_field()}}
                    <input type="text" class="form-control" name="task" placeholder="Add Task">
                    <br>
                    <button type="submit" class="btn btn-success">SAVE</button>
                    <button class="btn btn-primary">CLEAR</button>
                </form>
                <br>
                <br>
                <br>
                <table class="table table-dark table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Task</th>
                        <th scope="col">Is Completed</th>
                        <th scope="col">Action</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($taskList as $data)
                    <tr>
                        <th scope="row">{{$data->id}}</th>
                        <td>{{$data->task}}</td>
                        @if($data->is_completed)
                        <td>Completed</td>
                        @else
                        <td>Not Completed</td>
                        @endif
                        @if($data->is_completed)
                        <td>
                            <a href="/markAsNotComplete/{{$data->id}}" class="btn btn-warning">Mark as Not Complete</a>
                        </td>
                        @else
                        <td>
                            <a href="/markAsComplete/{{$data->id}}" class="btn btn-warning">Mark as Complete</a>
                        </td>
                        @endif
                        <td>
                            <a href="/deleteTask/{{$data->id}}" class="btn btn-dark">Delete Task</a>
                            <a href="/updateTask/{{$data->id}}" class="btn btn-dark">Update Task</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</body>
</html>
