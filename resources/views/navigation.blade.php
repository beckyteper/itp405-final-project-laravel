<ul class="nav nav-pills">
  <li role="presentation"><a href="/">Home</a></li>
  @if (Auth::check())
    <li role="presentation"><a href="/active-tasks">To Do List</a></li>
    <li role="presentation"><a href="/logout">Logout</a></li>
  @else
    <li role="presentation"><a href="/login">Login</a></li>
    <li role="presentation"><a href="/signup">Sign Up</a></li>
  @endif
</ul>
<br>
