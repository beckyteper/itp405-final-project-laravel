<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Log In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
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
      <h1>Log In</h1>

      <p>Don't have an account? Sign up <a href="/signup">here</a>.</p>
      <form method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control">
        </div>
        <input type="submit" value="Log In" class="btn btn-primary">
      </form>
    </div>
  </body>
</html>
