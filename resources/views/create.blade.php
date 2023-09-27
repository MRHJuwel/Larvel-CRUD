@extends('master')
@section('title')
    Create student
@endsection
@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header bg-danger text-center fs-3">Student Create Form</div>
                        <div class="card-body">
                            {{--                            enctype = multiple/form-data id uded for file upload --}}
                            <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
                                {{--                                data controller and database porjonto jete akta unique tocken lagbe --}}
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control">
                                </div>

{{--                                department and session selections --}}
                                <div class="mb-3">
                                    <label for="dept">Select Department</label>
                                    <select id="dept" type="text" name="department_id" class="form-control" >
                                        <option value="" selected >Select Department Name</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}" >{{$department->name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="session">Select Session</label>
                                    <select id="session" type="text" name="session_id" class="form-control" >
                                        <option value="" selected >Select Department Name</option>
                                        @foreach($sessions as $session)
                                            <option value="{{$session->id}}" >{{$session->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea type="text" id="address" name="address" class="form-control"> </textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" id="image" name="image" class="form-control">
                                </div>

                                <button type="submit" name="" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
