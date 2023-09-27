@extends('master')
@section('title')
    Manage Session
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
                        @foreach($sessions as $session)
                            <tr >
                                <td>{{$loop->iteration}}</td>
                                <td>{{$session->name}}</td>
                                <td>{{$session->code}}</td>
                                <td>{{$session->status == 1 ? 'Active': 'Inactive'}}</td>
                                <td class="text-center fs-6">
                                    <a href="{{route('sessions.edit', $session->id)}}" class="btn-success btn m-1">Edit</a>
                                    <a href="{{route('session.wise.student', $session->id)}}" class="btn-success btn m-1">Se-Wi-Student</a>
                                    @if($session->status == 1)
                                        <a href="{{ route('sessions.show',$session->id) }}" class="btn btn-warning btn-sm m-1">Inactive</a>
                                    @else
                                        <a href="{{ route('sessions.show',$session->id) }}" class="btn btn-warning m-1 bg-success btn-sm">Active</a>
                                    @endif

                                    <form action="{{ route('sessions.destroy',$session->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" value="{{$session->id}}" name="id">
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
