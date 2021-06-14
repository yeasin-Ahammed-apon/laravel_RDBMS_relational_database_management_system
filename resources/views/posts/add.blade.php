@extends('welcome')
@section('content')
<div class="m-5">    
    <form action="/post" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{session()->get('id')}}" >
        <div class="mb-3">
            <label  class="form-label">Catagory</label>
            <select class="form-select" name ="type" aria-label="Default select example">                
                @foreach ($datas as $data)                    
                    <option value={{$data->id}}>
                        {{$data->name}}
                    </option>
                @endforeach                                
            </select>
        </div>
        <div class="mb-3">
          <label  class="form-label">Name</label>
          <input type="text" name="name" class="form-control" >          
        </div>
        <div class="mb-3">
          <label class="form-label">Details</label>
          <input type="text"  name="details" class="form-control" >
        </div>       
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection