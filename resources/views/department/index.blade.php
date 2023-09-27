@extends('master')
@section('title')
    Manage Department
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
                            <th>Name of Department</th>
                            <th>Department Code</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        @foreach($departments as $department)
                            <tr >
                                <td>{{$loop->iteration}}</td>
                                <td>{{$department->name}}</td>
                                <td>{{$department->code}}</td>
                                <td>{{$department->status == 1 ? 'Active': 'Inactive'}}</td>
                               <td class="text-center fs-6">
                                   <a href="{{route('departments.edit', $department->id)}}" class="btn-success btn m-1">Edit</a>
                                   <a href="{{route('dept.wise.student', $department->id)}}" class="btn-success btn m-1">Total-Dept-students</a>

                                   @if($department->status == 1)
                                       <a href="{{ route('departments.show',$department->id) }}" class="btn btn-warning btn-sm m-1">Inactive</a>
                                   @else
                                       <a href="{{ route('departments.show',$department->id) }}" class="btn btn-warning m-1 bg-success btn-sm">Active</a>
                                   @endif

                                    <form action="{{ route('departments.destroy',$department->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" value="{{$department->id}}" name="id">
                                        <button type="submit" class="btn btn-danger m-1"
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
