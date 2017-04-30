<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      @include('navigation')

      <div class="jumbotron text-center">
        <h1>Welcome to Your To Do List</h1>
        <p>Keep track of everything you need to do.</p>
      </div>

      @if(Auth::user())
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 align="center"><a href="/active-tasks">Your To Do List</a></h3>
            </div>
            <div class="panel-body">
              <p>Keep track of all your current tasks.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 align="center"><a href="/archived-tasks">Completed Tasks</a></h3>
            </div>
            <div class="panel-body">
              <p>Look back at all your accomplished tasks.</p>
            </div>
          </div>
        </div>
      </div>
      @else
        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 align="center"><a href="/login">Login</a></h3>
              </div>
              <div class="panel-body">
                <p>Login to your account to access your to do list.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 align="center"><a href="/signup">Sign Up for an Account</a></h3>
              </div>
              <div class="panel-body">
                <p>Create an account to start tracking your tasks.</p>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </body>
</html>
