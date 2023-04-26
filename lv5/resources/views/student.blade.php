@extends('layouts.frontend')

@section('content')

<x-app-layout>

<p class="container mt-5"><b>PONUĐENI RADOVI</b></p>

@if($tasks->count() == 0)
<p class="container mt-3">Nema ponuđenih radova.</p>
@else
<table class="container table table-hover mt-3">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Naziv rada</th>
            <th scope="col">Engleski naziv rada</th>
            <th scope="col">Zadatak rada</th>
            <th scope="col">Tip studija</th>
            <th scope="col">Prijava</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $taskdata)
        <tr>
            <td> {{ $taskdata->id }} </td>
            <td> {{ $taskdata->naziv_rada }} </td>
            <td> {{ $taskdata->naziv_rada_eng }} </td>
            <td> {{ $taskdata->zadatak_rada }} </td>
            <td> {{ $taskdata->tip_studija }} </td>
            <td><a href="{{ route('student.application', $taskdata->id) }}">Prijavi se</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

<p class="container mt-5"><b>ODOBRENI RADOVI</b></p>

@if($studenttasks->count() == 0)
<p class="container mt-3">Nema odobrenih radova.</p>
@else
<table class="container table table-hover mt-3">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Naziv rada</th>
            <th scope="col">Engleski naziv rada</th>
            <th scope="col">Zadatak rada</th>
            <th scope="col">Tip studija</th>
        </tr>
    </thead>
    <tbody>
        @foreach($studenttasks as $taskdata)
        <tr>
            <td> {{ $taskdata->id }} </td>
            <td> {{ $taskdata->naziv_rada }} </td>
            <td> {{ $taskdata->naziv_rada_eng }} </td>
            <td> {{ $taskdata->zadatak_rada }} </td>
            <td> {{ $taskdata->tip_studija }} </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

</x-app-layout>

@endsection