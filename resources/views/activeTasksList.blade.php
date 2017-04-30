<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Current Tasks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      @if (session('successStatus'))
        <div class="alert alert-success" role='alert'>
          {{ session('successStatus') }}
        </div>
      @endif

      @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @include('navigation')

      <h1 align="center">Your To Do List</h1>

      <h4>Create a New Task</h4>

      <form action="/active-tasks" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="title">Task</label>
          <textarea name="title" id="title" class="form-control" rows="1" cols="80">{{ old('title') }}</textarea>
          <label for="body">Detail</label>
          <textarea name="body" id="body" class="form-control" rows="4" cols="80">{{ old('body') }}</textarea>
          <label for="due_date">Due Date</label>
          <input type="date" name="due_date" id="due_date" class="form-control">
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>

      <a href="/archived-tasks">See Completed Tasks</a>
      <table class="table">
        <thead>
          <tr>
            <th>Task</th>
            <th>Detail</th>
            <th>Due Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($activeTasks as $activeTask)
            @if($activeTask->user_id === $user->id)
              <tr>
                <td>{{ $activeTask->title }}</td>
                <td>{{ $activeTask->body }}</td>
                <td>{{ $activeTask->due_date }}</td>
                <td>
                  <a href="/active-tasks/{{ $activeTask->id }}" class="btn">View Detail</a>
                </td>
                <td>
                  <a href="/active-tasks/{{ $activeTask->id }}/edit" class="btn">Edit</a>
                </td>
                <td>
                  <a href="/active-tasks/{{ $activeTask->id }}/archive" class="btn">Mark as Complete</a>
                </td>
              </tr>
            @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </body>
</html>
