@extends('master')
@section('title')
    Manage Student
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
                <form action="{{route('update')}}" method="post" enctype="multipart/form-data">
                    {{--                                data controller and database porjonto jete akta unique tocken lagbe --}}
                    @csrf
                    <input type="hidden" value="{{$Students->id}}" name="id">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" value="{{$Students->name}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" id="email" name="email" value="{{$Students->email}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" name="phone" value="{{$Students->phone}}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea type="text" id="address" name="address" class="form-control"> {{$Students->address}}</textarea>
                    </div>

                    {{--                                department and session selections --}}
                    <div class="mb-3">
                        <label for="dept">Select Department</label>
                        <select id="dept" type="text" name="department_id" class="form-control" >
                            <option value="" selected >Select Department Name</option>
                            @foreach($departments as $department)
                                <option value="{{$department->id}}" >{{$department->name}}</option>
                            @endforeach
                            {{--                                        <option value="">EEE</option>--}}
                            {{--                                        <option value="">Eglish</option>--}}
                            {{--                                        <option value="">Math</option>--}}
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="session">Select Session</label>
                        <select id="session" type="text" name="session_id" class="form-control" >
                            <option value="" selected >Select Department Name</option>
                            @foreach($sessions as $session)
                                <option value="{{$session->id}}" >{{$session->name}}</option>
                            @endforeach
                            {{--                                        <option value="" >2021</option>--}}
                            {{--                                        <option value="" >2022</option>--}}
                        </select>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" name="image" class="form-control">
                        <img src="{{asset($Students->image)}}" width="50px" height="50px" alt="">
                    </div>

                    <button type="submit" name="" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
