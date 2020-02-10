@if (Auth::guard('web')->check())
  <p class="text-success">
    You are Logged In as a <strong>ADMIN</strong>
  </p>
@else
  <p class="text-danger">
    You are Logged Out as a <strong>ADMIN</strong>
  </p>
@endif
