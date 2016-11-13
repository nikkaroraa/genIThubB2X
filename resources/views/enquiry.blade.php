@extends('template.default')

@section('content')
 
    <div class="container">
      
      @if (Session::has('success'))
        <div class="alert alert-success fade in" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success:</strong> {{Session::get('success')}}
        </div>
      @endif
        
     

       <div class="card card-container">
                        
            <h3> Purpose</h3>
 <form method="post" action="">
  <div class="container-fluid">
  <div class="row">
    <a href="{{url('info')}}" id="1" class="btn btn-default pagerlink" name="General-Enquiry">General-Enquiry</a>
    <br> 
    <a href="{{url('info')}}" id="2" class="btn btn-default pagerlink" name="Repair">Repair</a>
   <br>
    <a href="{{url('info')}}" id="3" class="btn btn-default pagerlink" name="Accessories">Accessories</a>
  <div>
  </div>
  </form>
        </div>
    </div>

@stop