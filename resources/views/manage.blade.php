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
                <div class="card">
                    <table >
                        <tr  >
                            <th>Sirial No.</th>
                            <th>Name of Student</th>
                            <th>Email of Student</th>
                            <th>Contact No. of Student</th>
                            <th>Address of Student</th>
                            <th>Department Name</th>
                            <th>Session name </th>
                            <th>Image of Student</th>
                            <th>Action</th>
                        </tr>
                            @foreach($Students as $student)
                                <tr >
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->email}}</td>
                                    <td>{{$student->phone}}</td>
                                    <td>{{$student->address}}</td>
                                    <td>{{$student->department->name }}</td>
                                    <td>{{$student->session->name }}</td>
                                    <td><img src="@php if (isset($student->image)){ echo asset($student->image) ;} else { echo asset('assets')."/img/dmy.png"; } @endphp" width="60px" height="60px" alt=""></td>

                                    <td><a href="{{route('edit',['id' => $student->id])}}" class="btn-success btn m-1">Edit</a>
                                        <form action="{{route('remove')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$student->id}}" name="id">
                                            <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure to Delete it? ')"> DELETE </button>
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
