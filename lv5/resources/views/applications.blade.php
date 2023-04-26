@extends('layouts.frontend')

@section('content')

<p class="container mt-5"><b>PRIJAVE</b></p>

@if($application->count() == 0)
<p class="container mt-3">Nema poslanih prijava.</p>
@elseif($task->isApproved != null)
<p class="container mt-3">Tema je već dodjeljena studentu.</p>
@else
<table class="container table table-hover mt-3">
    <thead>
        <tr>
            <th scope="col">Task ID</th>
            <th scope="col">Task</th>
            <th scope="col">Student ID</th>
            <th scope="col">Ime studenta</th>
            <th scope="col">Prihvati</th>
        </tr>
    </thead>
    <tbody>
        @foreach($application as $data)
        <tr>
            <td> {{ $data->task_id }}</td>
            <td> {{ $task->naziv_rada }}</td>
            <td> {{ $data->student_id }}</td>
            <td> {{ $data->student_name }} </td>
            <td><a href="{{ route('accept.application', ['id' => $data->task_id, 'name' => $data->student_name]) }}">Prihvati</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection