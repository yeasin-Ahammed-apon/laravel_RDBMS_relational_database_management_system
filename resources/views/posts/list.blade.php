@extends('welcome')
@section('content')
<div class="m-5">    
    @if (session()->has('message'))
        <h3>
            {{session()->get('message')}}
        </h3>    
    @endif
    @if($datas->isEmpty())
        <h1>nothing to show</h1>
    @else

    <table class="table">
        <thead>
          <tr>            
            <th scope="col">Name</th>
            <th scope="col">User</th>
            <th scope="col">Type</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>            
                    <td>{{$data->post_name}}</td>
                    <td>{{$data->user_name}}</td>
                    <td>{{$data->type_name}}</td>
                    <td>
                        <a href={{url('/view/'.$data->post_id)}} class="btn btn-primary">
                                View
                        </a > 
                    @if (session()->get('name') == $data->user_name)
                          
                        <a href={{url('/delete/'.$data->post_id)}} class="btn btn-danger">
                            Delete
                        </a >                       
                        @endif
                    </td>                    
                    
                </tr>               
            @endforeach          
        </tbody>
      </table>
        
    @endif
</div>
@endsection
