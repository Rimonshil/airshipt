<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  {{-- bootstrap css CDN --}}
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  {{-- bootstrap js CDN --}}
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https:////cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>

  <title>Todo List App</title>
</head>
<body>
<div class="container">
  <div class="col-md-offset-2 col-md-8">
    <div class="row">
      <h1>Todo List</h1>
    </div>

    {{-- display success message --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="row" style='margin-top: 10px; margin-bottom: 10px;'>
      <form action="{{route('todo.store')}}" method='POST' enctype="multipart/form-data">
        @csrf

        <div class="col-md-9">
          <input type="text" name='name' class='form-control'>
        </div>

        <div class="col-md-3">
          <input type="submit" class='btn btn-primary btn-block' value='Add Task'>
        </div>
      </form>
    </div>

    {{-- display stored tasks --}}
      <table class="table">
        <thead>
          <th>Task #</th>
          <th>Name</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>

        <tbody>
          @foreach ($tasks as $item)
              
         
            <tr>
              <th>{{ $item->id }}</th>
              <td>{{ $item->name }}</td>
              <td><a href="{{route('todo.edit',$item->id)}}" class='btn btn-primary'>Edit</a></td>
              <td>
                <a href="{{ URL::to('todo-delete/'.$item->id) }}" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach

        </tbody>
        </table>


    <div class="row text-center">
    </div>

  </div>
</div>

{!! Toastr::render() !!}
</body>
</html>