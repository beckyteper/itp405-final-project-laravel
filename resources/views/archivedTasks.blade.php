<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Archived Tasks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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

      <h1 align="center">Your Completed Tasks</h1>

      <table class="table">
        <thead>
          <tr>
            <th>Task</th>
            <th>Detail</th>
            <th>Due Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($archivedTasks as $archivedTask)
            @if ($archivedTask->user_id === $user->id)
              <tr>
                <td>{{ $archivedTask->title }}</td>
                <td>{{ $archivedTask->body }}</td>
                <td>{{ $archivedTask->due_date }}</td>
                <td>
                  <a href="/archived-tasks/{{ $archivedTask->id }}">View Detail</a>
                </td>
                <td>
                  <a href="/archived-tasks/{{ $archivedTask->id }}/activate">Send to Active Task List</a>
                </td>
                <td>
                  <a href="/archived-tasks/{{ $archivedTask->id }}/delete">Permanently Delete</a>
                </td>
              </tr>
            @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </body>
</html>
