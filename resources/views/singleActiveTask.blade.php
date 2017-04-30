<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>To Do #{{ $activeTask->id }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      @include('navigation')

      <h2>To Do #{{ $activeTask->id }}</h2>
      <h4>{{ $activeTask->title }}</h4>
      <p>Detail: {{ $activeTask->body }}</p>
      <p>Due: {{ $activeTask->due_date }}</p>
      <p>Created: {{ $activeTask->created_at }}</p>
      <p>Last Updated: {{ $activeTask->updated_at }}</p>
      <a href="/active-tasks">Return to To Do List</a>
    </div>
  </body>
</html>
