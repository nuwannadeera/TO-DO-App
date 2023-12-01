<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Task</title>
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="/updateTaskName/{{$taskData->id}}" method="post" class="text-center">
                {{csrf_field()}}
                <br>
                <br>
                <input type="text" class="form-control" name="task" value="{{$taskData->task}}"
                       placeholder="Update Task">
                <br>
                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="button" class="btn btn-danger">CANCEL</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
