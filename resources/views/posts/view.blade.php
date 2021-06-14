@extends('welcome')
@section('content')
    <div class="m-5">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$datas->name}}</h5>
              <p class="card-text">{{$datas->details}}</p>
              @if (session()->get('id')==$datas->user_id)
              <a href="{{url('/delete/'.$datas->id)}}" class="btn btn-danger">Delete</a>
              @endif
            </div>
          </div>
    </div>
@endsection