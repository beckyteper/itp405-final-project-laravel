<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit a Task</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      @if (session('successStatus'))
        <div class="alert alert-success" role="alert">
          {{ session('successStatus') }}
        </div>
      @endif

      @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @include('navigation')
      <h1 align="center">Edit Task #{{ $activeTask->id }}</h1>
      <form action="/active-tasks/{{ $activeTask->id }}/update" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="title">Task</label>
          <textarea name="title" id="title" class="form-control" rows="1" cols="80">{{ $activeTask->title }}</textarea>
          <label for="body">Detail</label>
          <textarea name="body" id="body" class="form-control" rows="1" cols="80">{{ $activeTask->body }}</textarea>
          <label for="due_date">Due Date</label>
          <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $activeTask->due_date }}">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </body>
</html>
