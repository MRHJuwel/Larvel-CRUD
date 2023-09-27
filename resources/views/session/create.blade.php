@extends('master')
@section('title')
    Create Session
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
                            <form action="{{route('sessions.store')}}" method="post" enctype="multipart/form-data">
                                {{--                                data controller and database porjonto jete akta unique tocken lagbe --}}
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Session Name</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Session Code</label>
                                    <input type="text" id="text" name="code" class="form-control">
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
