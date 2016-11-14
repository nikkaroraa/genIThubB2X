@extends('template.default')

@section('content')



<div class="container" style="background-color:white;">
  <div class="text-center" style="font-family: 'Lato', sans-serif;font-size:1.7em;font-weight:700;margin-top:10px;color:#6d6d6d;"> Customer Information <span style="color:#020000;">(Temporary)</span> </div>
  <p></p>            
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Token Number</th>
        <th>Purpose</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Start Time</th>
        <th>End Time</th>
      </tr>
    </thead>
<tbody>
@foreach ($users as $user)
    
      <tr>
        <td><span style="font-size:1.2em;font-weight:700;">{{ $user->token_num }}</span></td>
        <td>{{ $user->purpose }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->phone_num }}</td>
        <td><form method="post" action="{{route('startQuery')}}"><button type="submit" class="btn btn-danger"  {{ $user->a_flag==true?'disabled':''}}>Accepted</button><input type="hidden" name="token" value="{{ $user->token_num }}"><input type="hidden" name="flag" value="1"><input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_token" value="{{ Session::token() }}"></form></td>
        <td><form method="post" action="{{route('finishQuery')}}"><button type="submit" class="btn btn-primary" {{ $user->e_flag==true?'disabled':''}}>Finished</button><input type="hidden" name="token" value="{{ $user->token_num }}"><input type="hidden" name="flag" value="1"><input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_token" value="{{ Session::token() }}"></form></td>
      </tr>
    
@endforeach

  </tbody>
  </table>

  <div class="text-center">
{!! $users->links(); !!}
</div>
</div>

@stop