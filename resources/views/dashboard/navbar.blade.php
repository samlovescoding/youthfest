<?php
  use App\User;
  $user = User::find(Auth::id());
?>
<nav class="navbar navbar-inverse" style="border-radius:0px;">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-collapsable" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-collapsable">
      <ul class="nav navbar-nav">
        @guest
        @else
        <li><a href="{{route('home')}}">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Students <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{route('students.create')}}">Registration</a></li>
            <li><a href="{{route('students.index')}}">Enrolled Students</a></li>
            @if($user->is_admin == 2)
              
            @endif
      </ul>
        </li>
        
        @if($user->is_admin == 2)
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{action('StudentsController@all')}}">All Students</a></li>
              <li><a href="{{route('events.index')}}">Events</a></li>
              <li><a href="{{route('colleges.index')}}">Colleges</a></li>
              <li><a href="{{action('StudentsController@idcards')}}">All ID Cards</a></li>
              <li><a href="{{action('StudentsController@lock_idcards')}}">Lock All ID Cards</a></li>
            </ul>
          </li>
          @endif
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @guest
        <li><a href="{{ route('login') }}">Login</a></li>
        
        @else
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('change_password') }}">Change Password</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a></li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </ul>
        </li>
        @endguest
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
