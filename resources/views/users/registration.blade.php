@extends('welcome')
@section('content')
<div class="m-5">    
    <form action="/registration" method="POST">
        @csrf
        <div class="mb-3">
          <label  class="form-label">Name</label>
          <input type="text" name="name" class="form-control" >          
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password"  name="password" class="form-control" >
        </div>       
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection