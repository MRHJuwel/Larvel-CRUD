{{$alldepartment->name}}

<p>more details:  </p>
@foreach($alldepartment->student as $alldep)

{{$alldep->name}}



    @endphp
@endforeach
