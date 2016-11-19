@extends('template.default')

@section('content')

<div class="container">
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Options</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Employee
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
           <li><a type="button" data-toggle="modal" data-target="#myModal">Add Employee</a></li>
           <li><a href="{{ route('showEmployee') }}">Show Employee</a></li>
        </ul>
      </li>
       
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Export
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{url('export')}}">Export to Excel</a></li>
        </ul>
      </li>
      </ul>
      
    </div>
  </div>
</nav>
</div>
 @if (Session::has('info'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success:</strong> {{Session::get('info')}}
        </div>
 @endif  
  <!-- Modal -->
  <div class="modal fade" id="chPassword" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Password</h4>
        </div>
        <div class="modal-body">
           <form  method="post" action="{{ route('chPassword') }}">
            <div class="form-group">
            <label for="name" class="control-label">New Password</label>
            <input type="name" placehoder="password" name="password" class="form-control">
          </div>
          <div class="form-group">
            <label for="name" class="control-label">Confirm Password</label>
            <input type="name" placehoder="Confirm password" name="newpassword" class="form-control">
          </div>
        <div class="form-group" >
            <button class="btn btn-primary btn-lg" type="submit">Change</button>
          
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_token" value="{{ Session::token() }}"> 
            <input type="hidden" id="chpass" name="ename" value="">
        </div>
        
        <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div> 
           
        
      </form>
      </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Employee</h4>
        </div>
        <div class="modal-body">
           <form  method="post" action="{{ route('addEmployee') }}">
            <div class="form-group">
            <label for="name" class="control-label">Your Name</label>
            <input type="name" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label  for="pwd" class="control-label">Password</label>
            <input type="password" name="password" class="form-control">
          </div>
        <div class="form-group">
            <button class="btn btn-primary btn-lg" type="submit">Add Employee</button>
          
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_token" value="{{ Session::token() }}"> 
        </div>
        
        <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div> 
           
        
      </form>
      </div>
      </div>
    </div>
  </div>    
<div class="container" style="background-color:white;">
  
  <div class="text-center" style="font-family: 'Lato', sans-serif;font-size:1.7em;font-weight:700;margin-top:10px;color:#6d6d6d;"> Employee Information </div>
  <p></p>            
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Username</th>
        <th>Change Password</th>
        <th>Delete</th>
      </tr>
    </thead>
<tbody>
@foreach ($employees as $employee)
    
      <tr>
        <td><span style="font-size:1.2em;font-weight:700;">{{ $employee->username }}</span></td>
        <td><button type="button" class="btn btn-danger change" data-toggle="modal" data-target="#chPassword" data-id="{{ $employee->username }}" >Change Password</button></td>
        <td><form method="post" action="{{ route('deleteEe')}}"><button type="submit" class="btn btn-primary">Delete </button><input type="hidden" name="ename" value="{{ $employee->username }}"><input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_token" value="{{ Session::token() }}"></form></td>
      </tr>
    
@endforeach

  </tbody>
  </table>

  <div class="text-center">
</div>
</div>
<script src="{{ asset('js/modalJS.js') }}"></script>
@stop