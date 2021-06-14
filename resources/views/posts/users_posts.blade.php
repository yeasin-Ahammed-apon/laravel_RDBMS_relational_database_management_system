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
            <th scope="col">Type</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>            
                    <td>{{$data->name}}</td>                    
                    <td>{{$data->type_name}}</td>
                    <td>
                        <a href={{url('/view/'.$data->id)}} class="btn btn-primary">
                                View
                        </a >                                               
                        <a href={{url('/delete/'.$data->id)}} class="btn btn-danger">
                            Delete
                        </a >                                               
                    </td>                    
                    
                </tr>               
            @endforeach          
        </tbody>
      </table>
        
    @endif
</div>
@endsection
