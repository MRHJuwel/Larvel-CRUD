@extends('master')
@section('title')
    Manage Session Edit
@endsection
@section('content')
    <style>
        th{
            padding: 5px;
            border: 1px solid black;
            font-size: 18px;
            color: orangered;
            text-align: center;
        }
        td{
            padding: 5px;
            border: 1px solid black;
            font-size: 18px;
        }
        td img{
            margin-left: 14px;
        }
    </style>
    <section class="py-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{route('sessions.update',$sessions->id)}}" method="post" enctype="multipart/form-data">
                    {{--                                data controller and database porjonto jete akta unique tocken lagbe --}}
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Session Name</label>
                        <input type="text" id="name" name="name" value="{{$sessions->name}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Session Code</label>
                        <input type="text" id="text" name="code" value="{{$sessions->code}}" class="form-control">
                    </div>


                    <button type="submit" name="" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
