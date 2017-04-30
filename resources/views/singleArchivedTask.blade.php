<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>To Do #{{ $archivedTask->id }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      @include('navigation')
      <h2>To Do #{{ $archivedTask->id }}</h2>
      <h4>{{ $archivedTask->title }}</h4>
      <p>Detail: {{ $archivedTask->body }}</p>
      <p>Due: {{ $archivedTask->due_date }}</p>
      <p>Created: {{ $archivedTask->created_at }}</p>
      <p>Last Updated: {{ $archivedTask->updated_at }}</p>
      <p>Archived: {{ $archivedTask->archived_at }}</p>
      <a href="/archived-tasks">Return to Archived List</a>
    </div>
  </body>
</html>
