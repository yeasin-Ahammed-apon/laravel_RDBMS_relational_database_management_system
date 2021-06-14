@extends('welcome')
@section('content')
<div class="m-5">    
    @if (session()->has('message'))
        <h3>
            {{session()->get('message')}}
        </h3>    
    @endif
        @if ($datas->isEmpty())
            <h3>
                noting to show
            </h3>    
        @else
    
        <table class="table">
            <thead>
            <tr>            
                <th scope="col">Name</th>
                <th scope="col">User</th>
                <th scope="col">Type</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>            
                        <td>{{$data->post_name}}</td>
                        <td>{{$data->user_name}}</td>
                        <td>{{$data->type_name}}</td>
                    </tr>               
                @endforeach          
            </tbody>
        </table>
        
    @endif
</div>
@endsection